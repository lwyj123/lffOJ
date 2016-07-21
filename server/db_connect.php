<?php
/**
 * A class file to connect to database
 */
class DB_CONNECT {

    private $con = null;
    // constructor
    function __construct() {
        // connecting to database
        $this->con = null;
    }

    // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }

    /**
     * Function to connect with database
     */
    function connect() {
        // import database connection variables
        require_once __DIR__ . '/db_config.php';

        // Connecting to mysql database
        $this->con = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);

        // returing connection cursor
        return $this->con;
    }

    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        $this->con = null;
    }

}
