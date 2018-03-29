<?php
	$id              = '';
	$username        = '';
	$password        = '';
	$first_name      = '';
	$last_name       = '';
	$role            = '';
	$users_role_id   = '';

	$sale_price     = '';
	if(!empty($select)) {
	foreach ($select as $info) {
			$id             = $info->id;
			$username       = $info->username;
			$password       = $info->password;
			$first_name     = $info->first_name;
			$last_name      = $info->last_name;
			$role           = $info->role;
			$users_role_id  = $info->users_role_id;
		}
	}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>
		<i class="fa fa-plus-square" aria-hidden="true"></i> Edit User
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
				  	<?php echo form_open_multipart('users/update_user'); ?>
				  	<div class="form-group margin-btm-20 col-sm-4">
						<label for="" class="control-label col-sm-12 pad-right-0">id</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="id" value="<?=$id;?>">
						</div>
					</div>

				  	<div class="form-group margin-btm-20 col-sm-4 hidden-lg hidden-md hidden-sm hidden-xs">
						<label for="" class="control-label col-sm-12 pad-right-0">UserName</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="username" value="<?=$username;?>">
						</div>
					</div>

					<div class="form-group margin-btm-20 col-sm-4">
						<label for="" class="control-label col-sm-12 pad-right-0">Password</label>
						<div class="col-sm-12">
							<input type="password" class="form-control" name="password" value="<?=$password;?>">
							<?php echo form_error('password'); ?>
						</div>
					</div>

					<div class="form-group margin-btm-20 col-sm-4">
						<label for="" class="control-label col-sm-12 pad-right-0">First name</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="first_name" value="<?=$first_name;?>">
							<?php echo form_error('first_name'); ?>
						</div>
					</div>

					<div class="form-group margin-btm-20 col-sm-4">
						<label for="" class="control-label col-sm-12 pad-right-0">Last Name</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="last_name" value="<?=$last_name;?>">
							<?php echo form_error('last_name'); ?>
						</div>
					</div>

					<div class="from-group margin-btm-20 col-sm-4">
						<label for="" class="control-label col-sm-12 pad-right-0">Role</label>
						<div class="col-sm-12">
							<select class="form-control" id="sel1" name="role">
						    	<option value="<?php echo $role; ?>"><?php echo $role; ?></option>
						    	<option value="" class="divider"></option>
								<option value="admin">Admin</option>
								<option value="manager">Manager</option>
								<option value="employee">Employee</option>
						    </select>
						</div>
					</div>

					<div class="from-group margin-btm-20 col-sm-4">
						<label for="" class="control-label col-sm-12 pad-right-0">User Role Id</label>
						<div class="col-sm-12">
							<select class="form-control" id="sel1" name="users_role_id">
						    	<option value="<?php echo $users_role_id; ?>"><?php echo $users_role_id; ?></option>
						    	<option value="" class="divider"></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
						    </select>
						</div>
					</div>					
					<div class="col-sm-12">
						<input type="submit" class="btn btn-primary btn-left-10" name="update_user" value="Submit">
					</div>
					<?php echo form_close(); ?>		
	            </div>
            </div>
    	</div>
    </section>
</div>