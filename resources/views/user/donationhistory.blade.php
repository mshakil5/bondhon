@extends('frontend.layouts.master')

@section('content')

<section class="section datatable py-5" style="background-color: #F6F9FF;">
    <div class="container">
        <div class="row">
            <div class="title-global my-2">
              Donation Record
            </div>
          </div>
          <div class="row">
            <table id="example" class="table table-striped mb-4" style="width:100%">
              <thead>
                  <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Taxpayer</th>
                        <th scope="col">Payment Process</th>
                        <th scope="col">Transaction Fee</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Balance</th>
                  </tr>
              </thead>

              <?php
                    $tbalance = $moneyIn;
                ?>
              
              <tbody>
                @foreach ($transaction as $item)
                    <tr> 
                        <td class="fs-16 txt-secondary">{{$item->date}}</td>
                        <td>
                            <div class="d-flex flex-column">
                                <span class="fs-20 txt-secondary fw-bold">{{$item->tran_no}}</span>
                            </div>
                        </td>
                        
                        <td class="fs-16 txt-secondary">
                            
                            @if ($item->taxpayer == 1)
                                Yes
                            @else
                                No
                            @endif
                                
                        </td>

                        <td class="fs-16 txt-secondary">
                            {{$item->payment_type}}
                        </td>
                        
                        <td class="fs-16 txt-secondary">
                            {{ number_format($item->commission, 2) }}
                        </td> 
                        <td class="fs-16 txt-secondary">
                            {{ number_format($item->total_amount, 2) }}
                        </td> 
                        <td class="fs-16 txt-secondary">
                            @if ($item->tran_type == "In") {{ number_format($item->amount, 2) }} @endif
                        </td>
                        <td class="fs-16 txt-secondary">
                            £{{ number_format($tbalance, 2) }}
                        </td> 
                        @php
                        if ($item->tran_type == "In") {
                            $tbalance = $tbalance - $item->amount;
                        }
                        @endphp
                    </tr> 
                    @endforeach
              </tbody>
              <tfoot>
                  <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Taxpayer</th>
                        <th scope="col">Payment Process</th>
                        <th scope="col">Transaction Fee</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Balance</th>
                  </tr>
              </tfoot>
          </table>
          </div>
    </div>
  </section>

{{-- <section class="bleesed default">
    <div class="container">
        <div class="row">
           
            <div class="col-lg-12 mb-4 mt-5">
                <h3 class="fw-bold darkerGrotesque-bold txt-primary mb-3">Your all Donation Record</h3>
                <div class="table-responsive fs-5 shadow-sm  ">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Date</th>
                                <th scope="col">Beneficiary</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Annonimous Donation</th>
                                <th scope="col">Description</th>
                                <th scope="col">Display Name</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$item->date}}</td>
                                <td>
                                    @if (isset($item->campaign_id))
                                        {{$item->campaign->title}}
                                    @endif

                                    @if (isset($item->charity_id))
                                        {{$item->user->name}}
                                    @endif

                                </td>
                                <td>{{$item->total_amount}}</td>
                                <td>No</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->donation_display_name}}</td>
                                <td>Confirm</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section> --}}


@endsection
@section('script')
    <script>
        
        new WOW().init();
        new DataTable('#example');
    </script>
@endsection
