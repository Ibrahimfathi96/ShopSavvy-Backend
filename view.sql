CREATE OR REPLACE VIEW itemsview1 AS
SELECT items.* , categories.* FROM items 
INNER JOIN  categories on  items.items_categories = categories.categories_id

CREATE OR REPLACE VIEW myfavorite AS 
SELECT favorite.* , items.* , users.users_id FROM favorite
INNER JOIN users ON users.users_id = favorite.favorite_users_id
INNER JOIN items ON items.items_id = favorite.favorite_items_id
