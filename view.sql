CREATE VIEW servciesview AS 
SELECT services.* , categories.* FROM `services`
INNER JOIN categories ON categories.categories_id = services.services_categories

