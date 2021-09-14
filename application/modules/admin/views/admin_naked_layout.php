<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Panel </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/admin/images/favicon.png')?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/toastr/css/toastr.min.css')?>">
    <link href="<?php echo base_url('assets/admin/css/style.css')?>" rel="stylesheet">

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo base_url('assets/admin/vendor/global/global.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/js/quixnav-init.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/js/custom.min.js')?>"></script> 

</head>

<body class="h-100">
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>"/>    
<?php  echo (isset($content))?$content:'';?>  

 
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

</body>

</html>