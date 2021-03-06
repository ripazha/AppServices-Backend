<?php 

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

class CommentController extends ActiveController
{
    public $modelClass = 'app\modules\v1\models\Comment';
    
	public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['authenticator'] = [
	        'class' => CompositeAuth::className(),
	        'authMethods' => [
	            HttpBearerAuth::className(),
	            QueryParamAuth::className(),
	        ],
	    ];
	    return $behaviors;
	}
}