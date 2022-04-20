<form action="{{ route('trade.store') }}" method="POST">
    @csrf
    <div class="row" x-data="{total_value:10}">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <select class="form-select" id="coinpair" name="coinpair">
                    @forelse($coinpairs as $coinpair)
                        <option value="{{ $coinpair->id }}">{{ $coinpair->name }}</option>
                    @empty
                        <option selected value="0">No Pair Available</option>
                    @endforelse
                </select>
                <label for="coinpair">Crypto Pair</label>
            </div>
        </div>

        <div class="col-md-4">
            <label for="leverage" class="form-label">Leverage</label>
            <input type="range" class="form-range" id="leverage" x-model="total_value" name="leverage"
                   value="{{ old('leverage') }}">
        </div>
        <div class="col-md-2">
            <div class="form-floating mb-3">
                <input class="form-control border-0 pl-0" type="input" x-model="total_value"/>
            </div>
        </div>

    </div>

    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="entrypoint" name="entrypoint"
               placeholder="Entry Point" value="{{ old('entrypoint') }}">
        <label for="entrypoint">Entry Point</label>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="takeprofit"
                       placeholder="Take Profit" name="takeprofit" value="{{ old('takeprofit') }}">
                <label for="takeprofit">Take Profit</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="stoploss" placeholder="Stop Loss" name="stoploss"
                       value="{{ old('stoploss') }}">
                <label for="stoploss">Stop Loss</label>
            </div>
        </div>
    </div>

    <div class="row" x-data="{rate: @entangle('rate'),margin:@entangle('margin'),wallet:@entangle('wallet')}" >
        <div class="col-md-9">
            <label for="margin" class="form-label">Margin Size (<span x-text="rate"></span>%)</label>
            <input type="range" class="form-range @error('margin') is-invalid @enderror" id="margin"
                   x-model.number="margin" min="0" max="{{ $walletbalance->balance }}" name="margin"
                   value="{{ old('margin') }}" >
            @error('margin')
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
            @enderror
        </div>
        <div class="col-md-3">
            <div class="form-floating mb-3 ">
                <input class="form-control border-0 pl-0" type="input" x-model.number="margin"/>
            </div>
        </div>
    </div>


    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="reason" placeholder="Enter Reason" name="reason"
               value="{{ old('reason') }}">
        <label for="reason">Reason</label>
    </div>
    <div class="form-floating mb-3">
        <select class="form-select" id="outcome" name="outcome">
            <option value="1">Win</option>
            <option value="0">Lose</option>
            <option value="2">Pending</option>
        </select>
        <label for="outcome">Outcome</label>
    </div>
    <div class="form-check form-switch form-switch-lg mb-3" dir="ltr" x-data="{direction:true}">
        <input class="form-check-input" type="checkbox" id="SwitchCheckSizelg" checked=""
               x-model="direction" name="direction">
        <label class="form-check-label" for="SwitchCheckSizelg" x-show="direction">Buy</label>
        <label class="form-check-label" for="SwitchCheckSizelg" x-show="!direction">Sell</label>
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary w-md">Submit</button>
    </div>
</form>

<script>

</script>
