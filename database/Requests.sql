SELECT
        c.id_contact, c.code_name, c2.country_id, c3.name
FROM
        contacts AS c
INNER JOIN
        characters c2 on c.id_contact = c2.id_character
INNER JOIN
        countrys c3 on c2.country_id = c3.id_country
WHERE country_id = 'AGT';

SELECT
    t.id_target, t.code_name, c.country_id
FROM
    targets AS t
INNER JOIN
    characters c on t.id_target = c.id_character
WHERE country_id != 'AMK';


SELECT
    a.id_agent, a.id_code as 'Nom de code', c.first_name as 'Prénom',  c.last_name as 'Nom', c2.name as 'Country'
FROM
    agents as a
INNER JOIN agents_skills as a2 on a.id_agent = a2.agent_id
INNER JOIN characters c on a.id_agent = c.id_character
INNER JOIN countrys c2 on c.country_id = c2.id_country
WHERE a2.skill_id = 2;
