<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dashui.codescandy.com/dashuipro/pages/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2024 11:20:05 GMT -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Codescandy">

  <!-- Google tag (gtag.js) -->
  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-M8S4MT3EYG');
  </script>
  <script src="https://hcaptcha.com/1/api.js" async defer></script>


  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/x-icon" href="https://dashui.codescandy.com/dashuipro//assets/images/favicon/favicon.ico">


  <!-- Libs CSS -->
  <link href="<?= base_url('template') ?>/assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('template') ?>/assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="<?= base_url('template') ?>/assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">



  <!-- Theme CSS -->
  <link rel="stylesheet" href="<?= base_url('template') ?>/assets/css/theme.min.css">
  <title>Login</title>
</head>

<body>
  <!-- container -->
  <main class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0
        min-vh-100">
      <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
        <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle d-none ">
          <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
          <label class="form-check-label" for="flexSwitchCheckDefault"></label>

        </a>
        <!-- Card -->
        <div class="card smooth-shadow-md">
          <!-- Card body -->
          <div class="card-body p-6">
            <div class="mb-4">
              <h2><?= APP_NAME ?></h2>
              <p class="mb-6">Please enter your user information.</p>
            </div>
            <!-- Form -->
            <form id="log" method="POST" action="<?= base_url('auth/login') ?>" class="d-grid gap-3">
              <!-- Username -->
              <div>
                <label for="email" class="form-label">Username</label>
                <input type="username" id="username" class="form-control" name="username" placeholder="Username" required="">
              </div>
              <!-- Password -->
              <div>
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="**************" required="">
              </div>
              <!-- CAPTCHA -->
              <div>
              <div class="h-captcha" data-sitekey="10000000-ffff-ffff-ffff-000000000001"></div>
              </div>
              <!-- Button -->
              <div>
                <input type="hidden" name="login">
                <button type="button" name="tes" class="btn btn-primary btn-block" onclick="verifyCaptcha()" style="width: 100%;">Login</button>
              </div>
            
            </form>

          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Scripts -->
  <!-- Libs JS -->
  <script type="text/javascript">
  var onloadCallback = function() {
  };
</script>
  <script src="<?= base_url('template') ?>/assets/libs/jquery/dist/jquery.min.js"></script>     
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
  <script src="<?= base_url('template') ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('template') ?>/assets/libs/feather-icons/dist/feather.min.js"></script>
  <script src="<?= base_url('template') ?>/assets/libs/simplebar/dist/simplebar.min.js"></script><script>
$(document).ready(function() {
    var table = $('#mytable').DataTable();
	$('#dt-search-0').css('margin-right', '20px');
	$('#dt-length-0').css('margin-left', '20px');
	$('#dt-length-0').css('margin-right', '10px');
	$('#mytable_info').css('margin-left', '20px');
	$('.dt-paging.paging_full_numbers').css('margin-right', '20px');
});


</script>
<script>
        function verifyCaptcha() {
          var hcaptchaResponse = hcaptcha.getResponse();


   if (hcaptchaResponse === "") {
      event.preventDefault();
      alert("Please complete the hCaptcha");
   }else{
    document.getElementById("log").submit();
   }
        }
    </script>
  <!-- Theme JS -->
  <script src="<?= base_url('template') ?>/assets/js/theme.min.js"></script>
</body>


<!-- Mirrored from dashui.codescandy.com/dashuipro/pages/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2024 11:20:05 GMT -->

</html>