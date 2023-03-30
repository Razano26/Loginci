Insert into Type (
    Name_Type
)
Value 
    ("Accès FTP"),
    ("Accès VPN"),
    ("Attaque Ddos"),
    ("Attaque sur les services externes"),
    ("Attaque sur les serveurs WEB"),
    ("Compromission de poste"),
    ("Compte Administrateur"),
    ("Compte utilisateur compromis"),
    ("Courrier Postal"),
    ("Email - Arnaque"),
    ("Email - Phishing / Malveillant"),
    ("Navigation Internet dangereuse"),
    ("Scan de robots"),
    ("Téléphonie Fixe"),
    ("Téléphonie Mobile"),
    ("Tentative d'accès à un compte sur le CLOUD"),
    ("Vague de phishing"),
    ("Violation utilisateur"),
    ("Virus trouvé"),
    ("Vol de Matériel IT")
;

Insert into Etat (
    Name_Etat
)

Value 
    ("Cloturé"),
    ("En cours")
;

Insert into Results (
    Name_Results
)

Value 
    ("En cours d'investigation"),
    ("Faux Positif"),
    ("Bloquée"),
    ("Réussie")
;


Insert into Detection (
    Name_Detection
)
Value 
    ("Antivirus Poste"),
    ("Antivirus Pare-feu"),
    ("Alerte extérieure"),
    ("IDS (Proxy)"),
    ("Investigation"),
    ("Scripts de vérification"),
    ("SIEM"),
    ("Solution Anti-Spam"),
    ("Utilisateur")
;

Insert into Users(
    ID_Utilisateur,
    Name_Account,
    Nom,
    Prenom,
    Email,
    Privilege
)
Value
    (1,'Import','Import','Import','Import@import.fr',0)

Insert into Value_ref(
    Name_Value,
    Data_Value
)
Value
    ('Dellai_anno',90)
