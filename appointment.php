<?php

class appointment{
    public function __construct(public $id, public $email, public $date, public $time, public $type, public $isApproved) {}
}