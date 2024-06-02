@extends('frontend.layouts.master')

@section('content')

<section class="campaign default" id="viewContainer">
    <div class="container">

        <div class="row"> 
            <div class="col-lg-10 mt-2">
                <a href="{{ route('charity.charity_details')}}" class="btn-theme bg-secondary text-center">Details</a>
                <a href="{{ route('charity.bank_details')}}" class="btn-theme bg-secondary text-center">Bank Information</a>
                <a href="{{ route('charity.charitytransaction', Auth::user()->id)}}" class="btn-theme bg-secondary text-center">Transaction</a>
            </div> 
        </div>
       
       <div class="col-lg-10 mx-auto">
        <h3 class="fw-bold darkerGrotesque-bold txt-primary mb-2">Your Profile</h3>
        <div class="row">
            <div class="col-lg-4 fs-5 shadow-sm p-4 border">
                @if (isset(Auth::user()->photo))
                    <img src="{{ asset('images/'.Auth::user()->photo)}}" class="img-fluid" alt="">
                @else
                    <img src="https://via.placeholder.com/510x440.png" class="img-fluid" alt="">
                @endif
                
            </div>
            <div class="col-lg-8 fs-5 shadow-sm p-4 border d-flex align-items-center position-relative">
                <div class="row darkerGrotesque-semibold "> 

                        <p class="mb-1"> Charity Name: {{ Auth::user()->name }} </p>
                        <p class="mb-1"> Charity Registration Number: {{ Auth::user()->charity_reg_number }} </p>
                        <p class="mb-1"> Email: {{ Auth::user()->email }} </p>
                        <p class="mb-1"> House Number: {{ Auth::user()->house_number }} </p>
                        <p class="mb-1"> Street: {{ Auth::user()->street_name }} </p>
                        <p class="mb-1"> Town: {{ Auth::user()->town }} </p>
                        <p class="mb-1"> Post Code: {{ Auth::user()->postcode }} </p>
                
                </div>
                <button class="editProfile" id="editProfileBtn"><iconify-icon icon="material-symbols:edit"></iconify-icon></button>
            </div>

        </div>
       </div>


       <div class="col-lg-10 mx-auto">
        <h3 class="fw-bold darkerGrotesque-bold txt-primary mb-2">Representative Information</h3>
        <div class="row">
            <div class="col-lg-4 fs-5 shadow-sm p-4 border">
                @if (isset(Auth::user()->r_photo))
                    <img src="{{ asset('images/'.Auth::user()->r_photo)}}" class="img-fluid" alt="">
                @else
                    <img src="https://via.placeholder.com/510x440.png" class="img-fluid" alt="">
                @endif
                
            </div>
            <div class="col-lg-8 fs-5 shadow-sm p-4 border d-flex align-items-center position-relative">
                <div class="row darkerGrotesque-semibold "> 

                        <p class="mb-1"> Representative Name: {{ Auth::user()->r_name }} </p>
                        <p class="mb-1"> Email: {{ Auth::user()->email }} </p>
                        <p class="mb-1"> Position: {{ Auth::user()->r_position }} </p>
                        <p class="mb-1"> Phone: {{ Auth::user()->r_phone }} </p>
                
                </div>
            </div>

        </div>
       </div>



    </div>
</section>

