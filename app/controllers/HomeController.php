<?php
/**
 * Created by PhpStorm.
 * User: GeGe WU
 * Date: 2017/8/30
 * Time: 下午 3:17
 */
class HomeController extends BaseController
{
    public function index() {
        $this->view = View::make('index')
                        ->withContent('A Frame For Yourself');
    }
    
}