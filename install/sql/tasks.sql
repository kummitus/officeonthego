CREATE TABLE tasks (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  g_id int NOT NULL,
  p_id int NOT NULL,
  name varchar(255) NOT NULL,
  info mediumtext,
  FOREIGN KEY (g_id) REFERENCES groups(id),
  FOREIGN KEY (p_id) REFERENCES places(id)
);
