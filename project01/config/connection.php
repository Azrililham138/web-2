<?php

namespace config;

use PDO;
use PDOException;

class Connection
{
    public static function make()
    {
        try {
            return new PDO('mysql:host=localhost;dbname=koperasi_pegawai', 'root', '');
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
}
