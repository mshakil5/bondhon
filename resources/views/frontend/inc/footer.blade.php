<footer class="footer-area spacer pb-5">

    <div class="footer-style-1 pt-80">
        <div class="container">
            <div class="row mb-20">
                <div class="col-xl-3 col-lg-3 col-md-6 footer-col-1">
                    <div>
                        <h5 class="fw-bold txt-primary">Description</h5>
                        <div>
                            <p class="text-white">
                                {{\App\Models\CompanyDetail::where('id',1)->first()->footer_content}}
                            </p>
                            <div class="footer-log">
                                <a href="{{ route('homepage')}}" class="footer-logo">
                                    <img src="{{ asset('images/company/'.\App\Models\CompanyDetail::where('id',1)->first()->header_logo)}}" class="img-fluid" width="110px"></a>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-xl-3 col-lg-3 col-md-6 footer-col-2">
                    <div>
                        <h5 class="fw-bold txt-primary">Appeals</h5>
                        <div>
                            <ul class="menu">

                                @foreach (\App\Models\DonationType::where('type', 'Appeals')->where('status', 0)->get() as $appeals)
                                <li>
                                    <a href="{{route('projectDetails', $appeals->id)}}" class="d-flex align-items-center">
                                        <iconify-icon icon="mdi-light:chevron-right"
                                            class="txt-primary fs-4"></iconify-icon>
                                            {{$appeals->menu}}</a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 footer-col-2">
                    <div>
                        <h5 class="fw-bold txt-primary">What we do</h5>
                        <div>
                            <ul class="menu">
                                @foreach (\App\Models\DonationType::where('type', 'Projects')->where('status', 0)->get() as $projects)
                                <li>
                                    <a href="{{route('projectDetails', $projects->id)}}" class="d-flex align-items-center">
                                        <iconify-icon icon="mdi-light:chevron-right"
                                            class="txt-primary fs-4"></iconify-icon>
                                            {{$projects->menu}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 footer-col-3">
                    <div>
                        <h5 class="fw-bold txt-primary">Contact Us</h5>
                        <div>
                            <ul>
                                <li>
                                    <div class="eventBox">
                                        <div class="basis-40 txt-primary">
                                            <h4 class="semi-02-title">
                                                <iconify-icon class="me-2" icon="material-symbols:add-home-outline"></iconify-icon>
                                            </h4>
                                        </div>
                                        <div class="flex-4 pt-2">
                                            <span><i class="fal fa-map-marker-alt"></i>{{\App\Models\CompanyDetail::where('id',1)->first()->address1 }}</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="eventBox">
                                        <div class="basis-40 txt-primary">
                                            <h4 class="semi-02-title">
                                                <iconify-icon class="me-2" icon="memory:email"></iconify-icon>
                                            </h4>
                                        </div>
                                        <div class="flex-4 pt-2">
                                            <span><i class="fal fa-map-marker-alt"></i>{{\App\Models\CompanyDetail::where('id',1)->first()->email1 }}</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="eventBox">
                                        <div class="basis-40 txt-primary">
                                            <h4 class="semi-02-title">
                                                <iconify-icon class="me-2" icon="fluent:call-16-regular"></iconify-icon>
                                            </h4>
                                        </div>
                                        <div class="flex-4 pt-2">
                                            
                                            <span><i class="fal fa-map-marker-alt"></i>{{\App\Models\CompanyDetail::where('id',1)->first()->phone1 }}</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="container py-2 mt-2">
        <div class="">
            <div class="row align-items-center">
                <div class="col-xl-12">
                    <div class="copyright text-center">
                        <p class=" txt-primary">Copyright © 2024 <a href="#">AidmeUK.</a> 
                            Design & Developed By: <a href="https://mentosoftware.co.uk" target="_blank"></a><br>
                            <a href="https://mentosoftware.co.uk" target="_blank">Mento Software</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


