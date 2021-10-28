

DROP TABLE IF EXISTS acceso_administrador;
CREATE TABLE acceso_administrador
(
id_admin INT(3) PRIMARY KEY AUTO_INCREMENT,
nombre_admin VARCHAR(50) NOT NULL,
correo_administrador VARCHAR(50) NOT NULL,
contrasena_administrador VARCHAR(32) NOT NULL,
hash VARCHAR(32) NOT NULL,
rol INT(10) NULL DEFAULT '2'
); 

DROP TABLE IF EXISTS empresas;
CREATE TABLE empresas
(
nit_empresa INT(5) PRIMARY KEY AUTO_INCREMENT,
nombre_empresa VARCHAR(50) NOT NULL,
descripcion_empresa VARCHAR(1000) NOT NULL,
numero_contacto VARCHAR(14) NOT NULL,
direccion VARCHAR (50) DEFAULT NULL,
id_tipo_empresa INT(8) DEFAULT NULL,
estado_produccion INT(1) DEFAULT 0,
fecha_de_registro DATETIME DEFAULT CURRENT_TIMESTAMP()
);

DROP TABLE IF EXISTS productos;
CREATE TABLE productos 
(
id_producto INT(8) PRIMARY KEY AUTO_INCREMENT,
nombre_producto VARCHAR(50) NOT NULL,
id_tipo_producto INT(8) NOT NULL,
nit_empresa INT(5) NOT NULL,
fecha_de_registro DATETIME DEFAULT CURRENT_TIMESTAMP()
);

DROP TABLE IF EXISTS tipo_empresa;
CREATE TABLE tipo_empresa
(
id_tipo_empresa INT(8) PRIMARY KEY AUTO_INCREMENT,
tipo_empresa VARCHAR(30) NOT NULL,
fecha_de_registro DATETIME DEFAULT CURRENT_TIMESTAMP()
); 

DROP TABLE IF EXISTS tipo_producto;
CREATE TABLE tipo_producto
(
id_tipo_producto INT(8)  PRIMARY KEY,
Tipo_producto VARCHAR(30)  NOT NULL,
fecha_de_registro DATETIME DEFAULT CURRENT_TIMESTAMP()
);

DROP TABLE IF EXISTS pro_imagenes;
CREATE TABLE pro_imagenes
(
cod_imagen INT(11) PRIMARY KEY AUTO_INCREMENT,
imagen VARCHAR(300) DEFAULT '../img/producto/producto_fon.png',
id_productos INT(11) DEFAULT NULL
);

DROP TABLE IF EXISTS gal_imagenes;
CREATE TABLE gal_imagenes
(
cod_imagen INT(11) PRIMARY KEY AUTO_INCREMENT,
imagen VARCHAR(300) DEFAULT '../img/empresas/empresa_fon.png',
nit_empresa INT(5) DEFAULT NULL
);

DROP TABLE IF EXISTS informe;
CREATE TABLE informe
(
indice VARCHAR(50) NULL,
sub_indice VARCHAR(50) NULL,
li VARCHAR(90) NULL,
li2 VARCHAR(90) NULL,
li3 VARCHAR(90) NULL,
li4 VARCHAR(90) NULL,
text VARCHAR(1000) NULL,
text2 VARCHAR(1000) NULL,
text3 VARCHAR(1000) NULL,
text4 VARCHAR(1000) NULL,
text5 VARCHAR(1000) NULL,
text6 VARCHAR(1000) NULL
);

ALTER TABLE empresas DROP FOREIGN KEY if EXISTS fk_seg_empresas;
ALTER TABLE empresas
ADD CONSTRAINT tipo_em
FOREIGN KEY (id_tipo_empresa)
REFERENCES tipo_empresa(id_tipo_empresa)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE gal_imagenes DROP FOREIGN KEY if EXISTS fk_seg_empresas_img;
ALTER TABLE gal_imagenes
ADD CONSTRAINT fk_seg_empresas_img
FOREIGN KEY (nit_empresa)
REFERENCES empresas(nit_empresa)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE productos DROP FOREIGN KEY if EXISTS fk_seg_productos;
ALTER TABLE productos
ADD CONSTRAINT fk_seg_productos
FOREIGN KEY (nit_empresa)
REFERENCES empresas(nit_empresa)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE pro_imagenes DROP FOREIGN KEY if EXISTS fk_seg_img;
ALTER TABLE pro_imagenes
ADD CONSTRAINT fk_seg_img
FOREIGN KEY (id_productos)
REFERENCES productos(id_producto)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE productos DROP FOREIGN KEY if EXISTS FK_productos_tipo_producto;
ALTER TABLE productos
ADD CONSTRAINT FK_productos_tipo_producto
FOREIGN KEY (id_tipo_producto)
REFERENCES tipo_producto(id_tipo_producto)
ON UPDATE CASCADE
ON DELETE CASCADE;

DROP VIEW IF EXISTS vi_empresas;
CREATE VIEW vi_empresas AS
SELECT 
t1.nit_empresa, t1.nombre_empresa, t2.tipo_empresa, t3.imagen
FROM empresas t1
JOIN tipo_empresa t2 ON t1.id_tipo_empresa = t2.id_tipo_empresa
JOIN gal_imagenes t3 on t1.nit_empresa = t3.nit_empresa;

