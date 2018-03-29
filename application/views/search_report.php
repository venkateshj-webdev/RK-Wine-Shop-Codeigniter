<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-list" aria-hidden="true"></i> View Stock
        <small>Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                  <a href="#" onClick="return print_click();" class="btn btn-primary" style="float:right; margin-bottom: 10px;">Print report</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
          
                <div class="box-header" >
                    <h3 class="box-title">Search</h3>
                    <div class="box-tools">

                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding" id="print">
                  <table class="table table-hover">
                    <tr class="text-center">
                      <th>No</th>
                      <th>Brand Number</th>
                      <th>Brand Name</th>
                      <th>Product Type</th>
                      <th>Pack Type</th>
                      <th>Sizes</th>
                      <th>Quantity(Cases Delivered)</th>
                      <th>Qty(Bottles Delivered)</th>
                      <th>Unit Rate</th>
                      <th>Bit Rate</th>
                      <th>Total</th>
                      <th>Sale Price</th>
                      <th>Received Date</th>
                      <!-- <th class="text-center">Actions</th> -->
                    </tr>
                    <?php if(!empty($result)) { ?>
                    <?php foreach($result as $row) { ?>
                    <tr>
                      <td><?=$row->id;?></td>
                      <td><?=$row->brand_number;?></td>
                      <td><?=$row->brand_name;?></td>
                      <td><?=$row->product_type;?></td>
                      <td><?=$row->pack_type?></td>
                      <td><?=$row->sizes;?></td>
                      <td><?=$row->quantity_cases?></td>
                      <td><?=$row->qty_bottles;?></td>
                      <td><?=$row->unit_rate;?></td>
                      <td><?=$row->bit_rate;?></td>
                      <td><?=$row->total;?></td>
                      <td><?=$row->sale_price;?></td>
                      <td><?=$row->date_created;?></td>
                      <!--<td class="text-center">
                      <?php if($this->session->userdata('logged_in')) {
                      $session_dat = $this->session->userdata('logged_in');
                      $users_role_id = $session_dat['users_role_id'];
                      $is_active     = $session_dat['is_active'];
                      $is_delete     = $session_dat['is_delete'];

                      } ?>
                          <?php if($users_role_id == 1) { ?>
                          <a class="btn btn-xs btn-info" href="<?php echo base_url().'sales/edit_sale/'.$row->id; ?>"><i class="fa fa-pencil" style="font-size:10px;"></i></a>
                          <a class="btn btn-xs btn-danger deleteUser" href="<?php echo base_url().'sales/delete_sale/'.$row->id;?>" onClick="return doconfirm();"><i class="fa fa-trash" style="font-size:10px;"></i></a>
                      </td>
                      <?php } elseif ($users_role_id == 2) { ?>
                        <a class="btn btn-xs btn-info disabled" href=""><i class="fa fa-pencil" style="font-size:10px;"></i></a>
                          <a class="btn btn-xs btn-danger deleteUser disabled" href="" onClick="return doconfirm();"><i class="fa fa-trash" style="font-size:10px;"></i></a>
                      <?php } ?> -->
                    </tr>
                    <?php } } else { echo "<td colspan='14'>No Record Found</td>"; } ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <!-- <ul class="pagination pull-right pagination-sm"><?php foreach($links as $link) { echo "<li>".$link."</li>"; } ?></ul> -->
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