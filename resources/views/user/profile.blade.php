@extends('frontend.layouts.master')

@section('content')


<section class="section profile py-5" style="background-color: #F6F9FF;">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 mb-3">
    
              <div class="card border-0 shadow-sm">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                  @if (isset(Auth::user()->photo))
                      <img src="{{ asset('images/'.Auth::user()->photo)}}" alt="Profile" class="rounded-circle ">
                  @else
                  <img src="https://via.placeholder.com/510x440.png" alt="Profile" class="rounded-circle ">
                  @endif
                  <h2>{{Auth::user()->name}}</h2>
                </div>
              </div> 
            </div>
    
            <div class="col-xl-8 mb-3">
    
              <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                  <!-- Bordered Tabs -->
                  <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
    
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="false" role="tab" tabindex="-1">Overview</button>
                    </li>
    
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" role="tab" tabindex="-1">Edit Profile</button>
                    </li>
    
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" aria-selected="true" role="tab">Change Password</button>
                    </li>
    
                  </ul>
                  <div class="tab-content pt-2">
    
                    <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                      <h5 class="card-title mt-4">About</h5>
                      <p class="small fst-italic">{{Auth::user()->about}}</p>
    
                      <h5 class="card-title mt-4">Profile Details</h5>
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label txt-primary">Full Name</div>
                        <div class="col-lg-9 col-md-8 txt-secondary ">: {{Auth::user()->name}}</div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label txt-primary">Email</div>
                        <div class="col-lg-9 col-md-8 txt-secondary ">: {{Auth::user()->email}}</div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label txt-primary">Phone</div>
                        <div class="col-lg-9 col-md-8 txt-secondary ">: {{Auth::user()->phone}}</div>
                      </div>
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label txt-primary">House No</div>
                        <div class="col-lg-9 col-md-8 txt-secondary ">: {{Auth::user()->house_number}}</div>
                      </div>
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label txt-primary">Street</div>
                        <div class="col-lg-9 col-md-8 txt-secondary ">: {{Auth::user()->street_name}}</div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label txt-primary">City</div>
                        <div class="col-lg-9 col-md-8 txt-secondary ">: {{Auth::user()->town}}</div>
                      </div>
                      
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label txt-primary">Post Code</div>
                        <div class="col-lg-9 col-md-8 txt-secondary ">: {{Auth::user()->postcode}}</div>
                      </div>
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label txt-primary">Country</div>
                        <div class="col-lg-9 co txt-secondary l-md-8">: {{Auth::user()->country}}</div>
                      </div>
    
    
                    </div>
    
                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">
    
                      <!-- Profile Edit Form -->
                      <div class="ermsg"></div>
                        <div class="row mb-3">
                          <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                          <div class="col-md-8 col-lg-9">

                            @if (isset(Auth::user()->photo))
                            <img src="{{ asset('images/'.Auth::user()->photo)}}" width="160px" class="rounded-2" alt="Profile">
                            @else
                            <img src="https://via.placeholder.com/510x440.png" width="160px" class="rounded-2" alt="Profile">
                            @endif

                            <div class="pt-2 d-flex align-items-center gap-3">
                               <input type="file" class="form-control" name="image" id="image">
                               {{-- <button class="btn btn-danger" title="Remove my profile image"> <iconify-icon icon="ph:trash"></iconify-icon></button> --}}
                            </div>

                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="name" type="text" class="form-control" id="name" value="{{Auth::user()->name}}">
                          </div>
                        </div>

                        
                        <div class="row mb-3">
                          <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="phone" type="text" class="form-control" id="phone" value="{{Auth::user()->phone}}">
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control" id="email" value="{{Auth::user()->email}}">
                          </div>
                        </div> 
    
                        <div class="row mb-3">
                          <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                          <div class="col-md-8 col-lg-9">
                            <textarea name="about" class="form-control" id="about" style="height: 100px">{{Auth::user()->about}} </textarea>
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="house_number" class="col-md-4 col-lg-3 col-form-label">House Number</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="house_number" type="text" class="form-control" id="house_number" value="{{Auth::user()->house_number}}">
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="street_name" class="col-md-4 col-lg-3 col-form-label">Street</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="street_name" type="text" class="form-control" id="street_name" value="{{Auth::user()->street_name}}">
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="town" class="col-md-4 col-lg-3 col-form-label">City</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="town" type="text" class="form-control" id="town" value="{{Auth::user()->town}}">
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="postcode" class="col-md-4 col-lg-3 col-form-label">Post code</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="postcode" type="text" class="form-control" id="postcode" value="{{Auth::user()->postcode}}">
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="country" type="text" class="form-control" id="country" value="{{Auth::user()->country}}">
                          </div>
                        </div>
    
    
                        <div class="text-center">
                          <button type="submit" id="updateBtn" class="btn-theme px-4">Save Changes</button>
                        </div>
    
                    </div>
    
                    <div class="tab-pane fade pt-3 " id="profile-change-password" role="tabpanel">
                      <!-- Change Password Form -->
                      <div class="permsg"></div>
                      <form>
    
                        <div class="row mb-3">
                          <label for="old_password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="old_password" type="password" class="form-control" id="old_password">
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="new_password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="new_password" type="password" class="form-control" id="new_password">
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                          </div>
                        </div>
    
                        <div class="text-center">
                          <button class="btn-theme px-4 passwordBtn" type="button">Change Password</button>
                        </div>
                      </form><!-- End Change Password Form -->
    
                    </div>
    
                  </div><!-- End Bordered Tabs -->
    
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
            var url = "{{URL::to('/user/profile-update')}}";
            // console.log(url);
            $("#updateBtn").click(function(){
                var file_data = $('#image').prop('files')[0];
                if(typeof file_data === 'undefined'){
                    file_data = 'null';
                }
                var form_data = new FormData();
                form_data.append('image', file_data);
                form_data.append("name", $("#name").val());
                // form_data.append("sur_name", $("#sur_name").val());
                form_data.append("phone", $("#phone").val());
                form_data.append("email", $("#email").val());
                form_data.append("house_number", $("#house_number").val());
                form_data.append("street_name", $("#street_name").val());
                form_data.append("town", $("#town").val());
                form_data.append("postcode", $("#postcode").val());
                form_data.append("about", $("#about").val());
                form_data.append("country", $("#country").val());
                // form_data.append("password", $("#password").val());
                // form_data.append("confirm_password", $("#confirm_password").val());
                
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

            var passwordurl = "{{URL::to('/user/changepassword')}}";
            $(".passwordBtn").click(function(){
                //alert('btn work');
                var password= $("#new_password").val();
                var confirmpassword= $("#password_confirmation").val();
                var opassword= $("#old_password").val();
                // console.log(password);
                $.ajax({
                    url: passwordurl,
                    method: "POST",
                    data: {password:password,confirmpassword:confirmpassword,opassword:opassword},
                    success: function (d) {
                        console.log(d);
                        if (d.status == 303) {
                            $(".permsg").html(d.message);
                        }else if(d.status == 300){
                            pagetop();
                            $(".permsg").html(d.message);
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
