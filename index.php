<?php
class apps{
		
		public $hostname = "localhost";
		public $username = "root";
		public $password = "";
		public $database = "contact_info";
		public $links;
		
		public function __construct(){
			$this->links = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
			if($this->links->connect_error){
				echo "no connected and ";
			}else{
				echo "connected and ";
			}
		}
		
		public function insert($insert){
			$insert = $this->links->query($insert);
			if($insert){
				throw new exception;
			}
		}
	}





if(isset($_POST['submit'])){
		
		
		
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$gender = $_POST['gender'];
			
		
		
		$error = 0;
		$msg = "";
		
		if($name == ""){
			$error = $error+1;
			$user_error = "<span style='color:#f00'>* name required</span>";
			$msg .= "<p style='color:#f00'>* name Required</p>";
		}
		if($mobile == ""){
			$error = $error+1;
			$msg .= "<p style='color:#f00'>* mobile Required</p>";
		}
		
		
		
		if($error == 0){
		
			$insert = "INSERT INTO contact VALUES('', '$name', '$mobile', '$gender',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
			if($insert){
				try{
					$object = new apps;
					$object->insert($insert);
					echo "Not inserted";
				}catch(exception $e){
					echo "inserted";
					
				}
			}
		
		
		}else{
			echo $msg;
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>mobile number save system</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


	 
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<form action="" method="post">
					<div class="content"><br><h3>contact save system</h3><br></div>
					
					<input class="form-control" type="text" name="name" placeholder="type name here…"><br>
					<input class="form-control" type="text" name="mobile" placeholder="type mobile number here…"><br>
					
						<select id="inputState" name="gender" class="form-control">
							<option selected>male</option>
							<option>female</option>
						</select>
					
					<br>
					<button type="submit" name="submit" class="btn btn-primary mb-2">Confirm identity</button>

					</form>
				
			</div>
		</div>
	</div>



	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>