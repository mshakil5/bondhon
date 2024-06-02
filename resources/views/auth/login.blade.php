@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')


<section class="auth py-4">
    <div class="container">
       
        <div class="row my-5">
            <div class="col-lg-10 mx-auto authBox">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        {{-- <img src="{{ asset('assets/images/log in page 1.svg')}}" alt="" class="w-100"> --}}

                        

                        <div class="form-theme"> 
                            <div class="flex items-center justify-end mt-4">
                                
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 align-items-center justify-content-center"> 

             
                        @if(session()->has('message'))
                        <p class="alert alert-success"> {{ session()->get('message') }}</p>
                        @endif
                        @if(session()->has('error'))
                        <p class="alert alert-danger"> {{ session()->get('error') }}</p>
                        @endif
                         
                        <form method="POST" action="{{ route('login') }}" class="form-custom mt-5">
                            @csrf

                            <div class="title text-center mb-5 txt-secondary">LOGIN</div>
                            
                                @if (isset($message))
                                <div class="alert alert-danger" role="alert">
                                    <strong><p style="color: red">{{ $message }}</p></strong>
                                </div>
                                @endif
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <span class="txt-primary fs-20 me-2 ">or</span>
                                 <a href="{{ route('password.request') }}" class="theme-link">Forgot password</a>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn-theme bg-primary d-block text-center mx-0 w-100">Login </button>
                            </div>
                            
                            <div class="form-group d-flex justify-content-center">
                                <span class="txt-primary fs-20 me-2 ">or</span>
                                 <a href="{{ route('register')}}" class="theme-link"> Open an account</a>
                            </div>
                        </form>
                         



                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section> 





@endsection
