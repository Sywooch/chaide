<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\User;
use app\models\Sell;
class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

     public function actionStatistics()
    {
        $males=User::find()->where(['sex'=>'MALE','type'=>'CLIENT'])->count();
        $females=User::find()->where(['sex'=>'FEMALE','type'=>'CLIENT'])->count();
        $sellc=Sell::find()->where(['status'=>'COMPLETE'])->count();
        $selli=Sell::find()->where(['status'=>'INCOMPLETE'])->count();
        $totalsell= Sell::find()->all();
        return $this->render('statistics',['males' => $males ,'females' => $females,'sellc'=>$sellc,'selli'=>$selli,'totalsell'=>$totalsell]);
   
    }
}
