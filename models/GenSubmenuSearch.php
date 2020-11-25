<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GenSubmenu;

/**
 * GenSubmenuSearch represents the model behind the search form of `app\models\GenSubmenu`.
 */
class GenSubmenuSearch extends GenSubmenu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['creado_por', 'creado_fecha', 'actualizado_por', 'actualizado_fecha', 'codigo', 'nombre'], 'safe'],
            [['menu_id', 'id'], 'integer'],
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
    public function search($params, $menuId)
    {
        $query = GenSubmenu::find()->where([
            'menu_id' => $menuId
        ]);

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
            'menu_id' => $this->menu_id,
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['ilike', 'creado_por', $this->creado_por])
            ->andFilterWhere(['ilike', 'actualizado_por', $this->actualizado_por])
            ->andFilterWhere(['ilike', 'codigo', $this->codigo])
            ->andFilterWhere(['ilike', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
