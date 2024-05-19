<?php
//require_once 'diemthi\admin\fnct_add_gv.php';
// require_once 'diemthi\classes\DB.class.php';
// require_once 'diemthi\classes\giaovien.class.php';
class Add_giao_vienTest extends \Codeception\Test\Unit
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

    // // tests
    // public function testValidateInput()
    // {
    //     $post = [
    //         'txtmagv' => '1234567890',
    //         'txtten' => 'Minh Khuê',
    //         'txtdiachi' => 'Tây Ninh',
    //         'txtdienthoai' => '0987654321',
    //         'txtpass' => 'password123',
    //         'mamonhoc' => 'CS101'
    //     ];

    //     list($data, $errors) = validateInput($post);

    //     $this->assertEmpty($errors);
    //     $this->assertEquals('1234567890', $data['magv']);
    //     $this->assertEquals('Minh Khuê', $data['ten']);
    //     $this->assertEquals('Tây Ninh', $data['diachi']);
    //     $this->assertEquals('0987654321', $data['dienthoai']);
    //     $this->assertEquals(md5('password123'), $data['pass']);
    //     $this->assertEquals('CS101', $data['mamonhoc']);
    // }
    // public function testValidateInputWithErrors()
    // {
    //     $post = [
    //         'txtmagv' => '123',
    //         'txtten' => '',
    //         'txtdiachi' => '',
    //         'txtdienthoai' => '123',
    //         'txtpass' => 'pass',
    //         'mamonhoc' => 'CS101'
    //     ];

    //     list($data, $errors) = validateInput($post);

    //     $this->assertNotEmpty($errors);
    //     $this->assertArrayHasKey('txtmagv', $errors);
    //     $this->assertArrayHasKey('txtten', $errors);
    //     $this->assertArrayHasKey('txtdiachi', $errors);
    //     $this->assertArrayHasKey('txtdienthoai', $errors);
    //     $this->assertArrayHasKey('txtpass', $errors);
    // }

    // public function testAddGiaoVien()
    // {
    //     $data = [
    //         'magv' => '1234567890',
    //         'mamonhoc' => 'CS101',
    //         'ten' => 'John Doe',
    //         'diachi' => '123 Main St',
    //         'dienthoai' => '0987654321',
    //         'pass' => md5('password123')
    //     ];

    //     $result = addGiaoVien($data);

    //     $this->assertTrue($result);
    // }

    // public function testGetMonHocOptions()
    // {
    //     $options = getMonHocOptions();

    //     $this->assertIsArray($options);
    //     $this->assertNotEmpty($options);
    // }
}