<?php

use PHPUnit\Framework\TestCase;

class DumpTest extends TestCase
{
    public function test_hello()
    {
        $dotenv = new Dotenv\Dotenv(dirname(__DIR__));

        $dotenv->load();

        $db = getenv('DB_DATABASE');

        $username = getenv('DB_USERNAME');

        $password = getenv('DB_PASSWORD');

        $dump = new Ifsnop\Mysqldump\Mysqldump("mysql:host=localhost;dbname=$db", $username, $password);

        $dump->start('dump.sql');

        unlink('dump.sql');
    }
}
