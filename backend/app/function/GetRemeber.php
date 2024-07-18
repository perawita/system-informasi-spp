<?php
class GetAutentikasiDevice
{
    public function GetAutentikasi()
    {
        include dirname(dirname(__DIR__)) . '/inc/connection.php';

        if (isset($_COOKIE['remember_device'])) {
            $deviceIdentifier = $_COOKIE['remember_device'];
            $userId = $_COOKIE['id_user'];

            $sql = "SELECT * FROM remembered_devices WHERE user_id = ? AND device_identifier = ?";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("ss", $userId, $deviceIdentifier);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $sql_get_user = "SELECT * FROM users WHERE id = ?";
                $stmt_get_user = $koneksi->prepare($sql_get_user);
                $stmt_get_user->bind_param("s", $userId);
                $stmt_get_user->execute();
                $result_user = $stmt_get_user->get_result();

                if ($result_user->num_rows > 0) {
                    $user_data = $result_user->fetch_assoc();
                    return array(
                        'user' => $user_data['username'],
                        'pass' => $user_data['password']
                    );
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } else {
            return array(null);
        }
    }
}
