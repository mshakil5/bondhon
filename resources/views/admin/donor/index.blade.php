@extends('admin.layouts.admin')

@section('content')

<!-- content area -->
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="pagetitle pb-2">
                Donor
            </div>
        </div>
    </div>
<div id="addThisFormContainer">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background-color: #fdf3ee">
                <div class="card-header">
                    <h5>Donor registration form</h5>
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
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div>
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                    <div>
                                        <label for="house_number">House Number</label>
                                        <input type="text" id="house_number" name="house_number" class="form-control">
                                    </div>
                                    <div>
                                        <label for="town">Town</label>
                                        <input type="text" id="town" name="town" class="form-control">
                                    </div>
                                    <div>
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label for="sur_name">Surname</label>
                                        <input type="text" id="sur_name" name="sur_name" class="form-control">
                                    </div>

                                    <div>
                                        <label for="phone">Phone</label>
                                        <input type="number" id="phone" name="phone" class="form-control">
                                    </div>

                                    <div>
                                        <label for="street_name">Street Name</label>
                                        <input type="text" id="street_name" name="street_name" class="form-control">
                                    </div>

                                    <div>
                                        <label for="postcode">Postcode</label>
                                        <input type="text" id="postcode" name="postcode" class="form-control">
                                    </div>
                                    
                                    <div>
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <div class="tile-footer">
                                <hr>
                                <input type="button" id="addBtn" value="Create" class="btn-theme bg-primary">
                                <input type="button" id="FormCloseBtn" value="Close" class="btn-theme btn-warning">
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
                        <table class="table table-bordered table-hover" id="example">
                            <thead>
                            <tr>
                                <th style="text-align: center">SL</th>
                                <th style="text-align: center">Date</th>
                                <th style="text-align: center">Name</th>
                                <th style="text-align: center">Surname</th>
                                <th style="text-align: center">Email</th>
                                <th style="text-align: center">Phone</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $data)
                                    <tr>
                                        <td style="text-align: center">{{ $key + 1 }}</td>
                                        <td style="text-align: center">{{$data->created_at}}</td>
                                        <td style="text-align: center">{{$data->name}}</td>
                                        <td style="text-align: center">{{$data->sur_name}}</td>
                                        <td style="text-align: center">{{$data->email}}</td>
                                        <td style="text-align: center">{{$data->phone}}</td>
                                        <td style="text-align: center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input fundraiserstatus" type="checkbox" role="switch"  data-id="{{$data->id}}" id="fundraiserstatus" @if ($data->status == 1) checked @endif >
                                            </div>
                                        </td>
                                        
                                        <td style="text-align: center">
                                            <a id="EditBtn" rid="{{$data->id}}"> <i class="fa fa-edit" style="color: #2196f3;font-size:16px;"> </i></a>
                                            <a id="deleteBtn" rid="{{$data->id}}"> <i class="fa fa-trash-o" style="color: red;font-size:16px;"></i></a>
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
        var url = "{{URL::to('/admin/active-donor')}}";
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
            var url = "{{URL::to('/admin/donor')}}";
            var updateurl = "{{URL::to('/admin/donor-update')}}";
            // console.log(url);
            $("#addBtn").click(function(){
                // fundraiser create 
                if($(this).val() == 'Create') {
                    var form_data = new FormData();
                    form_data.append("name", $("#name").val());
                    form_data.append("sur_name", $("#sur_name").val());
                    form_data.append("email", $("#email").val());
                    form_data.append("phone", $("#phone").val());
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
                }
                // fundraiser create 
                //Update
                if($(this).val() == 'Update'){

                    var form_data = new FormData();
                    form_data.append("name", $("#name").val());
                    form_data.append("sur_name", $("#sur_name").val());
                    form_data.append("email", $("#email").val());
                    form_data.append("phone", $("#phone").val());
                    form_data.append("house_number", $("#house_number").val());
                    form_data.append("street_name", $("#street_name").val());
                    form_data.append("town", $("#town").val());
                    form_data.append("postcode", $("#postcode").val());
                    form_data.append("password", $("#password").val());
                    form_data.append("confirm_password", $("#confirm_password").val());
                    form_data.append("codeid", $("#codeid").val());
                    
                    $.ajax({
                        url: updateurl,
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
                }
                //Update

            });

            //Edit
            $("#contentContainer").on('click','#EditBtn', function(){
                $accountid = $(this).attr('rid');
                $info_url = url + '/'+$accountid+'/edit';
                $.get($info_url,{},function(d){
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
                $("#name").val(data.name);
                $("#sur_name").val(data.sur_name);
                $("#email").val(data.email);
                $("#phone").val(data.phone);    
                $("#house_number").val(data.house_number);   
                $("#town").val(data.town);        
                $("#postcode").val(data.postcode);   
                $("#street_name").val(data.street_name);     
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
@endsection