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
   telephone VARCHAR(50)  NOT NULL,
   adresse VARCHAR(255)  NOT NULL,
   fk_ville_id INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(fk_ville_id) REFERENCES villes(id)
);

CREATE TABLE orders(
   id INT AUTO_INCREMENT,
   created_at DATETIME NOT NULL DEFAULT now(),
   date_aller DATE NOT NULL,
   date_retour DATE,
   bool_aller_retour BOOLEAN NOT NULL,
   adulte INT NOT NULL,
   enfant INT NOT NULL,
   fk_ville_arrivee_id INT,
   fk_ville_depart_id INT NOT NULL,
   fk_user_id INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(fk_ville_arrivee_id) REFERENCES villes(id),
   FOREIGN KEY(fk_ville_depart_id) REFERENCES villes(id),
   FOREIGN KEY(fk_user_id) REFERENCES users(id)
);

CREATE TABLE options(
   id INT AUTO_INCREMENT,
   nom VARCHAR(150)  NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE option_order(
   fk_option_id INT,
   fk_order_id INT,
   quantite INT NOT NULL DEFAULT 1,
   PRIMARY KEY(fk_option_id, fk_order_id),
   FOREIGN KEY(fk_option_id) REFERENCES options(id),
   FOREIGN KEY(fk_order_id) REFERENCES orders(id)
);


-- CREATE VIEW view_trajets_villes AS
-- select t.id, CONCAT(v.nom, ' => ', va.nom) AS nom from trajets t join villes v ON (t.fk_depart_id = v.id ) join villes va ON t.fk_arrivee_id = va.id;