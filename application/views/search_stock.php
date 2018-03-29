<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-list" aria-hidden="true"></i> Search Result

        <small></small>

      </h1>

    </section>

    <section class="content">

        <div class="row">
            
            <div class="col-sm-6">
                <a href="<?php echo base_url();?>stock_controller/view_stock" class="btn btn-primary" style="margin-bottom: 10px;"><i class="fa fa-angle-double-left" ></i> Back</a>
            </div>


            <div class="col-sm-6 text-right">

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

                  <table class="table table-hover table-bordered">

                  <thead>

                    <tr class="text-center" bgcolor="#195E93" style="color:#fff;">

                      <th class="pad-12 text-center">Brand Id</th>

                      <th class="pad-12 text-center">Name</th>

                      <th class="pad-12 text-center">Invoice Number</th>

                      <th class="pad-12 text-center">Invoice Date</th>

                      <th class="pad-12 text-center">No of Cases</th>

                      <th class="pad-12 text-center">No of bottles</th>

                      <th class="pad-12 text-center">Unit Rate</th>

                      <th class="pad-12 text-center">Total</th>

                      <th class="pad-12 text-center">Sale Price</th>

                      <th class="pad-12 text-center">Damage</th>

                      <th class="pad-12 text-center">Damage Description</th>

                      <th class="pad-12 text-center">Received Date</th>

                    </tr>

                  </thead>
                  
                    <?php if(!empty($result)) { ?>

                    <?php foreach($result as $row) { ?>

                    <tr>

                     <td><?=$row->brands_id;?></td>

                      <td><?=$row->name;?></td>

                      <td><?=$row->invoice_number;?></td>

                      <td><?=$row->invoice_date;?></td>

                      <td><?=$row->no_of_cases;?></td>

                      <td><?=$row->btls_inventory;?></td>

                      <td><?=$row->unit_rate?></td>

                      <td><?=$row->total;?></td>

                      <td><?=$row->sale_price;?></td>

                      <td><?=$row->btls_damaged;?></td>

                      <td><?=$row->description;?></td>

                      <td><?=$row->date_created;?></td>

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