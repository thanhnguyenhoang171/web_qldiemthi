<!-- Unit test done -->
<?php
//require_once "diemthi/admin/repass1.php";
class repass1Test extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    // Mock connection object
   // protected $mockConnection;
    protected function setUp(): void
    {
        // // Mock the database connection
        // $this->mockConnection = $this->getMockBuilder('mysqli')
        //     ->disableOriginalConstructor()
        //     ->getMock();

        // // Mock the mysqli_query function
        // $this->mockConnection->expects($this->any())
        //     ->method('query')
        //     ->willReturn(true);
    }
    protected function _before()
    {
    
    }

    protected function _after()
    {
    }

    // // Kiểm tra nhập thiếu mật khẩu cũ
    // public function testInputWithNullOldPass()
    // {
    //     $inputPassword = null;
    //     $sessionPassword = md5('1234567890');
    //     $expectedError = "Bạn chưa nhập Mật Khẩu";
    //     $error = validateOldPassword($inputPassword, $sessionPassword);
    //     $this->assertEquals($expectedError, $error);
    // }
    
    // //Kiểm thử nhập không đúng mật khẩu cũ
    // public function testInvalidOldPass()
    // {
    //     $inputPassword = '2151013087';
    //     $sessionPassword = md5('1234567890');

    //     $expectedError = "Mật Khẩu Cũ không chính xác";
    //     $error = validateOldPassword($inputPassword, $sessionPassword);

    //     $this->assertEquals($expectedError, $error);
    // }

    // // Kiểm thử nhập đúng mật khẩu
    // public function testValidateOldPass()
    // {
    //     $inputPassword = 'correctpassword';
    //     $sessionPassword = md5('correctpassword');
    //     $expectedError = null;
    //     $error = validateOldPassword($inputPassword, $sessionPassword);
    //     $this->assertEquals($expectedError, $error);
    // }

    // //Kiểm thử không nhập mật khẩu mới
    // public function testNullNewPass()
    // {
    //     $newPassword = null;
    //     $confirmPassword = 'newpassword';
    //     $expectedError = "Bạn chưa nhập Mật Khẩu Mới";
    //     $error = validateNewPassword($newPassword, $confirmPassword);
    //     $this->assertEquals($expectedError, $error);
    // }

    // // Kiểm tra nhập lại mật khẩu mới không khớp
    // public function testMismatchedNewPass()
    // {
    //     $newPassword = 'newpassword';
    //     $confirmPassword = 'differentpassword';
    //     $expectedError = "Mật Khẩu Mới không trùng khớp";
    //     $error = validateNewPassword($newPassword, $confirmPassword);
    //     $this->assertEquals($expectedError, $error);
    // }
    
    // // Kiểm tra nhập sai dữ liệu cho mật khẩu mới
    // public function testInvalidNewPass()
    // {
    //     $newPassword = '123';
    //     $confirmPassword = '123';
    //     $expectedError = "Mật Khẩu nhập vào không hợp lệ!";
    //     $error = validateNewPassword($newPassword, $confirmPassword);
    //     $this->assertEquals($expectedError, $error);
    // }
    
    // // Kiểm tra nhập đúng mật khẩu mới
    // public function testValidNewPass()
    // {
    //     $newPassword = 'longpassword';
    //     $confirmPassword = 'longpassword';
    //     $expectedError = null;
    //     $error = validateNewPassword($newPassword, $confirmPassword);
    //     $this->assertEquals($expectedError, $error);
    // }
    
    // // Test đang bị lỗi không kết nối được database đẻ mock
    // public function testUpdatePassword()
    // {
    //     // Arrange
    //     $userId = "2300000001";
    //     $newPassword = '1234567890';

    //     // Act
    //     $result = updatePassword($this->mockConnection, $userId, $newPassword);

    //     // Assert
    //     $this->assertTrue($result);
    // }

    // public function testHandleFormSubmissionInvalidData()
    // {
    //     // Mock database connection object
    //     $con = $this->getMockBuilder('mysqli')
    //         ->disableOriginalConstructor()
    //         ->getMock();

    //     // Mock $_POST data
    //     $_POST['txtpassgv'] = 'oldpassword'; // Set invalid old password
    //     $_POST['txtpassgv2'] = 'newpassword'; // Set valid new password
    //     $_POST['txtpassgv3'] = 'newpassword'; // Confirm valid new password

    //     // Mock session data
    //     $_SESSION['ses_Magv'] = '2300000001';
    //     $_SESSION['ses_passwordgv'] = md5('oldpassword'); // Set session password

    //     // Call handlePasswordChange() function
    //     $error = handlePasswordChange($con, $_SESSION['ses_Magv'], $_SESSION['ses_passwordgv']);

    //     // Assert
    //     $this->assertEquals("Mật Khẩu Cũ không chính xác", $error);
    // }

}