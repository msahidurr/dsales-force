@extends('layouts.dashboard')
@section('page_heading','New Rating List')
@section('section')
<div class="col-sm-2">
    <div class="pull-left">
        <a href="{{ route('add_rating_view')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Rating </a>
    </div>      
</div>
<div class="col-sm-10">
    <div class="input-group add-on" style="width:100%;">
        <input class="form-control" placeholder="Search" name="srch-term" id="user_search" type="text">
        <div class="input-group-btn pull-left">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
    </div>
</div>
    
    <br><br>

<div class="col-sm-12">
    <table class="table table-bordered table-striped" id="tblSearch">
        <thead>
            <tr>
                <th class="">Serial</th>
                <th class=""> Completed Lead</th>
                <th class="">Rating</th>
                <th class="">Status</th>
                <th class="">Action</th>
            </tr>
        </thead>
        <tbody>
            @php($i =1)
            @foreach($getListValue as $value)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$value->lead_completed_number}}</td>
                    <td>{{$value->rating}}</td>
                    <td>
                        {{($value->is_active == 1)? "Active":"Inactive"}}
                    </td>

                    <td>
                        <table>
                            <tbody>
                                <tr>
                                    <td >
                                        <a href="{{route('edit_new_rating')}}/{{$value->id_rating}}" class="btn btn-success">Edit</a>
                                    </td>
                                    <!-- <td>
                                        <form action="{{ route('edit_new_rating',[$value->id_rating]) }}" method="POST">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                            <input type="submit" value="Delete" class="btn btn-danger deleteButton">
                                        </form>
                                    </td> -->
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection