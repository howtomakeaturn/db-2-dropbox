<?php

use PHPUnit\Framework\TestCase;
use Howtomakeaturn\Db2d\Db2d;

class GddbTest extends TestCase
{
    public function test_hello()
    {
        $gddb = new Db2d();

        $this->assertEquals($gddb->hello(), 'hello world');
    }
}
