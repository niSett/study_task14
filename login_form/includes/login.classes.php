<?php

class Login extends Dbh {
    protected function getUser($uid, $pwd) {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid
        = ? OR users_email = ?;');

        //if not exist request
        if (!$stmt->execute(array($uid, $pwd))) {
            $stmt = null;
            header('Location: ../index.php?error=stmtfailed');
            exit();
        }

        //if response empty
        if($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location: ../index.php?error=usernotfound');
            exit();
        }

        //return data as associative massive
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //integrated method verify password
        $checkPwd = password_verify($pwd, $pwdHashed[0]['users_pwd']);

        //if check not passed
        if($checkPwd == false) {
            $stmt = null;
            header('Location: ../index.php?error=wrongloginorpassword');
            exit();
        } else if($checkPwd == true) { //if passed
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ?
            OR users_email - ? AND users_pwd = ?;');

            if (!$stmt->execute(array($uid, $uid,  $pwd))) {
                $stmt = null;
                header('Location: ../index.php?error=stmtfailed');
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header('Location: ../index.php?error=usernotfound');
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['user_id'] = $user[0]['users_id'];
            $_SESSION['user_uid'] = $user[0]['users_uid'];
        }

        $stmt = null;
    }
}

?>
