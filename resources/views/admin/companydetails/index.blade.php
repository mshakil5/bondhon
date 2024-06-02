@extends('admin.layouts.admin')

@section('content')

<!-- content area -->
<div class="content">
<div id="addThisFormContainer">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background-color: #fdf3ee">
                <div class="card-header">
                    <h5>Company</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="ermsg">
                        </div>
                        <div class="col-md-12">
                          <div class="tile">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form>
                                      <div class="form-group">
                                        <label for="company_name">Company Name</label>
                                        <input class="form-control" id="company_name" name="company_name" value="@if (!empty($company->company_name)){{$company->company_name}}@endif" type="email">
                                        <input class="form-control" id="company_id" name="company_id" value="@if (!empty($company->id)){{$company->id}}@endif" type="hidden">
                                      </div>
                                      <div class="form-group">
                                        <label for="address">Address</label>
                                        {{-- ckeditor --}}
                                        <textarea class="form-control" id="address" name="address" rows="4" placeholder="Enter your address">@if (!empty($company->address1)){{$company->address1}}@endif</textarea>
                                      </div>
                  
                                      <div class="form-group">
                                        <label for="address2">Address 2</label>
                                        <textarea  id="address2" name="address2" class="form-control" cols="30" rows="5">@if (!empty($company->address2)){{$company->address2}}@endif</textarea>
                                      </div>
                  
                                      <div class="form-group">
                                        <label for="phone1">Phone 1</label>
                                        <input class="form-control" id="phone1" name="phone1" value="@if (!empty($company->phone1)){{$company->phone1}}@endif" type="number">
                                      </div>
                                      <div class="form-group">
                                        <label for="phone2">Phone 2</label>
                                        <input class="form-control" id="phone2" name="phone2" value="@if (!empty($company->phone2)){{$company->phone2}}@endif" type="number">
                                      </div>
                                      <div class="form-group">
                                        <label for="email1">Email 1</label>
                                        <input class="form-control" id="email1" name="email1" value="@if (!empty($company->email1)){{$company->email1}}@endif" type="email">
                                      </div>
                                      <div class="form-group">
                                        <label for="email2">Email 2</label>
                                        <input class="form-control" id="email2" name="email2" value="@if (!empty($company->email2)){{$company->email2}}@endif" type="email">
                                      </div>
                  
                                      <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input class="form-control" id="facebook" name="facebook" value="@if (!empty($company->facebook)){{$company->facebook}}@endif" type="text">
                                      </div>
                                      <div class="form-group">
                                        <label for="twiter">Twitter</label>
                                        <input class="form-control" id="twiter" name="twiter" value="@if (!empty($company->twiter)){{$company->twiter}}@endif" type="text">
                                      </div>
                                      <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input class="form-control" id="instagram" name="instagram" value="@if (!empty($company->instagram)){{$company->instagram}}@endif" type="text">
                                      </div>
                                      <div class="form-group">
                                        <label for="linkedin">Linkedin</label>
                                        <input class="form-control" id="linkedin" name="linkedin" value="@if (!empty($company->linkedin)){{$company->linkedin}}@endif" type="text">
                                      </div>
                  
                  
                                    </form>
                                  </div>
                  
                                  <div class="col-lg-4 offset-lg-1">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Company logo</label>
                                            {{-- logo  --}}
                                            <div style="display: flex;">
                                              <div>
                                                  <img class="imgPreview img img-circle"
                                                   width="80" src="@if (!empty($company->header_logo)){{asset('images/company/'.$company->header_logo)}}@endif">
                                              </div>
                                              <div style="margin-left: 15px; flex-grow: 1">
                                                  <p>Choose a file</p>
                                                  <input id="company_logo" type="file">
                                                  <input type="hidden" name="company_logo" value="">
                                                  <br>
                                                  <div class="progress">
                                                      <div class="progress-bar logo-progree"
                                                           role="progressbar" aria-valuemin="0"
                                                           aria-valuemax="100">
                  
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          {{-- logo  --}}
                                        </div>
                                          <div class="form-group">
                                            <label for="exampleInputFile">Fav icon</label>
                                              {{-- fav logo  --}}
                                              <div style="display: flex;">
                                                  <div>
                                                      <img class="imgPreviews img img-circle"
                                                       width="80" src="@if (!empty($company->fav_icon)){{asset('images/company/'.$company->fav_icon)}}@endif">
                                                  </div>
                                                  <div style="margin-left: 15px; flex-grow: 1">
                                                      <p>Choose a file</p>
                                                      <input id="fav_icon" type="file">
                                                      <input type="hidden" name="fav_icon" value="">
                                                      <br>
                                                      <div class="progress">
                                                          <div class="progress-bar fav-progress"
                                                               role="progressbar" aria-valuemin="0"
                                                               aria-valuemax="100">
                  
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              {{-- logo  --}}
                                          </div>
                  
                                          <div class="form-group">
                                            <label for="footer_link">Footer Link</label>
                                            <input type="text" id="footer_link" value="@if (!empty($company->footer_link)){{$company->footer_link}}@endif" name="footer_link" class="form-control">
                                        </div>
                                        <div class="form-group">
                                          <label for="google_play_link">Google Play Link</label>
                                          <input type="text" id="google_play_link" value="@if (!empty($company->google_play_link)){{$company->google_play_link}}@endif" name="google_play_link" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="google_appstore_link">Google App Store Link</label>
                                          <input type="text" id="google_appstore_link" value="@if (!empty($company->google_appstore_link)){{$company->google_appstore_link}}@endif" name="google_appstore_link" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="text" id="website" value="@if (!empty($company->website)){{$company->website}}@endif" name="website" class="form-control">
                                      </div>
                  
                  
                                      <div class="form-group">
                                        <label for="footer_content">Footer Content</label>
                                        <textarea  id="footer_content" name="footer_content" class="form-control" cols="30" rows="5">@if (!empty($company->footer_content)){{$company->footer_content}}@endif</textarea>
                                      </div>
                  
                                      <div class="form-group">
                                        <label for="google_map">Google Map</label>
                                        <textarea  id="google_map" name="google_map" class="form-control" cols="30" rows="5">@if (!empty($company->google_map)){{$company->google_map}}@endif</textarea>
                                      </div>
                  
                                      <div class="form-group">
                                        <label for="opening_time">Opening Time</label>
                                        <textarea  id="opening_time" name="opening_time" class="form-control" cols="30" rows="5">@if (!empty($company->opening_time)){{$company->opening_time}}@endif</textarea>
                                      </div>
                  
                  
                  
                                      <div class="form-group">
                                          <label for="tawkto">Tawkto</label>
                                          <input type="text" id="tawkto" value="@if (!empty($company->tawkto)){{$company->tawkto}}@endif" name="tawkto" class="form-control">
                                      </div>
                  
                  
                                    </form>
                                  </div>
                            </div>
                            <div class="tile-footer">
                                @if (!empty($company->id))
                                <button class="btn-theme bg-primary fs-16 fw-700 updateBtn" type="submit">Update</button>
                                @else
                                <button class="btn btn-primary submitBtn" type="submit">Submit</button>
                                @endif
                            </div>
                          </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>




