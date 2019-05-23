-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: frontendtools.net.mysql:3306
-- Generation Time: Feb 25, 2019 at 02:43 PM
-- Server version: 10.3.10-MariaDB-1:10.3.10+maria~bionic
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `frontendtools_net`
--
CREATE DATABASE `frontendtools_net` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `frontendtools_net`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `descriptive_name` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `font-color` varchar(255) NOT NULL,
  `category_logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `category_name`, `descriptive_name`, `background`, `font-color`, `category_logo`) VALUES
(1, 'JavaScript', 'javascript', '#F0DB4F', '#323330', '/assets/images/logos/javascript.png'),
(2, 'jQuery', 'jquery', '#055791', '#fff', '/assets/images/logos/jquery.png'),
(3, 'PHP', 'php', '#8892BF', '#fff', '/assets/images/logos/php.png'),
(5, 'MySQL', 'mysql', '#4479a1', '#fff', '/assets/images/logos/mysql.png'),
(6, 'CSS', 'css', '#379bd6', '#fff', '/assets/images/logos/css.png');

-- --------------------------------------------------------

--
-- Table structure for table `category_entry`
--

CREATE TABLE IF NOT EXISTS `category_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entry_id` (`entry_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=154 ;

--
-- Dumping data for table `category_entry`
--

