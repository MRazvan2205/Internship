<?php

require 'models/Book.php';
require 'models/Client.php';
require 'models/Student.php';
require 'models/Teacher.php';

class Library
{
    /**
     * Rent book
     *
     * @param int $clientId
     * @param int $bookId
     */
    public static function rentBook(int $clientId, int $bookId)
    {
        $client = self::findSpecificClient('id', $clientId);

        $unavailableStatus = Book::BOOK_UNAVAILABLE;
        $rentedBooksCount  = null;
        $returnDate = date('Y-m-d');

        if ($client) {
            $rentedBooksCount = ++$client['rented_books'];
        }

        echo "<h2>Rent:</h2>";
        echo "The client with id : {$clientId} rented the book with id {$bookId}";

        Database::update("UPDATE books SET status = '{$unavailableStatus}' WHERE id = {$bookId}");
        Database::update("UPDATE clients SET rented_books = {$rentedBooksCount}, return_date = '{$returnDate}' WHERE id = {$clientId}");
    }

    /**
     * Return book
     *
     * @param int $clientId
     * @param int $bookId
     */
    public static function returnBook(int $clientId, int $bookId)
    {
        $client = self::findSpecificClient('id', $clientId);

        $availableStatus = Book::BOOK_AVAILABLE;

        echo "<h2>Return:</h2>";
        echo "The client with id : {$clientId} returned the book with id {$bookId}";

        Database::update("UPDATE books SET status = '{$availableStatus}' WHERE id = {$bookId}");
        Database::update("UPDATE clients SET return_date = null WHERE id = {$clientId}");
    }

    //-- --- Clients --------------------------------------------------------------------------------------------------

    /**
     * Add student to library
     *
     * @param int $code
     * @param string $name
     * @param string $university
     * @param int $year_of_studying
     */
    public static function addStudent(int $code, string $name, string $university, int $year_of_studying)
    {
        (new Student($code, $name, $university, $year_of_studying))->create();
    }

    /**
     * Add student to library
     *
     * @param int $code
     * @param string $name
     * @param string $course
     */
    public static function addTeacher(int $code, string $name, string $course)
    {
        (new Teacher($code, $name, $course))->create();
    }

    /**
     * Retrieve specific client from database
     *
     * @param string $column
     * @param $value
     * @return mixed|void
     */
    public static function findSpecificClient(string $column, $value)
    {
        $clients = Database::select("SELECT * FROM clients WHERE {$column} = '{$value}'");

        if (!count($clients)) {
            echo 'The client was not found';

            return;
        }

        return $clients[0] ?? null;
    }

    /**
     * Remove specific client from database
     *
     * @param $id
     */
    public static function removeSpecificClient($id)
    {
        echo "<h2>Clients after delete:</h2>";

        Database::delete('clients', $id);
    }

    /**
     * Retrieve clients from database
     */
    public static function getAllClients()
    {
        $clients = Database::select("SELECT * FROM clients");

        if (count($clients)) {
            echo '<h2>Clients : </h2>';

            foreach ($clients as $client) {
                echo 'id: ' . $client['id'] . ', name: ' . $client['name'] . '<br>';
            }
        }
    }

    /**
     * Retrieve students from database
     */
    public static function getAllStudents()
    {
        $students = Database::select("SELECT * FROM clients WHERE course IS NULL");

        if (count($students)) {
            echo '<h2>Students : </h2>';

            foreach ($students as $student) {
                echo 'id: ' . $student['id'] . ', name: ' . $student['name'] . '<br>';
            }
        }
    }

    /**
     * Retrieve the most faithful reader from database
     */
    public static function getTheMostFaithfulReader()
    {
        $readers = Database::select("SELECT * FROM clients ORDER BY rented_books DESC");

        $theMostFaithfulReader = $readers[0] ?? null;

        if ($theMostFaithfulReader) {
            echo '<h2>The most faithful reader : </h2>';
            echo 'id: ' . $theMostFaithfulReader['id'] . ', name: ' . $theMostFaithfulReader['name'] . ', rented books: ' . $theMostFaithfulReader['rented_books'] . '<br>';
        }
    }

    //-- --- Books ----------------------------------------------------------------------------------------------------

    /**
     * Add book to library
     *
     * @param int $code
     * @param int $pages
     * @param string $title
     * @param string $author
     * @param string $type
     * @param string $status
     */
    public static function addBook(int $code, int $pages, string $title, string $author, string $type, string $status)
    {
        (new Book($code, $pages, $title, $author, $type, $status))->create();
    }

    /**
     * Remove specific book from database
     *
     * @param $id
     */
    public static function removeSpecificBook($id)
    {
        echo "<h2>Books after delete:</h2>";

        Database::delete('books', $id);
    }

    /**
     * Retrieve books from database
     */
    public static function getAllBooks()
    {
        $books = Database::select("SELECT * FROM books");

        if (count($books)) {
            echo '<h2>Books : </h2>';

            foreach ($books as $book) {
                echo 'id: ' . $book['id'] . ', title: ' . $book['title'] . ', status: ' . $book['status'] . '<br>';
            }
        }
    }

    /**
     * Retrieve available books from database
     */
    public static function getAvailableBooks()
    {
        $availableBooks = Database::select("SELECT * FROM books WHERE status = 'A'");

        if (count($availableBooks)) {
            echo '<h2>Available books : </h2>';

            foreach ($availableBooks as $book) {
                echo 'id: ' . $book['id'] . ', title: ' . $book['title'] . ', status: ' . $book['status'] . '<br>';
            }
        }
    }

    /**
     * Retrieve specific book from database
     *
     * @param string $column
     * @param $value
     * @return mixed|void
     */
    public static function findSpecificBook(string $column, $value)
    {
        $books = Database::select("SELECT * FROM books WHERE {$column} = '{$value}'");

        echo "<h2>Book with {$column} = {$value} </h2>";

        if (!count($books)) {
            echo 'The book was not found';

            return;
        }

        foreach ($books as $book) {
            echo 'id: ' . $book['id'] . ', title: ' . $book['title'] . ', status: ' . $book['status'] . '<br>';
        }

        return $books[0] ?? null;
    }

    public static function getSortedBooksByPages()
    {
        $books = Database::select("SELECT * FROM books ORDER BY pages");

        if (count($books)) {
            echo '<h2>Sorted books : </h2>';

            foreach ($books as $book) {
                echo 'id: ' . $book['id'] . ', title: ' . $book['title'] . ', pages: ' . $book['pages'] . '<br>';
            }
        }
    }
}