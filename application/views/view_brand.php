<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="col-sm-3">
      <h4>
        <i class="fa fa-list" aria-hidden="true"></i> View Brands
        <small></small>
      </h4>
      </div>
      <div class="col-sm-4">
        <?php if($this->session->flashdata('update_success')) {?>
        <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong><?php echo $this->session->flashdata('update_success'); ?></strong>
        </div>
      <?php } ?>
      <?php if($this->session->flashdata('update_failed')) {?>
        <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong><?php echo $this->session->flashdata('update_failed'); ?></strong>
        </div>
      <?php } ?>
       <?php if($this->session->flashdata('delete_success')) {?>
        <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong><?php echo $this->session->flashdata('delete_success'); ?></strong>
        </div>
      <?php } ?>
       <?php if($this->session->flashdata('delete_failed')) {?>
        <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong><?php echo $this->session->flashdata('delete_failed'); ?></strong>
        </div>
      <?php } ?>
      <?php if($this->session->flashdata('msg')) {?>
        <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong><?php echo $this->session->flashdata('msg'); ?></strong>
        </div>
      <?php } ?>
      </div>
      <div class="col-sm-5 text-right" style="padding-right: 0px;">
                <div class="form-group">
                     <a href="#" onClick="return print_click();" class="btn btn-primary margin-btm-0" style="float:right;">Print report</a>
                </div>
            </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Brands List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url(); ?>brand_controller/search_brand_item" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchtext" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search Brand Name"/>
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
                      <th class="pad-12">Id</th>
                      <th class="pad-12">Users Name</th>
                      <th class="pad-12">Brand Number</th>
                      <th class="pad-12">brand Name</th>
                      <th class="pad-12">Product Type</th>
                     <!--  <th class="pad-12">Pack Type</th> -->
                      <th class="pad-12">Size</th>
                      <th class="text-center pad-12">Actions</th> 
                    </tr>
                  </thead>
                    <?php if(!empty($select)) { ?>
                    <?php foreach ($select as $key => $row) { ?>
                    <tr class="text-center">
                      <td><?=$row->id;?></td>
                      <td><?=$row->full_name;?></td>
                      <td><?=$row->brand_number;?></td>
                      <td><?=$row->brand_name;?></td>
                      <td><?=$row->product_type;?></td>
                      <!-- <td><?=$row->pack_type;?></td> -->
                      <td><?=$row->size;?></td>
                      <td>
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
                              <li><a class="btn btn-xs" href="<?php echo base_url().'brand_controller/edit_brand/'.$row->id; ?>"><i class="fa fa-pencil" style="font-size:10px;"></i>Edit</a></li>
                              <li> <a class="btn btn-xs  deleteUser" href="<?php echo base_url().'brand_controller/delete_brand/'.$row->id;?>" onClick="return doconfirm();"><i class="fa fa-trash" style="font-size:10px;"></i>Delete</a></li>                             
                            </ul>
                          </div>
                          <?php }  elseif ($users_role_id != 1) { ?>
                          <div class="btn-group disabled">
                            <button type="button" class="btn btn-primary disabled">Action</button>
                            <button type="button" class="btn btn-primary dropdown-toggle disabled" data-toggle="dropdown">
                            <span class="caret disabled"></span>
                            </button>
                            <ul class="dropdown-menu disabled" role="menu" style="min-width: 85px;">         
                              <li><a class="btn btn-xs disabled"><i class="fa fa-pencil" style="font-size:10px;"></i>Edit</a></li>
                              <li> <a class="btn btn-xs  deleteUser disabled"><i class="fa fa-trash" style="font-size:10px;"></i>Delete</a></li>               
                            </ul>
                          </v>
                        </tr>
                    <?php } } } else { echo "<td colspan='7'>No Record Found</td>"; } ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
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
  var prtContent = document.getElementById("print");
  var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
  WinPrint.document.write(prtContent.innerHTML);
  WinPrint.document.close();
  WinPrint.focus();
  WinPrint.print();
  WinPrint.close();
}

</script>