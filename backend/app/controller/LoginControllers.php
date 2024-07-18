<?php
require_once dirname(__DIR__) . '/function/SetChookie.php';

class LoginControllers
{
    public function Index($user, $pass)
    {
        include dirname(__DIR__) . '/function/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        if (empty($user) || empty($pass)) {
            echo $newPOPUP->create('failed', 'Tolong masukkan username dan password yang sesuai.', './../../');

            return;
        }

        $userData = $this->validateUsers($user, $pass);

        if (!$userData) {
            echo $newPOPUP->create('failed', 'Username atau password tidak ada di database.', '../../');

            return;
        }

        $getRemember = isset($_POST['flexCheckChecked']) ? $_POST['flexCheckChecked'] : null;

        $setCookie = new SetChookie();
        $setCookie->_GetSession($user, $userData['id'], $getRemember);
    }


    private function validateUsers($user, $pass)
    {
        include dirname(dirname(__DIR__)) . '/inc/connection.php';
        include dirname(__DIR__) . '/function/PopUp.php';

        $newPOPUP = new CreatePOPUP;

        try {
            $query = "SELECT * FROM users WHERE username = ? AND password = ?";

            $stmt = mysqli_prepare($koneksi, $query);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ss", $user, $pass);

                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);

                $userData = mysqli_fetch_assoc($result);

                mysqli_stmt_close($stmt);
                return $userData ? $userData : false;
            } else {
                echo $newPOPUP->create('failed', 'Prepared statement creation failed: ' . mysqli_error($koneksi), './../../');
            }
        } catch (Exception $e) {
            echo $newPOPUP->create('failed', 'Error: ' . $e->getMessage() . mysqli_error($koneksi), './../../');

            return false;
        }
    }


    public function LogOut()
    {
        include dirname(__DIR__) . '/function/PopUp.php';
        $newPOPUP = new CreatePOPUP;
        session_start();
        if (session_id()) {
            $_SESSION = array();

            session_destroy();

            echo $newPOPUP->create('succes', 'Logout successful.', '../../');

            exit();
        } else {
            echo $newPOPUP->create('failed', 'Anda tidak memiliki sesi aktif.', '../../');
        }
    }
}
