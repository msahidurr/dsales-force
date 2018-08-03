@extends('layouts.dashboard')
@section('page_heading','Add New Occupation')
@section('section')
<div class=" col-sm-12 col-sm-offset-0 main_body">

	<!-- <div class="panel-body"> -->
		<div class="col-sm-12">
			<div class="col-sm-2">
				<div class="form-group ">
					<a href="{{route('new_occupation_view')}}" class="btn btn-primary ">
					<i class="fa fa-arrow-left"></i> Back</a>
				</div>
			</div>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default add_body">
				<div class="panel-body">
					<form action="{{route('store_occupation')}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group add_input{{ $errors->has('occupation') ? ' has-error' : ''}}">
								<label class="col-md-4 control-label">
									<span class="pull-right">Occupation</span>
								</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="occupation" value="{{ old('occupation')  }}" placeholder="Occupation">

									@if($errors->has('occupation'))
										<span class="help-block">
											{{ $errors->first('occupation')}}
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