CREATE DATABASE cuca;
use cuca;

CREATE TABLE Contratante(
id INTEGER NOT NULL UNIQUE,
diaPagamento INTEGER NOT NULL,
nome INTEGER NOT NULL,
numeroRG INTEGER NOT NULL UNIQUE,
emissor INTEGER NOT NULL,
dataNascimento INTEGER NOT NULL,
cpf INTEGER NOT NULL UNIQUE,
email INTEGER NOT NULL,
logradouro INTEGER NOT NULL,
cep INTEGER NOT NULL,
numero INTEGER NOT NULL,
bairro INTEGER NOT NULL,
cidade INTEGER NOT NULL,
grauParentescoAluno CHAR NULL,
fone INTEGER NOT NULL,
wpp INTEGER NOT NULL,
PRIMARY KEY(id)
);

CREATE TABLE ADMIN(
nome varchar(255) NOT NULL,
login varchar(255) NOT NULL,
senha varchar(255) NOT NULL,
id INTEGER NOT NULL UNIQUE,
PRIMARY KEY(id)	
);

CREATE TABLE Contrato(
id INTEGER NOT NULL UNIQUE,
termos VARCHAR(255) NOT NULL,
horario CHAR NOT NULL NULL,
sala INTEGER NOT NULL,
PRIMARY KEY(id)
);

CREATE TABLE Mensalidade(
id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
mes INTEGER NOT NULL,
valor INTEGER NOT NULL,
FKidContrato INTEGER NOT NULL UNIQUE,
PRIMARY KEY(id),
FOREIGN KEY(FKidContrato) REFERENCES Contrato (id)
);

CREATE TABLE Aluno(
	id INTEGER NOT NULL,
	codigoAluno INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	cpf INTEGER NOT NULL UNIQUE,
	rg INTEGER NOT NULL UNIQUE,
	dataNascimento INTEGER NOT NULL,
	nome varchar(255) NOT NULL,
	fone INTEGER NOT NULL,
	ativo BOOLEAN NOT NULL,
	wpp INTEGER NOT NULL,
	FKidContratante INTEGER NULL UNIQUE,
	PRIMARY KEY(id),
	FOREIGN KEY(FKidContratante) REFERENCES Contratante (id)
);

CREATE TABLE AssinaContrato(
dataAssinatura INTEGER NOT NULL,
FKidContrato INTEGER NOT NULL,
FKidContratante INTEGER NOT NULL,
FOREIGN KEY(FkidContrato) REFERENCES Contrato(id),
FOREIGN KEY(FkidContratante) REFERENCES Contratante(id)
);

CREATE TABLE PagamentoMensalidade(
dataPago INTEGER NOT NULL,
FKidMensalidade INTEGER NOT NULL,
FKidContratante INTEGER NOT NULL,
FOREIGN KEY(FkidMensalidade) REFERENCES Mensalidade(id),
FOREIGN KEY(FkidContratante) REFERENCES Contratante(id)
);

