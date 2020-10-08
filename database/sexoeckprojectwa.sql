-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Hôte : sexoeckprojectwa.mysql.db
-- Généré le :  mar. 23 juin 2020 à 16:44
-- Version du serveur :  5.6.48-log
-- Version de PHP :  7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sexoeckprojectwa`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `uName` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `idArticle` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`cid`, `uName`, `text`, `idArticle`, `date`) VALUES
(3, 'arthur', 'Et si on Ã©crit \r\nsur plusieurs ligne???', 29, '2020-05-06'),
(4, 'arthur', 'Et mtn les retours<br />\r\n<br />\r\na la <br />\r\nligne?', 29, '2020-05-06'),
(5, 'arthur', 'Burger', 47, '2020-05-19'),
(6, 'arthur', 'Un comment', 29, '2020-05-19');

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE `medias` (
  `id` int(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `post_id` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

CREATE TABLE `recipes` (
  `name` varchar(255) NOT NULL,
  `author` varchar(20) NOT NULL,
  `category` int(9) NOT NULL DEFAULT '0',
  `text` text,
  `image` varchar(256) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(9) NOT NULL,
  `ingredient` text NOT NULL,
  `box` int(11) NOT NULL,
  `preparation` int(9) NOT NULL,
  `repos` int(11) NOT NULL,
  `cuisson` int(11) NOT NULL,
  `difficulte` varchar(256) NOT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`name`, `author`, `category`, `text`, `image`, `created`, `id`, `ingredient`, `box`, `preparation`, `repos`, `cuisson`, `difficulte`, `description`) VALUES
('Biscuits Ã©crasÃ©s Ã  la noisette', 'arthur', 3, '                 Battez le beurre en mousse avec les sucres. Ajoutez ensuite les noisettes en <br />\r\npoudre et la farine. Formez une boule de pÃ¢te. Laissez-la reposer au frais pendant 1h.<br />\r\n<br /><br /><br />\r\n<br><br /><br /><br />\r\n<br><br /><br /><br />\r\nPrÃ©chauffez le four Ã  180Â°C (th.6). Sur la plaque garnie de papier sulfurisÃ©, faites des <br />\r\npetites boules de pÃ¢te Ã  l\'aide d\'une fourchette. Si la pÃ¢te colle Ã  la fourchette, <br />\r\ntrempez-la dans du sucre glace.<br /><br /><br />\r\n<br><br /><br /><br />\r\n<br><br /><br /><br />\r\nEnfournez 8 Ã  10 min. Surveillez la cuisson : les biscuits ne doivent pas brunir. Laissez-<br />\r\nles refroidir sur une grille.', '5eaac8e0d63492.76413934.jpg', '2019-12-12 12:14:34', 29, 'Sucre glace;250 g de farine;170g de noisettes en poudre;1 sachet de sucre vanillÃ©;120 g de sucre en poudre;250 g de beurre;', 6, 20, 60, 10, 'facile', 'Simple et dÃ©licieux, ces biscuits rÃ©galeront toute la famille .'),
('Pizza VÃ©gÃ©tarienne', 'arthur', 2, '             <br />\r\n    Dans un grand saladier, mettre environ 400 g de farine, le sel, lâ€™huile dâ€™olive et la <br />\r\nlevure (prÃ©alablement diluer dans un peu dâ€™eau tiÃ¨de pour la levure sÃ¨che).<br />\r\n<br><br />\r\n    Verser progressivement lâ€™eau tiÃ¨de tout en mÃ©langeant Ã  lâ€™aide dâ€™une spatule en <br />\r\nbois.<br />\r\n<br><br />\r\n    Travailler la pÃ¢te en ajoutant de la farine si nÃ©cessaire jusquâ€™Ã  ce que la pÃ¢te <br />\r\nnâ€™accroche plus au saladier.<br />\r\n<br><br />\r\n    Couvrir le saladier dâ€™un linge propre et laisser la pÃ¢te reposer 1h dans un endroit <br />\r\nchaud.<br />\r\n<br><br />\r\n    PrÃ©chauffer le four Ã  200Â°C (thermostat 6-7).<br />\r\n<br><br />\r\n    Emincer les poivrons en lamelles puis couper la courgette et les oignons en <br />\r\nrondelles avant de les faire revenir quelques minutes dans une poÃªle avec un peu <br />\r\ndâ€™huile dâ€™olive.<br />\r\n<br><br />\r\n    MÃ©langer la goustade dâ€™aubergines et le coulis de tomates.<br />\r\n<br><br />\r\n    Etaler la pÃ¢te Ã  pizza puis la recouvrir de ce mÃ©lange.<br />\r\n<br><br />\r\n    Ajouter les lÃ©gumes puis disposer la mozzarella prÃ©alablement coupÃ©e en <br />\r\ntranches<br />\r\n<br><br />\r\n    Assaisonner avec le sel et le poivre, ajouter les herbes de Provence et quelques <br />\r\nolives picholines noires.<br />\r\n<br><br />\r\n    Faire cuire environ 20 minutes.<br />\r\n', '5ea99cc7a3b6e3.87988455.jpeg', '2020-02-20 18:36:18', 38, '2 oignons;1 courgette;1 boule de mozzarela;200g de coulis de tomate;120g d\'aubergine;25g de levure boulangÃ¨re;3 cuilliÃ¨re Ã  soupe d\'huile d\'olive;25cl d\'eau tiÃ¨de;10g de sel;500g de farine;', 10, 30, 0, 20, 'facile', 'Cette pizza vÃ©gÃ©tarienne Ã  base de courgettes et de tomates est savoureuse accompagnÃ©e d\'une salade verte assaisonnÃ©e dans <br />\r\nles assiettes. Si vous souhaitez une alternative plus saine aux prÃ©parations industrielles, dÃ©gustez cette pizza aux lÃ©gumes et <br />\r\napprÃ©ciez un bon plat maison complet et Ã©quilibrÃ© pour toute la famille.'),
('VeloutÃ© de Potiron et Carottes', 'arthur', 1, ' <br />\r\n    Ã‰plucher et couper en dÃ©s le potiron, les pommes de terre, les carottes en rondelles.<br />\r\n<br><br />\r\n    Emincer l\'ail et l\'oignon.<br />\r\n<br><br />\r\n    Faire suer l\'oignon dans l\'huile d\'olive.<br />\r\n<br><br />\r\n    Ajouter tous les lÃ©gumes et l\'ail puis verser le bouillon et le lait.<br />\r\n<br><br />\r\n    Saler, poivrer, \"muscader\" et laisser cuire environ une trentaine de minutes.<br />\r\n<br><br />\r\n    Mixer le tout (ajouter Ã©ventuellement la crÃ¨me) et rectifier l\'assaisonnement si <br />\r\nnÃ©cessaire.<br />\r\n<br><br />\r\n    Bon appÃ©tit !<br />\r\n', '5e57f719eb8bc6.05436981.jpg', '2020-02-27 18:06:33', 50, 'Poivre;Persil;Huile d\'olive;1/2 litre de bouillon de volaille;1/2 litre de lait;1 oignon;1 gousse d\'ail;2 pommes de terre;500g de carotte;1 kg  de potiron;', 10, 30, 0, 30, 'facile', 'Une bonne soupe qui rÃ©chauffe!'),
('Quiche Lorraine', 'arthur', 2, '  <br />\r\n   1. PrÃ©chauffer le four Ã  180Â°C (thermostat 6). Disposez la pÃ¢te feuilletÃ©e au fond d\'un moule Ã  tarte huilÃ©. Couvrez-la de papier sulfurisÃ© et de poids (par exemple, un autre moule plus petit, ou des haricots secs...) et enfournez le moule pendant 10 minutes pour prÃ©cuire ce fond de tarte.<br />\r\n<br />\r\n 2. Pendant ce temps, dans un saladier, battez le lait, les oeufs et le fromage rÃ¢pÃ© avec un peu de sel et de poivre, puis incorporez les ingrÃ©dients de garniture.<br />\r\n<br />\r\n 3. Sortez le moule du four, retirez les poids et le papier, puis versez le mÃ©lange sur la pÃ¢te. Enfournez pour environ 25 Ã  30 minutes, jusqu\'Ã  ce que la garniture soit bien dorÃ©e. <br />\r\n  <br />\r\n <br />\r\n', '5e57e7e4b83033.67715702.jpg', '2020-02-27 17:01:40', 43, 'Sel marin, poivre du moulin;1 poignÃ©e d\'emmental rÃ¢pÃ©;4 oeufs;30 cl de lait vÃ©gÃ©tal sans sucre ajoutÃ©;200g de pÃ¢te brisÃ©e;', 5, 15, 0, 30, 'facile', 'DÃ©licieux, rassasiants et ultra pratiques, les quiches maisons sont les meilleurs amis des personnes pressÃ©es !'),
('PÃ¢tes Ã  la carbonara', 'arthur', 2, '  <br />\r\n    Dans une casserole mettre env. 4 l dâ€™eau Ã  bouillir. Une fois lâ€™eau en Ã©bullition, ajouter 30 g de sel (moins de 10 g par litre car le guanciale et le pecorino sont dÃ©jÃ  assez salÃ©s) et plongez-y les pÃ¢tes.<br />\r\n<br><br />\r\n    En mÃªme temps, dans un poÃªle, faites revenir le guanciale avec un tout petit peu dâ€™huile dâ€™olive vierge extra.<br />\r\n<br><br />\r\n    Dans un bol, mÃ©langez les oeufs, le pecorino et le poivre jusquâ€™Ã  lâ€™obtention dâ€™une crÃ¨me bien onctueuse.<br />\r\n<br><br />\r\n    Une fois les pÃ¢tes cuites, versez les dans la poÃªle avec le guanciale et un peu dâ€™eau de cuisson. Faites sauter le tout pendant quelques secondes puis Ã©teignez le feu. Ajoutez les oeufs et le pecorino et mÃ©langez le tout. Parsemez de pecorino et nâ€™attendez pas Ã  servir aprÃ¨s avoir moulu encore un peu de poivre noir.<br />\r\n', '5e57eb2b340804.82855927.jpg', '2020-02-27 17:15:39', 45, 'Huile d\'olive;Sel;Poivre;1 oeuf eniter;4 jaunes d\'oeufs;150g de joue de porc;200g de pecorino romano;400g de spaghetti;', 8, 2, 0, 10, 'facile', 'Simple et dÃ©licieux, les pÃ¢tes Ã  la carbonara rÃ©galeront toute la famille ! '),
('Gratin de courgettes', 'arthur', 2, ' <br />\r\n    Emincer les oignons.<br />\r\n<br><br />\r\n    Les faire fondre dans le beurre.<br />\r\n<br><br />\r\n    RÃ¢per 4 courgettes avec leur peau.<br />\r\n<br><br />\r\n    Les ajouter aux oignons.<br />\r\n<br><br />\r\n    PrÃ©chauffer le four Ã  200Â°C (thermostat 6-7).<br />\r\n<br><br />\r\n    MÃ©langer le gruyÃ¨re rÃ¢pÃ©, les oeufs, la crÃ¨me fraÃ®che, puis saler et poivrer.<br />\r\n<br><br />\r\n    Mettre les courgettes dans un plat et verser par dessus la sauce et faire Ã  four <br />\r\nchaud pendant 15 min.<br />\r\n', '5e57ecbee5cde8.88515479.jpg', '2020-02-27 17:22:22', 46, 'Poivre;Sel;1 noix de beurre;2 cuilliÃ¨re Ã  soupe de crÃ¨me fraÃ®che;2 oeufs;100g de gruyÃ¨re rapÃ©;3 oignons;4 courgettes;', 8, 15, 10, 15, 'moyen', 'Envie d\'un plat riche et Ã©quilibrÃ© Ã  la fois ? Les gratins de lÃ©gumes vous apportent leurs bienfaits nutritionnels et le rÃ©confort dont <br />\r\nvous avez besoin aprÃ¨s une grosse journÃ©e de travail. Prendre du plaisir tout en gardant la ligne, c\'est ce qu\'on vous propose avec <br />\r\ncette fabuleuse recette de gratin de courgettes simple et rapide Ã  cuisiner. DÃ©licieux gratin, facile Ã  prÃ©parer et c\'est un bon moyen <br />\r\nde faire manger des lÃ©gumes aux enfants.'),
('Hamburger maison', 'arthur', 2, ' <br />\r\n    Faites revenir les oignons Ã  feux doux.<br />\r\n<br><br />\r\n    Ajouter les steaks.<br />\r\n<br><br />\r\n    Une fois saisi, poser une tranche de cheddar sur le steak et laisser fondre.<br />\r\n<br><br />\r\n    Une fois cuit, dÃ©poser le steak et le fromage sur une des tranches du pain que vous <br />\r\naurez auparavant tartinÃ©e d\'un mÃ©lange de ketchup et de moutarde.<br />\r\n<br><br />\r\n    Ajouter la salade et de petites rondelles de tomates.<br />\r\n<br><br />\r\n    Vous pouvez maintenant recouvrir la prÃ©paration de l\'autre tranche (avec ketchup et <br />\r\nmoutarde)<br />\r\n', '5e57ef69970020.94862538.jpg', '2020-02-27 17:33:45', 47, 'Ketchup;Moutarde;Salade;Tomates;Cheddar;Oignons;Viande HachÃ©e;Pain pour Hamburger;', 8, 5, 0, 5, 'facile', 'DÃ©couvrez la recette de Hamburger maison, une recette simple et efficace qui fait toujours son petit effet auprÃ¨s des gourmands. <br />\r\nUn repas rapide mais franÃ§ais !'),
('Salade de ChÃ¨vre Chaud', 'arthur', 2, '  <br /><br />\r\n    Frotter les quatres tranches de pain de campagne avec la gousse d\'ail. Couper les <br /><br />\r\npÃ©lardons en deux dans la largeur. Poser sur chaque tranche de pain une moitiÃ© de <br /><br />\r\npÃ©lardon.<br /><br />\r\n<br><br /><br />\r\n    Mettez-les sur la plaque de votre four avec du papier cuisson puis arrosez-les d\'huile <br /><br />\r\nd\'olive et de basilic. Faire cuire 15 mn.<br /><br />\r\n<br><br /><br />\r\n    Pendant ce temps, laver la salade et installer deux ou trois feuilles dans chaque <br /><br />\r\nassiette. Laver les tomates, coupez-les en deux et trancher chaque moitiÃ© en fines <br /><br />\r\ntranches. Posez-les sur la salade.<br /><br />\r\n<br><br /><br />\r\n    Faire cuire les lardons Ã  votre convenance sans ajouter de matiÃ¨re grasse. Disperser <br /><br />\r\nles sur la salade.<br /><br />\r\n<br><br /><br />\r\n    Couper huit lamelles de poivron et faire cuire dans de l\'huile d\'olive Ã  feu trÃ¨s doux <br /><br />\r\njusqu\'Ã  ce que le poivron soit fondant. DÃ©poser quatre lamelles de poivron par <br /><br />\r\nassiette.<br /><br />\r\n<br><br /><br />\r\n    Faire la sauce pour la salade (celle que vous prÃ©fÃ©rez, il y Ã  plusieurs recettes sur <br /><br />\r\nMarmiton) et dÃ©poser les toasts de chÃ¨vre chaud sur la prÃ©sentation. Saupoudrer de <br /><br />\r\nbasilic ciselÃ©.<br /><br />\r\n<br><br /><br />\r\n    C\'est prÃªt !<br /><br />\r\n', '5e57f0afc75c10.08436186.jpg', '2020-02-27 17:39:11', 48, 'Basilic;Huile d\'olive;1 gousse d\'ail;1 poivron rouge;2 tomates;1 salade verte;100g de lardons natures;2 pÃ©lardons;4 tranche de pain de campagne;', 9, 15, 5, 5, 'facile', 'La salade de chÃ¨vre chaud, une ode Ã  l\'Ã©tÃ©, aux repas en terrasse, aux vacances... Tout le monde aime, et c\'est bien normal ! Une <br />\r\nsalade frisÃ©e fraÃ®che et croquante, des lardons fumÃ©s frits, des tomates gouteuses, des toasts bien grillÃ©s avec une belle tranche de <br />\r\nfromage de chÃ¨vre passÃ©e au four, un trait d\'huile d\'olive, un soupÃ§on de vinaigre balsamique... L\'extase culinaire ! Testez vite cette <br />\r\nrecette, vous l\'adopterez sur le champs !'),
('Pois chiches croustillants aux Ã©pices', 'arthur', 1, '1. PrÃ©chauffez le four Ã  200Â°C.<br />\r\n<br />\r\n2. Egouttez les pois chiches, essuyez-les bien avec un torchon propre et versez-les dans un saladier.<br />\r\nArrosez d\'un filet d\'huile d\'olive, salez et saupoudrez d\'Ã©pices Ã  votre goÃ»t, puis mÃ©langez bien avec les mains propres pour imprÃ©gner tous les pois de cet assaisonnement.<br />\r\n<br />\r\n3. DÃ©posez ensuite les pois chiches dans un grand plat Ã  gratin ou sur une plaque de four recouverte de papier sulfurisÃ© et enfournez pour 30 Ã  45 minutes, jusqu\'Ã  ce qu\'ils aient rÃ©duit en taille et soient devenus trÃ¨s croustillants.<br />\r\n<br />\r\n4. Sortez du four et dÃ©gustez immÃ©diatement, ou laissez refroidir et conservez jusqu\'Ã  quelques jours dans un bocal hermÃ©tique.<br />\r\n', '5ec52f1690cf84.69482561.jpg', '2020-05-20 15:22:30', 64, 'Fleur de sel;Epice de votre choix;huile d\'olive;250 g de pois chiches cuits Ã©gouttÃ©s;', 4, 10, 0, 45, 'facile', 'Que vous recherchiez un encas croustillant plus protÃ©inÃ© ou plus Ã©picÃ©, cette recette est pour vous. Adaptez la recette Ã  vos envies en variant les condiments et leur dosage !'),
('Salade de concombre au chÃ¨vre et olive', 'arthur', 1, ' <br />\r\n    Peler et couper le concombre en rondelles et le faire dÃ©gorger.<br />\r\n<br><br />\r\n    Couper le chÃªvre en petits morceaux.<br />\r\n<br><br />\r\n    Un fois que le concombre Ã  dÃ©gorgÃ©, mÃ©langer dans un saladier le concombre, les <br />\r\nmorceaux de fromage de chÃ¨vre, les olives dÃ©noyautÃ©es, le basilic et la vinaigrette.<br />\r\n<br><br />\r\n    Mettre au frais en attendant de passer Ã  table.<br />\r\n', '5e57f8fad97a67.36681345.jpeg', '2020-02-27 18:14:34', 51, 'Basilic;Vinaigrette;1 bÃ»che de chÃ¨vre;Olive verte;1 concombre;', 5, 15, 0, 0, 'facile', 'La salade de concombres, une recette grecque \"fraÃ®cheur\", parfaite pour les beaux jours ! RafraÃ®chissante et healthy, elle est peu <br />\r\ncalorique (mission maillot de bain oblige !), mais trÃ¨s gourmande ! Votre meilleure alliÃ©e pour vous rÃ©galer, tout en restant <br />\r\nraisonnable ! La vie est belle non ? Ã€ tester sans tarder, vous serez emballÃ©s !'),
('Pain de courgettes', 'arthur', 1, ' <br />\r\n    Eplucher et Ã©mincer l\'oignon.<br />\r\n<br><br />\r\n    Le faire fondre dans de l\'huile d\'olive et rÃ©server.<br />\r\n<br><br />\r\n    Rincer et tailler les courgettes (avec la peau c\'est bien meilleur !) en dÃ©s.<br />\r\n<br><br />\r\n    Les faire revenir dans l\'huile d\'olive + sel + poivre + basilic.<br />\r\n<br><br />\r\n    Attention, Ã©viter toute coloration que ce soit pour l\'oignon ou les courgettes.<br />\r\n<br><br />\r\n    Pendant ce temps battre les oeufs entiers comme pour une omelette et y incorporer <br />\r\nla crÃ¨me fleurette et un peu de sel.<br />\r\n<br><br />\r\n    Huiler trÃ¨s lÃ©gÃ©rement un moule Ã  cake (surtout le haut du moule) y verser les dÃ©s <br />\r\nde courgettes cuits puis les oeufs battus. Ne pas hÃ©siter Ã  mÃ©langer un peu les <br />\r\ningrÃ©dients dans le moule.<br />\r\n<br><br />\r\n    Faire cuire au bain-marie au four prÃ©chauffÃ© Ã  180Â°C environ 1 heure (piquer avec la <br />\r\npointe d\'un couteau pour vÃ©rifier la cuisson).<br />\r\n<br><br />\r\n    Vous pouvez servir soit en entrÃ©e tiÃ¨de ou froid avec une salade verte, soit pour un <br />\r\nrepas lÃ©ger avec une sauce tomate.<br />\r\n', '5e57fae3ea0e10.42701179.jpg', '2020-02-27 18:22:43', 52, 'Huilde d\'olive;Basilic;Sel;Poivre;25 cl de crÃ¨me fleurette;4 oeufs;1 oignon;4 courgettes;', 8, 30, 0, 60, 'facile', 'Pain de courgettes : A mi-chemin entre le pain et le flan, hummm c\'est trop bon Ã  l\'apÃ©ro et parfait pour les pique-nique !'),
('Rouleaux de printemps', 'arthur', 1, '1. Faire cuire les vermicelles selon les instructions du paquet, puis rÃ©servez-les dans un bol d\'eau froide.<br />\r\n<br />\r\n2. Pendant ce temps, lavez et effeuillez la salade, la menthe et les germes de soja, et dÃ©coupez des laniÃ¨res de carotte avec un Ã©conome.<br />\r\n<br />\r\n3. Formez les rouleaux. Humidifiez une galette de riz en la plongeant quelques secondes dans l\'eau froide (ou en suivant les instructions du paquet) et Ã©talez-la sur un linge propre. Disposez sur la partie gauche une part de vermicelles Ã©gouttÃ©s, une feuille de salade, une part de soja, quelques morceaux de tofu, quelques laniÃ¨res de carotte et quelques feuilles de menthe. Ajoutez un peu de sucre sweet chili, salez et poivrez. Repliez les bords supÃ©rieur et infÃ©rieur de la galette, puis roulez-la sur elle-mÃªme vers la droite. RÃ©pÃ©tez le processus pour les 7 autres rouleaux.<br />\r\n<br />\r\n4. Consommez ces rouleaux immÃ©diatement, trempÃ©s dans la sauce de votre choix, ou conservez-les 2 ou 3 jours au rÃ©frigÃ©rateur.', '5ec2acebe68c74.46139215.jpg', '2020-05-18 17:42:35', 59, 'sauce sweet chili;150g de tofu fumÃ©;8 galettes de riz;1 carotte;200 g de germes de soja frais;1 bouquet de menthe fraÃ®che;8 feuilles de sucrine;100g de vermicelle de riz;', 8, 30, 0, 0, 'facile', 'Aux beaux jours, les rouleaux de printemps comptent parmi mes repas prÃ©fÃ©rÃ©s. Personnalisez-les selon vos envie et ne vous inquiÃ©tez pas trop de leur apparence : si tous tient Ã  l\'intÃ©rieur, c\'est gagnÃ© !');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `mail` text NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `acces` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `mail`, `password`, `acces`) VALUES
(1, 'admin', '', '$2y$10$90Osb808avl0eitStRFQg.jsA4j5/V3rodnI/1aWaKaiowWhqcWIS', 1),
(2, 'test', 'test@gmail.com', 'test', 0),
(3, 'AZER', 'aser@gmail.com', '$2y$10$OukrqTC/Uadynbt7cyovhOtW2WBPX4eMNVePaOSMfo4HLbCPlF79G', 0),
(4, 'azerty', 'aaaa@gmail.com', '$2y$10$xxSuowLaEhoXRibY4hMaGukpBaMRkLVe1K/8nyi5METj7f6zYoVRS', 0),
(5, 'aze', 'gre@gmail.com', '$2y$10$x47Sm9UJ8bVkat8..2lC3ey7X0c8n/ZRjocrBzutX2BFRd6jBasSi', 0),
(6, 'arthur', 'az@gmail.com', '$2y$10$8O.gIgTADT5liBgDBZLiKubdGULDEzXgV0ngj6BMlVaVBb3zLnrL.', 0),
(7, 'aeazeaea', 'zert@gmail.com', '$2y$10$x1uLeP/HWNPA/Nk/2Bhax.qeNtlbEeRRb0FmUrn1bxQO.KgI/u6Pe', 0),
(8, 'Francis', 'francis@gmail.com', '$2y$10$ug3uoGpxXK4OPtTigDOc/OA635LDFSfjStpsnK9nIMkExgiFbrwQe', 0),
(9, 'damien', 'damien@gmail.com', '$2y$10$Kw7eVCtansjhFMXqXkpzh.cHntmC4q8J85QDxoWBPe9A0.mlF20Wy', 0),
(10, 'ert', 'ert@gmail.com', '$2y$10$bRhERxqopZ9hC5YwVixlE.pHXh1O/6Qt16FN4jGJHJP2lghe0KrEK', 0),
(11, 'Emie', 'emeline-legrand@orange.fr', '$2y$10$BekPbThmEIA9UUoxXg1WqOSFynAtSM1DcYkvoes4RJaqaS3at9UnO', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Index pour la table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
