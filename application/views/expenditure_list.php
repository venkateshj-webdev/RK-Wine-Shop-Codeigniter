<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="col-sm-6">

      <h4>

        <i class="fa fa-list" aria-hidden="true"></i> Expenditure List

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

                <div class="box-header">

                    <h3 class="box-title">Expenditure List</h3>

                    <div class="box-tools">

<!--                         <form action="<?php echo base_url(); ?>" method="POST" id="searchList">

                            <div class="input-group">

                              <input type="date" name="searchtext" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>

                              <div class="input-group-btn">

                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>

                              </div>

                            </div>

                        </form> -->

                    </div>

                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding" id="print">

                  <table class="table text-center table-hover table-bordered">

                  <thead>

                    <tr class="text-center" bgcolor="#195E93" style="color:#fff;">

                      <th class="pad-12">Expenditure Item</th>

                      <th class="pad-12">Expenditure Value</th>

                      <th class="pad-12">Comments</th>

                      <th class="pad-12">Date Created</th>

                    </tr>

                  </thead>

                    <?php if(!empty($result)) { ?>

                    <?php foreach ($result as $key => $row) { ?> 

                    <tr class="text-center">

                      <td><?=$row->expenditure_item;?></td>

                      <td><?=$row->expenditure_value;?></td>

                      <td><?=$row->comments;?></td>

                      <td><?=$row->date_of_create;?></td>

                      

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

  var prtContent = document.getElementById("print");

  var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');

  WinPrint.document.write(prtContent.innerHTML);

  WinPrint.document.close();

  WinPrint.focus();

  WinPrint.print();

  WinPrint.close();

}



</script>