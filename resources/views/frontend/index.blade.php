@extends('frontend.layouts.master')

@section('content')

<style>

    
    .custom-list {
      padding: 0;
      list-style: none;
    }
    .custom-list li{
      text-decoration: none;
      padding: 5px 15px;
      display: block;
      color: #34342f;
      text-transform: capitalize;
      line-height: 2;
      font-weight: 600;
    }
    .custom-list li:hover {
      background-color: rgba(211, 211, 211, 0.2588235294);
      color: #dd9509;
    }
    
    .custom-list li:hover {
      background-color: rgba(211, 211, 211, 0.2588235294);
      color: #dd9509;
    }
    
    .custom-list li span.active {
      color: #dd9509;
    }


    .photo-gallery {
        color: #313437;
        background-color: #fff;
    }

    .photo-gallery p {
        color: #7d8285;
    }

    .photo-gallery h2 {
        font-weight: bold;
        margin-bottom: 40px;
        padding-top: 40px;
        color: inherit;
    }

    @media (max-width: 767px) {
        .photo-gallery h2 {
            margin-bottom: 25px;
            padding-top: 25px;
            font-size: 24px;
        }
    }

    .photo-gallery .intro {
        font-size: 16px;
        max-width: 500px;
        margin: 0 auto 40px;
    }

    .photo-gallery .intro p {
        margin-bottom: 0;
    }

    .photo-gallery .photos {
        padding-bottom: 20px;
    }

    .photo-gallery .item {
        padding-bottom: 30px;
    }


    /* .lightbox {
    display: none !important;
    } */
    /* .lb-cancel{
        display: none !important;
    } */
    /* .lb-nav a {
    display: none !important;
    } */


    .lb-outerContainer {
    /* display: none !important; */
    }
    
    .height-adjust{
        max-height:75vh;
        overflow-y:scroll;
    }



</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AidmeUK - Uniting for a better communitry</title>
    <link rel="stylesheet" href="./css/bootstrap@5.3.0_dist_css_bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="./css/slick.css" />
    <link rel="stylesheet" type="text/css" href="./css/slick-theme.css" /> -->
    <link rel="stylesheet" type="text/css" href="./css/popup.css" />
    <link rel="stylesheet" href="./css/app.css">
    
    
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Welcome to Aidmeuk- A popular charity in the UK - We will work alongside underprivileged people, supporters, companies, including trusts and institutions to build a better community.">
    <meta name="author" content="">
    
    <meta name="keywords" content="charity,donatio, giving, muslim aid, uk aid, pure water, ">
    </head>



<section class="slider">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">

            @foreach (\App\Models\Slider::where('status',1)->get() as $key => $slider)
            <div class="carousel-item active">
                <img src="{{asset('images/slider/'.$slider->photo)}}" class="d-block w-100" alt="slider photo missing">
                <div class="carousel-text container">
                    {{-- <h5 class="txt-primary">Raising Your Helping Hands</h5> --}}
                    <h1 class="main-title">{{$slider->title}}</h1>
                    {{-- <div class="d-flex flex-wrap align-items-center justify-content-center-sm">
                        <a href="" class="btn-theme">
                            <div class="icon">
                                <iconify-icon icon="mdi:hand-heart" class=" mx-2"></iconify-icon>
                            </div>
                            learn more
                        </a>
                        <a href=" " class="btn-theme bg-secondary">
                            <div class="icon">
                                <iconify-icon icon="mdi:hand-heart" class=" mx-2"></iconify-icon>
                            </div>
                            our cases
                        </a>
                    </div> --}}
                </div>
            </div>
            @endforeach
            
            

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section class="featured-post">
    <div class="container">
        <div class="row">

            @foreach (\App\Models\DonationType::where('type', 'Projects')->where('status', 0)->orderby('id', 'DESC')->limit(3)->get() as $projects)

            <div class="col-md-4">
                <div class="inner">
                    <div class="items wow fadeIn" data-wow-delay="0.6s">
                        <a href="{{route('projectDetails', $projects->id)}}" class="title fw-bold">
                            <div class="photo">
                                <img src="{{ asset('images/'.$projects->image)}}" alt="" class="img-fluid">
                            </div>
                        </a>
                        <div class="bottom-part">
                            <div class="items">
                                <a href="{{route('projectDetails', $projects->id)}}" class="title fw-bold">{{$projects->title}}</a>
                                {{-- <div class="sub-title">Giving money to food </div> --}}
                            </div>
                            <div class="items">
                                <div class="link">
                                    <a href="{{route('projectDetails', $projects->id)}}">
                                        <iconify-icon icon="ci:chevron-right-duo"></iconify-icon>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </div>
