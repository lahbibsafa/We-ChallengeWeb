
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- bootstrap 4.3.1 -->
  <link rel="stylesheet" href="/public/css/vendor/bootstrap.min.css">
  <!-- styles -->
  <link rel="stylesheet" href="/public/css/styles.min.css">
  <!-- simplebar styles -->
  <link rel="stylesheet" href="/public/css/vendor/simplebar.css">
  <!-- tiny-slider styles -->
  <link rel="stylesheet" href="/public/css/vendor/tiny-slider.css">
  <!-- favicon -->
  <link rel="icon" href="img/favicon.ico">
  <title>We Challenge | Home</title>
</head>
<body>

  <!-- PAGE LOADER -->
  <div class="page-loader">
    <!-- PAGE LOADER DECORATION -->
    <div class="page-loader-decoration">
      <!-- ICON LOGO -->
      <svg class="icon-logo" viewBox="0 0 28 40" preserveAspectRatio="xMinYMin meet">
        <path d="M27.18,24.038c-0.141-0.095-0.244-0.146-0.244-0.146l-0.005-0.049C25.489,22.783,23.103,22,23.103,22c1.542,0,2.582-0.563,3.501-1.334c-0.049-0.055,0.7-0.666,0.7-0.666c0.146-8.251-4.477-12.745-7.001-14.667C18.15,9.564,16.802,14,16.802,14c-0.219-4.426,0.243-8.072,0.7-10.667c-0.85-0.452-1.956-0.698-2.296-1.537C14.865,0.957,14.015,0,14.015,0L14,0.014L13.985,0c0,0-0.85,0.957-1.19,1.796c-0.34,0.839-1.445,1.085-2.295,1.537C10.957,5.928,11.418,9.574,11.2,14c0,0-1.349-4.436-3.501-8.667C5.174,7.255,0.551,11.749,0.697,20c0,0,0.75,0.611,0.701,0.666C2.316,21.437,3.357,22,4.898,22c0,0-2.387,0.783-3.829,1.844l-0.005,0.049c0,0-0.104,0.051-0.244,0.146c-0.48,0.397-0.806,0.828-0.819,1.269c-0.023,0.521,0.263,1.181,1.233,1.973c0,0,0.136,9.259,9.69,11.29c0,0,0.212,0.815,0.975,1.431L14,38l2.102,2c0.763-0.615,0.975-1.431,0.975-1.431c9.555-2.031,9.689-11.29,9.689-11.29c0.971-0.792,1.256-1.451,1.233-1.973C27.986,24.866,27.659,24.436,27.18,24.038z M4.198,26c2.362,0.121,3.517,1.473,5.602,4c0.799,0.969,2.059,0.83,2.059,0.83L11.899,34C5.249,34,4.198,26,4.198,26z M14,28.162l-2.97-2.828l2.101-2.001l-2.101-2l2.101-2l-2.101-2L14,14.505l2.972,2.828l-2.102,2l2.102,2l-2.102,2l2.102,2.001L14,28.162z M16.102,34l0.041-3.17c0,0,1.26,0.139,2.059-0.83c2.085-2.527,3.239-3.879,5.602-4C23.803,26,22.752,34,16.102,34z M13.3,26h1.4v-1.333h-1.4V26z M13.3,22h1.4v-1.334h-1.4V22z M13.3,18h1.4v-1.333h-1.4V18z"/>
      </svg>
      <!-- /ICON LOGO -->
    </div>
    <!-- /PAGE LOADER DECORATION -->

    <!-- PAGE LOADER INFO -->
    <div class="page-loader-info">
      <!-- PAGE LOADER INFO TITLE -->
      <p class="page-loader-info-title">We Challenge</p>
      <!-- /PAGE LOADER INFO TITLE -->

      <!-- PAGE LOADER INFO TEXT -->
      <p class="page-loader-info-text">Loading...</p>
      <!-- /PAGE LOADER INFO TEXT -->
    </div>
    <!-- /PAGE LOADER INFO -->
    
    <!-- PAGE LOADER INDICATOR -->
    <div class="page-loader-indicator loader-bars">
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
    </div>
    <!-- /PAGE LOADER INDICATOR -->
  </div>
  <!-- /PAGE LOADER -->
<?php 
include("./Views/components/header.php");
?>

<div class="content-grid" style="transform: translate(368px, 0px); transition: transform 0.4s ease-in-out 0s;">
    <div class="section-banner" style="">
        <!-- SECTION BANNER TITLE -->
        <p class="section-banner-title">Products</p>
        <!-- /SECTION BANNER TITLE -->
        <!-- SECTION BANNER TEXT -->
        <p class="section-banner-text">Transfer your challenge coins into services and goods!</p>
        <!-- /SECTION BANNER TEXT -->
    </div>
