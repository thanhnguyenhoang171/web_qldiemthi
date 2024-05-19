<!-- Unit test đã hoàn chỉnh -->
<?php
use Codeception\Stub;
//require_once "diemthi/admin/fnct_add_gv.php";
class fnct_add_gvTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        require_once ("diemthi\classes\DB.class.php");
    }

    protected function _after()
    {
    }

    // //Trường hợp kiểm tra đầu vào hợp lệ
    // public function testValidateInputWithValidData()
    // {
    //     $post = [
    //         'txtmagv' => '1234567890',
    //         'txtten' => 'John Doe',
    //         'txtdiachi' => '123 Street, City',
    //         'txtdienthoai' => '0123456789',
    //         'txtpass' => 'password123',
    //         'mamonhoc' => 'MM001'
    //     ];

    //     list($data, $errors) = validateInput($post);

    //     $this->assertEquals('1234567890', $data['magv']);
    //     $this->assertEquals('John Doe', $data['ten']);
    //     $this->assertEquals('123 Street, City', $data['diachi']);
    //     $this->assertEquals('0123456789', $data['dienthoai']);
    //     $this->assertEquals(md5('password123'), $data['pass']);
    //     $this->assertEquals('MM001', $data['mamonhoc']);
    //     $this->assertEmpty($errors);
    // }
    // // Trường hợp kiểm thử thiếu dữ liệu ( magv)
    // public function testValidateInputWithMissingData()
    // {
    //     $post = [
    //         'txtten' => 'John Doe',
    //         'txtdiachi' => '123 Street, City',
    //         'txtdienthoai' => '0123456789',
    //         'txtpass' => 'password123',
    //         'mamonhoc' => 'MM001'
    //     ];

    //     list($data, $errors) = validateInput($post);

    //     $this->assertArrayNotHasKey('magv', $data);
    //     $this->assertArrayHasKey('txtmagv', $errors);
    // }

    // // Trường hợp kiểm thử sai kiểu dữ liệu
    // public function testInvalidateInput()
    // {
    //     $post = [
    //         'txtmagv' => 'abc1234567894444', 
    //         'txtdienthoai' => '123', 
    //         'txtpass' => 'pass', 
    //         'mamonhoc' => 'MM001'
    //     ];
    //     list($data, $errors) = validateInput($post);
       
    //     $this->assertArrayHasKey('txtmagv', $errors);
    //     $this->assertArrayHasKey('txtdienthoai', $errors);
    //     $this->assertArrayHasKey('txtpass', $errors);
    // }
    // public function testGetMonHocOptions()
    // {
    //     $dbStub = $this->createMock(DB::class);
    //     $connStub = $this->createMock(mysqli::class);
    //     $dbStub->method('connect')
    //         ->willReturn($connStub);
    //     $resultStub = $this->createMock(mysqli_result::class);
    //     $resultStub->method('fetch_assoc')
    //         ->willReturnOnConsecutiveCalls(
    //             ['MaMonHoc' => 'CSDL0201'],
    //             ['MaMonHoc' => 'CTDLGT23'],
    //             ['MaMonHoc' => 'CV2024'],
    //             ['MaMonHoc' => 'KTPM23'],
    //             ['MaMonHoc' => 'TH223'],
    //             ['MaMonHoc' => 'TTHCM223'],
    //             null 
    //         );
    //     $connStub->method('query')
    //         ->willReturn($resultStub);
    //     $options = getMonHocOptions($dbStub);
    //     $this->assertEquals(['CSDL0201', 'CTDLGT23', 'CV2024', 'KTPM23', 'MMT0102','TH223' , 'TTHCM223' ], $options);
    // }
    //  public function testAddGiaoVien()
    // {
    //     $data = [
    //         'magv' => '1234567890',
    //         'mamonhoc' => 'CSDL0201',
    //         'ten' => 'Nguyen Kiem Thu',
    //         'diachi' => '123 Le Loi',
    //         'dienthoai' => '0987654321',
    //         'pass' => md5('1234567890')
    //     ];
    //     $giaovienStub = $this->createMock(giaovien::class);
    //     $giaovienStub->method('add')
    //                  ->with(
    //                      $this->equalTo($data['magv']),
    //                      $this->equalTo($data['mamonhoc']),
    //                      $this->equalTo($data['ten']),
    //                      $this->equalTo($data['diachi']),
    //                      $this->equalTo($data['dienthoai']),
    //                      $this->equalTo($data['pass'])
    //                  )
    //                  ->willReturn(true);
    //     $result = addGiaoVien($data);
    //     $this->assertTrue($result);
    // }
}