@extends('admin.layouts.admin')

@section('content')

<!-- content area -->
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="pagetitle pb-2">
                 Gallery
            </div>
        </div>
    </div>
<div id="addThisFormContainer">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background-color: #fdf3ee">
                <div class="card-header">
                    <h5>New Pages</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="ermsg">
                        </div>
                        <div class="col-md-12">
                          <div class="tile">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                  {!! Form::open(['url' => 'admin/master/create','id'=>'createThisForm']) !!}
                                  {!! Form::hidden('codeid','', ['id' => 'codeid']) !!}
                                  @csrf

                                  

                                  <div>
                                      <label for="name">Name</label>
                                      <input type="text" id="name" name="name" class="form-control">
                                  </div>

                                  

                                
                                <div>
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control">
                                </div>

                                
                                <div>
                                    <label for="date">Date</label>
                                    <input type="date" id="date" name="date" class="form-control">
                                </div>

                                
                                
                                <div>
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address" class="form-control">
                                </div>

                                    
                                </div>
                                <div class="col-lg-6">
                                    
                                    <div>
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>

                                    <div>
                                        <label for="print_name">Print Name</label>
                                        <input type="text" id="print_name" name="print_name" class="form-control">
                                    </div>

                                    <div>
                                        <label for="profession">Profession</label>
                                        <input type="text" id="profession" name="profession" class="form-control">
                                    </div>

                                    <div>
                                        <label for="dob">Date of birth</label>
                                        <input type="date" id="dob" name="dob" class="form-control">
                                    </div>
    

                                </div>
                              </div>
                              <div class="tile-footer">
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
<div class="stsermsg"></div>
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
                                    <th style="text-align: center">Date</th>
                                    <th style="text-align: center">Name</th>
                                    <th style="text-align: center">Email</th>
                                    <th style="text-align: center">Phone</th>
                                    <th style="text-align: center">DOB</th>
                                    <th style="text-align: center">Print Name</th>
                                    <th style="text-align: center">Address</th>
                                    <th style="text-align: center">Profession</th>
                                    <th style="text-align: center">Status</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $data)
                                    <tr>
                                        <td style="text-align: center">{{$data->volunteerid}}</td>
                                        <td style="text-align: center">{{$data->date}}</td>
                                        <td style="text-align: center">{{$data->name}}</td>
                                        <td style="text-align: center">{{$data->email}}</td>
                                        <td style="text-align: center">{{$data->phone}}</td>
                                        <td style="text-align: center">{{$data->dob}}</td>
                                        <td style="text-align: center">{{$data->print_name}}</td>
                                        <td style="text-align: center">{{$data->address}}</td>
                                        <td style="text-align: center">{{$data->profession}}</td>
                                        <td style="text-align: center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input fundraiserstatus" type="checkbox" role="switch"  data-id="{{$data->id}}" id="fundraiserstatus" @if ($data->status == 1) checked @endif >
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
    $(function() {
      $('.fundraiserstatus').change(function() {
        var url = "{{URL::to('/admin/active-volunteer')}}";
          var status = $(this).prop('checked') == true ? 1 : 0;
          var id = $(this).data('id');
           console.log(id);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: url,
              data: {'status': status, 'id': id},
              success: function(d){
                // console.log(data.success)
                if (d.status == 303) {
                        pagetop();
                        $(".stsermsg").html(d.message);
                        window.setTimeout(function(){location.reload()},2000)
                    }else if(d.status == 300){
                        pagetop();
                        $(".stsermsg").html(d.message);
                        window.setTimeout(function(){location.reload()},2000)
                    }
                },
                error: function (d) {
                    console.log(d);
                }
          });
      })
    })
</script>
<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
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
            var url = "{{URL::to('/admin/volunteer')}}";
            var upurl = "{{URL::to('/admin/volunteer-update')}}";
            // console.log(url);
            $("#addBtn").click(function(){
            //   alert("#addBtn");
                if($(this).val() == 'Create') {

                    var form_data = new FormData();
                    
                    form_data.append("date", $("#date").val());
                    form_data.append("name", $("#name").val());
                    form_data.append("email", $("#email").val());
                    form_data.append("phone", $("#phone").val());
                    form_data.append("print_name", $("#print_name").val());
                    form_data.append("address", $("#address").val());
                    form_data.append("dob", $("#dob").val());
                    form_data.append("profession", $("#profession").val());
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

                    var form_data = new FormData();
                    form_data.append("date", $("#date").val());
                    form_data.append("name", $("#name").val());
                    form_data.append("email", $("#email").val());
                    form_data.append("phone", $("#phone").val());
                    form_data.append("print_name", $("#print_name").val());
                    form_data.append("address", $("#address").val());
                    form_data.append("profession", $("#profession").val());
                    form_data.append("dob", $("#dob").val());
                    form_data.append("codeid", $("#codeid").val());
                    $.ajax({
                        url:upurl,
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
                    window.scrollTo(0, 300);
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
                $("#date").val(data.date);
                $("#name").val(data.name);
                $("#email").val(data.email);
                $("#phone").val(data.phone);
                $("#print_name").val(data.print_name);
                $("#address").val(data.address);
                $("#profession").val(data.profession);
                $("#dob").val(data.dob);
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
      <script>
        function copyToClipboard(id) {
            document.getElementById(id).select();
            document.execCommand('copy');
            swal("Copied!");
        }
    </script>
@endsection