@endsection
@section('script')
<script>
    $(document).ready(function () {

        //header for csrf-token is must in laravel
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        //

        var url = "{{URL::to('/admin/company-detail')}}";
         //console.log(url);

         $(".submitBtn").click(function(){
          alert("btn work");
            var company_logo = $('#company_logo').prop('files')[0];
            var fav_icon = $('#fav_icon').prop('files')[0];
            var form_data = new FormData();
            form_data.append("company_name", $("#company_name").val());
            form_data.append('company_logo', company_logo);
            form_data.append('fav_icon', fav_icon);
            form_data.append("address", $("#address").val());
            form_data.append("address2", $("#address2").val());
            form_data.append("footer_content", $("#footer_content").val());
            form_data.append("google_map", $("#google_map").val());
            form_data.append("opening_time", $("#opening_time").val());
            form_data.append("phone1", $("#phone1").val());
            form_data.append("phone2", $("#phone2").val());
            form_data.append("email1", $("#email1").val());
            form_data.append("email2", $("#email2").val());

            form_data.append("facebook", $("#facebook").val());
            form_data.append("twiter", $("#twiter").val());
            form_data.append("instagram", $("#instagram").val());
            form_data.append("linkedin", $("#linkedin").val());

            form_data.append("website", $("#website").val());
            form_data.append("footer_link", $("#footer_link").val());
            form_data.append("google_play_link", $("#google_play_link").val());
            form_data.append("google_appstore_link", $("#google_appstore_link").val());
            form_data.append("tawkto", $("#tawkto").val());


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
                        window.setTimeout(function(){location.reload()},2000)
                  }
              },
              error: function (d) {
                  console.log(d);
              }
            });
          });

          // company details update;
          $(".updateBtn").click(function(){
            // alert('update btn work');
            //var facebook = $('#facebook').val();
            //alert(facebook);

            var company_logo = $('#company_logo').prop('files')[0];
            var fav_icon = $('#fav_icon').prop('files')[0];
            if(typeof company_logo === 'undefined'){
              company_logo = 'null';
            }
            if(typeof fav_icon === 'undefined'){
              fav_icon = 'null';
            }
            var form_data = new FormData();
            form_data.append("company_name", $("#company_name").val());
            form_data.append('company_logo', company_logo);
            form_data.append('fav_icon', fav_icon);
            form_data.append("address", $("#address").val());
            form_data.append("address2", $("#address2").val());
            form_data.append("footer_content", $("#footer_content").val());
            form_data.append("google_map", $("#google_map").val());
            form_data.append("opening_time", $("#opening_time").val());
            form_data.append("phone1", $("#phone1").val());
            form_data.append("phone2", $("#phone2").val());
            form_data.append("email1", $("#email1").val());
            form_data.append("email2", $("#email2").val());
            form_data.append("facebook", $("#facebook").val());
            form_data.append("twiter", $("#twiter").val());
            form_data.append("instagram", $("#instagram").val());
            form_data.append("linkedin", $("#linkedin").val());
            form_data.append("website", $("#website").val());
            form_data.append("footer_link", $("#footer_link").val());
            form_data.append("google_play_link", $("#google_play_link").val());
            form_data.append("google_appstore_link", $("#google_appstore_link").val());
            form_data.append("tawkto", $("#tawkto").val());
            form_data.append('_method', 'put');

                // alert(name);
                $.ajax({
                    url:url+'/'+$("#company_id").val(),
                    type: "POST",
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    data:form_data,
                    success: function(d){
                        console.log(d);
                        if (d.status == 303) {
                            $(".ermsg").html(d.message);
                            pagetop();
                        }else if(d.status == 300){
                            $(".ermsg").html(d.message);
                            pagetop();
                            window.setTimeout(function(){location.reload()},2000)
                        }
                    },
                    error:function(d){
                        console.log(d);
                    }
                });
              });
            //Update end

    });
