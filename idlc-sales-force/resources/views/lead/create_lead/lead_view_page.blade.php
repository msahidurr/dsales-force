@extends('layouts.dashboard')
@section('page_heading','Lead Details')
@section('section')
<?php 
	$object = new App\Http\Controllers\Lead\LeadDetailsView();
?>
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
	<div class="panel panel-default add_body">
		<div class="panel-body">
			@foreach($getLeadValue as $valueslead)
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
							<select class="form-control" name="lead_type" disabled>
								<option value="">Choose a Option</option>
								<option <?php echo $object->valueCheckV($valueslead->lead_type,'new')?> value="new"> New</option>
								<option <?php echo $object->valueCheckV($valueslead->lead_type,'referral')?> value="referral"> Referral</option>	
								
							</select>
						</div>
					</div>
				</div>

				<div class="col-sm-6">

					<div class="form-group add_input">
						<label class="col-sm-4 control-label">
							<span class="pull-left">Name <span style="color: red;">*</span></span>
						</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="personal_name" value="{{$valueslead->personal_name}}" placeholder="Name" disabled>
						</div>
					</div>
				</div>


				<div class="col-sm-6">
					<div class="form-group add_input">
						<label class="col-sm-4 control-label ">
							<span class="pull-left ">Email </span>
						</label>
						<div class="col-sm-12">
							<input type="email" class="form-control"  name="email" value="{{$valueslead->email}}" placeholder="Email" disabled>
						</div>
					</div>

					<div class="form-group add_input">
						<label class="col-sm-4 control-label">
							<span class="pull-left">Contact No <span style="color: red;">*</span></span>
						</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="contact_no" value="{{ $object->emptys($valueslead->contact_no)}}" placeholder="01*00" disabled>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group add_input">
						<label class="col-sm-4 control-label">
							<span class="pull-left">Area <span style="color: red;">*</span></span>
						</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="area" value="{{ $object->emptys($valueslead->area) }}" placeholder="Area" disabled>
						</div>
					</div>
					<div class="form-group add_input">
						<label class="col-sm-4 control-label">
							<span class="pull-left">Occupation</span>
						</label>
						<div class="col-sm-12">
							<select class="form-control" name="occupation" disabled>
								@foreach($getOccupation as $occupations)
									<option <?php echo $object->valueCheckV($valueslead->occupation_id,$occupations->id_occupation)?> value="{{$occupations->id_occupation}}">
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
							<select class="form-control" name="investment_name" disabled>
								<option value=""> Choose a option</option>
								<option <?php echo $object->valueCheckV($valueslead->investment_name,'ibf')?> value="ibf">IBF</option>
								<option <?php echo $object->valueCheckV($valueslead->investment_name,'igf')?> value="igf">IGF</option>
								<option <?php echo $object->valueCheckV($valueslead->investment_name,'shariah')?> value="shariah">Shariah</option>
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
							<select class="form-control" name="investment_type" disabled>
								<option value="">Select type</option>
								<option <?php echo $object->valueCheckV($valueslead->investment_type,'sip')?> value="sip">SIP</option>
								<option <?php echo $object->valueCheckV($valueslead->investment_type,'non_sip')?> value="non_sip">Non SIP</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group add_input">
						<label class="col-sm-8 control-label ">
							<span class="pull-left ">Follow-up Date: <span style="color: red;">*</span></span>
						</label>
						<div class="col-sm-12">
							<input type="text" class="form-control"  name="investment_date" value="{{$object->emptys($valueslead->follow_up_date)}}" placeholder="Follow-up Name" disabled>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group add_input">
						<label class="col-sm-6 control-label ">
							<span class="pull-left ">Contact Status </span>
						</label>
						<div class="col-sm-12">
							<select class="form-control" name="contact_status" disabled>
								<option value="">Choose a option</option>

								<option <?php echo $object->valueCheckV($valueslead->contact_status,'successful')?> value="successful"> Successful</option>
								<option <?php echo $object->valueCheckV($valueslead->contact_status,'unreachable')?> value="unreachable"> Unreachable</option>
								<option <?php echo $object->valueCheckV($valueslead->contact_status,'mobile_switched_of')?> value="mobile_switched_of"> Mobile Switched of</option>
								<option <?php echo $object->valueCheckV($valueslead->contact_status,'need_to_call_again')?> value="need_to_call_again"> Need
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
							<select class="form-control" name="interest_label" disabled>
								<option value="">Choose a option</option>
								<option <?php echo $object->valueCheckV($valueslead->interest_label,'highly_interested')?> value="highly_interested"> Highly Interested</option>
								<option <?php echo $object->valueCheckV($valueslead->interest_label,'might_inves')?> value="might_inves"> Might Inves</option>
								<option <?php echo $object->valueCheckV($valueslead->interest_label,'not_interested')?> value="not_interested"> Not Interested</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group add_input">
						<label class="col-sm-4 control-label ">
							<span class="pull-left ">Action <span style="color: red;">*</span></span>
						</label>
						<div class="col-sm-12">
							<select class="form-control" name="investment_action" disabled>
								<option value="">Choose a option</option>
								@foreach($getInvestmentAction as $action)
									<option <?php echo $object->valueCheckV($valueslead->investment_action_id,$action->id_investment_action)?> value="{{$action->id_investment_action}}"> {{$action->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group add_input">
						<label class="col-sm-8 control-label ">
							<span class="pull-left ">Lead Assigned Status <span style="color: red;">*</span></span>
						</label>
						<div class="col-sm-12">
							<select class="form-control" name="lead_assign" id="lead_assign" disabled>
								<option value=""> Choose a option</option>
								<option <?php echo $object->valueCheckV($valueslead->lead_assign,'disable_for_sales_agent')?> value="disable_for_sales_agent">Disable for sales Agent</option>

								<option <?php echo $object->valueCheckV($valueslead->lead_assign,'Open_for_all')?> value="Open_for_all">Open for All</option>
								<option <?php echo $object->valueCheckV($valueslead->lead_assign,'assign_sales_agent')?> value="assign_sales_agent">Assign a sales Agent</option>
							</select>
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
						id="assign_ifa_register_name" placeholder="Type Application no" class="form-control" value="{{$valueslead->assign_ifa_register_name}}" disabled>

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
								<textarea class="form-control" name="remark_or_comment" disabled>
									{{$valueslead->remark_or_comment}}
								</textarea>
							</div>
						</div>
					</div>
				</div>

			</div>

			@endforeach
		</div>
	</div>
</div>
@endsection