CREATE TABLE admins (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  u_id int NOT NULL,
  level int NOT NULL,
  FOREIGN KEY (u_id) REFERENCES users(id)
);
