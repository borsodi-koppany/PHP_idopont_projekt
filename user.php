<?php 
class user{
    public function __construct(public $email, public $password, public $isAdmin) {}
}