@extends('layouts.dashboard')
@section('page_heading','Add New Organization')
@section('section')
<div class=" col-sm-12 col-sm-offset-0 main_body">

	<!-- <div class="panel-body"> -->
		<div class="col-sm-12">
			<div class="col-sm-2">
				<div class="form-group ">
					<a href="{{route('organization_view')}}" class="btn btn-primary ">
					<i class="fa fa-arrow-left"></i> Back</a>
				</div>
			</div>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default add_body">
				<div class="panel-body">
					<form action="{{route('store_organization')}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group add_input{{ $errors->has('organization_name') ? ' has-error' : ''}}">
								<label class="col-md-4 control-label">
									<span class="pull-right">Organization Name</span>
								</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="organization_name" value="{{ old('organization_name')  }}" placeholder="Organization Name">

									@if($errors->has('organization_name'))
										<span class="help-block">
											{{ $errors->first('organization_name')}}
										</span>
									@endif
								</div>
							</div>

							<div class="form-group add_input{{ $errors->has('contact_person_name') ? ' has-error' : ''}}">
								<label class="col-md-4 control-label">
									<span class="pull-right">Contact Person Name</span>
								</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="contact_person_name" value="{{ old('contact_person_name')  }}" placeholder="Contact Person Name">

									@if($errors->has('contact_person_name'))
										<span class="help-block">
											{{ $errors->first('contact_person_name')}}
										</span>
									@endif
								</div>
							</div>

							<div class="form-group add_input{{ $errors->has('contact_person_no') ? ' has-error' : ''}}">
								<label class="col-md-4 control-label">
									<span class="pull-right">Contact Person No</span>
								</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="contact_person_no" value="{{ old('contact_person_no')  }}" placeholder="Contact Person No">

									@if($errors->has('contact_person_no'))
										<span class="help-block">
											{{ $errors->first('contact_person_no')}}
										</span>
									@endif
								</div>
							</div>

							<div class="form-group add_input{{ $errors->has('address') ? ' has-error' : ''}}">
								<label class="col-md-4 control-label">
									<span class="pull-right">Address</span>
								</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="address" value="{{ old('address')  }}" placeholder="Address">

									@if($errors->has('address'))
										<span class="help-block">
											{{ $errors->first('address')}}
										</span>
									@endif
								</div>
							</div>							

							<div class="form-group add_input">
								<div class="col-md-3 col-md-offset-4">
									<div class="select">
										<select class="form-control" type="select" name="isActive" >
											<option  value="1" name="isActive" >Active</option>
											<option value="0" name="isActive" >Inactive</option>
									    </select>
									</div>
								</div>
							</div>
									
							<div class="form-group add_input">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary" style="margin-right: 15px;">Submit
									</button>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
	<!-- </div> -->
</div>
@endsection