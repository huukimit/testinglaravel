<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;


class RegistrationTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * The test credentials data
     *
     * @var array
     */
    protected $credentials;
    
    protected function setUp()
    {
        parent::setUp();
        $this->credentials = [
            'name'                  => 'Kim Nguyen',
            'email'                 => 'huukimit@gmail.com',
            'password'              => 'admin123',
            'password_confirmation' => 'admin123'
        ];
    }
    
    public function testCanSeeRegisterPage()
    {
        $this->visitRoute('auth.getRegisterPage')->see('Register');
    }
    
    public function testNewMemberRegistration()
    {
        $this->post(route('auth.getRegisterPage'), $this->credentials)
            ->assertSessionMissing('errors')
            ->assertRedirectedToRoute('auth.getLoginPage')
            ->assertSessionHas(FLASH_MESSAGE);
        
        /**
         * Flash message
         *
         * @var App\Models\Alert
         */
        $alert = session(FLASH_MESSAGE);
        $this->assertTrue('success' == $alert->getType());
        
        $data        = array_only($this->credentials, 'email');
        $emailResult = $this->seeInDatabase('users', $data);
        $this->assertEquals(1, $emailResult->count(), 'Error: Duplicated email.');
    }
}
