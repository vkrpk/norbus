use norbus;

select t.*, v.nom "ville_depart", va.nom "vile arrivée" from trajets t join villes v ON (t.depart_id = v.id ) join villes va ON t.arrivee_id = va.id;



