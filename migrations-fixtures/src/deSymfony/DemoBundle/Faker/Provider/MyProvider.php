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

    /**
     * Get a product name
     *
     * @return string
     */
    public function product()
    {
        $brands = array('LG', 'Samsung', 'Sony', 'Philips', 'Loewe', 'Panasonic', 'Toshiba');
        $sizes = array('22"', '32"', '40"', '42"');
        $technologies = array('LED', 'Plasma', 'LCD', '3D');

        return $brands[rand(0, count($brands)-1)]
            . ' ' . $sizes[rand(0, count($sizes)-1)]
            . ' ' . $technologies[rand(0, count($technologies)-1)];
    }
}
