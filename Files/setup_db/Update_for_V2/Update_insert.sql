Insert into React (
    ID_attaque,
    ID_Utilisateur,
    Reaction,
    react_date
)
SELECT ID_attaque, ID_Utilisateur, React, Att_Date
FROM Attaque
WHERE React != "";

