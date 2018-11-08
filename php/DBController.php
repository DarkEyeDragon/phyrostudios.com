<?php
/**
 * Created by PhpStorm.
 * User: DarkEyeDragon
 * Date: 11/7/2018
 * Time: 9:25 PM
 */

class DBController
{

    private $connection;

    /**
     * DBController constructor.
     */
    function __construct()
    {
        $this->connection = new Connect();

    }

    public function insertApplication($first_name, $last_name, $age, $discord_tag, $reason, $motivation, $email)
    {
        $this->connection->getConnection();
        $conn = $this->connection->getConnection();
        $table = $this->connection->getTable();
        if ($stmt = $conn->prepare('INSERT INTO ' . $table . ' (first_name, last_name, age, discord_tag, reason, motivation, email) VALUES (?,?, ?, ?,?)')) {
            $first_name_esc = mysqli_real_escape_string($conn, $first_name);
            $last_name_esc = mysqli_real_escape_string($conn, $last_name);
            $age_esc = mysqli_real_escape_string($conn, $age);
            $discord_tag_esc = mysqli_real_escape_string($conn, $discord_tag);
            $reason_esc = mysqli_real_escape_string($conn, $reason);
            $motivation_esc = mysqli_real_escape_string($conn, $motivation);
            $stmt->bind_param("ssisss", $first_name_esc, $last_name_esc, $age_esc, $discord_tag_esc, $reason_esc, $motivation_esc);
            $stmt->execute();
            $stmt->close();
        }
    }
}