@extends('layouts.dashboard')
@section('page_heading','Add New Rating')
@section('section')
<div class=" col-sm-12 col-sm-offset-0 main_body">

	<!-- <div class="panel-body"> -->
		<div class="col-sm-12">
			<div class="col-sm-2">
				<div class="form-group ">
					<a href="{{route('new_rating_view')}}" class="btn btn-primary ">
					<i class="fa fa-arrow-left"></i> Back</a>
				</div>
			</div>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default add_body">
				<div class="panel-body">
					<form action="{{route('store_new_rating')}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group add_input{{ $errors->has('lead_completed_number') ? ' has-error' : ''}}">
								<label class="col-md-4 control-label">
									<span class="pull-right">No of Lead Completed </span>
								</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="lead_completed_number" value="{{ old('lead_completed_number')  }}" placeholder="No of Lead Completed">

									@if($errors->has('lead_completed_number'))
										<span class="help-block">
											{{ $errors->first('lead_completed_number')}}
										</span>
									@endif
								</div>
							</div>

							<!-- <div class="form-group add_input{{ $errors->has('rating') ? ' has-error' : ''}}">
								<label class="col-md-4 control-label">
									<span class="pull-right">Rating</span>
								</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="rating" value="{{ old('rating')  }}" placeholder="Rating">

									@if($errors->has('rating'))
										<span class="help-block">
											{{ $errors->first('rating')}}
										</span>
									@endif
								</div>
							</div> -->					

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