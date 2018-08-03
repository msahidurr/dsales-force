@extends('layouts.dashboard')
@section('page_heading','Converted List')
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
                <th class="">Name</th>
                <th class="">Contact No.</th>
                <th class="">Area</th>
                <th class="">Follow up date</th>
                <th class="">remarks</th>
                <th class="">Action</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>1</td>
                <td> Abul Kalam</td>
                <td> +880172312322 </td>
                <td>Dhaka</td>                  
                <td>15-05-02</td>                  
                <td>Bangladeshi</td>                  
                <td>
                    <table>
                        <tr>
                            <td>
                                <a href="#" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    </table>
                </td>                  
            </tr>

            <tr>
                <td>2</td>
                <td> Md.Malek Ahmed</td>
                <td> +880172007440</td>
                <td>Dhaka</td>                  
                <td>20-12-02</td>                  
                <td>Bangladeshi</td>                  
                <td>
                    <table>
                        <tr>
                            <td>
                                <a href="#" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    </table>
                </td>                  
            </tr>

            <tr>
                <td>3</td>
                <td> Md Monsur Ali</td>
                <td> +880173200120 </td>
                <td>Dhaka</td>                  
                <td>01-02-18</td>                  
                <td>Bangladeshi</td>                  
                <td>
                    <table>
                        <tr>
                            <td>
                                <a href="#" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    </table>
                </td>                  
            </tr>

            <tr>
                <td>4</td>
                <td> Md Abdul Ajat</td>
                <td> +880170012300 </td>
                <td>Dhaka</td>                  
                <td>10-09-17</td>                  
                <td>Bangladeshi</td>                  
                <td>
                    <table>
                        <tr>
                            <td>
                                <a href="#" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    </table>
                </td>                  
            </tr>

            <tr>
                <td>5</td>
                <td> Abdul Hakim</td>
                <td> +880172332300 </td>
                <td>Dhaka</td>                  
                <td>19-02-13</td>                  
                <td>Bangladeshi</td>                  
                <td>
                    <table>
                        <tr>
                            <td>
                                <a href="#" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    </table>
                </td>                  
            </tr>

            <tr>
                <td>6</td>
                <td> Newoaz Uddin</td>
                <td> +880172323234 </td>
                <td>Dhaka</td>                  
                <td>25-02-18</td>                  
                <td>Bangladeshi</td>                  
                <td>
                    <table>
                        <tr>
                            <td>
                                <a href="#" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    </table>
                </td>                  
            </tr>

            <tr>
                <td>7</td>
                <td> Md Motaleb Rahman</td>
                <td> +880172312322 </td>
                <td>Dhaka</td>                  
                <td>12-07-18</td>                  
                <td>Bangladeshi</td>                  
                <td>
                    <table>
                        <tr>
                            <td>
                                <a href="#" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    </table>
                </td>                  
            </tr>

        </tbody>
    </table>
</div>
@endsection