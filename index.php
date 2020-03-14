<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
	<div class="jumbotron" align="center">
	  <h1>VCARD QR Code Simple</h1>
	  <p>Feel free to use. Please recheck with your scanner device before you print many!</p>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <span class="navbar-brand">Menu</span>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="">Vcard Generator <span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo $_SERVER['REQUEST_URI'];?>string.php">String Generator</a>
			  </li>
			</ul>
		  </div>
		</nav>
	</div>
	<div class="container">
		<div class = "row">
			<div class = "col-6">
				<form action="" method="post">
				  <div class="form-group row">
					<label for="name" class="col-4 col-form-label">Name</label> 
					<div class="col-8">
					  <div class="input-group">
						<div class="input-group-prepend">
						  <div class="input-group-text">
							<i class="fa fa-address-card"></i>
						  </div>
						</div> 
						<input id="name" name="name" type="text" class="form-control" required="required">
					  </div>
					</div>
				  </div>
				  <div class="form-group row">
					<label for="personal_phone" class="col-4 col-form-label">Personal Phone Number</label> 
					<div class="col-8">
					  <div class="input-group">
						<div class="input-group-prepend">
						  <div class="input-group-text">
							<i class="fa fa-phone"></i>
						  </div>
						</div> 
						<input id="personal_phone" name="personal_phone" type="number" class="form-control" required="required">
					  </div>
					</div>
				  </div>
				  <div class="form-group row">
					<label for="work_phone" class="col-4 col-form-label">Work Phone Number</label> 
					<div class="col-8">
					  <div class="input-group">
						<div class="input-group-prepend">
						  <div class="input-group-text">
							<i class="fa fa-phone-square"></i>
						  </div>
						</div> 
						<input id="work_phone" name="work_phone" type="number" class="form-control">
					  </div>
					</div>
				  </div>
				  <div class="form-group row">
					<label for="email" class="col-4 col-form-label">Email</label> 
					<div class="col-8">
					  <div class="input-group">
						<div class="input-group-prepend">
						  <div class="input-group-text">
							<i class="fa fa-envelope-o"></i>
						  </div>
						</div> 
						<input id="email" name="email" type="email" class="form-control" required="required">
					  </div>
					</div>
				  </div>
				  <div class="form-group row">
					<label for="company" class="col-4 col-form-label">Company</label> 
					<div class="col-8">
					  <div class="input-group">
						<div class="input-group-prepend">
						  <div class="input-group-text">
							<i class="fa fa-building"></i>
						  </div>
						</div> 
						<input id="company" name="company" type="text" class="form-control">
					  </div>
					</div>
				  </div>
				  <div class="form-group row">
					<label for="job_title" class="col-4 col-form-label">Job Title</label> 
					<div class="col-8">
					  <div class="input-group">
						<div class="input-group-prepend">
						  <div class="input-group-text">
							<i class="fa fa-address-card"></i>
						  </div>
						</div> 
						<input id="job_title" name="job_title" type="text" class="form-control">
					  </div>
					</div>
				  </div>
				  <div class="form-group row">
					<label for="website" class="col-4 col-form-label">Website</label> 
					<div class="col-8">
					  <div class="input-group">
						<div class="input-group-prepend">
						  <div class="input-group-text">
							<i class="fa fa-chain-broken"></i>
						  </div>
						</div> 
						<input id="website" name="website" type="url" class="form-control">
					  </div>
					</div>
				  </div> 
				  <div class="form-group row">
					<div class="offset-4 col-8">
					  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
					</div>
				  </div>
				</form>
			</div>
			<div class="col-6">
			<?php
			include "phpqrcode-master/qrlib.php";
			if (!empty($_POST))
			{
				$name = $_POST['name'];
				$personal_phone = $_POST['personal_phone'];
				$work_phone = $_POST['work_phone'];
				$email = $_POST['email'];
				$company = $_POST['company'];
				$job_title = $_POST['job_title'];
				$website = $_POST['website'];
				
				if(empty($name) || empty($personal_phone) || empty($email))
				{
					echo "Name - Personal Phone Number - Email are Mandatory!";
					exit();
				}
				
				 // we building raw data
				$codeContents  = 'BEGIN:VCARD'."\n";
				$codeContents .= 'VERSION:3.0'."\n";
				$codeContents .= 'N:'.$name."\n";
				$codeContents .= 'TEL;TYPE=cell:'.$personal_phone."\n";
				$codeContents .= 'EMAIL:'.$email."\n";
				
				if(!empty($work_phone)){
					$codeContents .= 'TEL;WORK;VOICE:'.$work_phone."\n";				
				}
				if(!empty($company)){
					$codeContents .= 'ORG:'.$company."\n";				
				}
				if(!empty($website)){
					$codeContents .= 'URL:'.$website."\n";				
				}
				if(!empty($job_title)){
					$codeContents .= 'TITLE:'.$job_title."\n";				
				}
				$codeContents .= 'END:VCARD';
				
				print_r($codeContents);
				$filename = md5($codeContents.date("Y-m-d h:i:sa")).'.png';
				// generating
				QRcode::png($codeContents, 'temp/'.$filename, "L", 7);
				echo '<div class="row"><img src=temp/'.$filename.' /></div>';
				// benchmark
				QRtools::timeBenchmark(); 
			}
			?>
			</div>
		</div>
	</div>
  </body>
</html>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
