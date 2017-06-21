<?php
	include 'template_prepend.php';
?>
<div class="giveMePadding">
    </br></br>
    <button class = "btn-second" onclick="myFunction()">HELP</button>
    <script>
    function myFunction() {
        alert("HOW TO USE THE APPLICATION: \nIf you are existing user or administrator please use EXISTING USER or EXISTING ADMIN buttons. If you are new to the application you would need first to create an accout by using NEW USER button. Upon using this button you will be redirected to a page where you can create your new acount and start using application features such as uploading NASA images and sharing them with your friends via email or Facebook.");
    }
    </script>
    <a href="index.php"><button class = "btn-second" style="color:white;">SIGN OUT</button></a>
    <div class="giveMePadding">
        <div class="row">
			<h1 class="page-header"><strong>WELCOME TO THE ADMIN CONSOLE</strong></h1>
			<h3>The admin console can be used to modify, add, or delete both USER and ADMIN accounts from the system database as well as deleting user's data/pictures. You are also able to monitor user download activity by looking at the "USER DATA" table. Please select one of the following options: </h3>
		</div>
        <div class="row addNew">
            <a class="btn btn-default center" href="#addUser" role="button" data-toggle="collapse"><strong>+ ADD NEW USER</strong></a>
            <div id="addUser" class="collapse">
            <form method="POST" action="add_userFromAdmin.php">
                <fieldset class="form-group">
                    <small class="text-muted">The user will NOT be added if she/he is already in the system database.</small></br>
                    <label for="userFirstName">Enter New User First Name: </label>
                    <input type="text" class="form-control" name="userFirstName" id="userFirstName">
                </fieldset>
                <fieldset class="form-group">
                    <label for="userLastName">Enter New User Last Name: </label>
                    <input type="text" class="form-control" name="userLastName" id="userLastName">
                </fieldset>
                <fieldset class="form-group">
                    <label for="userEmail">Enter New User Email: </label>
                    <input type="text" class="form-control" name="userEmail" id="userEmail">
                </fieldset>
                <fieldset class="form-group">
                    <label for="userPassword">Enter New User Password: </label>
                    <input type="password" class="form-control" name="userPassword" id="userPassword">
                </fieldset>
                <fieldset class="form-group">
                    <label for="userCity">Enter New User City: </label>
                    <input type="text" class="form-control" name="userCity" id="userCity">
                </fieldset>
                <fieldset class="form-group">
                    <label for="userState">Enter New User State: </label>
                    <input type="text" class="form-control" name="userState" id="userState">
                </fieldset>
                <fieldset class="form-group">
                    <label for="userCountry">Enter New User Country: </label>
                    <input type="text" class="form-control" name="userCountry" id="userCountry">
                </fieldset></br>
                <input type="submit" class="btn btn-default" style="width:370px" value="ADD USER" id="addUserButton"></input>
            </form>
		</div></br></br>

        <a class="btn btn-default center" href="#addAdmin" role="button" data-toggle="collapse"><strong>+ ADD NEW ADMIN USER</strong></a>
		<div id="addAdmin" class="collapse">
            <form method="POST" action="add_adminFromAdmin.php">
                <fieldset class="form-group">
                    <small class="text-muted">The new admin will NOT be added if she/he is already in the system database.</small></br>
                    <label for="adminFirstName">Enter New ADMIN First Name: </label>
                    <input type="text" class="form-control" name="adminFirstName" id="adminFirstName">
                </fieldset>
                <fieldset class="form-group">
                    <label for="adminLastName">Enter New ADMIN Last Name: </label>
                    <input type="text" class="form-control" name="adminLastName" id="adminLastName">
                </fieldset>
                <fieldset class="form-group">
                    <label for="adminEmail">Enter New ADMIN Email: </label>
                    <input type="text" class="form-control" name="adminEmail" id="adminEmail">
                </fieldset>
                <fieldset class="form-group">
                    <label for="adminPassword">Enter New ADMIN Password: </label>
                    <input type="password" class="form-control" name="adminPassword" id="adminPassword">
                </fieldset></br>
                <input type="submit" class="btn btn-default" style="width:370px" value="ADD ADMIN USER" id="addAdminButton"></input>
			 </form>	
		</div></br></br>

        <a class="btn btn-default center" href="#updateUser" role="button" data-toggle="collapse"><strong>UPDATE USER INFO</strong></a>
		<div id="updateUser" class="collapse">
            <form method="POST" form name="login" onsubmit="return validation()" action="verify_userLoginAdmin.php">
                <fieldset class="form-group">
                    <label for="userEmail"> Enter User email Address: </label>
                    <input type="text" class="form-control" name="userEmail" id="userEmail">
                </fieldset>
                <fieldset class="form-group">
                    <label for="userPassword"> Enter User Password: </label>
                    <input type="password" class="form-control" name="passwordLogin" id="passwordLogin">
                </fieldset></br>
                <input type="submit" class="btn btn-default" style="width:370px" value="FIND USER" id="loginButton"></input>
                </form>
		</div></br></br>

        <a class="btn btn-default center" href="#updateAdmin" role="button" data-toggle="collapse"><strong>UPDATE ADMIN INFO</strong></a>
		<div id="updateAdmin" class="collapse">
            <form method="POST" form name="login" onsubmit="return validation()" action="verify_adminLoginAdmin.php">
                <fieldset class="form-group">
                    <label for="adminEmail"> Enter ADMIN email Address: </label>
                    <input type="text" class="form-control" name="adminEmail" id="adminEmail">
                </fieldset>
                <fieldset class="form-group">
                    <label for="adminPassword"> Enter ADMIN Password: </label>
                    <input type="password" class="form-control" name="adminPasswordLogin" id="adminPasswordLogin">
                </fieldset></br>
                <input type="submit" class="btn btn-default" style="width:370px" value="FIND ADMIN" id="loginButton"></input>
                </form>
		</div></br></br>

        <a class="btn btn-default center" href="#deleteUser" role="button" data-toggle="collapse"><strong>- DELETE USER</strong></a>
		<div id="deleteUser" class="collapse">
			<form method="POST" action="delete_users.php">
                <fieldset class="form-group">
                    <small class="text-muted">CAUTION: Please verify before deleting an user. This action is IRREVERSIBLE!!</small></br>
                    <label for="deleteUserFN">Enter User First Name:  </label>
                    <input type="text" class="form-control" name="deleteUserFN" id="deleteUserFN">
                </fieldset>
                <fieldset class="form-group">
                    <label for="deleteUserLN">Enter User Last Name:  </label>
                    <input type="text" class="form-control" name="deleteUserLN" id="deleteUserLN">
                </fieldset>
                <fieldset class="form-group">
                    <label for="deleteUserEmail">Enter User Email:  </label>
                    <input type="text" class="form-control" name="deleteUserEmail" id="deleteUserEmail">
                </fieldset></br>
                <input type="submit" class="btn btn-default" style="width:370px" value="DELETE USER" id="deleteUserButton"></input>
            </form>
		</div></br></br>

        <a class="btn btn-default center" href="#deleteAdmin" role="button" data-toggle="collapse"><strong>- DELETE ADMIN USER</strong></a>
		<div id="deleteAdmin" class="collapse">
			<form method="POST" action="delete_users.php">
                <fieldset class="form-group">
                    <small class="text-muted">CAUTION: Please verify before deleting an user. This action is IRREVERSIBLE!!</small></br>
                    <label for="deleteAdminFN">Enter ADMIN First Name:  </label>
                    <input type="text" class="form-control" name="deleteAdminFN" id="deleteAdminFN">
                </fieldset>
                <fieldset class="form-group">
                    <label for="deleteAdminLN">Enter ADMIN Last Name:  </label>
                    <input type="text" class="form-control" name="deleteAdminLN" id="deleteAdminLN">
                </fieldset>
                <fieldset class="form-group">
                    <label for="deleteAdminEmail">Enter ADMIN Email:  </label>
                    <input type="text" class="form-control" name="deleteAdminEmail" id="deleteAdminEmail">
                </fieldset></br>
                <input type="submit" class="btn btn-default" style="width:370px" value="DELETE ADMIN" id="deleteAdminButton"></input>
            </form>
		</div></br></br>

        <a class="btn btn-default center" href="#deleteUserData" role="button" data-toggle="collapse"><strong>- DELETE USER DATA</strong></a>
		<div id="deleteUserData" class="collapse">
			<form method="POST" action="deleteData_console.php">
                <fieldset class="form-group">
                    <label for="deleteUserEmail">Enter User Email:  </label></br>
                    <small class="text-muted">Enter user email to get access to her/his data.</small>
                    <input type="text" class="form-control" name="deleteUserEmail" id="deleteUserEmail">
                </fieldset></br>
                <input type="submit" class="btn btn-default" style="width:370px" value="ACCESS USER DATA" id="deleteUserDataButton"></input>
            </form>
		</div>
	</div>
	<div class="row">
        <h2 class="page-header" style="color:yellow;">SYSTEM USERS</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        try {
                            $allUsersQuery = <<<stmt
                            SELECT first_name, last_name, email, password, city, state, country FROM users;
				
stmt;
                            if (($ab_stmt = $dbConnection->prepare($allUsersQuery))) {
                                $ab_stmt->execute();
                                $result = $ab_stmt->get_result();
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
                                foreach($colData as $r) {
                                    echo "<tr>";
                                    foreach($colHeaders as $colHeader) {
                                        echo "<td>" . $r[$colHeader] . "</td>";
                                    }
                                    echo "</tr>";
                                }
                    
                                $ab_stmt->close();
                            } else {
                                echo "Statement Prep Failed" . $dbConnection->connect_errno . " " . $dbConnection->connect_error;
                            }
                        } catch(Exception $e) {
                            echo 'caught exception: ' . $e->getMessage();
                        }
                    ?>
                </tbody>
            </table>
        </div>
	</div>

    <div class="row">
        <a class="btn btn-default center" href="#visitUserAccount" role="button" data-toggle="collapse"><strong>VISIT USER ACCOUNT</strong></a>
		<div id="visitUserAccount" class="collapse">
            <form method="POST" action="verify_userLogin.php">
                <fieldset class="form-group">
                    <label for="userEmail">Enter New User Email: </label>
                    <input type="text" class="form-control" name="userEmail" id="userEmail">
                </fieldset>
                <fieldset class="form-group">
                    <label for="password">Enter New User Password: </label>
                    <input type="password" class="form-control" name="password" id="password">
                </fieldset>
                <input type="submit" class="btn btn-default" style="width:370px" value="VISIT ACCOUNT" id="visitAccountButton"></input>
            </form>
		</div></br></br>
    </div>

	<div class="row">
        <h2 class="page-header" style="color:yellow;">SYSTEM ADMINISTRATORS</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Password</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        try {
                            $allAdminsQuery = <<<stmt
                            SELECT first_name, last_name, email, password FROM admins;
stmt;
                            if (($ab_stmt = $dbConnection->prepare($allAdminsQuery))) {
                                $ab_stmt->execute();
                                $result = $ab_stmt->get_result();
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
                                foreach($colData as $r) {
                                        echo "<tr>";
                                        foreach($colHeaders as $colHeader) {
                                            echo "<td>" . $r[$colHeader] . "</td>";
                                        }
                                        echo "</tr>";
                                }
			
                                $ab_stmt->close();
                            } else {
                                echo "Statement Prep Failed" . $dbConnection->connect_errno . " " . $dbConnection->connect_error;
                            }
                        } catch(Exception $e) {
                            echo 'caught exception: ' . $e->getMessage();
                        }
                    ?>
                </tbody>
            </table>
        </div>
	</div>

	<div class="row">
        <h2 class="page-header" style="color:yellow;">USER DATA</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User First Name</th>
                        <th>User Last Name</th>
                        <th>Username</th>
                        <th>Picture Name</th>
                        <th>Picture Link</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        try {
                            $allDataQuery = <<<stmt
                            SELECT u.first_name, u.last_name, u.email, i.name, i.link FROM images i
                            INNER JOIN users u ON u.email = i.user_email
                            ORDER BY u.id;
stmt;
                            if (($ab_stmt = $dbConnection->prepare($allDataQuery))) {
                                $ab_stmt->execute();
                                $result = $ab_stmt->get_result();
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
                                foreach($colData as $r) {
                                    echo "<tr>";
                                    foreach($colHeaders as $colHeader) {
                                        echo "<td>" . $r[$colHeader] . "</td>";
                                    }
                                    echo "</tr>";
                                }
                                $ab_stmt->close();
                            } else {
                                echo "Statement Prep Failed" . $dbConnection->connect_errno . " " . $dbConnection->connect_error;
                            }
                        } catch(Exception $e) {
                            echo 'caught exception: ' . $e->getMessage();
                        }
                    ?>
                </tbody>
            </table>
        </div>
	</div></br></br></br></br></br></br>
</div>

<?php
	include 'template_append.php';
?>
