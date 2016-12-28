<?php


use App\Models\User;


class UserLogoutTest extends TestCase
{
    protected $user;
    
    /**
     * Set up data for test
     */
    protected function setUp()
    {
        parent::setUp();
        $this->user = User::where('email', 'admin@gmail.com')->first();
        \Illuminate\Support\Facades\Session::set(SS_LOGIN, $this->user);
    }
    
    /**
     * Logout test
     */
    public function testLogout()
    {
        $this->get(route('auth.logout'))
            ->assertRedirectedToRoute('home')
            ->assertSessionMissing(SS_LOGIN);
    }
}
