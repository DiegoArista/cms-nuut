<?php
class Conexion{
    public function  conectar(){
        $link = new PDO("mysql:host=localhost;dbname=ng_i45g", "root", "");
        return $link;
    }
}