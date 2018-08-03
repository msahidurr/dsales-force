@extends('layouts.dashboard')
@section('page_heading','Applicantion Report')
@section('section')
<style type="text/css"></style>
<div class="row top-body">
    <!-- <div class="panel panel-default"> -->
        <!-- <div class="panel-body"> -->
            <div class="col-sm-10">
                <div class="form-group col-sm-4" id="error_1">
                    <label class="col-sm-12 control-label">Application Status</label>
                        <select class="form-control" id="selectMenuOption">
                            <option value=""> Choose a Option</option>
                            @foreach($getFilterOptionValue as $OptionValues)
                                <option value="{{$OptionValues->application_status}}">{{$OptionValues->name}}</option>
                            @endforeach
                        </select>
                </div>

                <!-- <div class="form-group col-sm-3 " id="error_2">
                    <label class="col-sm-4 control-label">Title </label>
                        <select class="form-control" id="selectSortbyValue">
                            <option value="">--Select--</option>
                            <option value="ASC">ASC</option>
                            <option value="DESC">DESC</option>
                        </select>
                </div> -->

                <div class="form-group col-sm-4" id="error_3">
                    <label class="col-sm-4 control-label">
                        From
                    </label>
                        <input type="date" name="date[from]" class="form-control" id="formDate">
                </div>

                <div class="form-group col-sm-4" id="error_4">
                    <label class="col-sm-4 control-label">To</label>
                        <input type="date" name="date[to]" class="form-control" id="toDate">
                </div>

            </div>

            <div class="col-sm-2">
                <div class="pull-left">
                    <div class="form-group pull-right" style="padding-top: 25px;">
                        <button class="btn btn-primary" id="searchIfaMangment">Search</button>
                        <button class="btn btn-success" id="ifa_reset_btn">Reset</button>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
</div>
<div class="col-sm-12">
    <!-- <div class="panel panel-default"> -->
        <!-- <div class="panel-body"> -->

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
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody id="ifa_list_tbody">
                   <!--  @php($i =1)
                    @foreach($getListValue as $value)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$value->first_name}}</td>
                            <td>{{$value->last_name}}</td>
                            <td>{{$value->mobile_no}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->date_of_birth}}</td>
                            <td>
                                <a href="{{ route('application_details_view', $value->application_no) }}">View</a>
                            </td>
                        </tr>
                    @endforeach -->
                </tbody>
            </table>
            <!-- <div class="pagination_body">
                {{$getListValue->links()}}
            </div> -->

            <div class="pagination-container">
                <nav>
                    <ul class="pagination"></ul>
                </nav>
            </div>
        <!-- </div> -->
    <!-- </div> -->
</div>
@endsection