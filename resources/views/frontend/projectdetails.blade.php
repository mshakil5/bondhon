@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')

<style>
    div#social-links {
        margin: 0 auto;
        max-width: 500px;
    }
    div#social-links ul li {
        display: inline-block;
    }          
    div#social-links ul li a {
        padding: 14px;
        border: 1px solid #ccc;
        margin: 1px;
        font-size: 30px;
        color: #0c4c45;
        background-color: #ccc;
    }
</style>

<section class="bleesed default">
    <div class="container">
        <div class="row">
            
            <h3 class="fw-bold txt-primary mb-4">{{$data->title}}</h3>
            @if(session()->has('error'))
                <p class="alert alert-danger"> {{ session()->get('error') }}</p>
            @endif

            <div class='col-md-8'>
                <div class="popup-gallery shadow-sm p-4 bg-white">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                                <div class="carousel-item  active">
                                    <a href="#" class="img-fluid" title="Some Text for the image">
                                        <img src="{{asset('images/'.$data->image)}}" style="width:100%;height:330px" class="img-fluid" alt="Alt text" />
                                    </a>
                                </div>
                          
                        </div>
                    </div>
                </div>
                <div>
                    <ul class="nav nav-tabs justify-content-start mt-4 mb-2 rounded-0" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fs-5 active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Story</button>
                        </li>
                        
                    </ul>
                    <div class="tab-content fs-5 mb-4" id="myTabContent">
                        <div class="tab-pane fade p-4 bg-white show text-justify active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            {!!$data->description!!}
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-md-4'>

                <div>
                    
                    <div class=" display-6 fw-bold"> £@if (isset($totalcollection))
                        {{$data->collection}}
                    @else {{$data->collection}} @endif  </div>
                    <span class="w-100 fw-bold">raised of £{{$data->goal}} goal</span> 

                    <div class="d-flex justify-content-between my-3 ">
                        
                            <a href="{{url('donation?pid='.$data->id)}}" class="btn-theme bg-secondary w-100 me-1 ms-0">Donate Now</a>
                        
                        <button class="btn-theme bg-primary w-100 ms-1" data-bs-toggle="modal"
                            data-bs-target="#shareModal">Share</button>
                    </div>
                    <div class="card p-4 rounded sideCard">
                       
                        {{-- @foreach ($doners as $doner)

                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    
                                    <h5 class="user d-inline ms-2 fw-bold">
                                        {{$doner->donation_display_name}}
                                    </h5>
                                </div>
                                <h5 class="fw-bold mb-0">£{{$doner->sumamount}}</h5>
                            </div>
                        @endforeach --}}

                        <div class="about-card text-center" style="background: #ffffff">

                            {!! QrCode::size(250)->generate(URL::current()) !!}
                            
                        </div>
                        
                    </div>
                </div>

            </div>
        <div>
        <div class="row">
            <div class="col-lg-8">
                
                
            </div>
            <div class="col-lg-4">

                {{-- qr code scanner  --}}
                {{-- <div class="card p-4 rounded">
                    
                </div> --}}


            </div>
        </div>
    </div>
</section>
    <!-- share modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content fs-5 darkerGrotesque-semibold ">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="shareModalLabel">Help by sharing</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-dark lh-1">Sharing the donation link is a simple yet impactful way to make a difference.</p>
                    <hr>
                    <div class="shareIcons">
                        {!! $shareComponent !!}
                    </div>
                    <div class="d-flex align-items-center">
                        <input type="text" class="form-control fs-5"  id="myInput" style="height:46px;"
                            value="{{ URL::current() }}@if (Auth::user())?uid={{Auth::user()->id}} @else @endif">
                        <button class="btn btn-theme bg-primary"  onclick="copyTextFS()">Copy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    

         
@endsection

@section('script')
<script>
    function copyTextFS() {
        // Get the text field
        var copyText = document.getElementById("myInput");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
        alert("Copied the text: " + copyText.value);
    }
</script>
<script>
    $(document).ready(function () {


        //header for csrf-token is must in laravel
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

           //  make mail start
           var url = "{{URL::to('/campaign-message')}}";
           $("#submit").click(function(){
            
                   var name= $("#name").val();
                   var email= $("#msgemail").val();
                   var subject= $("#subject").val();
                   var message= $("#message").val();
                   var campaignid= $("#campaignid").val();
                   $.ajax({
                       url: url,
                       method: "POST",
                       data: {name,email,subject,message,campaignid},
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


           //  make mail start
           var cmnturl = "{{URL::to('/campaign-comment')}}";
           $("#commentsubmit").click(function(){
            
                   var comment = $("#comment").val();
                   var campaignid = $("#campaignid").val();
                   $.ajax({
                       url: cmnturl,
                       method: "POST",
                       data: {comment,campaignid},
                       success: function (d) {
                           if (d.status == 303) {
                               $(".cmntermsg").html(d.message);
                           }else if(d.status == 300){
                               $(".cmntermsg").html(d.message);
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

    $(document).on('click', '.btn-contact', function () {
        $('#loginModal').find('.modal-body #conid').val(1);
    });
</script>

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
<script>
$(document).ready(function () {
    // $('#loginModal').modal('show');
    window.$('#loginModal').modal();
});
</script>
@endif

@endsection