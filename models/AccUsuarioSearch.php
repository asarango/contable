<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AccUsuario;

/**
 * AccUsuarioSearch represents the model behind the search form of `app\models\AccUsuario`.
 */
class AccUsuarioSearch extends AccUsuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['creado_por', 'creado_fecha', 'actualizado_por', 'actualizado_fecha', 'dni', 'titulo', 'apellidos', 'nombres', 'usuario', 'clave', 'token', 'auth_key', 'ruta_menu', 'nickname', 'foto', 'direccion', 'telefono'], 'safe'],
            [['perfil_id'], 'integer'],
            [['cambia_clave', 'estado', 'es_interno'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AccUsuario::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'creado_fecha' => $this->creado_fecha,
            'actualizado_fecha' => $this->actualizado_fecha,
            'perfil_id' => $this->perfil_id,
            'cambia_clave' => $this->cambia_clave,
            'estado' => $this->estado,
            'es_interno' => $this->es_interno,
        ]);

        $query->andFilterWhere(['ilike', 'creado_por', $this->creado_por])
            ->andFilterWhere(['ilike', 'actualizado_por', $this->actualizado_por])
            ->andFilterWhere(['ilike', 'dni', $this->dni])
            ->andFilterWhere(['ilike', 'titulo', $this->titulo])
            ->andFilterWhere(['ilike', 'apellidos', $this->apellidos])
            ->andFilterWhere(['ilike', 'nombres', $this->nombres])
            ->andFilterWhere(['ilike', 'usuario', $this->usuario])
            ->andFilterWhere(['ilike', 'clave', $this->clave])
            ->andFilterWhere(['ilike', 'token', $this->token])
            ->andFilterWhere(['ilike', 'auth_key', $this->auth_key])
            ->andFilterWhere(['ilike', 'ruta_menu', $this->ruta_menu])
            ->andFilterWhere(['ilike', 'nickname', $this->nickname])
            ->andFilterWhere(['ilike', 'foto', $this->foto])
            ->andFilterWhere(['ilike', 'direccion', $this->direccion])
            ->andFilterWhere(['ilike', 'telefono', $this->telefono]);

        return $dataProvider;
    }
}
