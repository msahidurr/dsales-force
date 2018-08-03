
var thanasDistrict = (function(){
	return {
        init: function () {
        	$('#division_id').on('change',function(){
				var selectedValue = $.trim($("#division_id").find(":selected").val());
				
				$.ajax({
		          type: "GET",
		          url: "/get/division",
		          data: "district_id="+selectedValue,
		          datatype: 'json',
		          cache: false,
		          async: false,
		          success: function(result) {
		          	var data = JSON.parse(result);
		          	if(data.length === 0)
		              {
		              	$('#district_id').html($('<option>', {
		                      value: '',
		                      text : 'Choose District'
		                  }));

		              }else{
		              	$('#district_id').html($('<option>', {
		                    value: "",
		                    text : "Select District"
		                }));
		              	for(ik in data){
		                  $('#district_id').append($('<option>', {
		                      value: data[ik].district_id,
		                      text : data[ik].district_name
		                  }));
		                }
		              }
		          },
		          error:function(result){
		            alert("Some thing is Wrong");
		          }
		          });
			});
		}
	};
})();

var divDisThanas = (function(){

	return{
		init: function(){
			var divisionValue = '';
			$('#division_id').on('change',function(){
				divisionValue = $.trim($("#division_id").find(":selected").val());
			});

			$('#district_id').on('change',function(){
				var districtValue = $.trim($("#district_id").find(":selected").val());
				$.ajax({
		          type: "GET",
		          url: "/thanas/getThanaByDivisionAndDistrictId",
		          data: {division_id:divisionValue,district_id:districtValue},
		          datatype: 'json',
		          cache: false,
		          async: false,
		          success: function(result) {
		          	var data = JSON.parse(result);
		          	console.log(data);
		          	// if(data.length === 0)
		           //    {
		           //    	$('#district_id').html($('<option>', {
		           //            value: '',
		           //            text : 'Choose District'
		           //        }));

		           //    }else{
		           //    	$('#district_id').html($('<option>', {
		           //          value: "",
		           //          text : "Select District"
		           //      }));
		           //    	for(ik in data){
		           //        $('#district_id').append($('<option>', {
		           //            value: data[ik].district_id,
		           //            text : data[ik].district_name
		           //        }));
		           //      }
		           //    }
		          },
		          error:function(result){
		            alert("Some thing is Wrong");
		          }
		          });
			})
		}
	}
})();

var getBankBranch = (function(){

	return {
		init: function(){
			$('#bank_id').on('change',function(){
				var bankValue = $.trim($("#bank_id").find(":selected").val());

				$.ajax({
		          type: "GET",
		          url: "/branchs/getBranch",
		          data: {bank_id:bankValue},
		          datatype: 'json',
		          cache: false,
		          async: false,
		          success: function(result) {
		          	var data = JSON.parse(result);
		          	console.log(data);
		          	// if(data.length === 0)
		           //    {
		           //    	$('#district_id').html($('<option>', {
		           //            value: '',
		           //            text : 'Choose District'
		           //        }));

		           //    }else{
		           //    	$('#district_id').html($('<option>', {
		           //          value: "",
		           //          text : "Select District"
		           //      }));
		           //    	for(ik in data){
		           //        $('#district_id').append($('<option>', {
		           //            value: data[ik].district_id,
		           //            text : data[ik].district_name
		           //        }));
		           //      }
		           //    }
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
	thanasDistrict.init();
	// divDisThanas.init();
	// getBankBranch.init();
});