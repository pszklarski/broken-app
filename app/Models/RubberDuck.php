<?php

namespace App\Models;

class RubberDuck extends Duck
{
    public function quack()
    {
        return 'Quacking';
    }

    public function fly()
    {
        throw new \Exception("A rubber duck can't fly!");
    }

    public function swim()
    {
        return 'Swimming';
    }
}
