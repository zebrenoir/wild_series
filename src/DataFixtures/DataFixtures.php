<?php

namespace App\DataFixtures;


use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DataFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $manager->persist($category);
        $category->setName('Trash movie');

        $manager->persist($category);
        $manager->flush();
    }
}
