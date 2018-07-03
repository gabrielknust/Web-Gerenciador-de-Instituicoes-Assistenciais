create database wegia default charset utf8;

use wegia;

create table pessoa (
	id_pessoa int not null primary key,
    
    login varchar(40), #CPF da pessoa
    senha varchar(70),
    nome varchar(100) not null,
    sexo varchar(10) not null,
    telefone varchar(33),
    data_nascimento date not null,
    imagem longtext,
    cep int not null,
    cidade varchar(40) not null,
    bairro varchar(40) not null,
    rua varchar(40) not null,
    numero_endereco varchar(7),
    complemento varchar(50),
	registro_geral varchar(13) not null, 
    orgao_emissor varchar(20) not null,
    data_expedicao date,
    nome_mae varchar(100),
    nome_pai varchar(100)
    
)engine = InnoDB;

create table interno(
	id_interno int not null primary key,
    id_pessoa int not null,
    id_situacao_interno int not null,
    
    nome_contato_urgente varchar(60),
    telefone_contato_urgente_1 varchar(33),
    telefone_contato_urgente_2 varchar(33),
    telefone_contato_urgente_3 varchar(33),
    
    foreign key(id_pessoa) references pessoa(id_pessoa)
    
)engine = InnoDB;

create table situacao_interno(
	id_situacao_interno int not null primary key,
    
    descricao varchar (50) not null
    
)engine = InnoDB;

create table movimentacao_interno(
	id_movimentacao int not null primary key,
    id_interno int not null,
    id_situacao_interno int not null,
    
    data_hora date not null,
    
    foreign key(id_interno) references interno(id_interno),
    foreign key(id_situacao_interno) references situacao_interno(id_situacao_interno)
    
)engine = InnoDB;

create table voluntario(
	id_voluntario int not null primary key,
    id_pessoa int not null,
    
    foreign key(id_pessoa) references pessoa(id_pessoa)
    
)engine = InnoDB;

create table voluntario_judicial(
	id_voluntario_judicial int not null primary key,
    id_pessoa int not null,
    
	documento_judicial varchar(40),
    foreign key(id_pessoa) references pessoa(id_pessoa)
    
)engine = InnoDB;

 create table quadro_horario(
	id_quadro_horario int not null primary key,
	escala varchar(15),
	tipo varchar(15),
	carga_horaria decimal(5,2),	
    entrada1 varchar(5),
	saida1 varchar(5),
	entrada2 varchar(5),
	saida2 varchar(5),
	total varchar(5),
	dias_trabalhados varchar(100),
	folga varchar(30),
	observacoes varchar(240)

 )engine = InnoDB;

create table funcionario(
	id_funcionario int not null primary key,
    id_pessoa int not null,
    id_quadro_horario int not null,
    
    vale_transporte varchar(16),
    data_admissao date not null,
	pis varchar(14),
    ctps varchar(15) not null,
    uf_ctps varchar(2),
    numero_titulo varchar(15), 
    zona varchar(3),
    secao varchar(4),
    certificado_reservista_numero int,
	certificado_reservista_serie varchar(10),
    calcado varchar(2),
    calca varchar(2),
    jaleco varchar(2),
    camisa varchar(2),
    usa_vtp varchar(3),
    cesta_basica varchar(3),
    situacao varchar(10),
	
    foreign key(id_pessoa) references pessoa(id_pessoa),
    foreign key(id_quadro_horario) references quadro_horario(id_quadro_horario)
    
)engine = InnoDB;/* criação da tabela funcionario, irá armazenar todos os funcionarios e suas informações. A partir dela
há uma verificação nela antes de ser criado um usuário, só pode haver um usuário de um funcionário se este estiver 
cadastrado na tabela funcionários. Será pedido o CPF na hora do cadastro de uma conta, esse CPF será procurado na tabela
funcionários, se este existir ele reconhecerá que a conta a ser criada pertence ao funcionário com CPF correspondente.
Se não for encontrado esse CPF na tabela funcionário, não poderá ser criada a conta */

create table situacao_funcionario(
	id_situacao_funcionario int not null primary key,
    
    descricao varchar (50) not null
    
)engine = InnoDB;

create table movimentacao_funcionario(
	id_movimentacao int not null primary key,
    id_funcionario int not null,
    id_situacao_funcionario int not null,
    
    data_hora date not null,
    
	foreign key(id_funcionario) references funcionario(id_funcionario),
    foreign key(id_situacao_funcionario) references situacao_funcionario(id_situacao_funcionario)
    
)engine = InnoDB;

create table cargo(
	id_cargo int not null primary key,
    
    descricao varchar(30)
    
)engine = InnoDB; /* O cargo que o usuário tiver definirá a quais tabelas ele terá acesso e quais não, se é possível 
modificá-la ou apenas fazer uma consulta nela. */

/*
insert into cargo(id_cargo,descricao)
values
(01,'Agente Administrativo'),
(02,'Assistente Social'),
(03,'Auxiliar Administrativo'),
(04,'Auxiliar de Enfermagem'),
(05,'Cozinheiro(a)'),
(06,'Cuidador(a)'),
(07,'Enfermeira Chefe'),
(08,'Enfermeiro(a)'),
(09,'Fisioterapeuta'),
(10,'Motorista'),
(11,'Nutricionista'),
(12,'Pedreiro'),
(13,'Psicólogo(a)'),
(14,'Recreador(a)'),
(15,'Recepcionista'),
(16,'Serviços Gerais'),
(17,'Técnico de Enfermagem'),
(18,'Técnico de Informática'); /* cargos existentes na tabela CARGO */

create table funcionario_cargo(
	id_cargo int not null,
	id_funcionario int not null,
    
    primary key(id_cargo,id_funcionario),
    foreign key(id_cargo) references cargo(id_cargo),
    foreign key(id_funcionario) references funcionario(id_funcionario)
    
)engine = InnoDB; /* Definirá quais os cargos o funcionário terá. */

create table voluntario_cargo(
	id_cargo int not null,
	id_voluntario int not null,
    
    primary key(id_cargo,id_voluntario),
    foreign key(id_cargo) references cargo(id_cargo),
    foreign key(id_voluntario) references voluntario(id_voluntario)
)engine = InnoDB;

create table voluntario_judicial_cargo(
	id_cargo int not null,
	id_voluntarioJ int not null,
    
    primary key(id_cargo,id_voluntarioJ),
    foreign key(id_cargo) references cargo(id_cargo),
    foreign key(id_voluntarioJ) references voluntario_judicial(id_voluntario_judicial)
)engine = InnoDB;
