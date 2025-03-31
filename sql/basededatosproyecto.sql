
drop table article_order;
drop table `order`;
drop table user;
drop table rol_user;
drop table review;
drop table article;
drop table type;


use allblue;
create table `rol_user` (id_rol_user int primary key auto_increment, name varchar(20));
create table `user` (id_user int primary key auto_increment, email varchar(45) unique, user_name varchar(45), password varchar(45), id_rol_user int, foreign key (id_rol_user) references rol_user(id_rol_user));
create table `order` (id_order int primary key auto_increment, id_user int, address varchar(100), total_order_price double, foreign key(id_user) references user(id_user));
create table `type` (id_type int primary key auto_increment, name varchar(45));

create table `article` (id_article int primary key auto_increment, id_type int,name varchar(50), ph double, gh double, description varchar(200), temp int, longevity_in_years int, 
planted_in varchar(20), stock int, price double, foreign key(id_type) references type(id_type));

create table `article_order` (id_article_order int primary key auto_increment, id_article int, id_order int, quantity int, total_article_prince double,
foreign key(id_article) references article(id_article), foreign key(id_order) references `order`(id_order));
create table `review` (id_review int primary key auto_increment, opinion varchar(400), id_article int, star int, foreign key(id_article) references article(id_article));

insert into rol_user value (1,"admin");
insert into rol_user value (2,"normal user");

insert into user value (1, "admin@hotmail.com","ruben", "contraseña", 1);
insert into user value (2, "client@hotmail.com","ruben", "contraseña", 2);

insert into type value (1, "Peces");
insert into type value (2, "Plantas");
insert into type value (3, "Accesorios");

/*insert into article(id_type,name,ph,gh,description,temp,longevity,planted_in,stock,price) value (1, "Guppy", 5.5, 15, "El guppy es un pez ovovivíparo de agua dulce procedente 
de Sudamérica que habita en zonas de corriente baja de ríos, lagos y charcas",28,"3 años", null, 30, 2.5);*/
insert into article () value (1, 1, "Guppy", 5.5, 15, "El guppy es un pez ovovivíparo de agua dulce procedente 
de Sudamérica que habita en zonas de corriente baja de ríos, lagos y charcas",28,3, null, 30, 2.5);

insert into article value (2,1,"molly", 8.2, 20, "Robustos peces son conocidos por su rápida y fácil reproducción",28, 3, null, 30, 3);

insert into article value(3,1," neón",7.2,10,"Es un pequeño pez tropical de agua dulce, originario de américa del sur",26, 5, null, 50, 5);

insert into article value(4,1,"Tetra farolito",5.5,19,"Es un pez icónico para los aficionados al mundo de la acuariofilia",26,5, null, 40,3);

insert into article value(5,1,"Escalar",7.2,9,"Conocido por el pez angel de agua dulce", 26,9, null, 25,10);

insert into article value(6,1,"apistograma macmasteri",6.5,4,"forman parte del grupo de los ciclidos enanos, los ciclidos construyen una de las principales familias de agua dulce",
30,5, null, 10,20);

insert into article value(7,1,"apistograma cacatuoides",7,10,"El A. cacatuoides es un pequeño cíclido pero con un gran carácter,
es importante tener dos o tres hembras por cada macho y dotar de unos 70 a 80 cm de terreno de acuario para cada macho.",27, 5, null, 20,17.4);

insert into article value(8,1,"Rasbora galaxy",7.5,12," Estos peces son ideales para nanoacuarios, presentan una natación central y 
nadan en cardumen entre la vegetación",22, 5, null, 12,3.94);

insert into article value(9,1,"Betta",7,10,"un pez especial para todos ya sea como pez de iniciación como para el sector de acuariofilos más experimentado.",
 23,6, null, 13, 19.86);

insert into article value(10,1,"Ancistrus sp velo",7.5,12,"Un pez muy apreciado y de aspecto inconfundible con sus largas aletas 
pectorales y caudal principalmente. Son tolerantes en cuanto al resto de habitantes",25,10,null, 2,32.6);

insert into article value(11,2,"Lemna minor(lenteja de agua)",9,2,"La lemna minor se trata de una pequeña planta flotante",30, null, "superficie",100,1.5);
insert into article value(12,2,"Vallisneria americana",6,12,"También conocida como vallisneria gigante ruba, una planta de acuario que aporta elegancia",25,null,"sustrato",46,2.95);
insert into article value(13,2,"Vallisneria americana Gigantea",9,12,"Planta perfecta para planos traseros donde ocupará y tapará el cistal trasero",30,null,"sustrato",50,2.95);
insert into article value(14,2,"Vallisneria spiralis red",9,12,"Sus hojas tienen unos tonos rojizos, su crecimiento es relativamente rápido",30,null,"sustrato",30,2.95);
insert into article value(15,2,"Limnophila sessiliflora",7.5,12,"Es una planta encantadora que dará vida y armonía a tu acuario",28, null,"sustrato",85,4);
insert into article value(16,2,"Alternanthera reineckii",5,8,"Presenta una coloración roja espectacular, su crecimiento es lento",22,null,"sustrato",63,3);
insert into article value(17,2,"Hyygropilia lancea chai",5.5,12,"Es una planta acuatica fascinante y vibrante, de hojas alargadas",24,null,"sustrato",72,6.75);
insert into article value(18,2,"Anubia barteri nana",5,11,"Es una de las variedades de anubia más común y pequeña, de 3 a 5cm de ancho",25,null,"tronco/roca",25,4.95);
insert into article value(19,2,"Anubia barteri Golden Coin",5.5,8,"Planta de tamaño medio con hojas redondeadas de color verde brillante",25, null, "tronco/roca",38,5);
insert into article value(20,2,"Anubia nana petite bonsai",9,10,"Planta que puede crecer con poca luz, sin sustrato nutritivo",30,null,"tronco/roca",61,5.25);
insert into article value(21,3,"Salabre negro - Orase",null,null,"Salabre de color negro para atrapar peces y desechos",null,null,null,10,1.8);
insert into article value(22,3,"Aspirador/sifón triangular",null,null,"Sifón para aspirar y limpiar el sustrato",null,null,null,15,5.95);
insert into article value(23,3,"Eheim quick vac pro",null,null,"Aspirador de fondo accionado por pilas",null,null,null,5,57.95);
insert into article value(24,3,"Limpia tubos JBL cleany",null,null,"Limpiador para nuestros tubos del filtro",null,null,null,10,8.89);
insert into article value(25,3,"Imán limpiacristales flotante",null,null,"Imán para limpiar nuestro cristal del acuario",null,null,null,25,6.95);
insert into article value(26,3,"Trampa para caracoles",null,null,"Trampa para eliminar las molestas plagas de caracoles",null,null,null,7,14.90);
insert into article value(27,3,"Paridera interor",null,null,"Paridera para que nuestros alevines estén a salvo",null,null,null,5,28.75);
insert into article value(28,3,"Ventosas clip verde 2unidades",null,null,"ventosas para sujetar nuestros tubos, calentador, etc",null,null,null,50,1.5);
insert into article value(29,3,"Tubo 4x6mm (1 metro)",null,null,"Tubo transparente para mover agua",null,null,null,60,0.5);
insert into article value(30,3,"Silicona para acuarios",null,null,"Silicona para hacer reparaciones en nuestro acuario",null,null,null,20,14.30);

