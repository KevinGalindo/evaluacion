SET FOREIGN_KEY_CHECKS=0;

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

SET FOREIGN_KEY_CHECKS=1;

INSERT INTO acceso_administrador(id_admin, nombre_admin, correo_administrador, contrasena_administrador, rol) VALUES (1,'Admin','hi@gmail.com','81dc9bdb52d04dc20036dbd8313ed055', 1);

INSERT INTO tipo_empresa(id_tipo_empresa, tipo_empresa) VALUES (1,'Ninguna');

INSERT INTO tipo_producto(id_tipo_producto, Tipo_producto) VALUES (1,'Ninguno');

INSERT informe(indice, text, li, li2, li3, li4, text3, text4, text5, text6) VALUES ('PUESTA EN MARCHA', 'Para la ??ptima instalaci??n del sistema de informaci??n usted deber?? cumplir con los siguientes requisitos para su ??ptimo funcionamiento:', '???   Conexi??n a internet de m??nimo 1MB/S de velocidad en 3G o 4G.','???    Sistema operativo Windows 7 o superior.', '???    Navegador Google Chrome, Firefox, Opera o Safari.', '???   Equipo de 4 gbs de RAM y un Intel core 2 duo o un AMD Athlon.', 'Este sistema de informaci??n fue hecho con los lenguajes HTML5, CSS3, JAVASCRIPT, PHP 7.4.12 y como gestor de bases de datos MYSQL en su versi??n MARIADB.', 'El correo electr??nico para el soporte del sistema de informaci??n es: kevingalindo776@gmail.com.', 'El personal id??neo para la instalaci??n de este software debe tener conocimientos b??sicos de inform??tica, para la digitaci??n de datos en la web, no debe tener titulaci??n de programas avanzados o de nivel t??cnico, solo deber?? tener a la mano el manual de usuario para la instalaci??n y la informaci??n a ingresar para la posterior instalaci??n del sistema.', 'Se aclara que este sistema de informaci??n no genera gran impacto ambiental debido a que esta optimizado para equipos de bajos recursos y tiene un bajo impacto en el consumo energ??tico.');

INSERT informe(indice, text, text2, text3, text4) VALUES ('CONFIDENCIALIDAD, INTEGRIDAD Y DISPONIBILIDAD', 'SEGURIDAD: nuestro sistema de informaci??n cuenta con un sistema de seguridad de inicio de sesi??n con correo y contrase??a, las cuales se guardaran en la base de datos y se encriptaran de tal manera que ser?? complicado para un tercero acceder a la informaci??n desde fuera del apartado del administrador.', 'El sistema de informaci??n cuenta con un sistema de recuperaci??n de contrase??a para el administrador que le permitir?? modificar dicha contrase??a en caso de p??rdida de la misma.', 'Por otro lado, nuestro sistema de informaci??n no le pedir?? al usuario pagos mediante la aplicaci??n, tampoco se dejara ver la informaci??n de las empresas sin antes haberse registrado como usuario, esto para garantizar la seguridad de las empresas y as?? mismo poder confirmar, en caso de extorci??n u otro delito derivado, que usuario/os probablemente hicieron o cometieron dicha falta.', 'Por ??ltimo, cabe aclarar que nuestro software no le pedir?? al usuario datos muy personales como lo son: N??mero de tarjeta de cr??dito, pagos a ciertos convenios, su contrase??a de otras redes sociales, direcci??n de su lugar de estad??a ni nada que tenga que ver con su ubicaci??n o datos bancarios.');

