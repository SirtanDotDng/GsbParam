#------------------------------------------------------------
# Table: Produit
#------------------------------------------------------------

CREATE TABLE Produit(
        ID          Int  Auto_increment  NOT NULL ,
        Nom         Varchar (128) NOT NULL ,
        Image       Varchar (128) NOT NULL ,
        Description Varchar (512) NOT NULL ,
        Quantite    Int NOT NULL
	,CONSTRAINT Produit_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Contenance
#------------------------------------------------------------

CREATE TABLE Contenance(
        ID       Int  Auto_increment  NOT NULL ,
        Unite    Varchar (128) NOT NULL ,
        Quantite Float NOT NULL
	,CONSTRAINT Contenance_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Catégorie
#------------------------------------------------------------

CREATE TABLE Categorie(
        ID   Int  Auto_increment  NOT NULL ,
        Code Varchar (128) NOT NULL ,
        Nom  Varchar (128) NOT NULL
	,CONSTRAINT Categorie_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Marque
#------------------------------------------------------------

CREATE TABLE Marque(
        ID  Int  Auto_increment  NOT NULL ,
        Nom Varchar (128) NOT NULL
	,CONSTRAINT Marque_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Client
#------------------------------------------------------------

CREATE TABLE Client(
        ID          Int  Auto_increment  NOT NULL ,
        Nom         Varchar (128) NOT NULL ,
        Prenom      Varchar (128) NOT NULL ,
        Telephone   Varchar (32) NOT NULL ,
        Code_Postal Varchar (5) NOT NULL ,
        Ville       Varchar (128) NOT NULL ,
        Adresse     Varchar (128) NOT NULL ,
        Mail        Varchar (128) NOT NULL ,
        Password    Varchar (512) NOT NULL
	,CONSTRAINT Client_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Note
#------------------------------------------------------------

CREATE TABLE Note(
        ID         Int  Auto_increment  NOT NULL ,
        Note       Int NOT NULL ,
        ID_Produit Int NOT NULL ,
        ID_Client  Int NOT NULL
	,CONSTRAINT Note_PK PRIMARY KEY (ID)

	,CONSTRAINT Note_Produit_FK FOREIGN KEY (ID_Produit) REFERENCES Produit(ID)
	,CONSTRAINT Note_Client0_FK FOREIGN KEY (ID_Client) REFERENCES Client(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commande
#------------------------------------------------------------

CREATE TABLE Commande(
        ID        Int  Auto_increment  NOT NULL ,
        Date      Date NOT NULL ,
        Statut    Int NOT NULL ,
        ID_Client Int NOT NULL
	,CONSTRAINT Commande_PK PRIMARY KEY (ID)

	,CONSTRAINT Commande_Client_FK FOREIGN KEY (ID_Client) REFERENCES Client(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Rôles
#------------------------------------------------------------

CREATE TABLE Roles(
        ID  Int  Auto_increment  NOT NULL ,
        Nom Varchar (128) NOT NULL
	,CONSTRAINT Roles_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Salarié
#------------------------------------------------------------

CREATE TABLE Salarie(
        ID          Int  Auto_increment  NOT NULL ,
        Nom         Varchar (128) NOT NULL ,
        Prenom      Varchar (128) NOT NULL ,
        Telephone   Varchar (32) NOT NULL ,
        Code_Postal Varchar (5) NOT NULL ,
        Ville       Varchar (128) NOT NULL ,
        Adresse     Varchar (128) NOT NULL ,
        Mail        Varchar (128) NOT NULL ,
        Password    Varchar (512) NOT NULL
	,CONSTRAINT Salarie_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Suggerer
#------------------------------------------------------------

CREATE TABLE Suggerer(
        ID         Int NOT NULL ,
        ID_Produit Int NOT NULL
	,CONSTRAINT Suggerer_PK PRIMARY KEY (ID,ID_Produit)

	,CONSTRAINT Suggerer_Produit_FK FOREIGN KEY (ID) REFERENCES Produit(ID)
	,CONSTRAINT Suggerer_Produit0_FK FOREIGN KEY (ID_Produit) REFERENCES Produit(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Produire
#------------------------------------------------------------

CREATE TABLE Produire(
        ID        Int NOT NULL ,
        ID_Marque Int NOT NULL
	,CONSTRAINT Produire_PK PRIMARY KEY (ID,ID_Marque)

	,CONSTRAINT Produire_Produit_FK FOREIGN KEY (ID) REFERENCES Produit(ID)
	,CONSTRAINT Produire_Marque0_FK FOREIGN KEY (ID_Marque) REFERENCES Marque(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Appartenir
#------------------------------------------------------------

CREATE TABLE Appartenir(
        ID         Int NOT NULL ,
        ID_Produit Int NOT NULL
	,CONSTRAINT Appartenir_PK PRIMARY KEY (ID,ID_Produit)

	,CONSTRAINT Appartenir_Categorie_FK FOREIGN KEY (ID) REFERENCES Categorie(ID)
	,CONSTRAINT Appartenir_Produit0_FK FOREIGN KEY (ID_Produit) REFERENCES Produit(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Concerner
#------------------------------------------------------------

CREATE TABLE Concerner(
        ID         Int NOT NULL ,
        ID_Produit Int NOT NULL
	,CONSTRAINT Concerner_PK PRIMARY KEY (ID,ID_Produit)

	,CONSTRAINT Concerner_Commande_FK FOREIGN KEY (ID) REFERENCES Commande(ID)
	,CONSTRAINT Concerner_Produit0_FK FOREIGN KEY (ID_Produit) REFERENCES Produit(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Habiliter
#------------------------------------------------------------

CREATE TABLE Habiliter(
        ID       Int NOT NULL ,
        ID_Roles Int NOT NULL
	,CONSTRAINT Habiliter_PK PRIMARY KEY (ID,ID_Roles)

	,CONSTRAINT Habiliter_Salarie_FK FOREIGN KEY (ID) REFERENCES Salarie(ID)
	,CONSTRAINT Habiliter_Roles0_FK FOREIGN KEY (ID_Roles) REFERENCES Roles(ID)
)ENGINE=InnoDB;

