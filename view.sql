CREATE OR REPLACE VIEW itemsview1 AS
SELECT items.* , categories.* FROM items 
INNER JOIN  categories on  items.items_categories = categories.categories_id

CREATE OR REPLACE VIEW myfavorite AS 
SELECT favorite.* , items.* , users.users_id FROM favorite
INNER JOIN users ON users.users_id = favorite.favorite_users_id
INNER JOIN items ON items.items_id = favorite.favorite_items_id

CREATE OR REPLACE VIEW cartview AS
SELECT SUM(items.items_price - (items.items_price * (items.items_discount/100))) AS itemsprice, COUNT(cart_items_id) AS itemscount, cart.* , items.* FROM cart
INNER JOIN items ON items.items_id = cart.cart_items_id
GROUP BY cart.cart_items_id, cart.cart_user_id
