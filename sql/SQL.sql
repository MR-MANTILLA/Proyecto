CREATE DATABASE componentes;

/*CREATE TABLE listado(
    pz_referencia varchar(20) NOT NULL,
    pz_motherboard varchar(100) NOT NULL,
    pz_procesador varchar(100) NOT NULL,
    pz_ram varchar(100) NOT NULL,
    pz_video varchar(100) NOT NULL,
    pz_fuente varchar(100) NOT NULL
    PRIMARY KEY (pz_referencia)
);

INSERT INTO listado VALUES(
	'450580044005700700',
    'Asrock B450',
    'Ryzen 7 5800X',
    '2x32Gb 4400Mhz',
    'RX 5700XT',
    '700w'
);*/

CREATE TABLE dependencia(
    dep_id integer not null,
    dep_nombre varchar(100) not null,
    primary key(dep_id)
);

INSERT into dependencia VALUES
    ('1','Gama Baja');
INSERT into dependencia VALUES
    ('2','Gama Media');
INSERT into dependencia VALUES
    ('3','Gama Alta');
INSERT into dependencia VALUES
    ('4','Gama Ultra');

    CREATE TABLE listado(
    pz_referencia varchar(30) NOT NULL,
    pz_motherboard varchar(100) NOT NULL,
    pz_procesador varchar(100) NOT NULL,
    pz_ram varchar(100) NOT NULL,
    pz_video varchar(100) NOT NULL,
    pz_fuente varchar(100) NOT NULL,
    pz_dependencia_id integer not null,
    PRIMARY KEY (pz_referencia),
    FOREIGN KEY (pz_dependencia_id) REFERENCES dependencia(dep_id)
    );

INSERT INTO listado VALUES
('55059506444006900800','Asrock B550','Ryzen 7 5950X','2x32Gb 4400Mhz','Taichi RX 6900XT','800w','4');

INSERT INTO listado VALUES
('570595012846003090800','Asrock B550','Ryzen 7 5950X','4x32Gb 4600Mhz','RTX 3090 FE','800w','4');

INSERT INTO listado VALUES
('450560012836002080800','Asus B450','Ryzen 5 5600X','4x32Gb 3600Mhz','Rog Strix RTX 2080 Ti','800w','3');