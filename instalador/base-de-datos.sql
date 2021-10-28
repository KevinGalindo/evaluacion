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

INSERT informe(indice, text, li, li2, li3, li4, text3, text4, text5, text6) VALUES ('PUESTA EN MARCHA', 'Para la óptima instalación del sistema de información usted deberá cumplir con los siguientes requisitos para su óptimo funcionamiento:', '•   Conexión a internet de mínimo 1MB/S de velocidad en 3G o 4G.','•    Sistema operativo Windows 7 o superior.', '•    Navegador Google Chrome, Firefox, Opera o Safari.', '•   Equipo de 4 gbs de RAM y un Intel core 2 duo o un AMD Athlon.', 'Este sistema de información fue hecho con los lenguajes HTML5, CSS3, JAVASCRIPT, PHP 7.4.12 y como gestor de bases de datos MYSQL en su versión MARIADB.', 'El correo electrónico para el soporte del sistema de información es: kevingalindo776@gmail.com.', 'El personal idóneo para la instalación de este software debe tener conocimientos básicos de informática, para la digitación de datos en la web, no debe tener titulación de programas avanzados o de nivel técnico, solo deberá tener a la mano el manual de usuario para la instalación y la información a ingresar para la posterior instalación del sistema.', 'Se aclara que este sistema de información no genera gran impacto ambiental debido a que esta optimizado para equipos de bajos recursos y tiene un bajo impacto en el consumo energético.');

INSERT informe(indice, text, text2, text3, text4) VALUES ('CONFIDENCIALIDAD, INTEGRIDAD Y DISPONIBILIDAD', 'SEGURIDAD: nuestro sistema de información cuenta con un sistema de seguridad de inicio de sesión con correo y contraseña, las cuales se guardaran en la base de datos y se encriptaran de tal manera que será complicado para un tercero acceder a la información desde fuera del apartado del administrador.', 'El sistema de información cuenta con un sistema de recuperación de contraseña para el administrador que le permitirá modificar dicha contraseña en caso de pérdida de la misma.', 'Por otro lado, nuestro sistema de información no le pedirá al usuario pagos mediante la aplicación, tampoco se dejara ver la información de las empresas sin antes haberse registrado como usuario, esto para garantizar la seguridad de las empresas y así mismo poder confirmar, en caso de extorción u otro delito derivado, que usuario/os probablemente hicieron o cometieron dicha falta.', 'Por último, cabe aclarar que nuestro software no le pedirá al usuario datos muy personales como lo son: Número de tarjeta de crédito, pagos a ciertos convenios, su contraseña de otras redes sociales, dirección de su lugar de estadía ni nada que tenga que ver con su ubicación o datos bancarios.');

INSERT informe(indice, text, text2, text3, text4) VALUES ('COPIAS DE SEGURIDAD Y MIGRACION.','El sistema de información cuenta con un sistema de copia de seguridad de la información semanal el cual le permitirá al administrador tener todos los datos a salvo previniendo una posible falla en el sistema, además de ello el sistema cuenta con una gran adaptabilidad, eficiencia de ejecución y manejo intuitivo para su instalación y migración de información.', 'El proceso de instalación y migración tiene soporte para hacerse tanto desde computadoras hasta dispositivos móviles.', 'Para poder utilizar el sistema de información deberá tener acceso a internet y podrá ver la información allí alojada siempre y cuando ya se haya hecho la previa instalación e inserción de datos por parte del administrador, debido a que, este siempre iniciara con la vista de los usuarios donde tienen varias funciones, que permiten ver la información de todas las empresas, productos y demás apartados públicos.', 'De la parte del administrador podrá ingresar con correo y contraseña al sistema de información, en caso de pérdida de la contraseña se le permitirá cambiarla de manera rápida y eficiente.');

INSERT informe(indice, text, text2, text3, text4) VALUES ('ACCESIBILIDAD, USABILIDAD Y LICENCIAMIENTO', 'El sistema cuenta con un fácil y seguro sistema de acceso para el administrador, debido a que esta es la primera versión del software, el mismo solo tendrá una cuenta de administrador y los usuarios serán todos aquellos que visiten la página, optando así por un modelo de no tener usuarios registrados, por lo cual el sistema será aún más liviano.', 'En el apartado de la usabilidad tenemos que los usuarios podrán interactuar con los botones, podrán ver mucha de la información que es publica, además de poder contactar y ver disponibilidad de productos dependiendo de la empresa.', 'El sistema cuenta con una paleta de colores simple, de tal manera que a pesar de tener poco colores, todos combinan entre si dando armonía al diseño.', 'El código del sistema de información cuenta con código documentado, de manera que cualquier otro programador pueda entender el que, el cómo y el porqué de las diferentes funciones para así poder dar mantenimiento al sistema.');

INSERT informe(indice, text, text2, text3) VALUES ('INFORME ADMINISTRATIVO', 'En nuestro sistema de información podrá encontrar alojado el informe administrativo, con el fin de buscar apartado de interés para las personas, lo cual puede ser los términos y condiciones o demás información importante para el correcto uso del software.', 'Lastimosamente, el software no es perfecto, aún tiene algunas cosas que se pueden mejorar, puesto que esta es la primera versión del mismo, por lo cual hay procesos que no están del todo optimizados, sin embargo, este software se ha hecho lo más eficiente posible para solucionar las problemáticas planteadas por el cliente.','Durante algún tiempo se tuvo inconvenientes con la parte visual, algunas funcionalidades de parte del backend y otras falencias en el código o la lógica aplicada al sistema. Esto ya no ha de ser un problema tan grande, debido a que gracias al tiempo estipulado para entregar el proyecto, se ha ido mejorando poco a poco y reparando algunas falencias encontradas en el camino.');

INSERT informe(indice, text, text2, text3, text4) VALUES ('FORTALEZAS Y DEBILIDADES', 'Fortalezas: las fortalezas a lo largo del desarrollo web han sido la mejoría constante del software, tanto en diseño como en funcionalidad, debido a que se han implementado tecnologías nuevas para el correcto funcionamiento del sistema, sus validaciones de datos de parte del backend y las buenas prácticas gracias al modelo-vista-controlador.', 'En el producto final se pueden también reflejar las fortalezas mediante el diseño responsivo, las validaciones de parte del backend y la encriptación de datos en la base de datos.', 'Debilidades: las debilidades que se han ido presentando a lo largo del desarrollo han sido: la documentación, fallas en el diseño, fallas en funcionalidades y retrasos con los tiempos estipulados.', 'En el producto final aún se pueden ver algunas de las debilidades anteriormente mencionadas.');