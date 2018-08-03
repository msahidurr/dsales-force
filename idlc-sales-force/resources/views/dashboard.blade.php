@extends('layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')

    <!-- /.row -->
    <div class="col-sm-12">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fas fa-unlink"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Unassigned</span>
                <span class="info-box-number">{{ $unassigned }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fas fa-exchange-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Converted</span>
                <span class="info-box-number">{{ $converted }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Highly Interested</span>
                <span class="info-box-number">{{ $highly_interested }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="fas fa-balance-scale"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Conversion Ratio</span>
                <span class="info-box-number">{{ $conversion_ratio }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-md-12">
                      <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Monthly Sales Report</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-8">
                              <p class="text-center">
                                <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                              </p>

                              <div class="chart">
                                <!-- Sales Chart Canvas -->
                                <canvas id="salesChart" style="height: 180px; width: 677px;" width="677" height="180"></canvas>
                              </div>
                              <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                              <p class="text-center">
                                <strong>Goal Completion</strong>
                              </p>

                              <div class="progress-group">
                                <span class="progress-text">Interested</span>
                                <span class="progress-number"><b>{{ $interested }}</b>/{{ $totalLeadValue }}</span>

                                <div class="progress sm">
                                  <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                                </div>
                              </div>
                              <!-- /.progress-group -->
                              <div class="progress-group">
                                <span class="progress-text">Highly Intrest</span>
                                <span class="progress-number"><b>{{ $highly_interested }}</b>/{{ $totalLeadValue }}</span>

                                <div class="progress sm">
                                  <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                </div>
                              </div>
                              <!-- /.progress-group -->
                              <div class="progress-group">
                                <span class="progress-text">Converted</span>
                                <span class="progress-number"><b>{{ $converted }}</b>/{{ $totalLeadValue }}</span>

                                <div class="progress sm">
                                  <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                                </div>
                              </div>
                              <!-- /.progress-group -->
                              <div class="progress-group">
                                <span class="progress-text">Might Invest</span>
                                <span class="progress-number"><b>{{ $might_invest }}</b>/{{ $totalLeadValue }}</span>

                                <div class="progress sm">
                                  <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                                </div>
                              </div>
                              <!-- /.progress-group -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- ./box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
        </div>

@stop
