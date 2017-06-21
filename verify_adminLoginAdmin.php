<?php
    include 'template_prepend.php';
$query;
	$query = <<<stmt
	SELECT id FROM admins WHERE email=? AND password=?;
stmt;
	$my_stmt = $dbConnection->prepare($query);
	$p1 = $_POST["adminEmail"];
    $p2 = $_POST["adminPasswordLogin"];
    
	$my_stmt->bind_param('ss', $p1, $p2);
	$my_stmt->execute();
	$my_stmt->store_result();
	$my_stmt->bind_result($id);

	if($my_stmt->num_rows) {
	    session_regenerate_id();
		$_SESSION['SESS_USER_NAME']=$_POST['adminEmail'];
        echo "</br></br></br>";
        echo '<div class="giveMePadding">
                    <div class="giveMePadding">
                        </br></br>
                        <button class = "btn-second" onclick="myFunction()">HELP</button>
                        <script>
                        function myFunction() {
                            alert("HOW TO USE THE APPLICATION: \nIf you are existing user or administrator please use EXISTING USER or EXISTING ADMIN buttons. If you are new to the application you would need first to create an accout by using NEW USER button. Upon using this button you will be redirected to a page where you can create your new acount and start using application features such as uploading NASA images and sharing them with your friends via email or Facebook.");
                        }
                        </script>
                        <a href="index.php"><button class  = "btn-second" style="color:white;">SIGN OUT</button></a></br></br>
                        <p><h3>'.$p1.' ADMIN credentials have been verified!</h3></p></br>
                        <div class="row addNew">
                            <form method="POST" action="update_adminInfoAdmin.php">
                                <input type="submit" class="btn btn-default" value="CONTINUE" id="continue"></input>
                            </form></br>
                        </div>
                    </div></br></br></br></br>
                </div>';
		$my_stmt->fetch();
		session_write_close();
	} else {
	    $_SESSION['invalid']=true;
        echo '</br></br></br>';
        echo '<div class="giveMePadding">
                <div class="giveMePadding">
                    </br></br>
                    <p><h3>Your credentials do not match our records! Please try again or create a NEW user account.</h3></p></br>
                    <form method="POST" action="admin_console.php">
                        <input type="submit" class="btn btn-default" style="width:370px" value="TRY AGAIN" id="create2"></input>
                    </form>
                </div></br></br></br></br>
              </div>';
        session_write_close();
	}
	$my_stmt->close();
?>

<?php
	include 'template_append.php';
?>

