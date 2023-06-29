USE group22;

CREATE TABLE DEPARTEMENT(
    NOM VARCHAR(50),
    BUDGET DECIMAL(10, 2) CHECK (BUDGET >= 0),
    PRIMARY KEY(NOM));
--
INSERT INTO DEPARTEMENT (
    NOM,
    BUDGET
    )
VALUES (
    'INF',
    50000
    ),
    (
    'MATH',
    NULL
    ),
    (
    'PHYS',
    120000
    );
--
    
CREATE TABLE FONCTION(
    NOM VARCHAR(50),
    TAUX_HORAIRE DECIMAL(10, 2) CHECK (TAUX_HORAIRE >= 0),
    PRIMARY KEY(NOM));
--
INSERT INTO FONCTION (
    NOM,
    TAUX_HORAIRE
    )
VALUES (
    'Assistant chercheur',
    75
    ),
    (
    'Chercheur',
    100
    ),
    (
    'Developpeur',
    60
    );
--
    
CREATE TABLE EMPLOYE(
    NO INT NOT NULL,
    NOM VARCHAR(50) NOT NULL,
    NOM_DEPARTEMENT VARCHAR(50),
    NOM_FONCTION VARCHAR(50),
    PRIMARY KEY(NO),
    FOREIGN KEY(NOM_DEPARTEMENT) REFERENCES DEPARTEMENT(NOM),
    FOREIGN KEY(NOM_FONCTION) REFERENCES FONCTION(NOM));
--
INSERT INTO EMPLOYE (
    NO,
    NOM,
    NOM_DEPARTEMENT,
    NOM_FONCTION
    )
VALUES (
    7777,
    'DEBRUYNE',
    'INF',
    'Chercheur'
    ),
    (
    8105,
    'JANSSENS',
    'MATH',
    'Developpeur'
    ),
    (
    8221,
    'SERNEELS',
    'PHYS',
    'Chercheur'
    ),
    (
    8467,
    'VRANCKEN',
    'INF',
    'Developpeur'
    ),
    (
    8823,
    'JANSSENS',
    'PHYS',
    'Chercheur'
    ),
    (
    8829,
    'FLERACKER',
    'PHYS',
    'Assistant chercheur'
    ),
    (
    8845,
    'THIENPONDT',
    NULL,
    NULL
    ),
    (
    8888,
    'MERCURY',
    'INF',
    'Developpeur'
    );
--
    
CREATE TABLE PROJET(
    NOM VARCHAR(50) NOT NULL,
    DEPARTEMENT VARCHAR(50) NOT NULL,
    DATE_DEBUT DATE,
    CHEF INT,
    BUDGET DECIMAL(10, 2) CHECK (BUDGET >= 0),
    COUT DECIMAL(10, 2) CHECK (COUT >= 0),
    DATE_FIN DATE, 
    CHECK (DATE_FIN >= DATE_DEBUT),
    PRIMARY KEY(NOM),
    FOREIGN KEY(DEPARTEMENT) REFERENCES DEPARTEMENT(NOM),
    FOREIGN KEY(CHEF) REFERENCES EMPLOYE(NO));
--
INSERT INTO PROJET (
    NOM,
    DEPARTEMENT,
    DATE_DEBUT,
    CHEF,
    BUDGET,
    COUT,
    DATE_FIN
    )
VALUES (
    'DIDACT',
    'INF',
    '2022-01-01',
    8467,
    3000,
    3100,
    '2022-02-28'
    ),
    (
    'INF-SYST',
    'INF',
    '2021-09-01',
    8467,
    5500,
    5000,
    '2021-12-31'
    ),
    (
    'MED-STAT',
    'MATH',
    '2022-01-01',
    8105,
    2000,
    1000,
    '2022-02-28'
    ),
    (
    'STOCH',
    'PHYS',
    '2022-03-01',
    8105,
    4500,
    NULL,
    NULL
    );
--
    
CREATE TABLE EVALUATION(
    PROJET VARCHAR(50) NOT NULL,
    EXPERT INT,
    COMMENTAIRES VARCHAR(2000),
    AVIS VARCHAR(1000),
    PRIMARY KEY(PROJET),
    FOREIGN KEY(PROJET) REFERENCES PROJET(NOM),
    FOREIGN KEY(EXPERT) REFERENCES EMPLOYE(NO));
--
INSERT INTO EVALUATION (
    PROJET,
    EXPERT,
    COMMENTAIRES,
    AVIS
    )
