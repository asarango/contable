<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gen_submenu".
 *
 * @property string $creado_por
 * @property string $creado_fecha
 * @property string $actualizado_por
 * @property string $actualizado_fecha
 * @property int $menu_id
 * @property int $id
 * @property string $codigo
 * @property string|null $nombre
 *
 * @property AccPermisos[] $accPermisos
 * @property AccPerfil[] $perfils
 * @property GenMenu $menu
 */
class GenSubmenu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gen_submenu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['creado_por', 'creado_fecha', 'actualizado_por', 'actualizado_fecha', 'menu_id', 'codigo'], 'required'],
            [['creado_fecha', 'actualizado_fecha'], 'safe'],
            [['menu_id'], 'default', 'value' => null],
            [['menu_id'], 'integer'],
            [['creado_por', 'actualizado_por'], 'string', 'max' => 150],
            [['codigo', 'nombre'], 'string', 'max' => 30],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => GenMenu::className(), 'targetAttribute' => ['menu_id' => 'id']],
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
            'menu_id' => 'Menu ID',
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
        return $this->hasMany(AccPermisos::className(), ['submenu_id' => 'id']);
    }

    /**
     * Gets query for [[Perfils]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfils()
    {
        return $this->hasMany(AccPerfil::className(), ['id' => 'perfil_id'])->viaTable('acc_permisos', ['submenu_id' => 'id']);
    }

    /**
     * Gets query for [[Menu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(GenMenu::className(), ['id' => 'menu_id']);
    }
}
