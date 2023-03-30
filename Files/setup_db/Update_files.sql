 CREATE TABLE Files(
   ID_file INT AUTO_INCREMENT,
   ID_attaque INT NOT NULL,
   file_path VARCHAR(1000),
   PRIMARY KEY(ID_file),
   FOREIGN KEY(ID_attaque) REFERENCES Attaque(ID_attaque)
 )