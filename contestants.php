<?php 

  include("navigate/header.php");

  if(isset($_GET["chapter"])){
    $chapt = $_GET["chapter"];
    // echo "<script>alert('".$chapt."');</script>";
  } else {
      $chapt = '';
  }

?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contestants</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Contestants</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".imperfectly-perfect">Imperfectly Perfect</li>
              <li data-filter=".blemished">Blemished</li>
            </ul>
          </div>
        </div>

        <?php 
            // $information = $getFromU -> selectTable('apply');
            $information = $getFromU -> select_cond_table('apply', 'chapter', $chapt)
        ?>

        <div class="row portfolio-container">

          <?php foreach($information as $info): ?>
              <div class="col-lg-3 col-md-6 portfolio-item <?= $info->category; ?>">
                <div class="portfolio-wrap">
                  <img src="applyImages/<?=$info->image?>" class="img-fluid" alt="">
                  <center><caption class="text-center"><?=$info->firstname?>&nbsp;<?=$info->lastname?></caption></center>
                  <div class="portfolio-info">
                    <p class="location"><?=$info->address?></p>
                    <div class="portfolio-links">
                      <a href="<?=$info->image?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title=""><i class="bx bx-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
          <?php endforeach; ?>
          
          <!-- <div class="col-lg-3 col-md-6 portfolio-item blemished">
            <div class="portfolio-wrap">
              <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
              <center><caption class="text-center">Amanda Jepson</caption></center>
              <div class="portfolio-info">
                <p class="location">From Olomi, Ibadan, Nigeria</p>
                <div class="portfolio-links">
                  <a href="assets/img/team/team-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title=""><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div> -->

        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <?php 
    include("navigate/footer.php");
  ?>
