use cs431s29; 

DROP TABLE IF EXISTS USERS;
DROP TABLE IF EXISTS Mailbox; 

CREATE TABLE IF NOT EXISTS USERS (
UserFullName varchar(50) NOT NULL,
Username varchar(32) NOT NULL,
Password varchar(100) NOT NULL,
PRIMARY KEY (Username)
);

CREATE TABLE IF NOT EXISTS Mailbox (
MessageID numeric(3) NOT NULL, 
Subject varchar(50), 
MsgTime datetime, 
MsgText LONGTEXT, 
Sender varchar(32), 
Receiver varchar(32), 
StatMain enum("Read", "Deleted", "Unread"),  
StatusSent enum("Deleted", "Sent"), 
PRIMARY KEY(MessageID)
);

show columns from USERS;
show columns from Mailbox; 
