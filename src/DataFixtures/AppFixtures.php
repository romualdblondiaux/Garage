<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Image;
use App\Entity\InfoSup;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('FR-fr');
        
        // gestion des info
        for($a = 1; $a <= 30; $a++){
            $info = new InfoSup();
            
            $description = $faker->paragraph(5);
            $opt = '<p>'.join('</p><p>',$faker->paragraphs(4)).'</p>';

            $info->setMarque('Lamborghini')
                ->setModele('Huracán')
                ->setImg('https://picsum.photos/1000/350')
                ->setKm(rand(1,150000))
                ->setPrix(rand(500000,1000000))
                ->setProprio(rand(1,5))
                ->setCylindree(rand(5000,5300))
                ->setPuissance(rand(580,640))
                ->setCarburant('Essence')
                ->setAnnee(rand(2000,2020))
                ->setTransmission('intégrale')
                ->setDescription($description)
                ->setOpt($opt);

            $manager->persist($info);

            for($i=1; $i <= rand(2,5); $i++){
                $image = new Image();

                $image->setUrl('https://picsum.photos/200/200')
                    ->setCaption($faker->sentence())
                    ->setinfoSupId($info);
                $manager->persist($image);  
            }
        }

        $manager->flush();
    }
}
