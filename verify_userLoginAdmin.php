<?php
    include 'template_prepend.php';
$query;
	$query = <<<stmt
	SELECT id FROM users WHERE email=? AND password=?;
stmt;
	$my_stmt = $dbConnection->prepare($query);
	$p1 = $_POST["userEmail"];
    $p2 = $_POST["passwordLogin"];
    
	$my_stmt->bind_param('ss', $p1, $p2);
	$my_stmt->execute();
	$my_stmt->store_result();
	$my_stmt->bind_result($id);

	if($my_stmt->num_rows) {
	    session_regenerate_id();
		$_SESSION['SESS_USER_NAME']=$_POST['userEmail'];
        echo "</br></br></br>";
        echo '<div class="giveMePadding">
                    <div class="giveMePadding">
                        </br></br>
                        <button class  = "btn-second" onclick="myFunction()">HELP</button>
                        <script>
                        function myFunction() {
                            alert("HOW TO USE THE APPLICATION: \nIf you are existing user or administrator please use EXISTING USER or EXISTING ADMIN buttons. If you are new to the application you would need first to create an accout by using NEW USER button. Upon using this button you will be redirected to a page where you can create your new acount and start using application features such as uploading NASA images and sharing them with your friends via email or Facebook.");
                        }
                        </script>
                        <a href="index.php"><button class = "btn-second" style="color:white;">SIGN OUT</button></a></br></br>
                        <p><h3>'.$p1.' identity has been verified!</h3></p></br>
                        <form method="POST" action="update_userInfoAdmin.php">
                            <input type="hidden" class="form-control" name="userEmail" id="userEmail" value='.$p1.'>
                            <input type="submit" class="btn btn-default" value="CONTINUE" id="confirmUserButton"></input>
                        </form>
                    </div></br></br></br></br>
                </div>';
		$my_stmt->fetch();
		session_write_close();
	} else {
	    $_SESSION['invalid']=true;
        echo "</br></br></br>";
        echo '<div class="giveMePadding">
                    <div class="giveMePadding">
                        <p><h3>Your credentials do not match our records! Please try again or create a NEW user account.</h3></p></br>
                        <form method="POST" action="admin_console.php">
                            <input type="submit" class="btn btn-default" value="TRY AGAIN" id="tryagain"></input></br></br>
                        </form>
                    </div><br><br><br><br><br><br>
                </div>';
        session_write_close();
	}
	$my_stmt->close();
?>

<?php
	include 'template_append.php';
?>

