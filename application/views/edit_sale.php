<?php
	$id             = '';
	$brand_name     = '';
	$sizes          = '';
	$quantity       = '';
	$sale_price     = '';
	$date_updated   = '';
	if(!empty($select)) {
	foreach ($select as $info) {
			$id             = $info->id;
			$brand_name     = $info->brand_name;
			$sizes          = $info->sizes;
			$quantity       = $info->quantity;
			$sale_price     = $info->sale_price;
			$date_updated   = $info->date_updated;
		}
	}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>
		<i class="fa fa-plus-square" aria-hidden="true"></i> Edit Stock
		<small>Edit</small>
	</h1>
    </section>
    <section class="content">
    	<div class="row">
			<div class="col-xs-12">
              <div class="box box-primary">
            	<?php if($this->session->flashdata('update_failed')) {?>
            	<div class="alert alert-danger alert-dismissable">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                	<?php echo $this->session->flashdata('update_failed'); ?>                    
            	</div>
            	<?php } ?>

	             <div class="clearfix" style="margin-bottom: 15px;"></div>
				  	<?php echo form_open_multipart('sales/update_sale'); ?>
				  	<div class="form-group margin-btm-20 col-sm-4 hidden-lg hidden-md hidden-sm hidden-xs">
						<label for="" class="control-label col-sm-12 pad-right-0">ID</label>
						<div class="col-sm-12">
							<input type="text" class="form-control disabled" name="id" value="<?=$id;?>">
						</div>
					</div>

					<div class="form-group margin-btm-20 col-sm-4">
						<label for="" class="control-label col-sm-12 pad-right-0">Brand Name</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="brand_name" value="<?=$brand_name;?>">
							<?php echo form_error('brand_name'); ?>
						</div>
					</div>
				
					<div class="form-group margin-btm-20 col-sm-4">
						<label for="" class="control-label col-sm-12 pad-right-0">Sizes</label>
						<div class="col-sm-12">
							<select class="form-control" id="sel1" name="sizes">
								<option value="<?php echo $sizes;?>"><?php echo $sizes; ?></option>
								<option value="" class="divider"></option>
					    		<option>750 - litre</option>
					    		<option>650 - Qts</option>
					    		<option>375 - Pts</option>
					    		<option>180 - Nip</option>
					    		<option>90 - Dip</option>
						  	</select>
						  	<?php echo form_error('sizes'); ?>
						</div>
					</div>

					<div class="form-group margin-btm-20 col-sm-4">
						<label for="" class="control-label col-sm-12 pad-right-0">Quantity</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="quantity" value="<?=$quantity;?>">
							<?php echo form_error('quantity'); ?>
						</div>
					</div>

					<div class="form-group margin-btm-20 col-sm-4">
						<label for="" class="control-label col-sm-12 pad-right-0">Sale Price</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="sale_price" value="<?=$sale_price;?>">
							<?php echo form_error('sale_price'); ?>
						</div>
					</div>

					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Date and Time</label>
							<div class='input-group date' id='datetimepicker1'>
								<input type="text" class="form-control" value="" id="datetimepicker_mask" name="date_updated" value="<?=$date_updated;?>"/>
							</span>
							<?php echo form_error('date_updated'); ?>
						</div>
					</div>	
					<div class="col-sm-12">
						<input type="submit" class="btn btn-primary btn-left-10" name="update-stock" value="Submit">
					</div>
					<?php echo form_close(); ?>		
	              </div>
            </div>
    	</div>
    </section>
</div>
<script type="text/javascript">
$( document ).ready(function() {
 $.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
	$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
	$.datetimepicker.setLocale($(e.currentTarget).val());
});
$('#datetimepicker_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})
var logic = function( currentDateTime ){
	if (currentDateTime && currentDateTime.getDay() == 6){
		this.setOptions({
			minTime:'11:00'
		});
	}else
		this.setOptions({
			minTime:'8:00'
		});
};
});
</script>