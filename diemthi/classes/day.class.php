<?php
require "DB.class.php";
class day extends DB
{
    function allday()
    {
        $con = $this->connect();
        $sql = "select * from day";
        $query = mysqli_query($con, $sql);
        $result = array();
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        }
        return $result;
    }
    function selectday($id)
    {
        $conn = $this->connect();
        $sql = "select * from day where MaDayHoc='$id'";
        $mang = array();
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $mang = $row;
        // if (mysqli_num_rows($query) > 0) {
        //     $row = $query;
        //     $result = $row;
        // }
        return $mang;
    }

    function add($id, $gv, $lop, $hk, $mon, $mota)
    {
        $con = $this->connect();
        $sql = "INSERT INTO day(MaDayHoc, MaMonHoc, Magv, MaLopHoc, MaHocKy, MoTaPhanCong)
            VALUES ('$id', '$mon', '$gv', '$lop', '$hk', '$mota')";
        $query = mysqli_query($con, $sql);
        return $query;
    }

    function edit($id, $mamonhoc, $magv, $malophoc, $mahocky, $motaphancong)
    {
        $con = $this->connect();
        $sql = "
        update day set
        MaMonHoc='$mamonhoc',
        Magv='$magv',
        MaLopHoc='$malophoc',
        MaHocKy='$mahocky',
        MoTaPhanCong = '$motaphancong'
        where MaDayHoc='$id'
        ";
        $query = mysqli_query($con, $sql);
        return $query;
    }

}

