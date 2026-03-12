<?php
class DataBase{
    private $server;
    private $user;
    private $password;
    private $base;
    private function __construct()
    {
         $fil=file(__DIR__."\.env");
            $t=[];
            foreach ($fil as  $value) {
               $t[]= trim(explode(":",$value)[1]);
            }
              $this->server= $t[0];
              $this->user=$t[1];
              $this->password=$t[2];
              $this->base=$t[3]; 
    }
    public function connextion(){
      
        return new PDO("mysql:host=$this->server;dbname=$this->base", "$this->user", "$this->password");
    }
    
    }
    
$c=new DataBase;
$link=$c->connextion();





















?>