INSERT informe(indice, text, text2, text3, text4) VALUES ('COPIAS DE SEGURIDAD Y MIGRACION.','El sistema de informaci??n cuenta con un sistema de copia de seguridad de la informaci??n semanal el cual le permitir?? al administrador tener todos los datos a salvo previniendo una posible falla en el sistema, adem??s de ello el sistema cuenta con una gran adaptabilidad, eficiencia de ejecuci??n y manejo intuitivo para su instalaci??n y migraci??n de informaci??n.', 'El proceso de instalaci??n y migraci??n tiene soporte para hacerse tanto desde computadoras hasta dispositivos m??viles.', 'Para poder utilizar el sistema de informaci??n deber?? tener acceso a internet y podr?? ver la informaci??n all?? alojada siempre y cuando ya se haya hecho la previa instalaci??n e inserci??n de datos por parte del administrador, debido a que, este siempre iniciara con la vista de los usuarios donde tienen varias funciones, que permiten ver la informaci??n de todas las empresas, productos y dem??s apartados p??blicos.', 'De la parte del administrador podr?? ingresar con correo y contrase??a al sistema de informaci??n, en caso de p??rdida de la contrase??a se le permitir?? cambiarla de manera r??pida y eficiente.');

INSERT informe(indice, text, text2, text3, text4) VALUES ('ACCESIBILIDAD, USABILIDAD Y LICENCIAMIENTO', 'El sistema cuenta con un f??cil y seguro sistema de acceso para el administrador, debido a que esta es la primera versi??n del software, el mismo solo tendr?? una cuenta de administrador y los usuarios ser??n todos aquellos que visiten la p??gina, optando as?? por un modelo de no tener usuarios registrados, por lo cual el sistema ser?? a??n m??s liviano.', 'En el apartado de la usabilidad tenemos que los usuarios podr??n interactuar con los botones, podr??n ver mucha de la informaci??n que es publica, adem??s de poder contactar y ver disponibilidad de productos dependiendo de la empresa.', 'El sistema cuenta con una paleta de colores simple, de tal manera que a pesar de tener poco colores, todos combinan entre si dando armon??a al dise??o.', 'El c??digo del sistema de informaci??n cuenta con c??digo documentado, de manera que cualquier otro programador pueda entender el que, el c??mo y el porqu?? de las diferentes funciones para as?? poder dar mantenimiento al sistema.');

INSERT informe(indice, text, text2, text3) VALUES ('INFORME ADMINISTRATIVO', 'En nuestro sistema de informaci??n podr?? encontrar alojado el informe administrativo, con el fin de buscar apartado de inter??s para las personas, lo cual puede ser los t??rminos y condiciones o dem??s informaci??n importante para el correcto uso del software.', 'Lastimosamente, el software no es perfecto, a??n tiene algunas cosas que se pueden mejorar, puesto que esta es la primera versi??n del mismo, por lo cual hay procesos que no est??n del todo optimizados, sin embargo, este software se ha hecho lo m??s eficiente posible para solucionar las problem??ticas planteadas por el cliente.','Durante alg??n tiempo se tuvo inconvenientes con la parte visual, algunas funcionalidades de parte del backend y otras falencias en el c??digo o la l??gica aplicada al sistema. Esto ya no ha de ser un problema tan grande, debido a que gracias al tiempo estipulado para entregar el proyecto, se ha ido mejorando poco a poco y reparando algunas falencias encontradas en el camino.');

INSERT informe(indice, text, text2, text3, text4) VALUES ('FORTALEZAS Y DEBILIDADES', 'Fortalezas: las fortalezas a lo largo del desarrollo web han sido la mejor??a constante del software, tanto en dise??o como en funcionalidad, debido a que se han implementado tecnolog??as nuevas para el correcto funcionamiento del sistema, sus validaciones de datos de parte del backend y las buenas pr??cticas gracias al modelo-vista-controlador.', 'En el producto final se pueden tambi??n reflejar las fortalezas mediante el dise??o responsivo, las validaciones de parte del backend y la encriptaci??n de datos en la base de datos.', 'Debilidades: las debilidades que se han ido presentando a lo largo del desarrollo han sido: la documentaci??n, fallas en el dise??o, fallas en funcionalidades y retrasos con los tiempos estipulados.', 'En el producto final a??n se pueden ver algunas de las debilidades anteriormente mencionadas.');