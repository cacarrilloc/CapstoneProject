<?php
    include 'template_prepend.php';
    if(isset($_POST["userEmail"])){
        //Get user email
        error_reporting(E_ERROR|E_WARNING);
        $userEmail = $_REQUEST['userEmail'];
        $db = new mysqli($dbHost,$dbUserName,$dbPassword,$dbName);
        $query = $db->prepare("SELECT email FROM users WHERE email=?");
        $query->bind_param('s', $userEmail);
        $query->execute();
        $result = $query->get_result();
        $rawEmail = $result->fetch_array(MYSQLI_ASSOC);
        $email = implode("\r\n", $rawEmail);
	}
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
			<h1 class="page-header"><strong>MY SPACEXPLORER</strong></h1>
			<h3>This is your SpaceXplorer personal page. We are glad you want to enjoy the beauty of the universe captured by NASA! Here you will be able to see pictures of the universe from different perspectives including pictures taken by the NASA ROVER from Mars. You can also create your own picture WALL and share all the pictures you download with your Facebook friends and email contacts. So get ready to enjoy the universe from Mars and other NASA devices !!</h3></br>
            <h3><strong>Choose the type of picture you want to see just by clicking on any of the next options:</strong></h3>
		</div></br>
        <div class="row addNew">
            <form method="POST" action="show_apod_request.php">
                <input type="hidden" class="form-control" name="userEmail" id="userEmail" value="<?php echo $email ?>">
                <input type="submit" class="btn btn-default" value="GET NASA PICTURE OF TODAY" id="goPOD"></input>
            </form>
        </div></br>
        <div class="row addNew">
            <form method="POST" action="show_neows_request1.php">
                <input type="hidden" class="form-control" name="userEmail" id="userEmail" value="<?php echo $email ?>">
                <input type="submit" class="btn btn-default" value="GET MARS ROVER NAV CAM IMAGE" id="goRover1"></input>
            </form>
        </div></br>
        <div class="row addNew">
            <form method="POST" action="show_neows_request2.php">
                <input type="hidden" class="form-control" name="userEmail" id="userEmail" value="<?php echo $email ?>">
                <input type="submit" class="btn btn-default" value="GET MARS ROVER FRONT CAM IMAGE" id="goRover2"></input>
            </form>
        </div></br>
        <div class="row addNew">
            <form method="POST" action="show_neows_request3.php">
                <input type="hidden" class="form-control" name="userEmail" id="userEmail" value="<?php echo $email ?>">
                <input type="submit" class="btn btn-default" value= "GET MARS ROVER REAR CAM IMAGE" id="goRover3"></input>
            </form>
        </div></br>
    </div>

    <div class="giveMePadding">
        <div class="row">
			<h2 class="page-header"><strong>DELETE IMAGES</strong></h2>
			<h4>You can delete any of your existing pictures just by entering its ID. Find picture IDs in the table below.</h4>
		</div>
        <div class="row addNew">
            <form method="POST" action="main_page.php">
                <fieldset class="form-group" style="width:170px">
                    <small class="text-muted">Enter the ID of the picture you want to delete.</small></br>
                    <label for="deleteUserPic">PICTURE ID:  </label>
                    <input type="text" class="form-control" name="deleteUserPic" id="deleteUserPic">
                </fieldset>
                <input type="hidden" class="form-control" name="userEmail" id="userEmail" value="<?php echo $email ?>">
                <input type="submit" style="width:300px" class="btn btn-default" value="DELETE PICTURE" id="deleteUserPicButton"></input>
            </form>
        </div>
    </div></br>


<?php
	if(isset($_POST["deleteUserPic"])) {
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
				echo "<p>Query error</p>";
			}
			else if($result == 0) {
				echo "<p> ERROR: No rows affected!! </p>";
			} else {
				echo '<p><h2 style="color:yellow;">Image ID '.$p1.' has successfully been deleted!</h2></p>';
			}
		} else {
			echo '<p><h2 style="color:yellow;">This Picture has NOT been found!!</h2></p>';
		}
		$my_stmt->close();
	}
?>

</br></br>

<?php 
	if(isset($_POST["userEmail"])) {
        $query = <<<stmt
        SELECT id, user_email, name, link FROM images WHERE user_email=?;
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
            echo '<h2 class="page-header" style="color:yellow;"><strong>YOUR IMAGES</strong></h2>
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
	}
?>
    </br></br>
    <div class="giveMePadding">
        <div class="row addNew">
            <form method="POST" action="add_imageExisting.php">
                <input type="hidden" class="form-control" name="userEmail" id="userEmail" value="<?php echo $email ?>">
                <input type="submit" style="width:300px" class="btn btn-default" value="SHARE EXISTING PICTURES" id="shareOldPic"></input>
            </form>
        </div>
    </div></br></br></br></br>
</div>
<?php
	include 'template_append.php';
?>
