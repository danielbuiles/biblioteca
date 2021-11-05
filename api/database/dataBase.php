<?php
include '/Daniel/Xampp/htdocs/biblioteca/api/config.php';

class DataBase extends Config{
    
    function dbConnect(){
        try {
            $dbDatos="mysql:host=$this->DB_HOST;dbname=$this->DB_NAME";
            $conexion=new PDO($dbDatos,$this->DB_USER,$this->DB_PASS);
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