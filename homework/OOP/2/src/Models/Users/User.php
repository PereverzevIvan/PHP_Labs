<?php
namespace Models\Users;

use Models\ActiveRecord\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    protected $id;
    protected $nickname;
    protected $email;
    protected $isConfirmed;
    protected $role;
    protected $passwordHash;
    protected $authToken;
    protected $createdAt;

    public function getNick() {
        return $this->nickname;
    }

    public static function getTableName(): string {
        return 'users';
    }
}