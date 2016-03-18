<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Book;

/**
 * BookSearch represents the model behind the search form about `app\models\Book`.
 */
class BookSearch extends Book
{
    private $_date_from;
    private $_date_to;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id'], 'integer'],
            [['name', 'dateFrom','dateTo'], 'safe'],
        ];
    }
    public function setDateFrom($txt){
        if(!$txt) {
            $this->_date_from='';
            return;
        }
        $arr=explode('.',$txt);
        $this->_date_from=$arr[2].'-'.$arr[1].'-'.$arr[0];
    }
    public function getDateFrom(){
        if(!$this->_date_from) return '';
        $arr = explode('-',$this->_date_from);
        return $arr[2] . '.' . $arr[1] . '.' . $arr[0];
    }
    public function setDateTo($txt){
        if(!$txt) {
            $this->_date_to='';
            return;
        }
        $arr=explode('.',$txt);
        $this->_date_to=$arr[2].'-'.$arr[1].'-'.$arr[0];
    }
    public function getDateTo(){
        if(!$this->_date_to) return '';
        $arr = explode('-',$this->_date_to);
        return $arr[2] . '.' . $arr[1] . '.' . $arr[0];
    }
    /**
     * @inheritdoc
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
        $query = Book::find();
        $query->joinWith(['author']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['author'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['authors.last_name' => SORT_ASC, 'authors.first_name'=>SORT_ASC,],
            'desc' => ['authors.last_name' => SORT_DESC, 'authors.first_name'=>SORT_DESC,],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'author_id' => $this->author_id,
        ]);
        if($this->_date_from)
            $query->andWhere("date >= '" . $this->_date_from . "'");
        if($this->_date_to)
            $query->andWhere("date <= '" . $this->_date_to."'");

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'preview', $this->preview]);
        return $dataProvider;
    }
}
