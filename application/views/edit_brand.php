<?php

	$id             = '';

	$brand_number   = '';

	$brand_name     = '';

	$product_type   = '';

	// $pack_type     = '';

	$size   = '';

	if(!empty($select)) {

	foreach ($select as $info) {

			$id               = $info->id;

			$brand_number     = $info->brand_number;

			$brand_name       = $info->brand_name;

			$product_type     = $info->product_type;

			// $pack_type        = $info->pack_type;

			$size             = $info->size;

		}

	}

?>

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

	<h1>

		<i class="fa fa-plus-square" aria-hidden="true"></i> Edit Brand

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

				  	<?php echo form_open_multipart('brand_controller/update_brand'); ?>

				  	<div class="form-group margin-btm-20 col-sm-4 hidden-lg hidden-md hidden-sm hidden-xs">

						<label for="" class="control-label col-sm-12 pad-right-0">ID</label>

						<div class="col-sm-12">

							<input type="text" class="form-control disabled" name="id" value="<?=$id;?>">

						</div>

					</div>



					<div class="form-group margin-btm-20 col-sm-3">

						<label for="" class="control-label col-sm-12 pad-right-0">Brand Number</label>

						<div class="col-sm-12">

							<input type="text" class="form-control" name="brand_number" value="<?=$brand_number;?>">

							<?php echo form_error('brand_number'); ?>

						</div>

					</div>

				

					<div class="form-group margin-btm-20 col-sm-3">

						<label for="" class="control-label col-sm-12 pad-right-0">Brand Name</label>

						<input type="text" class="form-control" name="brand_name" value="<?=$brand_name;?>">

						<?php echo form_error('brand_name'); ?>

					</div>



					<div class="form-group margin-btm-20 col-sm-3">

						<label for="" class="control-label col-sm-12 pad-right-0">Product Type</label>

						<div class="col-sm-12">

							<select name="product_type" id=""  class="form-control">

								<option value="<?=$product_type;?>"><?=$product_type;?></option>

								<option value="" disabled>Select to Change</option>

								<option>Beer</option>

								<option>Iml</option>

								<option>Wine</option>

							</select>

							<?php echo form_error('product_type'); ?>

						</div>

					</div>


<!-- 
					<div class="form-group margin-btm-20 col-sm-4">

						<label for="" class="control-label col-sm-12 pad-right-0">Pack Type</label>

						<div class="col-sm-12">

							<select name="pack_type" id=""  class="form-control">

								<option value="<?=$pack_type;?>"><?=$pack_type;?></option>

								<option value="" disabled>Select to Change</option>

								<option>G</option>

								<option>P</option>

							</select>

							<?php echo form_error('pack_type'); ?>

						</div>

					</div> -->

					<div class="form-group margin-btm-20 col-sm-3">

						<label for="" class="control-label col-sm-12 pad-right-0">Size</label>

						<div class="col-sm-12">

							<select name="size" id=""  class="form-control">

								<option value="<?=$size;?>"><?=$size;?></option>

								<option value="" disabled>Select to Change</option>

									<option>750 - litre</option>

									<option>650 -Qts</option>

									<option>375 Pts</option>

									<option>180 - Nip</option>

									<option>90 -Dip</option>

									<option>650 - Big</option>

									<option>350 - Small</option>

									<option>Split</option>

									<option>Half-Bottle</option>

							</select>

							<?php echo form_error('size'); ?>

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

