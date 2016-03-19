CREATE TABLE bills (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  u_id int NOT NULL,
  company varchar(255) NOT NULL,
  sum double NOT NULL,
  info mediumtext,
  FOREIGN KEY (u_id) REFERENCES users(id)
);
