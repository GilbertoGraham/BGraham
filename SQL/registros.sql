--registros 
INSERT INTO paises VALUES('1','MÉXICO');
INSERT INTO paises VALUES('2','ESTADOS UNIDOS');
INSERT INTO paises VALUES('3','FRANCIA');
INSERT INTO paises VALUES('4','COLOMBIA');
INSERT INTO paises VALUES('5','CANADÁ');

INSERT INTO estados VALUES('1','10','COAHUILA');
INSERT INTO estados VALUES('2','20', 'FLORIDA');
INSERT INTO estados VALUES('3','30','PARIS');
INSERT INTO estados VALUES('4','40','BOGOTÁ');
INSERT INTO estados VALUES('5','50','QUEBEC');

INSERT INTO ciudades VALUES('1','10','111','SALTILLO');
INSERT INTO ciudades VALUES('2','20','222','MIAMI');
INSERT INTO ciudades VALUES('3','30','333','VALENCE');
INSERT INTO ciudades VALUES('4','40','444','SANTA FE');
INSERT INTO ciudades VALUES('5','50','555','DANVILLE');

INSERT INTO colonias VALUES('1','10','111','011','OCEANIA');
INSERT INTO colonias VALUES('2','20','222','012','UNIVERSE');
INSERT INTO colonias VALUES('3','30','333','013','FLEUR');
INSERT INTO colonias VALUES('4','40','444','014','TAMBOR');
INSERT INTO colonias VALUES('5','50','555','015','CASTLES');

INSERT INTO medicos VALUES (1, 'Happy', 'Donkey', null, '8441277455', '1', '10', '111', '011');

INSERT INTO pacientes (nombre, paterno, telefono, id_medico, id_pais, id_estado, id_ciudad, id_colonia, sexo) VALUES ('Juan', 'López', '8441277044', 1, '1', '10','111', '011', 'masculino');

insert into citas (fechayhora, concretada, id_medico, id_paciente) values ('2013-11-24 17:15:10', 1, 1, 1);

update medicos set materno = '' where materno = null;
update pacientes set materno = '' where materno = null;