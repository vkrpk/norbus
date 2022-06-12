DROP DATABASE IF EXISTS norbus ;
CREATE DATABASE norbus DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use norbus;

CREATE TABLE villes(
   id INT AUTO_INCREMENT,
   nom VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE users(
   id INT AUTO_INCREMENT,
   mail VARCHAR(50)  NOT NULL,
   prenom VARCHAR(50)  NOT NULL,
   nom VARCHAR(50)  NOT NULL,
   telephone VARCHAR(15)  NOT NULL,
   adresse VARCHAR(25)  NOT NULL,
   fk_ville_id INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(fk_ville_id) REFERENCES villes(id)
);

CREATE TABLE reservations(
   id INT AUTO_INCREMENT,
   place INT NOT NULL,
   couchette BOOLEAN NOT NULL,
   fk_reservation_retour_id INT,
   fk_reservation_aller_id INT NOT NULL,
   fk_user_id INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(fk_reservation_retour_id) REFERENCES villes(id),
   FOREIGN KEY(fk_reservation_aller_id) REFERENCES villes(id),
   FOREIGN KEY(fk_user_id) REFERENCES users(id)
);


