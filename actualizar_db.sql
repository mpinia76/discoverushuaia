-- Volcando estructura para tabla villaged_web.cuotas
CREATE TABLE IF NOT EXISTS `cuotas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarjeta` varchar(20) NOT NULL,
  `cuota` varchar(2) NOT NULL,
  `indice` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


CREATE TABLE `encuesta` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`retiro` DATE NOT NULL,
	`devolucion` DATE NOT NULL,
	`unidad_id` INT(11) NOT NULL,
	`cliente_id` INT(11) NOT NULL,
	`comentarios_buenos` TEXT NOT NULL,
	`comentarios_malos` TEXT NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=MyISAM
AUTO_INCREMENT=1;

CREATE TABLE `encuesta_respuestas` (
	`encuesta_id` INT(11) NOT NULL,
	`pregunta_id` VARCHAR(2) NOT NULL,
	`valor` VARCHAR(1) NOT NULL,
	`extra` VARCHAR(100) NOT NULL
)
COLLATE='latin1_swedish_ci'
ENGINE=MyISAM;

CREATE TABLE `encuesta_web` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`texto` LONGTEXT NOT NULL COLLATE 'utf8_unicode_ci',
	PRIMARY KEY (`id`)
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=1;

CREATE TABLE `clientes` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(50) NOT NULL,
	`apellido` VARCHAR(50) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`telefono` VARCHAR(50) NOT NULL,
	`tipodoc` VARCHAR(5) NOT NULL,
	`nrodoc` VARCHAR(20) NOT NULL,
	`pais` VARCHAR(50) NOT NULL,
	`provincia` VARCHAR(50) NOT NULL,
	`ciudad` VARCHAR(50) NOT NULL,
	`calle` VARCHAR(50) NOT NULL,
	`nropuerta` VARCHAR(5) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=MyISAM
AUTO_INCREMENT=1;



