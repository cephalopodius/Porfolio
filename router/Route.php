<?php

namespace App;


class Route {

    private $path;
    private $callable;

    public function __construct($path, $callable){
        $this->path = $path;
        $this->callable = $callable;
    }





}
