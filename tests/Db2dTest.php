<?php

use PHPUnit\Framework\TestCase;
use Howtomakeaturn\Db2d\Db2d;

class GddbTest extends TestCase
{
    /*
    public function test_dump()
    {
        $dotenv = new Dotenv\Dotenv(dirname(__DIR__));

        $dotenv->load();

        $db = getenv('DB_DATABASE');

        $username = getenv('DB_USERNAME');

        $password = getenv('DB_PASSWORD');

        $db2d = new Db2d($db, $username, $password);

        $db2d->dump();

        unlink('dump.sql');
    }
    */

    public function test_backup()
    {
        $dotenv = new Dotenv\Dotenv(dirname(__DIR__));

        $dotenv->load();

        $db = getenv('DB_DATABASE');

        $username = getenv('DB_USERNAME');

        $password = getenv('DB_PASSWORD');

        $app_key = getenv('DROPBOX_APP_KEY');

        $app_secret =getenv('DROPBOX_APP_SECRET');

        $access_token = getenv('DROPBOX_APP_ACCESS_TOKEN');

        $db2d = new Db2d();

        $db2d->configureDatabase($db, $username, $password);

        $db2d->configureDropbox($app_key, $app_secret, $access_token);

        $db2d->backup();

        $this->assertTrue(true);
    }
}
