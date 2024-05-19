<?php
//require "diemthi/admin/hocsinh/fnct_add_hs.php";
class add_hsTest extends \Codeception\Test\Unit
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

    // tests
//   public function testValidateInputSuccess()
//     {
//         $data = [
//             'txtmahs' => '1234567890',
//             'malophoc' => 'A1',
//             'txtten' => 'Nguyen Van A',
//             'txtgt' => 1,
//             'txtngs' => '2000-01-01',
//             'txtns' => 'Hanoi',
//             'txtdantoc' => 'Kinh',
//             'txtcha' => 'Nguyen Van B',
//             'txtme' => 'Tran Thi C',
//             'txtpasshs' => 'password123'
//         ];

//         list($validatedData, $errors) = validateInput($data);

//         $this->assertEmpty($errors);
//         $this->assertEquals('1234567890', $validatedData['txtmahs']);
//         $this->assertEquals('A1', $validatedData['malophoc']);
//         $this->assertEquals('Nguyen Van A', $validatedData['txtten']);
//         $this->assertEquals('Nam', $validatedData['txtgt']);
//         $this->assertEquals('2000-01-01', $validatedData['txtngs']);
//         $this->assertEquals('Hanoi', $validatedData['txtns']);
//         $this->assertEquals('Kinh', $validatedData['txtdantoc']);
//         $this->assertEquals('Nguyen Van B', $validatedData['txtcha']);
//         $this->assertEquals('Tran Thi C', $validatedData['txtme']);
//         $this->assertEquals(md5('password123'), $validatedData['txtpasshs']);
//     }
}