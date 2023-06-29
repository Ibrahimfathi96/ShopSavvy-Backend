CREATE OR REPLACE VIEW ITEMSVIEW1 AS
    SELECT
        ITEMS.*,
        CATEGORIES.*
    FROM
        ITEMS
        INNER JOIN CATEGORIES
        ON ITEMS.ITEMS_CATEGORIES = CATEGORIES.CATEGORIES_ID CREATE
        OR REPLACE VIEW MYFAVORITE AS
        SELECT
            FAVORITE.*,
            ITEMS.*,
            USERS.USERS_ID
        FROM
            FAVORITE
            INNER JOIN USERS
            ON USERS.USERS_ID = FAVORITE.FAVORITE_USERS_ID
            INNER JOIN ITEMS
            ON ITEMS.ITEMS_ID = FAVORITE.FAVORITE_ITEMS_ID CREATE
            OR REPLACE VIEW CARTVIEW AS
            SELECT
                SUM(ITEMS.ITEMS_PRICE - (ITEMS.ITEMS_PRICE * (ITEMS.ITEMS_DISCOUNT/100))) AS ITEMSPRICE,
                COUNT(CART_ITEMS_ID) AS ITEMSCOUNT,
                CART.*,
                ITEMS.*
            FROM
                CART
                INNER JOIN ITEMS
                ON ITEMS.ITEMS_ID = CART.CART_ITEMS_ID
            WHERE
                CART_ORDERS = 0
            GROUP BY
                CART.CART_ITEMS_ID,
                CART.CART_USER_ID,
                CART.CART_ORDERS CREATE
                OR REPLACE VIEW ORDERSVIEW AS
                SELECT
                    ORDERS.*,
                    LOCATION.*
                FROM
                    ORDERS
                    LEFT JOIN LOCATION
                    ON LOCATION.LOCATION_ID = ORDERS.ORDERS_LOCATION CREATE
                    OR REPLACE VIEW ORDERSDETAILSVIEW AS
                    SELECT
                        SUM(ITEMS.ITEMS_PRICE - (ITEMS.ITEMS_PRICE * (ITEMS.ITEMS_DISCOUNT/100))) AS ITEMSPRICE,
                        COUNT(CART_ITEMS_ID) AS ITEMSCOUNT,
                        CART.*,
                        ITEMS.*,
                        ORDERSVIEW.*
                    FROM
                        CART
                        INNER JOIN ITEMS
                        ON ITEMS.ITEMS_ID = CART.CART_ITEMS_ID
                        INNER JOIN ORDERSVIEW
                        ON ORDERSVIEW.ORDERS_ID = CART.CART_ORDERS
                    WHERE
                        CART_ORDERS != 0
                    GROUP BY
                        CART.CART_ITEMS_ID,
                        CART.CART_USER_ID