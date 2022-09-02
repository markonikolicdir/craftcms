<?php

namespace modules\test\controllers;

use craft\web\Controller;
use Exception;
use modules\test\services\HousesService;
use craft\web\View;
use yii\web\Response;

class TestController extends Controller
{
    public function actionPluck(): Response
    {
        $service = new HousesService();
        try {
            $houses = $service->getHouses();
        } catch (Exception $e) {
            $error = $e->getMessage();
        }

        return $this->renderTemplate(
            '_test',
            [
                'houses' => $houses ?? [],
                'error' => $error ?? ''
            ],
            View::TEMPLATE_MODE_SITE
        );
    }
}