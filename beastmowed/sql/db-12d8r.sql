create database `beastmowed`;

CREATE TABLE `beastmowed`.`users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  PRIMARY KEY (`idUsers`)
);

CREATE TABLE `beastmowed`.`gallery` (
  `idGallery` int(11) NOT NULL AUTO_INCREMENT,
  `titleGallery` longtext NOT NULL,
  `descGallery` longtext NOT NULL,
  `imgFullNameGallery` longtext NOT NULL,
  `orderGallery` int(11) NOT NULL,
  PRIMARY KEY (`idGallery`)
);
