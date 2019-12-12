-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  db5000229110.hosting-data.io
-- Généré le :  Jeu 12 Décembre 2019 à 20:34
-- Version du serveur :  5.7.28-log
-- Version de PHP :  7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbs223701`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `report` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `report`) VALUES
(31, 28, 'Jon Snow', 'En voilà un article intéressant...', '2019-12-12 21:02:53', 0),
(32, 28, 'David', 'Effectivement ça donne envie !', '2019-12-12 21:03:55', 0),
(33, 27, 'Patrick Jane', 'Je pense que j\\\'irai faire un tour là bas', '2019-12-12 21:05:33', 0),
(34, 26, 'Method Man', 'Sympa ton article !', '2019-12-12 21:07:17', 0),
(35, 29, 'Fred', 'Bravo très bon article !', '2019-12-12 21:10:52', 0);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '1',
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`id`, `pseudo`, `pass`, `email`, `admin`, `registration_date`) VALUES
(1, 'Fred', '$2y$10$NvgstlQruphJ2N2sGesGK.81hf.NrltVw7G8M.4sxDfBLthdlEshq', 'pose2003@hotmail.com', 1, '2019-10-30 22:21:33'),
(3, 'J.Forteroche', '$2y$10$otbQXRatMb7YlJgJYvyRVeGYeF6dUvSuqA4AQobd2GidiI9CU1dhS', 'j.forteroche@hotmail.fr', 1, '2019-11-24 13:07:49');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `content`, `creation_date`) VALUES
(25, 'Jean Forteroche', 'Coincer les bulles à Bubbly Mermaid', '<p style=\\\"text-align: center;\\\"><span style=\\\"text-decoration: underline;\\\"><span style=\\\"color: #236fa1; font-size: 14pt; font-family: \\\'comic sans ms\\\', sans-serif;\\\"><strong>Coincer les bulles à Bubbly Mermaid</strong></span></span></p>\r\n<p>Accoudés au bois ciré d’une coque de bateau faisant office de bar, les clients de la « sirène pétillante » d’Anchorage, la ville la plus peuplée d’Alaska, passent la soirée au champagne sous les conseils avisés du patron, Polo. En accompagnement, des huîtres et encore des huîtres, généralement servies à l’américaine, soit dans tous leurs états : nature ou cuisinées, aux saint-jacques, au poivron ou au fromage</p>', '2019-12-02 23:37:34'),
(26, 'Jean Forteroche', 'Se réchauffer d’un café équitable à The Grind', '<p style=\\\"text-align: center;\\\"><span style=\\\"text-decoration: underline; font-family: \\\'comic sans ms\\\', sans-serif; font-size: 14pt; color: #236fa1;\\\"><strong>Se réchauffer d’un café équitable à The Grind</strong></span></p>\r\n<p>Ce café-châlet est situé au pied des pistes de ski de Girdwood, où s’écoule le glacier Creek – quand il n’est pas gelé. Les grains du Kenya ou de Colombie sont torréfiés sur place. <em>« Organique, équitable et sans étiquette »</em>, s’enorgueillit John. Au milieu des livres et cartes postales, on attrape le journal et on s’affale dans le canapé, avec les effluves d’arabica qui s’échappent de la tasse.</p>', '2019-12-02 23:38:33'),
(27, 'Jean Forteroche', 'Se recueillir à la Resurrect Art Coffee House', '<p class=\\\"article__sub-title\\\" style=\\\"text-align: center;\\\"><span style=\\\"color: #236fa1; font-family: \\\'comic sans ms\\\', sans-serif;\\\"><strong><span style=\\\"text-decoration: underline;\\\"><span style=\\\"font-size: 14pt;\\\">Se recueillir à la Resurrect Art Coffee House</span></span></strong></span></p>\r\n<p class=\\\"article__sub-title\\\" style=\\\"text-align: left;\\\"><span style=\\\"color: #000000; font-size: 12pt;\\\">Pendant soixante-treize ans, l’église de Seward a accueilli les protestants de la péninsule de Kenai. Depuis une vingtaine d’années, on s’y presse encore chaque matin, mais pour prendre un café et un muffin. Dans la nef transformée en galerie d’art-café-friperie, les bancs ont cédé la place aux tables en bois et aux canapés de velours. Le point de ralliement des locaux.</span></p>', '2019-12-02 23:41:07'),
(28, 'Jean Forteroche', 'S’endormir dans la forêt à Millane’s Serenity by the sea cabins', '<p style=\\\"text-align: center;\\\"><span style=\\\"text-decoration: underline; font-family: \\\'comic sans ms\\\', sans-serif; font-size: 14pt; color: #236fa1;\\\"><strong>S’endormir dans la forêt à Millane’s Serenity by the sea cabins</strong></span></p>\r\n<p>Pour atteindre la chaumière de Millane depuis la plage de Lowell Point, où s’ébattent les baleines et les orques, il faut s’enfoncer dans les hauteurs, à travers la forêt. Les cabanons en bois sur pilotis se fondent dans le décor. A l’intérieur, un renne est couché sur le lit, brodé dans la couverture et des sachets de pop-corn promettent d’éclore au micro-onde.</p>', '2019-12-02 23:42:13'),
(29, 'Jean Forteroche', 'Guetter les baleines avec Kenai Fjords Tours', '<p style=\\\"text-align: center;\\\"><span style=\\\"text-decoration: underline; font-family: \\\'comic sans ms\\\', sans-serif; font-size: 14pt; color: #236fa1;\\\"><strong>Guetter les baleines avec Kenai Fjords Tours</strong></span></p>\r\n<p>Depuis le port de Seward, le catamaran de 82,5 pieds fend l’eau du golfe d’Alaska et file à travers fjords et glaciers. Dans le brouhaha des mouettes qui viennent chamailler les otaries, un souffle assourdissant : une baleine à bosse expire bruyamment à quelques mètres du bateau. La meilleure saison pour croiser des cétacés : entre mai et septembre.</p>', '2019-12-02 23:43:17');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indexPostId` (`post_id`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
