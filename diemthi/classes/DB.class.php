<?php
class DB
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = ''; // Đây là một mẫu, tránh lưu mật khẩu trực tiếp trong mã
    private $db = 'quanlydiem';
    private $myconn;
    private $connected = false; // Biến để kiểm tra trạng thái kết nối

    public function connect()
    {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$con) {
            // Handle connection error
            throw new Exception('Could not connect to database: ' . mysqli_connect_error());
        } else {
            $this->myconn = $con;
            mysqli_set_charset($con, 'utf8');
        }
        return $this->myconn;
    }


    public function close()
    {
        if ($this->myconn) {
            mysqli_close($this->myconn);
            // Ghi vào nhật ký hoặc thông báo người dùng khi kết nối được đóng
            // echo 'Connection closed!';
            $this->connected = false; // Đã đóng kết nối
        }
    }
    // Phương thức để kiểm tra xem đã kết nối thành công chưa
    public function isConnected()
    {
        return $this->connected;
    }

    public function query($sql)
    {
        $result = mysqli_query($this->myconn, $sql);
        return $result !== false ? $result : false;
    }

    public function select($sql)
    {
        $result = mysqli_query($this->myconn, $sql);
        if ($result !== false) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return false;
        }
    }

    public function insert($sql)
    {
        $result = mysqli_query($this->myconn, $sql);
        return $result !== false && mysqli_affected_rows($this->myconn) > 0 ? mysqli_insert_id($this->myconn) : false;
    }

    public function update($sql)
    {
        $result = mysqli_query($this->myconn, $sql);
        return $result !== false && mysqli_affected_rows($this->myconn) > 0 ? true : false;
    }

    public function delete($sql)
    {
        $result = mysqli_query($this->myconn, $sql);
        return $result !== false && mysqli_affected_rows($this->myconn) > 0 ? true : false;
    }
}
