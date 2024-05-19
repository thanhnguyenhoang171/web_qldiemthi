<?php
//require_once "diemthi\admin\diem\add_chon2.php";
class add_chon2Test extends \Codeception\Test\Unit
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

    // // Kiểm tra hàm isValidDiem với đầu vào hợp lệ
    // public function testIsValidDiemWithValidInput()
    // {
    //     $validDiems = [0, 5, 7.5, 10];

    //     foreach ($validDiems as $diem) {
    //         $this->assertTrue(isValidDiem($diem));
    //     }
    // }

    // // Kiểm tra hàm isValidDiem với dữ liệu đầu vào không hợp lệ
    // public function testIsValidDiemWithInvalidInput()
    // {
    //     $invalidDiems = [-1, 11, 5, "abc", null];

    //     foreach ($invalidDiems as $diem) {
    //         $this->assertFalse(isValidDiem($diem));
    //     }
    // }
    // // Kiểm tra hàm addDiemForStudent với dữ liệu đầu vào hợp lệ
    // public function testAddDiemForStudentWithValidInput()
    // {
    //     // Mock the database connection
    //     $conn = $this->getMockBuilder('mysqli')
    //         ->disableOriginalConstructor()
    //         ->getMock();

    //     // Expect a call to mysqli_query with a specific SQL query
    //     $conn->expects($this->once())
    //         ->method('query')
    //         ->willReturn(true); // Simulate a successful query

    //     // Call the function to add diem for a student
    //     $result = addDiemForStudent($conn, 'CS01C', 'MMT0102', '23HK1', '2108959190', 8, 7, 6, 9, 8, 7);

    //     // Assert that the result is true (success)
    //     $this->assertTrue($result);
    // }
}