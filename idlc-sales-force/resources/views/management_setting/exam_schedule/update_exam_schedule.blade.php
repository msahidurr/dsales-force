@extends('layouts.dashboard')
@section('page_heading','Create Exam Schedule')
@section('section')
    <div class=" col-sm-12 col-sm-offset-0 main_body">

        <!-- <div class="panel-body"> -->
        <div class="col-sm-12">
            <div class="col-sm-2">
                <div class="form-group ">
                    <a href="{{route('exam_schedule_view')}}" class="btn btn-primary ">
                        <i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-default add_body">
                <div class="panel-body">
                    <form action="{{route('update_exam_schedule_action', $examSchedule->id)}}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">



                        <div class="form-group add_input{{ $errors->has('name') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Exam Name</span>
                            </label>
                            <div class="col-md-6">
                                <!-- <input type="text" class="form-control" name="exam_schedule_name" value="{{ $examSchedule->exam_schedule_name  }}" placeholder="Name"> -->

                                <div class="select">
                                    <select class="form-control" type="select" name="exam_name_id"  required>
                                        <option value="">Select Exam Name</option>
                                        @foreach($examNames as $examName)
                                            <option value="{{ $examName->id_exam_name }}" {{($examName->id_exam_name==$examSchedule->exam_name_id)? "selected":"" }}>{{$examName->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="form-group add_input{{ $errors->has('exam_schedule_name') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Description</span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description" value="{{ $examSchedule->description  }}" placeholder="Description">
                            </div>
                        </div> -->

                        <div class="form-group add_input{{ $errors->has('date') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Date</span>
                            </label>
                            <div class="col-md-6">
                                <input type="date" name="date" class="form-control" value="{{ $examSchedule->date  }}">
                            </div>
                        </div>

                        <div class="form-group add_input{{ $errors->has('start_time') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Start Time</span>
                            </label>
                            <div class="col-md-6">
                                <input type="time" name="start_time" class="form-control" value="{{ $examSchedule-> start_time }}">
                            </div>
                        </div>

                        <div class="form-group add_input{{ $errors->has('end_time') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">End Time</span>
                            </label>
                            <div class="col-md-6">
                                <input type="time" name="end_time" class="form-control" value="{{ $examSchedule->end_time  }}">
                            </div>
                        </div>



                        <div class="form-group add_input">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Training Schedule</span>
                            </label>
                            <div class="col-md-6">
                                <div class="select">
                                    <select class="form-control" type="select" name="training_name" >
                                        <option value="">Select a Schedule</option>
                                        @foreach($trainingList as $training)
                                            @if(isset($training->trainingName))
                                                <option value="{{ $training->id }}"  {{($training->id==$examSchedule->training_schedule_id)? "selected":"" }}>{{ $training->trainingName->name }} ({{ $training->start_date }} - {{ $training->end_date }}) </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>



                        <div class="form-group add_input">
                            <div class="col-md-2 col-md-offset-10" style="padding-right: 0px;">
                                <button type="submit" class="btn btn-primary" style="width:100%">Submit
                                </button>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
@endsection