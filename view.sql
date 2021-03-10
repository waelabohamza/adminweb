CREATE VIEW servciesview AS 
SELECT services.* , categories.* FROM `services`
INNER JOIN categories ON categories.categories_id = services.services_categories

CREATE VIEW coursesview AS 
SELECT courses.* , catcourses.* FROM courses 
INNER JOIN catcourses ON catcourses.catcourses_id = courses.courses_type


CREATE VIEW expertsview AS 
SELECT experts.* , catexperts.* from experts 
INNER JOIN catexperts ON catexperts.catexperts_id = experts.experts_cat



