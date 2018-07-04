CREATE TABLE `projeto`.`arquivos` (
`Codigo` INT( 10 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Codigo',
`NmArquivo` VARCHAR( 150 ) NOT NULL COMMENT 'nome original',
`Descricao` VARCHAR( 200 ) NULL COMMENT 'descrição do arquivo',
`Arquivo` LONGBLOB NOT NULL COMMENT 'dados do arquivo',
`Tipo` VARCHAR( 15 ) NOT NULL COMMENT 'Tipo do arquivo, jpeg, doc, mp3, etc..',
`Tamanho` INT NOT NULL COMMENT 'Tamanho em bytes',
`DescricaoUser` varchar(30),
`Nome` varchar(30),
`Versao` varchar(10),
`DtHrEnvio` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data e Hora de envio'
) ENGINE = MYISAM ;

