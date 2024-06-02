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
                        <h1 class="mb-0"></h1>
                        <h4 class="mb-0">years <br>
                            experience
                        </h4>
                        
                    </div>
                </div>
                <br/>
               <h2 class="title-global">Who we work with</h2>
               <p>We will work alongside underprivileged people, supporters, companies, including trusts and institutions to build a better community. The more we come together, the more opportunities will become possible for the underprivileged people.</p>
               </br>
               <h2 class="title-global">Where we work</h2>
               <p>We are there, when underprivileged people need us the most.  We can offer service to help and guide them to build a better future.</p>
               </br>
               <h2 class="title-global">Our staff</h2>
               
               <p>Currently there are no paid staff.  Directors and members work voluntarily together.</p>
               </br>
            </div>
        
            <div class="col-md-6 ">
                <div class="about-right mt-5">
                    {{-- <h2 class="title-global">{{\App\Models\Master::where('name','about')->first()->title}}</h2>
                    {!! \App\Models\Master::where('name','about')->first()->description !!} --}}

                    <h2 class="title-global">How it all started</h2>

                     <p>In January 2023, Makshud Rahman gathered some of his friends to discuss and plan a social organisation to help and support underprivileged people, such as refugees, homelessness and orphaned children.  With six eagerly, interested friends they decided to form a company and pursue their charitable work; In July 2023 they settled on a company name and registered their company - York United Group Ltd. (not for profit - Registration number -14988459).
                     <br/><br/>
                     Each individual friend, personally donates and contributes earnestly, but together with their passion and enthusiasm for helping and giving back to the society, they are confident in elevating their organisation collectively and to do something bigger and better with their hearts content.
                     <br/><br/>
                     Living in a first world country and having to see homelessness, especially in winter seasons is heart-breaking.  To see one of the worst humanitarian crises across the world, with no basic food or clean drinking water is shameful for all mankind.  Therefore, they intend to provide adequate food, clean drinking water, clothing, shelter and sanitation to support homeless people, orphaned children, refugee, emergencies in UK and all across the globe.
                     <br/><br/>
                     They hope to facilitate in building water pumps for clean drinking water where needed; Help and support food banks; Build temporary accommodation; Support medical requirements and aid in ‘start-up’ businesses for an individual to live independently.
                     </br><br/>
                     They intend to broaden their line of work by forming a Community Centre which will include an education section, sports/activities section, pop-up Healthcare/clinic section and community hire rooms, which will all help to generate funding for charitable causes and an overall facility available to serve the community. 
                     <br/><br/>
                     They also, intend and plan to generate funds via projects and events, Zakat & voluntary donations, Gov. grants and sponsorships, which will help to support, where it will make a difference and benefit an individual/family/group.
                     <br/><br/>
                     They hope to make a change and their goal will only be achieved when they see a smile on the faces of the recipients. 
                     </p>
                     
                    
                
                    
                        
                    
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('scripts')
@endsection