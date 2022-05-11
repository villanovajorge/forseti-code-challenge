-- forseti.noticias definition

CREATE TABLE `noticias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `subtitulo` varchar(250) DEFAULT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `url` varchar(350) NOT NULL DEFAULT '#',
  PRIMARY KEY (`id`),
  UNIQUE KEY `noticias_id_IDX` (`id`) USING BTREE,
  UNIQUE KEY `noticias_un` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela criada para armazenar as noticias extraidas do portal Comprasnet';