<section class="campaign default" id="editContainer">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12 fs-5 shadow-sm p-4 border">
                <div class="row">
                    <h3 class="fw-bold darkerGrotesque-bold txt-primary">Charity Information</h3>
                </div>
                <div class="row darkerGrotesque-semibold">
                    <div class="col-lg-10">
                        <div class="ermsg"></div>
                        <div class="row">
                            <div class="col-lg-4 ">
                                <label for="name">Charity Name</label>
                                <div class="form-group mb-3">
                                    <input class="form-control fs-5" type="text" id="name" name="name" value="{{Auth::user()->name}}" placeholder="Charity Name">
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <label for="charity_reg_number">Charity Registration Number</label>
                                <div class="form-group mb-3">
                                    <input class="form-control fs-5" type="text" id="charity_reg_number" name="charity_reg_number" value="{{Auth::user()->charity_reg_number}}" placeholder="Charity Registration Number">
                                </div> 
                            </div>
                            
                            <div class="col-lg-4">
                                <label for="house_number">House Number</label>
                                <div class="form-group mb-3">
                                    <input class="form-control fs-5" type="text" id="house_number" name="house_number" value="{{Auth::user()->house_number}}" placeholder="House Number">
                                </div> 
                            </div>
                            <div class="col-lg-4">
                                <label for="street_name">Street Name</label>
                                <div class="form-group mb-3">
                                    <input class="form-control fs-5" type="text" id="street_name" name="street_name" value="{{Auth::user()->street_name}}" placeholder="Street Name">
                                </div> 
                            </div>
                            <div class="col-lg-4">
                                <label for="town">Town</label>
                                <div class="form-group mb-3">
                                    <input class="form-control fs-5" type="text" id="town" name="town" value="{{Auth::user()->town}}" placeholder="Town">
                                </div> 
                            </div>
                            <div class="col-lg-4">
                                <label for="postcode">Postcode</label>
                                <div class="form-group mb-3">
                                    <input class="form-control fs-5" type="text" id="postcode" name="postcode" value="{{Auth::user()->postcode}}" placeholder="Postcode">
                                </div> 
                            </div>

                            

                            
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group mb-3 text-center">
                            @if (isset(Auth::user()->photo))
                                <img src="{{ asset('images/'.Auth::user()->photo)}}" class="img-fluid mb-2 mx-auto rounded " width="120px" alt="">
                            @else
                                <img src="https://via.placeholder.com/510x440.png" class="img-fluid mb-2 mx-auto rounded " width="120px" alt="">
                            @endif
                            <p class="mb-1 text-start">Charity Photo</p>
                            <input class="form-control fs-5" type="file" id="image" name="image">
                        </div>
                    </div>

                    <div class="row">
                        <h3 class="fw-bold darkerGrotesque-bold txt-primary">Representative Information</h3>
                    </div>

                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-4 ">
                                <label for="r_name">Name</label>
                                <div class="form-group">
                                    <input class="form-control fs-5" type="text" id="r_name" name="r_name" value="{{Auth::user()->r_name}}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="r_position">Position</label>
                                <div class="form-group">
                                    <input class="form-control fs-5" type="text" id="r_position" name="r_position" value="{{Auth::user()->r_position}}" placeholder="Position">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="r_phone">Phone</label>
                                <div class="form-group">
                                    <input class="form-control fs-5" type="text" id="r_phone" name="r_phone" value="{{Auth::user()->r_phone}}" placeholder="Representative Phone">
                                </div> 
                            </div>
                            <div class="col-lg-4">
                                <label for="email">Email</label>
                                <div class="form-group">
                                    <input class="form-control fs-5" type="email" id="email" name="email" value="{{Auth::user()->email}}" placeholder="Email">
                                </div> 
                            </div>
                            
                            <div class="col-lg-4">
                                <label for="password">Password</label>
                                <div class="form-group">
                                    <input class="form-control fs-5" type="password" id="password" name="password" placeholder="Password">
                                </div> 
                            </div>
                            <div class="col-lg-4">
                                <label for="confirm_password">Confirm Password</label>
                                <div class="form-group">
                                    <input class="form-control fs-5" type="password" id="confirm_password"  placeholder="Confirm Password">
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group mb-3 text-center">
                            @if (isset(Auth::user()->r_photo))
                                <img src="{{ asset('images/'.Auth::user()->r_photo)}}" class="img-fluid mb-2 mx-auto rounded " width="120px" alt="">
                            @else
                                <img src="https://via.placeholder.com/510x440.png" class="img-fluid mb-2 mx-auto rounded " width="120px" alt="">
                            @endif
                            <p class="mb-1 text-start">Representative Photo</p>
                            <input class="form-control fs-5" type="file" id="r_photo" name="r_photo">
                        </div>
                    </div>
                   
                    
                    <div class="col-lg-12 mt-3">
                        <div class="form-group">
                            <button id="updateBtn" class="ms-0 btn-theme bg-primary">Update Profile</button>
                            <button id="FormCloseBtn" class="ms-0 btn-theme bg-secondary">Close</button>
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
    $(document).ready(function () {

        $("#editContainer").hide();
        $("#editProfileBtn").click(function(){
            $("#viewContainer").hide(100);
            $("#editContainer").show(300);

        });
        $("#FormCloseBtn").click(function(){
            $("#editContainer").hide(200);
            $("#viewContainer").show(100);
        });

        //header for csrf-token is must in laravel
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            //
            var url = "{{URL::to('/charity/profile-update')}}";
            // console.log(url);
            $("#updateBtn").click(function(){
                var file_data = $('#image').prop('files')[0];
                if(typeof file_data === 'undefined'){
                    file_data = 'null';
                }

                var r_photo = $('#r_photo').prop('files')[0];
                if(typeof r_photo === 'undefined'){
                    r_photo = 'null';
                }


                var form_data = new FormData();
                form_data.append('image', file_data);
                form_data.append('r_photo', r_photo);
                form_data.append("name", $("#name").val());
                form_data.append("sur_name", $("#sur_name").val());
                form_data.append("charity_reg_number", $("#charity_reg_number").val());
                form_data.append("email", $("#email").val());
                form_data.append("r_name", $("#r_name").val());
                form_data.append("r_position", $("#r_position").val());
                form_data.append("r_phone", $("#r_phone").val());
                form_data.append("house_number", $("#house_number").val());
                form_data.append("street_name", $("#street_name").val());
                form_data.append("town", $("#town").val());
                form_data.append("postcode", $("#postcode").val());
                form_data.append("password", $("#password").val());
                form_data.append("confirm_password", $("#confirm_password").val());
                
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

    
</script>
@endsection
