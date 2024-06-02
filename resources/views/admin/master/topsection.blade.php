@extends('admin.layouts.admin')

@section('content')

<!-- content area -->
<div class="content">
    <div id="addThisFormContainer">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="background-color: #fdf3ee">
                    <div class="card-header">
                        <h5>Homepage Top Section</h5>
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
                                                <label for="left_title">Left Title</label>
                                                <input class="form-control" id="left_title" name="left_title" value="@if(!empty($data->left_title)){{$data->left_title}}@endif" type="text">
                                                <input class="form-control" id="data_id" name="data_id" value="@if (!empty($data->id)){{$data->id}}@endif" type="hidden">
                                            </div>
                                            <div class="form-group">
                                                <label for="left_description">Left Description</label>
                                                <textarea class="form-control" id="left_description" name="left_description" rows="8" cols="50" placeholder="Enter your Description" style="height: 111px;">@if (!empty($data->left_description)){{$data->left_description}}@endif</textarea>
                                            </div>
                                        </form>
                                    </div>
                    
                                    <div class="col-lg-6">
                                        <form>
                                            
                        
                        
                                            <div class="form-group">
                                                <label for="right_header">right header</label>
                                                <input class="form-control" id="right_header" name="right_header" value="@if(!empty($data->right_header)){{$data->right_header}}@endif" type="text">
                                            </div>

                                            <div class="form-group">
                                                <label for="right_title1">right title1</label>
                                                <input class="form-control" id="right_title1" name="right_title1" value="@if(!empty($data->right_title1)){{$data->right_title1}}@endif" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="right_description1">right Description 1</label>
                                                <textarea class="form-control" id="right_description1" name="right_description1" rows="4" placeholder="Enter your Description">@if (!empty($data->right_description1)){{$data->right_description1}}@endif</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="right_title2">right title2</label>
                                                <input class="form-control" id="right_title2" name="right_title2" value="@if(!empty($data->right_title2)){{$data->right_title2}}@endif" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="right_description2">right Description 2</label>
                                                <textarea class="form-control" id="right_description2" name="right_description2" rows="4" placeholder="Enter your Description">@if (!empty($data->right_description2)){{$data->right_description2}}@endif</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="right_title3">right title3</label>
                                                <input class="form-control" id="right_title3" name="right_title3" value="@if(!empty($data->right_title3)){{$data->right_title3}}@endif" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="right_description3">right Description 3</label>
                                                <textarea class="form-control" id="right_description3" name="right_description3" rows="4" placeholder="Enter your Description">@if (!empty($data->right_description3)){{$data->right_description3}}@endif</textarea>
                                            </div>
                        
                        
                                        </form>
                                    </div>
                                </div>
                                <div class="tile-footer">
                                    @if (!empty($data->id))
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
</div>






@endsection
@section('script')
<script>
    $(document).ready(function () {

        //header for csrf-token is must in laravel
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        //

        var url = "{{URL::to('/admin/home-top-section')}}";
         //console.log(url);

          // company details update;
          $(".updateBtn").click(function(){
            // alert('update btn work');

            
            var form_data = new FormData();
            form_data.append("data_id", $("#data_id").val());
            form_data.append("left_title", $("#left_title").val());
            form_data.append("left_description", $("#left_description").val());
            form_data.append("right_header", $("#right_header").val());
            form_data.append("right_title1", $("#right_title1").val());
            form_data.append("right_description1", $("#right_description1").val());
            form_data.append("right_title2", $("#right_title2").val());
            form_data.append("right_description2", $("#right_description2").val());
            form_data.append("right_title3", $("#right_title3").val());
            form_data.append("right_description3", $("#right_description3").val());
            // form_data.append('_method', 'put');

                // alert(name);
                $.ajax({
                    url:url,
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
                          success("Data Update Successfully!!");
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




@endsection