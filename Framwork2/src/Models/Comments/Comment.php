<?php
namespace Models\Comments;
use Models\ActiveRecordEntity;
use Models\Users\User;


class Comment extends ActiveRecordEntity{
    protected $authorId;
    protected $articleId;
    protected $comment;
    protected $date;
    
    // public function getAuthorId():User{
    //     return User::getbyId($this->authorId);
    // }

    public function getAuthor():User{
        return User::getbyId($this->authorId);
    }

    // public function setAuthorId(User $author){
    //     $this->authorId = $author->getId();
    // }

    // public function getArticleId():Article{
    //     return Article::getbyId($this->articleId);
    // }

    // public function setArticleId(Article $article){
    //     $this->articleId = $article->getId();
    // }

    public function getComment(){
        return $this->comment;
    }

    public function setComment(string $comment){
        $this->comment = $comment;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate(string $date){
        $this->date = $date;
    }

    // //////////////////////////

    public function setAuthorId(int $authorId)
    {
        $this->authorId = $authorId;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function setArticleId(int $articleId)
    {
        $this->$articleId = $articleId;
    }

    protected static function getTableName(): string{
        return 'comments';
    }
}