<?php

namespace modules\test\twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PluckExtension extends AbstractExtension
{

    public function getFunctions(): array
    {
        return [
            new TwigFunction('array_pluck', [$this, 'arrayPluck']),
        ];
    }

    /**
     * @param mixed[] $array
     * @return mixed[]
     */
    function arrayPluck(array $array, mixed $key): array
    {
        return array_map(function($value) use ($key) {
            return is_object($value) ? $value->$key : $value[$key];
        }, $array);
    }


}