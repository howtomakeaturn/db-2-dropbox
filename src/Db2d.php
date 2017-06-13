<?php

namespace Howtomakeaturn\Db2d;

use Ifsnop\Mysqldump\Mysqldump;
use Kunnu\Dropbox\DropboxApp;
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxFile;

class Db2d
{
    private $dumper;

    private $uploader;

    public function dump()
    {
        $this->dumper->start('dump.sql');
    }

    public function configureDatabase($db, $username, $password)
    {
        $this->dumper = new Mysqldump("mysql:host=localhost;dbname=$db", $username, $password);
    }

    public function configureDropbox($key, $secret, $token)
    {
        $app = new DropboxApp($key, $secret, $token);

        $this->uploader = new Dropbox($app);
    }

    public function backup()
    {
        $name = 'backup-' . date('Ymd-H-i-s') . '.sql';

        $this->dumper->start($name);

        $dropboxFile = new DropboxFile($name);

        $file = $this->uploader->upload($dropboxFile, "/$name", ['autorename' => true]);

        unlink($name);
    }
}
