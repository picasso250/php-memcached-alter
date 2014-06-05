<?php

if (class_exists('Memcache')) {
    return;
}

require 'memcache_oo.php';

function memcache_add($mem)
{
    return $mem->add();
}
function memcache_add_server($mem)
{
    return $mem->addServer();
}
function memcache_close($mem)
{
    return $mem->close();
}
function memcache_connect()
{
    $mem = new Memcache;
    $mem->connect();
    return $mem;
}

function memcache_decrement($mem, $key, $value = 1)
{
    return $mem->decrement($key, $value);
}

function memcache_delete($mem, $key)
{
    return $mem->delete($key);
}

function memcache_flush($mem)
{
    return $mem->flush();
}

function memcache_get($mem, $key)
{
    return $mem->get($key);
}

function memcache_getExtendedStats($mem)
{
    return $mem->getExtendedStats();
}
function memcache_getServerStatus($mem)
{
    return $mem->getServerStatus();
}
function memcache_getStats($mem)
{
    return $mem->getStats();
}
function memcache_getVersion($mem)
{
    return $mem->getVersion();
}
function memcache_increment($mem, $key, $value = 1)
{
    return $mem->increment($key, $value);
}
function memcache_pconnect($mem)
{
    return $mem->pconnect();
}
function memcache_replace($mem, $key, $var)
{
    return $mem->replace($key, $var);
}

function memcache_set($mem, $key, $var)
{
    return $mem->set($key, $var);
}

function memcache_setCompressThreshold($mem)
{
    return $mem->setCompressThreshold();
}
function memcache_setServerParams($mem)
{
    return $mem->setServerParams();
}
