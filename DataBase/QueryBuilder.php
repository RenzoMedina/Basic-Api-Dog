<?php 

namespace DataBase;

class QueryBuilder{

    protected $conn;

    public function __construct(){
        $this->conn = Connection::start();
    }

    public function index(){

    }
}