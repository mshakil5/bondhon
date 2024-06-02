@extends('frontend.layouts.master')

@section('content')


<section class="bleesed default">
    <div class="container">
        

        <div class="row">
            <div class="col-lg-6">
                <h2 class="fw-bold darkerGrotesque-bold txt-primary mb-3"> Your All Transactions</h2>
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
                <ul class="nav nav-tabs mt-4 justify-content-start fs-5" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="transaction-tab" data-bs-toggle="tab"
                            data-bs-target="#transaction" type="button" role="tab" aria-controls="transaction"
                            aria-selected="true">All transaction</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="moneyIn-tab" data-bs-toggle="tab" data-bs-target="#moneyIn"
                            type="button" role="tab" aria-controls="moneyIn" aria-selected="false">Money
                            in</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="moneyOut-tab" data-bs-toggle="tab" data-bs-target="#moneyOut"
                            type="button" role="tab" aria-controls="moneyOut" aria-selected="false">Money
                            out</button>
                    </li>

                </ul>
                <div class="tab-content fs-5" id="myTabContent">
                    <div class="tab-pane fade active show" id="transaction" role="tabpanel"
                        aria-labelledby="transaction-tab">
                        <div class="table-responsive shadow-sm px-4">
                            <table class="table table-theme mt-4 table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Dr Amount</th>
                                        <th scope="col">Cr Amount</th>
                                        <th scope="col">Balance</th>
                                    </tr>
                                </thead>
                                <?php
                                    $tbalance = $totalInAmount - $totalOutAmount;
                                ?>
                                <tbody>
                                        @foreach ($data as $item)
                                        <tr> 
                                            <td class="fs-16 txt-secondary">{{$item->date}}</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="fs-20 txt-secondary fw-bold">{{$item->tran_no}}</span>
                                                </div>
                                            </td>
                                            <td class="fs-16 txt-secondary">
                                                {{$item->description}}
                                            </td>

                                            <td class="fs-16 txt-secondary">
                                                @if ($item->tran_type == "In") {{ number_format($item->amount, 2) }} @endif
                                            </td> 
                                            <td class="fs-16 txt-secondary">
                                                @if ($item->tran_type == "Out") {{ number_format($item->amount, 2) }} @endif
                                            </td> 
                                            <td class="fs-16 txt-secondary">
                                                £{{ number_format($tbalance, 2) }}
                                            </td> 
                                            @php
                                            if ($item->tran_type == "In") {
                                                $tbalance = $tbalance - $item->amount;
                                            } else {
                                                $tbalance = $tbalance + $item->amount;
                                            }
                                            @endphp
                                        </tr> 
                                        @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="moneyIn" role="tabpanel" aria-labelledby="moneyIn-tab">
                        <div class="table-responsive shadow-sm px-4">
                            <table class="table table-theme mt-4 table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Dr Amount</th>
                                        <th scope="col">Total Dr Amount</th>
                                    </tr>
                                </thead>
                                
                                <?php
                                    $tDrbalance = $totalInAmount;
                                ?>

                                <tbody>
                                    @foreach ($data as $item)
                                    @if ($item->tran_type == "In")
                                    <tr> 
                                        <td class="fs-16 txt-secondary">{{$item->date}}</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fs-20 txt-secondary fw-bold">{{$item->tran_no}}</span>
                                            </div>
                                        </td>
                                        <td class="fs-16 txt-secondary">
                                            {{$item->description}}
                                        </td>
                                        <td class="fs-16 txt-secondary">
                                            {{ number_format($item->amount, 2) }}
                                        </td>
                    
                                        <td class="fs-16 txt-secondary">
                                            £{{ number_format($tDrbalance, 2) }}
                                        </td>
                                        
                                        @php
                                        if ($item->tran_type == "In") {
                                            $tDrbalance = $tDrbalance + $item->amount;
                                        }
                                        @endphp
                                    </tr> 
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="moneyOut" role="tabpanel" aria-labelledby="moneyOut-tab">
                        <div class="data-container">
                            <table class="table table-theme mt-4" id="example3">
                                <thead>
                                    <tr> 
                                        <th scope="col">Date</th>
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Cr Amount</th>
                                        <th scope="col">Total Cr Amount</th>
                                    </tr>
                                </thead>
                                <?php
                                    $tCrbalance = $totalOutAmount;
                                ?>
                                <tbody>
                                    @foreach ($data as $item)
                                    @if ($item->tran_type == "Out")
                                    <tr> 
                                        <td class="fs-16 txt-secondary">{{$item->date}}</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fs-20 txt-secondary fw-bold">{{$item->tran_no}}</span>
                                            </div>
                                        </td>
                                        <td class="fs-16 txt-secondary">
                                            {{$item->description}}
                                        </td>
                                        <td class="fs-16 txt-secondary">
                                            {{ number_format($item->amount, 2) }}
                                        </td>
                                        <td class="fs-16 txt-secondary">
                                            £{{ number_format($tCrbalance, 2) }}
                                        </td>
                                        @php
                                        if ($item->tran_type == "Out") {
                                            $tCrbalance = $tCrbalance - $item->amount;
                                        }
                                        @endphp
                                    </tr> 
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>



@endsection
