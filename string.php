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
			  <li class="nav-item">
				<a class="nav-link" href="/simpleQrGenerator">Vcard Generator</a>
			  </li>
			  <li class="nav-item active">
				<a class="nav-link" href="">String Generator <span class="sr-only">(current)</span></a>
			  </li>
			</ul>
		  </div>
		</nav>
	</div>
	<div class="container">
		<div class = "row">
			<div class = "col-6">
				<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
				  <div class="form-group row">
					<label for="textarea" class="col-4 col-form-label">Any text here!</label> 
					<div class="col-8">
					  <textarea id="text" name="text" cols="40" rows="5" class="form-control"></textarea>
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
				$text = $_POST['text'];
				
				if(empty($text))
				{
					echo "Text are Mandatory!";
					exit();
				}
				
				$filename = md5($text.date("Y-m-d h:i:sa")).'.png';
				// generating
				QRcode::png($text, 'temp/'.$filename, "L", 7);
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
