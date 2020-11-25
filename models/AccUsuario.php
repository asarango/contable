<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acc_usuario".
 *
 * @property string $creado_por
 * @property string $creado_fecha
 * @property string $actualizado_por
 * @property string $actualizado_fecha
 * @property int $perfil_id
 * @property string $dni
 * @property string $titulo
 * @property string $apellidos
 * @property string $nombres
 * @property string $usuario
 * @property string $clave
 * @property bool $cambia_clave
 * @property bool $estado
 * @property string|null $token
 * @property bool|null $es_interno
 * @property string|null $auth_key
 * @property string|null $ruta_menu
 * @property string|null $nickname
 * @property string|null $foto
 * @property string|null $direccion
 * @property string|null $telefono
 *
 * @property AccPerfil $perfil
 * @property AccUsuarioCliente[] $accUsuarioClientes
 * @property CliCliente[] $clientes
 * @property CliPedido[] $cliPedidos
 */
class AccUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acc_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['creado_por', 'creado_fecha', 'actualizado_por', 'actualizado_fecha', 'perfil_id', 'dni', 'titulo', 'apellidos', 'nombres', 'usuario', 'clave', 'cambia_clave', 'estado'], 'required'],
            [['creado_fecha', 'actualizado_fecha'], 'safe'],
            [['perfil_id'], 'default', 'value' => null],
            [['perfil_id'], 'integer'],
            [['cambia_clave', 'estado', 'es_interno'], 'boolean'],
            [['creado_por', 'actualizado_por'], 'string', 'max' => 150],
            [['dni'], 'string', 'max' => 15],
            [['titulo'], 'string', 'max' => 30],
            [['apellidos', 'nombres'], 'string', 'max' => 100],
            [['usuario', 'auth_key', 'ruta_menu', 'nickname', 'foto', 'direccion'], 'string', 'max' => 200],
            [['clave', 'token'], 'string', 'max' => 300],
            [['telefono'], 'string', 'max' => 50],
            [['dni'], 'unique'],
            [['usuario'], 'unique'],
            [['perfil_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccPerfil::className(), 'targetAttribute' => ['perfil_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'creado_por' => 'Creado Por',
            'creado_fecha' => 'Creado Fecha',
            'actualizado_por' => 'Actualizado Por',
            'actualizado_fecha' => 'Actualizado Fecha',
            'perfil_id' => 'Perfil ID',
            'dni' => 'Dni',
            'titulo' => 'Titulo',
            'apellidos' => 'Apellidos',
            'nombres' => 'Nombres',
            'usuario' => 'Usuario',
            'clave' => 'Clave',
            'cambia_clave' => 'Cambia Clave',
            'estado' => 'Estado',
            'token' => 'Token',
            'es_interno' => 'Es Interno',
            'auth_key' => 'Auth Key',
            'ruta_menu' => 'Ruta Menu',
            'nickname' => 'Nickname',
            'foto' => 'Foto',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
        ];
    }

    /**
     * Gets query for [[Perfil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(AccPerfil::className(), ['id' => 'perfil_id']);
    }

    /**
     * Gets query for [[AccUsuarioClientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccUsuarioClientes()
    {
        return $this->hasMany(AccUsuarioCliente::className(), ['usuario' => 'usuario']);
    }

    /**
     * Gets query for [[Clientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(CliCliente::className(), ['id' => 'cliente_id'])->viaTable('acc_usuario_cliente', ['usuario' => 'usuario']);
    }

    /**
     * Gets query for [[CliPedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliPedidos()
    {
        return $this->hasMany(CliPedido::className(), ['medico_usuario' => 'usuario']);
    }
}
