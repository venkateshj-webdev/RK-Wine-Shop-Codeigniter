<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<div class="col-sm-6">
		<h4>
			<i class="fa fa-plus-square" aria-hidden="true"></i> Add New Brand
			<small>Add</small>
		</h4>
	</div>
	<div class="col-sm-6 position">
		<?php if($this->session->flashdata('brand_success')) { ?>
			<div class="alert alert-success" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <strong><?php echo $this->session->flashdata('brand_success'); ?></strong>
	        </div>
		<?php } ?>
		<?php if($this->session->flashdata('brand_fail')) { ?>
			<div class="alert alert-danger" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <strong><?php echo $this->session->flashdata('brand_fail'); ?></strong>
	        </div>
		<?php } ?>
		<?php if($this->session->flashdata('brand_exist')) { ?>
			<div class="alert alert-danger" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <strong><?php echo $this->session->flashdata('brand_exist'); ?></strong>
	        </div>
		<?php } ?>
	</div>
    </section>
    <section class="content">
    	<div class="row">
            <div class="clearfix" style="margin-bottom: 15px;"></div>
				<div class="col-lg-12">
				<?php echo form_open_multipart('brand_controller/add_brand'); ?>
				<div class="box box-primary">
					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Brand Number</label>
						<div style="margin-bottom:10px;">
							<input type="text" class="form-control" name="brand_number">
							<?php echo form_error('brand_number'); ?>
						</div>
					</div>
				
					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Brand Name</label>
						<div style="margin-bottom:10px;">
							<input type="text" class="form-control" name="brand_name">
							<?php echo form_error('brand_name'); ?>
						</div>
					</div>
			
					<div class="from-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Product Type</label>
						<div style="margin-bottom:10px;">
							<select class="form-control" id="select-type" name="product_type">
								<option selected disabled>Select Product type</option>
						    	<option value="Beer">Beer</option>
						    	<option value="Iml">IML</option>
						    	<option value="Wine">Wine</option>
						  	</select>
						  	<?php echo form_error('product_type'); ?>
						</div>
					</div>

					<!-- <div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Pack Type</label>
						<div style="margin-bottom:10px;">
							<select class="form-control" id="sel1" name="pack_type">
								<option selected disabled>Select pack Type</option>
						    	<option>G</option>
						    	<option>P</option>
						  	</select>
						  	<?php echo form_error('pack_type'); ?>
						</div>
					</div> -->

					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label cls-center">Sizes</label>
						<div style="margin-bottom:10px;">
							<div>
								<select class="form-control" id="sizes-iml" name="sizes">
									<option selected disabled>Select Sizes</option>
						  	</select>
						  	<?php echo form_error('sizes'); ?>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-12">
						<input type="submit" class="btn btn-primary" name="add-stock" value="Submit" >
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
    $(".alert").fadeTo(1000,0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2500);
</script>
<script>
	$(document).ready(function() {
        $('#select-type').on('change',function() {
            var myVal = $(this).val();
            if(myVal === "Iml") {
				$("#sizes-iml").append($('<option></option>').attr("value", '1000 - litre').text('1000 - litre'));
				$("#sizes-iml").append($('<option></option>').attr("value", '750 - Qts').text('750 - Qts'));
				$("#sizes-iml").append($('<option></option>').attr("value", '375 - Pts').text('375 - Pts'));
				$("#sizes-iml").append($('<option></option>').attr("value", '180 - Nip').text('180 - Nip'));
				$("#sizes-iml").append($('<option></option>').attr("value", '90 - Dip').text('90 - Dip'));
				
				$("#sizes-iml").find('option[value="650"]').remove();
				$("#sizes-iml").find('option[value="350"]').remove();
				$("#sizes-iml").find('option[value="500 - Tin"]').remove();
				$("#sizes-iml").find('option[value="330 - Tin"]').remove();
				$("#sizes-iml").find('option[value="250 - Tin"]').remove();

				$("#sizes-iml").find('option[value="187 - Split"]').remove();
				$("#sizes-iml").find('option[value="375 - Half-Bottle"]').remove();
				$("#sizes-iml").find('option[value="750 - Bottle"]').remove();
            } 
            else if(myVal === "Beer") {
                $("#sizes-iml").append($('<option></option>').attr("value", '650').text('650'));
                $("#sizes-iml").append($('<option></option>').attr("value", '350').text('350'));
				$("#sizes-iml").append($('<option></option>').attr("value", '500 - Tin').text('500 - Tin'));
                $("#sizes-iml").append($('<option></option>').attr("value", '330 - Tin').text('330 - Tin'));
				$("#sizes-iml").append($('<option></option>').attr("value", '250 - Tin').text('250 - Tin'));

				$("#sizes-iml").find('option[value="1000 - litre"]').remove();
                $("#sizes-iml").find('option[value="750 - Qts"]').remove();
                $("#sizes-iml").find('option[value="375 - Pts"]').remove();
                $("#sizes-iml").find('option[value="180 - Nip"]').remove();
                $("#sizes-iml").find('option[value="90 - Dip"]').remove();

				$("#sizes-iml").find('option[value="187 - Split"]').remove();
				$("#sizes-iml").find('option[value="375 - Half-Bottle"]').remove();
				$("#sizes-iml").find('option[value="750 - Bottle"]').remove();
				
            }
			else if(myVal == "Wine") {
				$("#sizes-iml").append($('<option></option>').attr("value", '187 - Split').text('187 - Split'));
				$("#sizes-iml").append($('<option></option>').attr("value", '375 - Half-Bottle').text('375 - Half-Bottle'));
				$("#sizes-iml").append($('<option></option>').attr("value", '750 - Bottle').text('750 - Bottle'));

				$("#sizes-iml").find('option[value="650"]').remove();
				$("#sizes-iml").find('option[value="350"]').remove();
				$("#sizes-iml").find('option[value="500 - Tin"]').remove();
				$("#sizes-iml").find('option[value="330 - Tin"]').remove();
				$("#sizes-iml").find('option[value="250 - Tin"]').remove();

				$("#sizes-iml").find('option[value="1000 - litre"]').remove();
                $("#sizes-iml").find('option[value="750 - Qts"]').remove();
                $("#sizes-iml").find('option[value="375 - Pts"]').remove();
                $("#sizes-iml").find('option[value="180 - Nip"]').remove();
                $("#sizes-iml").find('option[value="90 - Dip"]').remove();
			}
        }); 
    });
</script> 