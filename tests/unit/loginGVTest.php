<?php
//require_once __DIR__ . '/../../diemthi/admin/fnct_logingv.php';
//use Mockery as m;
class loginGVTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */

    /**
     * @runInSeparateProcess
     */
    protected $tester;

    protected function _before()
    {


    }

    protected function _after()
    {
        // Sau khi chạy test case
      //  m::close(); // Đóng Mockery
    }


    // public function testEmptyFields()
    // {
    //     $connectionMock = $this->getMockBuilder('DB')
    //         ->getMock();
    //     $connectionMock->expects($this->never())
    //         ->method('query');
        // $result = processLogin(['txtusergv' => '', 'txtpassgv' => ''], $connectionMock);
    //     $this->assertEquals('Vui lòng nhập đầy đủ tên tài khoản và mật khẩu!', $result);

    //     $result_1 = processLogin(['txtusergv' => '2300000001', 'txtpassgv' => ''], $connectionMock);
    //     $this->assertEquals('Vui lòng nhập đầy đủ tên tài khoản và mật khẩu!', $result_1);

    //     $result_2 = processLogin(['txtusergv' => '', 'txtpassgv' => '2300000001'], $connectionMock);
    //     $this->assertEquals('Vui lòng nhập đầy đủ tên tài khoản và mật khẩu!', $result_2);
    // }
    // public function testProcessLoginWrongPassword()
    // {
    //     // Mock database connection
    //     $mockConnection = m::mock('mysqli');

    //     // Giả lập kết quả truy vấn từ database
    //     $mockResult = m::mock('mysqli_result');
    //     $mockResult->shouldReceive('num_rows')->andReturn(1);
    //     $mockResult->shouldReceive('fetch_assoc')->andReturn([
    //         'Magv' => 'testUser',
    //         'passwordgv' => md5('wrongPassword')
    //     ]);

    //     $mockConnection->shouldReceive('query')
    //         ->with("SELECT * FROM giaovien WHERE Magv='testUser'")
    //         ->andReturn($mockResult);

    //     // Gọi hàm processLogin với dữ liệu giả lập
    //     $error = processLogin(['txtusergv' => 'testUser', 'txtpassgv' => 'testPassword'], $mockConnection);

    //     // Kiểm tra xem lỗi có đúng không
    //     $this->assertEquals($error, 'Mật khẩu không đúng. Vui lòng kiểm tra lại!');
    // }




}