@extends('frontend.layouts.master')

@section('title')
- Event Ticket Sales Report
@endsection

@section('content')
<style>
    .modal-form{
        margin: 0px 0 !important;
    }
</style>
<section class="bleesed default">
    <div class="container">

        <div class="row"> 
            <div class="col-lg-6 mt-2">
                <a href="{{ route('user.myevent')}}" class="btn-theme bg-primary text-center">Back</a>

                <button type="button"  class="btn-theme bg-secondary text-center" style="border: none;background: #18988b;color: white;" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Withdraw
                </button>
                
                <a href="{{ route('user.eventtransaction',$data->id)}}" class="btn-theme bg-secondary text-center">Transaction</a>

            </div> 
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h2 class="fw-bold darkerGrotesque-bold txt-primary mb-3">{{$data->title}} Booking record</h2>
            </div>
            {{-- <div class="col-lg-6 d-flex align-items-center justify-content-end fs-5">
                <form action="" class="d-flex">
                    <div class="me-2">
                        <label for="">From</label>
                        <input type="date" class="form-control fs-5" style="height: 46px;" placeholder="Search">

                    </div>
                    <div class="d-flex align-items-end">
                        <div  class="me-2">
                            <label for="">To</label>
                            <input type="date" class="form-control fs-5" style="height: 46px;" placeholder="Search">
                        </div>
                        <button class="btn btn-theme bg-primary m-0" style="height:46px;">
                            <iconify-icon
                                icon="material-symbols:search-sharp"></iconify-icon>
                            </button>
                    </div>
                </form>
            </div> --}}
        </div>
        <div class="row ">
            <div class="col-lg-12">
                <div class="table-responsive shadow-sm px-4">
                    <table class="table table-theme mt-4 table-striped" id="example">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Reference Id</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Customer Email</th>
                                <th scope="col">Customer Phone</th>
                                <th scope="col">Payment Type</th>
                                <th scope="col">Ticket Type</th>
                                <th scope="col">Note</th>
                                <th scope="col">Gross</th>
                                <th scope="col">Fee</th>
                                <th scope="col">Net</th>
                                <th scope="col">Balance</th>
                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <?php
                            $tbalance = $netamount;
                        ?>
                        <tbody>
                            @foreach ($data->eventticket as $sale)
                            @php
                                $totalfee = $sale->commission + $sale->fixed_fee;
                                $netamnt = $sale->total_amount - $totalfee;
                            @endphp
                            <tr>
                                <td class="fs-16 txt-primary">{{ \Carbon\Carbon::parse($sale->date)->format('d/m/Y') }}</td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="fs-20 txt-primary fw-bold text-center">{{$sale->tran_no}}</span>
                                    </div>
                                </td>
                                
                                <td class="fs-16 txt-primary">
                                    {{\App\Models\User::where('id',$sale->user_id)->first()->name}}
                                </td>
                                
                                <td class="fs-16 txt-primary">
                                    {{\App\Models\User::where('id',$sale->user_id)->first()->email}}
                                </td>
                                
                                <td class="fs-16 txt-primary text-center">
                                    {{\App\Models\User::where('id',$sale->user_id)->first()->phone}}
                                </td>
                                <td class="fs-16 txt-primary text-center">
                                    {{$sale->payment_type}}
                                </td>
                                
                                <td class="fs-16 txt-primary text-center">
                                    {{$sale->ticket_type}}
                                </td>

                                <td class="fs-16 txt-primary text-center">
                                    {{$sale->note}}
                                </td>

                                <td class="fs-16 txt-primary text-center">
                                    £{{ number_format($sale->total_amount, 2) }}
                                </td>
                                
                                <td class="fs-16 txt-primary text-center">
                                    £{{ number_format($totalfee, 2) }}
                                </td>
                                
                                <td class="fs-16 txt-primary text-center">
                                    £{{ number_format($netamnt, 2) }}
                                </td>

                                <td class="fs-16 txt-primary text-center">
                                    £{{ number_format($tbalance, 2) }}
                                </td>
                                @php
                                    $tbalance = $tbalance - $netamnt;
                                @endphp


                                {{-- <td class="fs-16 txt-primary">
                                    <a href="#" target="_blank" class="text-decoration-none bg-primary text-white py-1 px-3 rounded mb-1 text-center"><i class="fa fa-download" style="color: #2196f3;font-size:16px;"></i>  Download</a>
                                </td> --}}
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


    <!--Login  Modal -->
    <div  class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    
                <div class="title text-center txt-secondary">Withdraw Request</div>

                @if(session()->has('message'))
                <p class="alert alert-success"> {{ session()->get('message') }}</p>
                @endif

                <div class="ermsg"></div>
                 
                <div class="form-custom">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 text-start">
                            <div>
                                <label for="event_name" class="fs-5 fw-bold ">Event name</label>
                                <input type="text" class="form-control modal-form" name="event_name" id="event_name" placeholder="Event name" value="{{$data->title}}" /> 
                                <input type="hidden" name="event_id" id="event_id" value="{{$data->id}}" /> 
                            </div>

                            <div>
                                <label for="amount" class="fs-5 fw-bold ">Amount</label>
                                <input type="number" class="form-control modal-form" name="amount" id="amount" placeholder="Amount" value="{{$netamount}}" /> 
                            </div>

                            <div>
                                <label for="amount" class="fs-5 fw-bold ">Note</label>
                                <textarea name="note" id="note" cols="30" rows="5" class="form-control modal-form"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div>
                                <label for="bank_name" class="fs-5 fw-bold ">Bank name</label>
                                <input type="text" class="form-control modal-form" name="bank_name" id="bank_name" value="{{Auth::user()->bank_name}}" placeholder="Bank name" /> 
                            </div>

                            <div>
                                <label for="bank_account_name" class="fs-5 fw-bold ">Bank A/C name</label>
                                <input type="text" class="form-control modal-form" name="bank_account_name" id="bank_account_name" value="{{Auth::user()->account_name}}" placeholder="Bank A/C name" /> 
                            </div>

                            <div>
                                <label for="bank_account_number" class="fs-5 fw-bold ">Bank A/C number</label>
                                <input type="text" class="form-control modal-form" name="bank_account_number" id="bank_account_number" value="{{Auth::user()->account_number}}" placeholder="Bank A/C number" /> 
                            </div>

                            <div>
                                <label for="bank_account_sort_code" class="fs-5 fw-bold ">Bank A/C sort code</label>
                                <input type="text" class="form-control modal-form" name="bank_account_sort_code" id="bank_account_sort_code" placeholder="Bank A/C sort code" value="{{Auth::user()->account_sortcode}}" /> 
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" name="submit" id="addBtn" class="btn-theme bg-primary d-block text-center mx-0 w-100" value="Submit" />
                    </div>
                    
                </div>
            </div>
          </div>
        </div>
    </div>


@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script> 
<script>
    
$(document).ready(function () { 
    //header for csrf-token is must in laravel
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    //
    var url = "{{URL::to('/user/event-withdraw-request')}}";
    // console.log(url);

    $("#addBtn").click(function(){
        // event create 
            var form_data = new FormData();
            form_data.append("event_name", $("#event_name").val());
            form_data.append("event_id", $("#event_id").val());
            form_data.append("bank_name", $("#bank_name").val());
            form_data.append("bank_account_name", $("#bank_account_name").val());
            form_data.append("amount", $("#amount").val());
            form_data.append("bank_account_number", $("#bank_account_number").val());
            form_data.append("bank_account_sort_code", $("#bank_account_sort_code").val());
            form_data.append("note", $("#note").val());
            
            
            $.ajax({
                url: url,
                method: "POST",
                contentType: false,
                processData: false,
                data:form_data,
                success: function (d) {
                    if (d.status == 303) {
                        $(".ermsg").html(d.message);
                    }else if(d.status == 300){
                        $(".ermsg").html(d.message);
                        window.setTimeout(function(){location.reload()},2000);
                    }
                },
                error: function (d) {
                    console.log(d);
                }
            });
        // event create 
    });

});
</script>
@endsection
