<?php

namespace app\models;
use app\models\AccUsuario;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
//    public $id;
//    public $username;
//    public $password;
//    public $authKey;
//    public $accessToken;
    public $creado_por;
    public $creado_fecha;
    public $actualizado_por;
    public $actualizado_fecha;
    public $perfil_id;
    public $dni;
    public $titulo;
    public $apellidos;
    public $nombres;
    public $usuario;
    public $clave;
    public $cambia_clave;
    public $estado;
    public $token;
    public $es_interno;
    public $auth_key;
    public $authKey;
    public $ruta_menu;
    public $nickname;
    public $foto;
    public $direccion;
    public $telefono;

//    private static $users = [
//        '100' => [
//            'id' => '100',
//            'username' => 'admin',
//            'password' => 'admin',
//            'authKey' => 'test100key',
//            'accessToken' => '100-token',
//        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
//    ];

    const STATUS_DELETED = 0;
    //const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    
    
    
    public static function tableName()
    {
        //return '{{%user}}';
        return 'acc_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        
//        print_r($id);
//        die();        
        $usuario = AccUsuario::findOne($id);
        

        
        return isset($usuario) ? new static($usuario) : null;
//        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
//        foreach (self::$users as $user) {
//            if ($user['accessToken'] === $token) {
//                return new static($user);
//            }
//        }
//
//        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $usuario = AccUsuario::find()
                ->where(['usuario' => $username, 'estado' => true])
                ->one();
        
        if(!empty($usuario)){
            return new static($usuario->oldAttributes);
        }
        
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->usuario;
//        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->clave === md5($password);
        //return $this->password === $password;
    }
}
