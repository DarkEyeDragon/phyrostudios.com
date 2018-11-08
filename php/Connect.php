<?php
/**
 * Created by PhpStorm.
 * User: DarkEyeDragon
 * Date: 11/7/2018
 * Time: 9:12 PM
 */

class Connect
{
    private $servername = "fdb22.awardspace.net";
    private $username = "2869875_phyrostudios";
    private $password = "Phyrostudios556";
    private $dbname = "2869875_phyrostudios";
    private $table = "applications";
    private $connected = false;
    private $connection;

    public function connectToDB()
    {
        if ($this->connected) return;
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $this->connection = $conn;
        if ($conn->connect_error) {
            $this->connected = false;
        } else {
            $this->connected = true;
        }
    }

    /**
     * @return mysqli
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }


    /**
     *Close connection with current db
     */
    public function close()
    {
        if (!is_null($this->connection)) {
            $this->connection->close();
            $this->connected = false;
        }
    }

}