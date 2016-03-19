CREATE TABLE groups (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  a_id int NOT NULL,
  name varchar(255) NOT NULL,
  info mediumtext,
  active boolean NOT NULL,
  FOREIGN KEY (a_id) REFERENCES users(id)
);
