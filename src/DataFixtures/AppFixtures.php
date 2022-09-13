<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 10; $i++) {
            $product = New Product();
            $comment->setAuthor($citizens[rand(0, count($citizens) - 1)])
                ->setPost($posts[rand(0, count($posts) - 1)])
                ->setContent('Commentaire test')
                ->setCreatedAt(new \DateTime('now'));

            $manager->persist($comment);
        }

        $manager->flush();
    }
}
