<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log Call</title>

	
<?php

require_once ('db.php');
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
$sql = "SELECT * FROM incident_type";
$result = $conn->query($sql);
$incidentTypes = [];

while ($row = $result->fetch_assoc())
{
	$id = $row['incident_type_id'];
	$type = $row['incident_type_desc'];
	$incidentType = ["id" => $id, "type" => $type];
	array_push($incidentTypes, $incidentType);
}
$conn->close();
	
?>


<script type="text/javascript">
function validateForm()
	{
		var x=document.forms["frmLogCall"]["callerName"].value;
		
		if (/[^a-zA-Z ]/.test(x))
		{
			alert("Caller name must contain alphabet characters only.");
			return false;
		}
		
		
		var z = document.forms["frmLogCall"]["contactNo"].value;
            
		if (z == "")
		{
			alert("Contact number is required.");
                return false;
		}
            
		else if (isNaN(z))
		{
			alert("Contact number must be 8 digits with no spaces and symbols.")
			return false;
		}
 
		
		var x=document.forms["frmLogCall"]["locationOfIncident"].value;
		
		if (x==null || x=="")
		{
			alert("Location of incident is required.");
			return false;
		}
		
		
		var x=document.forms["frmLogCall"]["typeOfIncident"].value;
		if (x==null || x=="")
		{
			alert("Type of incident is required.");
			return false;
		}
		
		
		var x=document.forms["frmLogCall"]["descriptionOfIncident"].value;
		
		if (x==null || x=="")
		{
			alert("Description of incident is required.");
			return false;
		}
  
		// may add code for validating other inputs
	}

</script>
	
<link href="css/bootstrap.css" rel="stylesheet">
<style type="text/css"></style>

</head>

<body>
	<div class="container" style="width: 930px">
		
		<header>
			
		<img src="images/banner.jpg" width="900" height="200" alt="" />
			
		</header>
		
		
		<?php
		require_once ('nav.php');
		?>
		
		<section style="margin-top: 20px">
			
			<form name="frmLogCall" onsubmit="return validateForm()" action="dispatch.php" method="post">
				
				<div class="form-group row">
					
					<label for="callerName" class="col-sm-4 col-form-label">Caller's Name</label>
					
					<div class="col-sm-8">
					
					<input type="text" class="form-control" id="callerName" name="callerName">
						
					</div>
				</div>
				
				
				<div class="form-group row">
					
					<label for="contactNo" class="col-sm-4 col-form-label">Contact Number (Required)</label>
					
					<div class="col-sm-8">
						
						<input maxlength="8" minlength="8" type="text" class="form-control" id="contactNo" name="contactNo">
						
					</div>
				</div>
				
				
				<div class="form-group row">
					
					<label for="LocationOfIncident" class="col-sm-4 col-form-label">Location of Incident (Required)</label>
					
					<div class="col-sm-8">
						
						<input type="text" class="form-control" id="locationOfIncident" name="locationOfIncident">
						
					</div>
				</div>
				
				
				<div class="form-group row">
					
					<label for="typeOfIncident" class="col-sm-4 col-form-Label">Type of Incident (Required)</label>
					
					<div class="col-sm-8">
		
						<select id="typeOfIncident" class="form-control" name="typeOfIncident">
							
							<option value="">Select</option>
							
							<?php
							
							for ($i = 0;$i < count($incidentTypes);$i++)
							{
								$incidentType = $incidentTypes[$i];
								echo '<option value ="' . $incidentType['id'] . '">' . $incidentType['type'] . '</option>';
							}
							
							?>
						
						</select>
						
					</div>
				</div>
				
				
				<div class="form-group row">
					
					<label for="descriptionOfIncident" class="col-sm-4 col-form-label">Description of Incident (Required)</label>
					
					<div class="col-sm-8">
						
						<textarea name="descriptionOfIncident" class="form-control" rows="5" id="descriptionOfIncident"></textarea>
					
					</div>
				</div>
				
				
				<div class="form-group row">
					
					<div class="col-sm-4"></div>
					<div class="col-sm-8" style="text-align: center">
						
						<input type="submit" class="btn btn-primary" name="btnProcessCall" type="submit" value="Process Call">
						
						 <input type="reset" class="btn btn-primary" name="btnReset" value="Reset">
						
					</div>
				</div>
			</form>
		</section>
		
		<footer class="page-footer font-small blue pt-4 footer-copyright text-center py-3">
			
			Â© 2020 Copyright: <a href="https://www.ite.edu.sg"> ITE </a>
			
		</footer>
	</div>
	
	<script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>
	
	<script type="text/javascript" src="js/popper.min.js"></script>
	
	<script type="text/javascript" src="js/bootstrap.js"></script>
	
	
	
</body>
</html>