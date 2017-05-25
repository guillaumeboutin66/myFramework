--
-- Base de données: `tp_api`
--
CREATE DATABASE IF NOT EXISTS `oss_project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oss_project`;


-- --------------------------------------------------------
--
-- Structure de la table `utilisateur`
--
CREATE TABLE IF NOT EXISTS `user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `prenom` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `mdp` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `user` (`nom`, `prenom`, `email`, `mdp`) VALUES ("Boutin", "Guillaume", "guillaume.boutin@ecoles-oss.net", "oss");
INSERT INTO `user` (`nom`, `prenom`, `email`, `mdp`) VALUES ("Fourcade", "Nicolas", "nicolas.fourcade@ecoles-oss.net", "oss");
INSERT INTO `user` (`nom`, `prenom`, `email`, `mdp`) VALUES ("FARAIL", "Simon", "sifar@smile.fr", "smile");


-- --------------------------------------------------------
--
-- Structure de la table `utilisateur`
--
CREATE TABLE IF NOT EXISTS `address` (
  `addressId` INT(11) NOT NULL AUTO_INCREMENT,
  `idUser` INT(11) NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  `address2` VARCHAR(100) DEFAULT "",
  `district` VARCHAR(100) DEFAULT "",
  `cityId` INT(11) NOT NULL,
  PRIMARY KEY (`addressId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `address` (`idUser`, `address`, `cityId`) VALUES ("1", "66 rue de la soif", "1");
INSERT INTO `address` (`idUser`, `address`, `cityId`) VALUES ("2", "42 rue de la solution de l'univers", "2");
INSERT INTO `address` (`idUser`, `address`, `cityId`) VALUES ("3", "51 rue du pastis", "3");



/* pas réussi à  faire fonctionner
CREATE TRIGGER user_deleted AFTER DELETE on `user`
FOR EACH ROW
BEGIN
DELETE FROM  `address`
    WHERE `address`.idUser = old.id;
END*/
