@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')


<section class="contact spacer bg-light">
    <div class="container">
        <div class="row ">
            <div class="col-md-6">
                <h2 class="title-global">Contact Us</h2>
                
                <div class="my-3">
                    <h6 class="txt-secondary fw-bold fs-4">
                       
                        <span> Phone Number</span>
                    </h6>
                    <h5 class="txt-primary fs-6">
                        {{\App\Models\CompanyDetail::where('id',1)->first()->phone1 }}
                    </h5>
                </div>
                <div class="my-3">
                    <h6 class="txt-secondary fw-bold fs-4">
                       
                        <span> Email Address</span>
                    </h6>
                    <h5 class="txt-primary fs-6">
                        {{\App\Models\CompanyDetail::where('id',1)->first()->email1 }}
                    </h5>
                </div>
                <div class="my-3">
                    <h6 class="txt-secondary fw-bold fs-4">
                       
                        <span>Our Location</span>
                    </h6>
                    <h5 class="txt-primary fs-6">
                        {{\App\Models\CompanyDetail::where('id',1)->first()->address1 }}
                    </h5>
                </div>
            </div>
            <div class="col-md-6  p-5 bg-white">
                <h6 class="txt-primary fs-4 d-flex align-items-center">
                    <iconify-icon class="me-2" icon="arcticons:nextcloudsms"></iconify-icon>
                    Send Message
                </h6>
                <h2 class="title-global">Feel Free To Write Us Message.</h2>
                <div class="ermsg"></div>
                <div class=" mt-4">
                    <div class="form-group mb-3">
                        <input class="form-control fw-bold" type="text" name="name" id="name" placeholder="Name" required="">
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-control fw-bold" type="email" id="email" name="email" placeholder="Email" required="">
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-control fw-bold" type="text" id="subject" name="subject" placeholder="Subject" required="">
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control fw-bold" rows="3" id="message" name="message" placeholder="Message" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <button id="submit" class="btn-theme text-center border-0">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')

<script>
    $(document).ready(function () {


        //header for csrf-token is must in laravel
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

           //  make mail start
           var url = "{{URL::to('/contact-submit')}}";
           $("#submit").click(function(){

            
                   var name= $("#name").val();
                   var email= $("#email").val();
                   var subject= $("#subject").val();
                   var message= $("#message").val();
                   $.ajax({
                       url: url,
                       method: "POST",
                       data: {name,email,subject,message},
                       success: function (d) {
                           if (d.status == 303) {
                               $(".ermsg").html(d.message);
                           }else if(d.status == 300){
                               $(".ermsg").html(d.message);
                               window.setTimeout(function(){location.reload()},2000)
                           }
                       },
                       error: function (d) {
                           console.log(d);
                       }
                   });

           });
           // send mail end


    });
</script>
@endsection