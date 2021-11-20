<?php

class Teacher extends Client
{
    //-- --- Attributes -----------------------------------------------------------------------------------------------

    protected string $course;

    //-- --- Constructors ---------------------------------------------------------------------------------------------

    /**
     * Constructor with parameters
     *
     * @param int $code
     * @param string $name
     * @param string $course
     */
    public function __construct(int $code, string $name, string $course)
    {
        parent::__construct($code, $name);

        $this->course = $course;
    }

    //-- --- Public helpers ----------------------------------------------------------------------------------------

    /**
     * Insert book in database
     */
    public function create()
    {
        Database::insert("INSERT INTO `clients` (`code`, `name`, `course`, `rented_books`) VALUES ($this->code, '$this->name', '$this->course', '0')");
    }


    //-- --- Getters --------------------------------------------------------------------------------------------------

    /**
     * @return string
     */
    public function getCourse(): string
    {
        return $this->course;
    }

    //-- --- Setters --------------------------------------------------------------------------------------------------

    /**
     * @param string $course
     */
    public function setCourse(string $course): void
    {
        $this->course = $course;
    }
}