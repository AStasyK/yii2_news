<?php
    namespace app\controllers;

    use Yii;
    use yii\filters\AccessControl;
    use yii\web\Controller;
    use yii\filters\VerbFilter;
    use app\models\User;
    use app\models\News;
    use app\models\LoginForm;
    use app\models\SignupForm;
    use yii\data\ActiveDataProvider;
    use yii\data\Pagination;


    class MainController extends Controller {
        
        //action map
        /**
        * @inheritdoc
        */
        public function actions() {
            return [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                ],
                'captcha' => [
                    'class' => 'yii\captcha\CaptchaAction',
                    'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                ],
            ];
        }
        
        //main page actions
        public function actionIndex() {
            //render view
            return $this->render('index');
        }
        public function actionAbout() {
            return $this->render('about');
        }
        public function actionNews($id = null) {
            if(!$id) {
                $data = new ActiveDataProvider([
                    'query' => News::find()
                        ->where(['deleted' => false]),
                    'pagination' => [
                        'pageSize' => 3,
                    ],
                ]);
                

                return $this->render('news', [ 'data' => $data ]);
            } else {
                $data = new ActiveDataProvider([
                    'query' => News::find()
                        ->where(['deleted' => false, 'id' => $id])
                ]);

                return $this->render('post', [ 'data' => $data ]);
            }
        }
        public function actionContacts() {
            return $this->render('contacts');
        }
        
        public function actionLogin() {
            # if(Yii::$app->request->post()){
            #     echo '<pre>';
            #     print_r(Yii::$app->request->post());
            #     echo '</pre>';
            #     Yii::$app->end();
            # }
            
            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if ($model->login()) {
                    return $this->goHome();
                } else {
                    Yii::$app->session->setFlash('error', 'Возникала ошибка при авторизации');
                    Yii::error('Ошибка при регистрации');
                    return $this->refresh();
                }
            }
            return $this->render('login', ['model' => $model]);
        }
        public function actionLogout() {
            Yii::$app->user->logout();
            return $this->goHome();
        }
        
        public function actionSignup() {
            $model = new SignupForm();
            return $this->render('signup', ['model' => $model]);
        }
    }
        
        