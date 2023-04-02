<?php
session_start();
if(!isset($logged_user)) {
    echo "Здравствуйте  вы на секретной странице!";
    //header("Location:28.html");
    //exit;
}
?>