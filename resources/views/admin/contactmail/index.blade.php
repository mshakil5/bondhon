@extends('admin.layouts.admin')

@section('content')

<!-- content area -->
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="pagetitle pb-2">
                Email
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-lg-12 px-3 ermsg"> </div>
        <div class="col-lg-6  px-3">
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" value="{{$mail->email}}">
                        <input type="hidden" class="form-control" id="codeid" name="codeid" value="{{$mail->id}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <button class="btn-theme bg-primary" id="upBtn" style="margin: 3px;padding: 6px;">Update</button>
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

            var url = "{{URL::to('/admin/contact-mail')}}";
            // console.log(url);
            $("#upBtn").click(function(){
                    var email= $("#email").val();
                    $.ajax({
                        url:url+'/'+$("#codeid").val(),
                        method: "PUT",
                        type: "PUT",
                        data:{ email:email },
                        success: function(d){
                            if (d.status == 303) {
                                $(".ermsg").html(d.message);
                                pagetop();
                            }else if(d.status == 300){
                                pagetop();
                                success("Data Updated Successfully!!");
                                window.setTimeout(function(){location.reload()},2000)
                            }
                        },
                        error:function(d){
                            console.log(d);
                        }
                    });
                //Update
            });
            //Edit
            $("#contentContainer").on('click','#EditBtn', function(){

                codeid = $(this).attr('rid');
                info_url = url + '/'+codeid+'/edit';
                $.get(info_url,{},function(d){
                    populateForm(d);
                    pagetop();
                });
            });
            //Edit  end

            

    });

    
</script>
@endsection