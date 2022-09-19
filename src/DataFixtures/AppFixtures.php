<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use App\Entity\Product;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $brand = ['Samsung', 'Apple', 'Huawei', 'Nokia'];
        $model = ['CK247', 'Horizon3D', 'UnlimitedEnergy', 'Revorn', 'Metaverse45', 'Air', 'Revolution', 'Tix', 'One', 'Atex' ];
        $procesor = ['Snapdragon 888 5G', 'A16 Bionic', 'Mediatek'];
        $battery = [4400, 3600, 5000, 10000];
        $screen = [6, 7, 3, 10];
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 10; $i++) {
            $product = New Product();
            $product->setBrand($brand[rand(0, count($brand) - 1)])
                    ->setModel($model[$i])
                    ->setProcessor($procesor[rand(0, count($procesor) - 1)])
                    ->setBattery($battery[rand(0, count($battery) - 1)])
                    ->setScreensize($screen[rand(0, count($screen) - 1)]);

            $manager->persist($product);
        }

        $users = [];

        $email = ['orange@orange.fr', 'sfr@sfr.fr', 'free@free.fr'];
        for ($i = 0; $i < 3; $i++) {
            $user = New User();
            $user->setEmail($email[$i])
                ->setPassword(password_hash('123', PASSWORD_DEFAULT));


            $manager->persist($user);

            $users[] = $user;
        }

        $firstname = ['Manon', 'Antoine', 'Edouard', 'Alpha', 'Mahdi', 'Sophie', 'Cindy', 'Hugo', 'Sara', 'Cecile', 'Anais', 'Robert', 'Pepe', 'Miguel', 'Tristan'];
        $lastname = ['Lesage', 'Vincent', 'Dacosta', 'Midi', 'Lesne', 'Bembrahim', 'Stuart', 'Sevilla', 'Rabiah', 'Perreira', 'Jiménez', 'Garcia', 'Foret', 'Richelieu', 'Fore'];
        $email = ['manon@gmail.com', 'albert@gmail.com', 'gilbert@gmail.com', 'vincent@gmail.com', 'edouard@gmail.com', 'sophie@gmail.com', 'hugo@gmail.com', 'sara@gmail.com', 'cecile@gmail.com', 'miguel@gmail.com', 'lorent@gmail.com', 'loly@gmail.com', 'agence@gmail.com', 'alpha@gmail.com'];
        $phone = ['0759567842', '0643796236', '0734563256', '0743678436', '0654875769', '0724972505', '0619426942', '0775359829', '0736044489', '0734673423', '0645338703', '0654789540', '0624765482', '0634872562'];
            //Ajouter l'user aleatoire
        for ($i = 0; $i < 14; $i++) {
            $customer = New Customer();
            $customer->setFirstname($firstname[$i])
                     ->setLastname($lastname[$i])
                     ->setEmail($email[$i])
                     ->setPhone($phone[$i])
                     ->setUser($users[rand(0, count($users) - 1)]);

            $manager->persist($customer);
        }


        $manager->flush();
    }
}
