<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="col-sm-12">
          <h4>
            <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
            <small>Control panel</small>
          </h4>
        </div>
    </section>
  <div class="col-sm-6 col-sm-offset-6 position3">
    <?php $success = $this->session->flashdata('success'); 
      if($success) {
      ?>
        <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong><?php echo $this->session->flashdata('success'); ?></strong>
        </div>
    <?php } ?>
  </div>
    
    <div class="clearfix"></div>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3 style="margin: 50px 0px;"> </h3>
                  <p>Add Stock</p>
                </div>
                <div class="icon">
                  <i class="fa fa-plus-square-o"></i>
                </div>
                <a href="<?php echo base_url();?>stock_controller/add_stock" class="small-box-footer">Add Stock <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3 style="margin: 50px 0px;"> </h3>
                  <p>View Stock</p>
                </div>
                <div class="icon">
                  <i class="fa fa-align-justify"></i>
                </div>
                <a href="<?php echo base_url();?>stock_controller/view_stock" class="small-box-footer">View Stock <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3 style="margin: 50px 0px;"> </h3>
                  <p>New User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url(); ?>users/addNewUser" class="small-box-footer">New User<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3 style="margin: 50px 0px;"> </h3>
                  <p>Reports</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?php echo base_url(); ?>report_controller/view_reports" class="small-box-footer">Reports<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>
    </section>
</div>
<script type="text/javascript">
setTimeout(function() {
    $(".alert").fadeTo(500,0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2500);

</script>