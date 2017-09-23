<?php
/**
 * Created by PhpStorm.
 * User: GeGe WU
 * Date: 2017/8/30
 * Time: 下午 3:15
 */
class BaseController
{
    protected $view;

    public function __construct()
    {

    }

    public function __destruct()
    {
        $view = $this->view;

        if ($view instanceof View) {
            extract($view->data);
            require $view->view;
        }
    }
}