INSERT INTO `category_entry` (`id`, `entry_id`, `category_id`) VALUES
(143, 68, 3),
(145, 57, 6),
(146, 61, 6),
(147, 58, 6),
(148, 35, 6),
(152, 69, 6),
(153, 70, 6);

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `html` text NOT NULL,
  `css` text NOT NULL,
  `javascript` text NOT NULL,
  `executable` tinyint(1) NOT NULL,
  `creation_date` datetime NOT NULL,
  `edition_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`id`, `title`, `description`, `content`, `html`, `css`, `javascript`, `executable`, `creation_date`, `edition_date`) VALUES
(35, 'Toggle switch solo con CSS', '&lt;p&gt;Interruptor de encendido/apagado que podemos ver en multitud de&amp;nbsp;sitios web, en el sistema operativo de&amp;nbsp;dispositivos m&amp;oacute;viles, tablets,&amp;nbsp;ordenadores, etc.&lt;/p&gt;\r\n', '', '&lt;input type=&quot;checkbox&quot; id=&quot;toggle&quot; class=&quot;offscreen&quot; /&gt;\r\n&lt;label for=&quot;toggle&quot; class=&quot;switch&quot;&gt;&lt;/label&gt;', '.switch {\r\n  position: relative;\r\n  display: inline-block;\r\n  width: 40px;\r\n  height: 20px;\r\n  background-color: rgba(0, 0, 0, 0.25);\r\n  border-radius: 20px;\r\n  transition: all 0.3s;\r\n}\r\n\r\n.switch::after {\r\n  content: '''';\r\n  position: absolute;\r\n  width: 18px;\r\n  height: 18px;\r\n  border-radius: 18px;\r\n  background-color: white;\r\n  top: 1px;\r\n  left: 1px;\r\n  transition: all 0.3s;\r\n}\r\n\r\ninput[type=''checkbox'']:checked + .switch::after {\r\n  transform: translateX(20px);\r\n}\r\n\r\ninput[type=''checkbox'']:checked + .switch {\r\n  background-color: #7983ff;\r\n}\r\n\r\n.offscreen {\r\n  position: absolute;\r\n  left: -9999px;\r\n}', '', 1, '2019-02-22 16:00:00', '2019-02-24 23:24:30'),
(57, 'Glitch - Letras FX', '&lt;p&gt;Efecto para usarlo en tipograf&amp;iacute;as en el que utilizando solamente&amp;nbsp;CSS3, se consigue que la palabra o frase&amp;nbsp;parezca que est&amp;aacute; codificada haciendo que tiemblen y se superponga el mismo texto como si se usara&amp;nbsp;un efecto flash.&lt;/p&gt;\r\n', '', '&lt;div class=&quot;container&quot;&gt;\r\n	&lt;h1 class=&quot;glitch&quot;&gt;GLITCH&lt;/h1&gt;\r\n&lt;/div&gt;', '@import ''https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900'';\r\n.container {\r\n  height: 100vh;\r\n  background: #333;\r\n  display: grid;\r\n  place-items: center;\r\n  font-size: 10px;\r\n}\r\n.container .glitch {\r\n  color: #fff;\r\n  font-size: 5em;\r\n  position: relative;\r\n  font-family: ''Roboto'';\r\n  font-weight: 700;\r\n}\r\n.container .glitch::before,\r\n.container .glitch::after {\r\n  content: ''GLITCH'';\r\n  position: absolute;\r\n  top: 0;\r\n  left: 0;\r\n  right: 0;\r\n  overflow: hidden;\r\n  background-color: #333;\r\n  color: #fff;\r\n}\r\n.container .glitch::before {\r\n  left: 8px;\r\n  text-shadow: 2px 0 #00ffea;\r\n  animation: glitch 3s infinite linear;\r\n}\r\n.container .glitch::after {\r\n  left: 8px;\r\n  text-shadow: -2px 0 #fe3a7f;\r\n  animation: glitch 2s infinite linear;\r\n}\r\n@-moz-keyframes glitch {\r\n  0% {\r\n    clip: rect(56px, 9999px, 72px, 0);\r\n  }\r\n  5% {\r\n    clip: rect(11px, 9999px, 50px, 0);\r\n  }\r\n  10% {\r\n    clip: rect(50px, 9999px, 63px, 0);\r\n  }\r\n  15% {\r\n    clip: rect(16px, 9999px, 37px, 0);\r\n  }\r\n  20% {\r\n    clip: rect(12px, 9999px, 43px, 0);\r\n  }\r\n  25% {\r\n    clip: rect(21px, 9999px, 69px, 0);\r\n  }\r\n  30% {\r\n    clip: rect(9px, 9999px, 83px, 0);\r\n  }\r\n  35% {\r\n    clip: rect(48px, 9999px, 59px, 0);\r\n  }\r\n  40% {\r\n    clip: rect(33px, 9999px, 60px, 0);\r\n  }\r\n  45% {\r\n    clip: rect(21px, 9999px, 79px, 0);\r\n  }\r\n  50% {\r\n    clip: rect(73px, 9999px, 72px, 0);\r\n  }\r\n  55% {\r\n    clip: rect(29px, 9999px, 17px, 0);\r\n  }\r\n  60% {\r\n    clip: rect(71px, 9999px, 52px, 0);\r\n  }\r\n  65% {\r\n    clip: rect(57px, 9999px, 53px, 0);\r\n  }\r\n  70% {\r\n    clip: rect(22px, 9999px, 46px, 0);\r\n  }\r\n  75% {\r\n    clip: rect(28px, 9999px, 23px, 0);\r\n  }\r\n  80% {\r\n    clip: rect(33px, 9999px, 88px, 0);\r\n  }\r\n  85% {\r\n    clip: rect(54px, 9999px, 17px, 0);\r\n  }\r\n  90% {\r\n    clip: rect(57px, 9999px, 33px, 0);\r\n  }\r\n  95% {\r\n    clip: rect(43px, 9999px, 96px, 0);\r\n  }\r\n  100% {\r\n    clip: rect(76px, 9999px, 61px, 0);\r\n  }\r\n}\r\n@-webkit-keyframes glitch {\r\n  0% {\r\n    clip: rect(56px, 9999px, 72px, 0);\r\n  }\r\n  5% {\r\n    clip: rect(11px, 9999px, 50px, 0);\r\n  }\r\n  10% {\r\n    clip: rect(50px, 9999px, 63px, 0);\r\n  }\r\n  15% {\r\n    clip: rect(16px, 9999px, 37px, 0);\r\n  }\r\n  20% {\r\n    clip: rect(12px, 9999px, 43px, 0);\r\n  }\r\n  25% {\r\n    clip: rect(21px, 9999px, 69px, 0);\r\n  }\r\n  30% {\r\n    clip: rect(9px, 9999px, 83px, 0);\r\n  }\r\n  35% {\r\n    clip: rect(48px, 9999px, 59px, 0);\r\n  }\r\n  40% {\r\n    clip: rect(33px, 9999px, 60px, 0);\r\n  }\r\n  45% {\r\n    clip: rect(21px, 9999px, 79px, 0);\r\n  }\r\n  50% {\r\n    clip: rect(73px, 9999px, 72px, 0);\r\n  }\r\n  55% {\r\n    clip: rect(29px, 9999px, 17px, 0);\r\n  }\r\n  60% {\r\n    clip: rect(71px, 9999px, 52px, 0);\r\n  }\r\n  65% {\r\n    clip: rect(57px, 9999px, 53px, 0);\r\n  }\r\n  70% {\r\n    clip: rect(22px, 9999px, 46px, 0);\r\n  }\r\n  75% {\r\n    clip: rect(28px, 9999px, 23px, 0);\r\n  }\r\n  80% {\r\n    clip: rect(33px, 9999px, 88px, 0);\r\n  }\r\n  85% {\r\n    clip: rect(54px, 9999px, 17px, 0);\r\n  }\r\n  90% {\r\n    clip: rect(57px, 9999px, 33px, 0);\r\n  }\r\n  95% {\r\n    clip: rect(43px, 9999px, 96px, 0);\r\n  }\r\n  100% {\r\n    clip: rect(76px, 9999px, 61px, 0);\r\n  }\r\n}\r\n@-o-keyframes glitch {\r\n  0% {\r\n    clip: rect(56px, 9999px, 72px, 0);\r\n  }\r\n  5% {\r\n    clip: rect(11px, 9999px, 50px, 0);\r\n  }\r\n  10% {\r\n    clip: rect(50px, 9999px, 63px, 0);\r\n  }\r\n  15% {\r\n    clip: rect(16px, 9999px, 37px, 0);\r\n  }\r\n  20% {\r\n    clip: rect(12px, 9999px, 43px, 0);\r\n  }\r\n  25% {\r\n    clip: rect(21px, 9999px, 69px, 0);\r\n  }\r\n  30% {\r\n    clip: rect(9px, 9999px, 83px, 0);\r\n  }\r\n  35% {\r\n    clip: rect(48px, 9999px, 59px, 0);\r\n  }\r\n  40% {\r\n    clip: rect(33px, 9999px, 60px, 0);\r\n  }\r\n  45% {\r\n    clip: rect(21px, 9999px, 79px, 0);\r\n  }\r\n  50% {\r\n    clip: rect(73px, 9999px, 72px, 0);\r\n  }\r\n  55% {\r\n    clip: rect(29px, 9999px, 17px, 0);\r\n  }\r\n  60% {\r\n    clip: rect(71px, 9999px, 52px, 0);\r\n  }\r\n  65% {\r\n    clip: rect(57px, 9999px, 53px, 0);\r\n  }\r\n  70% {\r\n    clip: rect(22px, 9999px, 46px, 0);\r\n  }\r\n  75% {\r\n    clip: rect(28px, 9999px, 23px, 0);\r\n  }\r\n  80% {\r\n    clip: rect(33px, 9999px, 88px, 0);\r\n  }\r\n  85% {\r\n    clip: rect(54px, 9999px, 17px, 0);\r\n  }\r\n  90% {\r\n    clip: rect(57px, 9999px, 33px, 0);\r\n  }\r\n  95% {\r\n    clip: rect(43px, 9999px, 96px, 0);\r\n  }\r\n  100% {\r\n    clip: rect(76px, 9999px, 61px, 0);\r\n  }\r\n}\r\n@keyframes glitch {\r\n  0% {\r\n    clip: rect(56px, 9999px, 72px, 0);\r\n  }\r\n  5% {\r\n    clip: rect(11px, 9999px, 50px, 0);\r\n  }\r\n  10% {\r\n    clip: rect(50px, 9999px, 63px, 0);\r\n  }\r\n  15% {\r\n    clip: rect(16px, 9999px, 37px, 0);\r\n  }\r\n  20% {\r\n    clip: rect(12px, 9999px, 43px, 0);\r\n  }\r\n  25% {\r\n    clip: rect(21px, 9999px, 69px, 0);\r\n  }\r\n  30% {\r\n    clip: rect(9px, 9999px, 83px, 0);\r\n  }\r\n  35% {\r\n    clip: rect(48px, 9999px, 59px, 0);\r\n  }\r\n  40% {\r\n    clip: rect(33px, 9999px, 60px, 0);\r\n  }\r\n  45% {\r\n    clip: rect(21px, 9999px, 79px, 0);\r\n  }\r\n  50% {\r\n    clip: rect(73px, 9999px, 72px, 0);\r\n  }\r\n  55% {\r\n    clip: rect(29px, 9999px, 17px, 0);\r\n  }\r\n  60% {\r\n    clip: rect(71px, 9999px, 52px, 0);\r\n  }\r\n  65% {\r\n    clip: rect(57px, 9999px, 53px, 0);\r\n  }\r\n  70% {\r\n    clip: rect(22px, 9999px, 46px, 0);\r\n  }\r\n  75% {\r\n    clip: rect(28px, 9999px, 23px, 0);\r\n  }\r\n  80% {\r\n    clip: rect(33px, 9999px, 88px, 0);\r\n  }\r\n  85% {\r\n    clip: rect(54px, 9999px, 17px, 0);\r\n  }\r\n  90% {\r\n    clip: rect(57px, 9999px, 33px, 0);\r\n  }\r\n  95% {\r\n    clip: rect(43px, 9999px, 96px, 0);\r\n  }\r\n  100% {\r\n    clip: rect(76px, 9999px, 61px, 0);\r\n  }\r\n}', '', 1, '2019-02-22 16:00:00', '2019-02-24 23:08:27'),
(58, 'Light/Dark Switcher', '&lt;p&gt;Intercambia el modo light y el modo dark con un efecto&amp;nbsp;creado excusivamente con estilos CSS y un conmutador de encendido/apagado.&lt;/p&gt;\r\n', '', '&lt;div class=&quot;page&quot;&gt;\r\n	&lt;!--Theme switch--&gt;\r\n	&lt;input type=&quot;checkbox&quot; id=&quot;themeSwitch&quot; name=&quot;theme-switch&quot; class=&quot;theme-switch__input&quot; /&gt;\r\n	&lt;label for=&quot;themeSwitch&quot; class=&quot;theme-switch__label&quot;&gt;\r\n		&lt;span&gt;Switch theme&lt;/span&gt;\r\n	&lt;/label&gt;\r\n	\r\n	&lt;!--Main page content--&gt;\r\n	&lt;main&gt;\r\n		&lt;div class=&quot;wrapper&quot;&gt;\r\n		&lt;h1&gt;CSS Theme Switcher&lt;/h1&gt;\r\n		&lt;p&gt;Switch from light to dark mode using the toggle.&lt;/p&gt;\r\n		&lt;/div&gt;\r\n	&lt;/main&gt;\r\n&lt;/div&gt;', '@import url("https://fonts.googleapis.com/css?family=Merriweather:400,400i,700");\r\n* {\r\n  box-sizing: border-box;\r\n}\r\n\r\nbody {\r\n  font-family: Merriweather, serif;\r\n}\r\n\r\nlabel,\r\nmain {\r\n  background: var(--bg, white);\r\n  color: var(--text, black);\r\n}\r\n\r\nmain {\r\n  --gradDark: hsl(144, 100%, 89%);\r\n  --gradLight: hsl(42, 94%, 76%);\r\n  background: linear-gradient(to bottom, var(--gradDark), var(--gradLight));\r\n  padding: 120px 40px 40px 40px;\r\n  min-height: 100vh;\r\n  text-align: center;\r\n}\r\n\r\n.wrapper {\r\n  max-width: 700px;\r\n  margin: 0 auto;\r\n}\r\n\r\n.theme-switch__input:checked ~ main,\r\n.theme-switch__input:checked ~ label {\r\n  --text: white;\r\n}\r\n\r\n.theme-switch__input:checked ~ main {\r\n  --gradDark: hsl(198, 44%, 11%);\r\n  --gradLight: hsl(198, 39%, 29%);\r\n}\r\n\r\n.theme-switch__input,\r\n.theme-switch__label {\r\n  position: absolute;\r\n  z-index: 1;\r\n}\r\n\r\n.theme-switch__input {\r\n  opacity: 0;\r\n}\r\n.theme-switch__input:hover + .theme-switch__label, .theme-switch__input:focus + .theme-switch__label {\r\n  background-color: lightSlateGray;\r\n}\r\n.theme-switch__input:hover + .theme-switch__label span::after, .theme-switch__input:focus + .theme-switch__label span::after {\r\n  background-color: #d4ebf2;\r\n}\r\n\r\n.theme-switch__label {\r\n  padding: 20px;\r\n  margin: 60px;\r\n  transition: background-color 200ms ease-in-out;\r\n  width: 120px;\r\n  height: 50px;\r\n  border-radius: 50px;\r\n  text-align: center;\r\n  background-color: slateGray;\r\n  box-shadow: -4px 4px 15px inset rgba(0, 0, 0, 0.4);\r\n}\r\n.theme-switch__label::before, .theme-switch__label::after {\r\n  font-size: 2rem;\r\n  position: absolute;\r\n  transform: translate3d(0, -50%, 0);\r\n  top: 50%;\r\n}\r\n.theme-switch__label::before {\r\n  content: ''\\263C'';\r\n  right: 100%;\r\n  margin-right: 10px;\r\n  color: orange;\r\n}\r\n.theme-switch__label::after {\r\n  content: ''\\263E'';\r\n  left: 100%;\r\n  margin-left: 10px;\r\n  color: lightSlateGray;\r\n}\r\n.theme-switch__label span {\r\n  position: absolute;\r\n  bottom: calc(100% + 10px);\r\n  left: 0;\r\n  width: 100%;\r\n}\r\n.theme-switch__label span::after {\r\n  position: absolute;\r\n  top: calc(100% + 15px);\r\n  left: 5px;\r\n  width: 40px;\r\n  height: 40px;\r\n  content: '''';\r\n  border-radius: 50%;\r\n  background-color: lightBlue;\r\n  transition: transform 200ms, background-color 200ms;\r\n  box-shadow: -3px 3px 8px rgba(0, 0, 0, 0.4);\r\n}\r\n\r\n.theme-switch__input:checked ~ .theme-switch__label {\r\n  background-color: lightSlateGray;\r\n}\r\n.theme-switch__input:checked ~ .theme-switch__label::before {\r\n  color: lightSlateGray;\r\n}\r\n.theme-switch__input:checked ~ .theme-switch__label::after {\r\n  color: turquoise;\r\n}\r\n.theme-switch__input:checked ~ .theme-switch__label span::after {\r\n  transform: translate3d(70px, 0, 0);\r\n}', '', 1, '2019-02-22 16:00:00', '2019-02-24 23:15:20'),
(61, 'Moving black triangle', '&lt;p&gt;Increible efecto en movimiento de un objeto abstracto&amp;nbsp;creado unicamente con transiciones CSS3. Ideal para utilizarlo por ejemplo durante la&amp;nbsp;carga de una operaci&amp;oacute;n lenta y asi mantener entretenido&amp;nbsp;al usuario.&lt;/p&gt;\r\n', '', '&lt;div class=&quot;main&quot;&gt;\r\n  &lt;div class=&quot;plane&quot;&gt;\r\n    &lt;div class=&quot;triangle&quot;&gt;&lt;/div&gt;\r\n  &lt;/div&gt;\r\n  &lt;div class=&quot;plane&quot;&gt;\r\n    &lt;div class=&quot;triangle&quot;&gt;&lt;/div&gt;\r\n  &lt;/div&gt;\r\n  &lt;div class=&quot;plane&quot;&gt;\r\n    &lt;div class=&quot;triangle&quot;&gt;&lt;/div&gt;\r\n  &lt;/div&gt;\r\n  &lt;div class=&quot;plane&quot;&gt;\r\n    &lt;div class=&quot;triangle&quot;&gt;&lt;/div&gt;\r\n  &lt;/div&gt;\r\n  &lt;div class=&quot;plane&quot;&gt;\r\n    &lt;div class=&quot;triangle&quot;&gt;&lt;/div&gt;\r\n  &lt;/div&gt;\r\n  &lt;div class=&quot;plane&quot;&gt;\r\n    &lt;div class=&quot;triangle&quot;&gt;&lt;/div&gt;\r\n  &lt;/div&gt;\r\n  &lt;div class=&quot;plane&quot;&gt;\r\n    &lt;div class=&quot;triangle&quot;&gt;&lt;/div&gt;\r\n  &lt;/div&gt;\r\n  &lt;div class=&quot;plane&quot;&gt;\r\n    &lt;div class=&quot;triangle&quot;&gt;&lt;/div&gt;\r\n  &lt;/div&gt;\r\n  &lt;div class=&quot;plane&quot;&gt;\r\n    &lt;div class=&quot;triangle&quot;&gt;&lt;/div&gt;\r\n  &lt;/div&gt;\r\n  &lt;div class=&quot;plane&quot;&gt;\r\n    &lt;div class=&quot;triangle&quot;&gt;&lt;/div&gt;\r\n  &lt;/div&gt;\r\n  &lt;div class=&quot;plane&quot;&gt;\r\n    &lt;div class=&quot;triangle&quot;&gt;&lt;/div&gt;\r\n  &lt;/div&gt;\r\n  &lt;div class=&quot;plane&quot;&gt;\r\n    &lt;div class=&quot;triangle&quot;&gt;&lt;/div&gt;\r\n  &lt;/div&gt;\r\n  &lt;div class=&quot;plane&quot;&gt;\r\n    &lt;div class=&quot;triangle&quot;&gt;&lt;/div&gt;\r\n  &lt;/div&gt;\r\n  &lt;div class=&quot;plane&quot;&gt;\r\n    &lt;div class=&quot;triangle&quot;&gt;&lt;/div&gt;\r\n  &lt;/div&gt;\r\n  &lt;div class=&quot;plane&quot;&gt;\r\n    &lt;div class=&quot;triangle&quot;&gt;&lt;/div&gt;\r\n  &lt;/div&gt;\r\n&lt;/div&gt;', '.plane {\r\n  display: block;\r\n  height: 0;\r\n  width: 0;\r\n  overflow: visible;\r\n  transform-origin: 50% 50%;\r\n  transform: rotateZ(0deg) translate(-50px, 0);\r\n  -webkit-animation: spin 2.5s ease-in-out alternate infinite;\r\n  -moz-animation: spin 2.5s ease-in-out alternate infinite;\r\n  -o-animation: spin 2.5s ease-in-out alternate infinite;\r\n  animation: spin 2.5s ease-in-out alternate infinite;\r\n}\r\n.plane:nth-of-type(odd) .triangle {\r\n  background-color: #fff;\r\n}\r\n.plane:nth-of-type(even) .triangle {\r\n  background-color: #000;\r\n}\r\n\r\n.triangle {\r\n  position: absolute;\r\n  border-top-right-radius: 45%;\r\n  transform-origin: -50% 50%;\r\n  transform: rotateZ(-60deg) skewX(-30deg) scale(1, 0.866);\r\n}\r\n.triangle:before, .triangle:after {\r\n  content: "";\r\n  position: absolute;\r\n  background-color: inherit;\r\n  border-top-right-radius: 45%;\r\n}\r\n.triangle:before {\r\n  box-shadow: -6px -5px 10px 3px rgba(0, 0, 0, 0.075);\r\n  -webkit-transform: rotate(-135deg) skewX(-45deg) scale(1.414, 0.707) translate(0, -50%);\r\n  -moz-transform: rotate(-135deg) skewX(-45deg) scale(1.414, 0.707) translate(0, -50%);\r\n  -ms-transform: rotate(-135deg) skewX(-45deg) scale(1.414, 0.707) translate(0, -50%);\r\n  -o-transform: rotate(-135deg) skewX(-45deg) scale(1.414, 0.707) translate(0, -50%);\r\n  transform: rotate(-135deg) skewX(-45deg) scale(1.414, 0.707) translate(0, -50%);\r\n}\r\n.triangle:after {\r\n  box-shadow: 14px -1px 10px -6px rgba(0, 0, 0, 0.075);\r\n  -webkit-transform: rotate(135deg) skewY(-45deg) scale(0.707, 1.414) translate(50%);\r\n  -moz-transform: rotate(135deg) skewY(-45deg) scale(0.707, 1.414) translate(50%);\r\n  -ms-transform: rotate(135deg) skewY(-45deg) scale(0.707, 1.414) translate(50%);\r\n  -o-transform: rotate(135deg) skewY(-45deg) scale(0.707, 1.414) translate(50%);\r\n  transform: rotate(135deg) skewY(-45deg) scale(0.707, 1.414) translate(50%);\r\n}\r\n\r\n.plane:nth-of-type(1) {\r\n  z-index: 14;\r\n  animation-delay: 0.045s;\r\n}\r\n\r\n.plane:nth-of-type(1) .triangle,\r\n.plane:nth-of-type(1) .triangle:before,\r\n.plane:nth-of-type(1) .triangle:after {\r\n  width: 0.75em;\r\n  height: 0.75em;\r\n}\r\n\r\n.plane:nth-of-type(2) {\r\n  z-index: 13;\r\n  animation-delay: 0.09s;\r\n}\r\n\r\n.plane:nth-of-type(2) .triangle,\r\n.plane:nth-of-type(2) .triangle:before,\r\n.plane:nth-of-type(2) .triangle:after {\r\n  width: 1.5em;\r\n  height: 1.5em;\r\n}\r\n\r\n.plane:nth-of-type(3) {\r\n  z-index: 12;\r\n  animation-delay: 0.135s;\r\n}\r\n\r\n.plane:nth-of-type(3) .triangle,\r\n.plane:nth-of-type(3) .triangle:before,\r\n.plane:nth-of-type(3) .triangle:after {\r\n  width: 2.25em;\r\n  height: 2.25em;\r\n}\r\n\r\n.plane:nth-of-type(4) {\r\n  z-index: 11;\r\n  animation-delay: 0.18s;\r\n}\r\n\r\n.plane:nth-of-type(4) .triangle,\r\n.plane:nth-of-type(4) .triangle:before,\r\n.plane:nth-of-type(4) .triangle:after {\r\n  width: 3em;\r\n  height: 3em;\r\n}\r\n\r\n.plane:nth-of-type(5) {\r\n  z-index: 10;\r\n  animation-delay: 0.225s;\r\n}\r\n\r\n.plane:nth-of-type(5) .triangle,\r\n.plane:nth-of-type(5) .triangle:before,\r\n.plane:nth-of-type(5) .triangle:after {\r\n  width: 3.75em;\r\n  height: 3.75em;\r\n}\r\n\r\n.plane:nth-of-type(6) {\r\n  z-index: 9;\r\n  animation-delay: 0.27s;\r\n}\r\n\r\n.plane:nth-of-type(6) .triangle,\r\n.plane:nth-of-type(6) .triangle:before,\r\n.plane:nth-of-type(6) .triangle:after {\r\n  width: 4.5em;\r\n  height: 4.5em;\r\n}\r\n\r\n.plane:nth-of-type(7) {\r\n  z-index: 8;\r\n  animation-delay: 0.315s;\r\n}\r\n\r\n.plane:nth-of-type(7) .triangle,\r\n.plane:nth-of-type(7) .triangle:before,\r\n.plane:nth-of-type(7) .triangle:after {\r\n  width: 5.25em;\r\n  height: 5.25em;\r\n}\r\n\r\n.plane:nth-of-type(8) {\r\n  z-index: 7;\r\n  animation-delay: 0.36s;\r\n}\r\n\r\n.plane:nth-of-type(8) .triangle,\r\n.plane:nth-of-type(8) .triangle:before,\r\n.plane:nth-of-type(8) .triangle:after {\r\n  width: 6em;\r\n  height: 6em;\r\n}\r\n\r\n.plane:nth-of-type(9) {\r\n  z-index: 6;\r\n  animation-delay: 0.405s;\r\n}\r\n\r\n.plane:nth-of-type(9) .triangle,\r\n.plane:nth-of-type(9) .triangle:before,\r\n.plane:nth-of-type(9) .triangle:after {\r\n  width: 6.75em;\r\n  height: 6.75em;\r\n}\r\n\r\n.plane:nth-of-type(10) {\r\n  z-index: 5;\r\n  animation-delay: 0.45s;\r\n}\r\n\r\n.plane:nth-of-type(10) .triangle,\r\n.plane:nth-of-type(10) .triangle:before,\r\n.plane:nth-of-type(10) .triangle:after {\r\n  width: 7.5em;\r\n  height: 7.5em;\r\n}\r\n\r\n.plane:nth-of-type(11) {\r\n  z-index: 4;\r\n  animation-delay: 0.495s;\r\n}\r\n\r\n.plane:nth-of-type(11) .triangle,\r\n.plane:nth-of-type(11) .triangle:before,\r\n.plane:nth-of-type(11) .triangle:after {\r\n  width: 8.25em;\r\n  height: 8.25em;\r\n}\r\n\r\n.plane:nth-of-type(12) {\r\n  z-index: 3;\r\n  animation-delay: 0.54s;\r\n}\r\n\r\n.plane:nth-of-type(12) .triangle,\r\n.plane:nth-of-type(12) .triangle:before,\r\n.plane:nth-of-type(12) .triangle:after {\r\n  width: 9em;\r\n  height: 9em;\r\n}\r\n\r\n.plane:nth-of-type(13) {\r\n  z-index: 2;\r\n  animation-delay: 0.585s;\r\n}\r\n\r\n.plane:nth-of-type(13) .triangle,\r\n.plane:nth-of-type(13) .triangle:before,\r\n.plane:nth-of-type(13) .triangle:after {\r\n  width: 9.75em;\r\n  height: 9.75em;\r\n}\r\n\r\n.plane:nth-of-type(14) {\r\n  z-index: 1;\r\n  animation-delay: 0.63s;\r\n}\r\n\r\n.plane:nth-of-type(14) .triangle,\r\n.plane:nth-of-type(14) .triangle:before,\r\n.plane:nth-of-type(14) .triangle:after {\r\n  width: 10.5em;\r\n  height: 10.5em;\r\n}\r\n\r\n.plane:nth-of-type(15) {\r\n  z-index: 0;\r\n  animation-delay: 0.675s;\r\n}\r\n\r\n.plane:nth-of-type(15) .triangle,\r\n.plane:nth-of-type(15) .triangle:before,\r\n.plane:nth-of-type(15) .triangle:after {\r\n  width: 11.25em;\r\n  height: 11.25em;\r\n}\r\n\r\n@keyframes spin {\r\n  0% {\r\n    -webkit-transform: rotateZ(0deg) translate(-50px, 0);\r\n    -moz-transform: rotateZ(0deg) translate(-50px, 0);\r\n    -o-transform: rotateZ(0deg) translate(-50px, 0);\r\n    transform: rotateZ(0deg) translate(-50px, 0);\r\n  }\r\n  100% {\r\n    -webkit-transform: rotateZ(120deg) translate(-50px, -80px);\r\n    -moz-transform: rotateZ(120deg) translate(-50px, -80px);\r\n    -o-transform: rotateZ(120deg) translate(-50px, -80px);\r\n    transform: rotateZ(120deg) translate(-50px, -80px);\r\n  }\r\n}\r\n.inspiration {\r\n  display: block;\r\n  position: fixed;\r\n  height: 30px;\r\n  bottom: 0;\r\n  left: 0;\r\n  z-index: 2;\r\n}\r\n.inspiration__link {\r\n  display: block;\r\n  cursor: pointer;\r\n  padding: 0 10px;\r\n  line-height: 30px;\r\n  background-color: #34363f;\r\n  color: #fff;\r\n  border-top-right-radius: 4px;\r\n  font-size: 12px;\r\n}\r\n\r\n* {\r\n  margin: 0;\r\n  padding: 0;\r\n  border: 0;\r\n  outline: none;\r\n  box-sizing: border-box;\r\n}\r\n\r\nhtml,\r\nbody {\r\n  display: block;\r\n  position: fixed;\r\n  height: 100vh;\r\n  width: 100vw;\r\n  background-color: #000;\r\n  background: linear-gradient(#1f1f21, #000);\r\n}\r\n\r\n.main {\r\n  display: flex;\r\n  height: 100vh;\r\n  width: 100vw;\r\n  flex-wrap: wrap;\r\n  flex-direction: column;\r\n  justify-content: center;\r\n  align-items: center;\r\n}', '', 1, '2019-02-22 16:00:00', '2019-02-24 23:09:11'),
(68, 'Mostrar los errores de PHP en tiempo de ejecución', '&lt;p&gt;En bastantes servidores no se muestran los&amp;nbsp;errores PHP&amp;nbsp;por defecto, de ah&amp;iacute; que muchas veces al no obtener el resultado o funcionamiento esperado nos rompemos la cabeza revisando l&amp;iacute;neas y l&amp;iacute;neas de&amp;nbsp;&lt;a href=&quot;https://www.anerbarrena.com/programacion/php/&quot;&gt;PHP&lt;/a&gt;&amp;nbsp;ignorando que verdaderamente el script nos est&amp;aacute; dando error.&lt;/p&gt;\r\n\r\n&lt;p&gt;Con las siguientes funciones colocadas en el&amp;nbsp;&lt;strong&gt;comienzo de nuestros ficheros PHP&lt;/strong&gt;&amp;nbsp;haremos que los&amp;nbsp;&lt;strong&gt;errores PHP&lt;/strong&gt;&amp;nbsp;salgan a la luz:&lt;/p&gt;\r\n', '&lt;?php\r\nerror_reporting(E_ALL);\r\nini_set(&apos;display_errors&apos;, &apos;1&apos;);\r\n?&gt;\r\n\r\n&lt;p&gt;Adicionalmente os pongo más códigos de ejemplo para mostrar o no mostrar los errores de PHP:&lt;/p&gt;\r\n\r\n&lt;?php\r\n// Motrar todos los errores de PHP\r\nerror_reporting(-1);\r\n\r\n// No mostrar los errores de PHP\r\nerror_reporting(0);\r\n\r\n// Motrar todos los errores de PHP\r\nerror_reporting(E_ALL);\r\n\r\n// Motrar todos los errores de PHP\r\nini_set(&apos;error_reporting&apos;, E_ALL);\r\n?&gt;', '', '', '', 0, '2019-02-22 22:36:22', '2019-02-24 20:44:22'),
(69, 'Animated Blobby Gooey Button', '&lt;p&gt;Animaci&amp;oacute;n de&amp;nbsp;un bot&amp;oacute;n&amp;nbsp;con&amp;nbsp;efectos&amp;nbsp;borroso y pegajoso&amp;nbsp;creado&amp;nbsp;con SVG y keyframes&amp;nbsp;CSS.&lt;/p&gt;\r\n', '', '&lt;svg viewBox=&quot;45 60 400 320&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;&gt;\r\n    &lt;path fill=&quot;#fff&quot; d=&quot;M 90 210 C 90 180 90 150 90 150 C 150 150 180 150 180 150 C 180 150 300 150 300 150 C 300 150 330 150 390 150 C 390 150 390 180 390 210 C 390 240 390 270 390 270 C 330 270 300 270 300 270 C 300 270 180 270 180 270 C 180 270 150 270 90 270 C 90 270 90 240 90 210&quot; mask=&quot;url(#knockout-text)&quot; &gt;\r\n    &lt;/path&gt;\r\n    &lt;mask id=&quot;knockout-text&quot;&gt;\r\n      &lt;rect width=&quot;100%&quot; height=&quot;100%&quot; fill=&quot;#fff&quot; x=&quot;0&quot; y=&quot;0&quot; /&gt;\r\n      &lt;text x=&quot;147&quot; y=&quot;227&quot; fill=&quot;#000&quot;&gt;BUTTON&lt;/text&gt;\r\n    &lt;/mask&gt;\r\n&lt;/svg&gt;\r\n\r\n&lt;!--- M 90 210 C 90 180 90 150 150 150 C 150 150 180 150 180 150 C 180 150 300 150 300 150 C 300 150 330 150 330 150 C 390 150 390 180 390 210 C 390 240 390 270 330 270 C 330 270 300 270 300 270 C 300 270 180 270 180 270 C 180 270 150 270 150 270 C 90 270 90 240 90 210 ---&gt;', '@import url("https://fonts.googleapis.com/css?family=Raleway:900");\r\n* {\r\n  margin: 0;\r\n  padding: 0;\r\n  box-sizing: border-box;\r\n}\r\n\r\nbody {\r\n  background-image: url(https://images.unsplash.com/photo-1519501025264-65ba15a82390?w=1600);\r\n  background-size: cover;\r\n  background-position: 50% 50%;\r\n  min-height: 100vh;\r\n  font-family: Raleway, serif;\r\n}\r\nbody:after {\r\n  content: "";\r\n  width: 100%;\r\n  height: 100%;\r\n  position: fixed;\r\n  background: rgba(0, 0, 0, 0.2);\r\n  z-index: 1;\r\n}\r\n\r\nsvg {\r\n  width: 80vw;\r\n  position: fixed;\r\n  top: 50vh;\r\n  left: 50vw;\r\n  max-width: 430px;\r\n  -webkit-transform: translateY(-50%) translateX(-50%);\r\n          transform: translateY(-50%) translateX(-50%);\r\n  z-index: 2;\r\n  -webkit-filter: drop-shadow(0 0 40px rgba(0, 0, 0, 0.3));\r\n          filter: drop-shadow(0 0 40px rgba(0, 0, 0, 0.3));\r\n}\r\nsvg path {\r\n  cursor: pointer;\r\n  -webkit-animation: blob 2s infinite forwards;\r\n          animation: blob 2s infinite forwards;\r\n  -webkit-transform-origin: 50% 50%;\r\n          transform-origin: 50% 50%;\r\n}\r\nsvg path:hover {\r\n  fill: #fafafa;\r\n}\r\nsvg text {\r\n  font-size: 45px;\r\n}\r\n\r\n@-webkit-keyframes blob {\r\n  25% {\r\n    d: path("M 90 210 C 90 180 110 160 130 160 C 160 160 180 140 200 130 C 230 120 270 100 290 140 C 310 170 340 100 360 140 C 370 160 390 180 390 210 C 390 240 380 290 350 280 C 330 270 300 280 280 290 C 260 300 230 300 220 290 C 200 270 160 310 140 280 C 130 260 90 240 90 210 ");\r\n    -webkit-transform: rotate(-5deg);\r\n            transform: rotate(-5deg);\r\n  }\r\n  50% {\r\n    d: path("M 90 210 C 90 180 100 150 120 130 C 150 100 180 140 200 130 C 230 120 270 100 290 140 C 300 160 330 130 360 140 C 390 150 390 180 390 210 C 390 240 380 300 350 280 C 330 270 320 230 280 260 C 260 280 220 310 200 290 C 180 270 160 280 140 280 C 110 280 90 240 90 210");\r\n  }\r\n  75% {\r\n    d: path("M 90 210 C 90 180 110 180 130 170 C 150 160 170 130 200 130 C 240 130 260 150 290 140 C 310 130 340 120 360 140 C 380 160 390 180 390 210 C 390 240 380 260 350 270 C 320 280 290 270 270 260 C 240 250 230 280 210 290 C 180 310 130 300 110 280 C 90 260 90 240 90 210");\r\n    -webkit-transform: rotate(5deg);\r\n            transform: rotate(5deg);\r\n  }\r\n}\r\n\r\n@keyframes blob {\r\n  25% {\r\n    d: path("M 90 210 C 90 180 110 160 130 160 C 160 160 180 140 200 130 C 230 120 270 100 290 140 C 310 170 340 100 360 140 C 370 160 390 180 390 210 C 390 240 380 290 350 280 C 330 270 300 280 280 290 C 260 300 230 300 220 290 C 200 270 160 310 140 280 C 130 260 90 240 90 210 ");\r\n    -webkit-transform: rotate(-5deg);\r\n            transform: rotate(-5deg);\r\n  }\r\n  50% {\r\n    d: path("M 90 210 C 90 180 100 150 120 130 C 150 100 180 140 200 130 C 230 120 270 100 290 140 C 300 160 330 130 360 140 C 390 150 390 180 390 210 C 390 240 380 300 350 280 C 330 270 320 230 280 260 C 260 280 220 310 200 290 C 180 270 160 280 140 280 C 110 280 90 240 90 210");\r\n  }\r\n  75% {\r\n    d: path("M 90 210 C 90 180 110 180 130 170 C 150 160 170 130 200 130 C 240 130 260 150 290 140 C 310 130 340 120 360 140 C 380 160 390 180 390 210 C 390 240 380 260 350 270 C 320 280 290 270 270 260 C 240 250 230 280 210 290 C 180 310 130 300 110 280 C 90 260 90 240 90 210");\r\n    -webkit-transform: rotate(5deg);\r\n            transform: rotate(5deg);\r\n  }\r\n}', '', 1, '2019-02-24 21:12:19', '2019-02-25 01:00:24'),
(70, 'Transition CSS compatible with all browsers', '&lt;p&gt;The&amp;nbsp;&lt;code&gt;transition&lt;/code&gt;&amp;nbsp;property is a shorthand property used to represent up to four transition-related longhand properties.&lt;/p&gt;\r\n', '', '&lt;div class=&quot;box transition&quot;&gt;&lt;/div&gt;', '.transition {\r\n  -webkit-transition: all .2s ease-out;\r\n  -moz-transition: all .2s ease-out;\r\n  -o-transition: all .2s ease-out;\r\n  transition: all .2s ease-out;\r\n}\r\n.box {\r\n  width: 150px;\r\n  height: 150px;\r\n  background: red;\r\n  margin-top: 20px;\r\n  margin-left: auto;\r\n  margin-right: auto;\r\n}\r\n\r\n.box:hover {\r\n  background-color: green;\r\n  cursor: pointer;\r\n}', '', 1, '2019-02-25 13:16:11', '2019-02-25 13:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `email`, `password`) VALUES
(1, 'djalho', 'djgonzalorodriguez@hotmail.com', '4aeea8e5cb27f9b1356a29eef14271a4f3cb2aa0b7572c5bf041978742196a8d');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE IF NOT EXISTS `maintenance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `ip`) VALUES
(1, '34.55.123.344,77.229.254.119');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maintenance` varchar(255) NOT NULL,
  `ips` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `maintenance`, `ips`) VALUES
(1, 'on', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_entry`
--
ALTER TABLE `category_entry`
  ADD CONSTRAINT `category_entry_ibfk_3` FOREIGN KEY (`entry_id`) REFERENCES `entries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_entry_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
