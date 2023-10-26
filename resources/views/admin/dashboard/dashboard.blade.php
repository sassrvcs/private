@extends('includes.layouts.admin')
@section('page-title')
Dashboard
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content"></div>
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
          <!-- small box -->

          <div class="small-box bg-info">
              <div class="inner">
                @php


                    $total_companies = \App\Models\User::role( \App\Models\User::SUBADMIN)->count();
                @endphp
                  <h3>17</h3>
                  <p>Number of Customers</p>
              </div>
              <div class="icon">
                  <i class="on ion-person-add"></i>
              </div>
              {{-- {{ route('admin.agent.index', ['form' => 'approved']) }} --}}
              <a href="{{ route('admin.customer.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
              <div class="inner">
                @php
                    $total_user = \App\Models\Companie::count();
                @endphp
                  <h3>{{$total_user}}</h3>

                  <p>Number of Companies</p>
              </div>
              <div class="icon">
                  <i class="ion ion-pie-graph"></i>
              </div>
              {{-- {{ route('admin.agent.index', ['form' => 'received']) }} --}}
              <a href="{{ route('admin.company.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
              <div class="inner">
                @php
                    $total_package = \App\Models\Package::count();
                @endphp
                  <h3>{{$total_package}}</h3>
                  <p>Number of Packages</p>
              </div>
              <div class="icon">
                  <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('admin.package.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
              <div class="inner">
                @php
                    $total_service = \App\Models\Addonservice::count();
                @endphp
                  <h3>{{$total_service}}</h3>
                  <p>Number of Services</p>
              </div>
              <div class="icon">
                  <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('admin.addonservice.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

    {{-- <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header border-0">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Sales</h3>
              <a href="javascript:void(0);">View Report</a>
            </div>
          </div>

          <div class="card-body">
            <div class="d-flex">
              <p class="d-flex flex-column">
                <span class="text-bold text-lg">$0.00</span>
                <span>Sales Over Time</span>
              </p>

              <p class="ml-auto d-flex flex-column text-right">
                <span class="text-success">
                  <i class="fas fa-arrow-up"></i> 33.1%
                </span>
                <span class="text-muted">Since last month</span>
              </p>
            </div>
            <!-- /.d-flex -->

            <div class="position-relative mb-4">
              <canvas id="barChart"></canvas>
            </div>

          </div>
        </div>
      </div> --}}

      {{-- <div class="col-lg-6">
        <div class="card">
          <div class="card-header border-0">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Circle</h3>
              <a href="javascript:void(0);">View Report</a>
            </div>
          </div>

          <div class="card-body">
            <div class="d-flex">
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
  <!-- /.card -->
  <!-- Main row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

{{-- Need ti implement this pie chart --}}
{{-- https://www.w3schools.com/js/tryit.asp?filename=tryai_chartjs_doughnut --}}
{{-- https://www.w3schools.com/ai/ai_chartjs.asp --}}
@endsection


