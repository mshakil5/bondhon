@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')




<section class="about spacer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="photo-container position-relative">
                    <img src="{{ asset('assets/images/home/1.jpg')}}"  class="img-fluid  wow fadeIn " data-wow-delay="0.6s" alt="">
                    <div class="info-box">
                        <h1 class="mb-0">25</h1>
                        <h4 class="mb-0">years <br>
                            experience
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="about-right mt-5">
                    {{-- <h2 class="title-global">{{\App\Models\Master::where('name','about')->first()->title}}</h2>
                    {!! \App\Models\Master::where('name','about')->first()->description !!} --}}

                    <h2 class="title-global">About us</h2>

                     <p>AID ME UK is a non-profit organisation working to strengthen humanity’s fight against poverty, social injustice and natural disaster. Through the provision of immediate relief and the establishment of local community media, we aim to invest in real, effective solutions.</p>
                    <p>We work to establish healthcare, education, and livelihood programmes that pave the way for empowered, self-serving communities. We also provide food, medical aid, and disaster relief during emergencies, a critical intervention that saves lives.</p>
                    
                    <h2 class="title-global">Our mission </h2>
                    
                    <p>We are a humanitarian welfare organisation. We save lives, alleviate poverty, transform and empower local communities, build shelter, supply water, education, support health and medical to vulnerable people.</p>
                    
                    <h2 class="title-global">Our vision</h2>
                    
                    To become a successful worldwide organisation of change for a caring, healthy and sustainable local community.
                    
                        
                    
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('scripts')
@endsection