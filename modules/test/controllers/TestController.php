<?php

namespace modules\test\controllers;

use craft\web\Controller;
use Exception;
use modules\test\services\HousesService;
use modules\test\traits\PluckTrait;
use craft\web\View;
use yii\web\Response;

class TestController extends Controller
{
    use PluckTrait;

    public function actionPluck(): Response
    {
        $service = new HousesService();
        try {
            $api = $service->getHouses();

            $plucked = $this->array_pluck($api, 'founder');

        } catch (Exception $e) {
            $error = $e->getMessage();
        }

        return $this->renderTemplate(
            '_test',
            ['plucked' => $plucked ?? [], 'error' => $error ?? ''],
            View::TEMPLATE_MODE_SITE
        );
    }
}