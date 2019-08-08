<?php 
namespace common\models;
use Yii;
use common\models\Exp;
use yii\base\Model;
use yii\db\Query;


/**
 * 
 */
/**
 * This is the model class for table "exp".
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property string $start_date
 * @property string $end_date
 * @property string $co_name
 * @property string $des
 */
class UserExp extends Model 
{
	public $id = 0 ;
	public $user_id;
	public $name;
	public $start_date;
	public $end_date;
	public $co_name;
	public $des;
	
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

	
	public function saves(){
		$user = new Exp;
		$user = $this->getexp();
		$this ->load(Yii::$app->request->post()) ;
		$user->user_id = $this->user_id;
		$user->name = $this->name;
		$user->user_id = Yii::$app->user->identity->id;
		$user->start_date = $this->start_date;
		$user->end_date = $this->end_date;
		$user->co_name = $this->co_name;
		$user->des = $this->des;
		$user->save();

	}
	public function getexp()
	{   
		$id = $this->id;
		$exp = Exp::find()->where(['id' => $id])->one();


		return $exp;
	}
	public function getWorkList(){
		$user = Yii::$app->user->identity->id;
		return  Exp::find()->where(['user_id' => $user])->all();
		

	}
	public function setexp($user){
		$this->user_id = $user;
		$insert = Yii::$app->db->createCommand("INSERT INTO exp ( name, user_id, start_date, end_date, co_name, des) VALUES ( 'Công việc mới( nhấp vào để sửa)', $this->user_id , '1999-01-01', '1999-01-01', 'Nhập tên công ty', 'Mô tả về công việc này')")->execute();
		return ;
	}
	public function deleteexp($id){
		(new Query)
		->createCommand()
		->delete('exp', ['id' => $id])
		->execute();
		return;
	}


}
?>
