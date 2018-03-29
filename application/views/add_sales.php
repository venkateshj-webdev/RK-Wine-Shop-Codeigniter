<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="col-sm-6">
		<h4>
			<i class="fa fa-plus-square" aria-hidden="true"></i> Add Sales
			<small>Add</small>
		</h4>
	</div>
	<div class="col-sm-6">
		<?php if($this->session->flashdata('success')) { ?>
			<div class="alert alert-success" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <strong><?php echo $this->session->flashdata('success'); ?></strong>
	        </div>
		<?php } ?>
	</div>
    </section>
    <section class="content">
    	<div class="row">
				<div class="col-lg-12">
				<div class="box box-primary">
				<?php echo form_open_multipart('sales_controller/add_sales',array('id' => 'add_sales_form')); ?>

					

					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Brand Name</label>
						<div style="margin-bottom:10px;">
							<select class="form-control chosen-select" id="brand_name" name="brand_name">
								<option selected  value="">Select Brand Name</option>
								<?php if(!empty($get_brand_name)) {?>
								<?php foreach ($get_brand_name as $key => $value): ?>
									<option value="<?php echo $value->id;?>"><?php echo $value->brand_name;?></option>
								<?php endforeach ?>
								<?php } ?>
						  	</select>
						  	<?php echo form_error('brand_name'); ?>
						</div>
					</div>
					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Stock</label>
						<div style="margin-bottom:10px;">
							<select class="form-control" id="stock_name" name="stock_name">
								<option selected  value="">Select Stock</option>
						
						  	</select>
						  	<?php echo form_error('brand_name'); ?>
						</div>
					</div>
					
					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Customer name</label>
						<div style="margin-bottom:10px;">
							<input type="text" class="form-control" name="customer_name">
						</div>
					</div>
	
					
					

					<div class="from-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Price</label>
						<div style="margin-bottom:15px;">
							<input type="text" class="form-control stock_key_1" id="price" name="price">
							<?php echo form_error('price'); ?>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="from-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Quantity</label>
						<div style="margin-bottom:15px;">
							<input type="text" class="form-control stock_key_2" id="quantity" name="quantity">
							<?php echo form_error('quantity'); ?>
							<span id="quantity-available"></span>
						</div>
					</div>
					
					<div class="from-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Total</label>
						<div style="margin-bottom:15px;">
							<input type="text" class="form-control stock_key_sum" readonly="" id="total" name="total">
							<?php echo form_error('total'); ?>
						</div>
					</div>

					<div class="col-sm-12">
						<input type="submit" class="btn btn-primary" name="add-sale" value="Submit" >
					</div>
				<?php echo form_close(); ?>		
              </div>
            </div>
            </div>
            </div>
    	</div>
    </section>
</div>
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500,0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2500);
</script>
 <script type="text/javascript">
/*$( document ).ready(function() {
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
});*/
</script>