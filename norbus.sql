


-- CREATE VIEW view_trajets_villes AS
-- select t.id, CONCAT(v.nom, ' => ', va.nom) AS nom from trajets t join villes v ON (t.fk_depart_id = v.id ) join villes va ON t.fk_arrivee_id = va.id;