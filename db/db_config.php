<?php

    // database configuration
    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "wof@kou@dio");
    define("DATABASE", "password-database");

    // create connection 
    $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    /**
     * check if connection is established.
     * !if not, then throw an error
     */
    if(!$conn){

        $response = "Unable to establish connection with database";
        
        die($response. " Error: ".mysqli_error($conn));

    }