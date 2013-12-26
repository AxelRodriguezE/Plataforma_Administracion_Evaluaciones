
/* Drop Tables */

DROP TABLE IF EXISTS evaluacion_contenido;
DROP TABLE IF EXISTS evaluacion;
DROP TABLE IF EXISTS pauta;
DROP TABLE IF EXISTS documento;
DROP TABLE IF EXISTS contenido;
DROP TABLE IF EXISTS asignatura;
DROP TABLE IF EXISTS usuario;
DROP TABLE IF EXISTS academico;
DROP TABLE IF EXISTS tipo_evaluacion;




/* Create Tables */

CREATE TABLE academico
(
	-- El identificador del académico sera su RUT sin guión, sin digito verificador.
	id_academico serial NOT NULL UNIQUE,
	nombre_academico varchar(45) DEFAULT 'NN' NOT NULL,
	rut_academico int NOT NULL UNIQUE,
	PRIMARY KEY (id_academico)
) WITHOUT OIDS;


CREATE TABLE usuario
(
	id_usuario serial NOT NULL UNIQUE,
	rut int NOT NULL UNIQUE,
	-- Contraseña de tamaño máximo 8 caracteres.
	password varchar(8) NOT NULL,
	-- Nivel de privilegios del usuario. Permite diferenciar al académico que solo hace clases, del que tiene una labor administrativa (en este caso el director de escuela).
	nivel_usuario int NOT NULL,
	-- El identificador del académico sera su RUT sin guión, sin digito verificador.
	academico_usuario int NOT NULL UNIQUE,
	PRIMARY KEY (id_usuario)
) WITHOUT OIDS;


CREATE TABLE contenido
(
	id_contenido serial NOT NULL UNIQUE,
	nombre_contenido varchar(45) NOT NULL,
	-- Será el codigo de la asignatura.
	asignatura_contenido int NOT NULL UNIQUE,
	PRIMARY KEY (id_contenido)
) WITHOUT OIDS;


CREATE TABLE pauta
(
	id_pauta serial NOT NULL UNIQUE,
	nombre_pauta varchar(45) NOT NULL,
	archivo_pauta text NOT NULL,
	-- Será el codigo de la asignatura.
	asignatura_pauta int NOT NULL UNIQUE,
	PRIMARY KEY (id_pauta)
) WITHOUT OIDS;


CREATE TABLE tipo_evaluacion
(
	id_tipo serial NOT NULL UNIQUE,
	nombre_tipo varchar(25) NOT NULL,
	PRIMARY KEY (id_tipo)
) WITHOUT OIDS;


CREATE TABLE asignatura
(
	-- Será el codigo de la asignatura.
	id_asignatura serial NOT NULL UNIQUE,
	codigo_asignatura varchar(20) NOT NULL UNIQUE,
	nombre_asignatura varchar(45) NOT NULL,
	-- El identificador del académico sera su RUT sin guión, sin digito verificador.
	academico_asignatura int NOT NULL UNIQUE,
	PRIMARY KEY (id_asignatura)
) WITHOUT OIDS;


CREATE TABLE evaluacion_contenido
(
	id_contenido int NOT NULL UNIQUE,
	id_evaluacion int NOT NULL UNIQUE
) WITHOUT OIDS;


CREATE TABLE evaluacion
(
	id_evaluacion serial NOT NULL UNIQUE,
	nombre_evaluacion varchar(45) NOT NULL,
	fecha_evaluacion date NOT NULL,
	-- Hora tentativa de la evaluación.
	hora_evaluacion time,
	-- Porcentaje de ponderación de la evaluación.
	ponderacion_evaluacion int,
	-- Observación con respecto a la evaluación.
	observacion_evaluacion varchar(200),
	tipo_evaluacion int NOT NULL UNIQUE,
	-- Será el codigo de la asignatura.
	asignatura_evaluacion int NOT NULL UNIQUE,
	-- El identificador del académico sera su RUT sin guión, sin digito verificador.
	academico_evaluacion int NOT NULL UNIQUE,
	pauta_evaluacion int UNIQUE,
	PRIMARY KEY (id_evaluacion)
) WITHOUT OIDS;


CREATE TABLE documento
(
	id_documento serial NOT NULL UNIQUE,
	nombre_documento varchar(25) DEFAULT 'documento' NOT NULL,
	archivo_documento text NOT NULL,
	contenido_documento int NOT NULL UNIQUE,
	PRIMARY KEY (id_documento)
) WITHOUT OIDS;



/* Create Foreign Keys */

ALTER TABLE evaluacion
	ADD FOREIGN KEY (academico_evaluacion)
	REFERENCES academico (id_academico)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE asignatura
	ADD FOREIGN KEY (academico_asignatura)
	REFERENCES academico (id_academico)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE usuario
	ADD FOREIGN KEY (academico_usuario)
	REFERENCES academico (id_academico)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE documento
	ADD FOREIGN KEY (contenido_documento)
	REFERENCES contenido (id_contenido)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE evaluacion_contenido
	ADD FOREIGN KEY (id_contenido)
	REFERENCES contenido (id_contenido)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE evaluacion
	ADD FOREIGN KEY (pauta_evaluacion)
	REFERENCES pauta (id_pauta)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE evaluacion
	ADD FOREIGN KEY (tipo_evaluacion)
	REFERENCES tipo_evaluacion (id_tipo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE pauta
	ADD FOREIGN KEY (asignatura_pauta)
	REFERENCES asignatura (id_asignatura)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE contenido
	ADD FOREIGN KEY (asignatura_contenido)
	REFERENCES asignatura (id_asignatura)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE evaluacion
	ADD FOREIGN KEY (asignatura_evaluacion)
	REFERENCES asignatura (id_asignatura)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE evaluacion_contenido
	ADD FOREIGN KEY (id_evaluacion)
	REFERENCES evaluacion (id_evaluacion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;



/* Comments */

COMMENT ON COLUMN academico.id_academico IS 'El identificador del académico sera su RUT sin guión, sin digito verificador.';
COMMENT ON COLUMN usuario.password IS 'Contraseña de tamaño máximo 8 caracteres.';
COMMENT ON COLUMN usuario.nivel_usuario IS 'Nivel de privilegios del usuario. Permite diferenciar al académico que solo hace clases, del que tiene una labor administrativa (en este caso el director de escuela).';
COMMENT ON COLUMN usuario.academico_usuario IS 'El identificador del académico sera su RUT sin guión, sin digito verificador.';
COMMENT ON COLUMN contenido.asignatura_contenido IS 'Será el codigo de la asignatura.';
COMMENT ON COLUMN pauta.asignatura_pauta IS 'Será el codigo de la asignatura.';
COMMENT ON COLUMN asignatura.id_asignatura IS 'Será el codigo de la asignatura.';
COMMENT ON COLUMN asignatura.academico_asignatura IS 'El identificador del académico sera su RUT sin guión, sin digito verificador.';
COMMENT ON COLUMN evaluacion.hora_evaluacion IS 'Hora tentativa de la evaluación.';
COMMENT ON COLUMN evaluacion.ponderacion_evaluacion IS 'Porcentaje de ponderación de la evaluación.';
COMMENT ON COLUMN evaluacion.observacion_evaluacion IS 'Observación con respecto a la evaluación.';
COMMENT ON COLUMN evaluacion.asignatura_evaluacion IS 'Será el codigo de la asignatura.';
COMMENT ON COLUMN evaluacion.academico_evaluacion IS 'El identificador del académico sera su RUT sin guión, sin digito verificador.';



