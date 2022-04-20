@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><a  href="{{ route('home')  }}"><i class='bx bx-left-arrow-alt'></i></a>
                        Trade</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Trade</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex flex-wrap">
                    <h4 class="card-title mb-4">Dashboard</h4>
                    <div class="ms-auto">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html#">Week</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.html#">Month</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="index.html#">Year</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between py-3">
                            <h4 class="card-title mb-4">Latest Transaction</h4>

                            <a href="{{ route('trade.create') }}"><button class="btn btn-secondary">Create Trade</button></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check font-size-16 align-middle">
                                            <input class="form-check-input" type="checkbox" id="transactionCheck01">
                                            <label class="form-check-label" for="transactionCheck01"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle">Crypto Pair</th>
                                    <th class="align-middle">Entry Point</th>
                                    <th class="align-middle">Date</th>
                                    <th class="align-middle">SL/TP</th>
                                    <th class="align-middle">Margin (Leverage)</th>
                                    <th class="align-middle">Outcome</th>
                                    <th class="align-middle">View Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($trades as $trade)
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="tradeCheck{{ $trade->id }}">
                                            <label class="form-check-label" for="transactionCheck{{ $trade->id }}"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">{{ $trade->coinpair()->first()->name }}</a></td>
                                    <td>{{ $trade->entrypoint }}</td>
                                    <td>
                                        {{ $trade->completed_date }}
                                    </td>
                                    <td>
                                        Stop Loss : {{ number_format($trade->stoploss,0,'.',',') }}<br>
                                        Take Profit : {{ number_format($trade->takeprofit,0,'.',',') }}
                                    </td>
                                    <td>
                                        RM{{ number_format($trade->margin,2,'.',',') }} ({{ $trade->leverage }}X)
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-{{ $trade->outcome_color }} font-size-11"> {{ $trade->outcome_name }}</span>
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button"
                                                class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                    No trades
                                @endforelse


                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
@endsection
