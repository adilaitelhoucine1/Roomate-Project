<?php
require_once(__DIR__.'/../config/db.php');

class Announcement extends Db {

    protected $connection;

    public function __construct()
    {
        parent::__construct();
        $this->connection = $this->getConnection();
    }

   
} 