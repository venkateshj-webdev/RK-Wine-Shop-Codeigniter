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
                        <h3 class="box-title">Report Sheet(IML)</h3>
                    </div>
                    <div class="col-sm-8 text-center">
                      <h4 style="margin-top: 0px;"></h4>From: <strong><?php echo $from_date; ?></strong>&nbsp;&nbsp;&nbsp;To: <strong><?php echo $to_date;?></strong></h4>
                    </div>
                        <div class="col-sm-1  pull-right" style="padding-left: 0px; left: -20px;margin-top:-6px;">
                            <button class="btn btn-primary">Print Report</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <?php if(!empty($result)): ?>
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
                      <th colspan="6">PARTICULARS</th>
                      <th class="border-right"></th>
                      <th class="border-right">Qts</th>
                      <th class="border-right">Pts</th>
                      <th class="border-right">Nip</th>
                      <th class="border-right">Dip</th>
                      <th class="border-right">Ltr</th>

                      <th class="border-right">Qts</th>
                      <th class="border-right">Pts</th>
                      <th class="border-right">Nip</th>
                      <th class="border-right">Dip</th>
                      <th class="border-right">Ltr</th>
                      <th class="border-right" colspan="2">Rs</th>
                      <th class="border-right">Qts</th>
                      <th class="border-right">Pts</th>
                      <th class="border-right">Nip</th>
                      <th class="border-right">Dip</th> 
                      <th class="border-right">Ltr</th>

                      <th class="border-right">Qts</th>
                      <th class="border-right">Pts</th>
                      <th class="border-right">Nip</th>
                      <th class="border-right">Dip</th> 
                      <th class="border-right">Ltr</th>
                      <th colspan="3" class="border-right border-bottom">Rs</th>
                    </tr>
                        

                    <?php if(!empty($result)) {
                     foreach($result as $key=>$row) { ?>
                     <?php if(strpos($row->brands_id,'Iml')) { ?>
                    <tr class="text-center br-all">
                        <td colspan="7"><?=$row->brands_id;?></td>
                        <?php if(strpos($row->brands_id, 'Qts') !== false) { ?>                
                        <td><?=$row->opening_balance;?></td>
                      <?php } else {?>
                      <td></td> 
                      <?php } ?>
                      <?php if(strpos($row->brands_id, 'Pts') !== false) { ?>                
                        <td><?=$row->opening_balance;?></td>
                      <?php } else {?>
                      <td></td> 
                      <?php } ?>
                      <?php if(strpos($row->brands_id, 'Nip') !== false) { ?>
                      <td><?=$row->opening_balance;?></td>
                      <?php } else {?>
                      <td></td> 
                      <?php } ?>
                      <?php if(strpos($row->brands_id, 'Dip') !== false) { ?>
                      <td><?=$row->opening_balance;?></td>
                      <?php } else {?>
                      <td></td> 
                      <?php } ?>
                      <?php if(strpos($row->brands_id, 'litre') !== false) { ?>
                      <td><?=$row->opening_balance;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>

                      
                      <?php if(strpos($row->brands_id, 'Qts') !== false) { ?>
                      <td><?=$row->no_of_bottles;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($row->brands_id, 'Pts') !== false) { ?>
                      <td><?=$row->no_of_bottles;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($row->brands_id, 'Nip') !== false) { ?>
                      <td><?=$row->no_of_bottles;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($row->brands_id, 'Dip') !== false) { ?>
                       <td><?=$row->no_of_bottles;?></td>
                        <?php } else { ?>
                        <td></td>
                        <?php } ?>
                      <?php if(strpos($row->brands_id, 'litre') !== false) { ?>
                        <td><?=$row->no_of_bottles;?></td>
                      <?php } else { ?>
                       <td></td>
                       <?php } ?>

                        <td colspan="2"><?=$row->total;?></td>
                

                      <?php if(strpos($row->brands_id, 'Qts') !== false) { ?>
                      <td><?=$row->quantity;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($row->brands_id, 'Pts') !== false) { ?>
                      <td><?=$row->quantity;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($row->brands_id, 'Nip') !== false) { ?>
                      <td><?=$row->quantity;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($row->brands_id, 'Dip') !== false) { ?>
                       <td><?=$row->quantity;?></td>
                        <?php } else { ?>
                        <td></td>
                        <?php } ?>
                      <?php if(strpos($row->brands_id, 'litre') !== false) { ?>
                        <td><?=$row->quantity;?></td>
                      <?php } else { ?>
                       <td></td>
                       <?php } ?>


                      <?php if(strpos($row->brands_id, 'Qts') !== false) { ?>
                      <td><?=$row->closing_stock;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($row->brands_id, 'Pts') !== false) { ?>
                      <td><?=$row->closing_stock;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($row->brands_id, 'Nip') !== false) { ?>
                      <td><?=$row->closing_stock;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($row->brands_id, 'Dip') !== false) { ?>
                       <td><?=$row->closing_stock;?></td>
                        <?php } else { ?>
                        <td></td>
                        <?php } ?>
                      <?php if(strpos($row->brands_id, 'litre') !== false) { ?>
                        <td><?=$row->closing_stock;?></td>
                      <?php } else { ?>
                       <td></td>
                       <?php } ?>
                      <td colspan="3"><?=$row->sale_amount;?></td> 
                    </tr>
                    <?php } ?>
                    <?php } } else { ?>
                    <td>No Records Found</td>
                    <?php } ?>

                  </table>
                <?php endif; ?>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

