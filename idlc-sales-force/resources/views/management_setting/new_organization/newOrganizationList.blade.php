@extends('layouts.dashboard')
@section('page_heading','New Organization')
@section('section')
<div class="col-sm-3">
    <div class="pull-left">
        <a href="{{ route('add_organization_view')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Organization </a>
    </div>
</div>
<div class="col-sm-9">
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
                <th class="">Organization Name</th>
                <th class="">Contact Person Name</th>
                <th class="">Contact Person NO</th>
                <th class="">Address</th>
                <th class="">Status</th>
                <th class="">Action</th>
            </tr>
        </thead>
        <tbody>
            @php($i =1)
            @foreach($getListValue as $value)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$value->organization_name}}</td>
                    <td>{{$value->contact_person_name}}</td>
                    <td>{{$value->contact_person_no}}</td>
                    <td>{{$value->address}}</td>
                    <td>
                        {{($value->is_active == 1)? "Active":"Inactive"}}
                    </td>

                    <td>
                        <table>
                            <tbody>
                                <tr>
                                    <td >
                                        <a href="{{route('edit_organization')}}/{{$value->id_organization}}" class="btn btn-success">Edit</a>
                                    </td>
                                    <!-- <td>
                                        <form action="{{ route('branchs.destroy',[$value->id_organization]) }}" method="POST">
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