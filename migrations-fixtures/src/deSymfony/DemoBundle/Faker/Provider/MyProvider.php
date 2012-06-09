<?php

namespace deSymfony\DemoBundle\Faker\Provider;

/**
 * My custom faker provider
 *
 * @author Moisés Maciá <mmacia@gmail.com>
 **/
class MyProvider extends \Faker\Provider\Base
{
    /**
     * Get decimal number
     *
     * @return float
     */
    public function decimal()
    {
        return rand(0, 1000) + rand(0, 100)/100;
    }

    /**
     * Get a rating number between 0 and 5
     *
     * @return integer
     */
    public function rate()
    {
        return rand(0, 5);
    }
}
