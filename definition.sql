-- Authors: Carlos Carrillo and Marina Kaufman
-- CS_467_OSU
-- Date:   04/19/2016
-- Description: Queries to create the tables needed


-- DROP TABLES IN PROPER ORDER
DROP TABLE IF EXISTS admins;
DROP TABLE IF EXISTS images;
DROP TABLE IF EXISTS users;


CREATE TABLE users (
    	id INT(11) NOT NULL AUTO_INCREMENT,
    	first_name VARCHAR(255) NOT NULL,
    	last_name VARCHAR(255) NOT NULL,
    	email VARCHAR(255) NOT NULL,
    	password VARCHAR(255) NOT NULL,
    	city VARCHAR(255) NOT NULL,
    	state VARCHAR(255),
    	country VARCHAR(255) NOT NULL,
    	PRIMARY KEY (id),
    	UNIQUE (email, password)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO users (first_name, last_name, email, password, city, state, country)
VALUES
    ('Sara', 'Smith', 'sarasmith@gmail.com', 'saraSmith23', 'Miami', 'FL', 'USA'),
    ('David', 'Atkins', 'davidatkins@hotmail.com', 'Davidatkins789', 'Corvallis', 'OR', 'USA'),
    ('Lauren', 'Jensen', 'laurenjensen@yahoo.es', 'Laurenjensen222','Milwaukee', 'WI', 'USA'),
    ('Carlos', 'Carrillo', 'cacarrilloc@hotmail.com', 'carrilca10', 'Chicago', 'IL', 'USA'),
    ('Donald', 'Sanders', 'sanders@gmail.com', 'donalsan47', 'Ottawa', 'Ontario', 'Canada'),
    ('Vicente', 'Fernandez', 'vicente58@yahoo.com', 'Vinfer765', 'Xalapa', 'Veracruz', 'Mexico'),
    ('Lorena', 'Gutierrez', 'morenita21@gmail.com', 'loreta42', 'Bogota', 'Cund', 'Colombia'),
    ('Tanner', 'England', 'englander@yahoo.uk', 'british64', 'London', 'York', 'UK'),
    ('Katie', 'Thompson', 'kaufmmar@oregonstate.edu', 'Katie74', 'Frankfurt', 'Eiswein', 'Germany'),
    ('Thomas', 'Roggers', 'sinrepresion@gmail.com', 'carlos04', 'Durban', 'Manutu', 'South Africa');


CREATE TABLE admins (
    	id INT(11) NOT NULL AUTO_INCREMENT,
    	first_name VARCHAR(255) NOT NULL,
    	last_name VARCHAR(255) NOT NULL,
    	email VARCHAR(255) NOT NULL,
    	password VARCHAR(255) NOT NULL,
    	PRIMARY KEY (id),
    	UNIQUE (email, password)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO admins (first_name, last_name, email, password)
VALUES
    ('Marina', 'Kaufman', 'kaufmmar@oregonstate.edu', 'MarinaK23'),
    ('Carlos', 'Carrillo', 'carrilca@oregonstate.edu', 'carrilca10'),
    ('Benjamin', 'Brewster', 'dbrewsteb@oregonstate.edu', 'Benjamin789'),
    ('Laura', 'Torres', 'laurentorr@yahoo.es', 'Laurentorr222');
    


CREATE TABLE images (
	id INT(11) NOT NULL AUTO_INCREMENT,
	user_email VARCHAR(255) NOT NULL,
	name VARCHAR(255),
	link VARCHAR(255) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (user_email) REFERENCES users (email)
        	ON DELETE CASCADE
        	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO images (user_email, name, link)
VALUES
    ('sarasmith@gmail.com', 'Mars', 'http://media.salon.com/2015/09/mars-614x412.jpg'),
    ('kaufmmar@oregonstate.edu', 'Moon', 'https://www.nasa.gov/sites/default/files/thumbnails/image/christmas2015fullmoon.jpg'),
    ('sinrepresion@gmail.com', 'Jupiter', 'https://www.nasa.gov/sites/default/files/jupiter_1_0.jpg'),
    ('kaufmmar@oregonstate.edu', 'Pluto', 'http://nineplanets.org/nh-charon-neutral-bright-release.jpg'),
    ('sinrepresion@gmail.com', 'Neptune', 'http://www.crystalinks.com/neptune-rings.jpg'),
    ('sarasmith@gmail.com', 'Jupiter', 'https://www.nasa.gov/sites/default/files/jupiter_1_0.jpg'),
    ('davidatkins@hotmail.com', 'Mars', 'http://media.salon.com/2015/09/mars-614x412.jpg'),
    ('laurenjensen@yahoo.es', 'Moon', 'https://www.nasa.gov/sites/default/files/thumbnails/image/christmas2015fullmoon.jpg'),
    ('cacarrilloc@hotmail.com', 'Mars', 'http://media.salon.com/2015/09/mars-614x412.jpg'),
    ('sanders@gmail.com', 'Jupiter', 'https://www.nasa.gov/sites/default/files/jupiter_1_0.jpg'),
    ('vicente58@yahoo.com', 'Pluto', 'http://nineplanets.org/nh-charon-neutral-bright-release.jpg'),
    ('morenita21@gmail.com', 'Neptune', 'http://www.crystalinks.com/neptune-rings.jpg'),
    ('englander@yahoo.uk', 'Moon', 'https://www.nasa.gov/sites/default/files/thumbnails/image/christmas2015fullmoon.jpg'),
    ('kaufmmar@oregonstate.edu', 'Neptune', 'http://www.crystalinks.com/neptune-rings.jpg'),
    ('sinrepresion@gmail.com', 'Pluto', 'http://nineplanets.org/nh-charon-neutral-bright-release.jpg'),
    ('sarasmith@gmail.com', 'Saturn', 'https://nssdc.gsfc.nasa.gov/planetary/image/saturn.jpg');

-- PRINT TABLES IN PROPER ORDER

SELECT * FROM users;
SELECT * FROM admins;
SELECT * FROM images;




