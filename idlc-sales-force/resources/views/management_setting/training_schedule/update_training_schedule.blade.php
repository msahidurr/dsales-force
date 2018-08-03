@extends('layouts.dashboard')
@section('page_heading','Create Training Schedule')
@section('section')
    <div class=" col-sm-12 col-sm-offset-0 main_body">

        <!-- <div class="panel-body"> -->
        <div class="col-sm-12">
            <div class="col-sm-2">
                <div class="form-group ">
                    <a href="{{route('training_schedule_view')}}" class="btn btn-primary ">
                        <i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-default add_body">
                <div class="panel-body">
                    <form action="{{route('update_training_schedule_action', $trainingSchedule->id)}}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <div class="form-group add_input{{ $errors->has('name') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Training Name</span>
                            </label>
                            <div class="col-md-6">
                                <div class="select">
                                    <select class="form-control" type="select" name="training_name_id" >
                                        <option value="">Select Training Name</option>
                                        @foreach($trainingNames as $trainingName)
                                            <option value="{{ $trainingName->id_training_name }}" @if($trainingName->id_training_name == $trainingSchedule->training_name_id) selected @endif>{{$trainingName->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>



                        <div class="form-group add_input{{ $errors->has('start_date') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Start date</span>
                            </label>
                            <div class="col-md-6">
                                <input type="date" name="start_date" class="form-control" value="{{ $trainingSchedule->start_date }}">
                            </div>
                        </div>

                        <div class="form-group add_input{{ $errors->has('end_date') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">End date</span>
                            </label>
                            <div class="col-md-6">
                                <input type="date" name="end_date" class="form-control" value="{{ $trainingSchedule->end_date }}">
                            </div>
                        </div>

                        <div class="form-group add_input{{ $errors->has('start_time') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Start Time</span>
                            </label>
                            <div class="col-md-6">
                                <input type="time" name="start_time" class="form-control" value="{{ $trainingSchedule->start_time }}">
                            </div>
                        </div>

                        <div class="form-group add_input{{ $errors->has('end_time') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">End Time</span>
                            </label>
                            <div class="col-md-6">
                                <input type="time" name="end_time" class="form-control" value="{{ $trainingSchedule->end_time}}">
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