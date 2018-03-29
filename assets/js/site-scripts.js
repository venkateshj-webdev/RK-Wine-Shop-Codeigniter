/*Sales Pages Scripts*/
var aquantity = 0;
var url = 'http://localhost/22-11-2017_latest_files_of_wineshop/';
//var url = 'http://www.calliarc.com/works/wineshop/';
jQuery("#brand_name").change(function(){
	jQuery("#price").val("0");	
	jQuery('#total').val("0");
	jQuery('#quantity').val("0");
	if(jQuery("#brand_name").val()==""){
		alert("Please sleect Brand Name");
		jQuery("#brand_name").focus();
		return false;
	}

	$.ajax({
	  type: "post",
	  dataType: 'json',
	  url: url + "sales_controller/get_inventory",
	   headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
    },
	  cache: false,    
	  data: {brand_id:jQuery("#brand_name").val()},
	  success: function(json){      

	  try{  
	   //var obj = jQuery.parseJSON(json);
	   var obj = json;
	   //console.log(obj[0].id);
	  	var $el = jQuery("#stock_name");
        $el.empty(); // remove old options
        $el.append(jQuery("<option></option>").attr("value", '').text('Select Stock'));
	      
        $.each(obj, function(i, item) {
   		 $el.append(jQuery("<option></option>").attr("value", obj[i].id).text(obj[i].name));
		});

	  }catch(e) {  
	   alert('Exception while request1..');
	  }  
	  },
	  error: function(){      
	   alert('Error while request2..');
	  }
	 });
})
jQuery("#stock_name").change(function(){
	jQuery("#price").val("0");	
	jQuery('#total').val("0");
	jQuery('#quantity').val("0");
	if(jQuery("#brand_name").val()==""){
		alert("Please sleect Brand Name");
		jQuery("#brand_name").focus();
		return false;
	}
	if(jQuery("#stock_name").val()==""){
		alert("Please sleect Stock Name");
		jQuery("#stock_name").focus();
		return false;
	}
	$.ajax({
	  type: "post",
	  dataType: 'json',
	  url: url + "sales_controller/get_price_stock",
	   headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
    },
	  cache: false,    
	  data: {brand_id:jQuery("#brand_name").val(), stock_id:jQuery("#stock_name").val()},
	  success: function(json){      
	  try{  
	   	// var obj = jQuery.parseJSON(json);
	   	var obj = json;
	  	console.log(obj);
	  	jQuery("#price").val(obj[0].sale_price);
	  	jQuery("#quantity-available").html("Available Quantity : " + obj[0].quantity + " Bottles");
	  	aquantity = obj[0].quantity;
	  }catch(e) {  
	   alert('Exception while request..');
	  }  
	  },
	  error: function(){      
	   alert('Error while request..');
	  }
	 });
})
jQuery("#add_sales_form").submit(function(e){
if(jQuery("#brand_name").val()==""){
	alert("Please sleect Brand Name");
	return false;
}
if(jQuery("#stock_name").val()==""){
	alert("Please sleect Stock Name");
	return false;
}
if(jQuery('#price').val()=="0"){
	alert("Price is invalid");
	return false;
}
if(jQuery('#quantity').val()=="0"){
	alert("Quantity is invalid");
	return false;
}
else if(parseInt(jQuery('#quantity').val())>parseInt(aquantity)){
	alert("Quantity should be greanter actual stock");
	return false;
}

});


jQuery(".stock_key_1").keyup(function() {
	totalTwoNumbers();
});
jQuery(".stock_key_2").keyup(function() {
	totalTwoNumbers();
});

jQuery(".stock_key_sum").val("0");
jQuery(".stock_key_1").val("");
jQuery(".stock_key_2").val("");

function totalTwoNumbers() {
    var $num1 = ($(".stock_key_1").val() != "" && !isNaN($(".stock_key_1").val())) ? parseInt($(".stock_key_1").val()) : 0;
    var $num2 = ($(".stock_key_2").val() != "" && !isNaN($(".stock_key_2").val())) ? parseInt($(".stock_key_2").val()) : 0;
    jQuery(".stock_key_sum").val($num1 * $num2);
}
$(document).on("input", ".numeric", function() {
    this.value = this.value.replace(/[^\d\.\-]/g,'');
});
jQuery("#add-stock").click(function(){

});

/*query for no of cases*/
$("#no_of_cases").keyup( function() {
 	getSizes();
 }); 

