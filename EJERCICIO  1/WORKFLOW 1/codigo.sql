create table flujo(
    id int not null auto_increment,
    PRIMARY KEY(id),
	flujo varchar(3),
    proceso varchar(3),
    procesoSiguiente varchar(3),
    tipo varchar(1),
    rol varchar(15),
    pantalla varchar(30)
 )

insert into flujo(flujo, proceso, procesoSiguiente, tipo, rol, pantalla) 
values('F1', 'P1', 'P2', 'I', 'direccion', 'convocatoria');


insert into flujo(flujo, proceso, procesoSiguiente, tipo, rol, pantalla)
values('F1', 'P2', 'P3', 'P', 'estudiante', 'publicacion');

insert into flujo(flujo, proceso, procesoSiguiente, tipo, rol, pantalla) 
values('F1', 'P3', 'P4', 'P', 'estudiante', 'documentos');

insert into flujo(flujo, proceso, procesoSiguiente, tipo, rol, pantalla) 
values('F1', 'P4', 'P5', 'P', 'estudiante', 'presentarDoc');

insert into flujo(flujo, proceso, procesoSiguiente, tipo, rol, pantalla) 
values('F1', 'P5', 'P6', 'P', 'kardexF', 'recepcionDoc');

insert into flujo(flujo, proceso, procesoSiguiente, tipo, rol, pantalla) 
values('F1', 'P6', 'P7', 'P', 'direccion', 'revisionDoc');

insert into flujo(flujo, proceso, procesoSiguiente, tipo, rol, pantalla) 
values('F1', 'P7', 'P8', 'P', 'direccion', 'listaPos');

insert into flujo(flujo, proceso, procesoSiguiente, tipo, rol, pantalla)
values('F1', 'P8', null, 'Q', 'direccion', 'habilitado');

insert into flujo(flujo, proceso, procesoSiguiente, tipo, rol, pantalla)
values('F1', 'P9', 'P11', 'P', 'direccion', 'notifica');

insert into flujo(flujo, proceso, procesoSiguiente, tipo, rol, pantalla)
values('F1', 'P10', 'P11', 'P', 'direccion', 'fechaEva');


create table usuario(
    ci int,
    PRIMARY KEY(ci),
	usser varchar(20),
    pasword varchar(20),
    nombre varchar(40),
    convocatoria varchar(20),
    documentoPos varchar(20),
    listaPos varchar(20),
    cronogramaEva varchar(20)
)

insert into usuario values(444222, 'maria', '123456', 'María Fernanda González', null, null, null, null);
insert into usuario values(333111, 'juan', '123456', 'Juan Carlos Pérez', null, null, null, null);
insert into usuario values(222777, 'luis', '123456', 'Luis García Martínez', null, null, null, null);


create table flujousuario
(
id int not null auto_increment,
PRIMARY KEY(id),
numeroPostulante int,
flujo varchar(3),
proceso varchar(3),
fechaInicio datetime,
fechaFin datetime,
usuario varchar(20)
)


insert into flujousuario values (1,'1','F1','P1','2022/11/03 12:00','2022/11/03 12:15','maria');
insert into flujousuario values (2,'1','F1','P2','2022/11/03 12:15','2022/11/03 12:30','juan');
insert into flujousuario values (3,'1','F1','P3','2022/11/03 12:30','2022/11/03 12:50','juan');
insert into flujousuario values (4,'1','F1','P4','2022/11/10 15:00','2022/11/10 15:20','juan');
insert into flujousuario values (5,'1','F1','P5','2022/11/10 15:20','2022/11/10 15:30','luis');
insert into flujousuario values (6,'1','F1','P6','2022/11/12 08:00','2022/12/10 16:30','maria');
insert into flujousuario values (7,'1','F1','P7','2022/12/03 08:00','2022/12/20 16:30','maria');
insert into flujousuario values (8,'1','F1','P8','2022/12/03 08:00','2022/12/20 16:30','maria');
insert into flujousuario values (9,'1','F1','P9','2022/12/03 08:00','2022/12/20 16:30','maria');
insert into flujousuario values (10,'1','F1','P10','2023/01/25 12:00', null,'juan');



create table flujocondicional
(
id int not null auto_increment,
PRIMARY KEY(id),
flujo varchar(3),
proceso varchar(3),
psi varchar(3),
pno varchar(3)
)


insert into flujocondicional(flujo, proceso, psi, pno)
values('F1', 'P8', 'P10', 'P9');