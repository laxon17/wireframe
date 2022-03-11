<?php 

    class QueryBuilder 
    {
        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function selectRecords($table, $order = 0, $limt = 0, $from = 0, $approved = 0) 
        {
            $query = sprintf(
                'SELECT * FROM %s %s %s %s',
                $table,
                $approved ? 'WHERE Approved = 1' : '',
                $order ? 'ORDER BY CreatedAt DESC' : '',
                $limt ? 'LIMIT ' . $from . ', 5' : ''  
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

        public function selectLastRecords($table, $orderBy, $quantity, $approved = 0) 
        {
            $query = sprintf(
                'SELECT * FROM %s %s ORDER BY %s DESC LIMIT %s',
                $table,
                $approved ? 'WHERE Approved = 1' : '',
                $orderBy,
                $quantity
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

        public function selectFilteredRecord($table, $column, $condition)
        {
            $query = sprintf(
                'SELECT * FROM %s WHERE %s = \'%s\' ',
                $table,
                $column,
                $condition
            ); 

            try 
            {
                $statement = $this->pdo->prepare($query);

                $statement->execute();

                return $statement->fetch(PDO::FETCH_OBJ);
            } 

            catch (PDOException $exception) 
            {
                Utilities::dieDump($exception->getMessage());
            }
        }

        public function selectFilteredRecords($table, $column, $condition)
        {
            $query = sprintf(
                'SELECT * FROM %s WHERE %s = \'%s\' ',
                $table,
                $column,
                $condition
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

        public function selectCategoriesOfPost($post_id) 
        {
            $query = sprintf(
                'SELECT Categories.CategoryName
                FROM Categories
                INNER JOIN PostCategory ON  Categories.CategoryId = PostCategory.CategoryId
                WHERE PostCategory.PostId = \'%s\'',
                $post_id,
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

        public function selectPostsByCategory($categories)
        {
            $query = sprintf(
                'SELECT DISTINCT Posts.PostId, Posts.PostTitle, Posts.PostBody, Posts.CreatedAt, Posts.UserId
                FROM Posts 
                INNER JOIN PostCategory ON Posts.PostId = PostCategory.PostId 
                WHERE PostCategory.CategoryId IN (%s) AND Posts.Approved = 1
                ORDER BY CreatedAt DESC',
                implode(', ', $categories),
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

        public function selectComments($postId)
        {
            $query = sprintf(
                'SELECT Users.UserId, CONCAT(Users.FirstName , " " , Users.LastName) AS \'FullName\', Users.UserName, Users.ProfilePicture, Comments.CommentId, Comments.ParentId, Comments.CommentBody, Comments.PostId, Comments.CreatedAt
                FROM Users 
                INNER JOIN Comments ON Users.UserId = Comments.UserId
                WHERE PostId = %s
                ORDER BY Comments.CreatedAt DESC',
                $postId
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

        public function selectReplies($post_id, $parent_id)
        {
            $query = sprintf(
                'SELECT Users.UserId, CONCAT(Users.FirstName , " " , Users.LastName) AS \'FullName\', Users.UserName, Users.ProfilePicture, Comments.CommentId, Comments.ParentId, Comments.CommentBody, Comments.PostId, Comments.CreatedAt
                FROM Users 
                INNER JOIN Comments ON Users.UserId = Comments.UserId
                WHERE Comments.PostId = \'%s\' AND Comments.ParentId = \'%s\'
                GROUP BY Comments.CommentId',
                $post_id,
                $parent_id
            ); 
            var_dump($query);
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

        public function getRecordCount($table) 
        {
            $query = sprintf('SELECT COUNT(*) AS "Rows" FROM %s', $table);
            
            try
            {
                $statement = $this->pdo->prepare($query);

                $statement->execute();

                return $statement->fetch(PDO::FETCH_OBJ);
            }
            catch (PDOException $exception) 
            {
                Utilities::dieDump($exception->getMessage());
            }
        }

        public function selectUser($id)
        {
            $query = sprintf(
                'SELECT * 
                FROM Users 
                WHERE Username = \'%s\' OR UserMail = \'%s\' OR UserId = \'%s\' ',
                $id,
                $id,
                $id
            ); 

            try 
            {
                $statement = $this->pdo->prepare($query);

                $statement->execute();

                return $statement->fetch(PDO::FETCH_OBJ);
            } 

            catch (PDOException $exception) 
            {
                
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

        public function updateRecord($table, $column, $newValue, $condition, $conditionValue)
        {
            $query = sprintf(
                'UPDATE %s SET %s = "%s" WHERE %s = \'%s\' ',
                $table,
                $column,
                $newValue,
                $condition,
                $conditionValue
            );
    
            try 
            {
                $statement = $this->pdo->prepare($query);
    
                $statement->execute();
            } 
            
            catch (PDOException $exception) 
            {
                Utilities::dieDump($exception->getMessage());
            }
        }

        public function updateAnswer($answer, $poll_id, $user_id)
        {
            $query = sprintf(
                'UPDATE PollAnswers SET Answer = \'%s\' WHERE PollId = \'%s\' AND UserId = \'%s\' ',
                $answer,
                $poll_id,
                $user_id
            );
    
            try 
            {
                $statement = $this->pdo->prepare($query);
    
                $statement->execute();
            } 
            
            catch (PDOException $exception) 
            {
                Utilities::dieDump($exception->getMessage());
            }

        }

        public function updatePostBody($new_value, $condition_value)
        {
            $query = sprintf(
                'UPDATE Posts SET PostBody = :body WHERE PostId = "%s" ',
                $condition_value
            );

            try 
            {
                $statement = $this->pdo->prepare($query);
                $statement->bindParam(':body', $new_value);
                $statement->execute();
            } 
            
            catch (PDOException $exception) 
            {
                Utilities::dieDump($exception->getMessage());
            }

        }

        public function deleteRecords($table, $column, $value)
        {
            $query = sprintf(
                'DELETE FROM %s WHERE %s = %s',
                $table,
                $column,
                $value
            );
    
            try 
            {
                $statement = $this->pdo->prepare($query);
    
                $statement->execute();
            } 
            catch (PDOException $exception) 
            {
                Utilities::dieDump($exception->getMessage());
            }
        }

        public function deleteAllRecords($table)
        {
            $query = sprintf(
                'DELETE FROM %s',
                $table
            );
    
            try 
            {
                $statement = $this->pdo->prepare($query);
    
                $statement->execute();
            } 
            catch (PDOException $exception) 
            {
                Utilities::dieDump($exception->getMessage());
            }
        }

        public function selectPolls($user_id)
        {
            $query = sprintf(
                'SELECT *
                FROM Poll
                LEFT JOIN PollAnswers ON Poll.PollId = PollAnswers.PollId
                WHERE (PollAnswers.UserId = \'%s\' AND PollAnswers.Answer IS NULL) AND Poll.IsActive = 1',
                $user_id
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

        public function selectPollAnswers($poll_id)
        {
            $query = sprintf(
                'SELECT Answer, Count(UserId) AS Result
                FROM PollAnswers
                WHERE PollId = %s AND Answer IS NOT NULL
                GROUP BY Answer',
                $poll_id
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
    }