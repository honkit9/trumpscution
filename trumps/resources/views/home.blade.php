@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="{{route('wallet.index')}}">My Wallet</a>
                    <a class="btn btn-primary" href="{{route('trade.index')}}">My Trades</a>


                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
