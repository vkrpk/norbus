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
    $dateDepart = $faker->dateTimeBetween($startDate = 'now', $endDate = '+7 days')->format('Y-m-d');
    $dateRetour = $faker->dateTimeBetween($startDate = $dateDepart,  $endDate = '+7 days')->format('Y-m-d');
    // $now = (new DateTime()getTimestamp())->format('Y-m-d H:i:s');
    $query = "INSERT INTO orders ( date_aller, date_retour, bool_aller_retour, adulte, enfant, fk_ville_arrivee_id, fk_ville_depart_id, fk_user_id) VALUES (
    '{$dateDepart}',
    '{$dateRetour}',
    {$faker->numberBetween(0, 1)},
    {$faker->numberBetween(1, 5)},
    {$faker->numberBetween(1, 5)},
    {$faker->numberBetween(2, 30)},
    {$faker->numberBetween(2, 30)},
    {$i}
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
    $query = "INSERT INTO option_order (fk_option_id, fk_order_id, quantite) VALUES (
        {$faker->numberBetween(1, 13)},
        {$i},
        {$faker->numberBetween(1, 4)}
    )";
    $pdo->exec($query);
}

?>