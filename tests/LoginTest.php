<?php


class LoginTest extends TestCase
{
    protected $credentials;
    
    protected function setUp()
    {
        parent::setUp();
        $this->credentials = [
            [
                'email'    => 'admin@gmail.com',
                'password' => 'admin123'
            ],
            [
                'email'    => 'huukimit@gmail.com',
                'password' => 'admin123'
            ],
            [
                'email'    => 'admin@gmail.com',
                'password' => ''
            ],
        ];
    }
    
    public function testCanSeeLoginPage()
    {
        $this->assertSessionMissing(SS_LOGIN);
        
        $this->visitRoute('auth.getLoginPage')
            ->type($this->credentials[0]['email'], 'email')
            ->type($this->credentials[0]['password'], 'password')
            ->press('Submit');
    }
    
    public function testMemberLogin()
    {
        $this->post(route('auth.postLogin'), $this->credentials[0])
            ->assertSessionMissing('errors')
            ->assertRedirectedToRoute('home')
            ->assertSessionHas(SS_LOGIN);
    }
    
    public function testLoginFailed()
    {
        $this->post(route('auth.postLogin'), $this->credentials[1])
            ->assertRedirectedToRoute('auth.getLoginPage')
            ->assertSessionHas(FLASH_MESSAGE)
            ->assertSessionMissing(SS_LOGIN);
        
        $this->post(route('auth.postLogin'), $this->credentials[2])
            ->assertSessionHas('errors')
            ->assertSessionMissing(SS_LOGIN);
    }
}
