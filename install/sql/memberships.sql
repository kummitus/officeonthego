CREATE TABLE memberships (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  g_id int NOT NULL,
  u_id int NOT NULL,
  FOREIGN KEY (g_id) REFERENCES groups(id),
  FOREIGN KEY (u_id) REFERENCES users(id)
);
