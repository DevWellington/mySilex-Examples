<?php
/*
 * This is a simple class of a person with:
 * - Name
 * - E-Mail
 *
 * Who has not? :)
 */
class people {

    private $name;
    private $email;

    public function __construct($_name, $_email){
        $this->name = $_name;
        $this->email = $_email;
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

}