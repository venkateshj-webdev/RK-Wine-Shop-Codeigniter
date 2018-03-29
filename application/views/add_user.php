<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-plus-square" aria-hidden="true"></i> Add New User
        
        <small>Add User</small>

      </h1>

    </section>

    

    <section class="content">

    

        <div class="row">

            <!-- left column -->

            <div class="col-sm-12">

              <!-- general form elements -->  

                <div class="box box-primary">

                    <div class="box-header">

                        <h3 class="box-title">Enter User Details</h3>

                    </div><!-- /.box-header -->

                    <!-- form start -->

                    

                    <form role="form" id="addUser" action="<?php echo base_url() ?>users/addNewUser" method="post" role="form" name="myform">

                        <div class="box-body">

                            <div class="row">

                                <div class="col-md-4">                                

                                    <div class="form-group">

                                        <label for="user name">User Name</label>

                                        <input type="text" class="form-control required" name="username" maxlength="128">

                                        <?php echo form_error('username'); ?>

                                    </div>

                                </div>

                                <div class="col-md-4">                                

                                    <div class="form-group">

                                        <label for="password">Password</label>

                                        <input type="password" class="form-control" name="password">

                                        <?php echo form_error('password'); ?>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label for="cpassword">Confirm Password</label>

                                        <input type="password" class="form-control" name="passconf">

                                        <?php echo form_error('passconf'); ?>

                                    </div>

                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-4">                                

                                    <div class="form-group">

                                        <label for="fname">First Name</label>

                                        <input type="text" class="form-control required"  name="fname" maxlength="128">

                                        <?php echo form_error('fname'); ?>

                                    </div>

                                </div>

                                <div class="col-md-4">                                

                                    <div class="form-group">

                                        <label for="Lname">Last Name</label>

                                        <input type="text" class="form-control required" name="lname" maxlength="128">

                                        <?php echo form_error('lname'); ?>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label for="Role">Role</label>

                                        <select name="manage_role" class="form-control" id="role">
                                            
                                            <option selected disabled>Select Role</option>

                                            <option value="1">Admin</option>

                                            <option value="2">Manager</option>

                                            <option value="3">Employee</option>

                                        </select>

                                        <?php echo form_error('manage_role'); ?>

                                    </div>

                                </div>

                                <div class="clearfix"></div>

                            </div><!-- /.box-body -->

                            <div class="clearfix"></div>

                        <div class="box-footer">

                            <input type="submit" class="btn btn-primary" value="Submit" />

                            <input type="reset" class="btn btn-default" value="Reset" />

                        </div>

                    </form>

                </div>

            </div>

        </div>    

        <div class="col-xs-4">

                <?php $fail = $this->session->flashdata('add_failed');

                if($fail) {

                ?>

                <div class="alert alert-danger alert-dismissable">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <?php echo $this->session->flashdata('add_failed'); ?>                    

                </div>

                <?php } ?>

            </div>

    </section>

    

</div>

<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>

<script>
 /* $(document).ready(function(e) {
    $("#role").change(function(){
        var textval = $(":selected",this).val(); 
        $('input[name=role_id]').val(textval);
        myform.role_id.disabled=(!textval)?false:true;
    })
});*/
</script>