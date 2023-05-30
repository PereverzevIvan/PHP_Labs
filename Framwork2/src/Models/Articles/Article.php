<?php
namespace Models\Articles;
use Models\Users\User;
use Models\ActiveRecordEntity;

class Article extends ActiveRecordEntity{
    protected $name;
    protected $text;
    protected $authorId;
    protected $createdAt;

    public function getAuthorId():User{
        return User::getbyId($this->authorId);
    }
    public function getName(){
        return $this->name;
    }
    public function getText(){
        return $this->text;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setText(string $text){
        $this->text = $text;
    }

    public function setAuthorId(User $author){
        $this->authorId = $author->getId();
    }

    public static function getTableName(): string{
        return 'articles';
    }

    public function setAuthorNickname(string $nickname)
    {
        $author = $this->getAuthorId();
        $author->setNickname($nickname)->save();
    }
}