<?php

abstract class Client
{
    //-- --- Attributes -----------------------------------------------------------------------------------------------

    protected int $code;

    protected string $name;
    protected string $rented_books;
    protected string $return_date;

    //-- --- Constructors ---------------------------------------------------------------------------------------------

    /**
     * Constructor with parameters
     *
     * @param int $code
     * @param string $name
     */
    public function __construct(int $code, string $name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    //-- --- Getters --------------------------------------------------------------------------------------------------

    /**
     * Get client code
     *
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * Get client name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get number of rented books
     *
     * @return string
     */
    public function getRentedBooks(): string
    {
        return $this->rented_books;
    }

    /**
     * Get return date
     *
     * @return string
     */
    public function getReturnDate(): string
    {
        return $this->return_date;
    }

    //-- --- Setters --------------------------------------------------------------------------------------------------

    /**
     * Set client code
     *
     * @param int $code
     * @return Client
     */
    public function setCode(int $code): Client
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set client name
     *
     * @param string $name
     * @return Client
     */
    public function setName(string $name): Client
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $return_date
     * @return Client
     */
    public function setReturnDate(string $return_date): Client
    {
        $this->return_date = $return_date;

        return $this;
    }
}