
CREATE DATABASE wf3_php_intermediaire_pauline;
USE wf3_php_intermediaire_pauline;
CREATE TABLE advert(

    id int(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title varchar(150) NOT NULL,
    description text NOT NULL,
    postal_code int(5) NOT NULL,
    city TEXT NOT NULL,
    type TEXT NOT NULL,
    price double(7,2) NOT NULL,
    reservation_message TEXT DEFAULT NULL

)ENGINE=InnoDB charset=UTF8;


INSERT INTO advert (id, title, description, postal_code, city, type, price, reservation_message) VALUES
(1, 'Bel appartement', ' Haussmannien lumineux, à proximité des transports en commun', 75009, 'Paris', 'location', '700', 'ici le futur message de reservation'),
(2, 'Studio 21m carré', 'rez-de-chaussée et voisins bruyants', 75013, 'Paris', 'location', '500', 'ici le futur message de reservation'),
(3, 'Collocation urgente', 'appartement 6eme étage', 75018, 'Paris', 'location', '850', 'ici le futur message de reservation');

/*

mysql> SELECT * FROM advert;
+----+---------------------+----------------------------------------------------------------+-------------+-------+----------+--------+---------------------+
| id | title               | description                                                    | postal_code | city  | type     | price  | reservation_message |
+----+---------------------+----------------------------------------------------------------+-------------+-------+----------+--------+---------------------+
|  1 | Bel appartement     |  Haussmannien lumineux, à proximité des transports en commun   |       75009 | Paris | location | 700.00 |                     |
|  2 | Studio 21m carré    | rez-de-chaussée et voisins bruyants                            |       75013 | Paris | location | 500.00 |                     |
|  3 | Collocation urgente | appartement 6eme étage                                         |       75018 | Paris | location | 850.00 |                     |
+----+---------------------+----------------------------------------------------------------+-------------+-------+----------+--------+---------------------+
3 rows in set (0,00 sec)

*/
