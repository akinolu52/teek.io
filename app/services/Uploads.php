<?php

namespace Teek\services;

class Uploads
{
    protected $name = '';
    protected $path;

    public function __construct()
    {
        $this->base_url = URL('/');
    }

    public function getName()
    {
        return asset('/uploads/'.$this->name);
    }

    public function setName()
    {
        $this->name = str_random(5). time() . '.jpg';
    }

    public function path()
    {
        if($this->base_url === "http://www.teek.sstudio.io" or $this->base_url === "http://teek.sstudio.io" or $this->base_url === "http://teek.sstudio.io/index.php" or $this->base_url === "http://www.teek.sstudio.io/index.php") {
            $this->path = substr(public_path(), 0, 15).'teek.sstudio.io/uploads/';
        }
        else {
            $this->path = public_path().'/uploads/';
        }
    }

    public function upload($resource) {
        $this->setName();
        $this->path();

        $resource->move($this->path, $this->name);
    }

}