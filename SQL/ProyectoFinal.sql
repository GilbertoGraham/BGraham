--create database appweb

create table user (name varchar (20) not null primary key, password varchar(20) not null)
--crear usuarios para la recepcionista, médico
--crear otra base de datos
create table medicos (id_medico int(3) primary key, nombre varchar(40) not null, paterno nvarchar (40) not null, materno nvarchar (40) default '', telefono varchar(15), id_pais char(3) not null, id_estado char(3) not null, id_ciudad char(3) not null, id_colonia char(3) not null,  index (paterno), constraint fk_Medicos_Domicilio foreign key (id_pais, id_estado, id_ciudad, id_colonia) references colonias(id_pais, id_estado, id_ciudad, id_colonia));

create table pacientes (id_paciente int auto_increment primary key, nombre nvarchar (40) not null, paterno nvarchar (30) not null, materno nvarchar (30), telefono varchar(15) not null, id_medico int(3), id_pais char(3) not null, id_estado char(3) not null, id_ciudad char(3) not null, id_colonia char(3) not null, constraint fk_Pacientes_domicilio foreign key (id_pais, id_estado, id_ciudad, id_colonia) references colonias(id_pais, id_estado, id_ciudad, id_colonia), constraint fk_Pacientes_id_medico foreign key (id_medico) references medicos(id_medico), index (paterno, materno, nombre));

create table citas (id_cita int(3) auto_increment primary key, fechayhora datetime unique, concretada boolean, id_diagnostico int(3), id_medico int(3), id_paciente int, constraint fk_Citas_id_medico foreign key (id_medico) references medicos(id_medico), constraint fk_Citas_id_paciente foreign key (id_paciente) references pacientes(id_paciente)) ;
--Para insertar una fecha, se usa el formato 2013-11-24 17:15:10

create table diagnostico (id_diagnostico int(3) auto_increment primary key, id_cita int(3), receta varchar(300), diagnostico varchar(3000), constraint fk_id_cita foreign key (id_cita) references citas(id_cita));

create table recepcionistas (id_recepcionista int(1), nombre nvarchar (40), paterno nvarchar(40), materno nvarchar(40));

--trigger para cuando insertan citas, se cree un diagnóstico vacío
delimiter //
create trigger nueva_cita
after insert on citas
for each row
begin 
insert into diagnostico (id_cita, receta, diagnostico)values (new.id_cita, 'N/A', 'N/A');
end; //
delimiter ;