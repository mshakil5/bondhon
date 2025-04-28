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

    #cookiebar {
            position: fixed;
            bottom: 0;
            left: 5px;
            right: 5px;
            display: none;
            z-index: 200;
        }

    #cookiebarBox {
        position: fixed;
        bottom: 0;
        left: 5px;
        right: 5px;
        // display: none;
        z-index: 200;
    }
    .containerrr {
        border-radius: 3px;
        background-color: white;
        color: #626262;
        margin-bottom: 10px;
        padding: 10px;
        overflow: hidden;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        position: fixed;
        padding: 20px;
        background-color: #fff;
        bottom: -10px;
        width: 100%;
        -webkit-box-shadow: 2px 2px 19px 6px #00000029;
        box-shadow: 2px 2px 19px 6px #00000029;
        border-top: 1px solid #356ffd1c;
    }

    .cookieok {
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        background-color: #e8f0f3;
        color: #186782 !important;
        font-weight: 600;
        // float: right;
        line-height: 2.5em;
        height: 2.5em;
        display: block;
        padding-left: 30px;
        padding-right: 30px;
        border-bottom-width: 0 !important;
        cursor: pointer;
        max-width: 200px;
        margin: 0 auto;

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

@if($section_status->blog == 1)
<section class="blog-section spacer">
    <div class="container">
        @foreach ($videoBlogCategories as $category)
            @if ($category->blogs->count() > 0)
                <div class="row justify-content-center mb-5">
                    <div class="col-md-8 mx-auto">
                        <h2 class="title-global text-center">
                            {{ $category->name }}
                        </h2>
                    </div>
                </div>
        
                <div class="row blog-row mt-5">
                    @foreach ($category->blogs as $videoBlog)
                        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="blog">
                                <div class="photo mb-3">
                                    <a href="javascript:void(0);" onclick="showVideoModal('{{ asset($videoBlog->video) }}')">
                                        <img src="{{ $videoBlog->thumbnail ? asset($videoBlog->thumbnail) : 'https://ionicframework.com/docs/img/demos/thumbnail.svg' }}" alt="{{ $videoBlog->title }}" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    {{-- <div class="tag my-2"> --}}
                                        <a href="{{ route('blog.show', $videoBlog->slug) }}" class="fs-5 link-title d-block my-3" style="text-align: justify;">
                                            {{ $videoBlog->title }}
                                        </a>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach

        @foreach ($textBlogCategories as $category)
          <div class="row justify-content-center mb-5">
              <div class="col-md-8 mx-auto">
                  <h2 class="title-global text-center">
                      {{ $category->name }}
                  </h2>
              </div>
          </div>
      
          <div class="row blog-row">
              @foreach ($category->blogs as $blog)
                  <div class="col-md-4 wow fadeInUp" data-wow-delay="0.6s">
                      <div class="blog">
                          <div class="photo mb-3">
                              <a href="{{ route('blog.show', $blog->slug) }}">
                                  <img src="{{ asset($blog->images->first()->image ?? 'https://ionicframework.com/docs/img/demos/thumbnail.svg') }}" 
                                      alt="{{ $blog->title }}" 
                                      class="img-fluid" 
                                      style="width: 100%; height: 200px; object-fit: cover;">
                              </a>
                          </div>
                          <div class="blog-content">
      
                              <a href="{{ route('blog.show', $blog->slug) }}" class="fs-5 link-title d-block my-3" style="text-align: justify;">
                                  {{ Str::limit($blog->title, 100) }}
                              </a>
      
                              <p>
                                  {{ Str::limit(strip_tags($blog->description), 100) }}
                              </p>              
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
        @endforeach
    </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      window.showVideoModal = function(videoUrl) {
          var videoElement = document.getElementById('modalVideo');
          videoElement.src = videoUrl;
          var myModal = new bootstrap.Modal(document.getElementById('videoModal'));
          myModal.show();
      };
  });
</script>

<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content" style="padding: 0; margin: 0;">
          <div class="modal-header" style="padding: 5px 10px;">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="padding: 5px;">
              <video id="modalVideo" controls autoplay style="max-width: 100%; height: auto; width: 100%;"></video>
          </div>
      </div>
  </div>
</div>

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

<div id="cookiebarBox" class="os-animation" data-os-animation="fadeIn" >
  <div class="containerrr risk-dismiss " style="display: flex;" >
        <div class="container">
          <div class="row">
              <div class="col-md-9">
              <p class="text-left">
             <h1 class="d-inline text-primary"><span class="iconify" data-icon="iconoir:half-cookie"></span> </h1>
             Like most websites, this site uses cookies to assist with navigation and your ability to provide feedback, analyse your use of products and services so that we can improve them, assist with our personal promotional and marketing efforts and provide consent from third parties.
          </p>

              </div>
              <div class="col-md-3 d-flex align-items-center justify-content-center">
                  <a id="cookieBoxok" class="btn btn-sm btn-primary my-3 px-4 text-center" data-cookie="risk" style="background-color: #ee9a40; color: #fff; border:none; font-weight: 600;">Accept</a>
              </div>
          </div>
        </div>
  </div>
</div>

@endsection

@section('script')

<script>
  // if you want to see a cookie, delete 'seen-cookiePopup' from cookies first.

  jQuery(document).ready(function($) {
  // Get CookieBox
  var cookieBox = document.getElementById('cookiebarBox');
      // Get the <span> element that closes the cookiebox
  var closeCookieBox = document.getElementById("cookieBoxok");
      closeCookieBox.onclick = function() {
          cookieBox.style.display = "none";
      };
  });

  (function () {

      /**
       * Set cookie
       *
       * @param string name
       * @param string value
       * @param int days
       * @param string path
       * @see http://www.quirksmode.org/js/cookies.html
       */
      function createCookie(name, value, days, path) {
          var expires = "";
          if (days) {
              var date = new Date();
              date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
              expires = "; expires=" + date.toGMTString();
          }
          else expires = "";
          document.cookie = name + "=" + value + expires + "; path=" + path;
      }

      function readCookie(name) {
          var nameEQ = name + "=";
          var ca = document.cookie.split(';');
          for (var i = 0; i < ca.length; i++) {
              var c = ca[i];
              while (c.charAt(0) == ' ') c = c.substring(1, c.length);
              if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
          }
          return null;
      }

      // Set/update cookie
      var cookieExpiry = 30;
      var cookiePath = "/";

      document.getElementById("cookieBoxok").addEventListener('click', function () {
          createCookie('seen-cookiePopup', 'yes', cookieExpiry, cookiePath);
      });

      var cookiePopup = readCookie('seen-cookiePopup');
      if (cookiePopup != null && cookiePopup == 'yes') {
          cookiebarBox.style.display = 'none';
      } else {
          cookiebarBox.style.display = 'block';
      }
  })();

</script>

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