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
                    <form action="{{route('exam_schedule_create_action')}}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        {{--<div class="form-group add_input{{ $errors->has('name') ? ' has-error' : ''}}">--}}
                            {{--<label class="col-md-4 control-label">--}}
                                {{--<span class="pull-right">Training Name</span>--}}
                            {{--</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="select">--}}
                                    {{--<select class="form-control" type="select" name="training_name_id" >--}}
                                        {{--<option value="">Select Training Name</option>--}}
                                        {{--@foreach($examNames as $examName)--}}
                                            {{--<option value="{{ $examName->id_training_name }}">{{$examName->name}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}



                        <div class="form-group add_input{{ $errors->has('name') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Exam Name</span>
                            </label>
                            <div class="col-md-6">
                                <div class="select">
                                    <select class="form-control" type="select" name="exam_name_id"  required>
                                        <option value="">Select Exam Name</option>
                                        @foreach($examNames as $examName)
                                            <option value="{{ $examName->id_exam_name }}">{{$examName->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- <input type="text" class="form-control" name="exam_schedule_name" value="{{ old('exam_schedule_name')  }}" placeholder="Name"> -->
                            </div>
                        </div>

                        <!-- <div class="form-group add_input{{ $errors->has('exam_schedule_name') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Description</span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description" value="{{ old('description')  }}" placeholder="Description">
                            </div>
                        </div> -->

                        <div class="form-group add_input{{ $errors->has('date') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Date</span>
                            </label>
                            <div class="col-md-6">
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>

                        <div class="form-group add_input{{ $errors->has('start_time') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Start Time</span>
                            </label>
                            <div class="col-md-6">
                                <input type="time" name="start_time" class="form-control">
                            </div>
                        </div>

                        <div class="form-group add_input{{ $errors->has('end_time') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">End Time</span>
                            </label>
                            <div class="col-md-6">
                                <input type="time" name="end_time" class="form-control">
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
                                                <option value="{{ $training->id }}">{{ $training->trainingName->name }} ({{ $training->start_date }} - {{ $training->end_date }}) </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <table class="table table-bordered table-striped" id="trainee_list" class="trainee_list">
                            <thead>
                                <tr>
                                    <th class="">Serial</th>
                                    <th class="">Name</th>
                                    <th class="">Mobile No.</th>
                                    <th class="">Email</th>
                                    <th class="">Thana</th>
                                    <th class="">As Participant</th>
                                    {{--<th class="">Training Required</th>--}}
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="form-group add_input">
                            <div class="col-md-2 col-md-offset-10" style=" padding-bottom: 10px; padding-right: 0px; ">
                                <a style="width: 100%;" id="select_all_trainee_applicant" href="javascript:void(0)" class="btn btn-primary">Select All</a>
                            </div>
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