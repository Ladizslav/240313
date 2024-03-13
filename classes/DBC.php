<?php

class DBC
{
    /*const SERVER_IP = "localhost";
    const USER = "root";
    const PASSWORD = "student";
    const DATABASE = "LoginTest";

    private static $connection = null;

    public static function getConnection()
    {
        if (!self::$connection) {
            self::$connection = mysqli_connect(
                self::SERVER_IP,
                self::USER,
                self::PASSWORD,
                self::DATABASE
            );
            if (!self::$connection) {
                die('Could not connect to DB');
            }
        }
        return self::$connection;
    }

    public static function closeConnection()
    {
        if (self::$connection) {
            mysqli_close(self::$connection);
        }
    }
    */
    const SERVER_IP = "localhost";
    const USER = "root";
    const PASSWORD = "student";
    const DATABASE = "logintest";
    const PORT = 3306;

    private static $instance = null;
    private $connection;

    private function __construct()
    {
    }

    public static function getConnection()
    {
        if (!self::$instance) {
            self::$instance = new DBC();
            self::$instance->connect();
        }

        return self::$instance->connection;
    }

    private function connect()
    {
        $this->connection = mysqli_connect(
            self::SERVER_IP,
            self::USER,
            self::PASSWORD,
            self::DATABASE,
            self::PORT
        );

        if (!$this->connection) {
            die('Nelze se připojit k databázi: ' . mysqli_connect_error());
        }
    }

    public static function closeConnection()
    {
        if (self::$instance && self::$instance->connection) {
            mysqli_close(self::$instance->connection);
        }
    }
}