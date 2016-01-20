# Sistema de Segurança Digital


Colaboradores:

* [Allan Gonçalves da Cruz](https://github.com/Allangcruz)

## Tecnologias utilizadas

### Backend
* Codeigniter - 3.0.4
* Mysql - 5.5.44
* Apache - 2.4.7

### Frontend
* Jquery - 2.2.0
* Localweb Style - 3.8.2
* jquery-validate - 1.14.0


### Tabela do banco de dados ou usar o arquivo script.sql
```
CREATE TABLE IF NOT EXISTS `sistema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(50) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0' COMMENT 'Status:\n0 - Ativo\n1 - Cancelado\n',
  `justificativa` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8

```