function getSizes() {
	$("#brand_name_list").change(function () {	
	  selectedText = $(this).find("option:selected").text();
      var selectedValue = $(this).val();
	 });
	var getVal = $( "#brand_name_list option:selected" ).text();
	if(getVal.lastIndexOf("litre")>= 0) {
		var noOfCases = ($("#no_of_cases").val() != "" && !isNaN($("#no_of_cases").val())) ? parseInt($("#no_of_cases").val()) : 0;
		var totalMulValue = $("#stock_key_1").val(noOfCases * 6);
	}
	else if(getVal.lastIndexOf("Qts")>= 0) {
		var noOfCases = ($("#no_of_cases").val() != "" && !isNaN($("#no_of_cases").val())) ? parseInt($("#no_of_cases").val()) : 0;
		var totalMulValue = $("#stock_key_1").val(noOfCases * 12);
	}
	else if(getVal.lastIndexOf("Pts")>= 0) {
		var noOfCases = ($("#no_of_cases").val() != "" && !isNaN($("#no_of_cases").val())) ? parseInt($("#no_of_cases").val()) : 0;
		var totalMulValue = $("#stock_key_1").val(noOfCases * 24);
	}
	else if(getVal.lastIndexOf("Nip")>= 0) {
		var noOfCases = ($("#no_of_cases").val() != "" && !isNaN($("#no_of_cases").val())) ? parseInt($("#no_of_cases").val()) : 0;
		var totalMulValue = $("#stock_key_1").val(noOfCases * 48);
	}
	else if(getVal.lastIndexOf("Dip")>= 0) {
		var noOfCases = ($("#no_of_cases").val() != "" && !isNaN($("#no_of_cases").val())) ? parseInt($("#no_of_cases").val()) : 0;
		var totalMulValue = $("#stock_key_1").val(noOfCases * 96);
	}

	//For Beer
	else if(getVal.lastIndexOf("650")>= 0) {
		var noOfCases = ($("#no_of_cases").val() != "" && !isNaN($("#no_of_cases").val())) ? parseInt($("#no_of_cases").val()) : 0;
		var totalMulValue = $("#stock_key_1").val(noOfCases * 20);
	}
	else if(getVal.lastIndexOf("350")>= 0) {
		var noOfCases = ($("#no_of_cases").val() != "" && !isNaN($("#no_of_cases").val())) ? parseInt($("#no_of_cases").val()) : 0;
		var totalMulValue = $("#stock_key_1").val(noOfCases * 30);
	}

	else if (getVal.lastIndexOf("500 - Tin") >= 0) {
		var noOfCases = ($("#no_of_cases").val() != "" && !isNaN($("#no_of_cases").val())) ? parseInt($("#no_of_cases").val()) : 0;
		var totalMulValue = $("#stock_key_1").val(noOfCases * 25);
	}

	else if (getVal.lastIndexOf("330 - Tin") >= 0) {
		var noOfCases = ($("#no_of_cases").val() != "" && !isNaN($("#no_of_cases").val())) ? parseInt($("#no_of_cases").val()) : 0;
		var totalMulValue = $("#stock_key_1").val(noOfCases * 28);
	}

	else if (getVal.lastIndexOf("250 - Tin") >= 0) {
		var noOfCases = ($("#no_of_cases").val() != "" && !isNaN($("#no_of_cases").val())) ? parseInt($("#no_of_cases").val()) : 0;
		var totalMulValue = $("#stock_key_1").val(noOfCases * 22);
	}

	//For Wine
	else if(getVal.lastIndexOf("Split")>= 0) {
		var noOfCases = ($("#no_of_cases").val() != "" && !isNaN($("#no_of_cases").val())) ? parseInt($("#no_of_cases").val()) : 0;
		var totalMulValue = $("#stock_key_1").val(noOfCases * 22);
	}
	else if(getVal.lastIndexOf("Half-Bottle")>= 0) {
		var noOfCases = ($("#no_of_cases").val() != "" && !isNaN($("#no_of_cases").val())) ? parseInt($("#no_of_cases").val()) : 0;
		var totalMulValue = $("#stock_key_1").val(noOfCases * 26);
	}

	else if (getVal.lastIndexOf("Bottle") >= 0) {
		var noOfCases = ($("#no_of_cases").val() != "" && !isNaN($("#no_of_cases").val())) ? parseInt($("#no_of_cases").val()) : 0;
		var totalMulValue = $("#stock_key_1").val(noOfCases * 28);
	}
}