</script>
{{-- logo  --}}
<script>
    $(function () {
        $.ajaxSetup({
            headers: {'X-CSRF-Token': '{{csrf_token()}}'}
        });

        var id = $('input[name="id"]').val();


        $('#company_logo').change(function () {
            var photo = $(this)[0].files[0];
            var formData = new FormData();
            formData.append('company_logo', id);
            formData.append('photo', photo);

            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            console.log(percentComplete);
                            $('.logo-progree').css('width', percentComplete + '%');
                            if (percentComplete === 100) {
                                console.log('completed 100%')

                                var imageUrl = window.URL.createObjectURL(photo)
                                $('.imgPreview').attr('src', imageUrl);
                                setTimeout(function () {
                                    $('.logo-progree').css('width', '0%');
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
                    // if(!res.success){alert(res.error)}
                }
            })
        })


    })
</script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {'X-CSRF-Token': '{{csrf_token()}}'}
        });

        var id = $('input[name="fav_icon"]').val();
        // fav icon
        $('#fav_icon').change(function () {
            var photo = $(this)[0].files[0];
            var formData = new FormData();
            formData.append('fav_icon', id);
            formData.append('photo', photo);

            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            console.log(percentComplete);
                            $('.fav-progress').css('width', percentComplete + '%');
                            if (percentComplete === 100) {
                                console.log('completed 100%')

                                var imageUrl = window.URL.createObjectURL(photo)
                                $('.imgPreviews').attr('src', imageUrl);
                                setTimeout(function () {
                                    $('.fav-progress').css('width', '0%');
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
                    // if(!res.success){alert(res.error)}
                }
            })
        })

    })
</script>
@endsection