CREATE TABLE IF NOT EXISTS `unidads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(250) NOT NULL,
  `modelo` varchar(250) NOT NULL,
  `patente` varchar(10) DEFAULT NULL,
  `habilitacion` date DEFAULT NULL,
  `periodo` varchar(50) DEFAULT NULL,
  `baja` date DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `categoria_id` int(11) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `unidads`
--

INSERT INTO `unidads` (`id`, `marca`, `modelo`, `patente`, `habilitacion`, `periodo`, `baja`, `estado`, `categoria_id`, `capacidad`) VALUES
(5, 'Chevrolet', 'Classic', 'AA727XE', '2016-12-06', '2 años', '2018-12-06', 1, 1, 5),
(6, 'Chevrolet', 'Classic', 'AA727XF', '2016-12-06', '2 años', '2018-12-06', 1, 1, 5),
(7, 'Chevrolet', 'Classic', 'AA727XG', '2016-12-06', '2 años', '2018-12-06', 1, 1, 5),
(8, 'Chevrolet', 'Classic', 'AA727XH', '2016-12-06', '2 años', '2018-12-06', 1, 1, 5),
(9, 'Chevrolet', 'Classic', 'AA727XI', '2016-12-06', '2 años', '2018-12-06', 1, 1, 5),
(10, 'Chevrolet', 'Classic', 'AA727XJ', '2016-12-06', '2 años', '2018-12-06', 1, 1, 5),
(11, 'Chevrolet', 'Classic', 'AA727XK', '2016-12-06', '2 años', '2018-12-06', 1, 1, 5);


##################################25/09/2017###########################################################
#######################Gestion##################################
ALTER TABLE `seguros`
	ADD COLUMN `orden` INT(11) NULL AFTER `importe`;
	
ALTER TABLE `lugars`
	ADD COLUMN `lugar_ingles` VARCHAR(250) NULL AFTER `lugar`,
	ADD COLUMN `lugar_portugues` VARCHAR(250) NULL AFTER `lugar_ingles`;	
	
#######################WEB##################################	
ALTER TABLE `atractivos`
	ADD COLUMN `Lugar_Ingles` VARCHAR(250) NULL AFTER `Foto`,
	ADD COLUMN `Texto_Ingles` LONGTEXT NULL AFTER `Lugar_Ingles`,
	ADD COLUMN `Lugar_Portugues` VARCHAR(250) NULL AFTER `Texto_Ingles`,
	ADD COLUMN `Texto_Portugues` LONGTEXT NULL AFTER `Lugar_Portugues`;
	
ALTER TABLE `categorias`
	ADD COLUMN `Nombre_Ingles` VARCHAR(250) NULL AFTER `Precio`,
	ADD COLUMN `Marca_Ingles` VARCHAR(250) NULL AFTER `Nombre_Ingles`,
	ADD COLUMN `Precio_Ingles` VARCHAR(250) NULL AFTER `Marca_Ingles`,
	ADD COLUMN `Nombre_Portugues` VARCHAR(250) NULL AFTER `Precio_Ingles`,
	ADD COLUMN `Marca_Portugues` VARCHAR(250) NULL AFTER `Nombre_Portugues`,
	ADD COLUMN `Precio_Portugues` VARCHAR(250) NULL AFTER `Marca_Portugues`;
	
ALTER TABLE `categorias_detalles`
	ADD COLUMN `Detalle_Ingles` VARCHAR(250) NULL AFTER `Detalle`,
	ADD COLUMN `Detalle_Portugues` VARCHAR(250) NULL AFTER `Detalle_Ingles`;
	
ALTER TABLE `beneficios`
	ADD COLUMN `Nombre_Ingles` VARCHAR(250) NOT NULL AFTER `Link`,
	ADD COLUMN `Texto_Ingles` TEXT NOT NULL AFTER `Nombre_Ingles`,
	ADD COLUMN `Nombre_Portugues` VARCHAR(250) NOT NULL AFTER `Texto_Ingles`,
	ADD COLUMN `Texto_Portugues` TEXT NOT NULL AFTER `Nombre_Portugues`;

ALTER TABLE `sliderhome`
	ADD COLUMN `Titulo_Ingles` VARCHAR(250) NULL AFTER `Orden`,
	ADD COLUMN `Bajada_Ingles` VARCHAR(250) NULL AFTER `Titulo_Ingles`,
	ADD COLUMN `Titulo_Portugues` VARCHAR(250) NULL AFTER `Bajada_Ingles`,
	ADD COLUMN `Bajada_Portugues` VARCHAR(250) NULL AFTER `Titulo_Portugues`;

ALTER TABLE `home`
	ADD COLUMN `Titulo_Ingles` VARCHAR(250) NULL AFTER `Link`,
	ADD COLUMN `Bajada_Ingles` VARCHAR(250) NULL AFTER `Titulo_Ingles`,
	ADD COLUMN `Texto_Ingles` TEXT NULL AFTER `Bajada_Ingles`,
	ADD COLUMN `Titulo_Portugues` VARCHAR(250) NULL AFTER `Titulo`,
	ADD COLUMN `Bajada_Portugues` VARCHAR(250) NULL AFTER `Titulo_Portugues`,
	ADD COLUMN `Texto_Portugues` TEXT NULL AFTER `Bajada_Ingles`;

ALTER TABLE `faq`
	ADD COLUMN `Pregunta_Ingles` VARCHAR(250) NULL AFTER `Orden`,
	ADD COLUMN `Respuesta_Ingles` TEXT NULL AFTER `Pregunta_Ingles`,
	ADD COLUMN `Pregunta_Portugues` VARCHAR(250) NULL AFTER `Respuesta_Ingles`,
	ADD COLUMN `Respuesta_Portugues` TEXT NULL AFTER `Pregunta_Portugues`;
	
ALTER TABLE `beneficios`
	ADD COLUMN `Activo_Ingles` INT(1) NULL AFTER `Texto_Portugues`,
	ADD COLUMN `Activo_Portugues` INT(1) NULL AFTER `Activo_Ingles`;

ALTER TABLE `sliderhome`
	ADD COLUMN `Idioma` VARCHAR(250) NULL DEFAULT NULL AFTER `Bajada_Portugues`;

##################################23/10/2017###########################################################
#######################Gestion##################################

	
#######################WEB##################################	

##################################02/05/2018###########################################################
ALTER TABLE `gasto`
	ADD COLUMN `iva_27` FLOAT NULL,
	ADD COLUMN `iva_21` FLOAT NULL,
	ADD COLUMN `iva_10_5` FLOAT NULL,
	ADD COLUMN `otra_alicuota` FLOAT NULL;
	
INSERT INTO `permiso` (`permiso_grupo_id`, `nombre`) VALUES (10, 'Libro IVA compras');

##################################05/05/2018###########################################################
CREATE TABLE `banderas` (
	`Id` INT(5) NOT NULL AUTO_INCREMENT,
	
	`Titulo` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	
	`es` INT(1) NOT NULL,
	`en` INT(1) NOT NULL,
	`po` INT(1) NOT NULL,
	
	PRIMARY KEY (`Id`)
)
COLLATE='utf8_bin'
ENGINE=MyISAM
AUTO_INCREMENT=1
;

INSERT INTO `banderas` (`Titulo`, `es`, `en`, `po`) VALUES ('Banderas', '0', '0', '0');

##################################10/12/2018###########################################################
ALTER TABLE `categorias`
	ADD COLUMN `orden` INT NULL AFTER `Precio_Portugues`;

##################################12/06/2019###########################################################
CREATE TABLE whatsapp (
	`Id` INT(5) NOT NULL AUTO_INCREMENT,
	
	`Titulo` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	
	`activo` INT(1) NOT NULL,
	
	PRIMARY KEY (`Id`)
)
COLLATE='utf8_bin'
ENGINE=MyISAM
AUTO_INCREMENT=1
;

INSERT INTO whatsapp (`Titulo`, `activo`) VALUES ('Whatsapp', '0');

##############################09/03/2020####################################
ALTER TABLE `beneficios`
	ADD COLUMN `orden` INT(11) NULL AFTER `Activo_Portugues`;
	
##################################28/07/2020###########################################################
ALTER TABLE `descuentos`
	ADD COLUMN `orden` INT(11) NULL AFTER `tarjeta_portugues`;