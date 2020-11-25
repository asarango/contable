<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GenMenu;

/**
 * GenMenuSearch represents the model behind the search form of `app\models\GenMenu`.
 */
class GenMenuSearch extends GenMenu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['creado_por', 'creado_fecha', 'actualizado_por', 'actualizado_fecha', 'codigo', 'nombre', 'icono', 'ruta_menu'], 'safe'],
            [['id'], 'integer'],
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
        $query = GenMenu::find();

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['ilike', 'creado_por', $this->creado_por])
            ->andFilterWhere(['ilike', 'actualizado_por', $this->actualizado_por])
            ->andFilterWhere(['ilike', 'codigo', $this->codigo])
            ->andFilterWhere(['ilike', 'nombre', $this->nombre])
            ->andFilterWhere(['ilike', 'icono', $this->icono])
            ->andFilterWhere(['ilike', 'ruta_menu', $this->ruta_menu]);

        return $dataProvider;
    }
}
