<?php

namespace common\models;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;



/**
 * This is the model class for table "tbl_ico_users".
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $alt_email
 * @property integer $registration_type
 * @property string $aop
 * @property integer $court
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $city_town_village
 * @property string $state
 * @property integer $pincode
 * @property string $phone_1
 * @property string $phone_2
 * @property string $trial_yn
 * @property integer $enabled
 * @property integer $status
 * @property string $created_at
 * @property string $validity_date
 * @property string $updated_at
 * @property string $lastlogin
 * @property string $auth_key
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    
     const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    private $password_hash;
    
    
    public static function tableName()
    {
        return 'tbl_ico_staff';
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
//            TimestampBehavior::className(),
        ];
    }

   /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name','last_name','email', 'password'], 'required'],
            [['username'], 'string', 'max' => 50] , 
            [['password'], 'string', 'min' => 6] ,             
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['court'], 'integer', 'max' => 1000],
            [['aop'], 'string', 'max' => 250],
          
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'enabled' => 'Enabled',
            'status' => 'Status',
            'created_at' => 'Created At',
            'validity_date' => 'Validity Date',
            'updated_at' => 'Updated At',
            'lastlogin' => 'Lastlogin',
            'auth_key' => 'Auth Key',
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
       
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
   
    
    public function validatePassword($password)
{
     
//      return $this->password === Yii::$app->security->generatePasswordHash($password);
              return $this->password === md5($password);
}

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
//        $this->password = Yii::$app->security->generatePasswordHash($password);
           return $this->password = md5($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

}
