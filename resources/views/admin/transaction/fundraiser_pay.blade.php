@extends('admin.layouts.admin')

@section('content')

<!-- content area -->
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{route('admin.newfundraiser')}}" class="btn-theme bg-primary">Back</a>
                                
            <div class="pagetitle pb-2">
                Pay fundraiser
            </div>
        </div>
    </div>
        <div class="row ">
            <div class="col-lg-6  px-3">
                @if(session()->has('message'))
                    <section class="px-4">
                        <div class="row my-3">
                            <div class="alert alert-success" id="successMessage">{{ session()->get('message') }}</div>
                        </div>
                    </section>
                    @endif
                    @if(session()->has('error'))
                    <section class="px-4">
                        <div class="row my-3">
                            <div class="alert alert-danger" id="errMessage">{{ session()->get('error') }}</div>
                        </div>
                    </section>
                    @endif
                
                <form method="POST" action="{{ route('admin.fundraiserPaystore') }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount">
                                <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="form-group ">
                                <label for="description">Note</label>
                                <input type="text" class="form-control" placeholder="Note" id="description" name="description">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group ">
                                <label for="source">Source</label>
                                <select name="source" id="source" class="form-control">
                                    <option value="Bank">Bank</option>
                                </select>
                            </div>
                        </div>

                        
                        <div class="col-lg-12 mt-4">
                            <div class="form-group ">
                                <button class="btn-theme bg-primary">Add</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-6 border-left-lg px-3">
                        <div class="row mb-5">
                            <div class="col-lg-12">
                                <div class="user">
                                    Fundraiser Information
                                </div>

                            </div>
                        </div>
                        

                        <!-- loop start -->
                        <div class="row mb-4">
                            <div class="date">
                                Name
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="info">{{$user->name}}</div>
                                </div>
                            </div>
                        </div>
                        <!-- end -->

                        <!-- loop start -->
                        <div class="row mb-4">
                            <div class="date">
                               Surname
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="info">{{$user->sur_name}}</div>
                                </div>
                            </div>
                        </div>
                        <!-- end -->

                        <!-- loop start -->
                        <div class="row mb-4">
                            <div class="date">
                                Email
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="info">{{$user->email}}</div>
                                </div>
                            </div>
                        </div>
                        <!-- end -->

                        <!-- loop start -->
                        <div class="row mb-4">
                            <div class="date">
                                Phone
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="info">{{$user->phone}}</div>
                                </div>
                            </div>
                        </div>
                        <!-- end -->

                        <!-- loop start -->
                        <div class="row mb-4">
                            <div class="date">
                                Address
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="info">{{$user->house_number}},{{$user->street_name}},{{$user->town}},{{$user->postcode}}</div>
                                </div>
                            </div>
                        </div>
                        <!-- end -->




                    </div>
        </div>
</div>






@endsection
@section('script')
<script>
    $(document).ready(function () {

        
          

    });
</script>




@endsection