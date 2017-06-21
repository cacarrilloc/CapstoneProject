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
    if(isset($_POST["adminEmail"])) {
        $query = <<<stmt
        SELECT id FROM admins WHERE email=?;
stmt;
        $my_stmt = $dbConnection->prepare($query);
        $p1 = $_POST["adminEmail"];
    
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
		$query = <<<stmt
		UPDATE admins SET first_name=?, last_name=?, password=? WHERE email=?;
stmt;
		$my_stmt = $dbConnection->prepare($query);
		$my_stmt->bind_param('ssss', $p2, $p3, $p4, $p1);
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
	if(!($stmt = $mysqli->prepare("SELECT first_name, last_name, email, password FROM admins WHERE email=?"))){
    	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    }
    if(!($stmt->bind_param("s", $user))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
    if(!$stmt->execute()){
    	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($first_name, $last_name, $email, $password)){
    	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    while($stmt->fetch()){ }
    $stmt->close();
?>

<div class="giveMePadding">
<?php 
	if(isset($_POST["adminEmail"])) {
        $query = <<<stmt
        SELECT first_name, last_name, email, password FROM admins WHERE email =?;
stmt;
		$p1 = $_POST["adminEmail"];
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
        <h4>Enter the information you want to update into the corresponding fields. Then click on the "UPDATE INFO" button. </h4>

        <form method="POST" action="update_adminInfo.php">
            <fieldset class="form-group">
                <label for="firstName">Update First Name: </label>
                <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $first_name ?>">
            </fieldset>
            <fieldset class="form-group">
                <label for="lastName">Update Last Name: </label>
                <input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo $last_name ?>">
            </fieldset>
            <fieldset class="form-group">
                <label for="adminEmail">Update Email Address: </label>
                <input type="text" class="form-control" name="adminEmail" id="adminEmail" value="<?php echo $email ?>">
            </fieldset>
            <fieldset class="form-group">
                <label for="password"> Update Password: </label>
                <input type="password" class="form-control" name="password" id="password" value="<?php echo $password ?>">
            </fieldset></br></br>
            <input type="submit" class="btn btn-default" style="width:370px" value="UPDATE INFO" id="updateUserButton"></input>
        </form></br></br>

        <form method="POST" action="admin_console.php">
            <input type="submit" class="btn btn-default" style="width:370px" value="GO TO ADMIN CONSOLE" id="mainPage"></input>
        </form>
   </div></br></br></br></br>
</div>
</div>

<?php
	include 'template_append.php';
?>
