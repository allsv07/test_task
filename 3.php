<?php


class Author
{
    /**
     * @var string
     */
    private string $author;

    /**
     * @param string $author
     */
    public function __construct(string $author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getAuthor() : string
    {
        return $this->author;
    }
}

class Article
{
    /**
     * @var string
     */
    private string $article;

    /**
     * @param $article
     */
    public function __construct($article)
    {
        $this->article = $article;
    }
}

class Registry
{
    /**
     * @var array
     * ['article' => 'author']
     */
    private static array $registry = [];

    /**
     * @param Author $author
     * @param Article $article
     * @return void
     * Добавить новую статью для автора
     */
    public static function addArticle(Author $author, Article $article) {}

    /**
     * @param Article $article
     * @return void
     * Получить автора статьи
     */
    public static function getAuthor(Article $article) {}

    /**
     * @param Author $author
     * @return array
     * Получить список статей автора
     */
    public static function getArticles(Author $author) {}

    /**
     * @param Author $author
     * @param Article $article
     * @return void
     * Сменить автора статьи
     */
    public static function setAuthor(Author $author, Article $article) {}

    /**
     * @param Author $author
     * @param Article $article
     * @return void
     * Удалить статью у автора
     */
    public static function deleteArticle(Author $author, Article $article) {}

    /**
     * @param Author $author
     * @return void
     * Удалить автора
     */
    public static function deleteAuthor(Author $author) {}

}

