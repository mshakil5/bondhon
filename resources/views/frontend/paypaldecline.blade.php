@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')



<section class="bleesed default">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="title darkerGrotesque-bold lh-1">
                
            </div>
            <div class="para text-center mt-4">
                <h4>You declined the payment!</h4>
            </div>
        </div>
    </div>
</section> 



@endsection

@section('script')

<script>
    // redirect to google after 5 seconds
window.setTimeout(function() {
    window.location.href = 'https://www.aidmeuk.com';
}, 5000);
</script>

@endsection