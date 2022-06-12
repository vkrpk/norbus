<?php

use Database\DBConnection;
use Faker\Factory;

require './vendor/autoload.php';
$DBConnection = new DBConnection("norbus", '127.0.0.1', 'root', '');
$pdo = $DBConnection->getPDO();

$faker = Faker\Factory::create('fr_FR'); // create a French faker


for ($i=1; $i <= 30; $i++) {
    $query = "INSERT INTO villes (nom) VALUES (
        '{$faker->city}'
        )";
        $pdo->exec($query);
}
for ($i=1; $i <= 30; $i++) {
    $query = "INSERT INTO users (mail, prenom, nom, telephone, adresse, fk_ville_id) VALUES (
        '{$faker->email}',
        '{$faker->firstName}',
        '{$faker->lastName}',
        '{$faker->phoneNumber}',
        '{$faker->address}',
        {$i}
        )";
        $pdo->exec($query);
}
// dd($faker->dateTimeBetween($startDate = 'now', $endDate = '+1 years', $timezone = 'Europe/Paris'));

for ($i = 1; $i <= 30; $i++) {
    // $dateDepart = $faker->dateTimeBetween($startDate = 'now', $endDate = '+7 days');
    // $dateRetour = $faker->dateTimeBetween($startDate = $dateDepart,  $endDate = '+7 days');
    $query = "INSERT INTO orders (place, couchette, fk_ville_aller_id, fk_ville_retour_id, fk_user_id) VALUES (
    {$faker->numberBetween(1, 5)},
    {$faker->numberBetween(0, 1)},
    {$faker->numberBetween(2, 30)},
    {$faker->numberBetween(2, 30)},
    {$i}
    -- {$faker->numberBetween(2, 30)}
    )";
    $pdo->exec($query);
    // '{$dateDepart->format('Y-m-d H-i-s' )}',
    // '{$dateRetour->format('Y-m-d H-i-s' )}',
}

$options = ['direct', 'accessible aux handicapés', 'regionnal', 'national', 'international', 'couchette', 'deux étages', 'toilette', 'première classe', 'seconde classe', 'petit-déjeune', 'déjeuner', 'diner'];

for ($i = 0; $i < count($options); $i++) {
    $query = "INSERT INTO options (nom) VALUES ('{$options[$i]}')";
    $pdo->exec($query);
}

for ($i=1; $i <= 13; $i++) {
    $option = array_rand($options);
    $query = "INSERT INTO option_order (fk_order_id, fk_option_id) VALUES (
        {$i},
        {$i}
    )";
    $pdo->exec($query);
}

// $options = ['petit-déjeuner', 'déjeuner', 'diner', 'couchette'];

?>