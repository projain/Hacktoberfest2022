Hi,
In order to run this file go to index.php and run it on a local host server.
Index.php is the frontend part and Handle.php is the backend part handling the database operations.

Run these SQL queries on your localhost before testing
CREATE DATABASE test;
GRANT ALL ON test.* to 'test'@'localhost' IDENTIFIED BY 'Asdf@1234';
GRANT ALL ON test.* to 'test'@'127.0.0.1' IDENTIFIED BY 'Asdf@1234';
Rest of the sql is included in test.sql
