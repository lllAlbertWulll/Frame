<?php
/**
 * \View
 * User: GeGe WU
 * Date: 2017/8/30
 * Time: 下午 5:09
 */

class View
{
    const VIEW_BASE_PATH = '/app/views/';

    public $view;
    public $data;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public static function make($viewName = null)
    {
        if ( ! $viewName) {
            throw  new InvalidArgumentException("视图名称不能为空!");
        } else {
            $viewFilePath = self::getFilePath($viewName);
            if (is_file($viewFilePath)) {
                return new View($viewFilePath);
            } else {
                throw  new UnexpectedValueException("视图文件不存在!");
            }
        }
    }

    private static function getFilePath($viewName)
    {
        $fillPath = str_replace('.', '/', $viewName);
        return BASE_PATH.self::VIEW_BASE_PATH.$fillPath.'.php';
    }

    public function with($key, $value = null)
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function __call($name, $arguments)
    {
        if (starts_with($name, 'with')) {
            return $this->with(snake_case(substr($name, 4)), $arguments[0]);
        }
        throw new BadMethodCallException("方法 [$name] 不存在 !.");
    }


}