</section>

<section class="join py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class=" col-md-8">
                <h2 class="display-6 m-0 text-center">Donate direct to our Bank account: </h2>
            </div>
            <div class=" col-md-4 d-flex align-items-center justify-content-center">
              <p><h2>York United Group Ltd</br>
SC :30 99 50</br>
AC :10350363</h2>
</p>
                <!--
                <a class="btn-theme " href="{{route('frontend.volunteerform')}}">learn more
                    <div class="icon">
                        <iconify-icon icon="ph:heart-fill"></iconify-icon>
                    </div>
                </a>-->
            </div>
        </div>
    </div>
</section>


<section class="post-view spacer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mx-auto ">
                {{-- <h6 class="txt-primary fs-4 d-flex justify-content-center  align-items-center">
                    <iconify-icon icon="ph:heart-fill"></iconify-icon>
                    Appeals
                </h6> --}}
                <h2 class="title-global text-center">
                    Appeals
                </h2>
            </div>
        </div>
        <div class="row mt-5">




            @foreach (\App\Models\DonationType::where('type', 'Appeals')->orderby('id', 'DESC')->where('status', 0)->limit(6)->get() as $appeals)

            <div class="col-md-4 col-sm-6 col-xs-12  wow fadeInUp " data-wow-delay="0.6s">
                <div class="card-theme">
                    <a href="{{route('projectDetails', $appeals->id)}}">
                        <div class="photo">
                            <img src="{{ asset('images/'.$appeals->image)}}" class="img-fluid" alt="">
                        </div>
                    </a>
                    
                    <div class="content p-4">
                        <div class="text-center">
                            <a href="{{route('frontend.donation')}}" class="btn-theme " style="top: -50px">
                                <div class="icon">
                                    <iconify-icon icon="mdi:hand-heart" class=" mx-2"></iconify-icon>
                                </div>
                                Donation
                            </a>
                        </div>
                        
                        <div>
                            <a href="{{route('projectDetails', $appeals->id)}}" class="fs-3 link-title d-block my-3" style="top: -50px">
                                {{$appeals->title}}
                            </a>
                            <p>
                                {!!  Str::limit($appeals->description , 70) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            



        </div>
    </div>
</section>


{{-- gallery here  --}}
@if ($galleries->count() > 0)
    
<section class="about spacer">
    <div class="">

        <div class="photo-gallery">
            <div class="row justify-content-center">
                <div class="col-md-8 mx-auto mb-3">
                    <h2 class="title-global text-center">
                        Our Activities
                    </h2>


                </div>
            </div>
    
            <div class="row">
                <div class="col-lg-12 mx-auto px-4">
                    <div class="row ">
                        <div class="col-lg-8 shadow-sm border rounded-0 bg-light height-adjust">
                            <div class="row pt-5 px-4 photos popup-gallery">

                                @foreach ($galleries as $gallery)
                                    <div class="col-sm-6 col-md-4 col-lg-4 item" data-category="{{ $gallery->category->name }}">
                                        <a href="{{ asset('images/gallery/' . $gallery->image) }}" data-lightbox="photos">
                                            <img class="img-fluid" src="{{ asset('images/gallery/' . $gallery->image) }}" alt="{{ $gallery->title }}">
                                        </a>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        <div class="col-lg-4 shadow-sm border rounded-0 bg-light">
                            <div class="py-4">
                                <ol class="custom-list w-100">

                                    <li class="d-flex justify-content-between align-items-center pe-2 rounded-2 "><span class="category active"  data-category="all">All</span></li>

                                    @foreach ($categories as $category)
                                        
                                    <li class="d-flex justify-content-between align-items-center pe-2 rounded-2"><span class="category" data-category="{{ $category->name }}">{{ $category->name }}</span></li>

                                    @endforeach
                                    
                                    


                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
    
    
            </div>
        </div>
        
        
    </div>
</section>
@endif



<section class="about spacer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-right mt-2">
                    {{-- <h6 class="txt-primary fs-4 d-flex align-items-center">
                        <iconify-icon icon="ph:heart-fill"></iconify-icon>
                        About EnaCare
                    </h6> --}}
                    
                    <h2 class="title-global text-center">{{\App\Models\Master::where('name','homepage2ndsection')->first()->title}}</h2>
                    

                    {!! \App\Models\Master::where('name','homepage2ndsection')->first()->description !!}
                    
                </div>
            </div>
        </div>
    </div>
</section>



<section class="blog-section spacer" style="display: none">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 mx-auto ">
                <h6 class="txt-primary fs-4 d-flex justify-content-center  align-items-center">
                    <iconify-icon icon="ph:heart-fill" class="me-2"></iconify-icon>
                    Latest news
                </h6>
                <h2 class="title-global text-center">
                    Get Our AidMeUK Every <br>
                    News & Blog
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4  wow fadeInUp " data-wow-delay="0.6s">
                <div class="blog">
                    <div class="photo mb-3">
                        <a href="">
                            <img src="{{ asset('assets/images/posts/4.jpg')}}" alt="">
                        </a>
                    </div>
                    <div class="blog-content">
                        <div class="tag my-2">
                            <a href="">
                                <iconify-icon icon="bi:folder" class="me-1 fs-6 text-white"></iconify-icon>
                                tagname
                            </a>
                        </div>
                        <a href="" class="fs-3 link-title d-block my-3">
                            Experts Global Digital During Developments COVID-19
                        </a>
                        <p>
                            Sed perspiciatis unde omnis iste natus error sit atem accntium doloremque laudantium
                        </p>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4  wow fadeInUp " data-wow-delay="0.6s">
                <div class="blog">
                    <div class="photo mb-3">
                        <a href="">
                            <img src="{{ asset('assets/images/posts/4.jpg')}}" alt="">
                        </a>
                    </div>
                    <div class="blog-content">
                        <div class="tag my-2">
                            <a href="">
                                <iconify-icon icon="bi:folder" class="me-1 fs-6 text-white"></iconify-icon>
                                tagname
                            </a>
                        </div>
                        <a href="" class="fs-3 link-title d-block my-3">
                            Experts Global Digital During Developments COVID-19
                        </a>
                        <p>
                            Sed perspiciatis unde omnis iste natus error sit atem accntium doloremque laudantium
                        </p>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4  wow fadeInUp " data-wow-delay="0.6s">
                <div class="blog">
                    <div class="photo mb-3">
                        <a href="">
                            <img src="{{ asset('assets/images/posts/5.jpg')}}" alt="">
                        </a>
                    </div>
                    <div class="blog-content">
                        <div class="tag my-2">
                            <a href="">
                                <iconify-icon icon="bi:folder" class="me-1 fs-6 text-white"></iconify-icon>
                                tagname
                            </a>
                        </div>
                        <a href="" class="fs-3 link-title d-block my-3">
                            Experts Global Digital During Developments COVID-19
                        </a>
                        <p>
                            Sed perspiciatis unde omnis iste natus error sit atem accntium doloremque laudantium
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="py-5 partners-section" style="display: none">
    <div class="container">
        <div class="partners ">
            <div class="mx-1 d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/images/partners/1.png')}}" class="img-fluid  wow bounce " data-wow-delay="0.6s" alt="">
            </div>
            <div class="mx-1 d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/images/partners/2.png')}}" class="img-fluid  wow bounce " data-wow-delay="0.6s" alt="">
            </div>
            <div class="mx-1 d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/images/partners/3.png')}}" class="img-fluid  wow bounce " data-wow-delay="0.6s" alt="">
            </div>
            <div class="mx-1 d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/images/partners/4.png')}}" class="img-fluid  wow bounce " data-wow-delay="0.6s" alt="">
            </div>
            <div class="mx-1 d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/images/partners/2.png')}}" class="img-fluid  wow bounce " data-wow-delay="0.6s" alt="">
            </div>
            <div class="mx-1 d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/images/partners/3.png')}}" class="img-fluid  wow bounce " data-wow-delay="0.6s" alt="">
            </div>
            <div class="mx-1 d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/images/partners/4.png')}}" class="img-fluid  wow bounce " data-wow-delay="0.6s" alt="">
            </div>


        </div>
    </div>
</section>

    
@endsection

@section('script')

<script>
    $(document).ready(function() {
        lightbox.init();

        $('.category').click(function() {
            
            $('.category').removeClass('active');
            $(this).addClass('active');
            var selectedCategory = $(this).data('category');
            $('.photos .item').hide(); 

            if (selectedCategory === 'all') {
                $('.photos .item').show();
            } else {
                $('.photos .item[data-category="' + selectedCategory + '"]').show();
            }
        });
    });
</script>


<script>
    jQuery(document).ready(function () {
        jQuery('.popup-gallery').magnificPopup({
            
            delegate: 'a',
            type: 'image',
            callbacks: {
                elementParse: function (item) {
                    console.log(item.el.context.className);
                    item.type = 'image',
                            item.tLoading = 'Loading image #%curr%...',
                            item.mainClass = 'mfp-img-mobile',
                            item.image = {
                                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                            }

                }
            },
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1]
            }

        });

    });
</script>




@endsection