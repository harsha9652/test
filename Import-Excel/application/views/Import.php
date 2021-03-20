<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo base_url();
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Import Data</title>

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="jumbotron">
		    <h1>Import Excel data</h1>
		 </div>
	  	<div class="row">
		    <div class="col-sm-4 col-sm-offset-3">
		    	
		    	<div class="form-group">
    				
    				<?php if(isset($response)){ ?>
						<div class="alert alert-<?php echo $res_type; ?>">
						  <?php echo $response; ?>.
						</div>
					<?php } ?>
					<label class="pull-left">Import Data</label>
    				<form action="<?php echo base_url();?>import/importFile" method="post" enctype="multipart/form-data">

    					<a class="pull-right" href="<?php echo base_url('assets/file_format/templateShedule.xlsx');?>" download>Download format</a>
						<input type='file' name='uploadFile' class="form-control">

						<br>

						<!-- <button type="submit" name='upload' class="pull-right btn btn-success">Upload</button> -->
						<input type='submit' value='Upload' name='submit' class="btn btn-success pull-right">
					</form>
    			</div>	
		    </div>
		</div>
	</div>
	
	

</body>
</html>