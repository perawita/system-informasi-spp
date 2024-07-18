<?php

class SetChookie
{
    public function _GetSession($user, $id, $setDevice)
    {
        session_start();

        $_SESSION['user'] = $user;
        $_SESSION['id_user'] = $id;

        if ($setDevice !== null) {
            $this->setRemember($id);
        }

        $this->redirect('../../');
    }

    protected function setRemember($userId)
    {
        include dirname(dirname(__DIR__)) . '/inc/connection.php';
        include dirname(__DIR__) . '/function/PopUp.php';

        $newPOPUP = new CreatePOPUP;

        $deviceIdentifier = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
        setcookie('remember_device', $deviceIdentifier, time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari
        setcookie('id_user', $userId, time() + (86400 * 30), "/");

        $sql = "INSERT INTO remembered_devices (user_id, device_identifier) VALUES (?, ?)";
        $stmt = $koneksi->prepare($sql);

        $stmt->bind_param("ss", $userId, $deviceIdentifier);

        if ($stmt->execute()) {
            $this->redirect('../../');
            exit();
        } else {
            echo $newPOPUP->create('failed', 'Gagal menambahkan data set remember: ' . $stmt->error, '../../');
        }

        $stmt->close();
        $koneksi->close();
    }

    protected function redirect($url)
    {
        echo '<script>window.location.href = "' . $url . '";</script>';
        exit();
    }
}
