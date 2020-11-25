<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acc_perfil".
 *
 * @property int $id
 * @property string $codigo
 * @property string $nombre
 *
 * @property AccPermisos[] $accPermisos
 * @property GenSubmenu[] $submenus
 * @property AccUsuario[] $accUsuarios
 */
class AccPerfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acc_perfil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'nombre'], 'required'],
            [['codigo'], 'string', 'max' => 30],
            [['nombre'], 'string', 'max' => 50],
            [['codigo'], 'unique'],
            [['nombre'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[AccPermisos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccPermisos()
    {
        return $this->hasMany(AccPermisos::className(), ['perfil_id' => 'id']);
    }

    /**
     * Gets query for [[Submenus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubmenus()
    {
        return $this->hasMany(GenSubmenu::className(), ['id' => 'submenu_id'])->viaTable('acc_permisos', ['perfil_id' => 'id']);
    }

    /**
     * Gets query for [[AccUsuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccUsuarios()
    {
        return $this->hasMany(AccUsuario::className(), ['perfil_id' => 'id']);
    }
}
