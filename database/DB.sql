


DROP TABLE IF EXISTS `experienciasLaborales`;
DROP TABLE IF EXISTS `beneficiosDeduciones`;
DROP TABLE IF EXISTS `salarios`;
DROP TABLE IF EXISTS `informacionBancaria`;
DROP TABLE IF EXISTS `educacion`;
DROP TABLE IF EXISTS `direccion`;
DROP TABLE IF EXISTS `corregimiento`;
DROP TABLE IF EXISTS `distrito`;
DROP TABLE IF EXISTS `provincia`;
DROP TABLE IF EXISTS `colaboradores`;
DROP TABLE IF EXISTS `posiciones`;
DROP TABLE IF EXISTS `departamento`;
DROP TABLE IF EXISTS `organizacion`;
DROP TABLE IF EXISTS `consumidor`;



CREATE TABLE IF NOT EXISTS `organizacion` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` varchar(75) DEFAULT NULL,
    `codigo` varchar(5) DEFAULT NULL,
    `estatus` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
    `usuarioId` int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `departamento` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` varchar(75) DEFAULT NULL,
    `codigo` varchar(5) DEFAULT NULL,
    `estatus` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
    `organizacionId` int(11) NOT NULL,
    `infoextra` text,
    `usuarioId` int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (organizacionId) REFERENCES organizacion(id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `posiciones` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` varchar(75) DEFAULT NULL,
    `codigo` varchar(5) DEFAULT NULL,
    `estatus` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
    `departamentoId` int(11) NOT NULL,
    `infoextra` text,
    `usuarioId` int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (departamento›Id) REFERENCES departamento(id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `colaboradores` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `codigo` varchar(5) DEFAULT NULL,
    `cedula` varchar(15) DEFAULT NULL,
    `nombre` varchar(75) DEFAULT NULL,
    `apellido` varchar(75) DEFAULT NULL,
    `correo` varchar(50) DEFAULT NULL,
    `tipoSangre` enum('O+','O-', 'A+','A-', 'B+','B-', 'AB+') NOT NULL DEFAULT 'O+',
    `genero` enum('Masculino','Femenino' ) NOT NULL DEFAULT 'Masculino',
    `tipoUsuario` enum('Admin','SuperAdmin', 'Colaborador', 'Recursos Humanos') NOT NULL DEFAULT 'Colaborador',
    `telefono` varchar(15) DEFAULT NULL,
    `departamentoId` int(11) NOT NULL,
    `posicionId` int(11) NOT NULL,
    `estatus` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
    `infoextra` text,
    `usuarioId` int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (departamentoId) REFERENCES departamento(id),
    FOREIGN KEY (posicionId) REFERENCES posiciones(id)
  ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `provincia` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` varchar(75) COLLATE utf8_general_ci NULL,
    `codigo` varchar(5) COLLATE utf8_general_ci NULL,
    `estatus` enum('Activo','Inactivo') COLLATE utf8_general_ci NOT NULL DEFAULT 'Activo',
    `created_at` timestamp NULL,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;  

CREATE TABLE IF NOT EXISTS `distrito` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` varchar(75) COLLATE utf8_general_ci NULL,
    `codigo` varchar(5) COLLATE utf8_general_ci NULL,
    `estatus` enum('Activo','Inactivo') COLLATE utf8_general_ci NOT NULL DEFAULT 'Activo',
    `provinciaId` int(11) NOT NULL,
    `created_at` timestamp NULL,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (provinciaId) REFERENCES provincia(id)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;  

CREATE TABLE IF NOT EXISTS `corregimiento` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` varchar(75) COLLATE utf8_general_ci NULL,
    `codigo` varchar(5) COLLATE utf8_general_ci NULL,
    `estatus` enum('Activo','Inactivo') COLLATE utf8_general_ci NOT NULL DEFAULT 'Activo',
    `distritoId` int(11) NOT NULL,
    `created_at` timestamp NULL,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (distritoId) REFERENCES distrito(id)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;  

 CREATE TABLE IF NOT EXISTS `direccion` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `direccion` varchar(75) DEFAULT NULL,
    `provinciaId` int(11) NOT NULL,
    `distritoId` int(11) NOT NULL,
    `corregimientoId` int(11) NOT NULL,
    `contacto` varchar(25) DEFAULT NULL,
    `telefono` varchar(15) DEFAULT NULL,
    `contactoDireccion` varchar(75) DEFAULT NULL,
    `colaboradorId` int(11) NOT NULL,
    `infoextra` text,
    `usuarioId` int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (colaboradorId) REFERENCES colaboradores(id),
    FOREIGN KEY (provinciaId) REFERENCES provincia(id),
    FOREIGN KEY (distritoId) REFERENCES distrito(id),
    FOREIGN KEY (corregimientoId) REFERENCES corregimiento(id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

 CREATE TABLE IF NOT EXISTS `educacion` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `titulo` varchar(200) DEFAULT NULL,
    `institucion` varchar(200) DEFAULT NULL,
    `resultado`  enum('En curso', 'Completado', 'Abandonado', 'Otro') COLLATE utf8_general_ci NOT NULL DEFAULT 'Completado',
    `fechainicio` DATETIME NULL DEFAULT NULL,
    `fechafinalizacion` DATETIME NULL DEFAULT NULL,
    `colaboradorId` int(11) NOT NULL,
    `infoextra` text,
    `usuarioId` int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (colaboradorId) REFERENCES colaboradores(id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `informacionBancaria` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombreBanco` varchar(200) DEFAULT NULL,
    `numeroCuenta` varchar(20) DEFAULT NULL,
    `tipoCuenta`  enum('Ahorro', 'Corriente', 'Otro') COLLATE utf8_general_ci NOT NULL DEFAULT 'Ahorro',
    `colaboradorId` int(11) NOT NULL,
    `infoextra` text,
    `usuarioId` int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (colaboradorId) REFERENCES colaboradores(id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `salarios` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `tipoContrato` enum('Contrato por Tiempo Indefinido', 'Contrato por Tiempo Determinado', 'Contrato por Obra o Servicio Determinado', 'Contrato por Prueba', 'Contrato de Reemplazo', 'Contrato de Aprendizaje', 'Contrato a Tiempo Parcial', 'Contrato de Teletrabajo', 'Contrato por Temporada', 'Contrato de Extranjeros', 'Contrato a Domicilio') COLLATE utf8_general_ci NOT NULL DEFAULT 'Contrato por Tiempo Indefinido',
    `fechaInicio` DATETIME NULL DEFAULT NULL,
    `fechafinalizacion` DATETIME NULL DEFAULT NULL,
    `tipoSalario` enum('Hora', 'Semanal', 'Quincenal', 'Mensual') COLLATE utf8_general_ci NOT NULL DEFAULT 'Quincenal',
    `monto` decimal(13,4) DEFAULT '0.0000',
    `tipoPago`  enum('Ahorro', 'Corriente', 'Otro') COLLATE utf8_general_ci NOT NULL DEFAULT 'Ahorro',
    `colaboradorId` int(11) NOT NULL,
    `infoextra` text,
    `usuarioId` int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (colaboradorId) REFERENCES colaboradores(id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `beneficiosDeduciones` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `tipobd` enum('Beneficio', 'Deduciones') COLLATE utf8_general_ci NOT NULL DEFAULT 'Beneficio',
    `tipo` enum('Comida', 'Alquiler', 'Seguro Medico Privado', 'Transporte', 'Seguro Social', 'Seguro Educativo', 'Ahorro', 'Otros') COLLATE utf8_general_ci NOT NULL DEFAULT 'Otros',
    `monto` decimal(13,4) DEFAULT '0.0000',
    `colaboradorId` int(11) NOT NULL,
    `infoextra` text,
    `usuarioId` int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (colaboradorId) REFERENCES colaboradores(id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

 CREATE TABLE IF NOT EXISTS `experienciasLaborales` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `empresa` varchar(100) DEFAULT NULL,
    `posicion` varchar(50) DEFAULT NULL,
    `direccion`  varchar(200) DEFAULT NULL,
    `fechainicio` DATETIME NULL DEFAULT NULL,
    `fechafinalizacion` DATETIME NULL DEFAULT NULL,
    `colaboradorId` int(11) NOT NULL,
    `infoextra` text,
    `usuarioId` int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (colaboradorId) REFERENCES colaboradores(id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

#inserta organizacion
INSERT INTO `organizacion` (`nombre`, `codigo`, `usuarioId`) VALUES
	('Atlas', '00001', '1');

#inserta provincia
INSERT INTO `provincia` (`id`, `nombre`, `codigo`, `estatus`,  `created_at`, `updated_at`) VALUES
	(1766, 'Bocas del Toro', '1', 'Activo', NULL, '2018-04-30 09:52:32'),
	(1767, 'Chiriquí', '4', 'Activo',  NULL, '2018-04-30 09:52:32'),
	(1768, 'Coclé', '2', 'Activo',  NULL, '2018-04-30 09:52:32'),
	(1769, 'Colón', '3', 'Activo',  NULL, '2018-04-30 09:52:32'),
	(1770, 'Darién', '5', 'Activo',  NULL, '2018-04-30 09:52:32'),
	(1771, 'Herrera', '6', 'Activo',  NULL, '2018-04-30 09:52:32'),
	(1772, 'Los Santos', '7', 'Activo',  NULL, '2018-04-30 09:52:32'),
	(1773, 'Panamá', '8', 'Activo',  NULL, '2018-04-30 09:52:32'),
	(1774, 'Comarca Kuna Yala', '10', 'Activo',  NULL, '2018-04-30 09:52:32'),
	(1775, 'Veraguas', '9', 'Activo',  NULL, '2018-04-30 09:52:32'),
	(2204, 'Comarca Embera-Wounaan', '11', 'Activo',  NULL, '2018-04-30 09:52:32'),
	(2205, 'Comarca Ngabe-Buglé', '12', 'Activo',  NULL, '2018-04-30 09:52:32'),
	(2206, 'Panamá Oeste', '13', 'Activo',  NULL, '2018-04-30 09:52:32');

#inserta distrito
INSERT INTO `distrito` (`id`,`nombre`, `codigo`, `provinciaId`) VALUES 
    (82,'Bocas del Toro', '1', '1766'),
    (83,'Changuinola', '2', '1766'),
    (84,'Chiriquí Grande', '3', '1766'),
    (85,'Aguadulce', '1', '1768'),
    (86,'Antón', '2', '1768'),
    (87,'La Pintada', '3', '1768'),
    (88,'Nata', '4', '1768'),
    (89,'Ola', '5', '1768'),
    (90,'Penonomé', '6', '1768'),
    (91,'Colon', '1', '1769'),
    (92,'Chagres', '2', '1769'),
    (93,'Donoso', '3', '1769'),
    (94,'Portobelo', '4', '1769'),
    (95,'Santa Isabel', '5', '1769'),
    (96,'Alanje', '1', '1767'),
    (97,'Barú', '2', '1767'),
    (98,'Boqueron', '3', '1767'),
    (99,'Boquete', '4', '1767'),
    (100,'Bugaba', '5', '1767'),
    (101,'David', '6', '1767'),
    (102,'Dolega', '7', '1767'),
    (103,'Gualaca', '8', '1767'),
    (104,'Remedios', '9', '1767'),
    (105,'Renacimiento', '10', '1767'),
    (106,'San Felix', '11', '1767'),
    (107,'San Lorenzo', '12', '1767'),
    (108,'Tole', '13', '1767'),
    (109,'Chepigana', '1', '1770'),
    (110,'Pinogana', '2', '1770'),
    (111,'Chitré', '1', '1771'),
    (112,'Las Minas', '2', '1771'),
    (113,'Los Pozos', '3', '1771'),
    (114,'Ocu', '4', '1771'),
    (115,'Parita', '5', '1771'),
    (116,'Pese', '6', '1771'),
    (117,'Santa María', '7', '1771'),
    (118,'Guarare', '1', '1772'),
    (119,'Las Tablas', '2', '1772'),
    (120,'Los Santos', '3', '1772'),
    (121,'Macaracas', '4', '1772'),
    (122,'Pedasi', '5', '1772'),
    (123,'Pocri', '6', '1772'),
    (124,'Tonosi', '17', '1772'),
    (125,'Balboa', '2', '1773'),
    (126,'Chepo', '5', '1773'),
    (127,'Chiman', '6', '1773'),
    (128,'Panamá', '8', '1773'),
    (129,'San Miguelito', '10', '1773'),
    (130,'Taboga', '11', '1773'),
    (131,'Atalaya', '1', '1775'),
    (132,'Calobre', '2', '1775'),
    (133,'Cañazas', '3', '1775'),
    (134,'La Meza', '4', '1775'),
    (135,'Las Palmas', '5', '1775'),
    (136,'Montijo', '6', '1775'),
    (137,'Rio de Jesús', '7', '1775'),
    (138,'San Francisco', '8', '1775'),
    (139,'Santa Fe', '9', '1775'),
    (140,'Santiago', '10', '1775'),
    (141,'Sona', '11', '1775'),
    (142,'Mariato', '12', '1775'),
    (143,'Comarca Kuna Yala', '1', '1774'),
    (144,'Cemaco', '1', '2204'),
    (145,'Sambu', '2', '2204'),
    (146,'Besiko', '1', '2205'),
    (147,'Mirono', '2', '2205'),
    (148,'Muna', '3', '2205'),
    (149,'Nole Duima', '4', '2205'),
    (150,'Nurum', '5', '2205'),
    (151,'Kankintu', '6', '2205'),
    (152,'Kusapin', '7', '2205'),
    (153,'Jirondai', '8', '2205'),
    (154,'Calovebora', '9', '2205'),
    (155,'Arraijan', '1', '2206'),
    (156,'Capira', '2', '2206'),
    (157,'Chame', '3', '2206'),
    (158,'La Chorrera', '4', '2206'),
    (159,'San Carlos', '5', '2206');


#inserta corregimiento
INSERT INTO `corregimiento` (`nombre`, `codigo`, `distritoId`) VALUES
	('Bocas del Toro (Cabecera)', '1', '82');
	
INSERT INTO `corregimiento` (`nombre`, `codigo`, `distritoId`) VALUES
	('BASTIMENTOS', '2', '82'),
	('CAUCHERO', '3', '82'),
	('PUNTA LAUREL', '4', '82'),
	('TIERRA OSCURA', '5', '82'),

	('CHANGUINOLA (CABECERA)', '1', '83'),
	('ALMIRANTE', '2', '83'),
	('GUABITO', '3', '83'),
	('TERIBE', '4', '83'),
	('VALLE DEL RISCO', '5', '83'),
	('EL EMPALME', '5', '83'),
	('LAS TABLAS', '6', '83'),

	('CHIRIQUI GRANDE (CABECERA)', '1', '84'),
	('MIRAMAR', '2', '84'),
	('PUNTA PEÑA', '3', '84'),
	('PUNTA ROBALO', '4', '84'),
	('RAMBALA', '5', '84'),

	('AGUADULCE (CABECERA)', '1', '85'),
	('EL CRISTO', '2', '85'),
	('EL ROBLE', '3', '85'),
	('POCRI', '4', '85'),
	('BARRIOS UNIDOS', '5', '85'),

	('ANTON (CABECERA)', '1', '86'),
	('CABUYA', '2', '86'),
	('EL CHIRU', '3', '86'),
	('EL RETIRO', '4', '86'),
	('EL VALLE', '5', '86'),
	('JUAN DIAZ', '6', '86'),
	('RIO HATO', '7', '86'),
	('SAN JUAN DE DIOS', '8', '86'),
	('SANTA RITA', '9', '86'),
	('CABALLERO', '10', '86'),
	
	('LA PINTADA (CABECERA)', '1', '87'),
	('EL HARINO', '2', '87'),
	('EL POTRERO', '3', '87'),
	('LLANO GRANDE', '4', '87'),
	('PIEDRAS GORDAS', '5', '87'),
	('LAS LOMAS', '6', '87'),

	('NATA (CABECERA)', '1', '88'),
	('CAPELLANIA', '2', '88'),
	('EL CAÑO', '3', '88'),
	('GUZMAN', '4', '88'),
	('LAS HUACAS', '5', '88'),
	('TOZA', '6', '88'),

	('OLA (CABECERA)', '1', '89'),
	('EL COPE', '2', '89'),
	('EL PALMAR', '3', '89'),
	('EL PICACHO', '4', '89'),
	('LA PAVA', '5', '89'),

	('PENONOME (CABECERA)', '1', '90'),
	('CAÑAVERAL', '2', '90'),
	('COCLE', '3', '90'),
	('CHIGUIRI ARRIBA', '4', '90'),
	('EL COCO', '5', '90'),
	('PAJONAL', '6', '90'),
	('RIO GRANDE', '7', '90'),
	('RIO INDIO', '8', '90'),
	('TOABRE', '9', '90'),
	('TULU', '10', '90'),

	('BARRIO NORTE', '1', '91'),
	('BARRIO SUR', '2', '91'),
	('BUENA VISTA', '3', '91'),
	('CATIVA', '4', '91'),
	('CIRICITO', '5', '91'),
	('CRISTOBAL', '6', '91'),
	('ESCOBAL', '7', '91'),
	('LIMON', '8', '91'),
	('NUEVA PROVIDENCIA', '9', '91'),
	('PUERTO PILON', '10', '91'),
	('SABANITAS', '11', '91'),
	('SALAMANCA', '12', '91'),
	('SAN JUAN', '13', '91'),
	('SANTA ROSA', '14', '91'),

	('NUEVO CHAGRES (CABECERA)', '1', '92'),
	('ACHIOTE', '2', '92'),
	('EL GUABO', '3', '92'),
	('LA ENCANTADA', '4', '92'),
	('PALMAS BELLAS', '5', '92'),
	('PIÑA', '6', '92'),
	('SALUD', '7', '92'),

	('MIGUEL DE LA BORDA (CABECERA)', '1', '93'),
	('COCLE DEL NORTE', '2', '93'),
	('EL GUASIMO', '3', '93'),
	('GOBEA', '4', '93'),
	('RIO INDIO', '5', '93'),
	('SAN JOSE DEL GENERAL', '6', '93'),

	('PORTOBELO (CABECERA)', '1', '94'),
	('CACIQUE', '2', '94'),
	('GARROTE', '3', '94'),
	('ISLA GRANDE', '4', '94'),
	('MARIA CHIQUITA', '5', '94'),

	('PALENQUE (CABECERA)', '1', '95'),
	('CUANGO', '2', '95'),
	('MIRAMAR', '3', '95'),
	('NOMBRE DE DIOS', '4', '95'),
	('PALMIRA', '5', '95'),
	('PLAYA CHIQUITA', '6', '95'),
	('SANTA ISABEL', '7', '95'),
	('VIENTO FRIO', '8', '95');


INSERT INTO `corregimiento` (`nombre`, `codigo`, `distritoId`) VALUES
	('ALANJE (CABECERA)', '1', '96'),
	('DIVALA', '2', '96'),
	('EL TEJAR', '3', '96'),
	('GUARUMAL', '4', '96'),
	('PALO GRANDE', '5', '96'),
	('QUEREVALO', '6', '96'),
	('SANTO TOMAS', '7', '96'),
	('CANTA GALLO', '8', '96'),
	('NUEVO MEXICO', '9', '96'),

	('PUERTO ARMUELLES (CABECERA)', '1', '97'),
	('LIMONES', '2', '97'),
	('PROGRESO', '3', '97'),
	('BACO', '4', '97'),
	('RODOLFO AGUILAR DELGADO', '5', '97'),

	('BOQUERON (CABECERA)', '1', '98'),
	('BAGALA', '2', '98'),
	('CORDILLERA', '3', '98'),
	('GUABAL', '4', '98'),
	('GUAYABAL', '5', '98'),
	('PARAISO', '6', '98'),
	('PEDREGAL', '7', '98'),
	('TIJERAS', '8', '98'),

	('BAJO BOQUETE (CABECERA)', '1', '99'),
	('CALDERA', '2', '99'),
	('PALMIRA', '3', '99'),
	('ALTO BOQUETE', '4', '99'),
	('JARAMILLO', '5', '99'),
	('LOS NARANJOS', '6', '99'),

	('LA CONCEPCION (CABECERA)', '1', '100'),
	('ASERRIO DE GARICHE', '2', '100'),
	('BUGABA', '3', '100'),
	('CERRO PUNTA', '4', '100'),
	('GOMEZ', '5', '100'),
	('LA ESTRELLA', '6', '100'),
	('SAN ANDRES', '7', '100'),
	('SANTA MARTA', '8', '100'),
	('SANTA ROSA', '9', '100'),
	('SANTO DOMINGO', '10', '100'),
	('SORTOVA', '11', '100'),
	('VOLCAN', '12', '100'),
	('EL BONGO', '13', '100'),

	('DAVID (CABECERA)', '1', '101'),
	('BIJAGUAL', '2', '101'),
	('COCHEA', '3', '101'),
	('CHIRIQUI', '4', '101'),
	('GUACA', '5', '101'),
	('LAS LOMAS', '6', '101'),
	('PEDREGAL', '7', '101'),
	('SAN CARLOS', '8', '101'),
	('SAN PABLO NUEVO', '9', '101'),
	('SAN PABLO VIEJO', '10', '101'),

	('DOLEGA (CABECERA)', '1', '102'),
	('DOS RIOS', '2', '102'),
	('LOS ANASTACIOS', '3', '102'),
	('POTRERILLOS', '4', '102'),
	('POTRERILLOS ABAJO', '5', '102'),
	('ROVIRA', '6', '102'),
	('TINAJAS', '7', '102'),
	('LOS ALGARRROBOS', '8', '102'),

	('GUALACA (CABECERA)', '1', '103'),
	('HORNITO', '2', '103'),
	('LOS ANGELES', '3', '103'),
	('PAJA DE SOMBRERO', '4', '103'),
	('RINCON', '5', '103'),

	('REMEDIOS (CABECERA)', '1', '104'),
	('EL NANCITO', '2', '104'),
	('EL PORVENIR', '3', '104'),
	('EL PUERTO', '4', '104'),
	('SANTA LUCIA', '5', '104'),

	('RIO SERENO (CABECERA)', '1', '105'),
	('BREÑON', '2', '105'),
	('CAÑAS GORDAS', '3', '105'),
	('MONTE LIRIO', '4', '105'),
	('PLAZA CAISAN', '5', '105'),
	('SANTA CRUZ', '6', '105'),
	('DOMINICAL', '7', '105'),
	('SANTA CLARA', '8', '105'),

	('LAS LAJAS (CABECERA)', '1', '106'),
	('JUAY', '2', '106'),
	('LAJAS ADENTRO', '3', '106'),
	('SSAN FELIX', '4', '106'),
	('SANTA CRUZ', '5', '106'),

	('HORCONCITOS (CABECERA)', '1', '107'),
	('BOCA CHICA', '2', '107'),
	('BOCA DEL MONTE', '3', '107'),
	('SAN JUAN', '4', '107'),
	('SAN LORENZO', '5', '107'),

	('TOLE (CABECERA)', '1', '108'),
	('BELLA VISTA', '2', '108'),
	('CERRO VIEJO', '3', '108'),
	('EL CRISTO', '4', '108'),
	('JUSTO FIDEL PALACIOS', '5', '108'),
	('LAJAS DE TOLE', '6', '108'),
	('POTRERO DE CAÑA', '7', '108'),
	('QUEBRADA DE PIEDRA', '8', '108'),
	('VELADERO', '9', '108'),

	('LA PALMA (CABECERA)', '1', '109'),
	('CAMOGANTI', '2', '109'),
	('CHEPIGANA', '3', '109'),
	('GARACHINE', '4', '109'),
	('JAQUE', '5', '109'),
	('PUERTO PIÑA', '6', '109'),
	('RIO CONGO', '7', '109'),
	('RIO IGLESIAS', '8', '109'),
	('SAMBU', '9', '109'),
	('SETEGANTI', '10', '109'),
	('TAIMATI', '11', '109'),
	('TUCUTI', '12', '109'),
	('AGUA FRIA', '13', '109'),
	('CUCUNATI', '14', '109'),
	('RIO CONGO ARRIBA', '15', '109'),
	('SANTA FE', '16', '109'),

	('EL REAL DE SANTA MARIA (CABECERA)', '1', '110'),
	('BOCA DE CUPE', '2', '110'),
	('PAYA', '3', '110'),
	('PINOGANA', '4', '110'),
	('PUCURO', '5', '110'),
	('YAPE', '6', '110'),
	('YAVIZA', '7', '110'),
	('METETI', '8', '110'),
	('COMARCA KUNA DE WARGANDI', '9', '110'),

	('CHITRE (CABECERA)', '1', '111'),
	('LA ARENA', '2', '111'),
	('MONAGRILLO', '3', '111'),
	('LLANO BONITO', '4', '111'),
	('SAN JUAN BAUTISTA', '5', '111'),

	('LAS MINAS (CABECERA)', '1', '112'),
	('CHEPO', '2', '112'),
	('CHUMICAL', '3', '112'),
	('EL TORO', '4', '112'),
	('LEONES', '5', '112'),
	('QUEBRADA DEL ROSARIO', '6', '112'),
	('QUEBRADA EL CIPRIAN', '7', '112'),

	('LOS POZOS (CABECERA)', '1', '113'),
	('CAPURI', '2', '113'),
	('EL CALABACITO', '3', '113'),
	('EL CEDRO', '4', '113'),
	('LA ARENA', '5', '113'),
	('LA PITALOSA', '6', '113'),
	('LOS CERRITOS', '7', '113'),
	('LOS CERROS DE PAJA', '8', '113'),
	('LAS LLANAS', '9', '113'),

	('OCU (CABECERA)', '1', '114'),
	('CERRO LARGO', '2', '114'),
	('LOS LLANOS', '3', '114'),
	('LLANO GRANDE', '4', '114'),
	('PEÑAS CHATAS', '5', '114'),
	('EL TIJERA', '6', '114'),
	('MENCHACA', '7', '114'),

	('PARITA (CABECERA)', '1', '115'),
	('CABUYA', '2', '115'),
	('LOS CASTILLOS', '3', '115'),
	('LLANO DE LA CRUZ', '4', '115'),
	('PARIS', '5', '115'),
	('PORTOBELILLO', '6', '115'),
	('POTUGA', '7', '115'),

	('PESE (CABECERA)', '1', '116'),
	('LAS CABRAS', '2', '116'),
	('EL PAJARO', '3', '116'),
	('EL BARRERO', '4', '116'),
	('EL PEDREGOSO', '5', '116'),
	('EL CIRUELO', '6', '116'),
	('SABANAGRANDE', '7', '116'),
	('RINCON HONDO', '8', '116'),

	('SANTA MARIA (CABECERA)', '1', '117'),
	('CHUPAMPA', '2', '117'),
	('EL RINCON', '3', '117'),
	('EL LIMON', '4', '117'),
	('LOS CANELOS', '5', '117'),


	('GUARARE (CABECERA)', '1', '118'),
	('EL ESPINAL', '2', '118'),
	('EL MACANO', '3', '118'),
	('GUARARE ARRIBA', '4', '118'),
	('LA ENEA', '5', '118'),
	('LA PASERA', '6', '118'),
	('LAS TRANCAS', '7', '118'),
	('LLANO ABAJO', '8', '118'),
	('EL HATO', '9', '118'),
	('PERALES', '10', '118'),

	('LAS TABLAS (CABECERA)', '1', '119'),	
	('BAJO CORRAL', '2', '119'),	
	('BAYANO', '3', '119'),	
	('EL CARATE', '4', '119'),	
	('EL COCAL', '5', '119'),	
	('EL MANANTIAL', '6', '119'),	
	('EL MUÑOZ', '7', '119'),	
	('EL PEDREGOSO', '8', '119'),	
	('LA LAJA', '9', '119'),	
	('LA MIEL', '10', '119'),	
	('LA PALMA', '11', '119'),	
	('LA TIZA', '12', '119'),	
	('LAS PALMITAS', '13', '119'),	
	('LAS TABLAS ABAJO', '14', '119'),	
	('NUARIO', '15', '119'),	
	('PALMIRA', '16', '119'),	
	('PEÑA BLANCA', '17', '119'),	
	('RIO HONDO', '18', '119'),	
	('SAN JOSE', '19', '119'),	
	('SAN MIGUEL', '20', '119'),	
	('SANTO DOMINGO', '21', '119'),	
	('SESTEADERO', '22', '119'),	
	('VALLE RICO', '23', '119'),	
	('VALLERIQUITO', '24', '119'),

	('LA VILLA DE LOS SANTOS (CABECE', '1', '120'),	
	('EL GUASIMO', '2', '120'),	
	('LA COLORADA', '3', '120'),	
	('LA ESPIGADILLA', '4', '120'),	
	('LAS CRUCES', '5', '120'),	
	('LAS GUABAS', '6', '120'),	
	('LOS ANGELES', '7', '120'),	
	('LOS OLIVOS', '8', '120'),	
	('LLANO LARGO', '9', '120'),	
	('SABANAGRANDE', '10', '120'),	
	('SANTA ANA', '11', '120'),	
	('TRES QUEBRADAS', '12', '120'),	
	('AGUA BUENA', '13', '120'),	
	('VILLA LOURDES', '14', '120'),	

	('MACARACAS (CABECERA)', '1', '121'),	
	('BAHIA HONDA', '2', '121'),	
	('BAJOS DE GUERA', '3', '121'),	
	('COROZAL', '4', '121'),	
	('CHUPA', '5', '121'),	
	('EL CEDRO', '6', '121'),	
	('ESPINO AMARILLO', '7', '121'),	
	('LA MESA', '8', '121'),	
	('LAS PALMAS', '9', '121'),	
	('LLANO DE PIEDRA', '10', '121'),	
	('MOGOLLON', '11', '121'),

	('PEDASI (CABECERA)', '1', '122'),	
	('LOS ASIENTOS', '2', '122'),	
	('MARIABE', '3', '122'),	
	('PURIO', '4', '122'),	
	('ORIA ARRIBA', '5', '122'),	

	('POCRI', '1', '123'),	
	('EL CAÑAFISTULO', '2', '123'),	
	('LAJAMINA', '3', '123'),	
	('PARAISO', '4', '123'),	
	('PARITILLA', '5', '123'),

	('TONOSI (CABECERA)', '1', '124'),	
	('ALTOS DE GUERA', '2', '124'),	
	('CAÑAS', '3', '124'),	
	('EL BEBEDERO', '4', '124'),	
	('EL CACAO', '5', '124'),	
	('EL CORTEZO', '6', '124'),	
	('FLORES', '7', '124'),	
	('GUANICO', '8', '124'),	
	('LA TRONOSA', '9', '124'),	
	('CAMBUTAL', '10', '124'),	
	('ISLA DE CAQAS', '11', '124'),

	('SAN MIGUEL (CABECERA)', '1', '125'),	
	('LA ENSENADA', '2', '125'),	
	('LA ESMERALDA', '3', '125'),	
	('LA GUINEA', '4', '125'),	
	('PEDRO GONZALEZ', '5', '125'),	
	('SABOGA', '6', '125'),

	('CHEPO (CABECERA)', '1', '126'),	
	('CAÑITA', '2', '126'),	
	('CHEPILLO', '3', '126'),	
	('EL LLANO', '4', '126'),	
	('LAS MARGARITAS', '5', '126'),	
	('SANTA CRUZ DE CHININA', '6', '126'),	
	('COMARCA KUNA DE MADUNGANDI', '7', '126'),	
	('TORTI', '8', '126'),

	('CHIMAN (CABECERA)', '1', '127'),	
	('BRUJAS', '2', '127'),	
	('GONZALO VASQUEZ', '3', '127'),	
	('PASIGA', '4', '127'),	
	('UNION SANTEÑA', '5', '127'),

	('SAN FELIPE', '1', '128'),	
	('EL CHORRILLO', '2', '128'),	
	('SANTA ANA', '3', '128'),	
	('LA EXPOSICION O CALIDONIA', '4', '128'),	
	('CURUNDU', '5', '128'),	
	('BETANIA', '6', '128'),	
	('BELLA VISTA', '7', '128'),	
	('PUEBLO NUEVO', '8', '128'),	
	('SAN FRANCISCO', '9', '128'),	
	('PARQUE LEFEVRE', '10', '128'),	
	('RIO ABAJO', '11', '128'),	
	('JUAN DIAZ', '12', '128'),	
	('PEDREGAL', '13', '128'),	
	('ANCON', '14', '128'),	
	('CHILIBRE', '15', '128'),	
	('LAS CUMBRES', '16', '128'),	
	('PACORA', '17', '128'),	
	('SAN MARTIN', '18', '128'),	
	('TOCUMEN', '19', '128'),	
	('LAS MAQANITAS', '20', '128'),	
	('24 DE DICIEMBRE', '21', '128'),	
	('ERNESTO CORDOBA CAMPOS', '22', '128'),	
	('ALCALDE DIAZ', '23', '128'),	
	('CAIMITILLO', '24', '128'),	
	('DON BOSCO', '25', '128'),	
	('LAS GARZAS', '26', '128'),

	('AMELIA DENIS DE ICAZA', '1', '129'),	
	('BELISARIO PORRAS', '2', '129'),	
	('JOSE DOMINGO ESPINAR', '3', '129'),	
	('MATEO ITURRALDE', '4', '129'),	
	('VICTORIANO LORENZO', '5', '129'),	
	('ARNULFO ARIAS', '6', '129'),	
	('BELISARIO FRIAS', '7', '129'),	
	('OMAR TORRIJOS', '8', '129'),	
	('RUFINA ALFARO', '9', '129'),

	('TABOGA (CABECERA)', '1', '130'),	
	('OTOQUE ORIENTE', '2', '130'),	
	('OTOQUE OCCIDENTE', '3', '130'),

	('ATALAYA (CABECERA)', '1', '131'),	
	('EL BARRITO', '2', '131'),	
	('LA MONTAÑUELA', '3', '131'),	
	('LA CARRILLO', '4', '131'),	
	('SAN ANTONIO', '5', '131'),	

	('CALOBRE (CABECERA)', '1', '132'),	
	('BARNIZAL', '2', '132'),	
	('CHITRA', '3', '132'),	
	('EL COCLA', '4', '132'),	
	('EL POTRERO', '5', '132'),	
	('LA LAGUNA', '6', '132'),	
	('LA RAYA DE CALOBRE', '7', '132'),	
	('LA TETILLA', '8', '132'),	
	('LA YEGUADA', '9', '132'),	
	('LAS GUIAS', '10', '132'),	
	('MONJARAS', '11', '132'),	
	('SAN JOSE', '12', '132'),

	('CAÑAZAS (CABECERA)', '1', '133'),	
	('CERRO PLATA', '2', '133'),	
	('EL PICADOR', '3', '133'),	
	('LOS VALLES', '4', '133'),	
	('SAN JOSE', '5', '133'),	
	('SAN MARCELO', '6', '133'),	
	('EL AROMILLO', '7', '133'),

	('LA MESA (CABECERA)', '1', '134'),
	('BISVALLES', '2', '134'),
	('BORO', '3', '134'),
	('LLANO GRANDE', '4', '134'),
	('SAN BARTOLO', '5', '134'),
	('LOS MILAGROS', '6', '134'),

	('LAS PALMAS (CABECERA)', '1', '135'),
	('CERRO DE CASA', '2', '135'),
	('COROZAL', '3', '135'),
	('EL MARIA', '4', '135'),
	('EL PRADO', '5', '135'),
	('EL RINCON', '6', '135'),
	('LOLA', '7', '135'),
	('PIXVAE', '8', '135'),
	('PUERTO VIDAL', '9', '135'),
	('SAN MARTIN DE PORRES', '10', '135'),
	('VIGUI', '11', '135'),
	('ZAPOTILLO', '12', '135'),

	('MONTIJO (CABECERA)', '1', '136'),
	('ARENAS', '2', '136'),
	('GOBERNADORA', '3', '136'),
	('LA GARCEANA', '4', '136'),
	('LEONES', '5', '136'),
	('CEBACO', '6', '136'),
	('COSTA HERMOSA', '7', '136'),
	('UNION DEL NORTE', '8', '136'),
	('TEBARIO', '9', '136'),
	('EL PILON', '10', '136'),

	('RIO DE JESUS (CABECERA)', '1', '137'),
	('LAS HUACAS', '2', '137'),
	('LOS CASTILLOS', '3', '137'),
	('UTIRA', '4', '137'),
	('CATORCE DE NOVIEMBRE', '5', '137'),

	('SAN FRANCISCO (CABECERA)', '1', '138'),
	('CORRAL FALSO', '2', '138'),
	('LOS HATILLOS', '3', '138'),
	('REMANCE', '4', '138'),
	('SAN JUAN', '5', '138'),
	('SAN JOSE', '6', '138'),

	('SANTA FE (CABECERA)', '1', '139'),
	('CALOVEBORA', '2', '139'),
	('EL ALTO', '3', '139'),
	('EL CUAY', '4', '139'),
	('EL PANTANO', '5', '139'),
	('GATU O GATUCITO', '6', '139'),
	('RIO LUIS', '7', '139'),

	('SANTIAGO (CABECERA)', '1', '140'),
	('LA COLORADA', '2', '140'),
	('LA PEÑA', '3', '140'),
	('LA RAYA DE SANTA MARIA', '4', '140'),
	('PONUGA', '5', '140'),
	('SAN PEDRO DEL ESPINO', '6', '140'),
	('CANTO DEL LLANO', '7', '140'),
	('LOS ALGARROBOS', '8', '140'),
	('CARLOS SANTANA AVILA', '9', '140'),
	('EDWIN FABREGA', '10', '140'),
	('SAN MARTIN DE PORRES', '11', '140'),
	('URRACA', '12', '140'),

	('SONA (CABECERA)', '1', '141'),
	('BAHIA HONDA', '2', '141'),
	('CALIDONIA', '3', '141'),
	('CATIVE', '4', '141'),
	('EL MARAÑON', '5', '141'),
	('GUARUMAL', '6', '141'),
	('LA SOLEDAD', '7', '141'),
	('QUEBRADA DE ORO', '8', '141'),
	('RIO GRANDE', '9', '141'),
	('RODEO VIEJO', '10', '141'),

	('LLANO DE CATIVAL O MARIATO (CABECERA)', '1', '142'),
	('ARENAS', '2', '142'),
	('EL CACAO', '3', '142'),
	('QUEBRO', '4', '142'),
	('TEBARIO', '5', '142'),

	('NARGANA (CABECERA)', '1', '143'),
	('AILIGANDI', '2', '143'),
	('PUERTO OBALDIA', '3', '143'),
	('TUBUALA', '4', '143'),

	('CIRILO GUAINORA (CABECERA)', '1', '144'),
	('LAJAS BLANCAS', '2', '144'),
	('MANUEL ORTEGA', '3', '144'),

	('RIO SABALO', '1', '145'),
	('JINGURUDO', '2', '145'),

	('SOLOY (CABECERA)', '1', '146'),
	('BOCA DE BALSA', '2', '146'),
	('CAMARON ARRIBA', '3', '146'),
	('CERRO BANCO', '4', '146'),
	('CERRO DE PATENA', '5', '146'),
	('EMPLANADA DE CHORCHA', '6', '146'),
	('NAMNONI', '7', '146'),
	('NIBA', '8', '146'),

	('HATO PILON (CABECERA)', '1', '147'),
	('CASCABEL', '2', '147'),
	('HATO COROTU', '3', '147'),
	('HATO CULANTRO', '4', '147'),
	('HATO JOBO', '5', '147'),
	('HATO JULI', '6', '147'),
	('QUEBRADA DE LORO', '7', '147'),
	('SALTO DUPI', '8', '147'),

	('CHICHICA (CABECERA)', '1', '148'),
	('ALTO CABALLERO', '2', '148'),
	('BAKAMA', '3', '148'),
	('CERRO CAÑA', '4', '148'),
	('CERRO PUERCO', '5', '148'),
	('KRUA', '6', '148'),
	('MARACA', '7', '148'),
	('NIBRA', '8', '148'),
	('PEÑA BLANCA', '9', '148'),
	('ROKA', '10', '148'),
	('SITIO PRADO', '11', '148'),
	('UMANI', '12', '148'),

	('CERRO IGLESIAS (CABECERA)', '1', '149'),
	('HATO CHAMI', '2', '149'),
	('JADEBERI', '3', '149'),
	('LAJERO', '4', '149'),
	('SUSAMA', '5', '149'),

	('BUENOS AIRES (CABECERA)', '1', '150'),
	('AGUA DE SALUD', '2', '150'),
	('ALTO DE JESUS', '3', '150'),
	('CERRO PELADO', '4', '150'),
	('EL BALE', '5', '150'),
	('EL PAREDON', '6', '150'),
	('EL PIRO', '7', '150'),
	('GUAYABITO', '8', '150'),
	('GUIBALE', '9', '150'),

	('BISIRA (CABECERA)', '1', '151'),
	('BURI', '2', '151'),
	('GUARIVIARA', '3', '151'),
	('GUORONI', '4', '151'),
	('KANKINTU', '5', '151'),
	('MUNUNI', '6', '151'),
	('PIEDRA ROJA', '7', '151'),
	('TUWAI', '8', '151'),
	('MAN CREEK', '9', '151'),

	('KUSAPIN (CABECERA)', '1', '152'),
	('BAHIA AZUL', '2', '152'),
	('CALOVEBORA O SANTA CATALINA', '3', '152'),
	('LOMA YUCA', '4', '152'),
	('RIO CHIRIQUI', '5', '152'),
	('TOBOBE', '6', '152'),
	('VALLE BONITO', '7', '152'),

	('ARRAIJAN (CABECERA)', '1', '155'),
	('BURUNGA', '2', '155'),
	('CERRO SILVESTRE', '3', '155'),
	('JUAN DEMOSTENES AROSEMENA', '4', '155'),
	('NUEVO EMPERADOR', '5', '155'),
	('SANTA CLARA', '6', '155'),
	('VERACRUZ', '7', '155'),
	('VISTA ALEGRE', '8', '155'),

	('CAPIRA (CABECERA)', '1', '156'),
	('CAIMITO', '2', '156'),
	('CAMPANA', '3', '156'),
	('CERMEÑO', '4', '156'),
	('CIRI DE LOS SOTOS', '5', '156'),
	('CIRI GRANDE', '6', '156'),
	('EL CACAO', '7', '156'),
	('LA TRINIDAD', '8', '156'),
	('LAS OLLAS ARRIBA', '9', '156'),
	('LIDICE', '10', '156'),
	('VILLA CARMEN', '11', '156'),
	('VILLA ROSARIO', '12', '156'),
	('SANTA ROSA', '13', '156'),

	('CHAME (CABECERA)', '1', '157'),
	('BEJUCO', '2', '157'),
	('BUENOS AIRES', '3', '157'),
	('CABUYA', '4', '157'),
	('CHICA', '5', '157'),
	('EL LIBANO', '6', '157'),
	('LAS LAJAS', '7', '157'),
	('NUEVA GORGONA', '8', '157'),
	('PUNTA CHAME', '9', '157'),
	('SAJALICES', '10', '157'),
	('SORA', '11', '157'),

	('BARRIO BALBOA', '1', '158'),
	('BARRIO COLON', '2', '158'),
	('AMADOR', '3', '158'),
	('AROSEMENA', '4', '158'),
	('EL ARADO', '5', '158'),
	('EL COCO', '6', '158'),
	('FEUILLET', '7', '158'),
	('GUADALUPE', '8', '158'),
	('HERRERA', '9', '158'),
	('HURTADO', '10', '158'),
	('ITURRALDE', '11', '158'),
	('LA REPRESA', '12', '158'),
	('LOS DIAZ', '13', '158'),
	('MENDOZA', '14', '158'),
	('OBALDIA', '15', '158'),
	('PLAYA LEONA', '16', '158'),
	('PUERTO CAIMITO', '17', '158'),
	('SANTA RITA', '18', '158'),

	('SAN CARLOS (CABECERA)', '1', '159'),
	('EL ESPINO', '2', '159'),
	('EL HIGO', '3', '159'),
	('GUAYABITO', '4', '159'),
	('LA ERMITA', '5', '159'),
	('LA LAGUNA', '6', '159'),
	('LAS UVAS', '7', '159'),
	('LOS LLANITOS', '8', '159'),
	('SAN JOSE', '9', '159');


CREATE TABLE IF NOT EXISTS  `consumidor` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `codigo` varchar(5) DEFAULT NULL,
  `cedula` varchar(15) DEFAULT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `apellido` varchar(75) DEFAULT NULL,
  `fechaNacimiento` timestamp NULL DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `genero` enum('Masculino','Femenino') NOT NULL DEFAULT 'Masculino',
  `telefono` varchar(15) DEFAULT NULL,
  `tipoConsumidor` enum('Normal','Embarazada','Discapacitado','Jubilado') NOT NULL DEFAULT 'Normal',
  `solicitudId` int(11) NOT NULL,
  `infoextra` text DEFAULT NULL,
  `usuarioId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  FOREIGN KEY (solicitudId) REFERENCES solicitud(id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
