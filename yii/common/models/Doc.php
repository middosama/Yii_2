<?php

namespace common\models;

use yii\db\ActiveRecord;


/**
 * UploadForm is the model behind the upload form.
 */
class Doc extends ActiveRecord
{
  
    // public $des;
    // public $name;
    // public $dir_name;
    // public $extend;
    // public $user_id;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name','des','dir_name','extend','user_id'],'required']
            

        ];
    }
    public static function tableName()
    {
        return 'doc';
    }



}
