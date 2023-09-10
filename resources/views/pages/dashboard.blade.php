@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalTransaction }}</h3>

                    <p>Transaksi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-th-list"></i>
                </div>
                <a href="{{ route('transactions.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalPackage }}</h3>

                    <p>Paket</p>
                </div>
                <div class="icon">
                    <i class="fas fa-archive"></i>
                </div>
                <a href="{{ route('packages.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalOutlet }}</h3>

                    <p>Outlet</p>
                </div>
                <div class="icon">
                    <i class="fas fa-map-pin"></i>
                </div>
                <a href="{{ route('outlets.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalCustomer }}</h3>

                    <p>Pelanggan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('customers.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Transaksi</h4>
                    {!! $monthlyTransaction->container() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Pendapatan</h4>
                    {!! $monthlyIncome->container() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ $monthlyTransaction->cdn() }}"></script>
    <script src="{{ $monthlyTransaction->cdn() }}"></script>

    {{ $monthlyTransaction->script() }}
    {{ $monthlyIncome->script() }}
@endpush
