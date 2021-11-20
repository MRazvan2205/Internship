<?php

class Student extends Client
{
    //-- --- Attributes -----------------------------------------------------------------------------------------------

    protected string $university;
    protected int $year_of_studying;

    //-- --- Constructors ---------------------------------------------------------------------------------------------

    /**
     * Constructor with parameters
     *
     * @param int $code
     * @param string $name
     * @param string $university
     * @param int $year_of_studying
     */
    public function __construct(int $code, string $name, string $university, int $year_of_studying)
    {
        parent::__construct($code, $name);

        $this->university = $university;
        $this->year_of_studying = $year_of_studying;
    }

    //-- --- Public helpers ----------------------------------------------------------------------------------------

    /**
     * Insert book in database
     */
    public function create()
    {
        Database::insert("INSERT INTO `clients` (`code`, `name`, `university`, `year_of_studying`, `rented_books`) VALUES ($this->code, '$this->name', '$this->university', $this->year_of_studying, 0)");
    }

    //-- --- Getters --------------------------------------------------------------------------------------------------

    /**
     * @return string
     */
    public function getUniversity(): string
    {
        return $this->university;
    }

    /**
     * @return int
     */
    public function getYearOfStudying(): int
    {
        return $this->year_of_studying;
    }

    //-- --- Setters --------------------------------------------------------------------------------------------------

    /**
     * @param string $university
     */
    public function setUniversity(string $university): void
    {
        $this->university = $university;
    }

    /**
     * @param int $year_of_studying
     */
    public function setYearOfStudying(int $year_of_studying): void
    {
        $this->year_of_studying = $year_of_studying;
    }
}