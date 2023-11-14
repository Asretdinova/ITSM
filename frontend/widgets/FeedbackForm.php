<?php

/**

 * Date: 9/5/19
 * Time: 1:05 AM
 */

namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use common\models\Feedback;

class FeedbackForm extends Widget
{
    public $simpleForm = false;

    public function run()
    {
        $feedback = new Feedback();

        if ($this->simpleForm)
            $feedback->setScenario(Feedback::SCENARIO_SIMPLE);

        if ($feedback->load(Yii::$app->request->post()) && $feedback->save()) {
            Yii::$app->session->setFlash('success', Yii::t('main', 'Спасибо! Ваше сообщение успешно отправлено. Мы свяжемся с вами в самое ближайшее время'));
            $feedback = new Feedback();
        }

        return $this->render('feedbackView', [
            'feedback' => $feedback,
            'simpleForm' => $this->simpleForm
        ]);
    }
}