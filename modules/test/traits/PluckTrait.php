<?php

namespace modules\test\traits;

trait PluckTrait
{
    /**
     * @param mixed[] $array
     * @return mixed[]
     */
    function array_pluck(array $array, mixed $key): array
    {
        return array_map(function($value) use ($key) {
            return is_object($value) ? $value->$key : $value[$key];
        }, $array);
    }
}