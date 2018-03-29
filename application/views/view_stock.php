<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="col-sm-3">

        <h4>

          <i class="fa fa-list" aria-hidden="true"></i> View Stock

          <small>Edit, Delete</small>

        </h4>

      </div>

            <div class="col-sm-4">

        <?php $delete_succ = $this->session->flashdata('update_success'); 

                  if($delete_succ) {

                ?>

                <div class="alert alert-success" role="alert">

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <strong><?php echo $this->session->flashdata('update_success'); ?></strong>

                </div>

                <?php } $delete_failed = $this->session->flashdata('update_failed'); 

                  if($delete_failed) { ?>

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

                <?php  $msg= $this->session->flashdata('msg'); 

                  if($msg) { ?>

                 <div class="alert alert-danger" role="alert">

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <strong><?php echo $this->session->flashdata('msg'); ?></strong>

                </div>

                <?php } ?>

      </div>

      <div class="col-sm-5 text-right" style="padding-right: 0px;">

          <div class="form-group">

            <a href="#" onClick="return printStock();" class="btn btn-primary margin-btm-0" style="float:right;">Print report</a>

          </div>

      </div>



    </section>

    <section class="content">

        <div class="row">

            <div class="col-xs-12">

              <div class="box">

                <div class="box-header" >

                    <h3 class="box-title">Stock List</h3>

                    <div class="box-tools">

                        <form action="<?php echo base_url(); ?>stock_controller/search" method="POST" id="searchList" name="submit" class="hidden-print">

                            <div class="input-group">

                              <input type="date" id="today_date" name="searchtext" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="mm/dd/yyyy" />

                              <div class="input-group-btn">

                                <button class="btn btn-sm btn-default searchList" name="submit"><i class="fa fa-search"></i></button>

                              </div>

                            </div>

                        </form>

                    </div>

                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding" id="print">

                  <table class="table table-hover table-bordered">

                  <thead>

                    <tr class="text-center" bgcolor="#195E93" style="color:#fff;">

                      <th class="text-center pad-12">Stock Name</th>

                      <th class="text-center pad-12">Name (For Reference)</th>

                      <th class="text-center pad-12">Invoice Number</th>

                      <th class="text-center pad-12">Invoice Date</th>

                      <th class="text-center pad-12">No of Cases</th> 
                                     
                      <th class="text-center pad-12">No of Bottles</th>

                      <th class="text-center pad-12">Unit Rate</th>

                      <th class="text-center pad-12">Total</th>

                      <th class="text-center pad-12">Sale Price</th>

                      <th class="text-center pad-12">Received Date</th>

                     <th class="text-center pad-12">Damage Bottles</th>

                     <th class="text-center pad-12">Damage Description</th>

                      <th class="text-center pad-12" style="width:125px;">Actions</th>

                    </tr>
                    
                  </thead>

                    <?php if(!empty($result)) { ?>

                    <?php foreach($result as $row) { ?>

                    <tr class="text-center">

                      <td><?=$row->brands_id;?></td>

                      <td><?=$row->name;?></td>

                      <td><?=$row->invoice_number;?></td>

                      <td><?=$row->invoice_date;?></td>

                      <td><?=$row->no_of_cases;?></td>

                      <td><?=$row->btls_inventory;?></td>

                      <td><?=$row->unit_rate?></td>

                      <td><?=$row->total;?></td>

                      <td><?=$row->sale_price;?></td>

                      <td><?=$row->date_created;?></td>

                      <td><?=$row->damage_bottles;?></td>

                      <td><?=$row->description;?></td>

                      <td class="text-center">

                      <?php if($this->session->userdata('logged_in')) {

                      $session_dat = $this->session->userdata('logged_in');

                      $users_role_id = $session_dat['users_role_id'];

                      $is_active     = $session_dat['is_active'];

                      $is_delete     = $session_dat['is_delete'];



                      } ?>

                          <?php if($users_role_id == 1) { ?>
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary">Action</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" style="min-width: 85px;">
                              <li><a class="btn text-danger" href="<?php echo base_url().'stock_controller/edit_stock/'.$row->id; ?>"><i class="fa fa-pencil" style="font-size:10px;"></i> Edit</a></li>
                              <li><a class="btn text-danger deleteUser" href="<?php echo base_url().'stock_controller/delete_stock/'.$row->id;?>" onClick="return doconfirm();"><i class="fa fa-trash" style="font-size:10px;"></i> Delete</a></li>
                            </ul>
                          </div>


                      </td>

                      <?php } elseif ($users_role_id != 1) { ?>

                         <div class="btn-group disabled">
                            <button type="button" class="btn btn-primary disabled">Action</button>
                            <button type="button" class="btn btn-primary dropdown-toggle disabled" data-toggle="dropdown">
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu disabled" role="menu" style="min-width: 85px;">
                              <li><a class="btn text-danger disabled" href="" ><i class="fa fa-pencil" style="font-size:10px;"></i> Edit</a></li>
                              <li><a class="btn text-danger deleteUser disabled" href=""><i class="fa fa-trash" style="font-size:10px;"></i> Delete</a></li>
                            </ul>
                          </div>

                      <?php } ?>

                    </tr>

                    <?php } } else { echo "<td colspan='15' class='text-center'>No Record Found</td>"; } ?>

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





/*function SetDate() {
  var date = new Date();
  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();

  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;

  var today = year + "-" + month + "-" + day;

  document.getElementById('today_date').value = today;
}*/
function printStock() {
    window.print();
}
</script>