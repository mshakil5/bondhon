@extends('frontend.layouts.master')

@section('content')
<section class="mb-5">
    <div class="container mb-5">
        <div class="row justify-content-center py-5">
            <div class="col-md-8 text-center">
                <h2 class="txt-primary poppins-bold display-4">{{ $blog->title }}</h2>
                <p class="text-muted small mt-2">
                    Published {{ $blog->created_at->diffForHumans() }}
                </p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center mb-4">
                    <img src="{{ asset($blog->image) }}" class="img-fluid rounded shadow-sm" 
                         alt="{{ $blog->title }}" style="max-height: 500px; width: 800px; object-fit: cover;">
                </div>

                <div class="content mt-4">
                    <h3 class="txt-primary poppins-medium display-6">{{ Str::limit(strip_tags($blog->description), 100) }}</h3>
                    <hr class="my-4">
                    <p class="txt-primary lead" style="text-align: justify;">
                        {!! $blog->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection