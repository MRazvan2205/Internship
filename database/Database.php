<?php

class Database
{
    //-- --- Public Helpers -------------------------------------------------------------------------------------------

    /**
     * Make connection
     *
     * @return PDO|void
     */
    public static function connect()
    {
        try {
            return new PDO('mysql:host=localhost; dbname=websterphp', 'root', '');
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * Select from database
     *
     * @param string $statement
     * @return array|false|void
     */
    public static function select(string $statement)
    {
        $database = Database::connect();

        try {
            // Prepare and execute
            $statement = $database->prepare($statement);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            return $statement->fetchAll();
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * Insert into database
     *
     * @param string $statement
     */
    public static function insert(string $statement)
    {
        $connector = Database::connect();

        try {
            $connector->prepare($statement)
                ->execute();
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * Update specific resource
     *
     * @param string $statement
     */
    public static function update(string $statement)
    {
        $connector = Database::connect();

        try {
            $connector->prepare($statement)
                ->execute();
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * Delete from database
     *
     * @param string $table
     * @param int $id
     */
    public static function delete(string $table, int $id)
    {
        $connector = Database::connect();

        try {
            $statement = $connector->prepare("DELETE FROM {$table} WHERE id = {$id}");
            $statement->execute();
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * Truncate database
     */
    public static function truncate()
    {
        $database = Database::connect();

        $tablesToTruncate = [
            'books',
            'clients'
        ];

        self::truncateSpecificTables($database, $tablesToTruncate);
    }

    //-- --- Protected Helpers ----------------------------------------------------------------------------------------

    /**
     * Truncate specific table
     * ex. 'books', 'clients'
     *
     * @param PDO $database
     * @param array $tables
     */
    protected static function truncateSpecificTables(PDO $database, array $tables)
    {
        foreach ($tables as $table) {
            try {
                // Prepare SQL statement
                $statement = "TRUNCATE {$table}";

                // Prepare and execute
                $database->prepare($statement)
                    ->execute();
            } catch (PDOException $exception) {
                // If something goes wrong just show the exception message and continue
                echo $exception->getMessage();

                continue;
            }
        }
    }
}