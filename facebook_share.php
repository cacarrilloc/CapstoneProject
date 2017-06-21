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

<?php
	if(isset($_POST["pictureIdFB"])){
        error_reporting(E_ERROR|E_WARNING);
        $pictureIdFB = $_REQUEST['pictureIdFB'];
	
        //Get Picture link
        $db = new mysqli($dbHost,$dbUserName,$dbPassword,$dbName);
        $query = $db->prepare("SELECT link FROM images WHERE id =?");
        $query->bind_param('i', $pictureIdFB);
        $query->execute();
        $result = $query->get_result();
        $link = $result->fetch_array(MYSQLI_ASSOC);
        $link2 = implode("\r\n", $link);
    
        //Get Picture name
        $query = $db->prepare("SELECT name FROM images WHERE id =?");
        $query->bind_param('i', $pictureIdFB);
        $query->execute();
        $result = $query->get_result();
        $name = $result->fetch_array(MYSQLI_ASSOC);
        $name2 = implode("\r\n", $name);
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
			<h2 class="page-header"><strong>SHARE PICTURES ON FACEBOOK</strong></h2>
			<h3>Picture called "<?php echo $name2 ?>" is ready to be shared on Facebook. Just click on the link below!</h3>
		</div></br></br>
        <div class="row addNew">
            <a class="fbsharelink" data-shareurl="<?php echo $link2 ?>"><h2 style="color:yellow;"><strong> CLICK HERE TO SHARE ON FACEBOOK</strong></h2></a></br></br></br></br>
            <form method="POST" action="add_imageNew.php">
                <input type="hidden" class="form-control" name="userEmail" id="userEmail" value="<?php echo $email ?>">
                <input type="submit" style="width:370px" class="btn btn-default" value="BACK TO SHARING CENTER" id="mainPage"></input>
            </form>
        </div></br></br>
    </div>
</div>

<script src = "public/js/jquery.js"></script>
<script> 
$('.fbsharelink').click( function() 
{
    var shareurl = $(this).data('shareurl');
    window.open('https://www.facebook.com/sharer/sharer.php?u='+escape(shareurl)+'&t='+document.title, '', 
    'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
    return false;
});
</script>


<?php
	include 'template_append.php';
?>
