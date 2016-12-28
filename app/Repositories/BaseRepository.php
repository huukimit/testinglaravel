<?php
/**
 * Created by PhpStorm.
 * User: FRAMGIA\nguyen.huu.kim
 * Date: 26/12/2016
 * Time: 15:06
 */

namespace App\Repositories;


use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;
use League\Flysystem\Exception;

abstract class BaseRepository
{
    protected $app;
    protected $model;
    
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }
    
    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (! $model instanceof Model) {
            throw new Exception('Repository dose not support!');
        }
        $this->model = $model;
    }
    
    /**
     * Register model
     *
     * @return mixed
     */
    abstract protected function model();
}