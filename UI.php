<html>
<header>
<style>
.main-body{
	
	
	background-color:#d6d3d3;
	margin-left:25%;
	margin-right:25%;
	padding:5%
}
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</header>
<body>
<?php
include("DB_connection.php");


if(isset($_POST['update']))
{
$id=$_POST['user_id'];
$name=$_POST['f_name'];
$address=$_POST['address'];
$dob=$_POST['dob'];
$e_mail=$_POST['e_mail'];

$update="update registration set name='".$name."',
address='".$address."', dob='".$dob."' where id='".$id."'";
$result=mysqli_query($connection, $update) or die(mysqli_error());
if($result){
	echo "successfully updated";
}else{echo"error";}
}

if (isset($_POST['save'])){
	// echo $_POST['f_name'];
$sql= "insert into registration(name,address,dob,e_mail) values('".mysqli_real_escape_string($connection,$_POST['f_name'])."','".mysqli_real_escape_string($connection,$_POST['address'])."','".mysqli_real_escape_string($connection,$_POST['dob'])."','".mysqli_real_escape_string($connection,$_POST['e_mail'])."')";
$query=mysqli_query($connection,$sql);
echo $query;
}



?>


	<div class="">
		<div class="main-body">
			<h3>Registertion form</h3>
			
			<form class="row g-3" method="POST">
			
			  <div class="col-12">
				 <label for="inputAddress" class="form-label">Name</label>
				<input class="form-control form-control-sm" type="text" name="f_name" id="f_name" required />
			  </div>
			  <div class="col-12">
				 <label for="inputAddress" class="form-label">Address</label>
				<input type="text" name="address" id="address" class="form-control form-control-sm" required/>
			  </div>
			  <div class="col-12">
				 <label for="inputAddress" class="form-label">DOB</label>
				<input type="date" max="<?php echo date('Y-m-d'); ?>" name="dob" id="dob" class="form-control form-control-sm" required/>
			  </div>
			  <div class="col-12">
				 <label for="inputAddress" class="form-label">E-mail</label>
				<input type="email" placeholder="Eg:abcdef@gmail.com" name="e_mail"  id="e_mail" class="form-control form-control-sm" required/>
			  </div>
			 
			 
			  <div class="col-12">
				<button  class="btn btn-primary" type="submit"  name="save" id="save" class="btn">Submit</button>
			  </div>
			</form>
			
			<!--<form action="" method="POST">
		
				<div class="box-row">					
					<label>Name</label>
					<input type="text" name="f_name" id="f_name" class="box"/>
				</div>
				<div class="box-row">
					<label>Address</label>
					<input type="text" name="address" id="address" class="box"/>
				</div>				
				<div class="box-row">
					<label>DOB</label>
					<input type="date" name="dob" id="dob" class="box"/>
				</div>
				<div class="box-row">
					<label>E-mail</label>
					<input type="mail" placeholder="Eg:abcdef@gmail.com" name="e_mail"  id="e_mail" class="box"/>
				</div>
				<div class="box-row">
					<button type="submit"  name="save" id="save" class="btn">Submit</button>
				</div>
				
			</form>-->
		</div>
	</div>
	<?php
	$sql="select * from registration";
	$result=mysqli_query($connection,$sql);
	
	?>
	<br><br>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Address</th>
			<th>DOB</th>
			<th>Edit</th>
		</tr>
		<?php
		while($row=mysqli_fetch_assoc($result)){
			
		?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['dob']; ?></td>
			<td><?php echo $row['e_mail']; ?></td>
			<td><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
			<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
		</tr>
		<?php
			}
		?>
	</table>
	
	
</body>
</html>