<!DOCTYPE html>

<?php
	include 'db_connect.php';
	date_default_timezone_set('America/Los_Angeles');
	ini_set('session.save_path', getcwd().'/tmp');
	session_start();
	if(isset($_SESSION['SESS_USER_NAME']))
	{
		$user=$_SESSION['SESS_USER_NAME'];
	}
	else $user="none";
    
    $urlPhp = (isset($_GET['jsVar']) ? $_GET['jsVar'] : null);
?>

<!--http://getbootstrap.com/examples/dashboard/ -->
<html lang='en'>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>SpaceXplorer</title>
        <script src="public/js/nasa_apod_request.js"> </script>
        <script src="public/js/nasa_neows_request1.js"> </script>
        <script src="public/js/nasa_neows_request2.js"> </script>
        <script src="public/js/nasa_neows_request3.js"> </script>
		
		<!-- Latest compiled and minified CSS for Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
		integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Custom css file -->
		<link rel="stylesheet" href="public/css/style.css">
	</head>
	
	
	<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color:yellow;">SpaceXplorer</a>
        </div>
      </div>
    </nav>
    </body>
          
