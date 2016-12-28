<?php

use App\Exceptions\RepositoryException;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;


class BaseRepositoryTest extends TestCase
{
    public function createApplication()
    {
        $app = parent::createApplication();
        $repository = Mockery::mock(UserRepository::class);
        $repository->shouldReceive('model')->andReturn(\App\Models\Alert::class);
        $app->instance(UserRepositoryInterface::class, $repository);
        return $app;
    }
    
    
    public function testBaseRepository()
    {
//        dd($this->app->make(UserRepositoryInterface::class)->model());
        
        $res = $this->visitRoute('auth.getLoginPage');//->expectException(RepositoryException::class);
//        dd($res);
//        dd($res);//->expectException(RepositoryException::class);
    }
}
