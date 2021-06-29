<?php
try{
 $db=new PDO("mysql:host=localhost; dbname=hospital;charest=utf8",'root','');
}catch(Exception $e){
    echo $e->getMessage();
}
?>