@extends('layouts.app')

@section('content')
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ __('My wallet') }}</div>--}}

{{--                    <i class="bi bi-arrow-left-circle"></i>--}}

{{--                    <a class="px-2 " href="{{ url()->previous() }}">Back..</a>--}}
{{--                    <div class="card-body">--}}
{{--                     Availabe amount : RM {{ $wallet->balance }}--}}


{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"><a  href="{{ route('home') }}"><i class='bx bx-left-arrow-alt'></i></a>
                            Wallet</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Wallet</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex">
                                <div class="flex-shrink-0 me-4">
                                    <i class="mdi mdi-account-circle text-primary h1"></i>
                                </div>

                                <div class="flex-grow-1">
                                    <div class="text-muted">
                                        <h5>{{Auth::user()->name}}</h5>
                                        <p class="mb-1"></p>
                                    </div>

                                </div>

                                <div class="dropdown ms-2">
                                    <a class="text-muted" href="crypto-wallet.html#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="crypto-wallet.html#">Action</a>
                                        <a class="dropdown-item" href="crypto-wallet.html#">Another action</a>
                                        <a class="dropdown-item" href="crypto-wallet.html#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-top">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <p class="text-muted mb-2">Available Balance</p>
                                        <h5>RM {{ $wallet->balance }}</h5>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end mt-4 mt-sm-0">
{{--                                        <p class="text-muted mb-2">Since last month</p>--}}
{{--                                        <h5>+ $ 248.35   <span class="badge bg-success ms-1 align-bottom">+ 1.3 %</span></h5>--}}

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body border-top">
                            <p class="text-muted mb-4">Actions</p>
                            <div class="text-center">
                                <div class="row">
{{--                                    <div class="col-sm-4">--}}
{{--                                        <div>--}}
{{--                                            <div class="font-size-24 text-primary mb-2">--}}
{{--                                                <i class="bx bx-send"></i>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-3">--}}
{{--                                                <a href="javascript: void(0);" class="btn btn-primary btn-sm w-md">Send</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-sm-4">
                                        <div class="mt-4 mt-sm-0">
                                            <div class="font-size-24 text-secondary mb-2">
                                                <i class="bx bx-import"></i>
                                            </div>
                                            <div class="mt-3">
                                                <button class="btn btn-success btn-sm w-md" id="topup-alert" onclick="topup_alert({{$wallet->id}})">Top Up</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mt-4 mt-sm-0">
                                            <div class="font-size-24 text-secondary mb-2">
                                                <i class="bx bx-wallet"></i>
                                            </div>
                                            <div class="mt-3">
                                                <button class="btn btn-warning btn-sm w-md" id="withdraw-alert" onclick="withdraw_alert({{$wallet->id}})">Withdraw</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3 align-self-center">
                                            <i class="mdi mdi-bitcoin h2 text-warning mb-0"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="text-muted mb-2">Bitcoin Wallet</p>
                                            <h5 class="mb-0">1.02356 BTC <span class="font-size-14 text-muted">= $ 9148.00</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3 align-self-center">
                                            <i class="mdi mdi-ethereum h2 text-primary mb-0"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="text-muted mb-2">Ethereum Wallet</p>
                                            <h5 class="mb-0">0.04121 ETH <span class="font-size-14 text-muted">= $ 8235.00</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3 align-self-center">
                                            <i class="mdi mdi-litecoin h2 text-info mb-0"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="text-muted mb-2">litecoin Wallet</p>
                                            <h5 class="mb-0">0.00356 BTC <span class="font-size-14 text-muted">= $ 4721.00</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Overview</h4>

                            <div>
                                <div id="overview-chart" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Activities</h4>

                            <ul class="nav nav-tabs nav-tabs-custom">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{url()->current()}}">All</a>
                                </li>
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="crypto-wallet.html#">Buy</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="crypto-wallet.html#">Sell</a>--}}
{{--                                </li>--}}
                            </ul>
                            <div class="mt-4">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>ID No</th>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Currency</th>
                                            <th>Amount</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @forelse($wallet->walletHistory()->get() as $history)
                                            <tr>
                                                <td>{{ $history->id }}</td>
                                                <td>{{ $history->created_at }}</td>
                                                <td class="{{ $history->status_color }}"><strong>{{ $history->status_name }}</strong></td>
                                                <td>{{ 'RM' }}</td>
                                                <td>{{ number_format($history->amount,2) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                            No records shown
                                            <tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection

{{--    ajax--}}
@section('javascript')
    <script type="text/javascript">
        function topup_alert(wallet){
            swal.fire({
                title: "Enter amount to top up",
                input: "number",
                showCancelButton: !0,
                confirmButtonText: "Submit",
                showLoaderOnConfirm: !0,
                confirmButtonColor: "#556ee6",
                cancelButtonColor: "#f46a6a"
            }).then(function (e) {

                if (e.value != null) {
                    let token = $('meta[name="csrf-token"]').attr('content');
                    let _url = `/wallet/${wallet}/topup`;

                    $.ajax({
                        type: 'POST',
                        url: _url,
                        data: {_token: token,
                                'amount': e.value},
                        success: function (resp) {
                            if (resp.success) {
                                swal.fire("Done!", resp.message, "success");
                                location.reload();
                            } else {
                                swal.fire("Error!", 'Sumething went wronewg.', "error");
                            }
                        },
                        error: function (resp) {
                            swal.fire("Error!", 'Sumething went wrong.', "error");
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }

        function withdraw_alert(wallet){
            swal.fire({
                title: "Enter amount to withdraw",
                input: "number",
                showCancelButton: !0,
                confirmButtonText: "Submit",
                showLoaderOnConfirm: !0,
                confirmButtonColor: "#556ee6",
                cancelButtonColor: "#f46a6a"
            }).then(function (e) {

                if (e.value != null) {
                    let token = $('meta[name="csrf-token"]').attr('content');
                    let _url = `/wallet/${wallet}/withdraw`;

                    $.ajax({
                        type: 'POST',
                        url: _url,
                        data: {_token: token,
                            'amount': e.value},
                        success: function (resp) {
                            if (resp.success) {
                                swal.fire("Done!", resp.message, "success");
                                location.reload();
                            } else {
                                swal.fire("Error!", 'Sumething went wronewg.', "error");
                            }
                        },
                        error: function (resp) {
                            swal.fire("Error!", 'Sumething went wrong.', "error");
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }
    </script>
@endsection
