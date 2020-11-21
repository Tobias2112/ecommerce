-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2019 a las 01:41:13
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `atomic_comic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comics`
--

CREATE TABLE `comics` (
  `id` int(11) NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `empresa` text COLLATE utf8_spanish_ci NOT NULL,
  `id_heroe` int(11) NOT NULL,
  `producto` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comics`
--

INSERT INTO `comics` (`id`, `imagen`, `nombre`, `descripcion`, `precio`, `empresa`, `id_heroe`, `producto`) VALUES
(25, '25.png', 'Iron Man: Extremis (Marvel integral)', 'La aventura de Iron Man mÃ¡s influyente de todos los tiempos. Warren Ellis y Adi Granov se unen en un exultante esfuerzo por redefinir al hÃ©roe de la armadura dorada de cara al siglo XXI. Una tecnologÃ­a de nueva creaciÃ³n amenaza con esclavizar a la humanidad. Â¿QuÃ© es Extremis y quiÃ©n la ha desatado sobre la tierra?\r\n\r\n', 2116, 'Marvel', 1, 'Comic'),
(26, 'iron_man_98.jpg', 'Invencible Iron Man 98', 'â€œLa Edad del Hierroâ€, partes 5 y 6. La misiÃ³n de Tony Stark casi estÃ¡ completada, pero antes de que eso ocurra, tendrÃ¡ que verse envuelto en una batalla entre La Patrulla-X, el Club Fuego Infernal, la propia FÃ©nix... y la estrella disco llamada Dazzler.', 231, 'Marvel', 1, 'Comic'),
(27, 'thor_motor_mundo.jpg', 'Thor: El Motor Del Mundo', 'Â¡El visionario escritor Warren Ellis desembarca en la colecciÃ³n del Dios del Trueno! OcurriÃ³ durante un corto espacio de tiempo, que sin embargo revolucionÃ³ la colecciÃ³n de Thor. Junto a la superestrella Mike Deodato Jr., actualizÃ³ grandes conceptos para el pÃºblico de los aÃ±os noventa.', 1039, 'Marvel', 3, 'Comic'),
(28, 'thor_origen.jpg', 'Thor: Origen', 'Los primeros dÃ­as del Dios del Trueno como sÃ³lo Pepe Larraz podrÃ­a haberlos dibujado. En la corte de Asgard, no hay nadie mÃ¡s fuerte, atrevido y arrogante que Thor, pero sus dÃ­as de aplastar trolls se acercan a su fin. Pronto aprenderÃ¡ la mayor lecciÃ³n de humildad.', 982, 'Marvel', 3, 'Comic'),
(29, 'cap_america_opreacion.jpg', 'CAPITÃN AMÃ‰RICA: OPERACIÃ“N RENACIMIENTO', '\r\nLa primera y monumental aventura de Mark Waid y Ron Garney al frente de las aventuras del CapitÃ¡n AmÃ©rica, en un tomo imprescindible. El Centinela de la Libertad vuelve a sus raÃ­ces, para reencontrarse con su peor enemigo, pero tambiÃ©n con una persona que dio por muerta hace mucho, mucho tiempo.', 1039, 'Marvel', 8, 'Comic'),
(31, 'remender_capi_2.jpg', 'CAP. AMÃ‰RICA DE RICK REMENDER 02: EL CLAVO DE HIERRO ', 'Tras su vuelta a casa desde la DimensiÃ³n Z, Steve Rogers vuelve a ser un hombre fuera del tiempo que debe afrontar las repercusiones de la larga dÃ©cada que estuvo desaparecido. Mientras, alguien ha dejado a Nuke suelto en un paÃ­s extranjero... Â¡Y es incontrolable!', 1617, 'Marvel', 8, 'Comic'),
(32, 'hulk_7.jpg', 'EL INMORTAL HULK 07 (82)', 'â€œHulk en el infiernoâ€, partes 1 y 2. Jackie McGee estÃ¡ en el infierno. Carl Creel estÃ¡ en el infierno. Walter Langkowski estÃ¡ en el infierno. Nuevo MÃ©xico estÃ¡ en el infierno. La Tierra estÃ¡ en el infierno. Todos estamos en el infierno. Y tambiÃ©n El Inmortal Hulk.', 260, 'Marvel', 5, 'Comic'),
(33, 'hulk_8.jpg', 'EL INMORTAL HULK 08 (83)', 'Aquel que se oculta bajo todo lo que existe estÃ¡ ahora al mando, y Bruce Banner le pertenece. El Infierno tomarÃ¡ la Tierra. Pero hay dos personas en el Infierno lo suficientemente fuertes para persistir. Puck... y El Inmortal Hulk.', 260, 'Marvel', 5, 'Comic'),
(34, 'saga_capitana.jpg', 'CAPITANA MARVEL 02: AMANECER (Marvel saga 85)', 'Monica Rambeau, la primera mujer que tuviera el tÃ­tulo, ha vuelto. Â¿QuÃ© problema tiene con Carol Danvers? Â¿Y quÃ© se oculta bajo la superficie del ocÃ©ano que obligarÃ¡ a ambas a unir fuerzas? AdemÃ¡s, el regreso a casa... Pero todo ha cambiado. Â¿Y quÃ© estÃ¡ sucediendo con los poderes de Carol?', 924, 'Marvel', 6, 'Comic'),
(35, 'mexshmma259.jpg', 'CAPITANA MARVEL 04: RUMBO A SECRET WARS', 'Un regreso por todo lo alto! A tiempo para su papel decisivo en \"Civil War II\", Carol Danvers vuelve por todo lo alto, con un volumen que muestra todas las aventuras inÃ©ditas de la Capitana Marvel previas a \"Secret Wars\". Invitado especial: Mapache Cohete.', 953, 'Marvel', 6, 'Comic'),
(36, 'miles_morales_2.jpg', 'MILES MORALES: SPIDER-MAN 02', '\r\nCon la ayuda del CapitÃ¡n AmÃ©rica, Miles trata de llegar al fondo del misterio de los niÃ±os desaparecidos, pero no va a ser sencillo. AdemÃ¡s, en la escuela estÃ¡n hartos de las ausencias y retrasos de Miles. Â¡El Subdirector Drutcher quiere averiguar quÃ© oculta!', 231, 'Marvel', 2, 'Comic'),
(37, 'first_level_19.jpg', 'MARVEL FIRST LEVEL 19: ULTIMATE SPIDER-MAN. GUERREROS ARAÃ‘A', 'El comienzo de una nueva era de aventuras, en la que Spiderman une fuerzas con los mayores hÃ©roes del Universo Marvel: CapitÃ¡n AmÃ©rica, Iron Man, Ojo de HalcÃ³n y muchos mÃ¡s, en la adaptaciÃ³n de la teleserie arÃ¡cnida que triunfa en la pequeÃ±a pantalla.', 577, 'Marvel', 2, 'Comic'),
(38, 'clean.jpg', 'Doctor Strange 10', 'Â¿La Tierra no estÃ¡ accesible? Â¡No importa! Ahora Galactus estÃ¡ desatado en otras dimensiones. Â¿QuÃ© efectos tendrÃ¡ la ingesta de sus planetas sobre el Devorador de Mundos? Â¡Stephen ExtraÃ±o debe asegurarse que los efectos no lo destruyan todo!', 127, 'Marvel', 4, 'Comic'),
(39, 'Ds.jpg', 'Doctor Strange 05', 'Stephen ExtraÃ±o estÃ¡ de nuevo en la Tierra, y sabe cÃ³mo construir su propio arsenal. Â¡Va a hacerle falta! Sus problemas han continuado creciendo mientras se encontraba ausente, y aunque utilice la magia para resolverlo... tambiÃ©n tendrÃ¡ que luchar contra sÃ­ mismo.', 231, 'Marvel', 4, 'Comic'),
(40, 'pantera-negra-01-imperio.jpg', 'Pantera Negra 01: Imperio', 'Una nueva direcciÃ³n para el rey de Wakanda. Durante aÃ±os, Tâ€™Challa ha combatido a los invasores de su naciÃ³n. Ahora, descubrirÃ¡ que ese reino es mucho mÃ¡s grande de lo que jamÃ¡s imaginÃ³. Bienvenido al Imperio IntergalÃ¡ctico de Wakanda.', 866, 'Marvel', 7, 'Comic'),
(41, 'pantera_hudlin.jpg', 'Pantera Negra De Hudlin 01: Â¿Quien es pantera negra?', 'Â¡El arranque de la era moderna para Tâ€™Challa! Reginald Hudlin moderniza el mito, desde su origen, con John Romita Jr. a los lÃ¡pices, hasta la bÃºsqueda de la esposa perfecta para Pantera Negra, y un encuentro con un viejo amor que lo cambia todo.', 1730, 'Marvel', 7, 'Comic'),
(42, 'quien-es-wonder-woman-comic-heinberg-de-bolsillo-D_NQ_NP_784012-MLA27850509435_072018-F.jpg', 'Â¿Quien Es Wonder Woman?', 'Hace casi un aÃ±o que nadie ha visto a Diana, la guerrera amazona... que ha cedido el manto de Wonder Woman a Donna Troy, su hermana! Pero cuando Diana regresa por fin, lo hace de incÃ³gnito con su anterior identidad de Diana Prince, agente secreta y miembro del Departamento de Asuntos Metahumanos. Y su primera misiÃ³n consiste en... salvar a Donna Troy, un reto que la obligarÃ¡ a enfrentarse a sus peores enemigos. Sin embargo, Â¿volverÃ¡ a asumir su identidad de Wonder Woman?', 579, 'DC', 16, 'Comic'),
(43, 'descargar.jfif', 'Wonder Woman #14 - Dc Renacimiento', 'Â¿EstÃ¡ preparado el mundo del hombre para abrazar el modo de vida y la justicia de las Amazonas? El escritor Steve Orlando (Liga de la Justicia de AmÃ©rica) profundiza en esta posibilidad en una nueva entrega de la serie bimestral de la Mujer Maravilla, ideal para engancharse a las aventuras del icono del Universo DC. Diana tiene un proyecto que le llevarÃ¡ a viajar por todo el globo y a enfrentarse a la espada llameante de Rustam y a la furia de su Â¿aliada? Artemisa. ', 1125, 'DC', 16, 'Comic'),
(44, 'hijo rojo.jpg', 'Hijo Rojo', 'Imagina que la nave de Kal-El hubiera caÃ­do en la vieja UniÃ³n SoviÃ©tica. Imagina despuÃ©s a un Superman adulto que, en vez de luchar por la â€œverdad, la justicia y el estilo de vida americanoâ€, defendiera absolutamente lo contrario bajo el eslogan â€œStalin, comunismo y Pacto de Varsoviaâ€. Ahora incorpora en este contexto a un terrorista llamado Batman, al eminente doctor Lex Luthor, a la princesa Diana de Themyscira, a Brainiac, al agente federal James Olsen y a muchos de los personajes mÃ¡s emblemÃ¡ticos del Universo DC. Â¿Ya te lo has imaginado? Pues ahora descÃºbrelo todo en el fascinante mundo alternativo de Superman Hijo Rojo.', 580, 'DC', 15, 'Comic'),
(45, 'all star.jpg', 'All Star Superman', 'Pocas veces el tÃ­tulo de un cÃ³mic es tan acertado como este. All Star Superman es una historia arrebatadora en la que se dan cita â€œtodas las estrellasâ€ del universo de Superman para crear una aventura que aÃºna un guion soberbio, un dibujo fuera de serie y una Ã©pica como nunca se ha visto.', 950, 'DC', 15, 'Comic'),
(46, 'UnaCitaHarley2.jpg', 'Una Cita Con Harley # 02 Green Lantern', 'El negro y el rojo son los colores de Harley Quinn... asÃ­ que cuando aparece un anillo de poder con esa combinaciÃ³n, ella no tiene mÃ¡s remedio que aÃ±adirlo a su colecciÃ³n de complementos, Â¿no harÃ­ais lo mismo en su lugar? Desafortunadamente para Harley (y, en realidad, para todos los habitantes del universo), este anillo hÃ­brido se alimenta de la fuerza de la muerte y de la rabia... \r\n', 245, 'DC', 14, 'Comic'),
(47, 'La_Muerte_de_Green_Lantern.jpg', 'La Muerte De Green Lantern', 'Coast City ya no existe, y Hal Jordan no es capaz de superar la tragedia. AsÃ­, quien fuera el mejor Green Lantern de la historia se sume en una locura que culmina con su transformaciÃ³n en Parallax, un peligroso supervillano.\r\nLa muerte de Green Lantern recopila el descenso a los infiernos de este icono del Universo DC, desde la cÃ©lebre saga CrepÃºsculo esmeralda hasta su participaciÃ³n en eventos como Hora cero o La noche final, ademÃ¡s de sus encuentros con Kyle Rayner, su sucesor.\r\n', 2674, 'DC', 14, 'Comic'),
(48, '37cccd2f-acd0-4677-a79b-6c17ef25eb1a.jpg', 'Gren Arrow Triple Amenaza', 'Buddy Baker es la encarnaciÃ³n del Rojo en la Tierra y, como tal, puede duplicar las habilidades de cualquier animal. A diario, compagina el oficio de superhÃ©roe con la profesiÃ³n de actor y con las obligaciones de esposo y padre. Para proteger a su familia (amenazada por un plan del tortuoso Arcane), viaja al reino de la PutrefacciÃ³n, donde une fuerzas con Frankenstein y con la Cosa del Pantano. Vuelve a casa triunfante, pero a su regreso asiste impotente a la muerte de su hijo. Desde entonces su vida se desmorona.', 974, 'DC', 13, 'Comic'),
(49, 'green_arrow_111-814de490ecce89603015521503153614-1024-1024.jpg', 'Green Arrow Vol. 2 # 11 ', 'Â¡Nueva periodicidad trimestral! Â¡La conclusiÃ³n de algunas de las tramas mÃ¡s longevas de la serie! Green Arrow y Canario Negro deben evitar que [SPOILER] y [SPOILER] lleven a cabo su plan maestro. Si consiguen sobrevivir, aÃºn tendrÃ¡n que enfrentarse al resultado de un juicio que podrÃ­a cambiar para siempre la vida de Oliver Queen. Este tomo se completa con otro arco argumental cerrado y con el segundo Anual de la serie original USA: Â¡Green Arrow contra Amanda Waller, con conexiones con los sucesos de Liga de la Justicia: Sin Justicia!', 864, 'DC', 13, 'Comic'),
(50, 'TheFlashv5100.jpg', ' Flash Vol. 2 La Velocidad De La Oscuridad', 'HabÃ­a una vez un hombre hecho de oscuridad que finalmente logrÃ³ encontrar la felicidadâ€¦\r\n Central city, hoy. Barry corre por el parque junto a Iris pensando en la fuerza invisible que ha originado cambios al universo y que el Wally adulto pudo descubrir al haber estado atrapado en la Speed Force. Barry se pregunta si asÃ­ como pudo olvidar a Wally, Â¿serÃ¡ posible que haya olvidado tambiÃ©n a algunos villanos?...', 600, 'DC', 12, 'Comic'),
(51, 'flash1-890675a17f265ff3d715609516835022-640-0.jpg', 'Flash Vol. 3 Vuelven Los Villanos Ovni ', 'El CapitÃ¡n FrÃ­o. Mirror Master.\r\nGolden Glider. Weather Wizard.\r\nHeat Wave. Son los peores enemigos\r\nde Flash. Son los Villanosâ€¦\r\ny han estado demasiado\r\ntranquilos. El momento en el que\r\nel Velocista Escarlata comienza\r\na investigar su desapariciÃ³n, su\r\nplan se activa. Â¿SerÃ¡ lo suficientemente\r\nrÃ¡pido para detener\r\ncinco crÃ­menes diabÃ³licos?', 620, 'DC', 12, 'Comic'),
(59, '59.jpg', 'Cyborg - Fantasma Del Pasado ', '\"DespuÃ©s del devastador conflicto contra los Tecnosapiens, las autoridades no estÃ¡n dispuestas a que la tecnologÃ­a se descontrole, sobre todo la que procede de Laboratorios S.T.A.R., lo cual incluye a un Victor que contarÃ¡ con el apoyo de uno de los miembros mÃ¡s poderosos de la Liga de la Justicia, su gran amigo Shazam.\r\nVictor Stone era un atleta prometedor hasta que sufrioÂ´ unas graves heridas durante la invasioÂ´n del vil planeta Apokolips. Por suerte, su padre, un reputado cientiÂ´fico, lo curoÂ´ utilizando la tecnologiÂ´a maÂ´s avanzada y secreta de la Tierra y lo convirtioÂ´ en CiÂ´borg. Tras vivir numerosas aventuras con Batman, Wonder Woman y compan~iÂ´a, llega el momento de pasar a la accioÂ´n en solitario. \"', 1162, 'DC', 11, 'Comic'),
(60, '60.jpg', 'Cyborg Vol. 2', 'Capturado por aquellos en quienes creÃ­a que podÃ­a confiar, Cyborg descubre un plan encubierto para usar tecnologÃ­a alienÃ­gena para comenzar una guerra mundial. Y cuando termina preso en el corazÃ³n de STAR Labs, un plan de escape poco ortodoxo lo enfrenta cara a cara con Anomaly, un hÃ­brido humano-mÃ¡quina creado por Silas, el padre de Cyborg, Â¡aÃ±os antes de que Vic Stone se convirtiera en Cyborg!', 1422, 'DC', 11, 'Comic'),
(61, '61.jpg', 'BATMAN: ARKHAM ASYLUM ', 'Los pacientes del manicomio Arkham comandados por el Joker, se hacen de la instituciÃ³n para posteriormente tomar rehenes; todo esto con el fin de amenazar con asesinar a todas las personas que se encuentran dentro de la instituciÃ³n, si Batman no pasa una noche entre ellos.', 730, 'DC', 9, 'Comic'),
(62, '62.jpg', 'BATMAN: BLACK AND WHITE', 'Batman: Black and White, son un conjunto de historias, muchas de ellas de solo ocho pÃ¡ginas de duraciÃ³n, las cuales nos relatan momentos de las aventuras del caballero oscuro, todas con un tono de gÃ©nero negro, e intrigante.', 1575, 'DC', 9, 'Comic'),
(63, '63.jpeg', 'The Trench', 'Escrito por Geoff Johns y lÃ¡pices de Ivan Reis. Con el lanzamiento del New 52, Johns cumpliÃ³ con su misiÃ³n de reintroducir al mundo a un Aquaman que podrÃ­a tomarse un poco mÃ¡s en serio. Lo logrÃ³ con la historia de la nueva serie titulada â€œThe Trenchâ€œ. En esta historia, Aquaman se enfrenta a un nuevo enemigo desde las profundidades del ocÃ©ano.\r\nEs una reintroducciÃ³n del personaje para toda una nueva generaciÃ³n. El final de esta historia hace que Aquaman tome una decisiÃ³n muy difÃ­cil, que se ganarÃ¡ el respeto del lector.', 1049, 'DC', 3, 'Comic'),
(64, '64.jpeg', 'Throne of Atlantis', 'Escrito por Geoff Johns y dibujo de Ivan Reis. Alguien ha atacado a Atlantis y el hermano de Aquaman, Orm, culpa al mundo de la superficie. Para tomar represalias, Orm envÃ­a sus fuerzas a las ciudades costeras, atacÃ¡ndolas. Aquaman, junto con la Liga de la Justicia, se unen para intentar detener a Orm y su camino de destrucciÃ³n y asesinato.\r\nEsta es la primera vez que el lector obtiene un alcance completo de cuÃ¡n grande es el ejÃ©rcito de Atlantis. No son solo un par de chicos con equipo de buceo. Esto tambiÃ©n se siente como la primera vez, en mucho tiempo, que Orm a.k.a Ocean Master se siente como una persona real y no solo como un villano de la semana para Aquaman. Johns hace un gran trabajo desarrollando al hermano de Arthur.', 773, 'DC', 3, 'Comic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `heroes`
--

CREATE TABLE `heroes` (
  `id_heroe` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `compania` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `heroes`
--

INSERT INTO `heroes` (`id_heroe`, `nombre`, `imagen`, `compania`) VALUES
(1, 'Iron Man', 'iron-man-hero.jpg', 'Marvel'),
(2, 'Spider-Man', 'spiderman.0.0.jpg', 'Marvel'),
(3, 'Thor', 'thor.jpg', 'Marvel'),
(4, 'Doctor Strange', 'doctor-strange.jpeg', 'Marvel'),
(5, 'Hulk', 'hulk_agnarok.0.jpg', 'Marvel'),
(6, 'Capitana Marvel', 'Captain-Marvel-001.jpg', 'Marvel'),
(7, 'Pantera Negra', '0003450866.jpg', 'Marvel'),
(8, 'Capitan America', 'CAptain-America.jpg', 'Marvel'),
(9, 'Batman', 'Batman.jfif', 'DC'),
(10, 'Aquaman', 'aquaman.jfif', 'DC'),
(11, 'Cyborg', 'cyborg.jfif', 'DC'),
(12, 'Flash', 'flash.jfif', 'DC'),
(13, 'Green Arrow', 'ga.jfif', 'DC'),
(14, 'Linterna Verde', 'Gl.jfif', 'DC'),
(15, 'Superman', 'superman.jfif', 'DC'),
(16, 'Wonder Woman', 'WW.jfif', 'DC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prodxventa`
--

CREATE TABLE `prodxventa` (
  `id_pxv` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `precio_u` float NOT NULL,
  `cant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prodxventa`
--

INSERT INTO `prodxventa` (`id_pxv`, `id_venta`, `id_prod`, `precio_u`, `cant`) VALUES
(1, 1, 26, 231, 1),
(2, 2, 25, 2116, 3),
(3, 3, 43, 1125, 3),
(4, 3, 47, 2643, 3),
(5, 3, 45, 950, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `nbr_user` text COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` text COLLATE utf8_spanish_ci NOT NULL,
  `verificacion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `ultima_conexion` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `nbr_user`, `email`, `contrasenia`, `verificacion`, `codigo`, `fecha_registro`, `ultima_conexion`) VALUES
(44, 'Juan', '123@123.com', '202cb962ac59075b964b07152d234b70', 'verificado', '202cb962ac59075b964b07152d234b70b2d7d2d13aed54c2ed7feb538b382b42', '  1569598840', '1569598859'),
(45, 'asd', 'asd@asd.com', '7815696ecbf1c96e6894b779456d330e', 'verificado', '7815696ecbf1c96e6894b779456d330e0eb178cec364c022a189c3814e5f7483', '  1571626088', '1573088353'),
(46, 'Tobias Cipolla', 'tobiascipolla36@gmail.com', 'f7f0a029df57577fc3490a1d37e89222', 'verificado', 'f7f0a029df57577fc3490a1d37e892227bf4b1155a36e793067bd1ab56c4965b', '  1573088773', '1573410182'),
(47, 'asd', 'giroj22298@7dmail.com', '7815696ecbf1c96e6894b779456d330e', 'no verificado', '7815696ecbf1c96e6894b779456d330ed93d46425f788b469db34cb0ceac7dd0', '  1573151533', '1573151533');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `fecha` text COLLATE utf8_spanish_ci NOT NULL,
  `total` float NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `fecha`, `total`, `id_usuario`) VALUES
(1, '1573089480', 231, 46),
(2, '1573093488', 6348, 46),
(3, '1573409686', 16054, 46);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comics`
--
ALTER TABLE `comics`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`id_heroe`);

--
-- Indices de la tabla `prodxventa`
--
ALTER TABLE `prodxventa`
  ADD PRIMARY KEY (`id_pxv`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comics`
--
ALTER TABLE `comics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `heroes`
--
ALTER TABLE `heroes`
  MODIFY `id_heroe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `prodxventa`
--
ALTER TABLE `prodxventa`
  MODIFY `id_pxv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
