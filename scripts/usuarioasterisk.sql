CREATE USER 'asterisk'@'localhost' IDENTIFIED BY 'asterisk'; 
GRANT USAGE ON * . * TO 'asterisk'@'localhost' IDENTIFIED BY 'asterisk' 
WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR
0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;
GRANT ALL PRIVILEGES ON `asterisk` . * TO 'asterisk'@'localhost';
