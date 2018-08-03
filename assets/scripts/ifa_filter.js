
var ifaManagementFilterSearch = (function(){

	return {
		init: function(){
			var menuValue 	= '';
			var sortbyValue = 'DESC';
				
			$('#selectSortbyValue').on('change',function(e){
				sortbyValue = $.trim($("#selectSortbyValue").find(":selected").val());
			});
			$('#selectMenuOption').on('change',function(e){
				menuValue = $.trim($("#selectMenuOption").find(":selected").val());
				e.preventDefault();
				$('.pagination_body').addClass('hidden');
				var formDateValue 	= $("input[name='date[from]']").val();
				var toDateValue 	= $("input[name='date[to]']").val();

				var data = 
					{
					selectedOptionValues : menuValue,
					sortbyValues 	:sortbyValue,
					formDateValues  :formDateValue,
					toDateValues    :toDateValue
				};
				var sss = {
					a:inputValidate(menuValue,'error_1'),
					b:inputValidate(sortbyValue,'error_2'),
					c:inputValidate(formDateValue,'error_3'),
					d:inputValidate(toDateValue,'error_4')};
				var id = {a:'error_1',b:'error_2',c:'error_3',d:'error_4'};			
				
				var inputValidates = checkOneTrueValue(sss,id);
				if(inputValidates == false){
					return false;
				}
				$.ajax({
		          type: "GET",
		          url: "/SalesForce/getMenuFilterValue",
		          data: data,
		          datatype: 'json',
		          cache: false,
		          async: false,
		          success: function(result) {
		          	var data = JSON.parse(result);
		          	console.log(data);
		          	addRowIfa(data,0);
		          },
		          error:function(result){
		            alert("Some thing is Wrong");
		          }
		          });
			});
		}
	}
})();

function inputValidate(value = null ,id){
	var data = true ;
	if(value == null || value == ""){
		$('#'+id+'').addClass('has-error');
		data = false;
	}else{
		$('#'+id+'').removeClass('has-error');
	}
	return data ;
}

function checkOneTrueValue(value = {},id = {}){
	var boolen = false;
	if(value.a || value.b || value.c || value.d == true ){
		$('#'+id.a+'').removeClass('has-error');
		$('#'+id.b+'').removeClass('has-error');
		$('#'+id.c+'').removeClass('has-error');
		$('#'+id.d+'').removeClass('has-error');
		boolen = true;
	}
	return boolen ;
}

function addRowIfa(results, start)
{	
	var root_url = window.location.protocol + "//" + window.location.host + "/";

	$('.pagination').empty();
    $('#ifa_list_tbody').empty();
    $("#booking_list_pagination").css('display','none');

    var sl = 1;

    var position = start+1;
    start = start*15;

    if(results.length <start+15){
        end = results.length;
    }
    else{
        end = start+15;
    }

    var rows = $.map(results, function(value, index) {
        return [value];
    });
    if( end == 0){
    	$('#ifa_list_tbody').append(
    		'<tr class="ifa_list_tbody"><td colspan="7" > <center><span style="padding:50px;">Empty Value</span></center> </td> </tr>'
    		);
    }else{
	    for (var i = start; i < end; i++)
	    {
	        $('#ifa_list_tbody').append('<tr class="ifa_list_tbody"><td>'+sl+
	            '</td><td>'+ emptyCheckss(rows[i].first_name) +
	            '</td><td>'+ emptyCheckss(rows[i].last_name) +
	            '</td><td>'+ emptyCheckss(rows[i].mobile_no) +
	            '</td><td>'+ emptyCheckss(rows[i].email) +
	            '</td><td>'+ emptyCheckss(rows[i].created_at) +
	            '<td><a href="/SalesForce/applicant/details/'+rows[i].application_no+'">View</a></td>'+
	            '</td></tr>');
	        sl++;
	    }
	}

    setPaginationss(results, position);

    $('.pagination li').on('click',(function () {
        var begin = $(this).attr("data-page");
        addRowIfa(results, begin-1);
    }));

}

function emptyCheckss(value){
	return ((value == null ) ? "" : value) ;
}



function setPaginationss(results, position) {
    var pageNum = Math.ceil(results.length/15);
    var previous = (position-1);
    var next = (position+1);
    if(position == 1)
        previous = 1;
    if(position == pageNum)
        next = pageNum;
    $('.pagination').append('<li data-page="'+ previous +'"><span>&laquo;<span class="sr-only">(current)</span></span></li>').show();
    for (i = 1; i <= pageNum;)

    {
        $('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show();
    }
    $('.pagination').append('<li data-page="'+ next +'"><span>&raquo;<span class="sr-only">(current)</span></span></li>').show();

    $('.pagination li:nth-child('+ (position+1) +')').addClass('active');

    if(position == 1)
        $('.pagination li:first-child').addClass('disabled');
    if(position == pageNum)
        $('.pagination li:last-child').addClass('disabled');
}

var ifaManagementReset = (function(){

	return {
		init: function(){
			$('#ifa_reset_btn').on('click',function () {
				$('.pagination_body').addClass('hidden');
				$('#selectMenuOption').val("");
				$('#selectSortbyValue').val("");
				$('#formDate').val("");
				$('#toDate').val("");

				$('#error_1').removeClass('has-error');
				$('#error_2').removeClass('has-error');
				$('#error_3').removeClass('has-error');
				$('#error_4').removeClass('has-error');

				$.ajax({
		          type: "GET",
		          url: "/SalesForce/ifa/management/all/value",
		          datatype: 'json',
		          cache: false,
		          async: false,
		          success: function(result) {
		          	var data = JSON.parse(result);
		          	addRowIfa(data,0)		          	
		          },
		          error:function(result){
		            alert("Some thing is Wrong");
		          }
		          });
			});
		}
	}
})();

$(document).ready(function(){
	ifaManagementFilterSearch.init();
	ifaManagementReset.init();
});