use norbus;

select t.*, v.nom "ville_depart", va.nom "vile arrivée" from trajets t join villes v ON (t.depart_id = v.id ) join villes va ON t.arrivee_id = va.id;

CREATE VIEW view_trajets_villes AS
select t.id, v.nom "ville_depart", va.nom "vile arrivée" from trajets t join villes v ON (t.depart_id = v.id ) join villes va ON t.arrivee_id = va.id;

CREATE VIEW view_trajets_villes AS
select t.id, CONCAT(v.nom, ' => ', va.nom) AS nom from trajets t join villes v ON (t.depart_id = v.id ) join villes va ON t.arrivee_id = va.id;

