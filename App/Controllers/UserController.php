<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 16.10.17
 * Time: 11:15
 */

namespace TestMVC\App\Controllers;


use TestMVC\App\Models\User;
use TestMVC\Core\Controller;
use TestMVC\Core\Model;
use TestMVC\Core\View;

class UserController extends Controller
{
    private $bootstrap;
    protected $model;

    public function __construct(Model $model)
    {
        $this->bootstrap = \Bootstrap::getInstance();
        $this->model = $model;
        parent::__construct($model);
    }

    public function indexAction()
    {
        View::view($this->model->getName());
    }

    public function searchAction()
    {
        View::view($this->model,'search');
    }
    public function createAction()
    {
        View::view($this->model,'create');
    }
}