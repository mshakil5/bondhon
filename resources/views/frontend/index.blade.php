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


    .lb-outerContainer {
    /* display: none !important; */
    }
    
    .height-adjust{
        max-height:75vh;
        overflow-y:scroll;
    }
</style>

@if($section_status->slider == 1)
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach (\App\Models\Slider::where('status', 1)->get() as $index => $slider)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <img src="{{ asset('images/slider/' . $slider->photo) }}" class="d-block w-100" alt="{{ $slider->photo }}">
                <div class="carousel-caption text-white d-none d-md-block">
                    @if($slider->title)
                    <h2 class="text-white">{{ $slider->title }}</h2>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif

@if($section_status->donation == 1)
<section class="join-section">
      <section class="join py-5 mt-5">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-md-8">
                      <h2 class="display-6 m-0 text-center">Donate direct to our Bank account:</h2>
                  </div>
                  <div class="col-md-4 d-flex align-items-center justify-content-center">
                      <h2>
                          York United Group Ltd</br>
                          SC :30 99 50</br>
                          AC :10350363
                      </h2>
                  </div>
              </div>
          </div>
      </section>
</section>
@endif

@if ($galleries->count() && $section_status->our_activities == 1)
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

@if($section_status->about_us == 1)
<section class="about spacer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-right mt-2">
                    <h2 class="title-global text-center">{{\App\Models\Master::where('name','homepage2ndsection')->first()->title}}</h2>
                    {!! \App\Models\Master::where('name','homepage2ndsection')->first()->description !!}           
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if($section_status->blog == 1)
<section class="blog-section spacer">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 mx-auto ">
                <h6 class="txt-primary fs-4 d-flex justify-content-center  align-items-center">
                    <iconify-icon icon="ph:heart-fill" class="me-2"></iconify-icon>
                    Latest news
                </h6>
                <h2 class="title-global text-center">
                    Get Our bondhon Every <br>
                    News & Blog
                </h2>
            </div>
        </div>
        <div class="row blog-row">
            <div class="col-md-4  wow fadeInUp " data-wow-delay="0.6s">
                <div class="blog">
                    <div class="photo mb-3">
                        <a href="">
                            <img src="{{ asset('assets/images/posts/1.jpg')}}" alt="">
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
                            <img src="{{ asset('assets/images/posts/1.jpg')}}" alt="">
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
                            <img src="{{ asset('assets/images/posts/1.jpg')}}" alt="">
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
                            <img src="{{ asset('assets/images/posts/1.jpg')}}" alt="">
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
@endif

@if($section_status->partners == 1)
<section class="py-5 partners-section">
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
@endif

@endsection

@section('script')

<script>
    $(document).ready(function() {
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