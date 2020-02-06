CREATE TABLE `tb_assunto` (
  `id_assunto` int unsigned NOT NULL AUTO_INCREMENT,
  `no_assunto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_assunto`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `rl_arvore_assunto` (
  `id_arvore_assunto` int unsigned NOT NULL AUTO_INCREMENT,
  `id_assunto_pai` int unsigned NOT NULL,
  `id_assunto_filho` int unsigned NOT NULL,
  PRIMARY KEY (`id_arvore_assunto`),
  UNIQUE KEY `rl_arvore_assunto_id_assunto_filho_unique` (`id_assunto_filho`),
  KEY `rl_arvore_assunto_id_assunto_pai_foreign` (`id_assunto_pai`),
  CONSTRAINT `rl_arvore_assunto_id_assunto_filho_foreign` FOREIGN KEY (`id_assunto_filho`) REFERENCES `tb_assunto` (`id_assunto`),
  CONSTRAINT `rl_arvore_assunto_id_assunto_pai_foreign` FOREIGN KEY (`id_assunto_pai`) REFERENCES `tb_assunto` (`id_assunto`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tb_banca` (
  `id_banca` int unsigned NOT NULL AUTO_INCREMENT,
  `no_banca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_banca`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tb_orgao` (
  `id_orgao` int unsigned NOT NULL AUTO_INCREMENT,
  `no_orgao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sg_orgao` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_orgao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tb_questao` (
  `id_questao` int unsigned NOT NULL AUTO_INCREMENT,
  `no_questao` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_orgao` int unsigned NOT NULL,
  `id_banca` int unsigned NOT NULL,
  `id_assunto` int unsigned NOT NULL,
  PRIMARY KEY (`id_questao`),
  KEY `tb_questao_id_orgao_foreign` (`id_orgao`),
  KEY `tb_questao_id_banca_foreign` (`id_banca`),
  KEY `tb_questao_id_assunto_foreign` (`id_assunto`),
  CONSTRAINT `tb_questao_id_assunto_foreign` FOREIGN KEY (`id_assunto`) REFERENCES `tb_assunto` (`id_assunto`),
  CONSTRAINT `tb_questao_id_banca_foreign` FOREIGN KEY (`id_banca`) REFERENCES `tb_banca` (`id_banca`),
  CONSTRAINT `tb_questao_id_orgao_foreign` FOREIGN KEY (`id_orgao`) REFERENCES `tb_orgao` (`id_orgao`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
