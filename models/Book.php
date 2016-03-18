<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property string $id
 * @property string $author_id
 * @property string $name
 * @property string $date_create
 * @property string $date_update
 * @property string $preview
 * @property string $date
 *
 * @property Author $author
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'name', 'preview', 'date'], 'required'],
            [['author_id', 'date_create', 'date_update'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['formattedDate'],'safe'],
            [['preview'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'name' => 'Name',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'preview' => 'Preview',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }
    public function getFormattedDate(){
        if(!$this->date) return '';
        $arr = explode('-',$this->date);
        return $arr[2] . '.' . $arr[1] . '.' . $arr[0];
    }
    public function setFormattedDate($txt){
        if(!$txt) {
            $this->date='';
            return;
        }
        $arr=explode('.',$txt);
        $this->date=$arr[2].'-'.$arr[1].'-'.$arr[0];
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($insert){
                $this->date_create=time();
            }
            $this->date_update=time();
            return true;
        } else {
            return false;
        }
    }

}
