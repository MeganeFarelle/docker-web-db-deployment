CREATE TABLE IF NOT EXISTS demo (
  id INT NOT NULL AUTO_INCREMENT,
  message VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO demo (message)
VALUES ('Hello from Docker MySQL init');