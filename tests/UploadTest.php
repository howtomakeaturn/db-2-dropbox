<?php

use PHPUnit\Framework\TestCase;
use Kunnu\Dropbox\DropboxApp;
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxFile;

class UploadTest extends TestCase
{
    public function test_hello()
    {
        $dotenv = new Dotenv\Dotenv(dirname(__DIR__));

        $dotenv->load();

        //Configure Dropbox Application
        $app = new DropboxApp(getenv('DROPBOX_APP_KEY'), getenv('DROPBOX_APP_SECRET'), getenv('DROPBOX_APP_ACCESS_TOKEN'));

        //Configure Dropbox service
        $dropbox = new Dropbox($app);

        $dropboxFile = new DropboxFile(__DIR__ . "/Hello-World.txt");

        $file = $dropbox->upload($dropboxFile, "/My-Hello-World.txt", ['autorename' => true]);

        $this->assertEquals($file->getName(), 'My-Hello-World.txt');
    }
}
