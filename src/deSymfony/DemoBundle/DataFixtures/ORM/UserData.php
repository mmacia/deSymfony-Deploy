<?php

namespace deSymfony\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use deSymfony\DemoBundle\Entity\User;
use Symfony\Component\Yaml\Yaml;

/**
 * UserData
 *
 * @author Moisés Maciá <mmacia@gmail.com>
 */
class UserData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * load
     *
     * @param ObjectManager $em
     */
    public function load(ObjectManager $em)
    {
        $fixtures = Yaml::parse(file_get_contents(__DIR__.'/users.yml'));

        foreach ($fixtures['users'] as $u) {
            $user = new User();

            $user->fromArray($u);
            $em->persist($user);
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
        return 100;
    }
}
