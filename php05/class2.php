<?php

class Math
{
    public static function square($num)
    {
        return $num * $num;
    }
}

echo Math::square(4);