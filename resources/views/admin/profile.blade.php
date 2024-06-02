@extends('admin.layouts.admin')
@section('content')
<main class="app-content">
    <div class="row user">

      <div class="col-md-3">
        <div class="tile p-0">
          <ul class="nav flex-column nav-tabs user-tabs">
            <li class="nav-item"><a class="nav-link active" href="#user-image" data-toggle="tab">Image</a></li>
            <li class="nav-item"><a class="nav-link" href="#user-details" data-toggle="tab">User Details</a></li>
            <li class="nav-item"><a class="nav-link" href="#user-password" data-toggle="tab">Change Password</a></li>

          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div class="tab-content">
            {{-- image tab --}}
            <div class="tab-pane active" id="user-image">
              <div class="tile user-settings">
                <h4 class="line-head">User Image</h4>
                <div class="ermsg"></div>
                <form>
                  <div class="row">
                    <input id="profileid" value="{{$profile_data->id}}" type="hidden">
                    <div class="col-md-8 mb-4">
                        <div style="display: flex;">
                            <div>
                                <img class="imgPreview img img-circle"
                                 width="80" src="{{asset('images/'.$profile_data->photo)}}">
                            </div>
                            <div style="margin-left: 15px; flex-grow: 1">
                                <p>Choose a file</p>
                                <input id="image" type="file">
                                <input type="hidden" name="id" value="">
                                <br>
                                <div class="progress">
                                    <div class="progress-bar"
                                         role="progressbar" aria-valuemin="0"
                                         aria-valuemax="100">

                                    </div>
                                </div>
                            </div>
                        </div>


                      {{-- <label>Image</label> --}}
                    </div>
                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary imgBtn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <div class="tab-pane fade" id="user-details">
              <div class="tile user-settings">
                <h4 class="line-head">User Details</h4>
                <div class="ermsg"></div>
                <form>
                  <div class="row">
                    <div class="col-md-6">
                      <input id="profileid" value="{{$profile_data->id}}" type="hidden">
                      <label>Full Name</label>
                      <input class="form-control" id="name" value="{{$profile_data->name}}" type="text">
                    </div>
                    <div class="col-md-6">
                      <label>Email</label>
                      <input class="form-control"  id="email" value="{{$profile_data->email}}" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                      <label>Phone</label>
                      <input class="form-control" id="phone" value="{{$profile_data->phone}}" type="text">
                    </div>
                    <div class="col-md-6">
                      <label>City</label>
                      <input class="form-control" id="city" value="{{$profile_data->city}}" type="text">
                    </div>
                    <div class="col-md-6">
                      <label>Country</label>
                      <input class="form-control" id="country" value="{{$profile_data->country}}" type="text">
                    </div>
                    <div class="col-md-6">
                      <label>Postal Code</label>
                      <input class="form-control" id="postal_code" value="{{$profile_data->postal_code}}" type="text">
                    </div>
                    <div class="col-md-6">
                      <label>About</label>
                      <input class="form-control" id="about" value="{{$profile_data->about}}" type="text">
                    </div>
                    <div class="col-md-6">
                      <label>Address</label>
                      <textarea class="form-control"  id="address" type="text">{{$profile_data->address}}</textarea>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <hr>
                  <div class="row mb-12">
                    <div class="col-md-12">
                      <button class="btn btn-primary detailsBtn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            {{-- password tab --}}
            <div class="tab-pane fade" id="user-password">
              <div class="tile user-settings">
                <h4 class="line-head">Settings</h4>
                <div class="ermsg"></div>
                <form>
                  <div class="row">
                    <div class="col-md-8 mb-4">
                      <label>Old Password</label>
                      <input class="form-control" id="old_password" type="password">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-4">
                      <label>New Password</label>
                      <input class="form-control" id="new_password" type="password">
                    </div>
                    <div class="col-md-4">
                      <label>Re-type Password</label>
                      <input class="form-control" id="password_confirmation" type="password">
                    </div>
                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary passwordBtn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

        </div>
      </div>
    </div>
  </main>
