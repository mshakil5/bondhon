@extends('frontend.layouts.master')

@section('content')


<section class="bleesed default">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="fw-bold darkerGrotesque-bold txt-primary mb-3"> All Ticket you have purchased</h2>
            </div>
            <div class="col-lg-6 d-flex align-items-center justify-content-end fs-5">

                <form action="" class="d-flex">
                    <div class="me-2">
                        <label for="">From</label>
                        <input type="date" class="form-control fs-5" style="height: 46px;" placeholder="Search">

                    </div>
                    <div class="d-flex align-items-end">
                        <div  class="me-2">
                            <label for="">To</label>
                            <input type="date" class="form-control fs-5" style="height: 46px;" placeholder="Search">
                        </div>
                        <button class="btn btn-theme bg-primary m-0" style="height:46px;">
                            <iconify-icon
                                icon="material-symbols:search-sharp"></iconify-icon>
                            </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-12">
                <div class="table-responsive shadow-sm px-4">
                    <table class="table table-theme mt-4 table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Reference Id</th>
                                <th scope="col">Event Name</th>
                                <th scope="col">Event Start Date</th>
                                <th scope="col">Event End Date</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Note</th>
                                <th scope="col">Amount</th>
                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td class="fs-16 txt-primary">{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="fs-20 txt-primary fw-bold">{{$data->tran_no}}</span>
                                    </div>
                                </td>
                                <td class="fs-16 txt-primary">
                                    <a href="{{route('frontend.eventDetails',$data->event_id)}}" target="_blank" class="text-decoration-none bg-primary text-white py-1 px-3 rounded mb-1 text-center">{{$data->event->title}}</a>
                                </td>
                                <td class="fs-16 txt-primary">
                                    {{$data->event->event_start_date}}
                                </td>
                                <td class="fs-16 txt-primary">
                                    {{$data->event->event_end_date}}
                                </td>
                                <td class="fs-16 txt-primary">
                                    {{$data->quantity}}
                                </td>
                                <td class="fs-16 txt-primary">
                                    {{$data->note}}
                                </td>
                                <td class="fs-16 txt-primary">
                                    {{ number_format($data->total_amount, 2) }}
                                </td>
                                {{-- <td class="fs-16 txt-primary">
                                    <a href="#" target="_blank" class="text-decoration-none bg-primary text-white py-1 px-3 rounded mb-1 text-center"><i class="fa fa-download" style="color: #2196f3;font-size:16px;"></i>  Download</a>
                                </td> --}}
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
