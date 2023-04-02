<?php
function session_register(){
    $args = func_get_args();
    foreach ($args as $key){
    if (!isset($GLOBALS[$key])) {
    $GLOBALS[$key] = NULL;
    }
    $_SESSION[$key] =& $GLOBALS[$key];
    }
    }

session_start();
if($_POST['submit']) {
	if (($_POST['name'] == "sasha") && ($_POST['pass'] == "sss")) {
			$logged_user = $_POST['name'];
			session_register('logged_user');
			//$_SESSION['logged_user'];
			//echo $_SESSION
			header( "Location: secretplace.php" );
		exit;
	}
}
?>
<html>
<body>
Неверный пароль
</body>
</html>