@endsection
@section('script')


<script>
  $(document).ready(function(){
      //header for csrf-token is must in laravel
      $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
      //
      var url = "{{URL::to('/admin/profile')}}";
      //console.log(url);
      $(".detailsBtn").click(function(){
           //alert('btn work');
          var name= $("#name").val();
          var email= $("#email").val();
          var phone= $("#phone").val();
          var city= $("#city").val();
          var country= $("#country").val();
          var postal_code= $("#postal_code").val();
          var about= $("#about").val();
          var address= $("#address").val();

          //console.log(fullname +','+ email +','+ title+','+ phone+','+ address+','+ city+','+ state+','+ zip+','+ about+','+ facebook+','+ twitter+','+ google+','+ linkedin);

          $.ajax({
                  url:url+'/'+$("#profileid").val(),
                  method: "PUT",
                  type: "PUT",
                  data:{
                    name:name,email:email,phone:phone,city:city,country:country,postal_code:postal_code,about:about,address:address
                  },
                  success: function(d){
                      if (d.status == 303) {
                          $(".ermsg").html(d.message);
                      }else if(d.status == 300){
                        pagetop();
                                success("User Details Updated Successfully!!");
                          // window.setTimeout(function(){location.reload()},2000)
                      }
                  },
                  error:function(d){
                      console.log(d);
                  }
              });
      });

      var passwordurl = "{{URL::to('/admin/changepassword')}}";
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
                            $(".ermsg").html(d.message);
                        }else if(d.status == 300){
                            pagetop();
                                success("Password Updated Successfully!!");
                            window.setTimeout(function(){location.reload()},2000)
                        }
                    },
                    error: function (d) {
                        console.log(d);
                    }
                });
            });


            //image upload

            var imgurl = "{{URL::to('/admin/image')}}";
            $(".imgBtn").click(function(){
              var file_data = $('#image').prop('files')[0];
                  if(typeof file_data === 'undefined'){
                    file_data = 'null';
                  }
                  var form_data = new FormData();
                  form_data.append('image', file_data);
                  form_data.append('_method', 'put');

                    $.ajax({
                      url:imgurl+'/'+$("#profileid").val(),
                      method: "POST",
                      contentType: false,
                      processData: false,
                      data:form_data,
                      success: function (d) {
                          if (d.status == 303) {
                              $(".ermsg").html(d.message);
                          }else if(d.status == 300){
                            pagetop();
                                success("Profile Image Updated Successfully!!");
                            window.setTimeout(function(){location.reload()},2000)
                          }
                      },
                      error: function (d) {
                          console.log(d);
                      }
                  });
                //create  end
            });

  });
</script>
{{-- @endsection --}}
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {'X-CSRF-Token': '{{csrf_token()}}'}
            });

            var id = $('input[name="id"]').val();


            $('#image').change(function () {
                var photo = $(this)[0].files[0];
                var formData = new FormData();
                formData.append('id', id);
                formData.append('photo', photo);

                $.ajax({
                    xhr: function () {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function (evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                percentComplete = parseInt(percentComplete * 100);
                                console.log(percentComplete);
                                $('.progress-bar').css('width', percentComplete + '%');
                                if (percentComplete === 100) {
                                    console.log('completed 100%')

                                    var imageUrl = window.URL.createObjectURL(photo)
                                    $('.imgPreview').attr('src', imageUrl);
                                    setTimeout(function () {
                                        $('.progress-bar').css('width', '0%');
                                    }, 2000)
                                }
                            }
                        }, false);
                        return xhr;
                    },

                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (res) {
                        if(!res.success){alert(res.error)}
                    }
                })
            })
        })
    </script>

<script type="text/javascript">
  $(document).ready(function() {
      $("#profileinfo").addClass('active');
      $("#profileinfo").addClass('is-expanded');
      $("#profile").addClass('active');
  });
</script>
@endsection
