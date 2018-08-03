@extends('layouts.dashboard')
@section('page_heading','Add Trainee')
@section('section')
    <div class=" col-sm-12 col-sm-offset-0 main_body">

        <!-- <div class="panel-body"> -->
        <div class="col-sm-12">
            <div class="col-sm-2">
                <div class="form-group ">
                    <a href="{{route('schedule_trainee_view', $schedule_id)}}" class="btn btn-primary ">
                        <i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-default add_body">
                <div class="panel-body">
                    <form action="{{route('schedule_trainee_add_action', $schedule_id)}}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">



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
                                        <input type="hidden" value="1" name="is_required[{{ $applicant->application_no }}]" checked>
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
                                <button type="submit" class="btn btn-primary" style="width:100%">Add
                                </button>
                            </div>
                        </div>
                    </form>



            </div>
        </div>
    </div>
@endsection