# create DATABASE  fullstackphp;

create table users
(
    id         int(11) unsigned auto_increment
        primary key,
    first_name varchar(255)                          null,
    last_name  varchar(255)                          not null,
    email      varchar(255)                          null,
    document   varchar(11)                           null,
    created_at timestamp default current_timestamp() null,
    updated_at timestamp default current_timestamp() not null on update current_timestamp(),
    constraint users_email_uindex
        unique (email)
);

create table users_address
(
    user_id    int(11) unsigned null,
    id         int(11) unsigned auto_increment
        primary key,
    street     varchar(255)     null,
    number     varchar(255)     null,
    complement varchar(255)     null,
    constraint user_id
        foreign key (user_id) references users (id)
            on delete cascade
);

create index addr_user
    on users_address (user_id);


LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `document`)
VALUES
(1,'Robson','Santos','robson1@email.com.br',NULL),
(2,'Alexandre','Santos','alexandre27@email.com.br',NULL),
(3,'Willian','Santos','willian28@email.com.br',NULL),
(4,'Eleno','Santos','eleno29@email.com.br',NULL),
(5,'Lucas','Santos','lucas30@email.com.br',NULL),
(6,'Mateus','Santos','mateus31@email.com.br',NULL),
(7,'João','Santos','joão32@email.com.br',NULL),
(8,'Felipe','Santos','felipe33@email.com.br',NULL),
(9,'Anderson','Santos','anderson34@email.com.br',NULL),
(10,'Elton','Santos','elton35@email.com.br',NULL),
(11,'Leonardo','Santos','leonardo36@email.com.br',NULL),
(12,'Regilton','Santos','regilton37@email.com.br',NULL),
(13,'Sidney','Santos','sidney38@email.com.br',NULL),
(14,'Lourival','Santos','lourival39@email.com.br',NULL),
(15,'Henrique','Santos','henrique40@email.com.br',NULL),
(16,'Daniel','Santos','daniel41@email.com.br',NULL),
(17,'Pedro','Santos','pedro42@email.com.br',NULL),
(18,'Andre Roberto','Santos','andre roberto43@email.com.br',NULL),
(19,'Ozeias','Santos','ozeias44@email.com.br',NULL),
(20,'Arnobio','Santos','arnobio45@email.com.br',NULL),
(21,'Roniel','Santos','roniel46@email.com.br',NULL),
(22,'Caíque','Santos','caíque47@email.com.br',NULL),
(23,'Lucas','Santos','lucas48@email.com.br',NULL),
(24,'Francisco','Santos','francisco49@email.com.br',NULL),
(25,'Cristian','Santos','cristian50@email.com.br',NULL),
(26,'Eduardo','Santos','eduardo51@email.com.br',NULL),
(27,'Rodrigo','Santos','rodrigo52@email.com.br',NULL),
(28,'Raphael','Santos','raphael53@email.com.br',NULL),
(29,'Jose','Santos','jose54@email.com.br',NULL),
(30,'Rodrigo','Santos','rodrigo55@email.com.br',NULL),
(31,'Diego','Santos','diego56@email.com.br',NULL),
(32,'Alexandre','Santos','alexandre57@email.com.br',NULL),
(33,'Edimar','Santos','edimar58@email.com.br',NULL),
(34,'Jackell','Santos','jackell59@email.com.br',NULL),
(35,'Luis','Santos','luis60@email.com.br',NULL),
(36,'Lucas','Santos','lucas61@email.com.br',NULL),
(37,'Wander','Santos','wander62@email.com.br',NULL),
(38,'Tairo','Santos','tairo63@email.com.br',NULL),
(39,'Rubens','Santos','rubens64@email.com.br',NULL),
(40,'Hugo','Santos','hugo65@email.com.br',NULL),
(41,'Gustavo','Santos','gustavo66@email.com.br',NULL),
(42,'Paulo','Santos','paulo67@email.com.br',NULL),
(43,'Rodrigo','Santos','rodrigo68@email.com.br',NULL),
(44,'Denio','Santos','denio69@email.com.br',NULL),
(45,'Idalmir','Santos','idalmir70@email.com.br',NULL),
(46,'Ataide','Santos','ataide71@email.com.br',NULL),
(47,'Luiz','Santos','luiz72@email.com.br',NULL),
(48,'Luciano','Santos','luciano73@email.com.br',NULL),
(49,'Adir','Santos','adir74@email.com.br',NULL),
(50,'Tainan','Santos','tainan75@email.com.br',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


LOCK TABLES `users_address` WRITE;
/*!40000 ALTER TABLE `users_address` DISABLE KEYS */;

INSERT INTO `users_address` (`user_id`, `id`, `street`, `number`, `complement`)
VALUES
(1,51,'rua manoel pedro vieira, 810','810','casa 1'),
(2,52,'paraguai','2041','casa 1'),
(3,53,'emilio daroz ','107','casa 1'),
(4,54,'rua lavinia moreira da silva','145','casa 1'),
(5,55,'padre anchieta','121','casa 1'),
(6,56,'rua amoroso costa','254','casa 1'),
(7,57,'alaor martins','312','casa 1'),
(8,58,'rua das violetas','330','casa 1'),
(9,59,'francisco carlos ','105','casa 1'),
(10,60,'torino','95','casa 1'),
(11,61,'rua erotidas','64','casa 1'),
(12,62,'r. orquideas','169','casa 1'),
(13,63,'rua joffre motta','44','casa 1'),
(14,64,'rua piauí','17','casa 1'),
(15,65,'fernandes marques','1229','casa 1'),
(16,66,'av. beta','07','casa 1'),
(17,67,'abagiba','674','casa 1'),
(18,68,'gumercindo araujo','302','casa 1'),
(19,69,'rua 01, quadra 35','35b','casa 1'),
(20,70,'rua piauí','23d','casa 1'),
(21,71,'rua leopoldina araãºjo','380','casa 1'),
(22,72,'rua conceiã§ã£o','101','casa 1'),
(23,73,'rua benedetto bonfilgi','755','casa 1'),
(24,74,'rua sã£o francisco','17','casa 1'),
(25,75,'rua dona zulmira','479','casa 1'),
(26,76,'rua mampituba','740','casa 1'),
(27,77,'dezeseis','151','casa 1'),
(28,78,'rua dos goitacazes','375','casa 1'),
(29,79,'av lucio jose de meneses','930','casa 1'),
(30,80,'caetano','3457','casa 1'),
(31,81,'um nova ','335','casa 1'),
(32,82,'sres area especial','19','casa 1'),
(33,83,'islandia','99','casa 1'),
(34,84,'independência','700','casa 1'),
(35,85,'sebastiã£o thomaz de oliveira','25','casa 1'),
(36,86,'nogueira','185','casa 1'),
(37,87,'tv londrina','12','casa 1'),
(38,88,'teofilo otoni','222','casa 1'),
(39,89,'joã£o rasmussen','244','casa 1'),
(40,90,'travessa elizeu araãºjo','46','casa 1'),
(41,91,'av. dr. joão pessoa','185','casa 1'),
(42,92,'travessa brandão','4','casa 1'),
(43,93,'coqueiros','SN','casa 1'),
(44,94,'estrada m boi mirim','820','casa 1'),
(45,95,'travessa dos comerciarios ','5','casa 1'),
(46,96,'dos jacarandas','30','casa 1'),
(47,97,'dona ermelinda pereira','413','casa 1'),
(48,98,'rua projetada 02','742','casa 1'),
(49,99,'samambaia','96','casa 1'),
(50,100,'rua dos gerã¢nios','110','casa 1');

/*!40000 ALTER TABLE `users_address` ENABLE KEYS */;
UNLOCK TABLES;
