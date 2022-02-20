<?php

    class Connection
    {
        public static function Connect($cfg) {
            try 
            {
                return new PDO(
                    'mysql:host=' . $cfg['host'] . ';'.
                    'dbname=' . $cfg['dbname'],
                    $cfg['username'],
                    $cfg['password']
                );
            } 
            catch (PDOException $exception) {
                Utilities::dieDump($exception->getMessage());
            }
        }
    }