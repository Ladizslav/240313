<?php

class Admin extends User{
    public int $accessLevel = 1;

    public function __construct(int $id, string $name,string $password, int $accessLevel){
        parent::__construct($id, $name, $password);
        $this->accessLevel = $accessLevel;

    }

    

}