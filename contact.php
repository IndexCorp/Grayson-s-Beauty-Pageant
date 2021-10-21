<?php 
  include("navigate/header.php");
?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact Us</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

      <div class="contact-header">
        <center><h6>Please fill out the form below if you have any information to relay to us.</h6></center>
      </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>IBADAN, OYO-STATE, NIGERIA.</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>graysonsmodels@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+234 805 0833 181<br>
                +234 811 5788 405</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

          <?php 
              if(isset($_POST['contact'])) {
                  $name = $_POST['name'];
                  $email = $_POST['email'];
                  $subject = $_POST['subject'];
                  $message = $_POST['message'];

                  if(!empty($name) || !empty($email) || !empty($subject) || !empty($message)) {
                            
                      $name = $getFromU->checkInput($name);
                      $email = $getFromU->checkInput($email);
                      $subject = $getFromU->checkInput($subject);
                      $message = $getFromU->checkInput($message);
                      $table_name = 'contact';

                      if(strlen($name) <= 6) {
                        echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Warning!&nbsp;</strong>Name should be atleast 7 Characters</div>';
                      } else {
                          if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Warning!&nbsp;</strong>Invalid Email Address</div>';
                          } else {
                              if($getFromU->checkEmail($email, $table_name) == true) {
                                  echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Warning!&nbsp;</strong>Email Existing</div>';
                              } elseif(strlen($message) <= 19) {
                                  echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Warning!&nbsp;</strong>Your Message should be atleast 20 Characters</div>';
                              } else {
                                  $getFromU->create('contact', array('fullname'=>$name, 'email' => $email, 'subject'=>$subject, 'message' => $message));
                                  echo '<div class="alert alert-success alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Success&nbsp;</strong>We will get back to you shortly</div>';
                              }
                          }
                      }
                  }
              }
          ?>

            <form action="" method="post" role="form" class="">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="FullName" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Discuss" required></textarea>
              </div>
              <div class="text-center"><button name="contact" class="btn btn-danger" type="submit">Send Message</button></div>
            </form>

          </div>
          
        <!-- <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div> -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <?php 
    include("navigate/footer.php");
  ?>
