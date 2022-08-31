<?php

namespace modules\test\traits;

trait PluckTrait
{
    function array_pluck($array, $key): array
    {
        return array_map(function($v) use ($key) {
            return is_object($v) ? $v->$key : $v[$key];
        }, $array);
    }
}