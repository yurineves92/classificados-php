CREATE TABLE usuarios (
	id serial primary key not null,
	nome VARCHAR(100) not null,
	email VARCHAR(100) not null,
	senha VARCHAR(32) not null,
	telefone VARCHAR(30)
);
CREATE TABLE categorias (
	id serial primary key not null,
	nome VARCHAR(100) not null
);
CREATE TABLE anuncios (
	id serial primary key not null,
	id_usuario int not null,
	id_categoria int not null,
	titulo VARCHAR(255) not null,
	descricao VARCHAR(255) not null,
	valor float not null,
	estado int
);
CREATE table anuncios_imagens (
	id serial primary key not null,
	id_anuncio int not null,
	url VARCHAR(100) not null
);