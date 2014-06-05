<?php

require dirname(__DIR__).'/lib/memcache.php';

class Test extends PHPUnit_Framework_TestCase
{

    public function testSet()
    {
        $memcache_obj = memcache_connect('memcache_host', 11211);

        $key = 'xx';
        $value = 42;
        memcache_set($memcache_obj, $key, $value);
        $var = memcache_get($memcache_obj, $key);
        $this->assertEquals($value, $var);

    }

    public function testGet()
    {

        $memcache_obj = memcache_connect('memcache_host', 11211);
        $var = memcache_get($memcache_obj, 'some_key');
        $this->assertEquals(false, $var);

        $var = memcache_get($memcache_obj, Array('some_key', 'another_key'));
        $this->assertEquals(false, $var);

        /* OO API */
        $memcache_obj = new Memcache;
        $memcache_obj->connect('memcache_host', 11211);
        $var = $memcache_obj->get(Array('some_key', 'second_key'));
        $this->assertEquals(false, $var);

    }

}
