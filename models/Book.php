<?php

class Book
{
    //-- --- Constants ------------------------------------------------------------------------------------------------

    const BOOK_AVAILABLE   = 'A';
    const BOOK_UNAVAILABLE = 'U';

    //-- --- Attributes -----------------------------------------------------------------------------------------------

    protected int $code;
    protected int $pages;

    protected string $title;
    protected string $author;
    protected string $type;
    protected string $status;

    //-- --- Constructors ---------------------------------------------------------------------------------------------

    /**
     * Constructor with parameters
     *
     * @param int $code
     * @param int $pages
     * @param string $title
     * @param string $author
     * @param string $type
     * @param string $status
     */
    public function __construct(int $code, int $pages, string $title, string $author, string $type, string $status)
    {
        $this->code   = $code;
        $this->pages  = $pages;
        $this->title  = $title;
        $this->author = $author;
        $this->type   = $type;
        $this->status = $status;
    }

    //-- --- Public helpers ----------------------------------------------------------------------------------------

    /**
     * Insert book in database
     */
    public function create()
    {
        Database::insert("INSERT INTO `books` (`code`, `title`, `author`, `type`, `pages`, `status`) VALUES ($this->code, '$this->title', '$this->author', '$this->type', $this->pages, '$this->status')");
    }

    //-- --- Getters --------------------------------------------------------------------------------------------------

    /**
     * Get book code
     *
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * Get book pages
     *
     * @return int
     */
    public function getPages(): int
    {
        return $this->pages;
    }

    /**
     * Get book title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Get book author
     *
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Get book type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get book status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    //-- --- Setters --------------------------------------------------------------------------------------------------

    /**
     * Set book code
     *
     * @param int $code
     * @return Book
     */
    public function setCode(int $code): Book
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set book pages
     *
     * @param int $pages
     * @return Book
     */
    public function setPages(int $pages): Book
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * Set book title
     *
     * @param string $title
     * @return Book
     */
    public function setTitle(string $title): Book
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set book author
     *
     * @param string $author
     * @return Book
     */
    public function setAuthor(string $author): Book
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Set book type
     *
     * @param string $type
     * @return Book
     */
    public function setType(string $type): Book
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set book status
     *
     * @param string $status
     * @return Book
     */
    public function setStatus(string $status): Book
    {
        $this->status = $status;

        return $this;
    }
}