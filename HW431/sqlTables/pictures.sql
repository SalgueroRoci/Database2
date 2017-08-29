use cs431s29; 

DROP TABLE IF EXISTS PHOTOS;

CREATE TABLE IF NOT EXISTS PHOTOS (
PhotoName varchar(30) NOT NULL, 
caption varchar(100), 
photodata varchar(80), 
Username varchar(32) NOT NULL,
PRIMARY KEY(photodata)
);

show columns from PHOTOS;
