<?php
namespace Models\Articles;

use Models\ActiveRecord\ActiveRecordEntity;
use Models\Users\User;
use Models\Comments\Comment;
use Services\Db;

class Article extends ActiveRecordEntity
{
    protected $name;
    protected $text;
    protected $authorId;
    protected $createdAt;

    public function getName(): string
    {
        return $this->name;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function getComments(): array {
        $db = Db::getInstance();
        $result = $db->query('SELECT * FROM `comments` WHERE article_id = :id;', [':id' => $this->id], Comment::class);
        return $result ? $result : [];
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    public static function getTableName(): string
    {
        return 'articles';
    }
}