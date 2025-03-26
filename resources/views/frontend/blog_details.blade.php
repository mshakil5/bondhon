@extends('frontend.layouts.master')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="blog-detail">
                <div class="mb-4">
                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid rounded">
                </div>

                <h1 class="fw-bold mb-3">{{ $blog->title }}</h1>

                <p class="text-muted">
                    <small>Published on {{ $blog->created_at->format('M d, Y') }}</small>
                </p>

                <div class="blog-content">
                    {!! $blog->description !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection