<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acc_permisos".
 *
 * @property int $perfil_id
 * @property int $submenu_id
 *
 * @property AccPerfil $perfil
 * @property GenSubmenu $submenu
 */
class AccPermisos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acc_permisos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['perfil_id', 'submenu_id'], 'required'],
            [['perfil_id', 'submenu_id'], 'default', 'value' => null],
            [['perfil_id', 'submenu_id'], 'integer'],
            [['perfil_id', 'submenu_id'], 'unique', 'targetAttribute' => ['perfil_id', 'submenu_id']],
            [['perfil_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccPerfil::className(), 'targetAttribute' => ['perfil_id' => 'id']],
            [['submenu_id'], 'exist', 'skipOnError' => true, 'targetClass' => GenSubmenu::className(), 'targetAttribute' => ['submenu_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'perfil_id' => 'Perfil ID',
            'submenu_id' => 'Submenu ID',
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
     * Gets query for [[Submenu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubmenu()
    {
        return $this->hasOne(GenSubmenu::className(), ['id' => 'submenu_id']);
    }
}
