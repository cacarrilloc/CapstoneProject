<?php
    include 'template_prepend.php';
    echo '</br></br>';
    echo '<div class="giveMePadding">
                <div class="giveMePadding">
                    </br></br>
                    <button class = "btn-second" onclick="myFunction()">HELP</button>
                    <script>
                    function myFunction() {
                        alert("HOW TO USE THE APPLICATION: \nIf you are existing user or administrator please use EXISTING USER or EXISTING ADMIN buttons. If you are new to the application you would need first to create an accout by using NEW USER button. Upon using this button you will be redirected to a page where you can create your new acount and start using application features such as uploading NASA images and sharing them with your friends via email or Facebook.");
                    }
                    </script>
                    <a href="index.php"><button class = "btn-second" style="color:white;">SIGN OUT</button></a>
                </div>
            </div>';
$query;
    if(isset($_POST["userEmail"])) {
        $query = <<<stmt
        SELECT id FROM users WHERE email=?;
stmt;
        $my_stmt = $dbConnection->prepare($query);
        $p1 = $_POST["userEmail"];
    
        $my_stmt->bind_param('s', $p1);
        $my_stmt->execute();
        $my_stmt->store_result();
        $my_stmt->bind_result($id);

        if($my_stmt->num_rows) {
            $p2 = "";
            if(isset($_POST["firstName"])) {
                $p2 = $_POST["firstName"];
            }
            $p3 = "";
            if(isset($_POST["lastName"])) {
                $p3 = $_POST["lastName"];
            }
            $p4 = "";
            if(isset($_POST["password"])) {
                $p4 = $_POST["password"];
            }
            $p5 = "";
            if(isset($_POST["userCity"])) {
                $p5 = $_POST["userCity"];
            }
            $p6 = "";
            if(isset($_POST["userState"])) {
                $p6 = $_POST["userState"];
            }
            $p7 = "";
            if(isset($_POST["userCountry"])) {
                $p7 = $_POST["userCountry"];
            }
		$query = <<<stmt
		UPDATE users SET first_name=?, last_name=?, password=?, city=?, state=?, country=? WHERE email=?;
stmt;
		$my_stmt = $dbConnection->prepare($query);
		$my_stmt->bind_param('sssssss', $p2, $p3, $p4, $p5, $p6, $p7, $p1);
		$my_stmt->execute();
        
        echo "</br></br></br>";
        echo '<div class="giveMePadding">
                    <div class="giveMePadding">
                        <p><h3>'.$p1.' information has been successfully updated!</p>
                    </div>
                </div>';
	} else {
		echo "</br></br></br>";
            echo '<div class="giveMePadding">
                    <div class="giveMePadding">
                        </br></br>
                        <p><h3> We could not find your credentials in our database</p>
                    </div></br></br></br></br>
                  </div>';
	}
	$my_stmt->close();
}
?>

<?php
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
<?php 
	if(isset($_POST["userEmail"])) {
        $query = <<<stmt
        SELECT first_name, last_name, email, password, city, state, country FROM users WHERE email =?;
stmt;
		$p1 = $_POST["userEmail"];
		if (($my_stmt = $dbConnection->prepare($query))) {
            $my_stmt->bind_param('s', $p1);
            $my_stmt->execute();
            $result = $my_stmt->get_result();
            $i = 0;
            $colHeaders = array();
            $colData = array();
            while($row = mysqli_fetch_assoc($result)) {
                if($i == 0) {
                    foreach($row as $colHeader => $val) {
                        $colHeaders[] = $colHeader;
                    }
                }
                $colData[] = $row;
                $i++;
            }
            echo '<h2 class="page-header" style="color:yellow;">Data Updated</h2>
            <div class="giveMePadding">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>email</th>
                                <th>Password</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                            </tr>
                        </thead>
                    <tbody>';
                        foreach($colData as $r) {
                            echo "<tr>";
                            foreach($colHeaders as $colHeader) {
                                echo "<td>" . $r[$colHeader] . "</td>";
                            }
                            echo "</tr>";
                        }
                        echo '</tbody></table></div></div>';
        $my_stmt->close();
		}
	}
?>
    <div class="giveMePadding">
        <h1 class="page-header"><strong>UPDATE YOUR PERSONAL INFORMATION</strong></h1>
			<h3>Enter the information you want to update into the corresponding fields. Then click on the "UPDATE INFO" button.</h3>

        <form method="POST" action="update_userInfo.php">
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
        </form></br></br>

        <form method="POST" action="main_page.php">
            <input type="hidden" class="form-control" name="userEmail" id="userEmail" value="<?php echo $email ?>">
            <input type="submit" class="btn btn-default" style="width:580px" value="GO TO YOUR PAGE" id="mainPage"></input>
        </form>
    </div></br></br></br></br>
</div>
</div>


<?php
	include 'template_append.php';
?>
