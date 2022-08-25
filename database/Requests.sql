use amsw;
SELECT m.title, m.description, m.code_name, c.name, s.name, mt.name, m.start_date, m.end_date, ms.status
FROM mission as m
         INNER JOIN country as c on m.country_id = c.id
         INNER JOIN skill as s on m.skill_id = s.id
         INNER JOIN mission_type as mt on m.mission_type_id = mt.id
         INNER JOIN mission_status as ms on m.status_id = ms.id;

SELECT p.first_name as 'prénom', p.last_name as 'nom', a.id_code as 'nom de code' from agent a INNER JOIN person p on a.agent_id = p.id;

SELECT p.first_name as 'prénom', p.last_name as 'nom', c.code_name as 'nom de code', c.profession from contact c inner join person p on c.contact_id = p.id;

SELECT p.first_name as 'prénom', p.last_name as 'nom', t.code_name as 'nom de code' FROM target t INNER JOIN person p On t.target_id = p.id;

