<?php
/**
 * Created by PhpStorm.
 * User: GeGe WU
 * Date: 2017/8/30
 * Time: 下午 4:51
 */

use Illuminate\Database\Capsule\Manager as Capsule;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

// 定义 BASE_PATH
define('BASE_PATH', __DIR__);

// Autoload 自动载入
require  BASE_PATH.'/vendor/autoload.php';

// Eloquent ORM
$capsule = new Capsule;
$capsule->addConnection(require  BASE_PATH.'/config/database.php');
$capsule->bootEloquent();

// whoops 错误提示
$whoops = new Run();
$whoops->pushHandler(new PrettyPageHandler());
$whoops->register();

