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
                                        <th scope="col">Description</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Comments</th>
                                        <th scope="col">Reference/Voucher no.</th>
                                        <th scope="col">Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fs-16 txt-primary">22/08/2022</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fs-20 txt-primary fw-bold">Initact Solutions Ltd</span>
                                                <span class="fs-16 txt-primary">Company donation</span>
                                            </div>
                                        </td>
                                        <td class="fs-16 txt-primary">
                                            £20.00
                                            <svg width="11" height="13" viewBox="0 0 11 13" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.0527 5.89619C9.96315 5.98283 9.84339 6.03126 9.71876 6.03126C9.59413 6.03126 9.47438 5.98283 9.38478 5.89619L5.96876 2.47432V11.656C5.96876 11.7803 5.91938 11.8995 5.83147 11.9874C5.74356 12.0753 5.62433 12.1247 5.50001 12.1247C5.37569 12.1247 5.25646 12.0753 5.16856 11.9874C5.08065 11.8995 5.03126 11.7803 5.03126 11.656V2.47432L1.61525 5.89619C1.52417 5.97094 1.40855 6.00914 1.29087 6.00336C1.17319 5.99758 1.06186 5.94823 0.978549 5.86492C0.895236 5.78161 0.84589 5.67028 0.84011 5.5526C0.834331 5.43492 0.87253 5.3193 0.947278 5.22822L5.16603 1.00947C5.2549 0.92145 5.37493 0.87207 5.50001 0.87207C5.6251 0.87207 5.74512 0.92145 5.834 1.00947L10.0527 5.22822C10.1408 5.31709 10.1901 5.43712 10.1901 5.56221C10.1901 5.68729 10.1408 5.80732 10.0527 5.89619Z"
                                                    fill="#18988B"></path>
                                            </svg>

                                        </td>
                                        <td class="fs-16 txt-primary">
                                            None
                                        </td>
                                        <td class="fs-16 txt-primary">
                                            -
                                        </td>
                                        <td class="fs-16 txt-primary">
                                            £20.00
                                        </td>
                                    </tr>
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
                                        <th scope="col">Description</th>
                                        <th scope="col">Comments</th>
                                        <th scope="col">Transaction no.</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fs-16 txt-primary">22/08/2022</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fs-20 txt-primary fw-bold">Initact Solutions Ltd</span>
                                                <span class="fs-16 txt-primary">Company donation</span>
                                            </div>
                                        </td>
                                        <td class="fs-16 txt-primary">
                                            None
                                        </td>
                                        <td class="fs-16 txt-primary">
                                            None
                                        </td>
                                        <td class="fs-16 txt-primary">
                                            £20.00
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="moneyOut" role="tabpanel" aria-labelledby="moneyOut-tab">
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>



@endsection
