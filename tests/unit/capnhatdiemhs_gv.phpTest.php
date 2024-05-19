<!-- Unit test đã hoàn chỉnh -->
<?php
//require_once 'diemthi\admin\diem\capnhatdiem2.php';
class capnhatdiemhs_gvTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {

    }

    protected function _after()
    {

    }
    // // Kiểm thử điểm nhập vào có hợp lệ hay không
    // public function testDiemHopLe()
    // {
    //     $this->assertTrue(isValidDiem(0)); // cực trị dưới
    //     $this->assertTrue(isValidDiem(10)); // cực trị trên 10
    //     $this->assertFalse(isValidDiem(-4));
    //     $this->assertTrue(isValidDiem(0.1));
    //     $this->assertTrue(isValidDiem(9.9));
    //     $this->assertTrue(isValidDiem(6));
    //     $this->assertTrue(isValidDiem(7));
    //     $this->assertFalse(isValidDiem("abc"));
    // }

    // Test for capNhatDiem function
    // public function testCapNhatDiem()
    // {
    //     // Init connection
    //     $connect = new db();
    //     $conn = $connect->connect();
    //     // Generate mock data
    //     $maHS = "2151013087";
    //     $mieng = 8;
    //     $p1 = 7;
    //     $p2 = 8;
    //     $t1 = 8;
    //     $t2 = 9;
    //     $d = 7.6;
    //     $tb = 10;
    //     $result = capNhatDiem($maHS, $mieng, $p1, $p2, $t1, $t2, $d, $tb, $conn);
    //     $this->assertTrue($result);
    // }
    // // Kiểm thử với cập nhật điểm với dữ liệu đúng
    // public function testCapNhatDiemInvalidData()
    // {
    //     $connect = new db();
    //     $conn = $connect->connect();
    //     $maHS = "MAHSKOTONTAI123"; 
    //     $mieng = 5;
    //     $p1 = 7;
    //     $p2 = 8;
    //     $t1 = 8;
    //     $t2 = 9;
    //     $d = 7;
    //     $tb = 8.7;
    //     $result = capNhatDiem($maHS, $mieng, $p1, $p2, $t1, $t2, $d, $tb, $conn);
    //     $this->assertFalse($result);
    // }

    // //  Kiểm thử với dữ liệu đúng
    // public function testKiemTraVaCapNhatDiemValidData()
    // {
    //     $connect = new db();
    //     $conn = $connect->connect();
    //     $post = array(
    //         'ma' => array('2151013087', '2151013042'),
    //         'diemmieng' => array(8.5, 7.3),
    //         'diem15phut1' => array(7, 8.5),
    //         'diem15phut2' => array(8.5, 9.9),
    //         'diem1tiet1' => array(8, 7.1),
    //         'diem1tiet2' => array(9.5, 8),
    //         'diemthi' => array(7, 6)
    //     );
    //     $error = kiemTraVaCapNhatDiem($post, $conn);
    //     $this->assertFalse($error);
    // }
    // // Kiểm thử thêm thành công với dữ liệu đúng với kiểm tra (số nguyên)
    // public function testKiemTraVaCapNhatDiemValidData()
    // {
    //     $connect = new db();
    //     $conn = $connect->connect();
    //     $post = array(
    //         'ma' => array('2151013087', '2151013042'),
    //         'diemmieng' => array(8, 7),
    //         'diem15phut1' => array(7, 8),
    //         'diem15phut2' => array(8, 9),
    //         'diem1tiet1' => array(8, 7),
    //         'diem1tiet2' => array(9, 8),
    //         'diemthi' => array(7, 6)
    //     );
    //     $error = kiemTraVaCapNhatDiem($post, $conn);
    //     $this->assertFalse($error);
    // }

    // // test kiểm tra và cập nhật điểm với dữ liệu sai (sai mã học sinh với điểm)
    // public function testKiemTraVaCapNhatDiemInvalidData()
    // {
    //     $connect = new db();
    //     $conn = $connect->connect();
    //     $post = array(
    //         'ma' => array('HS003', 'HS004'),
    //         'diemmieng' => array(8, -7), // Invalid score
    //         'diem15phut1' => array(7, 8),
    //         'diem15phut2' => array(8, 9),
    //         'diem1tiet1' => array(8, 7),
    //         'diem1tiet2' => array(9, 8),
    //         'diemthi' => array(7, 6)
    //     );
    //     $error = kiemTraVaCapNhatDiem($post, $conn);
    //     $this->assertTrue($error);
    // }
}