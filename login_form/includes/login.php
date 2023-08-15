<?php

if(isset($_POST['submit'])) {
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    include "dbh.classes.php";
    include "login.classes.php";
    include "loginContr.classes.php"; 

    $login = new LoginContr($uid, $pwd);

    $login->loginUser();

    header('Location: ../index.php?error=none');
}

?>