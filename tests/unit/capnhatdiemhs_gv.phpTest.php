<?php
 require_once 'diemthi\admin\diem\capnhatdiem2.php';
// require_once 'diemthi\classes\DB.class.php';
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
    public function testDiemHopLe()
    {
        $this->assertTrue(isValidDiem(0)); // cực trị dưới
        $this->assertTrue(isValidDiem(10)); // cực trị trên 10
        $this->assertTrue(isValidDiem(5.5));
        $this->assertTrue(isValidDiem(0.1));
        $this->assertTrue(isValidDiem(9.9));
        $this->assertTrue(isValidDiem(6));
        $this->assertTrue(isValidDiem(7));
    }
    // Test case to check if updating marks is successful
    // public function testCapNhatDiem()
    // {
    //     // Initialize DB connection (assuming it's working properly)
    //     $connect = new DB();
    //     $conn = $connect->connect();

    //     // Insert some sample data into the database
    //     // This assumes the database is properly set up for testing
    //     // You may need to modify this part to match your database structure
    //     $sql = "INSERT INTO diem (MaHS, DiemMieng, Diem15Phut1, Diem15Phut2, Diem1Tiet1, Diem1Tiet2, DiemThi, DiemTB)
    //             VALUES ('1111111111', 8, 7, 8, 9, 9, 8, 8)";
    //     mysqli_query($conn, $sql);

    //     // Update marks
    //     $result = capNhatDiem('1111111111', 7, 8, 8, 8, 8, 8, 8);

    //     // Check if the update was successful
    //     $this->assertTrue($result);

    //     // Clean up: delete the sample data from the database
    //     $sql = "DELETE FROM diem WHERE MaHS = '1111111111'";
    //     mysqli_query($conn, $sql);
    // }

}