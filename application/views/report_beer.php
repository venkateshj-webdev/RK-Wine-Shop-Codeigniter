<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-sm-6">
        <i class="fa fa-list pull-left" aria-hidden="true"></i> Report Sheet<small></small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box report_for_iml" id="report_for_iml">
                <div class="box-header">
                    <div class="row">
                    <div class="col-sm-2">
                        <h3 class="box-title">Report Sheet(Beer)</h3>
                    </div>
                    <div class="col-sm-8 text-center">
                      <h4 style="margin-top: 0px;">From: <strong><?php echo $from_date; ?></strong>&nbsp;&nbsp;&nbsp; To: <strong><?php  echo $to_date; ?></strong></h4>
                    </div>
                        <div class="col-sm-1  pull-right" style="padding-left: 0px; left: -20px;margin-top:-6px;">
                            <button class="btn btn-primary">Print Report</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table text-center">
                    <tr class="text-center" bgcolor="#195E93" style="color: #fff">
                      <th colspan="7" class="border-right"></th>
                      <th colspan="5" class="text-center border-right">OPENING BALANCE</th>
                      <th colspan="5" class="border-right">RECEIPTS</th>
                      <th colspan="2" class="border-right">TOTAL</th>
                      <th colspan="5" class="border-right">SALES</th>
                      <th colspan="5" class="border-right">CLOSING STOCK</th>
                      <th colspan="4">AMOUNT</th>
                    </tr>
                    <tr>
                      <th colspan="7" class="border-right">PARTICULARS</th>
                      <th class="border-right" colspan="1">650</th>
                      <th class="border-right" colspan="1">350</th>
                      <th class="border-right" colspan="1">500-Tin</th>
                      <th class="border-right" colspan="1">330-Tin</th>
                      <th class="border-right" colspan="1">250-Tin</th>


                      <th class="border-right" colspan="1">650</th>
                      <th class="border-right" colspan="1">350</th>
                      <th class="border-right" colspan="1">500-Tin</th>
                      <th class="border-right" colspan="1">330-Tin</th>
                      <th class="border-right" colspan="1">250-Tin</th>
    
                     <th colspan="2" class="border-right">Rs</th>
                      
                      <th class="border-right" colspan="1">650</th>
                      <th class="border-right" colspan="1">350</th>
                      <th class="border-right" colspan="1">500-Tin</th>
                      <th class="border-right" colspan="1">330-Tin</th>
                      <th class="border-right" colspan="1">250-Tin</th>

                      <th class="border-right" colspan="1">650</th>
                      <th class="border-right" colspan="1">350</th>
                      <th class="border-right" colspan="1">500-Tin</th>
                      <th class="border-right" colspan="1">330-Tin</th>
                      <th class="border-right" colspan="1">250-Tin</th>

                      <th colspan="3" class="border-right border-bottom">Rs</th>
                    </tr> 
                   <?php if(!empty($query_results)) { ?>
                      <?php foreach($query_results as $key => $results) {?>
                      <?php if(strpos($results->brands_id,'Beer')) { ?>
                    <tr class="text-center br-all">
                      <td colspan="10"><?=$results->brands_id;?></td>

                      <?php if(strpos($results->brands_id, '650') !== false) { ?>
                      <td colspan="1"><?=$results->opening_balance;?></td>
                      <?php } else {?>
                      <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, '350') !== false) { ?>
                      <td><?=$results->opening_balance;?></td>
                      <?php } else {?>
                      <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, '500 - Tin') !== false) { ?>
                        <td><?=$results->opening_balance;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, '330 - Tin') !== false) { ?>
                        <td><?=$results->opening_balance;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, '250 - Tin') !== false) { ?>
                        <td><?=$results->opening_balance;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                    
                    <?php if(strpos($results->brands_id, '650') !== false) { ?>
                        <td><?=$results->no_of_bottles;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, '350') !== false) { ?>
                        <td><?=$results->no_of_bottles;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, '500 - Tin') !== false) { ?>
                        <td><?=$results->no_of_bottles;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, '330 - Tin') !== false) { ?>
                        <td><?=$results->no_of_bottles;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                       <?php if(strpos($results->brands_id, '250 - Tin') !== false) { ?>
                        <td><?=$results->no_of_bottles;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>

                      <td><?=$results->total;?></td>

                      <?php if(strpos($results->brands_id, '650') !== false) { ?>
                        <td><?=$results->quantity;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, '350') !== false) { ?>
                        <td><?=$results->quantity;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                       <?php if(strpos($results->brands_id, '500 - Tin') !== false) { ?>
                        <td><?=$results->quantity;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, '330 - Tin') !== false) { ?>
                        <td><?=$results->quantity;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, '250 - Tin') !== false) { ?>
                        <td><?=$results->quantity;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>

                      <?php if(strpos($results->brands_id, '650') !== false) { ?>
                        <td><?=$results->closing_stock;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, '350') !== false) { ?>
                        <td><?=$results->closing_stock;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                       <?php if(strpos($results->brands_id, '500 - Tin') !== false) { ?>
                        <td><?=$results->closing_stock;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, '330 - Tin') !== false) { ?>
                        <td><?=$results->closing_stock;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, '250 - Tin') !== false) { ?>
                        <td><?=$results->closing_stock;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>

                      <td colspan="3"><?=$results->sale_amount;?></td>  
                    </tr>
                    <?php } } } ?>
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

