<?php
/**
 * Created by PhpStorm.
 * User: DarkEyeDragon
 * Date: 11/7/2018
 * Time: 9:38 PM
 */

$DBController = new DBController();

if (isset($_GET["first_name"], $_GET["last_name"], $_GET["age"], $_GET["discord_tag"], $_GET["reason"], $_GET["motivation"], $_GET["email"])) {
    $DBController->insertApplication($_GET["first_name"], $_GET["last_name"], $_GET["age"], $_GET["discord_tag"], $_GET["reason"], $_GET["motivation"], $_GET["email"]);
    http_response_code(200);
} else {
    http_response_code(417);
}