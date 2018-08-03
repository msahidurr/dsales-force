@extends('layouts.dashboard')
@section('page_heading','Add New Lead')
@section('section')
<!-- <div class="col-sm-12"> -->
	<div class="col-sm-2">
		<div class="form-group ">
			<a href="{{route('create_lead_view')}}" class="btn btn-primary ">
			<i class="fa fa-arrow-left"></i> Back</a>
		</div>
	</div>
	<div class="col-sm-10"></div>
<!-- </div> -->
<div class=" col-sm-12  main_body">
	<!-- <div class="panel-body"> -->
		<!-- <div class="col-sm-10 col-sm-offset-1"> -->
			<div class="panel panel-default add_body">
				<div class="panel-body">
					<form action="{{route('store_create_lead')}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="row">

								<div class="input_title">
									<span>Personal Details :</span>
								</div>
								<div class="col-sm-6">
									<div class="form-group add_input">
										<label class="col-sm-4 control-label ">
											<span class="pull-left ">Lead Type</span>
										</label>
										<div class="col-sm-12">
											<select class="form-control" name="lead_type">
												<option value="">Choose a Option</option>
												<option value="new"> New</option>
												<option value="referral"> Referral</option>
												
											</select>
										</div>
									</div>
								</div>

								<div class="col-sm-6">

									<div class="form-group add_input{{ $errors->has('personal_name') ? ' has-error' : ''}}">
										<label class="col-sm-4 control-label">
											<span class="pull-left">Name <span style="color: red;">*</span></span>
										</label>
										<div class="col-sm-12">
											<input type="text" class="form-control" name="personal_name" value="{{ old('personal_name')  }}" placeholder="Name">

											@if($errors->has('personal_name'))
												<span class="help-block">
													{{ $errors->first('personal_name')}}
												</span>
											@endif
										</div>
									</div>
								</div>


								<div class="col-sm-6">
									<div class="form-group add_input">
										<label class="col-sm-4 control-label ">
											<span class="pull-left ">Email </span>
										</label>
										<div class="col-sm-12">
											<input type="email" class="form-control"  name="email" value="{{ old('email')  }}" placeholder="Email" >
										</div>
									</div>

									<div class="form-group add_input{{ $errors->has('contact_no') ? ' has-error' : ''}}">
										<label class="col-sm-4 control-label">
											<span class="pull-left">Contact No <span style="color: red;">*</span></span>
										</label>
										<div class="col-sm-12">
											<input type="text" class="form-control" name="contact_no" value="{{ old('contact_no')  }}" placeholder="01*00" maxlength="11">

											@if($errors->has('contact_no'))
												<span class="help-block">
													{{ $errors->first('contact_no')}}
												</span>
											@endif
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group add_input{{ $errors->has('area') ? ' has-error' : ''}}">
										<label class="col-sm-4 control-label">
											<span class="pull-left">Area <span style="color: red;">*</span></span>
										</label>
										<div class="col-sm-12">
											<input type="text" class="form-control" name="area" value="{{ old('area')  }}" placeholder="Area">

											@if($errors->has('area'))
												<span class="help-block">
													{{ $errors->first('area')}}
												</span>
											@endif
										</div>
									</div>
									<div class="form-group add_input">
										<label class="col-sm-4 control-label">
											<span class="pull-left">Occupation</span>
										</label>
										<div class="col-sm-12">
											<select class="form-control" name="occupation">
												<option value=""> Choose a option</option>
												@foreach($getOccupation as $occupations)
													<option value="{{$occupations->id_occupation}}">
														{{$occupations->occupation}}
													</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="row">

								<div class="input_title title">
									<span>Investment Details :</span>
								</div>

								<div class="col-sm-4">
									<div class="form-group add_input">
										<label class="col-sm-8 control-label ">
											<span class="pull-left ">Fund Name </span>
										</label>
										<div class="col-sm-12">
											<select class="form-control" name="investment_name">
												<option value=""> Choose a option</option>
												<option value="ibf">IBF</option>
												<option value="igf">IGF</option>
												<option value="shariah">Shariah</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group add_input">
										<label class="col-sm-6 control-label">
											<span class="pull-left">Investment Type</span>
										</label>
										<div class="col-sm-12">
											<select class="form-control" name="investment_type">
												<option value=""> Choose a option</option>
												<option value="sip">SIP</option>
												<option value="non_sip">Non SIP</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group add_input{{ $errors->has('investment_date') ? '  has-error' : ''}}">
										<label class="col-sm-8 control-label ">
											<span class="pull-left ">Follow-up Date: <span style="color: red;">*</span></span>
										</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"  name="investment_date" value="{{ old('investment_date')  }}" placeholder="Follow-up Name">

											@if($errors->has('investment_date'))
												<span class="help-block">
													{{ $errors->first('investment_date')}}
												</span>
											@endif
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group add_input">
										<label class="col-sm-6 control-label ">
											<span class="pull-left ">Contact Status </span>
										</label>
										<div class="col-sm-12">
											<select class="form-control" name="contact_status">
												<option value=""> Choose a option</option>
												<option value="successful"> Successful</option>
												<option value="unreachable"> Unreachable</option>
												<option value="mobile_switched_of"> Mobile Switched of</option>
												<option value="need_to_call_again"> Need
												to call again</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group add_input">
										<label class="col-sm-8 control-label">
											<span class="pull-left">Label of Interest</span>
										</label>
										<div class="col-sm-12">
											<select class="form-control" name="interest_label">
												<option value=""> Choose a option</option>
												<option value="highly_interested"> Highly Interested</option>
												<option value="might_inves"> Might Inves</option>
												<option value="not_interested"> Not Interested</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group add_input{{ $errors->has('investment_action') ? '  has-error' : ''}}">
										<label class="col-sm-4 control-label ">
											<span class="pull-left ">Action <span style="color: red;">*</span></span>
										</label>
										<div class="col-sm-12">
											<select class="form-control" name="investment_action">
												<option value=""> Choose a option</option>
												@foreach($getInvestmentAction as $action)
													<option value="{{$action->id_investment_action}}"> {{$action->name}}</option>
												@endforeach
											</select>

											@if($errors->has('investment_action'))
												<span class="help-block">
													{{ $errors->first('investment_action')}}
												</span>
											@endif
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group add_input{{ $errors->has('lead_assign') ? '  has-error' : ''}}">
										<label class="col-sm-8 control-label ">
											<span class="pull-left ">Lead Assigned Status <span style="color: red;">*</span></span>
										</label>
										<div class="col-sm-12">
											<select class="form-control" name="lead_assign" id="lead_assign">
												<option value=""> Choose a option</option>
												<option value="disable_for_sales_agent">Disable for sales Agent</option>

												<option value="open_for_all">Open for All</option>
												<option value="assign_sales_agent">Assign a sales Agent</option>

												<!-- if change this "assign sales Agent" value please change lead_fillter.js on function ifaRegisterHideField -->
											</select>

											@if($errors->has('lead_assign'))
												<span class="help-block">
													{{ $errors->first('lead_assign')}}
												</span>
											@endif
										</div>
									</div>
								</div>

								<div class="col-sm-4 ifa_hide_field hidden">
									<div class="form-group add_input{{ $errors->has('lead_assign') ? '  has-error' : ''}}">
										<label class="col-sm-8 control-label ">
											<span class="pull-left ">IFA Register Member<span style="color: red;">*</span></span>
										</label>
										<div class="col-sm-12">
											<input type="text" name="assign_ifa_register_name" 
											id="assign_ifa_register_name" placeholder="Type Application no" class="form-control">

											@if($errors->has('lead_assign'))
												<span class="help-block">
													{{ $errors->first('lead_assign')}}
												</span>
											@endif
										</div>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-sm-4 control-label"> Remarks / Comments</label>

										<div class="col-sm-12">
											<div class="col-sm-8">
												<textarea class="form-control" name="remark_or_comment" placeholder="Add Comment.."></textarea>
											</div>
										</div>
									</div>
								</div>

							</div>
									
							<div class="form-group add_input">
								<div class="col-sm-2 col-sm-offset-10">
									<button type="submit" class="btn btn-primary" style="margin-right: 15px;">Submit
									</button>
								</div>
							</div>
					</form>
				</div>
			</div>
		<!-- </div> -->
	<!-- </div> -->
</div>
@endsection