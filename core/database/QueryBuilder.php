<?php 

    class QueryBuilder 
    {
        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function selectRecords($table) 
        {
            $query = sprintf(
                'SELECT * FROM %s',
                $table
            ); 

            try 
            {
                $statement = $this->pdo->prepare($query);

                $statement->execute();

                return $statement->fetchAll(PDO::FETCH_CLASS);
            } 

            catch (PDOException $exception) 
            {
                Utilities::dieDump($exception->getMessage());
            }
        }

        public function insertRecords($table, $parameters)
        {
            $query = sprintf(
                'INSERT INTO %s (%s) VALUES (%s)', 
                $table,
                implode(', ', array_keys($parameters)),
                ':' . implode(', :', array_keys($parameters)) 
            );
    
            try 
            {
                $statement = $this->pdo->prepare($query);
    
                $statement->execute($parameters);
            } 
            
            catch (PDOException $exception) 
            {
                Utilities::dieDump($exception->getMessage());
            }
        }  

        public function updateRecords($table, $id)
        {

        }

        public function deleteRecords($table, $id)
        {

        }

    }