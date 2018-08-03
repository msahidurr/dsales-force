@extends('layouts.dashboard')
@section('page_heading','Exam Schedule')


@section('section')

    @if(Session::has('exam_status'))
        <div style="width:100%; text-align: center;" class="alert {{ Session::get('alert-class') }}">
            {{ Session::get('exam_status') }}
        </div>
    @endif

    <div class="col-sm-12">

        <div class="col-sm-12" style="padding: 0px;">

            <div class="col-sm-3" style="padding: 0px;">
                <div class="pull-left">
                    <a href="{{ route('exam_schedule_create_view')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create Exam Schedule</a>
                </div>
            </div>
            <div class="col-sm-9" style="padding: 0px;">
                <div class="input-group add-on" style="width:100%;">
                    <input class="form-control" placeholder="Search" name="srch-term" id="user_search" type="text">
                    <div class="input-group-btn pull-left">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>

        <table class="table table-bordered table-striped" id="tblSearch">
            <thead>

            <tr>
                <th class="">Serial</th>
                <th class="">Exam Name</th>
                <!-- <th class="">Description</th> -->
                <th class="">Date</th>
                <th class="">Start Time</th>
                <th class="">End Time</th>
                <th class="">List</th>
                <th class="">Action</th>
            </tr>
            </thead>
            <tbody>
            @php($i=1)
            @foreach($examList as  $exam)

                <tr>
                    <td>{{$i}}</td>
                    <td>{{ $exam->examName['name']  }}</td>
                    <!-- <td>{{ $exam->description  }}</td> -->
                    <td>{{ $exam->date }}</td>
                    <td>{{ $exam->start_time }}</td>
                    <td>{{ $exam->end_time }}</td>
                    <td><a href="{{ route('schedule_exameen_view', $exam->id) }}">Exameen</a></td>
                    <td><a href="{{ route('update_exam_schedule_view', $exam->id) }}">Update</a></td>
                </tr>
                @php($i++)
            @endforeach
            </tbody>
        </table>
    </div>
@endsection