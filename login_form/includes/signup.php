<?php 
//check exist request
if (isset($_POST["submit"])) {

    //take data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    //signup controller
    include "dbh.classes.php";
    include "signup.classes.php";
    include "signupContr.classes.php";
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    //check errors
    $signup->signupUser();

    //return back
    header('location: ../index.php?error=none');
}
?>