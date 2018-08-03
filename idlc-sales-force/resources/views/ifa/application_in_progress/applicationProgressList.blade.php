@extends('layouts.dashboard')
@section('page_heading','Application in Progress')
@section('section')
<div class="col-sm-12">
	<div class="col-sm-12">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<div class="input-group add-on" style="width:100%;">
		    	<input class="form-control" placeholder="Search" name="srch-term" id="user_search" type="text">
		    	<div class="input-group-btn pull-left">
		        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
		    	</div>
		    </div>
		</div>
	</div>
    
    <br><br>

    <table class="table table-bordered table-striped" id="tblSearch">
        <thead>
            <tr>
                <th class="">Serial</th>
                <th class="">First Name</th>
                <th class="">Last Name</th>
                <th class="">Mobile No.</th>
                <th class="">Email</th>
                <th class="">Brithday</th>
                <th class="">Nationality</th>
            </tr>
        </thead>
        <tbody>
            @php($i =1)
            @foreach($getListValue as $value)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$value->first_name}}</td>
                    <td>{{$value->last_name}}</td>
                    <td>{{$value->mobile_no}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->date_of_birth}}</td>
                    <td>{{$value->nationality}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection