<?php

namespace common\models;
use yii\db\ActiveRecord;

use Yii;




class Exp extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['user_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['co_name'], 'string', 'max' => 255],
            [['des'], 'string'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

            'name' => 'Tên công việc',
            
            'start_date' => 'Ngày bắt đầu',
            'end_date' => 'Ngày kết thúc',
            'co_name' => 'Tên công ty',
            'des' => 'Mô tả',
        ];
    }



    public function getexp()
    {   
        $id = $this->id;
        $exp = Exp::find()->where(['id' => $id])->one();
/*        echo "<pre>";
        print_r($exp);
        die;*/

        return $exp;
    }


    public function getWorkList(){
        $user = Yii::$app->user->identity->id;
        $user = Exp::find()->where(['user_id' => $user])->all();
        return $user;

    }
}
