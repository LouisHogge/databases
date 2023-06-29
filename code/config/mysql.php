<?php

/*const MYSQL_HOST = 'localhost';
const MYSQL_PORT = 3306;
const MYSQL_NAME = 'group22';
const MYSQL_USER = 'root';
const MYSQL_PASSWORD = 'root';

try {
    $mysqlClient = new PDO(
        sprintf('mysql:host=%s;dbname=%s;port=%s', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
        MYSQL_USER,
        MYSQL_PASSWORD
    );
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}*/

const MYSQL_HOST = 'ms8db';
const MYSQL_PORT = 3306;
const MYSQL_NAME = 'group22';
const MYSQL_USER = 'group22';
const MYSQL_PASSWORD = 'wz3VvtYBlo';

try {
    $mysqlClient = new PDO(
        sprintf('mysql:host=%s;dbname=%s;port=%s', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
        MYSQL_USER,
        MYSQL_PASSWORD
    );
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}
?>