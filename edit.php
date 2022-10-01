<html>
<header>
<style>
.main-body{
	
	
	background-color:#d6d3d3;
	margin-left:25%;
	margin-right:25%;
	padding:3%
}
</style>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</header>
<body>
<?php
include("DB_connection.php");

$id=$_GET['id'];
$sql="SELECT * from registration where id ='".$id."'";

$query=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($query);

if(isset($_POST['update']))
{
 
$name=$_POST['f_name'];
$address=$_POST['address'];
$dob=$_POST['dob'];
$e_mail=$_POST['e_mail'];

echo $update="update registration set name='".$name."',
address='".$address."', dob='".$dob."' where id='".$id."'";

$update="update registration set name='".$name."',
address='".$address."', dob='".$dob."' where id='".$id."'";
$result=mysqli_query($connection, $update) or die(mysqli_error());
if($result){
	echo "success";
}else{echo"error";}
}

?>
	<div class="">
		<div class="main-body">
			<h3>Registration form</h3>
			<form action="UI.php" method="POST">
				<div class="col-12">
				<label for="inputEmail4" class="form-label">Id</label>
					<input type="text" name="user_id" id="user_id" value="<?php echo $row['id'];?>" class="form-control form-control-sm" />
				</div>
				<div class="col-12">
				<label for="inputEmail4" class="form-label">Name</label>
					<input type="text" name="f_name" id="f_name" value="<?php echo $row['name'];?>" class="form-control form-control-sm" />
				</div>
				<div class="col-12">
				<label for="inputEmail4" class="form-label">Address</label>
					<input type="text" name="address" id="address" value="<?php echo $row['address'];?>" class="form-control form-control-sm" />
				<div class="col-12">
				<label for="inputEmail4" class="form-label">DOB</label>
					<input type="date" name="dob" id="dob" value="<?php echo $row['dob'];?>" class="form-control form-control-sm" />
				</div>
				<div class="col-12">
				<label for="inputEmail4" class="form-label">E-mail</label>
					<input type="mail" placeholder="Eg:abcdef@gmail.com" name="e_mail"  id="e_mail" value="<?php echo $row['e_mail'];?>" class="form-control form-control-sm" />
				</div>
				<br>
				<div class="col-md-6">
					<button  class="btn btn-primary" type="submit"  name="update" id="update" class="btn">Update</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>