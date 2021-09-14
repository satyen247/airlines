<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Panel </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/admin/images/favicon.png')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/owl-carousel/css/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/owl-carousel/css/owl.theme.default.min.css')?>">
    <link href="<?php echo base_url('assets/admin/vendor/jqvmap/css/jqvmap.min.css')?>" rel="stylesheet">
     <!-- Toastr -->
     <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/toastr/css/toastr.min.css')?>">

    <link href="<?php echo base_url('assets/admin/css/style.css')?>" rel="stylesheet">

    <!--**********************************
        Scripts 
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo base_url('assets/admin/vendor/global/global.min.js')?>"></script>
    

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

    <?php  echo (isset($header))?$header:'';?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
          <?php  echo (isset($content))?$content:'';?>  
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
        <?php  echo (isset($footer))?$footer:'';?>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>"/>     

    <!-- Toastr -->
    <script src="<?php echo base_url('assets/admin/vendor/toastr/js/toastr.min.js')?>"></script>

   <script type="text/javascript">

    function hbToastrSuccess(message)
    {
        toastr.clear();
        toastr.success(message, "Success", {
        positionClass: "toast-top-full-width",
        timeOut: 5e3,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
        })
            
    }

    function hbToastrError(message)
    {
        toastr.clear();
        toastr.error(message, "Error", {
        positionClass: "toast-top-full-width",
        timeOut: 5e3,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
        })
            
    }

    function hbToastrInfo(message)
    {
        toastr.clear();
        toastr.info(message, "Info", {
        positionClass: "toast-top-full-width",
        timeOut: 5e3,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
        })
            
    }

    function hbToastrWarning(message)
    {
        toastr.clear();
        toastr.warning(message, "Warning", {
        positionClass: "toast-top-full-width",
        timeOut: 5e3,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
        })
            
    }

   </script>

<script src="<?php echo base_url('assets/admin/js/quixnav-init.js')?>"></script>
<script src="<?php echo base_url('assets/admin/js/custom.min.js')?>"></script> 

<?php 
    if($this->router->fetch_method() == 'dashboard')
      {  
?>      

    <!-- Vectormap -->
    <script src="<?php echo base_url('assets/admin/vendor/raphael/raphael.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/morris/morris.min.js')?>"></script>


    <script src="<?php echo base_url('assets/admin/vendor/circle-progress/circle-progress.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/chart.js/Chart.bundle.min.js')?>"></script>

    <script src="<?php echo base_url('assets/admin/vendor/gaugeJS/dist/gauge.min.js')?>"></script>

    <!--  flot-chart js -->
    <script src="<?php echo base_url('assets/admin/vendor/flot/jquery.flot.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/flot/jquery.flot.resize.js')?>"></script>

    <!-- Owl Carousel -->
    <script src="<?php echo base_url('assets/admin/vendor/owl-carousel/js/owl.carousel.min.js')?>"></script>

    <!-- Counter Up -->
    <script src="<?php echo base_url('assets/admin/vendor/jqvmap/js/jquery.vmap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/jqvmap/js/jquery.vmap.usa.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/jquery.counterup/jquery.counterup.min.js')?>"></script>


    <script src="<?php echo base_url('assets/admin/js/dashboard/dashboard-1.js')?>"></script>
<?php
      }
?>          

</body>

</html>