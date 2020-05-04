--
-- Structure de la table `Activites`
--

CREATE TABLE `Activites` (
  `titre` varchar(30) NOT NULL,
  `lieu` varchar(100) DEFAULT NULL,
  `description` varchar(350) DEFAULT NULL,
  `site` varchar(100) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Structure de la table `Logement`
--

CREATE TABLE `Logement` (
  `titre` varchar(100) NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `prix` int(10) NOT NULL,
  `nbrpers` int(5) NOT NULL,
  `lien` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `type` varchar(5) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `file` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Structure de la table `Restaurant`
--

CREATE TABLE `Restaurant` (
  `titre` varchar(25) NOT NULL,
  `lieu` varchar(50) DEFAULT NULL,
  `prix` int(20) DEFAULT NULL,
  `nbrpers` int(10) DEFAULT NULL,
  `lien` varchar(100) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

