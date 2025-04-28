<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Contact;
use App\Models\User;
use App\Models\ContactMail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactFormMail;
use App\Models\CampaignShare;
use App\Models\Category;
use App\Models\Contributor;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Volunteer;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\SectionStatus;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\BlogCategory;

class FrontendController extends Controller
{
    public function index()
    {  
        $galleries = Gallery::where('status', 1)->latest()->get();
        $categories = Category::has('gallery')->latest()->get();
        $textBlogCategories = BlogCategory::where('status', 1)
        ->where('type', 1)
        ->with(['blogs' => function($q) {
            $q->where('status', 1)
              ->where('type', 1)
              ->latest();
        }])
        ->latest()
        ->get();

        $videoBlogCategories = BlogCategory::where('status', 1)
        ->where('type', 2)
        ->with(['blogs' => function($q) {
            $q->where('status', 1)
              ->where('type', 2)
              ->latest();
        }])
        ->latest()
        ->get();
    
        $section_status = SectionStatus::first();
        return view('frontend.index', compact('galleries', 'categories', 'section_status', 'textBlogCategories', 'videoBlogCategories'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function gallery()
    {
        $galleries = Gallery::all();
        $categories = Category::all();
        return view('frontend.gallery', compact('galleries', 'categories'));
    }

    public function work()
    {
        return view('frontend.work');
    }
    
    public function giftaid()
    {
        return view('frontend.giftaid');
    }
    
    public function advisor()
    {
        return view('frontend.advisor');
    }

    public function volunteer()
    {
        return view('frontend.volunteer');
    }

    public function volunteerCreate()
    {
        return view('frontend.volunteerform');
    }

    public function network()
    {
        return view('frontend.network');
    }

    public function trustees()
    {
        return view('frontend.trustees');
    }

    public function directors()
    {
        return view('frontend.directors');
    }

    public function news()
    {
        return view('frontend.news');
    }


    public function contact()
    {
        return view('frontend.contact');
    }

    public function terms()
    {
        return view('frontend.terms');
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }

    public function faq()
    {
        return view('frontend.faq');
    }

    public function donation()
    {
        return view('frontend.donation');
    }

    public function getContributors()
    {
        $data = Contributor::orderby('id','DESC')->get();
        return view('frontend.allcontributors', compact('data'));
    }

    

    public function campaignDetails($id)
    {
        $shareComponent = \Share::page(
            URL::current(),
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->whatsapp();

        $campaign = Campaign::where('id','!=',$id)->whereStatus(1)->orderby('id','DESC')->get();
        $data = Campaign::with('campaignimage','campaignshare')->where('id',$id)->first();
        $chkshareids = CampaignShare::where('campaign_id',$id)->pluck('user_id');
        // dd($chkshareid);
        $totalcollection = Transaction::where('campaign_id',$id)->where('tran_type','In')->sum('amount');
        
        $doners = Transaction::selectRaw('SUM(amount) as sumamount, donation_display_name')->where([
            ['campaign_id','=', $id]
        ])->groupBy('donation_display_name')->orderby('id','DESC')->limit(5)->get();

        $alldoners = Transaction::selectRaw('SUM(amount) as sumamount, donation_display_name')->where([
            ['campaign_id','=', $id]
        ])->groupBy('donation_display_name')->orderby('id','DESC')->get();

        // dd($doners);
        return view('frontend.campaigndetails', compact('data','campaign','shareComponent','totalcollection','doners','chkshareids','alldoners'));
    }

    public function visitorContact(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $visitor_subject = $request->subject;
        $visitor_message = $request->message;

        $emailValidation = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,10}$/";

        if(empty($name)){
            $message ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Please fill name field, thank you!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        
        if(empty($email)){
            $message ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Please fill email field, thank you!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(!preg_match($emailValidation,$email)){
	    
            $message ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Your mail ".$email." is not valid mail. Please wirite a valid mail, thank you!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
            
        }
        
        if(empty($visitor_subject)){
            $message ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Please fill subject field, thank you!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($visitor_message)){
            $message ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Please write your query in message field, thank you!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        $contactmail = ContactMail::where('id', 1)->first()->email;
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email; 
        $contact->subject = $request->subject; 
        $contact->message = $request->message; 
        if ($contact->save()) {

            $array['name'] = $request->name;
            $array['email'] = $request->email;
            $array['subject'] = $request->subject;
            $array['message'] = $request->message;
            $array['contactmail'] = $contactmail;
            Mail::to($contactmail)
            ->send(new ContactFormMail($array));
            

            // Mail::to($contactmail)->queue(new ContactFormMail($array));

            
            // $array['name'] = $request->name;
            // $array['email'] = $request->email;
            // $array['subject'] = $request->subject;
            // $array['message'] = $request->message;
            // $array['contactmail'] = $contactmail;

            // $email_to = "kazimuhammadullah@gmail.com";
            // Mail::send('emails.contactmail', compact('array'), function($message)use($array,$email_to) {
            //     $message->from('info@fancybeautyhairprofessional.com', 'Test International');
            //     $message->to($email_to)
            //     ->subject($array["subject"]);
            //     });

            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Message Send Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error']);
        }
    }

    public function campaignMessage(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $visitor_subject = $request->subject;
        $visitor_message = $request->message;

        $emailValidation = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,10}$/";

        if(empty($name)){
            $message ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Please fill name field, thank you!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        
        if(empty($email)){
            $message ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Please fill email field, thank you!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(!preg_match($emailValidation,$email)){
	    
            $message ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Your mail ".$email." is not valid mail. Please wirite a valid mail, thank you!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
            
        }
        
        if(empty($visitor_subject)){
            $message ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Please fill subject field, thank you!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($visitor_message)){
            $message ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Please write your query in message field, thank you!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

      
        $userid = Campaign::where('id',$request->campaignid)->first()->user_id;
        $contactmail = User::where('id', $userid)->first()->email;

            $array['name'] = $request->name;
            $array['email'] = $request->email;
            $array['subject'] = $request->subject;
            $array['message'] = $request->message;
            $array['contactmail'] = $contactmail;
            Mail::to($contactmail)->send(new ContactFormMail($array));

            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Message Send Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        
    }

    public function eventDetails($id)
    {
        $shareComponent = \Share::page(
            URL::current(),
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->whatsapp();

        $data = Event::with('eventimage')->where('id',$id)->first();
        

        // dd($doners);
        return view('frontend.eventdetails', compact('data','shareComponent'));
    }

    public function charityCampaign()
    {
        $charities = User::select('photo','id','name','postcode','town','street_name','house_number')->where('is_type', '2')->limit(6)->orderby('id','DESC')->where('status','1')->get();

        return view('frontend.charitycampaign',compact('charities'));
    }

    public function charityDetails($id)
    {
        $facebook = \Share::page(
            URL::current(),
            'Your share text comes here',
        )
        ->facebook();

        $twitter = \Share::page(
            URL::current(),
            'Your share text comes here',
        )
        ->facebook()
        ->twitter();

        $data = User::where('id',$id)->first();
        

        // dd($doners);
        return view('frontend.charitydetails', compact('data','facebook','twitter'));
    }


    public function volunteerStore(Request $request)
    {
        $contactmail = ContactMail::where('id', 1)->first()->email;

        $data = new Volunteer();
        $data->volunteerid = time();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->profession = $request->profession;
        $data->address = $request->address;
        $data->print_name = $request->print_name;
        $data->date = $request->date;
        $data->dob = $request->dob;
        $data->status = 0;
        if ($data->save()) {

            $array['name'] = $request->name;
            $array['email'] = $request->email;
            $array['subject'] = "Volunteer Registration Form";
            $array['message'] = "Some text here";
            $array['contactmail'] = $contactmail;
            // Mail::to($contactmail)
            // ->send(new ContactFormMail($array));

            
            return view('frontend.volunteerform')
            ->with('message','Registration Successful.');
        } else {
            return view('frontend.volunteerform')
            ->with('error','Registration Fail.');
        }
    }

    public function blogDetails($slug)
    {
        $blog = Blog::with([
            'comments' => function ($query) {
                $query->where('status', 1);
            },
            'images' 
        ])->where('slug', $slug)->firstOrFail();
    
        return view('frontend.blog_details', compact('blog'));
    }    

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
        ]);

        BlogComment::create([
            'blog_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'status' => 0,
        ]);

        return back()->with('success', 'Your comment has been submitted and is awaiting approval.');
    }
}
