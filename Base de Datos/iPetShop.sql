create database iPetShop;
use iPetShop;

create table roll(
id int primary key,
roll varchar(50)  
);

insert into roll values(1,'Admin');
insert into roll values(2,'Usuario');

CREATE TABLE users(
  id int NOT NULL primary key auto_increment,
  username varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  roll_id int, 
  foreign key (roll_id) references roll(id)
);

create table Productos(
clave int primary key auto_increment,
portfile longblob,
img varchar(80),
nombre varchar(80),
Descripcion varchar(1200),
precio int
);

create table Carrito(
id int primary key auto_increment,
img varchar(80),
cantidad int,
nombre varchar(80),
precio int,
subtotal int generated always as (precio * cantidad)
);

select * from carrito;



INSERT INTO carrito(num_compra) values
('78.png', '1', 'Shampoo', '250');

update carrito set num_compra='1' where id=3;

select * from carrito;

create table Compra(
clave int primary key auto_increment,
Cant_total int,
total int
);

select id,img, cantidad, nombre, subtotal from carrito join compra order by id;


INSERT INTO Carrito(portfile, nombre, precio) 
SELECT portfile, nombre, precio FROM Productos where clave = 6;

select clave, portfile, nombre, Descripcion,
precio from Productos order by clave;


