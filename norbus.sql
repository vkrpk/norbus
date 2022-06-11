DROP DATABASE IF EXISTS norbus ;
CREATE DATABASE norbus DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use norbus;

CREATE TABLE villes(
   id INT AUTO_INCREMENT,
   nom VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE trajets(
   id INT AUTO_INCREMENT,
   date_aller DATE NOT NULL,
   date_retour DATE,
   fk_arrivee_id INT NOT NULL,
   fk_depart_id INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(fk_arrivee_id) REFERENCES villes(id),
   FOREIGN KEY(fk_depart_id) REFERENCES villes(id)
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
   fk_trajet_id INT,
   fk_user_id INT,
--    id INT AUTO_INCREMENT NOT NULL,
   created_at DATETIME NOT NULL,
   updated_at DATETIME,
   couchette BOOLEAN NOT NULL,
   PRIMARY KEY(fk_trajet_id, fk_user_id),
   FOREIGN KEY(fk_trajet_id) REFERENCES trajets(id),
   FOREIGN KEY(fk_user_id) REFERENCES users(id)
);

CREATE VIEW view_trajets_villes AS
select t.id, CONCAT(v.nom, ' => ', va.nom) AS nom from trajets t join villes v ON (t.fk_depart_id = v.id ) join villes va ON t.fk_arrivee_id = va.id;
