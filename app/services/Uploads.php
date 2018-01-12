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
//        return $this->name;
//        if($this->base_url === "http://www.teek.sstudio.io" or $this->base_url === "http://teek.sstudio.io") {
////            $this->path = substr(public_path(), 0, 16).'public_html/teek/uploads/';
//            return asset('/uploads/'.$this->name);
//        }
//        else {
            return asset('/uploads/'.$this->name);
//        }
//        return $this->path;
    }

    public function setName()
    {
        $this->name = str_random(5). time() . '.jpg';
    }

    public function path()
    {
        if($this->base_url === "http://www.teek.sstudio.io" or $this->base_url === "http://teek.sstudio.io") {
            $this->path = substr(public_path(), 0, 16).'public_html/teek/uploads/';
        }
        else {
            $this->path = public_path().'/uploads/';
        }
    }

    public function upload($resource, $type = 'image') {
        $this->setName();
        $this->path();

        $resource->move($this->path, $this->name);
    }

}