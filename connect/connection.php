<?php

require_once 'config/config.php';

function connect(){
    try{
        $array = config();
        return new PDO($array['DRIVER'].":host=".$array['HOSTNAME'].";dbname=".$array['BASENAME'],$array['USERNAME'], $array['PASSWORD']);
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}