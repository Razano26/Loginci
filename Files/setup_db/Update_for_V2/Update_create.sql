 CREATE TABLE React(
   ID_react INT AUTO_INCREMENT,
   ID_attaque INT NOT NULL,
   ID_Utilisateur INT NOT NULL,
   Reaction VARCHAR(5000),
   react_date timestamp NOT NULL,
   PRIMARY KEY(ID_react),
   FOREIGN KEY(ID_Utilisateur) REFERENCES Users(ID_Utilisateur),
   FOREIGN KEY(ID_attaque) REFERENCES Attaque(ID_attaque)
 )