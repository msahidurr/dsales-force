@extends('layouts.dashboard')
@section('page_heading','Lead Bulk Upload')
@section('section')
<div class="col-sm-8 col-sm-offset-2">
	<div class="panel panel-default">
		<div class="panel-body">
			<form action="{{ route('store_bulk_upload')}}" method="POST" role="form" >
				{{csrf_field()}}

					<div class="form-group">
						<label class="col-sm-3 control-label" for="bulkupload"> <span class="pull-right">Upload Lead :</span></label>
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
@endsection