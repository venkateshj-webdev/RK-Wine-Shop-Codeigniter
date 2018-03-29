<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-sm-6">
        <i class="fa fa-list pull-left" aria-hidden="true"></i> Report Sheet
        <small></small>
      </h1>
      <div class="report-select col-sm-4 col-sm-offset-2">
          <form action="">
            <div class="form-group">
             <div class="row">
                <div class="col-sm-6" style="padding-right: 10px; padding-top: 5px;">
                  <label for="report-select">Select Report Sheet</label>
                </div>
                <div class="col-sm-6" style="padding-left: 0px;padding-right: 0px;">
                  <select name="" id="" class="form-control">
                      <option value="" selected disabled id="select-report">Select Report</option>
                      <option value="iml">IML</option>
                      <option value="beer">BEER</option>
                      <option value="wine">WINE</option>
                  </select>
                </div>
              </div>
            </div>
          </form>
      </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
              <?php 
              $this->load->library('session');
                $err_msg = $this->session->flashdata('error'); 
                if($err_msg) { ?>
                  <div class="alert alert-danger" role="alert">

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <strong><?php echo $this->session->flashdata($err_msg); ?></strong>

                </div>
              <?php  } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box report-iml" id="report-iml">
                <div class="box-header">
                    <div class="row">
                    <div class="col-sm-2">
                        <h3 class="box-title">Report Sheet(IML)</h3>
                    </div>
                        <div class="col-sm-6">
                            <div class="box-tools" style="margin-top: -5px;">
                                <form action="<?php echo base_url(); ?>report_controller/between_date" method="POST" name="submit">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="input-group" style="width: 100%;">
                                                <label for="from-date">From</label>
                                                <input type="date" class="from-date form-control" id="datetimepicker" name="from-date" class="form-control input-sm">
                                            </div> 
                                        </div>
                                        <div class="col-sm-5" style="padding-right: 0px;">
                                            <div class="input-group" style="width: 100%;">
                                                <label for="To">To</label>
                                                <input type="date" class="to-date form-control" id="datepicker" name="to-date" class="form-control input-sm">
                                            </div>  
                                        </div>
                                        <div class="col-sm-2" style="padding-left: 0px;">
                                            <div class="input-group">
                                                <button class="btn submit btn-primary searchList" name="submit">SUBMIT</button>    
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-1" style="margin-top:-5px; padding-right:10px;">
                            <button class="btn btn-primary float-right">Print Report</button>                           
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding" id="print">
                  <table class="table text-center" >
                    <thead>
                    <tr class="text-center" bgcolor="#195E93" style="color: #fff">
                      <th colspan="7" class="border-right"></th>
                      <th colspan="5" class="text-center border-right">OPENING BALANCE</th>
                      <th colspan="5" class="border-right">RECEIPTS</th>
                      <th colspan="2" class="border-right">TOTAL</th>
                      <th colspan="5" class="border-right">SALES</th>
                      <th colspan="5" class="border-right">CLOSING STOCK</th>
                      <th colspan="4">AMOUNT</th>
                    </tr>
                  </thead>
                  <thead>
                    <tr>
                      <th colspan="7" class="border-right">PARTICULARS</th>
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
                    </thead>
                    <tbody>                      
                    <?php if(!empty($query_results)) { ?>
                    <?php foreach($query_results as $key => $results) {?>              
                    <?php if(strpos($results->brands_id,'Iml')) { ?>
                    <tr class="text-center br-all">
                    <td colspan="7"><?=$results->brands_id;?></td>  
                      <?php if(strpos($results->brands_id, 'Qts') !== false) { ?>                
                        <td colspan="1"><?=$results->opening_balance;?></td>
                      <?php } else {?>
                      <td></td> 
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Pts') !== false) { ?>                
                        <td><?=$results->opening_balance;?></td>
                      <?php } else {?>
                      <td></td> 
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Nip') !== false) { ?>
                      <td><?=$results->opening_balance;?></td>
                      <?php } else {?>
                      <td></td> 
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Dip') !== false) { ?>
                      <td><?=$results->opening_balance;?></td>
                      <?php } else {?>
                      <td></td> 
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'litre') !== false) { ?>
                      <td><?=$results->opening_balance;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>

                      
                      <?php if(strpos($results->brands_id, 'Qts') !== false) { ?>
                      <td><?=$results->no_of_bottles;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Pts') !== false) { ?>
                      <td><?=$results->no_of_bottles;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Nip') !== false) { ?>
                      <td><?=$results->no_of_bottles;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Dip') !== false) { ?>
                       <td><?=$results->no_of_bottles;?></td>
                        <?php } else { ?>
                        <td></td>
                        <?php } ?>
                      <?php if(strpos($results->brands_id, 'litre') !== false) { ?>
                        <td><?=$results->no_of_bottles;?></td>
                      <?php } else { ?>
                       <td></td>
                       <?php } ?>

                      <td colspan="2"><?=$results->total;?></td>
                

                      <?php if(strpos($results->brands_id, 'Qts') !== false) { ?>
                      <td><?=$results->quantity;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Pts') !== false) { ?>
                      <td><?=$results->quantity;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Nip') !== false) { ?>
                      <td><?=$results->quantity;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Dip') !== false) { ?>
                       <td><?=$results->quantity;?></td>
                        <?php } else { ?>
                        <td></td>
                        <?php } ?>
                      <?php if(strpos($results->brands_id, 'litre') !== false) { ?>
                        <td><?=$results->quantity;?></td>
                      <?php } else { ?>
                       <td></td>
                       <?php } ?>


                      <?php if(strpos($results->brands_id, 'Qts') !== false) { ?>
                      <td><?=$results->closing_stock;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Pts') !== false) { ?>
                      <td><?=$results->closing_stock;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Nip') !== false) { ?>
                      <td><?=$results->closing_stock;?></td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Dip') !== false) { ?>
                       <td><?=$results->closing_stock;?></td>
                        <?php } else { ?>
                        <td></td>
                        <?php } ?>
                      <?php if(strpos($results->brands_id, 'litre') !== false) { ?>
                        <td><?=$results->closing_stock;?></td>
                      <?php } else { ?>
                       <td></td>
                       <?php } ?>

                      <td colspan="3"><?=$results->sale_amount;?></td> 
                    </tr>
                    <?php } }  ?>
                    <?php  }  else { ?>
                        <td>Sorry No Records Found.</td>
                    <?php  } ?>
                  </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                </div>
              </div><!-- /.box -->

              <div class="box report-beer" id="report-beer">
                <div class="box-header">
                    <div class="row">
                    <div class="col-sm-2">
                        <h3 class="box-title">Report Sheet(BEER)</h3>
                    </div>
                        <div class="col-sm-6">
                            <div class="box-tools" style="margin-top:-5px;">
                                <form action="<?php base_url();?>get_result_between_date_beer" method="POST" name="submit">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="input-group" style="width: 100%;">
                                                <label for="from-date">From</label>
                                                <input type="date" class="from-date form-control" id="datetimepicker" name="from-date" class="form-control input-sm">
                                            </div> 
                                        </div>
                                        <div class="col-sm-5" style="padding-right: 0px;">
                                            <div class="input-group" style="width: 100%;">
                                                <label for="To">To</label>
                                                <input type="date" class="to-date form-control" id="datepicker" name="to-date" class="form-control input-sm">
                                            </div>  
                                        </div>
                                        <div class="col-sm-2" style="padding-left: 0px;">
                                            <div class="input-group">
                                                <button class="btn btn-primary searchList submit">SUBMIT</button>    
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-1 col-sm-offset-3" style="padding-left: 0px; left: -10px;margin-top:-5px;">
                            <button class="btn btn-primary">Print Report</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table text-center">
                    <tr class="text-center" bgcolor="#195E93" style="color: #fff">
                      <th colspan="10" class="border-right"></th>
                      <th colspan="5" class="text-center border-right">OPENING BALANCE</th>
                      <th colspan="5" class="border-right">RECEIPTS</th>
                      <th colspan="1" class="border-right">TOTAL</th>
                      <th colspan="5" class="border-right">SALES</th>
                      <th colspan="5" class="border-right">CLOSING STOCK</th>
                      <th colspan="3">AMOUNT</th>
                    </tr>
                    <tr>
                      <th colspan="10" class="border-right">PARTICULARS</th>
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
    
                     <th colspan="1" class="border-right">Rs</th>
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

            <div class="box report-beer" id="report-wine">
                <div class="box-header">
                    <div class="row">
                    <div class="col-sm-2">
                        <h3 class="box-title">Report Sheet(Wine)</h3>
                    </div>
                        <div class="col-sm-6">
                            <div class="box-tools" style="margin-top:-5px;">
                                <form action="<?php base_url();?>get_result_between_date_wine" method="POST" name="submit">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="input-group" style="width: 100%;">
                                                <label for="from-date">From</label>
                                                <input type="date" class="from-date form-control" id="datetimepicker" name="from-date" class="form-control input-sm">
                                            </div> 
                                        </div>
                                        <div class="col-sm-5" style="padding-right: 0px;">
                                            <div class="input-group" style="width: 100%;">
                                                <label for="To">To</label>
                                                <input type="date" class="to-date form-control" id="datepicker" name="to-date" class="form-control input-sm">
                                            </div>  
                                        </div>
                                        <div class="col-sm-2" style="padding-left: 0px;">
                                            <div class="input-group">
                                                <button class="btn btn-primary searchList submit">SUBMIT</button>    
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-1 col-sm-offset-3" style="padding-left: 0px; left: -10px;margin-top:-5px;">
                            <button class="btn btn-primary">Print Report</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table text-center">
                    <tr class="text-center" bgcolor="#195E93" style="color: #fff">
                      <th colspan="10" class="border-right"></th>
                      <th colspan="3" class="text-center border-right">OPENING BALANCE</th>
                      <th colspan="3" class="border-right">RECEIPTS</th>
                      <th colspan="1" class="border-right">TOTAL</th>
                      <th colspan="3" class="border-right">SALES</th>
                      <th colspan="3" class="border-right">CLOSING STOCK</th>
                      <th colspan="3">AMOUNT</th>
                    </tr>
                    <tr>
                      <th colspan="10" class="border-right">PARTICULARS</th>
                      <th class="border-right" colspan="1">Split</th>
                      <th class="border-right" colspan="1">Half-Bottles</th>
                      <th class="border-right" colspan="1">Bottle</th>


                      <th class="border-right" colspan="1">Split</th>
                      <th class="border-right" colspan="1">Half-Bottles</th>
                      <th class="border-right" colspan="1">Bottle</th>
    
                     <th colspan="1" class="border-right">Rs</th>
                      <th class="border-right" colspan="1">Split</th>
                      <th class="border-right" colspan="1">Half-Bottles</th>
                      <th class="border-right" colspan="1">Bottle</th>

                      <th class="border-right" colspan="1">Split</th>
                      <th class="border-right" colspan="1">Half-Bottles</th>
                      <th class="border-right" colspan="1">Bottle</th>
                      <th colspan="3" class="border-right border-bottom">Rs</th>
                    </tr>
                     <?php if(!empty($query_results)) { ?>
                      <?php foreach($query_results as $key => $results) {?>
                      <?php if(strpos($results->brands_id,'Wine')) { ?>
                    <tr class="text-center br-all">
                      <td colspan="10"><?=$results->brands_id;?></td>

                      <?php if(strpos($results->brands_id, 'Split') !== false) { ?>
                        <td colspan="1"><?=$results->opening_balance;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Half-Bottle') !== false) { ?>
                        <td><?=$results->opening_balance;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                       <?php if(strpos($results->brands_id, 'Bottle') !== false) { ?>
                        <td><?=$results->opening_balance;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                    
                    <?php if(strpos($results->brands_id, 'Split') !== false) { ?>
                      <td><?=$results->no_of_bottles;?></td>
                      <?php } else {?>
                      <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Half-Bottle') !== false) { ?>
                        <td><?=$results->no_of_bottles;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Bottle') !== false) { ?>
                        <td><?=$results->no_of_bottles;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>

                      <td><?=$results->total;?></td>

                      <?php if(strpos($results->brands_id, 'Split') !== false) { ?>
                      <td><?=$results->quantity;?></td>
                      <?php } else {?>
                      <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Half-Bottle') !== false) { ?>
                      <td><?=$results->quantity;?></td>
                      <?php } else {?>
                      <td></td>
                      <?php } ?>
                       <?php if(strpos($results->brands_id, 'Bottle') !== false) { ?>
                        <td><?=$results->quantity;?></td>
                        <?php } else {?>
                        <td></td>
                      <?php } ?>

                      <?php if(strpos($results->brands_id, 'Split') !== false) { ?>
                      <td><?=$results->closing_stock;?></td>
                      <?php } else {?>
                      <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Half-Bottle') !== false) { ?>
                      <td><?=$results->closing_stock;?></td>
                      <?php } else {?>
                      <td></td>
                      <?php } ?>
                      <?php if(strpos($results->brands_id, 'Bottle') !== false) { ?>
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
<script>
    $(document).ready(function() {
        $('select').on('change',function() {
            var myVal = $(this).val();
            if(myVal === "iml") {
                $("#report-iml").css("display","block");
                $("#report-iml").css("position","relative");
                $("#report-iml").css("z-index","999");
                $("#report-iml").css("overflow-y","scroll");
                $("#report-iml").css("height","485px");
                $("#report-iml").css("padding-right","0px");
                $("#report-iml").css("width","98.8%");
                $("#report-beer").css("display","none");
                $("#report-wine").css("display","none");
            } 
            else if(myVal === "beer") {
                $("#report-beer").css("display","block");
                $("#report-beer").css("position","relative");
                $("#report-beer").css("z-index","999");
                $("#report-beer").css("overflow-y","scroll");
                $("#report-beer").css("height","485px");
                $("#report-beer").css("padding-right","0px");
                $("#report-beer").css("width","98.8%");
                $("#report-iml").css("display","none");
                $("#report-wine").css("display","none");
            }
            else if(myVal === "wine") {
                $("#report-wine").css("display","block");
                $("#report-wine").css("position","relative");
                $("#report-wine").css("z-index","999");
                $("#report-wine").css("overflow-y","scroll");
                $("#report-wine").css("height","485px");
                $("#report-wine").css("padding-right","0px");
                $("#report-wine").css("width","98.8%");
                $("#report-iml").css("display","none");
                $("#report-beer").css("display","none");
            }
        }); 
    });

</script>
