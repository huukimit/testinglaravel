<?php
/**
 * Created by PhpStorm.
 * User: FRAMGIA\nguyen.huu.kim
 * Date: 26/12/2016
 * Time: 13:32
 */

namespace App\Repositories;


use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Find a user by email
     *
     * @param $email
     * @return User|null
     */
    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }
    
    /**
     * Check authentication
     *
     * @param array $credentials
     * @return User|null
     */
    public function attempt($credentials)
    {
        $user = $this->findByEmail($credentials['email']);
        
        if ($user && Hash::check($credentials['email'] . $credentials['password'], $user->password)) {
            Session::set(SS_LOGIN, $user);
            
            return $user;
        } else {
            return null;
        }
    }
    
    /**
     * Create a new user
     *
     * @param $credentials
     * @return User
     */
    public function create($credentials)
    {
        $credentials['password'] = Hash::make($credentials['email'] . $credentials['password']);
        
        return $this->model->create($credentials);
    }
    
    /**
     * Register model
     *
     * @return mixed
     */
    protected function model()
    {
        return User::class;
    }
}