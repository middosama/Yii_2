<?php 
namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;
use common\models\User;
use Yii;


class ImageUpload extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $firstname;
    public $lastname;
    public $phone;
    public $birthday;

    public function rules()
    {
        return [
            [['firstname','lastname','phone','birthday'],'required'],
            ['imageFile', 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            ['firstname','string','max'=> 30],
            ['lastname','string','max'=> 30],
            ['phone','string','max'=> 20],
            // ['birthday','date']
            

        ];
    }

    public function attributeLabels()
    {
        return [
            'firstname' => 'Tên họ',
            'lastname' => 'Tên gọi',
            'phone' => 'Số điện thoại',
            'birthday' => 'Ngày sinh',
        ];
    }
    
    public function upload()
    {
        $user = User::findIdentity(Yii::$app->user->identity->id);
        
        if ($this->validate()) {
            // print_r($this->imageFile);

            if (!empty($this->imageFile->name)) {
                
                
                $filename = $this->imageFile->baseName.'_'.time().'.'. $this->imageFile->extension;
                $this->imageFile->saveAs('uploads/' . $filename );
            $user->avatar = $filename;
            Yii::$app->user->identity->avatar = $filename;
            // unset($this->imageFile->name);
            }

            $user->firstname = $this->firstname;
            $user->lastname = $this->lastname;
            $user->phone = $this->phone;
            $user->birthday = $this->birthday;
            // $user = $this;
            // unset($this->imageFile->name);

            return $user->save();

        }
        



    }
}
