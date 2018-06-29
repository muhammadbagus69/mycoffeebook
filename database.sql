SET foreign_key_checks = 0;
DROP TABLE IF EXISTS `resep`;
CREATE TABLE `resep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `resep` VALUES (1,'Espresso','Espresso','-','bla bla bla bla bla bla bla bla bla bla blab alb bla bla bla bla bla bla bla bla bla bla blab alb bla bla bla bla bla bla bla bla bla bla blab alb bla bla bla bla bla bla bla bla bla bla blab alb');
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `user` VALUES (1,'admin','admin','Muhammad Bagus','Jauh','-',1),(2,'','','','','-',0),(3,'tampan','tampan','tampanbanget','jauhhh','-',0);


SET foreign_key_checks = 1;
