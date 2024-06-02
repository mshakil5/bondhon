@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')


<section class="auth py-4">
    <div class="container">
       
        <div class="row my-5">
            <div class="col-lg-10 mx-auto authBox">
                <div class="row">
                    <div class="col-lg-7 d-flex align-items-center justify-content-center">
                        {{-- <img src="{{ asset('assets/images/log in page 1.svg')}}" alt="" class="w-100"> --}}
                    </div>
                    <div class="col-lg-5"> 

                        
                        @if (isset($message))
                        <span class="login-head" role="alert">
                            <strong><p style="color: red">{{ $message }}</p></strong>
                        </span>
                        @endif
                         
                        <form method="POST" action="{{ route('register') }}" class="form-custom py-4">
                            @csrf
                              <div class="title text-center mb-5 txt-secondary">Create Account</div>
                            <div class="form-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>

                                <input id="hiddenid" type="hidden" class="form-control" name="hiddenid" value="{{time()}}" >
                                
                            </div>
                            <div class="form-group" style="display: none">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="surname" placeholder="Surname" autofocus>
                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number" autofocus>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group" style="display: none">
                                <input id="house_number" type="text" class="form-control @error('house_number') is-invalid @enderror" name="house_number" value="{{ old('house_number') }}" autocomplete="house_number" placeholder="House Number" autofocus>
                                @error('house_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group" style="display: none">
                                <input id="street_name" type="text" class="form-control @error('street_name') is-invalid @enderror" name="street_name" value="{{ old('street_name') }}" autocomplete="street_name" placeholder="Street" autofocus>
                                @error('street_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group" style="display: none">
                                <input id="town" type="text" class="form-control @error('town') is-invalid @enderror" name="town" value="{{ old('town') }}" autocomplete="town" placeholder="Town" autofocus>
                                @error('town')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group" style="display: none">
                                <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{ old('postcode') }}" autocomplete="postcode" placeholder="Post code" autofocus>
                                @error('postcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" placeholder="Password" autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required autocomplete="confirm_password" placeholder="Confirm Password" autofocus>
                                @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Message"></textarea> 
                            </div> -->
                            <div class="form-group">
                                <button type="submit" class="btn-theme bg-primary d-block text-center mx-0 w-100">Sign up</button>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <span class="txt-primary fs-20 me-2 ">or</span>
                                 <a href="{{ route('login')}}" class="theme-link"> log into another account</a>
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section> 

@endsection
