@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')

<style>
    .pagetitle{
        font-size: 30px;
    }
</style>
<section class="auth py-4">
    <div class="container">
       
        <div class="row my-5">
            <div class="col-lg-10 mx-auto authBox">
                <div class="row">
                    
                    <div class="title text-center mb-5 txt-secondary">Create Charity Account</div>
                        @if (isset($message))
                        <span class="login-head" role="alert">
                            <strong><p style="color: red">{{ $message }}</p></strong>
                        </span>
                        @endif

                        @if(session()->has('error'))
                        <p class="alert alert-warning"> {{ session()->get('error') }}</p>
                        @endif

                        @if(session()->has('any'))
                        <p class="alert alert-warning"> {{ session()->get('any') }}</p>
                        @endif
                    <h4 class="text-center">
                        Please complete the following fields and provide supporting documents for your charity.
                    </h4>
                    <div class="row">
                        <div class="col-lg-10  mx-auto">
                            <div class="pagetitle pb-2 mb-2">
                                Charity info
                            </div>
                            <form method="POST" action="{{ route('charity.registration') }}"  enctype="multipart/form-data">
                                @csrf

                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="name" style="font-size: 23px">Charity Name </label>
                                </div>
                                <div class="col-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Charity Name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="charity_reg_number" style="font-size: 23px">Charity Number </label>
                                </div>
                                <div class="col-8">
                                    <input id="charity_reg_number" type="number" class="form-control @error('charity_reg_number') is-invalid @enderror" name="charity_reg_number" value="{{ old('charity_reg_number') }}" required autocomplete="charity_reg_number" placeholder="Charity Number" autofocus>
                                    @error('charity_reg_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="country" style="font-size: 23px">Country </label>
                                </div>
                                <div class="col-8">
                                    <select name="country" id="country" class="form-control @error('country') is-invalid @enderror" required autocomplete="country" autofocus>
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7">
                                    <label for="postcode" style="font-size: 23px">Upload copy of bank statement for varification</label>
                                </div>
                                <div class="col-5">
                                    <input id="bank_statement" type="file" class="form-control @error('bank_statement') is-invalid @enderror" name="bank_statement" value="{{ old('bank_statement') }}" autocomplete="bank_statement" placeholder="Post code" autofocus>
                                    @error('bank_statement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        <div class="pagetitle pb-2 mb-2">
                            Representative info
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="r_name" style="font-size: 23px">Representative Name </label>
                            </div>
                            <div class="col-8">
                                <input id="r_name" type="text" class="form-control @error('r_name') is-invalid @enderror" name="r_name" value="{{ old('r_name') }}" required autocomplete="r_name" placeholder="Representative Name" autofocus>
                                @error('r_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="r_position" style="font-size: 23px">Representative Position </label>
                            </div>
                            <div class="col-8">
                                <input id="r_position" type="text" class="form-control @error('r_position') is-invalid @enderror" name="r_position" value="{{ old('r_position') }}" required autocomplete="r_position" placeholder="Representative Position" autofocus>
                                @error('r_position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="r_phone" style="font-size: 23px">Representative Phone </label>
                            </div>
                            <div class="col-8">
                                <input id="r_phone" type="number" class="form-control @error('r_phone') is-invalid @enderror" name="r_phone" value="{{ old('r_phone') }}" required autocomplete="r_phone" placeholder="Representative Phone" autofocus>
                                @error('r_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            
                            <div class="pagetitle pb-2 mb-2">
                                Credentials
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
                                    <label for="password" style="font-size: 23px">Password </label>
                                </div>
                                <div class="col-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" placeholder="Password" autofocus>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="confirm_password" style="font-size: 23px">Confirm Password </label>
                                </div>
                                <div class="col-8">
                                    <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required autocomplete="confirm_password" placeholder="Confirm Password" autofocus>
                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <p class="para mb-3 text-muted fs-6 ">
                                    <input type="checkbox" class="me-2" required>I agree to the <a href="{{route('frontend.terms')}}" style="text-decoration: none;color:#212529"> Terms & Conditions. </a><br>
                                </p>
                            </div>
                            

                            <div class="form-group  text-center">
                                <button type="submit" class="btn-theme bg-primary text-center mx-0 ">Sign up</button>
                            </div>


                        </form>

                        </div>
                    </div>


                    <div class="col-lg-12"> 

                        <div class="form-group d-flex justify-content-center">
                            <span class="txt-primary fs-20 me-2 ">or</span>
                             <a href="{{ route('login')}}" class="theme-link"> log into another account</a>
                        </div>

                    </div>
                    
                    <div class="col-lg-12"> 


                        {{-- <div class="pagetitle pb-2 mb-2">
                            Address
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="street_name" style="font-size: 23px">Street Name </label>
                            </div>
                            <div class="col-8">
                                <input id="street_name" type="text" class="form-control @error('street_name') is-invalid @enderror" name="street_name" value="{{ old('street_name') }}" required autocomplete="street_name" placeholder="Street name" autofocus>
                                @error('street_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="house_number" style="font-size: 23px">House Number </label>
                            </div>
                            <div class="col-8">
                                <input id="house_number" type="text" class="form-control @error('house_number') is-invalid @enderror" name="house_number" value="{{ old('house_number') }}" required autocomplete="house_number" placeholder="House number" autofocus>
                                @error('house_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="town" style="font-size: 23px">Town </label>
                            </div>
                            <div class="col-8">
                                <input id="town" type="text" class="form-control @error('town') is-invalid @enderror" name="town" value="{{ old('town') }}" required autocomplete="town" placeholder="Town" autofocus>
                                @error('town')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="postcode" style="font-size: 23px">Post code </label>
                            </div>
                            <div class="col-8">
                                <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{ old('postcode') }}" required autocomplete="postcode" placeholder="Post code" autofocus>
                                @error('postcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        

                            {{-- <div class="form-group">
                                <input id="house_number" type="text" class="form-control @error('house_number') is-invalid @enderror" name="house_number" value="{{ old('house_number') }}" required autocomplete="house_number" placeholder="House Number" autofocus>
                                @error('house_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="street_name" type="text" class="form-control @error('street_name') is-invalid @enderror" name="street_name" value="{{ old('street_name') }}" required autocomplete="street_name" placeholder="Street" autofocus>
                                @error('street_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="town" type="text" class="form-control @error('town') is-invalid @enderror" name="town" value="{{ old('town') }}" required autocomplete="town" placeholder="Town" autofocus>
                                @error('town')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{ old('postcode') }}" required autocomplete="postcode" placeholder="Post code" autofocus>
                                @error('postcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            
                            
                            <!-- <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Message"></textarea> 
                            </div> -->
                            
                            
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section> 


@endsection
