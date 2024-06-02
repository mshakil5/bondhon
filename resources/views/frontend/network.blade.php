@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')




<section class="about spacer">
    <div class="container">
        <div class="row">
            
            
                <div class="about-right mt-5">
                    {{-- <h2 class="title-global">{{\App\Models\Master::where('name','about')->first()->title}}</h2>
                    {!! \App\Models\Master::where('name','about')->first()->description !!} --}}
                    <h2 class="title-global">Contributors</h2>
                    <p>Contributor means a person or an organisation from whom a donation of, not less than <b>£1000.00</b> is received. </p>

                    <b>Honouring Generosity: Our Distinguished Contributors</b>

                     <p>Introduction: AidmeUK, we believe in the power of collective kindness to make a lasting impact on the lives of those in need. In our ongoing efforts to support and uplift communities, we are thrilled to introduce a special initiative that recognizes the extraordinary generosity of individuals who have gone above and beyond in their commitment to making a difference</p></br>
                     
                    <p>We are proud to present our distinguished contributor list, featuring the names, photos, and details of those remarkable individuals who have donated<b> £1000.00</b> or more to our cause. These philanthropic leaders have not only demonstrated a deep sense of compassion but have also become integral partners in our mission to create positive change.</p>
                    
                    <b>How to Become a Recognized Contributor </b>
                    
                    <p>If you share our vision and are interested in becoming a distinguished contributor, we welcome you to reach out to our team. Your substantial contribution will not only make a tangible impact on the lives of those in need but will also earn you a well-deserved place among our esteemed list of contributors</p>
                    
                    <b>Why Recognition Matters</b>
                    
                    <p> Recognizing our generous contributors is not just about acknowledging their financial support; it's about celebrating a shared commitment to making the world a better place. By showcasing these individuals on our charity website, we aim to inspire others to join in our cause, fostering a sense of community and collective responsibility.</p>
                    
                        </br>
                         <p style="color: #fc0fc0;"><b></b><span style="color: #ff00ff;"><a style="color: #000000;" href="{{route('frontend.contributors')}}" target="_blank" rel="noopener noreferrer"><h1> Meet Our Generous Contributors</h1></a></span></p>
                    
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('scripts')
@endsection