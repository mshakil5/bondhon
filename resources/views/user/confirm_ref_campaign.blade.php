@extends('frontend.layouts.master')
@section('content')


@php
    if (isset($_GET["campaignid"])) {
        $campaignid = $_GET["campaignid"];
    } 

    if (isset($_GET["uid"])) {
        $uid = $_GET["uid"];
    } 
    
    $data = \App\Models\Campaign::with('campaignimage')->where('id',$campaignid)->first()

@endphp



<section class="bleesed default">
    <div class="container">
        <div class="row">
            <h3 class="fw-bold txt-primary mb-4">{{$data->title}}</h3>
            <div class="col-lg-8">
                <div class="popup-gallery shadow-sm p-4 bg-white">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($data->campaignimage as $key => $img)
                                <div class="carousel-item @if ($key == 0) active @endif">
                                    <a href="{{asset('images/campaign/'.$data->image)}}" class="img-fluid" title="Some Text for the image">
                                        <img src="{{asset('images/campaign/'.$data->image)}}" class="img-fluid" alt="Alt text" />
                                    </a>
                                </div>
                            @endforeach
                          

                          @if (isset($data->video_link))
                            <div class="carousel-item">
                                <a href="{{$data->video_link}}" class="video" title="This is a video">
                                    <img src="{{$data->video_link}}" alt="Video link" />
                                </a>
                            </div> 
                          @endif
                          
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <ul class="nav nav-tabs justify-content-start mt-4 mb-2 rounded-0" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5 active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true">Story</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                            aria-controls="profile-tab-pane" aria-selected="false">Update</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5" id="contact-tab" data-bs-toggle="tab"
                            data-bs-target="#contact-tab-pane" type="button" role="tab"
                            aria-controls="contact-tab-pane" aria-selected="false">Comments</button>
                    </li>
                    
                </ul>
                <div class="tab-content fs-5 mb-4" id="myTabContent">
                    <div class="tab-pane fade p-4 bg-white show active" id="home-tab-pane" role="tabpanel"
                        aria-labelledby="home-tab" tabindex="0">
                        {!!$data->story!!}
                    </div>
                    <div class="tab-pane fade p-4 bg-white" id="profile-tab-pane" role="tabpanel"
                        aria-labelledby="profile-tab" tabindex="0">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, deserunt a, nesciunt
                        explicabo culpa officia aperiam repellat, enim q a, cumque saepe.
                    </div>
                    <div class="tab-pane fade p-4 bg-white" id="contact-tab-pane" role="tabpanel"
                        aria-labelledby="contact-tab" tabindex="0">
                        Lorem ipsum dolor llat, enim quod veritatis fugit mollitia! Dicta, cumque saepe.
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-4">
                

                <div class="card p-4 rounded sideCard mb-3">
                    @if (isset($message))
                    <div class="alert alert-danger" role="alert">
                        <strong><p style="color: red">{{ $message }}</p></strong>
                    </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger mt-2">{{ Session::get('error') }} 
                        </div>
                    @endif

                    <form method="POST" action="{{route('user.confirmrefcapmaign')}}" class="form-custom">
                        @csrf
        
                        <div class="form-group">
                            <input type="hidden" name="ref_from_id" id="ref_from_id" value="{{$uid}}">
                            <input type="hidden" name="ref_to_id" id="ref_to_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="campaignid" id="campaignid" value="{{$data->id}}">
                            <label for="" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Confirm your charity </label>
                            <p class="para mb-3 text-muted fs-6 float-start"> <input type="checkbox" class="me-2" id="confirmcondition" required> If you agree then checked this.</p>
                        </div>
                        
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn-theme bg-primary d-block text-center mx-0 w-100">Confirm </button>
                        </div>
                        
                    </form>
                    
                    
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
            //
        // var url = "{{URL::to('/admin/why-choose-us')}}";
        // console.log(url);
        // $("#refsubBtn").click(function(){

        //     var form_data = new FormData();
        //     form_data.append("description", $("#description").val());
        //     $.ajax({
        //         url: refurl,
        //         method: "POST",
        //         contentType: false,
        //         processData: false,
        //         data:form_data,
        //         success: function (d) {
        //             if (d.status == 303) {
        //                 $(".ermsg").html(d.message);
        //             }else if(d.status == 300){
        //             success("Data Insert Successfully!!");
        //                 window.setTimeout(function(){location.reload()},2000)
        //             }
        //         },
        //         error: function (d) {
        //             console.log(d);
        //         }
        //     });
        // });


});


</script>



@endsection
