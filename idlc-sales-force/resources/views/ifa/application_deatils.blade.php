@extends('layouts.dashboard')
@section('page_heading','Applicant Details')
@section('section')


    <div class="col-sm-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Basic Profile Information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="first_name">First Name  </label>
                                        <input readonly type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ !isset($application_details->first_name) ?: $application_details->first_name  }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="middle_name">Middle Name</label>
                                        <input readonly type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name" value="{{ !isset($application_details->middle_name) ? '' : $application_details->middle_name  }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="last_name">Last Name  </label>
                                        <input readonly type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ !isset($application_details->last_name) ?: $application_details->last_name  }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mobile_no">Mobile No.  </label>
                                            <input type="text" readonly value="+88 01{{ !isset($application_details->mobile_no) ?: $application_details->mobile_no  }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm-6 ">

                                    <div class="form-group">
                                        <label  for="email" style="width: 100%;">Email  </label>

                                        <input type="text" readonly value="{{ !isset($application_details->email) ?: $application_details->email  }}" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="father_name">Father's Name</label>
                                        <input readonly type="text" class="form-control" id="father_name" name="father_name" placeholder="Father's Name" value="{{ !isset($application_details->father_name) ? '' : $application_details->father_name  }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mother_name">Mother's Name</label>
                                        <input readonly type="text" class="form-control"    value="{{ !isset($application_details->mother_name) ? '' : $application_details->mother_name  }}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                {{-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="nationality">Nationality</label>
                                            @if (isset($application_details->nationality_info))
                                                <input readonly type="text" class="form-control"    value="{{ $application_details->nationality_info->nationality}}">
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group others_nationality_flag_yes" style="display: none;">
                                        <label for="others_nationality">Others Nationality</label>
                                        <input readonly type="text" class="form-control" id="others_nationality" name="others_nationality" placeholder="Others Nationality" value="{{ $application_details->others_nationality }}">
                                    </div>
                                </div> --}}

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nationality">Nationality</label>

                                                @if(strtolower($application_details->nationality) == 'bangladesh' )
                                                    <select class="form-control" id="nationality" readonly>
                                                        <option >Bangladesh</option>
                                                    </select>
                                                @else
                                                    <select class="form-control" id="nationality" readonly>
                                                        <option >{{$application_details->others_nationality}}</option>
                                                    </select>
                                                @endif
                                            </div>
                                        </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="date_of_birth">Date of Birth  </label>
                                        <input readonly type="text" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" data-provide="datepicker" value="{{ !isset($application_details->date_of_birth) ?: $application_details->date_of_birth  }}">
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="user_type">User Type</label>
                                        @if (isset($application_details->user_type))
                                            <input readonly type="text" class="form-control"    value="{{ $application_details->user_type->user_type}}">
                                        @else
                                            <input readonly type="text" class="form-control"    value="">
                                            @endif
                                            </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group others_user_type_flag_yes" style="display: none;">
                                        <label for="others_user_type">Others User Type</label>
                                        <input readonly type="text" class="form-control" id="others_user_type" name="others_user_type" placeholder="Others User Type" value="{{ $application_details->others_user_type }}">
                                    </div>
                                </div>

                            </div>



                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="national_id_card_no">National ID Card No.  </label>
                                        <input style="width: 80% !important; float: left;" readonly type="text" class="form-control" id="national_id_card_no" name="national_id_card_no" placeholder="National ID Card No." value="{{ !isset($application_details->national_id_card_no) ?: $application_details->national_id_card_no  }}">
                                        @if($application_details->nid_validation_status == 'Valid')
                                            <span style="padding-left: 10px; float:left; color: #5cb85c; font-size: 30px;" class="glyphicon glyphicon-ok-circle"></span>
                                        @elseif($application_details->nid_validation_status == 'InValid')
                                            <span style="padding-left: 10px; float:left; color: red; font-size: 30px;" class="glyphicon glyphicon-remove-circle"></span>
                                        @else
                                        @endif
                                    </div>
                                    
                                </div>


                                <div class="col-sm-3 uploaded_picture_preview_div">
                                    <img id="uploaded_picture_preview" src="{{ asset('idlc_aml_images/ifa_registrations/' . $application_details->application_no . $application_details->image_ext) }}" alt="Uploaded Picture Preview" width="185" />
                                </div>
                            </div>



                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Address Details</h3>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <h4>Present Address : </h4>

                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="present_address_premise_ownership">Premise Ownership</label>
                                                        @if (isset($application_details->premise_ownership))
                                                            <input readonly type="text" class="form-control"    value="{{ $application_details->premise_ownership->premise_ownership}}">
                                                        @else
                                                            <input readonly type="text" class="form-control"    value="">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="present_address_division">Division</label>
                                                        @if (isset($application_details->pre_division))
                                                            <input readonly type="text" class="form-control"    value="{{ $application_details->pre_division->division_name}}">
                                                        @else
                                                            <input readonly type="text" class="form-control"    value="">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="present_address_district">District</label>
                                                        @if (isset($application_details->pre_district))
                                                            <input readonly type="text" class="form-control"    value="{{ $application_details->pre_district->district_name}}">
                                                        @else
                                                            <input readonly type="text" class="form-control"    value="">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="present_address_po">Thana</label>
                                                        <input readonly type="text" class="form-control" id="present_address_po" name="present_address_po" placeholder="Thana" value="{{ $application_details->pre_addr_ps_id }}">
                                                        {{-- <select readonly" class="form-control thana_id" id="present_address_po" name="present_address_po">
                                                            <option value="0">Select any</option>
                                                        </select> --}}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="present_address_road_no">Road No.</label>
                                                        <input readonly type="text" class="form-control" id="present_address_road_no" name="present_address_road_no" placeholder="Road No." value="{{ !isset($application_details->pre_addr_road_no) ? '' : $application_details->pre_addr_road_no  }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="present_address_house_no">House No.</label>
                                                        <input readonly type="text" class="form-control" id="present_address_house_no" name="present_address_house_no" placeholder="House No." value="{{ !isset($application_details->pre_addr_house_no) ? '' : $application_details->pre_addr_house_no  }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="present_address_flat_no">Flat No.</label>
                                                        <input readonly type="text" class="form-control" id="present_address_flat_no" name="present_address_flat_no" placeholder="Flat No." value="{{ !isset($application_details->pre_addr_flat_no) ? '' : $application_details->pre_addr_flat_no  }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">

                                            <h4>Permanent Address : </h4>

                                            <div class="form-group">
                                                <label for="is_same_as_present_address">Same as present address?</label><br/>
                                                <label class="radio-inline">
                                                    <input readonly type="radio" id="is_same_as_present_address_yes" name="is_same_as_present_address" value="yes" {{ (isset($application_details->is_same_as_present_address)) ? ($application_details->is_same_as_present_address == 1 ? 'checked="checked"' : '') : '' }}> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input readonly type="radio" id="is_same_as_present_address_no" name="is_same_as_present_address" value="no"  {{ (isset($application_details->is_same_as_present_address)) ? ($application_details->is_same_as_present_address == 0 ? 'checked="checked"' : '') : '' }}> No
                                                </label>
                                            </div>

                                            @if($application_details->is_same_as_present_address == 0)

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group is_same_as_present_address_flag_yes">
                                                            <label for="permanent_address_premise_ownership">Permise Ownership</label>
                                                            @if (isset($application_details->permise_ownership))
                                                                <input readonly type="text" class="form-control"    value="{{ $application_details->permise_ownership->premise_ownership   }}">
                                                            @else
                                                                <input readonly type="text" class="form-control"    value="">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group is_same_as_present_address_flag_yes">
                                                            <label for="permanent_address_division">Division</label>
                                                            @if (isset($application_details->per_division))
                                                                <input readonly type="text" class="form-control"    value="{{ $application_details->per_division->division_name}}">
                                                            @else
                                                                <input readonly type="text" class="form-control"    value="">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group is_same_as_present_address_flag_yes">
                                                            <label for="permanent_address_district">District</label>
                                                            @if (isset($application_details->per_district))
                                                                <input readonly type="text" class="form-control"  value="{{ $application_details->per_district->district_name}}">
                                                            @else
                                                                <input readonly type="text" class="form-control" value="">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group is_same_as_present_address_flag_yes">
                                                            <label for="permanent_address_po">Thana</label>
                                                            <input readonly type="text" class="form-control" id="permanent_address_po" name="permanent_address_po" value="{{ $application_details->per_addr_ps_id }}" placeholder="Thana">
                                                            {{-- <select readonly" class="form-control thana_id" id="permanent_address_po" name="permanent_address_po">
                                                                <option value="0">Select any</option>
                                                            </select> --}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group is_same_as_present_address_flag_yes">
                                                            <label for="permanent_address_road_no">Road No.</label>
                                                            <input readonly type="text" class="form-control" id="permanent_address_road_no" name="permanent_address_road_no" placeholder="Road No." value="{{ !isset($application_details->per_addr_road_no) ? '' : $application_details->per_addr_road_no  }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group is_same_as_present_address_flag_yes">
                                                            <label for="permanent_address_house_no">House No.</label>
                                                            <input readonly type="text" class="form-control" id="permanent_address_house_no" name="permanent_address_house_no" placeholder="House No." value="{{ !isset($application_details->per_addr_house_no) ? '' : $application_details->per_addr_house_no  }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group is_same_as_present_address_flag_yes">
                                                            <label for="permanent_address_flat_no">Flat No.</label>
                                                            <input readonly type="text" class="form-control" id="permanent_address_flat_no" name="permanent_address_flat_no" placeholder="Flat No." value="{{ !isset($application_details->per_addr_flat_no) ? '' : $application_details->per_addr_flat_no  }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>  
    {{-- </div> --}}

    <div class="col-sm-12" style="">
     <div class=" panel panel-default">
        <div class="panel-heading" >
            <h3 class="panel-title">Educational/Professional Information</h3>
        </div>
        <div class="panel-body">
            <div id="educational_professional_information">
                    <input readonly type="hidden" name="_token" value="{{ csrf_token() }}">
                    {!! method_field('PUT') !!}
                    <input readonly type="hidden" name="step" value="2">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="latest_degree">Latest Degree</label>
                                <input readonly type="text" class="form-control" id="latest_degree" name="latest_degree" placeholder="Latest Degree" value="{{ !isset($application_details->latest_degree) ? '' : $application_details->latest_degree  }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="last_educational_institution">Last Educational Institution</label>
                                <input readonly type="text" class="form-control" id="last_educational_institution" name="last_educational_institution" placeholder="Last Educational Institution" value="{{ !isset($application_details->last_educational_institution) ? '' : $application_details->last_educational_institution  }}">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="job_holder">Job Holder</label><br/>
                                <label class="radio-inline">
                                    <input readonly type="radio" id="job_holder_yes" name="job_holder" value="yes" {{$application_details->is_job_holder == 1 ? 'checked="checked"' : '' }}> Yes
                                </label>
                                <label class="radio-inline">
                                    <input readonly type="radio" id="job_holder_no" name="job_holder" value="no"  {{ $application_details->is_job_holder == 0 ? 'checked="checked"' : '' }}> No
                                </label>
                            </div>
                            @if($application_details->is_job_holder == 1)
                                <div class="form-group " >
                                    <label for="organization_name">Organization Name</label>
                                    <input readonly type="text" class="form-control" id="organization_name" name="organization_name" placeholder="Organization Name" value="{{ !isset($application_details->organization_name) ? '' : $application_details->organization_name  }}">
                                </div>

                                <div class="form-group " >
                                    <label for="job_holder_department">Department</label>
                                    <input readonly type="text" class="form-control" id="job_holder_department" name="job_holder_department" placeholder="Job Holder Department" value="{{ !isset($application_details->job_holder_department) ? '' : $application_details->job_holder_department  }}">
                                </div>
                                <div class="form-group " >
                                    <label for="designation">Designation</label>
                                    <input readonly type="text" class="form-control" id="designation" name="designation" placeholder="Designation"  value="{{ !isset($application_details->designation) ? '' : $application_details->designation  }}">
                                </div>
                                <div class="form-group " >
                                    <label for="employee_id_no">Employee ID No.</label>
                                    <input readonly type="text" class="form-control" id="employee_id_no" name="employee_id_no" placeholder="Employee ID No." value="{{ !isset($application_details->employee_id_no) ? '' : $application_details->employee_id_no  }}">
                                </div>
                            @endif

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="student">Student</label><br/>
                                <label class="radio-inline">
                                    <input readonly type="radio" id="student_yes" name="student"  {{ $application_details->is_student == 1 ? 'checked="checked"' : '' }}> Yes
                                </label>
                                <label class="radio-inline">
                                    <input readonly type="radio" id="student_no" name="student" value="no"  {{ $application_details->is_student == 0 ? 'checked="checked"' : '' }}> No
                                </label>
                            </div>
                            @if($application_details->is_student== 1)
                                <div class="form-group " >
                                    <label for="institution_name">Institution Name</label>
                                    <input readonly type="text" class="form-control" id="institution_name" name="institution_name" placeholder="Institution Name" value="{{ !isset($application_details->institution_name) ? '' : $application_details->institution_name  }}">
                                </div>
                                <div class="form-group " >
                                    <label for="student_department">Department</label>
                                    <input readonly type="text" class="form-control" id="student_department" name="student_department" placeholder="Student's Department" value="{{ !isset($application_details->student_department) ? '' : $application_details->student_department  }}">
                                </div>
                                <div class="form-group " >
                                    <label for="student_id_card_no">Student ID Card No.</label>
                                    <input readonly type="text" class="form-control" id="student_id_card_no" name="student_id_card_no" placeholder="Student ID Card No." value="{{ !isset($application_details->student_id_card_no) ? '' : $application_details->student_id_card_no  }}">
                                </div>
                            @endif
                        </div>
                    </div>

            </div>
            </div>
            </div>
            </div>
<div class="col-sm-12" style="">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Paymement</h3>
        </div>
        <div class="panel-body">
            <div id="bank_alternate_channel_information">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="receive_sales_commission_by">Receive Sales Commission By</label><br/>
                                <label class="radio-inline">
                                    <input readonly type="radio" id="receive_sales_commission_by_Bank" name="receive_sales_commission_by" value="Bank"  {{ (isset($application_details->receive_sales_commission_by)) ? ($application_details->receive_sales_commission_by == 'Bank' ? 'checked="checked"' : '') : '' }}> Bank
                                </label>
                                <label class="radio-inline">
                                    <input readonly type="radio" id="receive_sales_commission_by_bKash" name="receive_sales_commission_by" value="bKash" {{ (isset($application_details->receive_sales_commission_by)) ? ($application_details->receive_sales_commission_by == 'bKash' ? 'checked="checked"' : '') : '' }}> bKash
                                </label>
                            </div>
                        </div>
                    </div>
                    @if($application_details->receive_sales_commission_by == 'Bank')
                        <div class="row receive_sales_commission_by_flag_Bank">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="bank">Bank</label>

                                    @if (isset($application_details->bank))
                                        <input readonly type="text" class="form-control"    value="{{ $application_details->bank->bank_name}}">
                                    @else
                                        <input readonly type="text" class="form-control"    value="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="branch">Branch</label>
                                    @if (isset($application_details->branch))
                                        <input readonly type="text" class="form-control"    value="{{ $application_details->branch->branch_name}}">
                                    @else
                                        <input readonly type="text" class="form-control"    value="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="account_no">A/C No.</label>
                                    <input readonly type="text" class="form-control" id="account_no" name="account_no" placeholder="A/C No." value="{{ !isset($application_details->bank_account_no) ? '' : $application_details->bank_account_no  }}">
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($application_details->receive_sales_commission_by == 'bKash')
                        <div class="row receive_sales_commission_by_flag_bKash" style="">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="bKash_account_type">bKash A/C Type</label><br/>
                                    <label class="radio-inline">
                                        <input readonly type="radio" id="bKash_account_type_Agent" name="bKash_account_type" value="Agent" {{$application_details->bKash_acc_type == 'Agent' ? 'checked="checked"' : '' }}> Agent
                                    </label>
                                    <label class="radio-inline">
                                        <input readonly type="radio" id="bKash_account_type_Personal" name="bKash_account_type" value="Personal" {{ $application_details->bKash_acc_type == 'Personal' ? 'checked="checked"' : '' }}> Personal
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="bKash_mobile_no">bKash Mobile No.</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon2">+88 01</span>
                                        <input readonly type="number" class="form-control" id="bKash_mobile_no" name="bKash_mobile_no" placeholder="bKash Mobile No." aria-describedby="basic-addon2" value="{{ !isset($application_details->bKash_mobile_no) ? '' : $application_details->bKash_mobile_no  }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    </div>
                    
            
</div>
</div>
</div>



<div class="col-sm-12" style="text-align: center;">
    <div class=" panel panel-default">
    @if($application_details->application_status == 'Submitted')
    
        <div class="panel-body">
            
            <div class="form-group" style="width: 100%; float: left;">
                <a href="{{ route('applicant_nid_validate_action', [$application_details->application_no, 'Valid'] ) }}" style="float: right; width: 25%;" class="btn btn-success">In Progress</a>
                <a href="{{ route('applicant_nid_validate_action', [$application_details->application_no, 'InValid'] ) }}" style="float: right; width: 25%; margin-right: 5%;" class="btn btn-danger">Rejected</a>
            </div>
            
        </div>
   @elseif($application_details->application_status == 'InProgress') 
    <div class="alert alert-primary" style="margin-bottom: 0px; background:#cce5ff; color:#004085; width: 100%;" role="alert">
      The Application is {{ $application_details->application_status }}.
    </div>
@elseif($application_details->application_status == 'Approved') 
    <div class="alert alert-success" role="alert" style="margin-bottom: 0px; background:#d4edda; color:#155724; width: 100%;">
      The Application is {{ $application_details->application_status }}.
    </div>
@elseif($application_details->application_status == 'PartiallyCompleted') 
    <div class="alert alert-warning" role="alert" style="margin-bottom: 0px; background:#fff3cd; color:#856404; width: 100%;">
      The Application is {{ $application_details->application_status }}.
    </div>
@elseif($application_details->application_status == 'Rejected') 
    <div class="alert alert-danger" role="alert" style="margin-bottom: 0px; background:#f8d7da; color:#721c24; width: 100%;">
      The Application is {{ $application_details->application_status }}.
    </div>
@endif
</div>
</div>




@endsection