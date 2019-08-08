<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;
use common\models\Doc;
use Yii;
use yii\db\Query;

/**
 * UploadForm is the model behind the upload form.
 */
class DocForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;
    public $des;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [

            ['file', 'file', 'skipOnEmpty' => false, 'extensions'=>'doc,docx,pdf, png, jpeg, jpg', 'maxSize'=> '5000000','tooBig'=> 'Kích thước tối đa là 5Mb'],
            ['des', 'string'],
            ['des', 'required'],

        ];
    }
    public function saves(){
        $temp = new Doc();
        $temp->dir_name = $this->file->baseName.'_'.time() . '.' . $this->file->extension;
        $this->file->saveAs('uploads/' . $temp->dir_name );

        $temp->name = $this->file->baseName;
        $temp->extend = $this->file->extension;
        $temp->user_id = Yii::$app->user->identity->id;
        $temp->des = Yii::$app->request->post()['DocForm']['des'];
        echo ($temp->save());
        


    }
    public function attributeLabels()
    {
        return [
            'file' => 'Tệp tải lên',
            'des' => 'Mô tả',
        ];
    }
    public function getDocList(){
        return Doc::find()->where(['user_id'=>Yii::$app->user->identity->id]) -> all();
    }

    public function delete($id){
        (new Query)
        ->createCommand()
        ->delete('doc', ['id' => $id])
        ->execute();
        return;
    }

}
