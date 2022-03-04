<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder){

        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager): void
    {

        $user = new User();
        $user->setUsername('demo');
        $user->setPassword($this->encoder->encodePassword($user,'demo'));
        // $product = new Product();
        // $manager->persist($product);
        $manager->persist($user);
        $manager->flush();
    }
}
