<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $domain
 * @property string $DB_NAME
 * @property string $DB_USER
 * @property string $DB_PASSWORD
 * @property string $DB_HOST
 * @property string $DB_CHARSET
 * @property string $DB_COLLATE
 * @property string $AUTH_KEY
 * @property string $SECURE_AUTH_KEY
 * @property string $LOGGED_IN_KEY
 * @property string $NONCE_KEY
 * @property string $AUTH_SALT
 * @property string $SECURE_AUTH_SALT
 * @property string $LOGGED_IN_SALT
 * @property string $NONCE_SALT
 * @property string $DB_PREFIX
 * @property string $WP_DEBUG
 *
 * @property Security[] $securities
 */
class Site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['domain', 'DB_NAME', 'DB_USER', 'DB_PASSWORD', 'DB_HOST', 'DB_CHARSET', 'DB_COLLATE', 'AUTH_KEY', 'SECURE_AUTH_KEY', 'LOGGED_IN_KEY', 'NONCE_KEY', 'AUTH_SALT', 'SECURE_AUTH_SALT', 'LOGGED_IN_SALT', 'NONCE_SALT', 'DB_PREFIX', 'WP_DEBUG'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'domain' => 'Domain',
            'DB_NAME' => 'Db  Name',
            'DB_USER' => 'Db  User',
            'DB_PASSWORD' => 'Db  Password',
            'DB_HOST' => 'Db  Host',
            'DB_CHARSET' => 'Db  Charset',
            'DB_COLLATE' => 'Db  Collate',
            'AUTH_KEY' => 'Auth  Key',
            'SECURE_AUTH_KEY' => 'Secure  Auth  Key',
            'LOGGED_IN_KEY' => 'Logged  In  Key',
            'NONCE_KEY' => 'Nonce  Key',
            'AUTH_SALT' => 'Auth  Salt',
            'SECURE_AUTH_SALT' => 'Secure  Auth  Salt',
            'LOGGED_IN_SALT' => 'Logged  In  Salt',
            'NONCE_SALT' => 'Nonce  Salt',
            'DB_PREFIX' => 'Db  Prefix',
            'WP_DEBUG' => 'Wp  Debug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecurities()
    {
        return $this->hasMany(Security::className(), ['domain_id' => 'id']);
    }
}
