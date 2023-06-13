CREATE VIEW itemview AS
SELECT items.* , categories.* FROM items 
INNER JOIN  categories on  items.items_categories = categories.categories_id
