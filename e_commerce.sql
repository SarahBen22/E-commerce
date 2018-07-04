#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: profil client
#------------------------------------------------------------

CREATE TABLE profil_client(
        id                Int  Auto_increment  NOT NULL ,
        civilite          Varchar (20) NOT NULL ,
        nom               Varchar (50) NOT NULL ,
        prenom            Varchar (50) NOT NULL ,
        date_de_naissance Datetime NOT NULL ,
        genre             Int NOT NULL ,
        adresse_postale   Varchar (50) NOT NULL ,
        telephone         Varchar (20) NOT NULL ,
        pseudo            Varchar (50) NOT NULL ,
        mdp               Varchar (50) NOT NULL ,
        admin             Numeric NOT NULL
	,CONSTRAINT profil_client_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: consoles
#------------------------------------------------------------

CREATE TABLE consoles(
        id          Int  Auto_increment  NOT NULL ,
        nom_console Varchar (50) NOT NULL
	,CONSTRAINT consoles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PEGI
#------------------------------------------------------------

CREATE TABLE PEGI(
        id  Int  Auto_increment  NOT NULL ,
        age Int NOT NULL
	,CONSTRAINT PEGI_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: produits
#------------------------------------------------------------

CREATE TABLE produits(
        id              Int  Auto_increment  NOT NULL ,
        Titre           Varchar (50) NOT NULL ,
        id_console      Int NOT NULL ,
        id_pegi         Int NOT NULL ,
        id_jeux         Int NOT NULL ,
        annee_de_sortie Year NOT NULL ,
        prix            Float NOT NULL ,
        stock           Int NOT NULL ,
        id_PEGI_limiter Int NOT NULL
	,CONSTRAINT produits_PK PRIMARY KEY (id)

	,CONSTRAINT produits_PEGI_FK FOREIGN KEY (id_PEGI_limiter) REFERENCES PEGI(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: type de jeux
#------------------------------------------------------------

CREATE TABLE type_de_jeux(
        id  Int  Auto_increment  NOT NULL ,
        nom Varchar (50) NOT NULL
	,CONSTRAINT type_de_jeux_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commandes
#------------------------------------------------------------

CREATE TABLE commandes(
        id               Int  Auto_increment  NOT NULL ,
        id_client        Int NOT NULL ,
        num_commande     Varchar (20) NOT NULL ,
        date_de_commande Varchar (20) NOT NULL ,
        id_profil_client Int NOT NULL
	,CONSTRAINT commandes_PK PRIMARY KEY (id)

	,CONSTRAINT commandes_profil_client_FK FOREIGN KEY (id_profil_client) REFERENCES profil_client(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: panier
#------------------------------------------------------------

CREATE TABLE panier(
        id          Int  Auto_increment  NOT NULL ,
        id_produit  Int NOT NULL ,
        id_commande Int NOT NULL
	,CONSTRAINT panier_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: paiement
#------------------------------------------------------------

CREATE TABLE paiement(
        id                Int  Auto_increment  NOT NULL ,
        type_de_paiement  Varchar (50) NOT NULL ,
        num_de_carte      Int NOT NULL ,
        date_d_expiration Datetime NOT NULL ,
        cryptogramme      Int NOT NULL ,
        nom_debiteur      Varchar (50) NOT NULL ,
        prenom_debiteur   Varchar (50) NOT NULL
	,CONSTRAINT paiement_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a
#------------------------------------------------------------

CREATE TABLE a(
        id          Int NOT NULL ,
        id_produits Int NOT NULL
	,CONSTRAINT a_PK PRIMARY KEY (id,id_produits)

	,CONSTRAINT a_type_de_jeux_FK FOREIGN KEY (id) REFERENCES type_de_jeux(id)
	,CONSTRAINT a_produits0_FK FOREIGN KEY (id_produits) REFERENCES produits(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: se lie
#------------------------------------------------------------

CREATE TABLE se_lie(
        id          Int NOT NULL ,
        id_produits Int NOT NULL
	,CONSTRAINT se_lie_PK PRIMARY KEY (id,id_produits)

	,CONSTRAINT se_lie_consoles_FK FOREIGN KEY (id) REFERENCES consoles(id)
	,CONSTRAINT se_lie_produits0_FK FOREIGN KEY (id_produits) REFERENCES produits(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contient
#------------------------------------------------------------

CREATE TABLE contient(
        id        Int NOT NULL ,
        id_panier Int NOT NULL
	,CONSTRAINT contient_PK PRIMARY KEY (id,id_panier)

	,CONSTRAINT contient_produits_FK FOREIGN KEY (id) REFERENCES produits(id)
	,CONSTRAINT contient_panier0_FK FOREIGN KEY (id_panier) REFERENCES panier(id)
)ENGINE=InnoDB;

