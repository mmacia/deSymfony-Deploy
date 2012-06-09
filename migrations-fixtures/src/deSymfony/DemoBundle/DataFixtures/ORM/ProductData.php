<?php

namespace deSymfony\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use deSymfony\DemoBundle\Entity\Product;
use deSymfony\DemoBundle\Entity\Comment;
use deSymfony\DemoBundle\Faker\Provider\MyProvider;

/**
 * ProductData
 *
 * @author Moisés Maciá <mmacia@gmail.com>
 */
class ProductData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * load
     *
     * @param ObjectManager $em
     */
    public function load(ObjectManager $em)
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new MyProvider($faker));

        for ($i = 0; $i < 100; $i++) {
            $p = new Product();

            $p->fromArray(array(
                'name'        => $faker->sentence(3),
                'description' => $faker->paragraph,
                'price'       => $faker->decimal,
                'rating'      => $faker->rate,
            ));

            $em->persist($p);
        }

        $em->flush();
    }

    /**
     * getOrder
     *
     * @return integer
     */
    public function getOrder()
    {
        return 300;
    }
}
