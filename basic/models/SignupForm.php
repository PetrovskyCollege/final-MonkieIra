<?php 
  
namespace app\models; 
  
use Yii; 
use yii\base\Model; 
  
/** 
 * Signup form 
 */ 
class SignupForm extends Model 
{ 
  
    public $name; 
    public $password; 
    public $email;
    public $hobbies;
    public  $favorite_color;
    public $favorite_food;
    
  
    /** 
     * @inheritdoc 
     */ 
    public function rules() 
    { 
        return [ 
            ['name', 'trim'], 
            ['name', 'required'], 
            ['name', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This name has already been taken.'], 
            ['name', 'string', 'min' => 2, 'max' => 255], 
            ['email', 'trim'], 
            ['email', 'required'], 
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email has already been taken.'], 
            ['email', 'string', 'min' => 2, 'max' => 255], 
            ['password', 'required'], 
            ['password', 'string', 'min' => 6], 
        ]; 
    } 
  
    /** 
     * Signs user up. 
     * 
     * @return User|null the saved model or null if saving fails 
     */ 
    public function signup() 
    { 
  
        if (!$this->validate()) { 
            return null; 
        } 
  
        $user = new User(); 
        $user->name = $this->name;  
        $user->email = $this->email; 
        $user->hobbies = $this->hobbies; 
        $user->favorite_color = $this->favorite_color;
        $user->favorite_food = $this->favorite_food;
        $user->password = $user->setPassword($this->password); 
        $user->auth_key = $user->generateAuthKey(); 
        return $user->save() ? $user : null; 
    } 
  
}