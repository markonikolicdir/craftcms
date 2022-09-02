<?php


namespace modules\test;

use Craft;
use craft\events\RegisterUrlRulesEvent;
use craft\web\UrlManager;
use modules\test\twig\PluckExtension;
use yii\base\Event;

class Module extends \yii\base\Module
{
    public function init(): void
    {
        // Define a custom alias named after the namespace
        Craft::setAlias('@test', __DIR__);

        // Set the controllerNamespace based on whether this is a console or web request
        if (Craft::$app->getRequest()->getIsConsoleRequest()) {
            $this->controllerNamespace = 'modules\\test\\console\\controllers';
        } else {
            $this->controllerNamespace = 'modules\\test\\controllers';
        }

        parent::init();

        // Custom initialization code goes here...

        Event::on(UrlManager::class, UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function(RegisterUrlRulesEvent $event) {
                $event->rules = array_merge($event->rules, [
                    'GET test' => 'test/test/pluck',
                ]);
            }
        );

        $extension = new PluckExtension();
        Craft::$app->view->registerTwigExtension($extension);
    }
}