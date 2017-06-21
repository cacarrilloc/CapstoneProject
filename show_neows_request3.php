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
    if(!($stmt->bind_param("s", $user)))
    {
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
			<h1 class="page-header"><strong>ROVER REAR NAVIGATION CAM</strong></h1>
			<h3>Mounted on the mast (neck and head), these black-and-white cameras use visible light to gather panoramic, three-dimensional (3D) imagery. The Navcam is a stereo pair of cameras, each with a 45-degree field of view to support ground navigation planning by scientists and engineers. They work in cooperation with the Hazcams by providing a complementary view of the terrain.</h3>
		</div>
        <div class="row addNew">
            <h3><strong>Follow these steps to DOWNLOAD the Mars Rover picture. Just click on the buttons!</strong></h3></br>
            <?php
                if(isset($urlPhp)) {
                    echo '  <div id= "second">
                                <p class="api_desc" style="color:white;"><strong>URL '.$urlPhp.'</strong><span id= "showname4"></p>
                            </div></br>
                            <div id = "clear"></div>';
                    echo '  <img src='.$urlPhp.' style="color:white;" alt="Waiting for downloading" height=100% width=100%></br></br>';
                } else {
                    echo '
                            <div id= "second">
                                <p class="api_desc" style="color:white;"><strong>URL </strong><span id= "showname4">( Note: THIS CAMERA IS TEMPORARY OUT OF SERVICE IF NO URL SHOWS UP HERE AFTER CLICKING BUTTON 1)<span></p>
                            </div>
                            <div>
                                <button type = "button" class="btn btn-default" id="submit4">1) GET MARS ROVER REAR CAM IMAGE</button></br></br>
                            </div>
                            <div id = "clear"></div>
                            <button class = "btn btn-default" onclick = "VarFunction4()">2) DOWNLOAD IMAGE</button></br></br>';
                }
            ?>
        </div>
    </div>
    <div class="giveMePadding">
        <div class="row addNew">
            <button class = "btn btn-default" onclick = "MyWindow=window.open('<?php echo $urlPhp ?>','MyWindow',width=300,height=150); return false;">3) OPEN PICTURE IN NEW WINDOW</button></br></br></br></br>
        </div>
    </div>

    <div class="giveMePadding">
        <div class="row">
			<h2 class="page-header"><strong>POST AND SHARE PICTURE</strong></h2>
            <h4>You can now post the image you just download to your wall and SHARE it (via Facebook or email) with your  friends! You can also share your existing images. Give it a shot!!</h4>
		</div>
        <div class="row addNew">
            <form method="POST" action="add_imageNew.php">
                <fieldset class="form-group" style="width:370px">
                    <label for="picName">Add a name or description to image: </label>
                    <input type="text" class="form-control" name="picName" id="picName">
                </fieldset>
                <input type="hidden" class="form-control" name="userEmail" id="userEmail" value="<?php echo $email ?>">
                <input type="hidden" name="urlInput" id="urlInput" value="<?php echo $urlPhp ?>">
                <input type="submit" style="width:370px" class="btn btn-default" value="POST PICTURE" id="postNewPic"></input>
            </form>
        </div>
    </div></br>
    <div class="giveMePadding">
        <div class="row addNew">
            <form method="POST" action="add_imageExisting.php">
                <input type="hidden" class="form-control" name="userEmail" id="userEmail" value="<?php echo $email ?>">
                <input type="submit" style="width:370px" class="btn btn-default" value="SHARE EXISTING PICTURE" id="shareOldPic"></input>
            </form>
        </div>
    </div></br></br></br></br>

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
            echo '<h1 class="page-header"><strong style="color:yellow;">YOUR POSTWALL</strong></h1>
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
    <div class="giveMePadding">
        </br></br>
        <div class="row addNew">
            <form method="POST" action="main_page.php">
                <input type="hidden" class="form-control" name="userEmail" id="userEmail" value="<?php echo $email ?>">
                <input type="submit" style="width:370px" class="btn btn-default" value="BACK TO YOUR SITE" id="mainPage"></input>
            </form>
        </div>
    </div></br></br></br></br></br></br></br>
</div>

<?php
	include 'template_append.php';
?>
