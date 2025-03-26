@extends('frontend.layouts.master')

@section('content')
<section class="mb-5">
    <div class="container mb-5">
        <div class="row justify-content-center py-5">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                      @if(session('success'))
                          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                              {{ session('success') }}
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                      @endif
                      @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                        <h2 class="txt-primary poppins-bold display-4 text-center">{{ $blog->title }}</h2>
                        <p class="text-muted small text-center">
                            Published {{ $blog->created_at->diffForHumans() }}
                        </p>

                        <div class="text-center mb-4">
                            <img src="{{ asset($blog->image) }}" class="img-fluid rounded shadow-sm" 
                                 alt="{{ $blog->title }}" style="max-height: 500px; width: 100%; object-fit: cover;">
                        </div>

                        <div class="content mt-4">
                            <h3 class="txt-primary poppins-medium display-6">{{ Str::limit(strip_tags($blog->description), 100) }}</h3>
                            <hr class="my-4">
                            <p class="txt-primary lead" style="text-align: justify;">
                                {!! $blog->description !!}
                            </p>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-info" id="toggleComment">
                                <i class="fas fa-comments"></i> Show Comments
                            </button>
                        </div>

                        <div id="commentSection" class="mt-4" style="display: none;">
                            <h4 class="txt-primary">Comments</h4>

                            <div id="commentsList">
                                @forelse($blog->comments as $comment)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <strong>{{ $comment->name }}</strong>
                                            <p class="text-muted small">{{ $comment->created_at->diffForHumans() }}</p>
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted">No comments yet. Be the first to comment!</p>
                                @endforelse
                            </div>

                            <div class="card mt-4">
                                <div class="card-body">
                                    <h5 class="txt-primary">Leave a Comment</h5>
                                    <form action="{{ route('blog.comment.store', $blog->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Your Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Your Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="comment" class="form-label">Your Comment <span class="text-danger">*</span></label>
                                            <textarea name="comment" rows="4" class="form-control" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">Post Comment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

<script>
    $(document).ready(function(){
        $('#toggleComment').click(function(){
            $('#commentSection').slideToggle();
            $(this).text(function(i, text){
                return text === "Show Comments" ? "Hide Comments" : "Show Comments";
            });
        });
    });
</script>

@endsection