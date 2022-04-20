@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New Trade Record</h5>
                        <p class="card-title-desc">To the moon?</p>


                        <livewire:trade-create>

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

        </div>
    </div> <!-- container-fluid -->
@endsection
