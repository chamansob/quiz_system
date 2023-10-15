<?php
class DBController
{
    private $host = DB_SERVER;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $database = DB_NAME;
    private $connection;

    function __construct()
    {
        $this->open_connection();
    }

    public function open_connection()
    {
        $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        if (!$this->connection) {
            die("Database connection failed: " . mysqli_connect_errno());
        } else {
        }
    }

    public function close_connection()
    {
        if (isset($this->connection)) {
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }




    function runQuery($query)
    {
        $result = mysqli_query($this->connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset))
            return $resultset;
    }

    function numRows($query)
    {
        $result  = mysqli_query($this->connection, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}
