<?php include 'includes/loader.php'; ?>

<!doctype html>
<html class="no-js" lang="en">

<?php
$page_title = "Home | Rituals By Ritu";
include 'includes/head.php';
?>

<body class="overflow-x-hidden" data-mobile-nav-style="classic">
  <!-- start header -->
  <?php include_once 'includes/header.php'; ?>
  <!-- end header -->

  <!-- start page title -->
  <section
    class="page-title-separate-breadcrumbs cover-background border-top border-4 border-color-base-color top-space-margin"
    style="background-image: url(images/gallery/35.jpg)">
    <div class="opacity-full bg-gradient-dark-transparent"></div>
    <div class="container position-relative">
      <div
        class="row align-items-start align-items-lg-end justify-content-end flex-column flex-lg-row extra-small-screen"
        data-anime='{ "el": "childs", "translateY": [15, 0], "opacity": [0,1], "duration": 400, "delay": 0, "staggervalue": 200, "easing": "easeOutQuad" }'>
        <div
          class="col-xxl-7 col-lg-6 col-md-10 position-relative page-title-large md-mb-15px xs-mb-5px">
          <h1 class="text-white alt-font fw-500 ls-minus-2px mb-0">Blogs</h1>
        </div>
        <div class="col-xxl-5 col-lg-6 col-md-10 last-paragraph-no-margin">
          <p class="fs-20 text-white opacity-7 md-w-80 sm-w-100">
            Thoughtfully planned services designed to bring your dream wedding
            to life with elegance, creativity, and seamless execution.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- end page title -->

  <!-- start section -->
  <section class="pt-0 ps-7 pe-7 xl-px-0">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <ul
            class="blog-modern blog-wrapper grid-loading grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
            <li class="grid-sizer"></li>
            <?php foreach ($blogs as $index => $blog): ?>
              <!-- start blog item -->
              <li class="grid-item mb-40px">
                <div class="box-hover text-center">
                  <figure class="mb-0 position-relative">
                    <div class="blog-image position-relative overflow-hidden">
                      <a href="<?php echo buildUrl('blog-details.php', $blog['slug']); ?>">
                        <img
                          src="<?php echo $blog['featured_image']['thumbnail']; ?>"
                          alt="" />
                      </a>
                    </div>
                    <figcaption class="post-content-wrapper">
                      <div
                        class="position-relative bg-dark-gray post-content p-30px z-index-2">
                        <div class="hover-text">
                          <a
                            href="<?php echo buildUrl('blog-details.php', $blog['slug']); ?>"
                            class="text-base-color fs-15 text-uppercase fw-600 mb-5px d-inline-block"><?php echo $blog['categories'][0]; ?></a>
                        </div>
                        <a
                          href="<?php echo buildUrl('blog-details.php', $blog['slug']); ?>"
                          class="card-title mb-0 fs-19 lh-26 text-white d-inline-block">


                          <?php echo mb_strimwidth($blog['title'], 0, 50, '...'); ?>
                        </a>
                        <div
                          class="box-overlay bg-dark-gray z-index-minus-1"></div>
                      </div>

                      <?php
                      // Format the date
                      $date = new DateTime($blog['date']);
                      $formattedDate = $date->format("d F Y");
                      ?>

                      <div class="fs-14 bg-white p-15px lh-initial">
                        <span class="d-inline-block">By
                          <a
                            href="<?php echo buildUrl('blog-details.php', $blog['slug']); ?>"
                            class="text-dark-gray-hover">Rituals</a></span><span class="separator d-inline-block">|</span><a
                          href="<?php echo buildUrl('blog-details.php', $blog['slug']); ?>"
                          class="text-dark-gray-hover"><?php echo $formattedDate; ?></a>
                      </div>
                    </figcaption>
                  </figure>
                </div>
              </li>
              <!-- end blog item -->
            <?php endforeach; ?>
          </ul>
        </div>
        <!-- <div class="col-12 mt-2 d-flex justify-content-center">
            <ul class="pagination pagination-style-01 fs-13 fw-500 mb-0">
              <li class="page-item">
                <a class="page-link" href="#"
                  ><i
                    class="feather icon-feather-arrow-left fs-18 d-xs-none"></i
                ></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">01</a></li>
              <li class="page-item active">
                <a class="page-link" href="#">02</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">03</a></li>
              <li class="page-item"><a class="page-link" href="#">04</a></li>
              <li class="page-item">
                <a class="page-link" href="#"
                  ><i
                    class="feather icon-feather-arrow-right fs-18 d-xs-none"></i
                ></a>
              </li>
            </ul>
          </div> -->
      </div>
    </div>
  </section>
  <!-- end section -->

  <!-- start section -->
  <section></section>
  <!-- end section -->

  <!-- start footer -->
  <?php include_once 'includes/footer.php'; ?>
  <!-- end footer -->

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