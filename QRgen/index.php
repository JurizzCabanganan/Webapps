<?php
include('libs/phpqrcode/qrlib.php'); 

if(isset($_POST['submit']) ) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$filename=$email.time();
	$tempDir = 'temp/';

	$codeContents ='First Name='.$name.'Email='. $email;
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
}


?>
<!doctype html>
<html lang="en">
  <head>
	<title>QRGeneration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.google.com/">
	</head>
	<body style="width: 100%; background-color:lightgrey;">
		
	<div class="container mt-4"> 
		<div class="container-fluid text-center mb-5">
			<h1>QR CODE GENERATION</h1>
			<hr>
		</div>


          <div class="container-fluid d-flex p-5">

            <form id="register" method="post" action="" 
			class="col-md border rounded shadow p-3 text-center bg-white">
                <h3 class="mb-4">Register Now</h3>

                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                  </div>
                  <div class="form-group mb-3 mt-3">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                  </div>

                <button name="submit" id="register" type="submit"
                 class="btn button mt-4 mb-0 rounded-pill p-3 bg-primary text-white">PROCEED REGISTRATION</button>
            </form>
			<?php
			if(!isset($filename)){
				$filename = "alt";
			}
			?>

  		<div class="col-md-6 mt-0">
			<h3 style="text-align:center">QR Code: </h3>
				<center>
					<div class="qrframe rounded bg-white" style="border:2px solid black; width:210px; height:210px;">
							<?php echo '<img src="temp/'. @$filename.'.png" style="width:200px; height:200px; padding:10px;"><br>'; ?>
					</div>
					<a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download</a>
				</center>
  		</div>
          </div>
		  
        </div>
	<br>	


</body>
</html>