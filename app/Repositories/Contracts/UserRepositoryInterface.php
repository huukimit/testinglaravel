<?php
/**
 * Created by PhpStorm.
 * User: FRAMGIA\nguyen.huu.kim
 * Date: 26/12/2016
 * Time: 13:40
 */

namespace App\Repositories\Contracts;


use Illuminate\Database\Eloquent\Model;


interface UserRepositoryInterface
{
    /**
     * Find a user by email
     *
     * @param $email
     * @return mixed
     */
    public function findByEmail($email);
    
    /**
     * Create a new user
     *
     * @param $credentials
     * @return Model|null
     */
    public function create($credentials);
    
    /**
     * Check authentication
     *
     * @param $credentials
     * @return Model|null
     */
    public function attempt($credentials);
}