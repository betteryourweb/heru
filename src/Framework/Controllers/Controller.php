<?php

namespace Betteryourweb\Framework\Controllers;

use Betteryourweb\Framework\Application;
use Philo\Blade\Blade;

class Controller
{
    /**
     * @var Application
     */
    private $app;

    /**
     * Controller constructor.
     * @param Application $app
     */
    public function __construct()
    {

    }

    /**
     * @param $view
     * @param array $data
     * @return mixed
     */
    public function view($view, $data=[])
    {
        return (new Blade(__DIR__.'/../../../../resources/views', __DIR__.'/../../../../storage/cache/blade'))->view()->make($view, $data)->render();
    }
}