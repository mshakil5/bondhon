@extends('frontend.layouts.master')
@section('content')


<section class="bleesed">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="searchBox p-0 mt-3  shadow-sm">
                <div class="referrmsg"></div>
                <input placeholder="Referral link paste here .." type="url" id="refurl" name="refurl">
                <button id="refsubBtn">
                    <iconify-icon icon="quill:search"></iconify-icon>
                </button>
            </div>
        </div>
    </div>
</section>

<section class="bleesed default py-5">
    <div class="container"> 
        <div class="row mt-5">
            @if (Session::has('success'))
                <div class="alert alert-success mt-2">{{ Session::get('success') }} 
                </div>
                @endif
            <div class="col-lg-6">
                <h2 class="fw-bold darkerGrotesque-bold txt-primary mb-3"> List of referred campaign</h2>
                
            </div>
            <div class="col-lg-6 d-flex align-items-center justify-content-end fs-5"> 

                <form action="" class="d-flex">
                    <div class="me-2">
                        <label for="">From</label>
                        <input type="date" class="form-control fs-5" style="height: 46px;" placeholder="Search">

                    </div>
                    <div class="d-flex align-items-end">
                        <div class="me-2">
                            <label for="">To</label>
                            <input type="date" class="form-control fs-5" style="height: 46px;" placeholder="Search">
                        </div>
                        <button class="btn btn-theme bg-primary m-0" style="height:46px;">
                            <iconify-icon icon="material-symbols:search-sharp"></iconify-icon>
                            </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            
            <div class="col-lg-12 mb-4 mt-5">
                 
                <div class="table-responsive fs-5 shadow-sm  ">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"> Date</th>
                                <th scope="col">Title</th>
                                <th scope="col">Country</th>
                                <th scope="col">Source</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th> 
                                <th scope="col">Assign</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }}</td>
                                    <td>{{$data->title}} </td>
                                    <td>{{$data->country->name}} </td>
                                    <td>{{ \App\Models\FundraisingSource::where('id',$data->fundraising_source_id)->first()->name}} </td>
                                    <td>${{$data->raising_goal}}</td>
                                    <td> @if ($data->status == 1) Active @else Deactive @endif </td> 
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn-theme bg-secondary w-100 me-1 ms-0 refBtn" style="border: none;background: #18988b;color: white;" data-bs-toggle="modal" data-bs-target="#referralModal" campaign="{{$data->id}}" uid="{{Auth::user()->id}}">
                                            Refer
                                        </button>
                                    </td> 
                                </tr>
                            @endforeach
                            
                          

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="col-lg-6 mx-auto mt-2">
                <a href="{{ route('newcampaign_show')}}" class="btn-theme bg-primary mx-auto w-50 text-center d-block">Create New Campaign</a>
            </div> 
        </div>
    </div>
</section>

<!--referral Modal  Modal -->
<div  class="modal fade" id="referralModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="ermsg"></div>
            <div class="form-custom">

                <div class="title text-center txt-secondary">Link</div>
                <div class="form-group">
                    <input id="ref_link" type="text" class="form-control" name="ref_link" value="" >
                </div>
                <br>
                <div class="form-group">
                    <button onclick="copyToClipboard()" class="btn-theme bg-primary d-block text-center mx-0 w-100">Copy</button>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

@endsection

@section('script')
<script>
    var url = "{{URL::to('/referral/campaign')}}";
$(document).on('click', '.refBtn', function () {
    campaign = $(this).attr('campaign');
    uid = $(this).attr('uid');
    link = url+'?campaignid='+ campaign +'&uid='+uid;
    $('#referralModal').find('.modal-body #ref_link').val(link);
    // $('#referralModal').find('.modal-body #frombranchid').val(branchid);
});
</script>
<script>
    function copyToClipboard() {
        document.getElementById("ref_link").select();
        document.execCommand('copy');
        $(".ermsg").html("<div class='alert alert-success'><b>Copied.</b></div>");
    }

    
$(document).ready(function () {

    //header for csrf-token is must in laravel
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            //
        // var url = "{{URL::to('/admin/why-choose-us')}}";
        // console.log(url);
        // $("#refsubBtn").click(function(){

        //     var form_data = new FormData();
        //     form_data.append("description", $("#description").val());
        //     $.ajax({
        //         url: refurl,
        //         method: "POST",
        //         contentType: false,
        //         processData: false,
        //         data:form_data,
        //         success: function (d) {
        //             if (d.status == 303) {
        //                 $(".ermsg").html(d.message);
        //             }else if(d.status == 300){
        //             success("Data Insert Successfully!!");
        //                 window.setTimeout(function(){location.reload()},2000)
        //             }
        //         },
        //         error: function (d) {
        //             console.log(d);
        //         }
        //     });
        // });


});


</script>

<script>
    document.getElementById("refsubBtn").addEventListener("click", myRefFunction);
    function myRefFunction() {
        // alert('btn work');
        $newurl = $("#refurl").val();
        console.log($newurl);
      window.location.href= $newurl;
    }
  </script>

@endsection
