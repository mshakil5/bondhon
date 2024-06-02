@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')




<section class="bleesed default">
    <div class="container">

        <div class="row my-5">
            <div class="col-lg-10 mx-auto authBox">

                <h3 class="fw-bold txt-primary mb-4"> Meet our contributors</h3>


                @foreach ($data as $data)
                <div class="row mb-3">
                    <div class='col-md-6 mb-3 p-5'>
                        <a target="blank" href="{{asset('images/contributor/'.$data->image)}}" class="img-fluid" title="Some Text for the image">
                            <img src="{{asset('images/contributor/'.$data->image)}}" style="width:100%;height:330px" class="img-fluid" alt="Alt text" />
                        </a>          
                    </div>
                    <div class='col-md-6 p-5'>
                        <div class="row">

                            {!! $data->description !!}
                            
                        </div>
                    </div>
                <div>
                @endforeach

                

        


            </div>
        </div>

    </div>
</section>



@endsection

@section('scripts')
@endsection