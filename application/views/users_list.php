<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i> User Management

      </h1>

    </section>

    <div class="col-sm-offset-6 col-sm-6 position3">  

	    <?php $update_succ = $this->session->flashdata('update_success'); 

	    if($update_succ) {

	    ?>

	    <div class="alert alert-success" role="alert">

	   		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

	    	<strong><?php echo $this->session->flashdata('update_success'); ?></strong>

	    </div>

	    <?php } $update_failed = $this->session->flashdata('delete_failed'); 

	    if($update_failed) { ?>

	    	<div class="alert alert-danger" role="alert">

	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

	    <strong><?php echo $this->session->flashdata('update_failed'); ?></strong>

	    </div>

	    <?php } ?>

	    <?php $delete_succ = $this->session->flashdata('delete_success'); 

	    if($delete_succ) {

	    ?>

	    <div class="alert alert-success" role="alert">

	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

	    	<strong><?php echo $this->session->flashdata('delete_success'); ?></strong>

	    </div>

	    <?php } $delete_failed = $this->session->flashdata('delete_failed'); 

	    if($delete_failed) { ?>

	    <div class="alert alert-danger" role="alert">

	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

	    	<strong><?php echo $this->session->flashdata('delete_failed'); ?></strong>

	    </div>

	    <?php } ?>



	    <?php $success = $this->session->flashdata('add_success');

	    if($success) {

	    ?>

	    	<div class="alert alert-success alert-dismissable">

	    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

	    <?php echo $this->session->flashdata('add_success'); ?>                    

	    </div>

	    <?php } ?>

    </div>

    <section class="content">

        <div class="row">

            <div class="col-sm-12 text-right">

                <div class="form-group">

                <?php if($this->session->userdata('logged_in')) {

                      $session_dat = $this->session->userdata('logged_in');

                      $users_role_id = $session_dat['users_role_id'];

                      $is_active     = $session_dat['is_active'];

                      $is_delete     = $session_dat['is_delete'];



                      } ?>

                    <?php if($users_role_id == 1) { ?>

                    <a class="btn btn-primary" href="<?php echo base_url(); ?>users/addNewUser"><i class="fa fa-plus"></i> Add New</a>

                    <?php } elseif($users_role_id != 1) {?>

                    <a class="btn btn-primary disabled" href=""><i class="fa fa-plus"></i> Add New</a>

                    <?php } ?>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-xs-12">

              <div class="box">

                <div class="box-header">

                    <h3 class="box-title">Users List</h3>

                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding">

                  <table class="table table-hover table-bordered">

                  <thead>                  
                  
                    <tr bgcolor="#195E93" style="color:#fff;">

                      <th class="text-center pad-12">Id</th>

                      <th class="text-center pad-12">username</th>

                      <th class="text-center pad-12">First Name</th>

                      <th class="text-center pad-12">Last Name</th>

                      <th class="text-center pad-12">User Role Id</th>

                      <th class="text-center pad-12">Date Created</th>

                      <!-- <th class="text-center">Actions</th>  -->
                    </thead>

                    </tr>

                     <?php if(!empty($select)) {

                      foreach ($select as $key => $row) { ?> 

                    <tr class="text-center">

                      <td><?=$row->id;?></td>

                      <td><?=$row->username;?></td>

                      <td><?=$row->first_name;?></td>

                      <td><?=$row->last_name;?></td>

                      <td><?=$row->users_role_id; ?></td>

                      <td><?=$row->date_created;?></td>

                      <!-- <td class="text-center">  

                          <a class="btn btn-xs btn-info" href="<?php echo base_url().'users/edit_user/'.$row->id; ?>"><i class="fa fa-pencil"></i></a> 

                          <<a class="btn btn-xs btn-danger deleteUser" href="<?php echo base_url().'users/delete_user/'.$row->id; ?>" data-userid=""><i class="fa fa-trash" onClick="return doconfirm();"></i></a>

                      </td> -->

                    </tr>

                    <?php } } else { echo "<td colspan='5'>No Data Found</td>"; } ?>

                  </table>

                  

                </div><!-- /.box-body -->

                <div class="box-footer clearfix">

                </div>

              </div><!-- /.box -->

            </div>

        </div>

    </section>

</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>

<script>

window.setTimeout(function() {

    $(".alert").fadeTo(1000,0).slideUp(500, function(){

        $(this).remove(); 

    });

}, 2500);

</script>

<script>

function doconfirm()

{

    job=confirm("Are you sure to delete permanently?");

    if(job!=true)

    {

        return false;

    }

}

</script>



