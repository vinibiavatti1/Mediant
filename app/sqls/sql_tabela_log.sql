CREATE TABLE `log` (
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `id_usuario` int(8),
    `url` varchar(2000),
    `ip` varchar(50),
    `tipo_log` varchar(10),
    `texto` varchar(5000),
    `sql` varchar(5000),
    `data` datetime
);