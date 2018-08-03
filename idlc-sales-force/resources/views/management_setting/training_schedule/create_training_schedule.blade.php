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
                    <form action="{{route('create_training_schedule_action')}}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <div class="form-group add_input{{ $errors->has('name') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Training Name</span>
                            </label>
                            <div class="col-md-6">
                                <div class="select">
                                    <select class="form-control" type="select" name="training_name_id"  required>
                                        <option value="">Select Training Name</option>
                                        @foreach($trainingNames as $trainingName)
                                            <option value="{{ $trainingName->id_training_name }}">{{$trainingName->name}}</option>
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
                                <input type="date" name="start_date" class="form-control">
                            </div>
                        </div>

                        <div class="form-group add_input{{ $errors->has('end_date') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">End date</span>
                            </label>
                            <div class="col-md-6">
                                <input type="date" name="end_date" class="form-control">
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


                        <table class="table table-bordered table-striped" id="tblSearch">
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
                                @php($i =1)
                                @foreach($applicants as $applicant)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        {{ $applicant->first_name}} {{ $applicant->last_name}}
                                        <input type="hidden" name="applicant_no[]" value="{{ $applicant->application_no }}">
                                    </td>
                                    <td>{{ $applicant->mobile_no}}</td>
                                    <td>{{ $applicant->email}}</td>
                                    <td>{{ $applicant->pre_addr_ps_id }}</td>
                                    <td>
                                        <input class="trainint_applicant_no" type="checkbox" value="1" name="training_status[{{ $applicant->application_no }}]">
                                    </td>
                                    {{--<td>--}}
                                        <input type="hidden"  value="1" name="is_required[{{ $applicant->application_no }}]" checked>
                                    {{--</td>--}}
                                </tr>
                                @php($i++)
                                @endforeach
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