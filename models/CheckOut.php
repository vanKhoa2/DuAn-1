<?php 

class CheckOut
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
}