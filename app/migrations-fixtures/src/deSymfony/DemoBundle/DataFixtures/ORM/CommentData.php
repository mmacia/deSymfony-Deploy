<?php


namespace deSymfony\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use deSymfony\DemoBundle\Entity\Comment;
use deSymfony\DemoBundle\Entity\User;
use deSymfony\DemoBundle\Faker\Provider\MyProvider;

/**
 * UserData
 *
 * @author Moisés Maciá <mmacia@gmail.com>
 */
class CommentData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * load
     *
     * @param ObjectManager $em
     */
    public function load(ObjectManager $em)
    {
        $faker = \Faker\Factory::create();

        $authors = $em->getRepository('deSymfonyDemoBundle:User')->findAll();

        for ($i = 0; $i < 200; $i++) {
            $c = new Comment();

            $c->fromArray(array(
                'comment'   => $faker->paragraph,
                'createdAt' => $faker->dateTimeThisYear,
            ));
            $c->setAuthor($authors[rand(0, count($authors)-1)]);

            $em->persist($c);
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
        return 200;
    }
}
