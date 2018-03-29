

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>RK WineShop</b> Developed By <a href="#">Calliarc</a>
        </div>
        <strong>Copyright &copy; 2017 <a href="<?php echo base_url(); ?>">Rk Wineshop</a>.</strong> All rights reserved.
    </footer>
    
    <!-- jQuery UI 1.11.2 -->
    <!-- <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script> 
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.datetimepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.datetimepicker.full.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.datetimepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/site-scripts.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/chosen.jquery.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/prism.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url(); ?>assets/js/init.js" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/tableExport.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jquery.base64.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/html2canvas.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jspdf/libs/sprintf.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jspdf/jspdf.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jspdf/libs/base64.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/tableExport.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jquery.base64.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/html2canvas.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jspdf/libs/sprintf.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jspdf/jspdf.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jspdf/libs/base64.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/jspdf.min.js"></script>
    
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');

        $('#datetimepicker2').datetimepicker({
        yearOffset:0,
        lang:'ch',
        timepicker:false,
        format:'Y/m/d',
        formatDate:'Y/m/d',
        minDate:'-1970/01/02',
        maxDate:'+1970/01/02',
        });

     $( "#datepicker" ).datepicker({
  beforeShowDay: $.datepicker.noWeekends
});
    </script>
  </body>
</html>