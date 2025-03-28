
    

    <!-- <section class="topbar topbar bg-light p-2">
        <div class="container">
            <div class="row z-index ">
               <div class="col-md-12 text-center  text-dark">
                    <h2>The site is not ready yet, we will be live very soon</h2>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-6 text-center  text-dark">
                    <small>Welcome To Bondhon. Popular Charity</small>
                </div>
                <div class="col-md-3 d-flex justify-content-center-sm ">
                    <ul class="social-links my-1">
                        <li>
                            <a href="">
                                <iconify-icon icon="dashicons:facebook-alt"></iconify-icon>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <iconify-icon icon="ri:youtube-line"></iconify-icon>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <iconify-icon icon="line-md:instagram"></iconify-icon>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
    -->

    <section class="app-header bg-white">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg px-3">
                    <a class="navbar-brand" href="{{ route('homepage')}}">
                        <img src="{{ asset('images/company/'.\App\Models\CompanyDetail::where('id',1)->first()->header_logo)}}" class="img-fluid mx-auto" width="100" >
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav mx-auto navCustom">

                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="{{route('homepage')}}">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{route('frontend.about')}}" >About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{route('frontend.gallery')}}" >Gallery</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="{{route('frontend.contact')}}">contact Us</a>
                            </li>
            
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('frontend.about')}}" id="dropdownItem" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    About
                                    <iconify-icon icon="tabler:chevron-down" class="down ms-1"></iconify-icon>
                                    <iconify-icon icon="tabler:chevron-up" class="up ms-1"></iconify-icon>
                                </a>
                                <ul class="dropdown-menu rounded-0 shadow-sm"  aria-labelledby="dropdownItem">
                                    <li><a class="dropdown-item" href="{{ route('frontend.about')}}">About Bondhon</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.directors')}}">Who we are</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.advisor')}}">Advisory Team</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.news')}}">Transparency</a></li>
                                </ul>
                            </li> -->
                            
                            


                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownItem" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Get Involved
                                    <iconify-icon icon="tabler:chevron-down" class="down ms-1"></iconify-icon>
                                    <iconify-icon icon="tabler:chevron-up" class="up ms-1"></iconify-icon>
                                </a>
                                <ul class="dropdown-menu rounded-0 shadow-sm"  aria-labelledby="dropdownItem">
                                    <li><a class="dropdown-item" href="{{route('frontend.work')}}">How you can help</a></li>
                                    <li><a class="dropdown-item" href="{{route('frontend.volunteerform')}}">Volunteer with us</a></li>
                                    <li><a class="dropdown-item" href="{{route('frontend.network')}}">Our Contributors</a></li>
                                    <li><a class="dropdown-item" href="{{route('frontend.giftaid')}}">Major Gift Giving</a></li>
                                </ul>
                            </li> -->
<!--
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('frontend.about')}}" id="dropdownItem" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    About
                                    <iconify-icon icon="tabler:chevron-down" class="down ms-1"></iconify-icon>
                                    <iconify-icon icon="tabler:chevron-up" class="up ms-1"></iconify-icon>
                                </a>
                                <ul class="dropdown-menu rounded-0 shadow-sm"  aria-labelledby="dropdownItem">
                                    <li><a class="dropdown-item" href="{{ route('frontend.about')}}">About bondhon</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.directors')}}">Director & Member</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.news')}}">Transparency</a></li>
                                </ul>
                            </li>-->

                            {{-- <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="{{ route('frontend.about')}}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="{{route('frontend.contact')}}">contact</a>
                            </li> --}}
                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('frontend.about')}}" > About Us
                                    <span id="dropdownItem" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <iconify-icon icon="tabler:chevron-down" class="down ms-1" ></iconify-icon> <iconify-icon icon="tabler:chevron-up" class="up ms-1"></iconify-icon></span>
                                </a>
                                <ul class="dropdown-menu rounded-0 shadow-sm" aria-labelledby="dropdownItem">
                                    <li><a class="dropdown-item" href="{{ route('frontend.trustees')}}">Board of trustees</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.directors')}}">Board of directors</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.news')}}">News</a></li>
                                </ul>
                            </li> --}}

                        </ul>
                        
                    </div>
                </nav>
            </div>
        </div>
    </section>


