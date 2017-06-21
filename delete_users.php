<?php
	include 'template_prepend.php';
    if(isset($_POST["deleteUserPic"])) {
        error_reporting(E_ERROR|E_WARNING);
        $pictureId = $_REQUEST['deleteUserPic'];
        $db = new mysqli($dbHost,$dbUserName,$dbPassword,$dbName);
        $query = $db->prepare("SELECT user_email FROM images WHERE id=?");
        $query->bind_param('i', $pictureId);
        $query->execute();
        $result = $query->get_result();
        $premail = $result->fetch_array(MYSQLI_ASSOC);
        $email = implode("\r\n", $premail);
    }
?>

<div class="giveMePadding">
<?php
    if(isset($_POST["deleteUserEmail"])) {
		$query = <<<stmt
		SELECT email FROM users WHERE email=?;
stmt;
		$my_stmt = $dbConnection->prepare($query);
		$p1 = $_POST["deleteUserEmail"];
		$my_stmt->bind_param('s', $p1);
		$my_stmt->execute();
		$my_stmt->store_result();
		$my_stmt->bind_result($isbn);
		
		if($my_stmt->num_rows) {
			$query = <<<stmt
			DELETE FROM users WHERE users.email =?;
stmt;
			$my_stmt = $dbConnection->prepare($query);
			$my_stmt->bind_param('s', $p1);
			$my_stmt->execute();
			$result = $my_stmt->affected_rows;
			if($result == -1) {
                echo '<br><br><br>';
				echo "<p>Query error</p>";
			}
			else if($result == 0) {
                echo '<br><br><br>';
				echo "<p> No rows affected </p>";
			} else {
                echo '<br><br><br>';
                echo '<div class="giveMePadding">
                        <div class="giveMePadding">
                            <div class="row addNew">
                                <p><h2 style="color:yellow;">User '.$p1.' has successfully been deleted!!</h2></p><br>
                                <form method="POST" action="admin_console.php">
                                    <input type="submit" class="btn btn-default" value="BACK TO ADMIN CONSOLE" id="tryagain"></input></form>
                            </div><br>
                         </div><br>
                       </div><br>';
			}
		} else {
            echo '<br><br><br>';
                echo '<div class="giveMePadding">
                        <div class="giveMePadding">
                            <div class="row addNew">
                                <p><h2 style="color:yellow;">User '.$p1.' has NOT been found!!</h2></p><br>
                                <form method="POST" action="admin_console.php">
                                    <input type="submit" class="btn btn-default" value="BACK TO ADMIN CONSOLE" id="tryagain"></input></form>
                            </div><br>
                         </div><br>
                       </div><br>';
		}
		$my_stmt->close();
        
	} else if(isset($_POST["deleteAdminEmail"])) {
		$query = <<<stmt
		SELECT email FROM admins WHERE email=?;
stmt;
		$my_stmt = $dbConnection->prepare($query);
		$p1 = $_POST["deleteAdminEmail"];
		$my_stmt->bind_param('s', $p1);
		$my_stmt->execute();
		$my_stmt->store_result();
		$my_stmt->bind_result($issue);
		
		if($my_stmt->num_rows) {
			$query = <<<stmt
			DELETE FROM admins WHERE email=?;
stmt;
			$my_stmt = $dbConnection->prepare($query);
			$my_stmt->bind_param('s', $p1);
			$my_stmt->execute();
			$result = $my_stmt->affected_rows;
			if($result == -1) {
                echo '<br><br><br>';
				echo "<p>Query error</p>";
			}
			else if($result == 0) {
                echo '<br><br><br>';
				echo "<p> No rows affected </p>";
			} else {
                echo '<br><br><br>';
                echo '<div class="giveMePadding">
                        <div class="giveMePadding">
                            <div class="row addNew">
                                <p><h2 style="color:yellow;">ADMIN '.$p1.' has successfully been deleted!!</h2></p><br>
                                <form method="POST" action="admin_console.php">
                                    <input type="submit" class="btn btn-default" value="BACK TO ADMIN CONSOLE" id="tryagain"></input></form>
                            </div><br>
                         </div><br>
                       </div><br>';
			}
		} else {
            echo '<br><br><br>';
            echo '<div class="giveMePadding">
                    <div class="giveMePadding">
                        <div class="row addNew">
                            <p><h2 style="color:yellow;">ADMIN '.$p1.' has NOT been found!!</h2></p><br>
                            <form method="POST" action="admin_console.php">
                                <input type="submit" class="btn btn-default" value="BACK TO ADMIN CONSOLE" id="tryagain"></input></form>
                         </div><br>
                      </div><br>
                    </div><br>';
		}
		$my_stmt->close();
     
	} else if(isset($_POST["deleteUserPic"])) {
		$query = <<<stmt
		SELECT id FROM images WHERE id=?;
stmt;
		$my_stmt = $dbConnection->prepare($query);
		$p1 = $_POST["deleteUserPic"];
		$my_stmt->bind_param('s', $p1);
		$my_stmt->execute();
		$my_stmt->store_result();
		$my_stmt->bind_result($issue);
        
		
		if($my_stmt->num_rows) {
			$query = <<<stmt
			DELETE FROM images WHERE id=?;
stmt;
			$my_stmt = $dbConnection->prepare($query);
			$my_stmt->bind_param('s', $p1);
			$my_stmt->execute();
			$result = $my_stmt->affected_rows;
			if($result == -1) {
                echo '<br><br><br>';
				echo "<p>Query error</p>";
			}
			else if($result == 0) {
                echo '<br><br><br>';
				echo "<p> No rows affected </p>";
			} else {
                echo '<br><br><br>';
                echo '<div class="giveMePadding">
                        <div class="giveMePadding">
                            <div class="row addNew">
                                <p><h2 style="color:yellow;">Picture number '.$p1.' has successfully been deleted!!</h2></p><br>
                                <form method="POST" action="deleteData_console.php">
                                    <input type="hidden" class="form-control" name="deleteUserEmail" id="deleteUserEmail" value='.$email.'>
                                    <input type="submit" class="btn btn-default" value="DELETE MORE DATA FROM THIS USER" id="deleteMore"></input>
                                </form><br><br>
                                <form method="POST" action="admin_console.php">
                                    <input type="submit" class="btn btn-default" value="BACK TO ADMIN CONSOLE" id="tryagain"></input></form>
                            </div><br>
                         </div><br>
                       </div><br>';
			}
		} else {
            echo '<br><br><br>';
                echo '<div class="giveMePadding">
                        <div class="giveMePadding">
                            <div class="row addNew">
                                <p><h2 style="color:yellow;">Picture number '.$p1.' has NOT been found!!</h2></p><br>
                                <form method="POST" action="deleteData_console.php">
                                    <input type="hidden" class="form-control" name="deleteUserEmail" id="deleteUserEmail" value='.$email.'>
                                    <input type="submit" class="btn btn-default" value="DELETE MORE DATA FROM THIS USER" id="deleteMore"></input>
                                </form><br><br>
                                <form method="POST" action="admin_console.php">
                                    <input type="submit" class="btn btn-default" value="BACK TO ADMIN CONSOLE" id="goConsole"></input></form>
                            </div><br>
                         </div><br>
                       </div><br>';
		}
		$my_stmt->close();
	}
?>
<br><br><br><br>
</div><br>

<?php
	include 'template_append.php';
?>




