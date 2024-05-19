<?php
//require_once __DIR__ . '/../../diemthi/admin/fnct_login.php';

class loginADTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */

    /**
     * @runInSeparateProcess
     */
    protected $tester;

    // protected function _before()
    // {


    // }

    // protected function _after()
    // {

    // }


    // public function testEmptyFields()
    // {
    //     $connectionMock = $this->getMockBuilder('DB')
    //         ->getMock();
    //     $connectionMock->expects($this->never())
    //         ->method('query');
    //     $result = login('', '', $connectionMock);
    //     $result_1 = login('qldtou', '', $connectionMock);
    //     $result_2 = login('', 'admin', $connectionMock);
    //     $this->assertEquals('Vui lòng nhập đầy đủ tên tài khoản và mật khẩu', $result['error']);
    //     $this->assertEquals('Vui lòng nhập đầy đủ tên tài khoản và mật khẩu', $result_1['error']);
    //     $this->assertEquals('Vui lòng nhập đầy đủ tên tài khoản và mật khẩu', $result_2['error']);
    // }

    // public function testInvalidPassword()
    // {
    //     $connectionMock = $this->getMockBuilder('DB')
    //         ->getMock();
    //     $connectionMock->expects($this->once())
    //         ->method('query')
    //         ->willReturn(new class {
    //         public function fetch_assoc()
    //         {
    //             return ['username' => 'qldtou', 'password' => md5('admin'), 'level' => 1, 'userid' => 1];
    //         }
    //         });
    //     $result = login('qldtou', 'invalidpass', $connectionMock);
    //     $this->assertEquals('Mật khẩu không đúng. Vui lòng kiểm tra lại!', $result['error']);
    // }

    // public function testInvalidUsername()
    // {
    //     $connectionMock = $this->getMockBuilder('DB')
    //         ->getMock();
    //     $connectionMock->expects($this->once())
    //         ->method('query')
    //         ->willReturn(new class {
    //         private $called = false;
    //         public function fetch_assoc()
    //         {
    //             if (!$this->called) {
    //                 $this->called = true;
    //                 return ['username' => 'qldtou', 'password' => md5('admin'), 'level' => 1, 'userid' => 1];
    //             } else {
    //                 return null;
    //             }
    //         }
    //         });
    //     $result = login('invalidusername', 'admin', $connectionMock);
    //     $this->assertEquals('Tên đăng nhập không chính xác', $result['error']);
    // }
    // public function testValidLogin()
    // {
    //     $connectionMock = $this->getMockBuilder('DB')
    //         ->getMock();
    //     $connectionMock->expects($this->once())
    //         ->method('query')
    //         ->willReturn(new class {
    //         public function fetch_assoc()
    //         {
    //             return ['username' => 'qldtou', 'password' => md5('admin'), 'level' => 1, 'userid' => 1];
    //         }
    //         });
    //     $result = login('qldtou', 'admin', $connectionMock);
    //     $this->assertEmpty($result['error']);
    // }



}