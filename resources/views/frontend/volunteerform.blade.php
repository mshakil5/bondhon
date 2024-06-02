@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')

<style>
    .pagetitle{
        font-size: 30px;
    }

    .sectionTitle {
        font-size: 2rem;
        text-align: center;
        color: #000;
        font-family: 'poppins-bold';
        padding: 15px 0;
        margin-bottom: 50px;
        position: relative;
        display: inline-block;
        background: #fff;
        padding: 14px;
        }

        @media (max-width: 768px) {
        .sectionTitle::before {
            display: none;
        }
        }

        .services .items {
        height: 215px;
        overflow: hidden;
        position: relative;
        margin-bottom: 23px;
        border-radius: 4px;
        width: 100%;
        border-radius: 10px;
        }


        .items {
            border: 1px solid #ccc;
            padding: 10px;
            transition: transform 0.3s ease;
            background-color: #f0f0f0;
        }

        .items:hover {
            transform: scale(1.05);
        }

        .info {
            padding: 10px;
        }

        .name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .email,
        .address,
        .dob {
            margin-bottom: 5px;
        }




</style>
<section class="auth py-4">
    <div class="container">
       
        <div class="row my-5">
            <div class="col-lg-10 mx-auto authBox">
                <div class="row">
                    
                    <div class="title text-center txt-secondary">AidMeUK</div>
                    <small class="text-center mb-5">(Uniting for a better community)</small>
                        @if (isset($message))
                        <div class='alert alert-success title text-center txt-secondary'><b>{{ $message }}</b></div>

                        @endif

                        @if(session()->has('error'))
                        <p class="alert alert-warning"> {{ session()->get('error') }}</p>
                        @endif

                        @if(session()->has('any'))
                        <p class="alert alert-warning"> {{ session()->get('any') }}</p>
                        @endif
                    <h4 class="text-center">
                        <u style="text-decoration: underline;">Volunteer Registration Form</u>
                    </h4>
                    <div class="row">
                        <div class="col-lg-10  mx-auto">
                            <div class="pb-2 mb-2">
                                Our ref:
                            </div>
                            <form method="POST" action="{{route('volunteer.store')}}"  enctype="multipart/form-data">
                                @csrf

                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="name" style="font-size: 23px">Name </label>
                                </div>
                                <div class="col-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="profession" style="font-size: 23px">Profession </label>
                                </div>
                                <div class="col-8">
                                    <input id="profession" type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" required autocomplete="profession" placeholder="Profession" autofocus>
                                    @error('profession')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="email" style="font-size: 23px"> Email </label>
                                </div>
                                <div class="col-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="phone" style="font-size: 23px">Tel </label>
                            </div>
                            <div class="col-8">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Tel" autofocus>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="dob" style="font-size: 23px">Date of birth</label>
                            </div>
                            <div class="col-8">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" placeholder="dob" autofocus>
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="address" style="font-size: 23px">Address</label>
                            </div>
                            <div class="col-8">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Address" autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <h4 class="">
                            <u style="text-decoration: underline;"><b>Volunteer Rules</b></u>
                        </h4>

                        <div class="col-lg-12 mt-3">
                            <p class="para mb-3 text-muted fs-6 ">
                                (1) Volunteer is open to individuals over 18 and above. <br>
                                (2) Director may refuse an application if found unfit for the group’s purpose.<br>
                                (3) Volunteer is not transferable to anyone else.<br>
                                (4) Volunteer must adhere and comply with the team leader decision.<br>
                                (5) Respect and listen to each other maturely and discuss any differences without any derogatory behaviour.<br>
                                (6) Use of bad language will deem termination of your volunteer registration.<br>
                                (7) All discussions and decisions made by the group should be private & confidential and refrain from disclosure.<br>
                                (8) All Volunteer will have equal rights/status. <br>
                                (9) Volunteer will be terminated if:<br>
                                    <span style="margin-left: 35px">(i) the Volunteer dies;</span><br>
                                    <span style="margin-left: 35px">(ii) the organisation, ceases to exist;</span><br>
                                    <span style="margin-left: 35px">(iii) the Volunteer resigns by written notice.</span>


                            </p>
                        </div>

                            <div class="col-lg-12 mt-3">
                                <p class="para mb-3 text-muted fs-6 ">
                                    <input type="checkbox" class="me-2" required>I agree to the <a href="{{route('frontend.terms')}}" style="text-decoration: none;color:#212529"> Terms & Conditions. </a><br>
                                </p>
                            </div>

                            <div>
                                <p> <b>Declaration</b>: I hereby read, understand and acknowledge all rules of AidMeUK.</p>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="print_name" style="font-size: 23px">Print Name</label>
                                </div>
                                <div class="col-8">
                                    <input id="print_name" type="text" class="form-control @error('print_name') is-invalid @enderror" name="print_name" value="{{ old('print_name') }}" required autocomplete="print_name" placeholder="Print Name" autofocus>
                                    @error('print_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="row mb-2">
                                <div class="col-2">
                                    <label for="date" style="font-size: 23px">Date</label>
                                </div>
                                <div class="col-4">
                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                

                            <div class="col-lg-12 mt-3">
                                <p class="para mb-3 text-muted fs-6 ">
                                    Registered Office:York United Group Ltd, 10 Newgate (2 nd Floor), York, North Yorkshire, YO1 7LA <br>
                                    Company Registration Number: 14988459 <a href="https://www.aidmeuk.com/" target="blank">www.aidmeuk.com</a> , info@aidmeuk.com
    
                                </p>
                            </div>

                            
                            

                            <div class="form-group  text-center">
                                <button type="submit" class="btn-theme bg-primary text-center mx-0 ">Send</button>
                            </div>


                        </form>

                        </div>
                    </div>
                    
                    
                   
                </div>
            </div>
        </div>
    </div>
</section> 


<section class="services py-5 border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="sectionTitle">
                    Our Volunteer
                </div>
            </div>
        </div>
        <div class="row">
            @foreach (\App\Models\Volunteer::where('status', 1)->get() as $item)
            <div class="col-md-3">
                <div class="items bg-olive">
                    <div class="info">
                        <div class="name">{{$item->name}}</div>
                        <div class="name">ID: {{$item->volunteerid}}</div>
                        <div class="email">{{$item->email}}</div>
                        <div class="address">{{$item->address}}</div>
                        <div class="dob">{{$item->phone}}</div>
                    </div>
                </div>
            </div>
            @endforeach
            
            




        </div>
    </div>
</section>




@endsection

@section('scripts')
@endsection