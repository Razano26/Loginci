 CREATE TABLE Users(
   ID_Utilisateur INT AUTO_INCREMENT,
   Name_Account VARCHAR(50) NOT NULL,
   Nom VARCHAR(50),
   Prenom VARCHAR(50),
   Email VARCHAR(50),
   Privilege BOOLEAN,
   PRIMARY KEY(ID_Utilisateur),
   UNIQUE(Name_Account)
);
 CREATE TABLE Etat(
   ID_Etat INT AUTO_INCREMENT,
   Name_Etat VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_Etat)
);
 CREATE TABLE Results(
   ID_Results INT AUTO_INCREMENT,
   Name_Results VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_Results)
);
 CREATE TABLE Detection(
   ID_Detection INT AUTO_INCREMENT,
   Name_Detection VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_Detection)
);
 CREATE TABLE Type(
   ID_Type INT AUTO_INCREMENT,
   Name_Type VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_Type)
);
 CREATE TABLE Attaque(
   ID_attaque INT AUTO_INCREMENT,
   Att_Date DATE,
   Qui_Quoi VARCHAR(5000),
   Description VARCHAR(5000),
   PPLS BOOLEAN,
   React VARCHAR(5000),
   ID_Results INT NOT NULL,
   ID_Etat INT NOT NULL,
   ID_Detection INT NOT NULL,
   ID_Utilisateur INT NOT NULL,
   ID_Type INT NOT NULL,
   PRIMARY KEY(ID_attaque),
   FOREIGN KEY(ID_Results) REFERENCES Results(ID_Results),
   FOREIGN KEY(ID_Etat) REFERENCES Etat(ID_Etat),
   FOREIGN KEY(ID_Detection) REFERENCES Detection(ID_Detection),
   FOREIGN KEY(ID_Utilisateur) REFERENCES Users(ID_Utilisateur),
   FOREIGN KEY(ID_Type) REFERENCES Type(ID_Type)
);
  CREATE TABLE Value_ref(
    ID_Value INT AUTO_INCREMENT,
    Name_Value VARCHAR(50),
    Data_Value INT,
    PRIMARY KEY(ID_Value)
  );