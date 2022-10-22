@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<!-- BEGIN: Content-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h3>Hi {{ auth()->user()->name }}, Selamat datang di Sistem Infomasi Management Assets PDAM <b>Apa'Mening</b> Kabupaten Malinau.</h3>
                </div><!-- /.card-body -->
            </div>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalAsset }}</h3>

                            <p>Total Assets</p>
                        </div>
                    
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalAssetBaik }}</h3>

                            <p>Baik</p>
                        </div>
                       
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalAssetRusak }}</h3>

                            <p>Rusak</p>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- END: Content-->

@endsection
