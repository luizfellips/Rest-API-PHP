<?php

namespace App\Models;


class User {
    private static $table = 'user';

    public static function select(int $id){
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME,DBUSER,DBPASS);

        $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return $stmt->fetch(\PDO::FETCH_ASSOC);

            
        } else{
            throw new \Exception("Nenhum usuário encontrado",1);
        }
    }

    public static function selectAll(){
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME,DBUSER,DBPASS);

        $sql = 'SELECT * FROM '.self::$table;
        $stmt = $connPdo->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return $stmt->fetchAll();

            
        } else{
            throw new \Exception("Nenhum usuário encontrado");
        }
    }

    public static function insert($data){
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME,DBUSER,DBPASS);

        $sql = 'INSERT INTO '.self::$table.'(email,name,password) VALUES (:email, :name, :password)';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':password', $data['password']);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return 'Usuário inserido com sucesso!';

            
        } else{
            throw new \Exception("Falha ao inserir usuário(a)");
        }
    }

    public static function updateUser($id, $data){
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME,DBUSER,DBPASS);

        $sql = 'Update '.self::$table.' SET email = :email, name = :name, password = :password WHERE id = :id';
        $stmt = $connPdo->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':password', $data['password']);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return 'User updated successfully!';

            
        } else{
            throw new \Exception("Failed to update user!");
        }
    }

    public static function delete($id){
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME,DBUSER,DBPASS);

        $sql = 'Delete from '.self::$table.' WHERE id = :id';
        $stmt = $connPdo->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return 'User deleted succesfully!';

            
        } else{
            throw new \Exception("Failed to delete user!");
        }
    }

} 