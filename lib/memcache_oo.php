<?php

class Memcache
{
    public function add()
    {

    }
    public function addServer()
    {

    }
    public function close()
    {

    }
    public function connect()
    {

    }
    public function decrement($key, $value = 1)
    {
        $this->set($key, $this->get($key) - $value);
    }

    public function delete($key)
    {
        $filename = $this->filename($key);
        if (file_exists($filename)) {
            unlink($filename);
        }
    }

    public function flush()
    {
        $dir = opendir($this->root);
        while (($filename = readdir($dir)) !== false) {
            if ($filename != '.' && $filename != '..') {
                unlink($this->root.'/'.$filename);
            }
        }
    }

    public function get($key)
    {
        if (is_array($key)) {
            $ret = array();
            foreach ($key as $k) {
                $r = $this->_get($k);
                if ($r !== false) {
                    $ret[$k] = $r;
                }
            }
            return $ret ?: false;
        } else {
            return $this->_get($key);
        }
    }

    private function _get($key)
    {
        $filename = $this->filename($key);
        if (file_exists($filename)) {
            $content = file_get_contents($filename);
            return unserialize($content);
        }
        return false;
    }

    public function getExtendedStats()
    {

    }
    public function getServerStatus()
    {

    }
    public function getStats()
    {

    }
    public function getVersion()
    {

    }
    public function increment($key, $value = 1)
    {
        $this->set($key, $this->get($key) + $value);
    }
    public function pconnect()
    {

    }
    public function replace($key, $var)
    {
        $this->set($key, $var);
    }

    public function set($key, $var)
    {
        $filename = $this->filename($key);
        file_put_contents($filename, serialize($var));
    }
    
    public function setCompressThreshold()
    {

    }
    public function setServerParams()
    {

    }

    private function filename($key)
    {
        $key = md5($key);
        $root = (sys_get_temp_dir() . '/memcache-alter');
        $filename = $root.$key.".tmp";
        return $filename;
    }
}
