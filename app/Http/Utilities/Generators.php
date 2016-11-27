<?php


namespace Groid\Http\Utilities;


class Generators
{

    public function generateGuid()
    {
        return base_convert(microtime(false), 10, 36);
    }
}