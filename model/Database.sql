

CREATE DATABASE `ecoproducts`;
USE `ecoproducts`;



CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(100)  NOT NULL
);



INSERT INTO `administradores` (`id`, `usuario`, `nombre`, `clave`) VALUES
(1, 'admin', 'Diego', '21232f297a57a5a743894a0e4a801fc3');



CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
);

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Medicamentos'),
(2, 'Cuidado Personal'),
(7, 'Crónicos'),
(9, ' Vitaminas y Minerales');


CREATE TABLE `compra` (
  `id_usuario` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `tipo_pago` varchar(50) NOT NULL,
  `fecha_pago` varchar(50) NOT NULL,
  `order_id` double NOT NULL,
  `total` int(11) NOT NULL,
  `entregado` int(11) NOT NULL
);


INSERT INTO `compra` (`id_usuario`, `id_compra`, `estado`, `tipo_pago`, `fecha_pago`, `order_id`, `total`, `entregado`) VALUES
(65, 1297496036, 'approved', 'credit_card', '2022-07-18 21:12:01', 5238940745, 0, 0),
(67, 1297493197, 'approved', 'credit_card', '2022-07-18 21:14:52', 5238977129, 38951, 1);


CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(10) NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL
);

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `id_categoria`, `activo`) VALUES
(9, ' Tapsin Plus Noche Paracetamol 650 mg Solución Oral 1 Sobre ', 'Rápido alivio de los síntomas de la gripe y el resfrío común, la gripe y la congestión, indicado incluso como antigripal en casos de intolerancia o alergia al ácido acetilsalicílico. ', 690, '20220718192834.jpg', 1, 1),
(32, 'Propolis x 60 comprimidos', 'Presentación: Frasco x 60 comp.\r\nPrecauciones: No deben ingerir este alimento los Celiacos, personas con alergia a pescados y mariscos, soya, nueces y frutos secos y a leche y sus derivados, incluyendo intolerantes a la lactosa. No consumir en caso de alergia conocida a productos apícolas.\r\nAlmacenamiento: Mantener en lugar fresco y seco a no más de 25 C\r\nModo de uso: Uno a dos comprimidos al día con agua o jugos.\r\nAdvertencias: No deben ingerir este alimento los Celiacos.  Mantener en lugar fresco y seco a no más de 25 C y fuera del alcance de los niños.\r\nBeneficios del producto:  Todas las propiedades naturales del Propóleo en forma de comprimidos para cuidar la salud de tu familia.\r\nIngredientes: Propóleo.', 6990, '20220717220117.jpg', 1, 1),
(33, 'Ibuprofeno 400 mg 20', 'La cantidad a despachar será revisada por el químico farmacéutico según tratamiento adecuado.Precio por producto fraccionado: $39Cada comprimido contiene 400 mg de Ibuprofeno.Indicaciones: Tratamiento sintomático de estados inflamatorio dolorosos leves a moderados y/o estados febriles. Tratamiento de dismenorrea. Alivio de los síntomas y signos de artritis reumatoidea y osteoartritis.Posología: Administración oral. Rango y frecuencia: el médico debe indicar la posología y el tiempo de tratamiento apropiado a su caso particular, no obstante la dosis usual recomendada es: 200 a 800 mg 3 a 4 veces al día. La dosis máxima diaria no debe pasar los 3200 mg. Consejo de cómo administrarlo: puede tomarlo en conjunto con alimentos, leche o antiácidos para evitar malestar estomacal. Uso prolongado: el uso prolongado de este medicamento puede causar problemas estomacales (úlceras), inflamación del hígado, problemas a los riñones y hemorragias. No se recomienda tomarlo, sin vigilancia médica, más de 7 días para el tratamiento del dolor o más de 3 días si lo ha estado tomando para el control de la fiebre.Contraindicaciones: No se debe usar AINES con excepción de ácido acetilsalicílico en el período inmediato a una cirugía de by-pass coronario.', 773, '20220717232007.jpg', 1, 1),
(34, 'Mascarilla Desechable Plana 3 Unidades', ' Mascarilla Desechable Plana 3 UnidadesBeneficios    Cubre boca y nariz    Filtra los principales gérmenes del ambiente    Ayuda a evitar contagios de virus y bacterias    Es útil en cuidado de enfermos, procedimientos clínicos y hospitalarios    Protege contra salpicaduras de sangre y saliva    Ajuste anatómico', 990, '20220718193332.jpg', 2, 1),
(35, 'Mintavit-C Acido Ascorbico 100 mg 100 Comprimido', 'El ácido ascórbico se usa para prevenir y tratar el escorbuto, una enfermedad provocada por la carencia de vitamina C en el cuerpo. Algunas formas de ácido ascórbico contienen sodio y deben evitarse si usted mantiene un régimen bajo en contenido de sal y sodioEl ácido ascórbico o vitamina C, es una vitamina hidrosoluble presente en frutas y vegetales tales como los cítricos y las verduras frescas. El ácido ascórbico es una antioxidante y captador de radicales libres y es considerado en este sentido más eficaz que la vitamina E o el beta-caroteno.', 1990, '20220717220442.jpg', 1, 1),
(36, 'Shampoo Manzana Fresh 400 mL', 'Micro burbujas. Hasta 100% libre de caspa', 4299, '20220718193324.jpg', 2, 1),
(37, 'Agua Oxigenada 10 Volúmenes x 500 ml', 'La cantidad a despachar sera revisada por el químico farmacéutico según tratamiento adecuado. Indicaciones: Limpieza de heridas o úlceras de la piel o mucosas e infecciones locales. Como enjuagatorio debe usarse diluida para el alivio de ciertas infecciones bucofaríngeas.', 990, '20220717220632.jpg', 1, 1),
(39, 'Bion 3 Senior Vitaminas 30 Comprimidos Recubierto', 'Tomar máximo 1 comprimido recubierto al día con suficiente líquido. Contraindicaciones: El producto no debe ser usado en caso de hipersensibilidad conocida a algunos de los ingredientes. ', 13672, '20220718193443.jpg', 9, 1),
(40, 'Elcal Flex Colageno Hidrolizado Polvo Suspension Oral 30 Sobres', 'Elcal Flex se presenta en forma de polvo para suspensión oral en sobre.', 19990, '20220718194805.jpg', 1, 1);



ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_usuario`);


ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `compra`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;


ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
