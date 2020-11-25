<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gen_menu".
 *
 * @property string $creado_por
 * @property string $creado_fecha
 * @property string $actualizado_por
 * @property string $actualizado_fecha
 * @property int $id
 * @property string $codigo
 * @property string $nombre
 * @property string|null $icono
 * @property string|null $ruta_menu
 *
 * @property GenSubmenu[] $genSubmenus
 */
class GenMenu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gen_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['creado_por', 'creado_fecha', 'actualizado_por', 'actualizado_fecha', 'codigo', 'nombre'], 'required'],
            [['creado_fecha', 'actualizado_fecha'], 'safe'],
            [['creado_por', 'actualizado_por','icono'], 'string', 'max' => 150],
            [['codigo', 'nombre'], 'string', 'max' => 30],
            [['ruta_menu'], 'string', 'max' => 200],
            [['codigo'], 'unique'],
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
            'id' => 'ID',
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'icono' => 'Icono',
            'ruta_menu' => 'Ruta Menu',
        ];
    }

    /**
     * Gets query for [[GenSubmenus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenSubmenus()
    {
        return $this->hasMany(GenSubmenu::className(), ['menu_id' => 'id']);
    }
    
    
    /*mis sql*/
    public function consulta_menu_perfil($perfilId){
        $con = \Yii::$app->db;
        $query = "select 	m.id, m.nombre, m.icono, m.ruta_menu 
from 	gen_menu m
		inner join gen_submenu s on s.menu_id = m.id 
		inner join acc_permisos p on p.submenu_id = s.id 
where 	p.perfil_id = $perfilId
group by m.id, m.nombre, m.icono, m.ruta_menu
order by m.nombre;";
        $res = $con->createCommand($query)->queryAll();
        return $res;
    }
}
