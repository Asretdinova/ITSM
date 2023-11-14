<?php
namespace backend\controllers;

use Yii;
use common\models\Users;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'sign-up'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $user = Users::find()->where([
                'username' => $model->username,
                'password' => md5($model->password),
                'is_active' => true,
            ])
            ->andWhere([
                '<>', 'role', Users::ROLE_USER
            ])->one();

            if ($user) {
                Yii::$app->user->login($user, $model->rememberMe ? 3600 * 24 * 30 : 0);
                return $this->redirect(['/']);
            }

            Yii::$app->session->setFlash('error', 'Неправильный логин или пароль');
            $model->password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionSignUp()
    {
        $model = new Users();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->password = md5($model->password);
            $model->role = Users::ROLE_USER;
            $model->is_active = false;

            if ($model->save()) {
                return $this->redirect('/');
            } else {
                foreach ($model->getErrors() as $error) {
                    Yii::$app->session->setFlash('error', @$error[0]);
                }
            }
        } else {
            foreach ($model->getErrors() as $error) {
                Yii::$app->session->setFlash('error', @$error[0]);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
