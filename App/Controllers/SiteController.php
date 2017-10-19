<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 16.10.17
 * Time: 11:24
 */

namespace TestMVC\App\Controllers;


use TestMVC\App\Models\User;
use TestMVC\Core\Controller;
use TestMVC\Core\Model;
use TestMVC\Core\View;

class SiteController extends Controller
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
        View::view("site","index",["name"=>"JohnCena"]);
    }

}