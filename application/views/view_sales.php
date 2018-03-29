<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="col-sm-6">

      <h4>

        <i class="fa fa-list" aria-hidden="true"></i> View Sales

        <small></small>

      </h4>

      </div>

      <div class="col-sm-6 text-right" style="padding-right: 0px;">

                <div class="form-group">

                     <a href="#" onClick="return print_click();" class="btn btn-primary margin-btm-0" style="float:right;">Print report</a>

                </div>

            </div>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-xs-12">

              <div class="box">

                <?php $delete_succ = $this->session->flashdata('update_success'); 

                  if($delete_succ) {

                ?>

                <div class="alert alert-success" role="alert">

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <strong><?php echo $this->session->flashdata('update_success'); ?></strong>

                </div>

                <?php } $delete_failed = $this->session->flashdata('update_failed'); 

                  if($delete_failed) { ?>

                 <div class="alert alert-success" role="alert">

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

                <?php } $delete_failed = $this->session->flashdata('delete_fail'); 

                  if($delete_failed) { ?>

                 <div class="alert alert-success" role="alert">

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <strong><?php echo $this->session->flashdata('delete_fail'); ?></strong>

                </div>

                <?php } ?>

                 <?php  

                  if($this->session->flashdata('delete_sale_success')) { ?>

                 <div class="alert alert-success" role="alert">

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <strong><?php echo $this->session->flashdata('delete_sale_success'); ?></strong>

                </div>

                <?php } ?>

                <?php  

                  if($this->session->flashdata('delete_sale_failed')) { ?>

                 <div class="alert alert-danger" role="alert">

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <strong><?php echo $this->session->flashdata('delete_sale_failed'); ?></strong>

                </div>

                <?php } ?>

                 <?php  

                  if($this->session->flashdata('update_sale_success')) { ?>

                 <div class="alert alert-success" role="alert">

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <strong><?php echo $this->session->flashdata('delete_sale_failed'); ?></strong>

                </div>

                <?php } ?>

                 <?php  

                  if($this->session->flashdata('update_sale_failed')) { ?>

                 <div class="alert alert-danger" role="alert">

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <strong><?php echo $this->session->flashdata('delete_sale_failed'); ?></strong>

                </div>

                <?php } ?>
                <?php  

                  if($this->session->flashdata('msg')) { ?>

                 <div class="alert alert-danger" role="alert">

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <strong><?php echo $this->session->flashdata('msg'); ?></strong>

                </div>

                <?php } ?>

                <div class="box-header">

                    <h3 class="box-title">Sales List</h3>

                    <div class="box-tools">

                        <form action="<?php echo base_url(); ?>sales_controller/search_sales" method="POST" id="searchList">

                            <div class="input-group">

                              <input type="date" name="searchtext" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>

                              <div class="input-group-btn">

                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>

                              </div>

                            </div>

                        </form>

                    </div>

                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding" id="print">

                  <table class="table text-center table-hover table-bordered">

                  <thead>

                    <tr class="text-center" bgcolor="#195E93" style="color:#fff;">

                      <th class="pad-12">Brand Name</th>

                      <th class="pad-12">Inventory Id</th>

                      <th class="pad-12">Customer Name</th>

                      <th class="pad-12">Quantity</th>

                      <th class="pad-12">Price</th>

                      <th class="pad-12">Date</th>

                    </tr>

                  </thead>

                    <?php if(!empty($select)) { ?>

                    <?php foreach ($select as $key => $row) { ?>

                    <tr class="text-center">

                      <td><?=$row->brands_id;?></td>

                      <td><?=$row->inventory_id;?></td>

                      <td><?=$row->customer_name;?></td>

                      <td><?=$row->quantity;?></td>

                      <td><?=$row->price;?></td>

                      <td><?=$row->date_created;?></td>

                      

                    <?php } } else { echo "<td colspan='7'>No Record Found</td>"; } ?>

                  </table>

                  

                </div><!-- /.box-body -->

                <div class="box-footer clearfix">
                    
                     <ul class="pagination pull-right pagination-sm"><?php foreach($links as $link) { echo "<li>".$link."</li>"; } ?></ul>

                </div>

              </div><!-- /.box -->

            </div>

        </div>

    </section>

</div>

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

<script>

window.setTimeout(function() {

    $(".alert").fadeTo(500,0).slideUp(500, function(){

        $(this).remove(); 

    });

}, 2500);



function print_click() {

/*
  var prtContent = document.getElementById("print");

  var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');

  WinPrint.document.write(prtContent.innerHTML);

  WinPrint.document.close();

  WinPrint.focus();

  WinPrint.print();

  WinPrint.close();
*/
window.print();



}



</script>