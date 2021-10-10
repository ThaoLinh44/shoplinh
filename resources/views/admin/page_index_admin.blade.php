@extends('layout_admin.master')
@section('title','Admin-page')
@section('content')
    <div class="breadcrumbs">
        <div class="page-header float-left">

                <div class="page-title">
                    <h1 style="text-align: center;">Số liệu thống kê</h1>
                </div>

        </div>
    </div>

    <div class="content mt-3">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <h4 class="card-title mb-0">KPI</h4>
                            <div class="small text-muted">2021</div>
                        </div>
                        <!--/.col-->
                        <div class="col-sm-8 hidden-sm-down">
                            <button type="button" class="btn btn-primary float-right bg-flat-color-1"><i class="fa fa-cloud-download"></i></button>
                            <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mr-3" data-toggle="buttons" aria-label="First group">
                                    <label class="btn btn-outline-secondary active">
                                        <input type="radio" name="options" id="option1"> Ngày
                                    </label>
                                    <label class="btn btn-outline-secondary ">
                                        <input type="radio" name="options" id="option2" checked=""> Tuần
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="options" id="option3"> Tháng
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                    </div>
                    <!--/.row-->
                    <div class="chart-wrapper mt-4">
                        <canvas id="trafficChart" title="Xuất file" style="height:200px;" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .content -->

@endsection
