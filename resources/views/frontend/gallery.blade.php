@extends('frontend.layouts.master')

@section('css')
@endsection

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


@endsection

@section('script')

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

@endsection