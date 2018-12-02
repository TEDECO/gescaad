-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2018 a las 00:31:51
-- Versión del servidor: 5.6.37
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gescaad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Administrador', '1', 1531042545),
('Administrador', '2', 1531235740),
('Producer', '3', 1531235855),
('Supervisor', '4', 1531235847),
('User', '5', 1531235948);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/admin/*', 2, NULL, NULL, NULL, 1531234421, 1531234421),
('/competency/create', 2, NULL, NULL, NULL, 1531234392, 1531234392),
('/competency/delete', 2, NULL, NULL, NULL, 1531234407, 1531234407),
('/competency/update', 2, NULL, NULL, NULL, 1531234402, 1531234402),
('/course/create', 2, NULL, NULL, NULL, 1531234323, 1531234323),
('/course/delete', 2, NULL, NULL, NULL, 1531234347, 1531234347),
('/course/update', 2, NULL, NULL, NULL, 1531234340, 1531234340),
('/language/create', 2, NULL, NULL, NULL, 1531234537, 1531234537),
('/language/delete', 2, NULL, NULL, NULL, 1531234537, 1531234537),
('/language/update', 2, NULL, NULL, NULL, 1531234537, 1531234537),
('/operatingsystem/create', 2, NULL, NULL, NULL, 1531234537, 1531234537),
('/operatingsystem/delete', 2, NULL, NULL, NULL, 1531234537, 1531234537),
('/operatingsystem/update', 2, NULL, NULL, NULL, 1531234537, 1531234537),
('/software/create', 2, NULL, NULL, NULL, 1531234537, 1531234537),
('/software/delete', 2, NULL, NULL, NULL, 1531234537, 1531234537),
('/software/update', 2, NULL, NULL, NULL, 1531234537, 1531234537),
('/video/create', 2, NULL, NULL, NULL, 1531234365, 1531234365),
('/video/delete', 2, NULL, NULL, NULL, 1531234378, 1531234378),
('/video/update', 2, NULL, NULL, NULL, 1531234374, 1531234374),
('Administrador', 1, 'Administrador de portal. Acceso a todos los apartados.', NULL, NULL, 1530732105, 1530732121),
('Producer', 1, 'Video management.', NULL, NULL, 1531235584, 1531235584),
('Supervisor', 1, 'Can manage all tables and data.', NULL, NULL, 1531235433, 1531235433),
('User', 1, 'General user acces.', NULL, NULL, 1531235490, 1531235545);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Administrador', '/admin/*'),
('Administrador', '/competency/create'),
('Producer', '/competency/create'),
('Administrador', '/competency/delete'),
('Producer', '/competency/delete'),
('Administrador', '/competency/update'),
('Producer', '/competency/update'),
('Administrador', '/course/create'),
('Administrador', '/course/delete'),
('Administrador', '/course/update'),
('Administrador', '/language/create'),
('Producer', '/language/create'),
('Administrador', '/language/delete'),
('Producer', '/language/delete'),
('Administrador', '/language/update'),
('Producer', '/language/update'),
('Administrador', '/operatingsystem/create'),
('Producer', '/operatingsystem/create'),
('Administrador', '/operatingsystem/delete'),
('Producer', '/operatingsystem/delete'),
('Administrador', '/operatingsystem/update'),
('Producer', '/operatingsystem/update'),
('Administrador', '/software/create'),
('Producer', '/software/create'),
('Administrador', '/software/delete'),
('Producer', '/software/delete'),
('Administrador', '/software/update'),
('Producer', '/software/update'),
('Administrador', '/video/create'),
('Producer', '/video/create'),
('Administrador', '/video/delete'),
('Producer', '/video/delete'),
('Administrador', '/video/update'),
('Producer', '/video/update'),
('Supervisor', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competency`
--

CREATE TABLE IF NOT EXISTS `competency` (
  `com_id` int(11) NOT NULL COMMENT 'autoincremental automatic index',
  `com_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'competency short description',
  `com_description` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'competency long description',
  `com_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'standard competency codification'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `competency`
--

INSERT INTO `competency` (`com_id`, `com_name`, `com_description`, `com_code`) VALUES
(1, 'Encender el ordenador', 'Conocimiento básico sobre cómo encender el ordenador', 'C1'),
(2, 'Apagar el ordenador', 'Conocimiento básico sobre cómo apagar el ordenador', 'C2'),
(3, 'Enviar un email electrónico', 'Cómo enviar un email electrónico haciendo uso del programa de correo electrónico preinstalado en el sistema', 'CX.1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `cou_id` int(11) NOT NULL COMMENT 'autoincremental automatic index',
  `cou_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'course general description\n.- main theme',
  `cou_totalDuration` int(11) DEFAULT NULL COMMENT 'automatically calculated total length of course\n.- dependent of courseComposition elements\n.- optional, only for optimization purposes (could be calculated in real time)'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `course`
--

INSERT INTO `course` (`cou_id`, `cou_name`, `cou_totalDuration`) VALUES
(8, 'Curso de prueba 1', NULL),
(9, 'Curso de prueba 2', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hasCompetency`
--

CREATE TABLE IF NOT EXISTS `hasCompetency` (
  `hco_id` int(11) NOT NULL,
  `hco_type` enum('goal','requirement') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'goal',
  `video_vid_id` int(11) NOT NULL,
  `competency_com_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `hasCompetency`
--

INSERT INTO `hasCompetency` (`hco_id`, `hco_type`, `video_vid_id`, `competency_com_id`) VALUES
(1, 'goal', 2, 2),
(3, 'goal', 3, 2),
(4, 'requirement', 3, 1),
(5, 'goal', 4, 1),
(6, 'requirement', 4, 2),
(7, 'goal', 5, 2),
(9, 'requirement', 5, 1),
(10, 'goal', 6, 3),
(11, 'requirement', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hasRequirement`
--

CREATE TABLE IF NOT EXISTS `hasRequirement` (
  `hre_id` int(11) NOT NULL,
  `software_sof_id` int(11) NOT NULL,
  `video_vid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hasVideo`
--

CREATE TABLE IF NOT EXISTS `hasVideo` (
  `hvi_id` int(11) NOT NULL COMMENT 'autoincremental automatic index',
  `hvi_order` int(10) unsigned DEFAULT NULL COMMENT 'order of defined video component in course definition',
  `video_vid_id` int(11) NOT NULL,
  `course_cou_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='cco_id';

--
-- Volcado de datos para la tabla `hasVideo`
--

INSERT INTO `hasVideo` (`hvi_id`, `hvi_order`, `video_vid_id`, `course_cou_id`) VALUES
(7, 2, 2, 8),
(8, 3, 3, 8),
(11, 3, 3, 9),
(12, 4, 5, 9),
(13, 1, 3, 9),
(14, 2, 5, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `isCompatible`
--

CREATE TABLE IF NOT EXISTS `isCompatible` (
  `swc_id` int(11) NOT NULL,
  `software_sof_id` int(11) NOT NULL,
  `operatingSystem_ope_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languageLocalization`
--

CREATE TABLE IF NOT EXISTS `languageLocalization` (
  `lan_id` int(11) NOT NULL COMMENT 'autoincremental automatic index',
  `lan_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'language name',
  `lan_naturalReaderCompatible` tinyint(1) DEFAULT NULL COMMENT 'natural reader compatibility\n.- has automatic text speech capabilities (software/libraries) or must we record the specific audio tracks?'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `languageLocalization`
--

INSERT INTO `languageLocalization` (`lan_id`, `lan_name`, `lan_naturalReaderCompatible`) VALUES
(1, 'Spanish', 1),
(2, 'French', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1529768928),
('m140506_102106_rbac_init', 1529769893),
('m140602_111327_create_menu_table', 1529768937),
('m160312_050000_create_user', 1529768937),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1529769893);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operatingSystem`
--

CREATE TABLE IF NOT EXISTS `operatingSystem` (
  `ope_id` int(11) NOT NULL,
  `ope_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'operating system name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software`
--

CREATE TABLE IF NOT EXISTS `software` (
  `sof_id` int(11) NOT NULL COMMENT 'autoincremental automatic index',
  `sof_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'short software name',
  `sof_release` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'software release'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test_admin', 'Ie2APQLnm8J26M9_nyKmNTCh2MKuhMXf', '$2y$13$r3BId4u9lP.cF8/BQVAiaeZWQOTae8KoEzreuSXLrHGLFC0FpHrjy', NULL, 'jmvictoria.test1@outlook.es', 10, 1529769230, 1529769230),
(2, 'admin', 'QPY9JqAXN58UjS3tdTloPQeTaUnYXJLj', '$2y$13$AnBWz1iPbqAqgwHG5TQNpOAMxCXj8Hgwcz5LI6sOzjz6.MP9MHriC', NULL, 'jmvm@alumnos.upm.es', 10, 1531235712, 1531235712),
(3, 'productor', 'r_TVylIHAOqCp2cLS9UThfht8xo8MMdB', '$2y$13$ZdTsR8mlrx53Mxet9FjAOukdseKYN63gLwXssJP8.aH6tRGnJsHtS', NULL, 'jmvictoria.test2@gmail.com', 10, 1531235797, 1531235797),
(4, 'supervisor', 'JX4KeY9Infi_ktOoogmb8TAiIAcfAr0l', '$2y$13$ujkio.3pe/VdcBm.QDMJcu1rofb8YJMXNOK43vdleL4iNE2TF7qkm', NULL, 'jmvictoria.test1@gmail.com', 10, 1531235817, 1531235817),
(5, 'guest', 'gZgTuscQ7yEA7rfUPI6aL9v-EKfAuplp', '$2y$13$1qjOEQ2zo8FOQzj0t5BJjOUcQf8LcOrW8bUq3inqBZewbUPPwIHha', NULL, 'jmvictoria.test3@gmail.com', 10, 1531235917, 1531235917);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `vid_id` int(11) NOT NULL COMMENT 'autoincremental automatic index',
  `vid_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'video general description\n.- main theme',
  `languageLocalization_lan_id` int(11) NOT NULL COMMENT 'localized language',
  `vid_duration` int(11) DEFAULT NULL COMMENT 'total video length measured in seconds',
  `vid_file` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Video file name',
  `vid_url` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Video url'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`vid_id`, `vid_name`, `languageLocalization_lan_id`, `vid_duration`, `vid_file`, `vid_url`) VALUES
(2, 'asdasd', 1, 30, 'asd', 'asd'),
(3, 'sdfsdfsdf', 2, 10, 'asdasdasd', 'asdads'),
(4, 'asdasd', 2, 24, 'filename3', 'asdasd'),
(5, 'Otro 21', 1, 234, 'filename_otro_21', 'enlace_otro_21'),
(6, 'Aprender a enviar un email electrónico', 2, 10, '1.1-Aprender_a_enviar_un_email.mp4', '//google/1.1-Aprender_a_enviar_un_email.mp4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `competency`
--
ALTER TABLE `competency`
  ADD PRIMARY KEY (`com_id`);

--
-- Indices de la tabla `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indices de la tabla `hasCompetency`
--
ALTER TABLE `hasCompetency`
  ADD PRIMARY KEY (`hco_id`,`video_vid_id`,`competency_com_id`),
  ADD KEY `fk_hasCompetency_video1_idx` (`video_vid_id`),
  ADD KEY `fk_hasCompetency_competency1_idx` (`competency_com_id`);

--
-- Indices de la tabla `hasRequirement`
--
ALTER TABLE `hasRequirement`
  ADD PRIMARY KEY (`hre_id`,`software_sof_id`,`video_vid_id`),
  ADD KEY `fk_hasRequirement_software1_idx` (`software_sof_id`),
  ADD KEY `fk_hasRequirement_video1_idx` (`video_vid_id`);

--
-- Indices de la tabla `hasVideo`
--
ALTER TABLE `hasVideo`
  ADD PRIMARY KEY (`hvi_id`,`video_vid_id`,`course_cou_id`),
  ADD KEY `fk_hasVideo_video1_idx` (`video_vid_id`),
  ADD KEY `fk_hasVideo_course1_idx` (`course_cou_id`);

--
-- Indices de la tabla `isCompatible`
--
ALTER TABLE `isCompatible`
  ADD PRIMARY KEY (`swc_id`,`software_sof_id`,`operatingSystem_ope_id`),
  ADD KEY `fk_isCompatible_software1_idx` (`software_sof_id`),
  ADD KEY `fk_isCompatible_operatingSystem1_idx` (`operatingSystem_ope_id`);

--
-- Indices de la tabla `languageLocalization`
--
ALTER TABLE `languageLocalization`
  ADD PRIMARY KEY (`lan_id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `operatingSystem`
--
ALTER TABLE `operatingSystem`
  ADD PRIMARY KEY (`ope_id`);

--
-- Indices de la tabla `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`sof_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`vid_id`),
  ADD KEY `fk_video_languageLocalization_idx` (`languageLocalization_lan_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `competency`
--
ALTER TABLE `competency`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'autoincremental automatic index',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `course`
--
ALTER TABLE `course`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'autoincremental automatic index',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `hasCompetency`
--
ALTER TABLE `hasCompetency`
  MODIFY `hco_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `hasRequirement`
--
ALTER TABLE `hasRequirement`
  MODIFY `hre_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `hasVideo`
--
ALTER TABLE `hasVideo`
  MODIFY `hvi_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'autoincremental automatic index',AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `isCompatible`
--
ALTER TABLE `isCompatible`
  MODIFY `swc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `languageLocalization`
--
ALTER TABLE `languageLocalization`
  MODIFY `lan_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'autoincremental automatic index',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `operatingSystem`
--
ALTER TABLE `operatingSystem`
  MODIFY `ope_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `software`
--
ALTER TABLE `software`
  MODIFY `sof_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'autoincremental automatic index';
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
  MODIFY `vid_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'autoincremental automatic index',AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hasCompetency`
--
ALTER TABLE `hasCompetency`
  ADD CONSTRAINT `fk_hasCompetency_competency1` FOREIGN KEY (`competency_com_id`) REFERENCES `competency` (`com_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hasCompetency_video1` FOREIGN KEY (`video_vid_id`) REFERENCES `video` (`vid_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `hasRequirement`
--
ALTER TABLE `hasRequirement`
  ADD CONSTRAINT `fk_hasRequirement_software1` FOREIGN KEY (`software_sof_id`) REFERENCES `software` (`sof_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hasRequirement_video1` FOREIGN KEY (`video_vid_id`) REFERENCES `video` (`vid_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `hasVideo`
--
ALTER TABLE `hasVideo`
  ADD CONSTRAINT `fk_hasVideo_course1` FOREIGN KEY (`course_cou_id`) REFERENCES `course` (`cou_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hasVideo_video1` FOREIGN KEY (`video_vid_id`) REFERENCES `video` (`vid_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `isCompatible`
--
ALTER TABLE `isCompatible`
  ADD CONSTRAINT `fk_isCompatible_operatingSystem1` FOREIGN KEY (`operatingSystem_ope_id`) REFERENCES `operatingSystem` (`ope_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_isCompatible_software1` FOREIGN KEY (`software_sof_id`) REFERENCES `software` (`sof_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `fk_video_languageLocalization` FOREIGN KEY (`languageLocalization_lan_id`) REFERENCES `languageLocalization` (`lan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
