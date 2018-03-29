<?php
	$id             = '';
	$name           = '';
	$no_of_bottles  = '';
	$unit_rate      = '';
	$total          = '';
	$sale_price     = '';

	if(!empty($select)) {
	foreach ($select as $info) {
			$id             = $info->id;
			$brands_id      = $info->brands_id;
			$name           = $info->name;
			$invoice_number = $info->invoice_number;
			$invoice_date   = $info->invoice_date;
			$no_of_cases    = $info->no_of_cases;
			$no_of_bottles  = $info->no_of_bottles;
			$unit_rate      = $info->unit_rate;
			$total          = $info->total;
			$sale_price     = $info->sale_price;
			$description    = $info->description;
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

            	<?php if($this->session->flashdata('value_underflow')) {?>
            	<div class="alert alert-danger alert-dismissable">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                	<?php echo $this->session->flashdata('value_underflow'); ?>                    
            	</div>
            	<?php } ?>

            	<?php if($this->session->flashdata('stock_zero')) {?>
            	<div class="alert alert-danger alert-dismissable">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                	<?php echo $this->session->flashdata('value_underflow'); ?>                    
            	</div>
            	<?php } ?>

	             <div class="clearfix" style="margin-bottom: 15px;"></div>
				  	<?php echo form_open_multipart('stock_controller/update_stock'); ?>
				  	<div class="form-group margin-btm-20 col-sm-3 hidden-lg hidden-md hidden-sm hidden-xs">
						<label for="" class="control-label col-sm-12 pad-right-0">ID</label>
						<div class="col-sm-12">
							<input type="text" class="form-control disabled" name="id" value="<?=$id;?>">
						</div>
					</div>

					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label col-sm-12 pad-right-0">Name</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="name" value="<?=$name;?>">
							<?php echo form_error('brand_number'); ?>
						</div>
					</div>
					<!-- New Fields -->
					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Invoice Number</label>
						<div>
							<input type="text" class="form-control" id="" value="<?=$invoice_number;?>" name="invoice_number">
							<?php echo form_error('invoice_number'); ?>
						</div>
					</div>

					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Invoice Date</label>
						<div class="input-group date">
							<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
							<input type="text" class="form-control pull-right" name="invoice_date" value="<?=$invoice_date;?>" id="datetimepicker2">
						</div>
						<?php echo form_error('invoice_date'); ?>
					</div>
					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">No of Cases</label>
						<div>
							<input type="text" class="form-control" id="" value="<?=$no_of_cases;?>" name="no_of_cases">
							<?php echo form_error('no_of_cases'); ?>
						</div>
					</div>

					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label col-sm-12 pad-right-0">No of Bottles</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="no_of_bottles" value="<?=$no_of_bottles;?>">
							<?php echo form_error('no_of_bottles'); ?>
						</div>
					</div>

					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Unit rate</label>
						<div>
							<input type="text" class="form-control" name="unit_rate" value="<?=$unit_rate;?>">
						  	<?php echo form_error('unit_rate'); ?>
						</div>
					</div>
					
					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Total</label>
						<div>
							<input type="text" class="form-control" name="total" value="<?=$total;?>">
							<?php echo form_error('total'); ?>
						</div>
					</div>
					<div class="from-group margin-btm-20 col-sm-3">
						<label for="" class="control-label col-sm-12 pad-right-0">Sale Price</label>
						<div>
							<input type="text" class="form-control" name="sale_price" value="<?=$sale_price;?>">
							<?php echo form_error('sale_price'); ?>
						</div>
					</div>

					<div class="clearfix"></div>
					<div class="from-group margin-btm-20 col-sm-12">
						<div class="checkbox">
							<label data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
							<input type="checkbox"/> <strong>Damage</strong>
						</label>
						</div>
						<div id="collapseOne" aria-expanded="false" class="collapse">
						
						<div class="form-group margin-btm-20 col-sm-3 hidden-lg hidden-md hidden-sm hidden-xs">
							<label for="" class="control-label col-sm-12 pad-right-0">Brands Id</label>
							<div class="col-sm-12">
								<input type="text" class="form-control disabled" name="brands_id" value="<?=$brands_id;?>">
							</div>
						</div>
							<div>
								<div class="from-group margin-btm-20 col-sm-3">
									<label for="" class="control-label">No_of_Bottles(Damaged)</label>
									<div>
										<input type="text" class="form-control" name="damage_bottles" value="">		
									</div>
								</div>
								<div class="from-group margin-btm-20 col-sm-3">
									<label for="" class="control-label pad-right-0">Description</label>
									<div>
										<textarea name="description" class="form-control" id="" value="<?=$description;?>" cols="30" rows="4" style="resize: none;"><?=$description;?></textarea>		
									</div>
								</div>
							</div>
						</div>
					</div>
				
					<div class="col-sm-12" style="margin-top: 20px;">
						<input type="submit" class="btn btn-primary btn-left-10" name="update-stock" value="Submit">
					</div>
					<?php echo form_close(); ?>		
	              </div>
            </div>
    	</div>
    </section>
</div>