<?php

class CommentModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_airbnb;charset=utf8', 'root', '');
    }

    function getComments(){
        $query = $this->db->prepare('SELECT * FROM comentario');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCommentByFlatId($flatId){
        $query = $this->db->prepare('SELECT * FROM comentario WHERE id_depto_fk=?');
        $query->execute(array($flatId));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function postComment ($text, $userId, $flatId){
        $query = $this->db->prepare('INSERT INTO comentario(texto, id_usuario_fk, id_depto_fk) VALUES (?,?,?)');
        $query->execute(array($text, $userId, $flatId));
        return $this->db->lastInsertId();
    }

    function deleteComment($commentId){
        $query = $this->db->prepare('DELETE FROM comentario WHERE id_comentario=?');
        $query->execute(array($commentId));
        return $query->rowCount();
    } 
}