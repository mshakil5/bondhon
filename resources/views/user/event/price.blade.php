@extends('frontend.layouts.master')

@section('title')
- Event Ticket Price Report
@endsection

@section('content')
<section class="bleesed default">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-6 mt-2">
                <a href="{{ route('user.myevent')}}" class="btn-theme bg-primary text-center">Back</a>
            </div> 
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h2 class="fw-bold darkerGrotesque-bold txt-primary mb-3">{{$event->title}} Booking record</h2>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-12">
                <div class="table-responsive shadow-sm px-4">
                    <table class="table table-theme mt-4 table-striped" id="example">
                        <thead>
                            <tr>
                                <th style="text-align: center">SL</th>
                                <th style="text-align: center">Type</th>
                                <th style="text-align: center">Ticket Price</th>
                                <th style="text-align: center">Available Quantity</th>
                                <th style="text-align: center">Sold Quantity</th>
                                <th style="text-align: center">Total ticket</th>
                                <th scope="text-align: center">Note</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($data as $key => $data)
                            @php
                                $sold = \App\Models\TicketSale::where('event_id',$data->event_id)->where('event_price_id',$data->id)->count();
                            @endphp
                            <tr>
                                <td style="text-align: center">{{ $key + 1 }}</td>

                                <td style="text-align: center" class="fs-16 txt-primary text-center">
                                    {{$data->type}}
                                </td>
                                
                                <td style="text-align: center" class="fs-16 txt-primary text-center">
                                    £{{ number_format($data->ticket_price, 2) }}
                                </td>
                                
                                <td style="text-align: center" class="fs-16 txt-primary text-center">
                                    {{$data->qty - $sold}}
                                </td>

                                <td style="text-align: center" class="fs-16 txt-primary text-center">
                                    {{$sold}}
                                </td>

                                <td style="text-align: center" class="fs-16 txt-primary text-center">
                                    {{$data->qty}}
                                </td>

                                <td style="text-align: center" class="fs-16 txt-primary text-center">
                                    {{$data->note}}
                                </td>
                                
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

@section('script')
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script> 
@endsection
