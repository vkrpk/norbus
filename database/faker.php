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
// dd($faker->dateTimeBetween($startDate = 'now', $endDate = '+1 years', $timezone = 'Europe/Paris'));

for ($i = 0; $i < 30; $i++) {
    $dateDepart = $faker->dateTimeBetween($startDate = 'now', $endDate = '+7 days');
    $dateRetour = $faker->dateTimeBetween($startDate = $dateDepart,  $endDate = '+7 days');
    $query = "INSERT INTO trajets (date_aller, date_retour, fk_arrivee_id, fk_depart_id) VALUES (
    '{$dateDepart->format('Y-m-d H-i-s' )}',
    '{$dateRetour->format('Y-m-d H-i-s' )}',
    {$faker->numberBetween(1, 50)},
    {$faker->numberBetween(1, 50)}
    )";
    $pdo->exec($query);
}

