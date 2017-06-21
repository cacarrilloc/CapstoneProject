<?php
	include 'template_prepend.php';
?>

<div class="giveMePadding">
    <div class="giveMePadding">
        </br></br>
        <button class = "btn-second" onclick="myFunction()">HELP</button>
        <script>
        function myFunction() {
            alert("HOW TO USE THE APPLICATION: \nIf you are existing user or administrator please use EXISTING USER or EXISTING ADMIN buttons. If you are new to the application you would need first to create an accout by using NEW USER button. Upon using this button you will be redirected to a page where you can create your new acount and start using application features such as uploading NASA images and sharing them with your friends via email or Facebook.");}
        </script>
        <a href="index.php"><button class = "btn-second" style="color:white;">SIGN OUT</button></a>
    </div>
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
                echo '</br>';
                echo '<h1 class="page-header"><strong style="color:yellow;">YOUR POSTS</strong></h1>
            
    <div class="giveMePadding">
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
                echo '</tbody></table></div></div>';
                $my_stmt->close();
        }
	}
    ?>
    </br></br>

    <?php
        /*Query and PHP to populate fields with default user information*/
        error_reporting(E_ERROR|E_WARNING);
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
            <div class="row">
                <h2 class="page-header"><strong>SHARE PICTURES ON FACEBOOK</strong></h2>
                <h4>Choose the picture you want to share on Facebook just by entering its ID. Find picture IDs in the table ABOVE.</h4>
            </div>
            <div class="row addNew">
                <a class="btn btn-default center" href="#shareUserData" role="button" data-toggle="collapse"><strong>ENTER PICTURE ID</strong></a>
                <div id="shareUserData" class="collapse">
                    <form method="POST" action="facebook_share.php">
                        <fieldset class="form-group" style="width:370px">
                            <small class="text-muted">Enter the ID of the picture you want to share.</small></br>
                            <label for="pictureIdFB">PICTURE ID:  </label>
                            <input type="text" class="form-control" name="pictureIdFB" id="pictureIdFB">
                        </fieldset>
                        <input type="submit" class="btn btn-default" style="width:370px" value="SHARE ON FACEBOOK" id="sharePicButton"></input>
                    </form>
                </div></br></br>
            </div>

            <div class="row">
                <h2 class="page-header"><strong>SHARE PICTURES VIA EMAIL</strong></h2>
                <h4>Choose the picture you want to send via email just by entering its ID. Find picture IDs in the table ABOVE.</h4>
            </div>
            <div class="row addNew">
                <a class="btn btn-default center" href="#emailUserData" role="button" data-toggle="collapse"><strong>EMAIL PICTURE</strong></a>
                <div id="emailUserData" class="collapse">
                    <form method="POST" action="add_imageNew.php">
                        <fieldset class="form-group" style="width:370px">
                            <small class="text-muted">Enter the ID of the picture you want to email.</small></br>
                            <label for="pictureId">PICTURE ID:  </label>
                            <input type="text" class="form-control" name="pictureId" id="pictureId">
                        </fieldset>
                        <fieldset class="form-group" style="width:370px">
                            <small class="text-muted">Enter recipient's email address.</small></br>
                            <label for="recipientEmail">EMAIL ADDRESS:  </label>
                            <input type="text" class="form-control" name="recipientEmail" id="recipientEmail">
                        </fieldset>
                        <input type="hidden" class="form-control" name="userEmail" id="userEmail" value="<?php echo $email ?>">
                        <input type="submit" class="btn btn-default"
                        style="width:370px" value="SEND PICTURE" id="emailPicButton"></input>
                    </form>
                </div></br></br>
            </div>

            <?php
                if(isset($_POST["recipientEmail"])) {
                    error_reporting(E_ERROR|E_WARNING);
                    $pictureId = $_REQUEST['pictureId'];
                    $recipientEmail = $_REQUEST['recipientEmail'];
                    $userEmail = $_REQUEST['userEmail'];
    
                    //Get Picture link
                    $db = new mysqli($dbHost,$dbUserName,$dbPassword,$dbName); // connect to the DB
                    $query = $db->prepare("SELECT link FROM images WHERE id=?"); // prepate a query
                    //Safe parameter binding 'i' tells mysql it should expect an integer
                    $query->bind_param('i', $pictureId);
                    $query->execute(); //Actually perform the query
                    //Retrieve the result so it can be used inside PHP
                    $result = $query->get_result();
                    //Bind the data from the first result row to $link
                    $link = $result->fetch_array(MYSQLI_ASSOC);
            
                    //Here we use the php mail function to send an email
                    //Reference: http://www.inmotionhosting.com/support/email/send-email-from-a-page/using-phpmailer-to-send-mail-through-php
                    mail("$recipientEmail", "SpaceXplorer sent you a picture", implode("\r\n", $link), "From: $userEmail");
                    echo "<p><h3>Picture ".$pictureId." was successfully sent to ".$recipientEmail."</h3></p>";
                }
            ?>

            </br></br>
            <div class="row addNew">
                <form method="POST" action="main_page.php">
                    <input type="hidden" class="form-control" name="userEmail" id="userEmail" value="<?php echo $email ?>">
                    <input type="submit" class="btn btn-default" style="width:370px" value="BACK TO YOUR SITE" id="mainPage"></input>
                </form>
            </div></br></br></br></br>
    </div>
</div>

<?php
	include 'template_append.php';
?>
