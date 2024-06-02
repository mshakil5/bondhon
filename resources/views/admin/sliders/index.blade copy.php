@extends('admin.layouts.admin')



@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ul>
        </div>
        <div id="addThisFormContainer">

            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>New Master details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="ermsg">
                                </div>
                                <div class="container">

                                    {!! Form::open(['url' => 'admin/slider/create','id'=>'createThisForm']) !!}
                                    {!! Form::hidden('codeid','', ['id' => 'codeid']) !!}
                                    @csrf
                                    

                                    <div>
                                        <label for="image">Image <span>(*size 1920*1280 )</span></label>
                                        <input class="form-control" id="image" name="image" type="file">
                                    </div>

                                    <div>
                                        <label for="title">Title</label>
                                        <input class="form-control" id="title" name="title" type="text">
                                    </div>

                                    {{-- <div>
                                        <label for="caption">Caption</label>
                                        <input class="form-control" id="caption" name="caption" type="text">
                                    </div> --}}

                                    {{-- <div>
                                        <label for="status" class="awesome">Status</label>
                                        <select name="status" class="form-control" id="status">
                                            <option value=""  >Select status</option>
                                            <option value="1"  >Active</option>
                                            <option value="0"  >Inactive</option>
                                        </select>
                                    </div> --}}


                                    <hr>
                                    <input type="button" id="addBtn" value="Create" class="btn btn-primary">
                                    <input type="button" id="FormCloseBtn" value="Close" class="btn btn-warning">
                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div>

        </div>

        <button id="newBtn" type="button" class="btn btn-info">Add New</button>
        <hr>

        <div id="contentContainer">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3> Slider Image</h3>
                            <div class="ermsg"></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="container">


                                    <table class="table table-bordered table-hover" id="example">
                                        <thead>
                                        <tr>
                                          <th>ID</th>
                                          <th>Photo</th>
                                          <th>Title</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                              @foreach ($sliders as $key => $data)
                                            <tr>
                                              <td>{{$key + 1}}</td>
                                              <td><img src="{{asset('frontend/slider/'.$data->photo)}}" height="100px" width="150px" alt=""></td>
                                              <td>{{$data->title}}</td>
                                              <td>
                                                <div class="toggle-flip">
                                                    <label>
                                                        <input type="checkbox" class="toggle-class" data-id="{{$data->id}}" {{ $data->status ? 'checked' : '' }}><span class="flip-indecator" data-toggle-on="Active" data-toggle-off="Inactive"></span>
                                                    </label>
                                                </div>
                                            </td>
                                              <td>
                                                <a id="EditBtn" rid="{{$data->id}}"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a>
                                                <a id="deleteBtn" rid="{{$data->id}}"><i class="fa fa-trash-o" style="color: red;font-size:16px;"></i></a>
                                              </td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </main>
   
@endsection
@section('script')
   
     <script>
        $(function() {
          $('.toggle-class').change(function() {
            var url = "{{URL::to('/admin/activeslider')}}";
              var status = $(this).prop('checked') == true ? 1 : 0;
              var id = $(this).data('id');
               console.log(status);
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: url,
                  data: {'status': status, 'id': id},
                  success: function(d){
                    // console.log(data.success)
                    if (d.status == 303) {
                                    $(".ermsg").html(d.message);
                                }else if(d.status == 300){
                                    $(".ermsg").html(d.message);
                                    // window.setTimeout(function(){location.reload()},2000)
                                }
                            },
                            error: function (d) {
                                console.log(d);
                            }
              });
          })
        })
      </script>
    <script>
        $(document).ready(function () {

            $("#addThisFormContainer").hide();
            $("#newBtn").click(function(){
                clearform();
                $("#newBtn").hide(100);
                $("#addThisFormContainer").show(300);

            });
            $("#FormCloseBtn").click(function(){
                $("#addThisFormContainer").hide(200);
                $("#newBtn").show(100);
                clearform();
            });


            //header for csrf-token is must in laravel
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            //

            var url = "{{URL::to('/admin/sliders')}}";
            // console.log(url);
            $("#addBtn").click(function(){
            //   alert("#addBtn");
                if($(this).val() == 'Create') {
                     
                    var file_data = $('#image').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('image', file_data);
                    form_data.append("title", $("#title").val());

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
                            success("Data Insert Successfully!!");
                                window.setTimeout(function(){location.reload()},2000)
                          }
                      },
                      error: function (d) {
                          console.log(d);
                      }
                  });
                }
                //create  end
                //Update
                if($(this).val() == 'Update'){
                
                  var file_data = $('#image').prop('files')[0];
                  if(typeof file_data === 'undefined'){
                    file_data = 'null';
                  }
                  var form_data = new FormData();
                  form_data.append('image', file_data);
                    form_data.append("title", $("#title").val());
                  form_data.append('_method', 'put');

                    //console.log(image);
                    // alert(name);
                    $.ajax({
                        url:url+'/'+$("#codeid").val(),
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
                                success("Update Successfully!!");
                                window.setTimeout(function(){location.reload()},2000)
                            }
                        },
                        error:function(d){
                            console.log(d);
                        }
                    });
                }
                //Update
            });
            //Edit
            $("#contentContainer").on('click','#EditBtn', function(){
                // alert("btn work");
                codeid = $(this).attr('rid');
                console.log(codeid);
                info_url = url + '/'+codeid+'/edit';
                console.log(info_url);
                $.get(info_url,{},function(d){
                    populateForm(d);
                    pagetop();
                });
            });
            //Edit  end

            //Delete
            $("#contentContainer").on('click','#deleteBtn', function(){
                if(!confirm('Sure?')) return;
                 masterid = $(this).attr('rid');
                 info_url = url + '/'+masterid;
                //console.log(info_url);
                //alert(info_url);
                $.ajax({
                    url:info_url,
                    method: "DELETE",
                    type: "DELETE",
                    data:{
                    },
                    success: function(d){
                        if(d.success) {
                            alert(d.message);
                            location.reload();
                        }
                    },
                    error:function(d){
                        console.log(d);
                    }
                });
            });
            //Delete




            function populateForm(data){
                $("#title").val(data.title);
                $("#caption").val(data.caption);
                $("#codeid").val(data.id);
                $("#addBtn").val('Update');
                $("#addThisFormContainer").show(300);
                $("#newBtn").hide(100);
            }
            function clearform(){
                $('#createThisForm')[0].reset();
                $("#addBtn").val('Create');
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#fsettings").addClass('active');
            $("#fsettings").addClass('is-expanded');
            $("#slider").addClass('active');
        });
    </script>
   
@endsection
