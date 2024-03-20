<?php
require 'DB.class.php';
class diem extends DB
{
    function alldiem()
    {
        $con = $this->connect();
        $sql = "select * from diem,hocsinh,monhoc,hocky WHERE diem.MaHS=hocsinh.MaHS && diem.MaMonHoc=monhoc.MaMonHoc && diem.MaHocKy=hocky.MaHocKy";
        $query = mysqli_query($con, $sql);
        $result = array();
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        }
        return $result;
    }
    function edit($id, $diemmieng, $diem15phut1, $diem15phut2, $diem1tiet1, $diem1tiet2, $diemthi, $diemTB)
    {
        $con = $this->connect();
        $sql = "
        update diem set
        DiemMieng='$diemmieng',
        Diem15Phut1='$diem15phut1',
        Diem15Phut2='$diem15phut2',
        Diem1Tiet1='$diem1tiet1',
        Diem1Tiet2='$diem1tiet2',
        DiemThi = '$diemthi',
        DiemTB = '$diemTB'
        where MaDiem='$id'
        ";
        $query = mysqli_query($con, $sql);
        return $query;
    }
    function selectdiem($id)
    {
        // $con = $this->connect();
        // $sql = "select * from diem where MaDiem={$id}";
        // $query = mysqli_query($con, $sql);
        // $result = array();
        // if (mysqli_num_rows($query) > 0) {
        //     $row = mysqli_fetch_assoc($query);
        //     $result[] = $row;
        // }
        // return $result;
        $conn = $this->connect();
        $query = "select * from diem where MaDiem='$id'";
        $mang = array();
        $results = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($results);
        $mang = $row;
        return $mang;
    }
    function dong()
    {
        $dis = $this->close();
        return $dis;
    }
}
?>