CREATE DATABASE cuca;
use cuca;

CREATE TABLE Contrato(
id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
termos VARCHAR(255) NOT NULL,
valor INTEGER NOT NULL,
ativo VARCHAR(255) NOT NULL,
horario CHAR NOT NULL,
turma VARCHAR(100) NOT NULL,
sala INTEGER NOT NULL,
PRIMARY KEY(id)
);

CREATE TABLE Contratante(
id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
ativo boolean NOT NULL,
diaPagamento INTEGER NOT NULL,
nome VARCHAR(255) NOT NULL,
numeroRG INTEGER NOT NULL UNIQUE,
emissor VARCHAR(255) NOT NULL,
dataNascimento DATE NOT NULL,
cpf INTEGER NOT NULL UNIQUE,
email VARCHAR(255) NOT NULL,
logradouro VARCHAR(255) NOT NULL,
cep INTEGER NOT NULL,
numero INTEGER NOT NULL,
bairro VARCHAR(255) NOT NULL,
cidade VARCHAR(255) NOT NULL,
estado char(2) NOT NULL,
dataAssinatura DATE NOT NULL,
FKidContrato INTEGER NOT NULL,
grauParentescoAluno CHAR NULL,
fone INTEGER NOT NULL,
wpp INTEGER NOT NULL,
FOREIGN KEY(FkidContrato) REFERENCES Contrato(id),
PRIMARY KEY(id)
);


CREATE TABLE usuario(
nome varchar(255) NOT NULL,
user varchar(255) NOT NULL,
senha varchar(255) NOT NULL,
id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
PRIMARY KEY(id)	
);


CREATE TABLE Mensalidade(
id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
pago BOOLEAN NOT NULL,
mes INTEGER NOT NULL,
FKidContratante INTEGER NOT NULL,
FKidContrato INTEGER NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY(FKidContrato) REFERENCES Contrato (id),
FOREIGN KEY(FKidContratante) REFERENCES Contratante (id)
);

CREATE TABLE Aluno(
	id INTEGER NOT NULL,
	codigoAluno INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	cpf INTEGER NOT NULL UNIQUE,
	rg INTEGER NOT NULL UNIQUE,
	dataNascimento DATE NOT NULL,
	nome varchar(255) NOT NULL,
	fone INTEGER NOT NULL,
	ativo BOOLEAN NOT NULL,
	wpp INTEGER NOT NULL,
	FKidContratante INTEGER NULL UNIQUE,
	PRIMARY KEY(id),
	FOREIGN KEY(FKidContratante) REFERENCES Contratante (id)
);

INSERT usuario(nome, user, senha)VALUES("ADMIN","ADMIN","ADMIN");

INSERT contrato(termos, valor, ativo, horario, turma, sala) VALUES("BABACA", 250.00, true, "M", "PSC-1", 7);

/*INSERT contratante() VALUES("BABACA", 250.00, true, "M", "PSC-1", 7);
*/

INSERT contratante(ativo,diaPagamento,nome,numeroRG,emissor,dataNascimento,cpf,email,logradouro,cep,numero,bairro, cidade,estado,dataAssinatura,FkidContrato,grauParentescoAluno,fone,wpp) VALUES(true,6,"Luiz",30573912,"SSP-AM",STR_TO_DATE('26,5,2000','%d,%m,%Y'),21,"luiz","cu",1,1,"comp","manan",'am',NOW(),1,null,123,123);

INSERT mensalidade(pago,mes,FKidContratante,FKidContrato)VALUES(false,4,1,1);


select e.nome, c.turma, c.horario, e.ativo, m.pago from contrato c, contratante e, mensalidade m WHERE e.FKidContrato=c.id and m.FKidContrato=c.id and m.mes=date_format(NOW(),"%m");
