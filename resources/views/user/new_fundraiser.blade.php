@extends('frontend.layouts.master')
@section('content')
<style>
    .disabled{
        cursor: not-allowed !important;
    }
</style>
<section class="fundriser">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-9 mx-auto">
                            <div class="ermsg"></div>
                            <div class="title darkerGrotesque-bold lh-1 fs-1">Lets begin your fundriser journey
                            </div>
                            <h5 class="para text-center mt-3 text-muted fs-6">
                                we are here to guide you every step for thre way
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9 mx-auto">
                            <div class="row my-2">
                                <div class="col-lg-6 ">
                                    <label for="" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Select your country</label>
                                    <select name="country" id="country" class="form-control darkerGrotesque-bold fs-5  darkerGrotesque-medium select2">
                                        <option value="">Select Country</option>
                                        @foreach ($country as $cntry)
                                        <option value="{{$cntry->id}}">{{$cntry->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 ">
                                    <label for="" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Why you are fundrising? </label>
                                    <select name="source" id="source" class="form-control darkerGrotesque-bold fs-5 darkerGrotesque-medium select2">
                                        <option value="">Select</option>
                                        <@foreach ($source as $source)
                                        <option value="{{$source->id}}">{{$source->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12 mx-auto">
                            <div class="title darkerGrotesque-bold lh-1 fs-3">Tell us a bit more about your fundriser
                            </div>
                            <h5 class="para text-center mt-3 text-muted fs-6">
                                Who are you fundrising for
                            </h5>

                            <ul class="nav nav-tabs mt-2 border-0 py-4 justify-content-center  bg-transparent" id="myTab"
                                role="tablist">
                                <li class="nav-item fs-5 mx-2" role="presentation">
                                    <div class="nav-link shadow-sm d-flex align-items-center justify-content-center active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" role="tab" aria-controls="home" aria-selected="true">
                                        <div class="fw-bold">Your Self</div>
                                    </div>
                                </li>
                                <li class="nav-item fs-5 mx-2" role="presentation">
                                    <div class="nav-link shadow-sm d-flex align-items-center justify-content-center" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" role="tab" aria-controls="profile"
                                        aria-selected="false">
                                        <div class="fw-bold">Someone Else</div>
                                    </div>
                                </li>
                                <li class="nav-item fs-5 mx-2" role="presentation">
                                    <div class="nav-link shadow-sm d-flex align-items-center justify-content-center" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#contact" role="tab" aria-controls="contact"
                                        aria-selected="false">
                                        <div class="fw-bold">Charity</div>
                                    </div>
                                </li>
                            </ul>
                            <div class="tab-content shadow-sm" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <h4 class="fs-4  mb-2 darkerGrotesque-bold txt-secondary">
                                        How much would you like to raise?</h4>
                                    <h6 class="para text-muted fs-6">Keep the mind that transaction fees, including credit and debit charges are deducted from each donation.</h6>

                                    <input type="number" class="my-3 form-control fs-4" placeholder="Your starting goal" id="raising_goal" name="raising_goal">
                                    <p class="para text-muted fs-6">
                                        To received money raised, please make sure the person withdrawing has:
                                    </p>
                                    <div class="alert  para text-muted fs-6 shadow-sm" role="alert">
                                        <ul class="list-group list-group-numbered">
                                            <li class="list-group-item">A national insurance number</li>
                                            <li class="list-group-item">A bank account in the United Kingdom</li>
                                            <li class="list-group-item">A mailing address in the united kingdom</li>
                                        </ul>
                                    </div>
                                    <div class="title darkerGrotesque-bold lh-1 fs-3 txt-secondary">Add a cover photo or video
                                    </div>
                                    <h5 class="para text-center mt-3 text-muted fs-6">
                                        Who are you fundrising for
                                    </h5>
                                    <div class="row my-3">
                                        <div class="col-lg-6 ">
                                            <label for="image" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Upload Photo</label>
                                            <input type="file" name="image[]" class="form-control" id="image" multiple>
                                            
                                            <div class="col-md-12 my-2" style="display: none">
                                                <div class="preview2"></div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6 ">
                                            <label for="video_link" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Upload Video Link </label>
                                            <input type="text" name="video_link" class="form-control" id="video_link">
                                        </div>

                                    </div>
                                    
                                    <div class="title darkerGrotesque-bold lh-1 fs-3 txt-secondary">Tell donor why you are fundrising </div>
                                    <h5 class="para text-center mt-3 text-muted fs-6">
                                        Some idea to help you start writing
                                    </h5>
                                    <div class="alert  para text-muted fs-6 shadow-sm" role="alert">
                                        <ul class="list-group list-group-numbered">
                                            <li class="list-group-item">Introduce yourself and what you are raising funds for</li>
                                            <li class="list-group-item">Describe why it's important to you</li>
                                            <li class="list-group-item">Explain how the funds will be used</li>
                                        </ul>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-lg-12 mb-3">
                                            <label for="" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Fundriser title</label>
                                            <input type="text" name="title" class="form-control" id="title">
                                        </div>
                                        <div class="col-lg-12 ">
                                            <label for="" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Tell your story </label>
                                            <textarea name="story" id="story" class="form-control"></textarea>
                                        </div>

                                        <div class="col-lg-12 mt-3">
                                            <label for="" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Confirm your charity </label>
                                            <p class="para mb-3 text-muted fs-6 float-start"> <input type="checkbox" class="me-2" id="confirmcondition">lorem, ipsum dolor et semet lorem, ipsum dolor et semetlorem, ipsum dolor et semetlorem, ipsum dolor et semet lorem, ipsum dolor et semet lorem, ipsum dolor et semetlorem, ipsum dolor et semetlorem, ipsum dolor et semet</p>
                                        </div>
                                        <button class="btn-theme bg-secondary mx-auto mt-4 saveBtn" id="saveBtn" disabled>Complete Fundriser</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">...</div>
                                <div class="tab-pane fade" id="contact" role="tabpanel"
                                    aria-labelledby="contact-tab">...</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')
<script>
    
    var storedFiles = [];
    $(document).ready(function() {
        $('#confirmcondition').change(function() {
            if($(this).is(":checked")) {
                $("#saveBtn").prop('disabled', false);
            }else{
                $("#saveBtn").prop('disabled', true);
            }      
        });

        //header for csrf-token is must in laravel
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            //
            var url = "{{URL::to('/user/fund-raise')}}";
            // console.log(url);
            $("#saveBtn").click(function(){
                
                // $("#loading").show();
                var form_data = new FormData();
                for(var i=0, len=storedFiles.length; i<len; i++) {
                    form_data.append('image[]', storedFiles[i]);
                }
                form_data.append("source", $("#source").val());
                form_data.append("country", $("#country").val());
                form_data.append("raising_goal", $("#raising_goal").val());
                form_data.append("video_link", $("#video_link").val());
                form_data.append("title", $("#title").val());
                form_data.append("story", $("#story").val());
                // console.log(image);
                $.ajax({
                    url: url,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data:form_data,
                    success: function (d) {
                        console.log(d);
                        if (d.status == 303) {
                            $(".ermsg").html(d.message);
                        }else if(d.status == 300){
                            pagetop();
                            $(".ermsg").html(d.message);
                            window.setTimeout(function(){location.reload()},2000)
                        }
                    },
                    error: function (d) {
                        console.log(d);
                    }
                });
            });

    });

    // gallery images
        /* WHEN YOU UPLOAD ONE OR MULTIPLE FILES */
        $(document).on('change','#image',function(){
            len_files = $("#image").prop("files").length;
            var construc = "<div class='row'>";
            for (var i = 0; i < len_files; i++) {
                var file_data2 = $("#image").prop("files")[i];
                storedFiles.push(file_data2);
                construc += '<div class="col-3 singleImage my-3"><span data-file="'+file_data2.name+'" class="btn ' +
                    'btn-sm btn-danger imageremove2">&times;</span><img width="120px" height="auto" src="' +  window.URL.createObjectURL(file_data2) + '" alt="'  +  file_data2.name  + '" /></div>';
            }
            construc += "</div>";
            $('.preview2').append(construc);
        });

        $(".preview2").on('click','span.imageremove2',function(){
            var trash = $(this).data("file");
            for(var i=0;i<storedFiles.length;i++) {
                if(storedFiles[i].name === trash) {
                    storedFiles.splice(i,1);
                    break;
                }
            }
            $(this).parent().remove();

        });
</script>
@endsection
