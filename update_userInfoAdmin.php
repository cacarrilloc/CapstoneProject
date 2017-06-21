<?php
	include 'template_prepend.php';
	/*Query and PHP to populate fields with default user information*/
	$user=$_SESSION['SESS_USER_NAME'];
	   $mysqli=new mysqli($dbHost,$dbUserName,$dbPassword,$dbName);
    if($mysqli->connect_errno) {
        echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
	if(!($stmt = $mysqli->prepare("SELECT first_name, last_name, email, password, city, state, country FROM users WHERE email=?"))){
    	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    }
    if(!($stmt->bind_param("s", $user))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
    if(!$stmt->execute()){
    	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($first_name, $last_name, $email, $password, $city, $state, $country)){
    	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    while($stmt->fetch()){ }
    $stmt->close();
?>

<div class="giveMePadding">
    <div class="giveMePadding">
        </br></br>
        <button class = "btn-second" onclick="myFunction()">HELP</button>
        <script>
        function myFunction() {
            alert("HOW TO USE THE APPLICATION: \nIf you are existing user or administrator please use EXISTING USER or EXISTING ADMIN buttons. If you are new to the application you would need first to create an accout by using NEW USER button. Upon using this button you will be redirected to a page where you can create your new acount and start using application features such as uploading NASA images and sharing them with your friends via email or Facebook.");
        }
        </script>
        <a href="index.php"><button class = "btn-second" style="color:white;">SIGN OUT</button></a></br></br>
        <h1 class="page-header"><strong>UPDATE YOUR PERSONAL INFORMATION</strong></h1>
			<h4>Enter the information you want to update into the corresponding fields. Then click on the "UPDATE INFO" button. </h4>

        <form method="POST" action="update_userAdmin.php">
            <fieldset class="form-group" style="width:580px">
				<label for="firstName">Update First Name: </label>
				<input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $first_name ?>">
            </fieldset>
            <fieldset class="form-group" style="width:580px" style="width:580px">
				<label for="lastName">Update Last Name: </label>
				<input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo $last_name ?>">
            </fieldset>
            <fieldset class="form-group" style="width:580px">
				<label for="userEmail">Update Email Address: </label>
				<input type="text" class="form-control" name="userEmail" id="userEmail" value="<?php echo $email ?>">
            </fieldset>
            <fieldset class="form-group" style="width:580px">
				<label for="password"> Update Password: </label>
				<input type="password" class="form-control" name="password" id="password" value="<?php echo $password ?>">
            </fieldset>
            <fieldset class="form-group" style="width:580px">
				<label for="userCity">Update City: </label>
				<input type="text" class="form-control" name="userCity" id="userCity" value="<?php echo $city ?>">
            </fieldset>
            <fieldset class="form-group" style="width:580px">
				<label for="userState">Update State: </label>
				<input type="text" class="form-control" name="userState" id="userState" value="<?php echo $state ?>">
            </fieldset>
            <fieldset class="form-group" style="width:580px">
				<label for="userCountry">Update Country: </label>
				<input type="text" class="form-control" name="userCountry" id="userCountry" value="<?php echo $country ?>">
            </fieldset></br></br>
            <input type="submit" class="btn btn-default" style="width:580px" value="UPDATE INFO" id="updateUserButton"></input>
        </form>
    </div></br></br></br></br>
</div>

<?php
	include 'template_append.php';
?>
