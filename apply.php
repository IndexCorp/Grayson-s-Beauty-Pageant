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


		<?php 

            if(isset($_POST['apply'])) {
                $name = $_POST['name'];
                $lastname = $_POST['lastname'];
                $phone_number = $_POST['phone_number'];
                $email = $_POST['email'];
                $subject = $_POST['subject'];
                $address = $_POST['address'];
                $bio = $_POST['bio'];
                $category = $_POST['category'];
                $chapter = $_POST['chapter'];
                
                if(!empty($name) || !empty($lastname) || !empty($phone_number) || !empty($email) || !empty($subject) || !empty($address) || !empty($bio) || !empty($pics)) {
            
                $name = $getFromU->checkInput($name);
                $lastname = $getFromU->checkInput($lastname);
                $phone_number = $getFromU->checkInput($phone_number);
                $email = $getFromU->checkInput($email);
                $subject = $getFromU->checkInput($subject);
                $address = $getFromU->checkInput($address);
                $bio = $getFromU->checkInput($bio);
                $category = $getFromU->checkInput($category);
                $chapter = $getFromU->checkInput($chapter);
                $table_name = 'apply';
            
                    if(strlen($name) <= 2 || strlen($lastname) <= 2) {
                        echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><span aria-hidden="true">&times;</span></button><strong>Name should be more than 2 Characters</strong></div>';
                    } else {
                        if(strlen($phone_number) <= 10) {
                            echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><span aria-hidden="true">&times;</span></button><strong>Incomplete Phone Number</strong></div>';
                        } else {
                            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><span aria-hidden="true">&times;</span></button><strong>Invalid Email Address</strong></div>';
                            } else {
                                if($getFromU->checkEmail($email, $table_name) == true) {
                                    echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><span aria-hidden="true">&times;</span></button><strong>Email Existing</strong></div>';
                                } else {
                                    if(isset($_FILES['pics'])) {
                                        if(!empty($_FILES['pics']['name'][0])) {
                                            $fileRoot = $getFromU->uploadImage($_FILES['pics']);
                                            $getFromU->create('apply', array('firstname'=>$name, 'lastname' => $lastname, 'phonenumber'=>$phone_number, 'email' => $email, 'category' => $category, 'chapter' => $chapter, 'subject'=>$subject, 'address' => $address, 'bio' => $bio, 'image' => $fileRoot));
                                            echo '<div class="alert alert-success alert-dismissible text-center" role="alert"><strong>Application Submission Successful</strong></div>';
                                        }
                                    }
                                }
                            }
                        }
                    }
                
                }
            }
            
        ?>


		<div class="page-content" style="background-image: url('assets/bea.jpg')">
			<div class="form-v9-content">
				<form class="form-detail" action="" method="POST" enctype="multipart/form-data">
					<h2>Application Form</h2>
					<div class="form-row-total">
						<div class="form-row">
                        	<input type="text" name="name" class="input-text" id="name" placeholder="First Name" required>
						</div>
						<div class="form-row">
                        	<input type="text" class="input-text" name="lastname" id="lastname" placeholder="Last Name" required>
						</div>
					</div>
					<div class="form-row-total">
						<div class="form-row">
                        	<input type="digit" name="phone_number" class="input-text" id="phone-number" placeholder="Phone Number" required>
						</div>
						<div class="form-row">
                        	<input type="email" class="input-text" name="email" id="email" placeholder="Email Address" required>
						</div>
					</div>
					<div class="form-row-total">
						<div class="form-row">
							<select class="form-control" name="category" id="category" required>
								<option value="">Select Category</option>
								<option value="imperfectly-perfect">Imperfectly Perfect</option>
								<option value="blemished">Blemished</option>
							</select>
						</div>
						<div class="form-row">
                        	<input type="text" class="input-text" name="subject" id="subject" placeholder="Subject" required>
						</div>
					</div>
					<div class="form-row-total">
						<div class="form-row">
							<select class="form-control" name="chapter" id="chapter" required>
								<option value="">Select Chapter</option>
								<?php foreach($chapters as $chap): ?>
									<option value="<?=$chap->id?>"><?=$chap->chapter?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-row">
                        	<input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
						</div>
					</div>
					<div class="form-row-total">
                    	<textarea class="form-control my-3" name="bio" rows="5" placeholder="Bio Statement (One Paragraph max 300 words)." required></textarea>
					</div>
					<div class="form-row-total">
						<div class="form-row">
							<span class="" style="font-weight: 600;">Upload your Headshot Image *</span><br>
							<span class="fst-italic">One high Resolution, color image (max. 5mb)</span>
						</div>
						<div class="form-row">
                        	<input type="file" name="pics" class="form-control" style="padding-top: 10px;" id="pics" required>
						</div>
					</div>
					<div class="form-row-last">
						<!-- <input type="submit" name="register" class="register" value="Register"> -->
						<button class="btn btn-warning register" type="submit" name="apply">Register</button>
					</div>
				</form>
			</div>
		</div>

	
		</div>
	</section>

<?php 
  	include("navigate/footer.php");
?>
