<?php

use PHPUnit\Framework\TestCase;
use Howtomakeaturn\Gddb\Gddb;

class GddbTest extends TestCase
{

    function test_hello()
    {
        $gddb = new Gddb();

        $this->assertEquals($gddb->hello(), 'hello world');
    }

}
