@extends('admin.layouts.admin')

@section('content')

<!-- content area -->
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="pagetitle pb-2">
                 Slider
            </div>
        </div>
    </div>
<div id="addThisFormContainer">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background-color: #fdf3ee">
                <div class="card-header">
                    <h5>New Slider</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="ermsg">
                        </div>
                        <div class="col-md-12">
                          <div class="tile">
                            <div class="row">
                                <div class="col-lg-6">
                                  {!! Form::open(['url' => 'admin/master/create','id'=>'createThisForm']) !!}
                                  {!! Form::hidden('codeid','', ['id' => 'codeid']) !!}
                                  @csrf
                                  <div>
                                      <label for="title">Title</label>
                                      <input type="text" id="title" name="title" class="form-control">
                                  </div>

                                    
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label for="image">Image</label>
                                        <input class="form-control" id="image" name="image" type="file">
                                    </div>
                                </div>
                              </div>
                              <div class="tile-footer">
                                <br>
                                  <input type="button" id="addBtn" value="Create" class="btn btn-primary">
                                  <input type="button" id="FormCloseBtn" value="Close" class="btn btn-warning">
                                  {!! Form::close() !!}
                              </div>
                          </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

<button id="newBtn" type="button" class="btn-theme bg-primary">Add New</button>
    <hr>
    <div id="contentContainer">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="background-color: #fdf3ee">
                    <div class="card-header">
                        <h3> All Data</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="exdatatable">
                            <thead>
                                <tr>
                                    <th style="text-align: center">ID</th>
                                    <th style="text-align: center">Title</th>
                                    <th style="text-align: center">Image</th>
                                    <th style="text-align: center">Activation</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $data)
                                    <tr>
                                        <td style="text-align: center">{{ $key + 1 }}</td>
                                        <td style="text-align: center">{{$data->title}}</td>
                                        <td style="text-align: center">
                                            @if ($data->photo)
                                            <img src="{{asset('images/slider/'.$data->photo)}}" height="120px" width="220px" alt="">
                                            @endif
                                        </td>
                                        <td style="text-align: center">
                                        
                                            <div class="toggle-flip">
                                                <label>
                                                    <input type="checkbox" class="toggle-class" data-id="{{$data->id}}" {{ $data->status ? 'checked' : '' }}><span class="flip-indecator" data-toggle-on="Active" data-toggle-off="Inactive"></span>
                                                </label>
                                            </div>
                                        </td>
                                        
                                        <td style="text-align: center">
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


@endsection
@section('script')

    <script>
        $(document).ready(function () {
            $("#addThisFormContainer").hide();
            $("#newBtn").click(function(){
                clearform();
                $("#newBtn").hide(100);
                $("#addThisFormContainer").show(300);

            });
            $("#FormCloseBtn").click(function(){
                window.setTimeout(function(){location.reload()},100)
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
                    if(typeof file_data === 'undefined'){
                        file_data = 'null';
                    }

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
                              $(".ermsg").html(d.message);
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
                                $(".ermsg").html(d.message);
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
                //alert("btn work");
                codeid = $(this).attr('rid');
                //console.log($codeid);
                info_url = url + '/'+codeid+'/edit';
                //console.log($info_url);
                $.get(info_url,{},function(d){
                    populateForm(d);
                    pagetop();
                });
            });
            //Edit  end

            //Delete
            $("#contentContainer").on('click','#deleteBtn', function(){
                if(!confirm('Sure?')) return;
                codeid = $(this).attr('rid');
                info_url = url + '/'+codeid;
                $.ajax({
                    url:info_url,
                    method: "GET",
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

        $(document).ready(function () {
            $('#exdatatable').DataTable();
        });

            
    </script>
    
@endsection