<?php
    include 'template_prepend.php';
?>

<div class="giveMePadding">
<?php
    error_reporting(E_ERROR|E_WARNING);
    $query;
	$query = <<<stmt
	SELECT id FROM users WHERE email=?;
stmt;
	$my_stmt = $dbConnection->prepare($query);
	$p1 = $_POST["deleteUserEmail"];
        
	$my_stmt->bind_param('s', $p1);
	$my_stmt->execute();
	$my_stmt->store_result();
	$my_stmt->bind_result($id);

	if($my_stmt->num_rows) {
	    session_regenerate_id();
		$_SESSION['SESS_USER_NAME']=$_POST['deleteUserEmail'];
		$my_stmt->fetch();
        echo '<p><h4 style="color:yellow;">Username: '.$p1.'</h5></p>';
        if(isset($_POST["deleteUserEmail"])) {
            echo '<div class="giveMePadding">
                        <button class = "btn-second" onclick="myFunction()">HELP</button>
                        <script>
                        function myFunction() {
                            alert("HOW TO USE THE APPLICATION: \nIf you are existing user or administrator please use EXISTING USER or EXISTING ADMIN buttons. If you are new to the application you would need first to create an accout by using NEW USER button. Upon using this button you will be redirected to a page where you can create your new acount and start using application features such as uploading NASA images and sharing them with your friends via email or Facebook.");
                        }
                        </script>
                        <a href="index.php"><button class = "btn-second" style="color:white;">SIGN OUT</button></a>
                        <div class="row">
                            <h1 class="page-header"><strong>DELETE USER DATA</strong></h1>
                            <h4>Choose the picture you want to delete by entering its ID. Find the pictures owned by this user in the table below.</h4>
                        </div>
                        <div class="row addNew">
                            <form method="POST" action="delete_users.php">
                                <fieldset class="form-group">
                                    <small class="text-muted">Enter the ID of the picture to be deleted.</small></br>
                                    <label for="deleteUserPic">PICTURE ID:  </label>
                                    <input type="number" class="form-control" name="deleteUserPic" id="deleteUserPic">
                                </fieldset>
                                <input type="submit" class="btn btn-default" style="width:370px" value="DELETE PICTURE" id="deleteUserPicButton"></input>
                            </form>
                        </div></br></br>
                </div>';

            $query = <<<stmt
            SELECT id, user_email, name, link FROM images WHERE user_email=?;
stmt;
            $p1 = $_POST["deleteUserEmail"];
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
                echo '<h2 class="page-header" style="color:yellow;">USER DATA</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>PICTURE ID</th>
                                <th>USERNAME</th>
                                <th>PICTURE NAME</th>
                                <th>LINK</th>
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
                        echo '</tbody></table></div>';
			
                $my_stmt->close();
            }
            echo '</br>
            <div class="giveMePadding">
                <div class="row addNew">>
                    <form method="POST" action="admin_console.php">
                        <input type="submit" class="btn btn-default" style="width:370px" value="BACK TO ADMIN CONSOLE" id="mainPage"></input>
                    </form>
                </div></br>
            </div></br></br></br>';

            
	
        
        } else {
            $_SESSION['invalid']=true;
            echo '<div class="giveMePadding">
                <div class="giveMePadding">
                    <div class="row addNew">
                        <br><br><p><h2 style="color:yellow;">User credentials do not match our records.</h2></p><br>
                        <form method="POST" action="admin_console.php">
                            <input type="submit" class="btn btn-default" value="TRY AGAIN" id="tryagain"></input></form>
                    </div><br>
                </div><br>
              </div><br>';
            session_write_close();
        }
        session_write_close();
    }
    //$my_stmt->close();
?>

</div>

<?php
	include 'template_append.php';
?>