VALUES (
    'DIDACT',
    7777,
    'Duis efficitur urna erat, vel convallis mauris aliquet non. Praesent aliquam leo vitae lorem mattis, nec egestas tellus convallis. Aenean vestibulum condimentum auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam congue leo elit, in cursus tortor scelerisque quis. Quisque dapibus nulla tellus, ac eleifend massa auctor non. Duis a rhoncus orci. Sed at fringilla arcu, vitae molestie purus. Nulla lacinia ante a urna tincidunt feugiat. Nullam risus tortor, mollis vel justo sit amet, dictum fermentum libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin fringilla, nunc tempor sollicitudin suscipit, quam ante maximus magna, eleifend elementum nunc odio quis massa.',
    'SUCCES'
    ),
    (
    'INF-SYST',
    8221,
    'Vestibulum eget leo et est rhoncus egestas. Ut ut justo a turpis maximus imperdiet. Curabitur pretium porttitor urna. Mauris iaculis sem felis, sed dignissim felis lacinia nec. Cras pharetra turpis dolor, nec volutpat purus fermentum a. Vivamus ut viverra sapien. Ut vestibulum eros quis commodo finibus. Proin quis purus justo. Suspendisse in ex ac velit facilisis euismod. Sed id magna ultricies, elementum dui vel, sodales purus.',
    'SUCCES'
    ),
    (
    'MED-STAT',
    7777,
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quam ligula, lobortis id dignissim a, suscipit in lorem. Donec aliquam dui non ex sollicitudin, a scelerisque enim tincidunt. Cras mollis lacus eget libero rhoncus, non viverra nunc semper. Phasellus interdum dapibus ligula sed rhoncus. Donec velit libero, convallis at elit eu, varius mollis massa. Aenean aliquet maximus quam id rutrum. Ut auctor congue nisl, vel facilisis mauris fermentum sed. Proin cursus suscipit enim, id lobortis elit iaculis at. Aenean ligula erat, sodales at urna ac, volutpat sollicitudin massa. Maecenas vel quam id lorem elementum fermentum. Nam faucibus dolor elit, semper rutrum leo molestie vel. Curabitur at lectus vitae risus finibus tristique ornare eget nisl.',
    'ECHEC'
    );
--
    
CREATE TABLE TACHE(
    EMPLOYE INT NOT NULL,
    PROJET VARCHAR(50) NOT NULL,
    NOMBRE_HEURES INT CHECK (NOMBRE_HEURES >= 0),
    PRIMARY KEY(EMPLOYE, PROJET),
    FOREIGN KEY(EMPLOYE) REFERENCES EMPLOYE(NO),
    FOREIGN KEY(PROJET) REFERENCES PROJET(NOM));
--
INSERT INTO TACHE (
    EMPLOYE,
    PROJET,
    NOMBRE_HEURES
    )
VALUES (
    8105,'INF-SYST',25
    ),
    (
    8221,'DIDACT',7
    ),
    (
    8221,'MED-STAT',1
    ),
    (
    8467,'MED-STAT',15
    ),
    (
    8467,'STOCH',10
    ),
    (
    8823,'INF-SYST',20
    ),
    (
    8829,'DIDACT',32
    ),
    (
    8829,'INF-SYST',20
    ),
    (
    8829,'STOCH',NULL
    ),
    (
    8888,'STOCH',3
    );
--
    
CREATE TABLE RAPPORT(
    EMPLOYE INT NOT NULL,
    PROJET VARCHAR(50) NOT NULL,
    TITRE VARCHAR(500) NOT NULL,
    PRIMARY KEY(TITRE),
    FOREIGN KEY(EMPLOYE) REFERENCES TACHE(EMPLOYE),
    FOREIGN KEY(PROJET) REFERENCES TACHE(PROJET));
--
INSERT INTO RAPPORT (
    EMPLOYE,
    PROJET,
    TITRE
    )
VALUES (
    8221,
    'MED-STAT',
    'MED-STAT Experimental Results'
    ),
    (
    8467,
    'MED-STAT',
    'MED-STAT Development Report'
    ),
    (
    8467,
    'STOCH',
    'STOCH: Implementation Report'
    );
--
    
CREATE TABLE MOTS_CLES(
    RAPPORT VARCHAR(500) NOT NULL,
    MOT_CLE VARCHAR(50) NOT NULL,
    PRIMARY KEY(RAPPORT, MOT_CLE),
    FOREIGN KEY(RAPPORT) REFERENCES RAPPORT(TITRE));
--
INSERT INTO MOTS_CLES (
    RAPPORT,
    MOT_CLE
    )
VALUES (
    'MED-STAT Development Report',
    'C++'
    ),
    (
    'MED-STAT Development Report',
    'Matlab'
    ),
    (
    'MED-STAT Experimental Results',
    'Excel'
    ),
    (
    'MED-STAT Experimental Results',
    'Jupyter'
    ),
    (
    'MED-STAT Experimental Results',
    'Science'
    ),
    (
    'STOCH: Implementation Report',
    'Implementation'
    ),
    (
    'STOCH: Implementation Report',
    'Java'
    ),
    (
    'STOCH: Implementation Report',
    'Scheme'
    );