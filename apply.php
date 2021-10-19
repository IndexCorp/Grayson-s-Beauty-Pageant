<?php 
    include("navigate/header.php");
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>How to Apply</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Apply</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="contact" class="contact">
        <div class="container">

            <div class="contact-header">
                <p style="text-align: center; font-weight:700; color:brown;">Booking and Appearance Request for Grayson's Model Winner | Marketing, Advertising and Sponsorship Request | Hosting Request for the Competition | Become a Candidate | Any other information about the Competition</p>
                <center><h6>Please fill out the form below. We will direct your application to the Peagant Director and you will be followed up directly if you are chosen.</h6></center>
            </div>
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="First Name" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 form-group">
                        <input type="digit" name="phone_number" class="form-control" id="phone-number" placeholder="Phone Number" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Bio Statement (One Paragraph max 300 words)." required></textarea>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 form-group mt-3 mt-md-0">
                        <span class="" style="font-weight: 600;">Upload your Headshot Image *</span><br>
                        <span class="fst-italic">One high Resolution, color image (max. 5mb)</span>
                    </div>
                <div class="col-md-4 form-group">
                    <input type="file" name="pics" class="form-control" style="padding-top: 10px;" id="pics" required>
                </div>
                </div>
                <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

        </div>
    </section>

</main>

<?php 
    include("navigate/footer.php");
?>
