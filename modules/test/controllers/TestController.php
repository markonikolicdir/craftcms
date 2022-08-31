<?php

namespace modules\test\controllers;

use craft\web\Controller;
use modules\test\services\HousesService;
use modules\test\traits\PluckTrait;

class TestController extends Controller
{

    use PluckTrait;

    public function actionPluck()
    {
        $service = new HousesService();

        $plucked = $this->array_pluck($service->getHouses(), 'founder');

        var_dump($plucked);

        die();
    }
}