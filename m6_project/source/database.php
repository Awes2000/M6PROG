<?php 
function database_connect()
{
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_SCHEMA);

    // Check for a connection error
    if ($connection->connect_errno) {
        // Log the error instead of displaying sensitive information
        error_log('Database connection error: ' . $connection->connect_error);

        // Provide a generic error message to the user
        die('Unable to connect to the database. Please try again later.');
    }

    return $connection;
}