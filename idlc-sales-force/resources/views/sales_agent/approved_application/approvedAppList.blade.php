@extends('layouts.dashboard')
@section('page_heading','Approved Application')
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
    
    <br>
    <br>

    <table class="table table-bordered table-striped" id="tblSearch">
        <thead>
            <tr>
                <th class="">Serial</th>
                <th class="">First Name</th>
                <th class="">Last Name</th>
                <th class="">Email</th>
                <th class="">Date of Birth</th>
                <th class="">Nationality</th>
                <th class="">National ID Card No.</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td> Md Arif</td>
                <td> Islam</td>
                <td>arif90@gmail.com</td>                  
                <td>16/09/1996</td>                  
                <td>Bangladeshi</td>                  
                <td>190400789009</td>                  
            </tr>
            <tr>
                <td>2</td>
                <td> Md.Malek</td>
                <td> Ahmed</td>
                <td>malekahmed69@gmail.com</td>                  
                <td>04/01/1997</td>                  
                <td>Bangladeshi</td>                  
                <td>1900000789010</td>                  
            </tr>
            <tr>
                <td>3</td>
                <td> Md Monsur</td>
                <td>Ali</td>
                <td>monsur@gmail.com</td>                  
                <td>16/12/1997</td>                  
                <td>Bangladeshi</td>                  
                <td>1900040789011</td>                  
            </tr>
            <tr>
                <td>4</td>
                <td> Md Abdul</td>
                <td> Ajat</td>
                <td>Abdul@gmail.com</td>                  
                <td>16/12/1997</td>                  
                <td>Bangladeshi</td>                  
                <td>1900000789001</td>                  
            </tr>
            <tr>
                <td>5</td>
                <td> Abdul</td>
                <td> Hakim</td>
                <td>hakim55@gmail.com</td>                  
                <td>30/05/1977</td>                  
                <td>Bangladeshi</td>                  
                <td>1907000789081</td>                  
            </tr>
            <tr>
                <td>6</td>
                <td> Newoaz</td>
                <td> Uddin</td>
                <td>newoaz76@gmail.com</td>                  
                <td>16/03/1996</td>                  
                <td>Bangladeshi</td>                  
                <td>1900830789001</td>                  
            </tr>
            <tr>
                <td>7</td>
                <td> Md Motaleb</td>
                <td> Rahman</td>
                <td>motaleb666@gmail.com</td>                  
                <td>12/01/1989</td>                  
                <td>Bangladeshi</td>                  
                <td>1800470078001</td>                  
            </tr>
        </tbody>
    </table>
</div>
@endsection