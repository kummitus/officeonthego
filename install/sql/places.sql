CREATE TABLE places (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  o_id int NOT NULL,
  name varchar(255) NOT NULL,
  address VARCHAR(255),
  city VARCHAR(255),
  FOREIGN KEY (o_id) REFERENCES owners(id)
);