</div>
<div class="grid grid-3-3-3-3 centered">
<?php
  foreach($products as $product){
?>

<div class="product-preview">
            <!-- PRODUCT PREVIEW IMAGE -->
            <a href="/product/<?=$product->idProduct?>">
              <figure class="product-preview-image liquid" style="background: url(&quot;<?=$product->image?>&quot;) center center / cover no-repeat;">
                <img src="<?=$product->image?>" alt="item-01" style="display: none;">
              </figure>
            </a>
            <!-- /PRODUCT PREVIEW IMAGE -->
        
            <!-- PRODUCT PREVIEW INFO -->
            <div class="product-preview-info">
              <!-- TEXT STICKER -->
              <p class="text-sticker"><span class="highlighted">CCoin</span> <?=$product->price?></p>
              <!-- /TEXT STICKER -->
        
              <!-- PRODUCT PREVIEW TITLE -->
              <p class="product-preview-title"><a href="/product/<?=$product->idProduct?>"><?=$product->name?></a></p>
              <!-- /PRODUCT PREVIEW TITLE -->
        
              <!-- PRODUCT PREVIEW CATEGORY -->
              <p class="product-preview-category digital"><a href="marketplace-category.html">Only <?=$product->qte?> left</a></p>
              <!-- /PRODUCT PREVIEW CATEGORY -->
        
              <!-- PRODUCT PREVIEW TEXT -->
              <p class="product-preview-text"><?=substr($product->description, 0, 50)?>..</p>
              <!-- /PRODUCT PREVIEW TEXT -->
            </div>
            <!-- /PRODUCT PREVIEW INFO -->
        
            <!-- PRODUCT PREVIEW META -->
            <div class="product-preview-meta">
              <!-- PRODUCT PREVIEW AUTHOR -->
              <div class="product-preview-author">
                <!-- PRODUCT PREVIEW AUTHOR IMAGE -->
                <!-- /PRODUCT PREVIEW AUTHOR IMAGE -->
        
                <!-- PRODUCT PREVIEW AUTHOR TITLE -->
                <p class="product-preview-author-title">Posted By</p>
                <!-- /PRODUCT PREVIEW AUTHOR TITLE -->
        
                <!-- PRODUCT PREVIEW AUTHOR TEXT -->
                <p class="product-preview-author-text"><a href="profile-timeline.html"><?=$product->getCompany()->name?></a></p>
                <!-- /PRODUCT PREVIEW AUTHOR TEXT -->
              </div>
              <!-- /PRODUCT PREVIEW AUTHOR -->
        
              <!-- RATING LIST -->
              <div class="rating-list">
                <!-- RATING -->
                <div class="rating filled">
                  <!-- RATING ICON -->
                  <svg class="rating-icon icon-star">
                    <use xlink:href="#svg-star"></use>
                  </svg>
                  <!-- /RATING ICON -->
                </div>
                <!-- /RATING -->
        
                <!-- RATING -->
                <div class="rating filled">
                  <!-- RATING ICON -->
                  <svg class="rating-icon icon-star">
                    <use xlink:href="#svg-star"></use>
                  </svg>
                  <!-- /RATING ICON -->
                </div>
                <!-- /RATING -->
        
                <!-- RATING -->
                <div class="rating filled">
                  <!-- RATING ICON -->
                  <svg class="rating-icon icon-star">
                    <use xlink:href="#svg-star"></use>
                  </svg>
                  <!-- /RATING ICON -->
                </div>
                <!-- /RATING -->
        
                <!-- RATING -->
                <div class="rating filled">
                  <!-- RATING ICON -->
                  <svg class="rating-icon icon-star">
                    <use xlink:href="#svg-star"></use>
                  </svg>
                  <!-- /RATING ICON -->
                </div>
                <!-- /RATING -->
        
                <!-- RATING -->
                <div class="rating">
                  <!-- RATING ICON -->
                  <svg class="rating-icon icon-star">
                    <use xlink:href="#svg-star"></use>
                  </svg>
                  <!-- /RATING ICON -->
                </div>
                <!-- /RATING -->
              </div>
              <!-- /RATING LIST -->
            </div>
            <!-- /PRODUCT PREVIEW META -->
        </div>
<?php
  }
?>
</div>






<!-- app -->
<script src="/public/js/utils/app.js"></script>
<!-- page loader -->
<script src="/public/js/utils/page-loader.js"></script>
<!-- simplebar -->
<script src="/public/js/vendor/simplebar.min.js"></script>
<!-- liquidify -->
<script src="/public/js/utils/liquidify.js"></script>
<!-- XM_Plugins -->
<script src="/public/js/vendor/xm_plugins.min.js"></script>
<!-- tiny-slider -->
<script src="/public/js/vendor/tiny-slider.min.js"></script>
<!-- chartJS -->
<script src="/public/js/vendor/Chart.bundle.min.js"></script>
<!-- global.hexagons -->
<script src="/public/js/global/global.hexagons.js"></script>
<!-- global.tooltips -->
<script src="/public/js/global/global.tooltips.js"></script>
<!-- global.popups -->
<script src="/public/js/global/global.popups.js"></script>
<!-- global.charts -->
<script src="/public/js/global/global.charts.js"></script>
<!-- header -->
<script src="/public/js/header/header.js"></script>
<!-- sidebar -->
<script src="/public/js/sidebar/sidebar.js"></script>
<!-- content -->
<script src="/public/js/content/content.js"></script>
<!-- form.utils -->
<script src="/public/js/form/form.utils.js"></script>
<!-- SVG icons -->
<script src="/public/js/utils/svg-loader.js"></script>
</body>
</html>