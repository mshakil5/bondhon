<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Transaction;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Mail\EventPaymentMail;
use App\Models\EmailContent;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Models\ContactMail;
use App\Models\DonationType;
use App\Models\User;

class PaypalController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId('');
        $this->gateway->setSecret('');
        $this->gateway->setTestMode(true);
    }


    // charity payment function
    public function charitypaymentpay(Request $request)
    {
        // dd($request->all());

        $rules = [
            'projects' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required|numeric',
            'amount' => 'required',
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.',
            'phone.numeric' => 'The phone field must be numaric.'
        ];
        $this->validate($request, $rules, $customMessages);

        session(['projects' => $request->projects]);
        session(['donate' => $request->donate]);
        session(['others' => $request->others]);
        session(['taxpayer' => $request->taxpayer]);
        session(['name' => $request->name]);
        session(['donating_cause' => $request->donating_cause]);
        session(['email' => $request->email]);
        session(['phone' => $request->phone]);
        session(['comment' => $request->comment]);
        session(['prodeccingfee' => $request->processingfee]);

        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => "GBP",
                'returnUrl' => url('charity-success'),
                'cancelUrl' => url('charity-error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function charitypaymentsuccess(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            

            $projects = session('projects');
            $donate = session('donate');
            $others = session('others');
            $taxpayer = session('taxpayer');
            $name = session('name');
            $donating_cause = session('donating_cause');
            $email = session('email');
            $phone = session('phone');
            $prodeccingfee = session('prodeccingfee');
            $comment = session('comment');

            $request->session()->forget('projects');
            $request->session()->forget('donate');
            $request->session()->forget('others');
            $request->session()->forget('taxpayer');
            $request->session()->forget('name');
            $request->session()->forget('donating_cause');
            $request->session()->forget('email');
            $request->session()->forget('phone');
            $request->session()->forget('prodeccingfee');
            $request->session()->forget('comment');

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr = $response->getData();
                $amount = $arr['transactions'][0]['amount']['total'];

                $paypalcommission = $amount * 2.9/100;
                $fixedFee = .30;
                $amt = $amount - $paypalcommission - $fixedFee;

                $chkuser = User::where('email', $email)->first();

                if (Auth::user()) {
                    $userid = Auth::user()->id;
                }elseif (isset($chkuser)) {
                    $userid = $chkuser->id;
                } else {
                    $newuser = new User;
                    $newuser->name = $name;
                    $newuser->sur_name = $name;
                    $newuser->email = $email;
                    $newuser->phone = $phone;
                    $newuser->clientid = time();
                    $newuser->password = Hash::make('123456');
                    $newuser->save();
                    $userid = $newuser->id;
                }
                

                $payment = new Payment();
                if (Auth::user()) {
                    $payment->user_id = Auth::user()->id;
                }else{
                    $payment->user_id = $userid;
                }

                $payment->donation_type_id = $projects;
                $payment->name = $name;
                $payment->donate = $donate;
                $payment->taxpayer = $taxpayer;
                $payment->others = $others;
                $payment->donating_cause = $donating_cause;
                $payment->email = $email;
                $payment->phone = $phone;
                $payment->prodeccingfee = $prodeccingfee;
                $payment->comment = $comment;
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = "GBP";
                $payment->payment_status = $arr['state'];
                $payment->save();


                $trans = new Transaction();
                $trans->date = date('Y-m-d');
                $trans->tran_no = date('his');
                $trans->tran_type = "In";
                if (Auth::user()) {
                    $trans->user_id = Auth::user()->id;
                }else{
                    $trans->user_id = $userid;
                }
                $trans->amount = $amount;
                $trans->total_amount = $amt;
                $trans->token = time();
                $trans->donation_type_id = $projects;
                $trans->name = $name;
                $trans->commission = $prodeccingfee;
                $trans->paypalcommission = $paypalcommission + $fixedFee ;
                $trans->donate = $donate;
                $trans->taxpayer = $taxpayer;
                $trans->others = $others;
                $trans->donating_cause = $donating_cause;
                $trans->email = $email;
                $trans->phone = $phone;
                $trans->prodeccingfee = $prodeccingfee;
                $trans->comment = $comment;
                $trans->description = "Donation";
                $trans->payment_type = "Paypal";
                $trans->notification = "0";
                $trans->status = "0";
                $trans->save();

                $upbalance = DonationType::find($projects);
                $upbalance->collection = $upbalance->collection + $donate + $others;
                $upbalance->save();



                $adminmail = ContactMail::where('id', 1)->first()->email;
                if (Auth::user()) {
                    $contactmail = Auth::user()->email;
                } else {
                    $contactmail = $email;
                }
                
                $ccEmails = [$adminmail];
                
                $msg = EmailContent::where('title','=','donation_success_email')->first()->description;
                $chkpname = DonationType::where('id',$projects)->first();
                if (isset($msg)) {
                    if (Auth::user()) {
                        $array['name'] = Auth::user()->name;
                        $array['email'] = Auth::user()->email;
                    } else {
                        $array['name'] = $name;
                        $array['email'] = $email;
                    }
                
                    $array['subject'] = "Payment confirmation";
                    $array['date'] = $trans->date;
                    $array['appeal'] = $chkpname->title;
                    $array['amount'] = $amount;
                    $array['message'] = $msg;
                    $array['contactmail'] = $contactmail;

                    
                    Mail::to($contactmail)
                        ->cc($ccEmails)
                        ->send(new EventPaymentMail($array));

                }
                

                $tranid = $arr['id'];
                return view('frontend.paypalsuccess', compact('tranid'));

            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return view('frontend.paypalerror');
        }
    }
    
    public function charitypaymenterror()
    { 
        
        return view('frontend.paypaldecline');  
    }


    
}
