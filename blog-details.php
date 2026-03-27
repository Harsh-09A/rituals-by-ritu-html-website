<?php include 'includes/loader.php'; ?>
<!doctype html>
<html class="no-js" lang="en">

<?php
$page_title = "Home | Rituals By Ritu";
include 'includes/head.php';
?>
<?php
$slug = $_GET['slug'] ?? '';

// find project by slug
$blog = null;
foreach ($blogs as $p) {
  if ($p['slug'] === $slug) {
    $blog = $p;
    break;
  }
}

if (!$blog) {
  // die("Project not found!");
  header("Location: /404.php");
}
?>

<body data-mobile-nav-style="classic">

  <!-- start header -->
  <?php include_once 'includes/header.php'; ?>
  <!-- end header -->


  <div class="box-layout container-fluid ">

    <!-- start section -->
    <section class="top-space-margin half-section py-0">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">
            <img
              class="border-radius-6px w-100"
              src="<?php echo $blog['featured_image']['original']; ?>"
              alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="overlap-section text-center p-0 sm-pt-50px">
      <img
        class="rounded-circle box-shadow-extra-large w-150px h-150px border border-9 border-color-white"
        src="/images/logo/footer_logo.jpg"
        alt="" />
    </section>
    <!-- end section -->

    <!-- DATE -->
    <?php
    // Format the date
    $date = new DateTime($blog['date']);
    $formattedDate = $date->format("d F Y");
    ?>
    <!-- start section -->
    <section class="pt-30px pb-0">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10 text-center">
            <span class="fs-18  d-inline-block">Writer by
              <a
                href="#"
                class="fw-600 d-inline-block align-middle text-dark-gray">Ritu</a>
              in
              <a
                href="#"
                class="d-inline-block align-middle text-dark-gray fw-600">
                <?php echo $blog['categories'][0]; ?>
              </a>
            </span>
            <span class="fs-18 mb-15px d-block"> <?php echo $formattedDate; ?></span>

            <h2
              class="alt-font fw-600 ls-minus-2px text-dark-gray mx-auto w-80 xl-w-100 mb-5">
              <?php echo $blog['title']; ?>
            </h2>
            <i
              class="feather icon-feather-more-horizontal- icon-double-large text-light-gray d-inline-block mb-5 d-inline-block"></i>
          </div>
        </div>
      </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="pt-0">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="dropcap-style-02 last-paragraph-no-margin">

              <?php echo $blog['content']; ?>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end section -->






    <!-- start footer -->
    <?php include_once 'includes/footer.php'; ?>
    <!-- end footer -->
  </div>
  <!-- start cookie message -->
  <div
    id="cookies-model"
    class="cookie-message bg-dark-gray border-radius-8px">
    <div class="cookie-description fs-14 text-white mb-20px lh-22">
      We use cookies to enhance your browsing experience, serve personalized
      ads or content, and analyze our traffic. By clicking "Allow cookies" you
      consent to our use of cookies.
    </div>
    <div class="cookie-btn">
      <a
        href="#"
        class="btn btn-transparent-white border-1 border-color-transparent-white-light btn-very-small btn-switch-text btn-rounded w-100 mb-15px"
        aria-label="btn">
        <span>
          <span class="btn-double-text" data-text="Cookie policy">Cookie policy</span>
        </span>
      </a>
      <a
        href="#"
        class="btn btn-white btn-very-small btn-switch-text btn-box-shadow accept_cookies_btn btn-rounded w-100"
        data-accept-btn
        aria-label="text">
        <span>
          <span class="btn-double-text" data-text="Allow cookies">Allow cookies</span>
        </span>
      </a>
    </div>
  </div>
  <!-- end cookie message -->
  <!-- start scroll progress -->
  <div class="scroll-progress d-none d-xxl-block">
    <a href="#" class="scroll-top" aria-label="scroll">
      <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
    </a>
  </div>
  <!-- end scroll progress -->
  <!-- javascript libraries -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/vendors.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
</body>

</html>