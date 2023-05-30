<?php
namespace Models\Comments;
use Models\ActiveRecord\ActiveRecordEntity;
use Models\Users\User;

class Comment extends ActiveRecordEntity {
    protected $authorId;
    protected $articleId;
    protected $text;
    protected $createdAt;

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function getDate(): string
    {
        return $this->createdAt;
    }

    public function setText(string $text) {
        $this->text = $text;
    }

    public function setAuthorId(int $id) {
        $this->authorId = $id;
    }

    public function setArticleId(int $id) {
        $this->articleId = $id;
    }

    public static function getTableName(): string
    {
        return 'comments';
    }
}
?>