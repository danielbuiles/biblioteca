<?php
include './config.php';

class DataBase{

    function dbConnect(){
        try {
            $dbDatos ="mysql:host={'$DB_HOST'};dbname={'$DB_NAME'}";
            $conexion=new PDO($dbDatos,$DB_USER,$DB_PASSWORD);
            return $conexion;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function add_del_update_db($sql){
        try {
            $conexion = $this->dbConnect();
            $result = $conexion->prepare($sql);
            $result->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function select_db($sql){
        try {
            $conexion = $this->dbConnect();
            $result = $conexion->prepare($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            return $result->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}
?>