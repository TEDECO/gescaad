<?php
namespace common\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Cookie;

class AppController extends Controller
{

    /**
     *
     * {@inheritdoc}
     * @see \yii\base\BaseObject::init()
     */
    public function init()
    {
        parent::init();
        
        $this->actionLanguage();
    }

    /**
     * Apply language settings.
     */
    public function actionLanguage()
    {
        // Get session name
        $name = Yii::$app->session->name;
        
        // Updates the languaje cookie when user changes the language
        if ($language = Yii::$app->request->get('language')) {
            
            $languageCookie = new Cookie([
                'name' => 'gescaad-' . $name . '-language',
                'value' => $language,
                'expire' => time() + 60 * 60 * 24 * 30 // 30 days
            ]);
            
            Yii::$app->response->cookies->add($languageCookie);
        } else {
            // get the cookie collection (yii\web\CookieCollection) from the "request" component
            $cookies = Yii::$app->request->cookies;
            
            if ($cookies->has('gescaad-' . $name . '-language')) {
                // get the "language" cookie value. If the cookie does not exist, return "en" as the default value
                $language = $cookies->getValue('gescaad-' . $name . '-language');
            } else {
                // Try to get preferred language.
                $supportedLanguages = [
                    'en',
                    'es-ES'
                ];
                $language = Yii::$app->request->getPreferredLanguage($supportedLanguages);
            }
        }
        
        // Sets application language
        Yii::$app->language = $language;
    }
}
?>