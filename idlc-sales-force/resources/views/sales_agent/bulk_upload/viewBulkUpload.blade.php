@extends('layouts.dashboard')
@section('page_heading','')
@section('section')
<div class="row">
	<div class="col-sm-12">
		@if(session()->has('bulkerror'))
		    <div class="alert alert-danger"> 
		    	{!! session('bulkerror') !!}
		    </div>
		@endif
		@if(session()->has('bulksuccess'))
		    <div class="alert alert-success"> 
		    	{!! session('bulksuccess') !!}
		    </div>
		@endif
	</div>
</div>
<div class="col-sm-8 col-sm-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>
				IFA/Sales Agent Upload
			</h3>
		</div>
		<div class="panel-body">
			<form action="{{ route('sales_bulk_upload_action')}}" method="POST" role="form" enctype="multipart/form-data">
				{{csrf_field()}}
					<div class="form-group row">
						<label class="col-sm-3 control-label" for="bulkupload"> <span class="pull-right">Institution</span></label>
						<div class="col-sm-4">
							<select class="form-control selections" name="institution" id="institution">
								<option value="0">Select Insititution</option>
								<?php 
									if(isset($institutions) && !empty($institutions)){
										foreach ($institutions as $institution) {
											print '<option value="'.$institution->id_organization.'">'.$institution->organization_name.'</option>';
										}
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 control-label" for="bulkupload"> <span class="pull-right">IFA/Sales Agent :</span></label>
						<div class="col-sm-5">
							<input type="file" name="bulk" class="form-control-file" id="bulkupload">
						</div>
	                    <div class="col-sm-4">
	                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
	                        	<span class="pull-left">
	                        		Upload
	                        	</span>
	                        </button>
	                    </div>
	            	</div>
			</form>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-4">
					 	<span class="pull-right" style="padding-top: 8px">Prefered File Format :</span>
					</label>
					<div class="col-sm-6">
						<a href="{{ asset('excel/ifa.xlsx')}}" class="btn btn-default">Download excel <i class="fa fa-download"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-sm-8 col-sm-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>
				Lead Upload
			</h3>
		</div>
		<div class="panel-body">
			<form action="{{ route('lead_bulk_upload_action')}}" method="POST" role="form" enctype="multipart/form-data">
				{{csrf_field()}}
					<div class="form-group row">
						<label class="col-sm-3 control-label" for="bulkupload"> <span class="pull-right">Lead :</span></label>
						<div class="col-sm-5">
							<input type="file" name="bulk" class="form-control-file" id="bulkupload">
						</div>
	                    <div class="col-sm-4">
	                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
	                        	<span class="pull-left">
	                        		Upload
	                        	</span>
	                        </button>
	                    </div>
	            	</div>
			</form>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-4">
					 	<span class="pull-right" style="padding-top: 8px">Prefered File Format :</span>
					</label>
					<div class="col-sm-6">
						<a href="{{ asset('excel/lead.xlsx')}}" class="btn btn-default">Download excel <i class="fa fa-download"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered table-striped">
			<thead>
				
			<tr>
				<?php
				$title_key = ['name','mobile_number','email','nationality','dob','error'];

					if(session('err_ifa_list')){
						foreach(session('err_ifa_list') as $xkey => $xval){
							foreach($xval as $xxkey => $xxval){
								if(in_array($xxkey, $title_key)){
									print '<th class="tablehead_'.$xxkey.'">'.str_replace("_"," ", $xxkey).'</th>';
								}
							}
							break;
						}
					}
				?>
			</tr>
			</thead>
			<tbody>
				<?php
				$title_key = ['name','mobile_number','email','nationality','dob','error'];

					if(session('err_ifa_list')){
						foreach(session('err_ifa_list') as $xkey => $xval){
							?>
								<tr>
							<?php 
							foreach($xval as $xxkey => $xxval){
								if(in_array($xxkey, $title_key)){
									print '<td class="table_data_'.$xxkey.'">'.$xxval.'</td>';
								}
							}
							?>
							</tr>
							<?php
						}
					}
				?>
			</tbody>
		</table>
	</div>
</div>
@endsection