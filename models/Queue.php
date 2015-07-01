<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "queue".
 *
 * @property string $id
 * @property integer $domain_id
 * @property string $title
 * @property string $admin
 * @property string $password
 * @property string $email
 */
class Queue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'queue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domain_id'], 'integer'],
            [['title', 'admin', 'password', 'email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain_id' => 'Domain ID',
            'title' => 'Title',
            'admin' => 'Admin',
            'password' => 'Password',
            'email' => 'Email',
        ];
    }
}
