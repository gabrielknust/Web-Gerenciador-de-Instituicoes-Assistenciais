create schema wegia default charset utf8;

use wegia;	

/*--------------------------- Cadastro -------------------------------- */
create table calcado (
	tamanhos int primary key
    );
create table calca(
	tamanhos int primary key
    );
create table jaleco(
    tamanhos int primary key
    );
create table camisa(
	tamanhos int primary key
    );
create table situacao(
    situacoes varchar(100) primary key
    );
create table pessoa (
	id_pessoa int not null primary key auto_increment,
    cpf varchar(20),
    senha varchar(70),
    nome varchar(100),
    sexo char,
    telefone varchar(100),
    data_nascimento date,
    imagem longtext,
    cep varchar(10),
    estado varchar(50),
    cidade varchar(40),
    bairro varchar(40),
    logradouro varchar(40),
    numero_endereco varchar(10),
    complemento varchar(50),
    ibge varchar(20),
	registro_geral varchar(13), 
    orgao_emissor varchar(20),
    data_expedicao date,
    nome_mae varchar(100),
    nome_pai varchar(100),
    tipo_sanguineo varchar(50)
    
)engine = InnoDB;

create table documento(
	id_documento int primary key auto_increment,
    imagem longtext,
    imagem_extensao varchar(10),
    descricao varchar(40)

)engine = InnoDB;

create table pessoa_documento(
	id_pessoa int not null,
    id_documento int not null,
    primary key(id_pessoa,id_documento),
    foreign key(id_pessoa) references pessoa (id_pessoa),
	foreign key(id_documento) references documento (id_documento)
    
)engine = InnoDB;

create table situacao_interno(
	id_situacao_interno int not null primary key auto_increment,
    
    data_hora datetime,
    descricao varchar(50),
    imagem longtext,
    imagem_extensao varchar(10)
    
)engine = InnoDB;

create table interno(
	id_interno int not null primary key auto_increment,
    id_pessoa int,
    
    nome_contato_urgente varchar(60),
    telefone_contato_urgente_1 varchar(33),
    telefone_contato_urgente_2 varchar(33),
    telefone_contato_urgente_3 varchar(33),
    observacao varchar(2000),
	certidao_nascimento varchar(60),
    curatela varchar(60),
    inss varchar(60),
    loas varchar(60),
    bpc varchar(60),
    funrural varchar(60),
    saf varchar(60),
    sus varchar(60),
    
    foreign key(id_pessoa) references pessoa(id_pessoa)
    
)engine = InnoDB;

create table movimentacao_interno(
    id_interno int not null,
    id_situacao_interno int not null,
    
	primary key(id_interno,id_situacao_interno),
    foreign key(id_interno) references interno(id_interno),
    foreign key(id_situacao_interno) references situacao_interno(id_situacao_interno)
    
)engine = InnoDB;

create table voluntario(
	id_voluntario int not null primary key auto_increment,
    id_pessoa int,
    
    foreign key(id_pessoa) references pessoa(id_pessoa)
    
)engine = InnoDB;

create table voluntario_judicial(
	id_voluntario_judicial int not null primary key auto_increment,
    id_pessoa int,
    
	documento_judicial varchar(40),
    foreign key(id_pessoa) references pessoa(id_pessoa)
    
)engine = InnoDB;
/*
 create table quadro_horario(
	id_quadro_horario int not null primary key auto_increment,
    
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
*/
create table funcionario(
	id_funcionario int not null primary key auto_increment,
    id_pessoa int,
    /*id_quadro_horario int,*/
    
    vale_transporte varchar(16),
    data_admissao date not null,
	pis varchar(14),
    ctps varchar(15) not null,
    uf_ctps varchar(20),
    numero_titulo varchar(15),
    zona varchar(30),
    secao varchar(40),
    certificado_reservista_numero varchar(100),
	certificado_reservista_serie varchar(100),
    calcado varchar(20),
    calca varchar(20),
    jaleco varchar(20),
    camisa varchar(20),
    usa_vtp varchar(30),
    cesta_basica varchar(300),
    situacao varchar(100),
	
    foreign key(id_pessoa) references pessoa(id_pessoa)
    /*foreign key(id_quadro_horario) references quadro_horario(id_quadro_horario)*/
    
)engine = InnoDB;/* criação da tabela funcionario, irá armazenar todos os funcionarios e suas informações. A partir dela
há uma verificação nela antes de ser criado um usuário, só pode haver um usuário de um funcionário se este estiver 
cadastrado na tabela funcionários. Será pedido o CPF na hora do cadastro de uma conta, esse CPF será procurado na tabela
funcionários, se este existir ele reconhecerá que a conta a ser criada pertence ao funcionário com CPF correspondente.
Se não for encontrado esse CPF na tabela funcionário, não poderá ser criada a conta */

create table situacao_funcionario(
	id_situacao_funcionario int not null primary key auto_increment,
    
	data_hora datetime,
    descricao varchar (50),
    imagem longtext,
    imagem_extensao varchar(40)
    
)engine = InnoDB;

create table movimentacao_funcionario(
    id_funcionario int not null,
    id_situacao_funcionario int not null,
    
	primary key(id_funcionario,id_situacao_funcionario),
	foreign key(id_funcionario) references funcionario(id_funcionario),
    foreign key(id_situacao_funcionario) references situacao_funcionario(id_situacao_funcionario)
    
)engine = InnoDB;

create table cargo(
	id_cargo int not null primary key auto_increment,
    
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

create table acao(
	id_acao int not null primary key auto_increment,
    descricao varchar(240)
)engine = InnoDB;

create table permissao(
	id_cargo int not null,
    id_acao int not null,
    
    primary key(id_cargo,id_acao),
    foreign key(id_cargo) references cargo(id_cargo),
    foreign key(id_acao) references acao(id_acao)
)engine = InnoDB;

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

DELIMITER &&

CREATE  PROCEDURE cadinterno (in nome varchar(100),in cpf varchar(40),in senha varchar(70), in sexo char(1), in telefone varchar(25),in data_nascimento date, 
in imagem longtext, in cep varchar(20),in estado varchar(5), in cidade varchar(40), in bairro varchar(40), in logradouro varchar(40), in numero_endereco varchar(11),
in complemento varchar(50), in ibge varchar(20), in registro_geral varchar(20), in orgao_emissor varchar(20), in data_expedicao date,in nome_pai varchar(100),
in nome_mae varchar(100), in tipo_sanguineo varchar(5), in nome_contato_urgente varchar(60),in telefone_contato_urgente_1 varchar(33),in telefone_contato_urgente_2 varchar(33),
in telefone_contato_urgente_3 varchar(33),in certidao_nascimento varchar(60), in curatela varchar(60),in inss varchar(60),in loas varchar(60),in bpc varchar(60),in funrural varchar(60),
in saf varchar(60),in sus varchar(60))

begin

declare idP int;

insert into pessoa(nome,cpf,senha,sexo,telefone,data_nascimento,imagem,cep,estado,cidade, bairro, logradouro, numero_endereco,
complemento,ibge,registro_geral,orgao_emissor,data_expedicao, nome_pai, nome_mae, tipo_sanguineo)
values(nome,cpf, senha, sexo, telefone,data_nascimento,imagem,cep,estado,cidade,bairro,logradouro,numero_endereco,complemento,ibge,registro_geral,orgao_emissor,data_expedicao,nome_pai,nome_mae,tipo_sanguineo);
SELECT 
    MAX(id_pessoa)
INTO idP FROM
    pessoa;

insert into interno(id_pessoa,nome_contato_urgente,telefone_contato_urgente_1,telefone_contato_urgente_2,telefone_contato_urgente_3,certidao_nascimento,curatela,inss,loas,bpc,funrural,saf,sus) 
values(idP,nome_contato_urgente,telefone_contato_urgente_1,telefone_contato_urgente_2,telefone_contato_urgente_3,certidao_nascimento,curatela,inss,loas,bpc,funrural,saf,sus);

end &&

CREATE  PROCEDURE cadfuncionario(in nome varchar(100),in cpf varchar(40),in senha varchar(70), in sexo char(1), in telefone varchar(100),in data_nascimento date, 
in imagem longtext, in cep varchar(100), in estado varchar(5), in cidade varchar(40), in bairro varchar(40), in logradouro varchar(40), in numero_endereco varchar(100),
in complemento varchar(50),in ibge varchar(20), in registro_geral varchar(20), in orgao_emissor varchar(20), in data_expedicao date,in nome_pai varchar(100),
in nome_mae varchar(100), in tipo_sanguineo varchar(5),/*in escala varchar(15),in tipo varchar(15), in carga_horaria decimal(5,2),
in entrada1 varchar(5),in saida1 varchar(5),in entrada2 varchar(5),in saida2 varchar(5),in total varchar(5),in dias_trabalhados varchar(100),
in folga varchar(30),in observacoes varchar(240),*/in vale_transporte varchar(100),in data_admissao date,in pis varchar(100),in ctps varchar(100),
in uf_ctps varchar(20),in numero_titulo varchar(15),in zona varchar(30),in secao varchar(40),in certificado_reservista_numero varchar(100),in certificado_reservista_serie varchar(10),
in calcado varchar(20),in calca varchar(20),in jaleco varchar(20),in camisa varchar(20),in usa_vtp varchar(30),in cesta_basica varchar(30),in situacao varchar(10))

begin

declare idP int;
#declare idQ int;

insert into pessoa(nome, cpf, senha,sexo, telefone,data_nascimento,imagem, cep ,estado,cidade, bairro, logradouro, numero_endereco,
complemento,ibge,registro_geral,orgao_emissor,data_expedicao, nome_pai, nome_mae, tipo_sanguineo)
values(nome,cpf,senha,sexo,telefone,data_nascimento,imagem,cep,estado,cidade, bairro, logradouro, numero_endereco,
complemento,ibge,registro_geral,orgao_emissor,data_expedicao, nome_pai, nome_mae, tipo_sanguineo);

select max(id_pessoa) into idP FROM pessoa;

/*insert into quadro_horario(escala, tipo, carga_horaria, entrada1, saida1, entrada2, saida2,total, dias_trabalhados, folga, observacoes)
values(escala, tipo, carga_horaria, entrada1, saida1, entrada2, saida2,total, dias_trabalhados, folga, observacoes);
select max(id_quadro_horario) into idQ FROM quadro_horario;*/

insert into funcionario(id_pessoa,/*id_quadro_horario,*/vale_transporte,data_admissao,pis,ctps,
uf_ctps,numero_titulo,zona,secao,certificado_reservista_numero,certificado_reservista_serie,calcado,calca,jaleco,camisa,
usa_vtp,cesta_basica,situacao)
values(idP,/*idQ,*//*id_quadro_horario,*/vale_transporte,data_admissao,pis,ctps,uf_ctps,numero_titulo,zona,secao,
certificado_reservista_numero,certificado_reservista_serie,calcado,calca,jaleco,camisa,usa_vtp,cesta_basica,situacao);

end &&

DELIMITER ;

/*------------------------------------------- Estoque ---------------------------------------------------*/

create table categoria_produto(
    id_categoria_produto int not null primary key auto_increment,
    descricao_categoria varchar(240) not null
)engine = InnoDB;

create table unidade(
    id_unidade int not null primary key auto_increment,
    descricao_unidade varchar(240) not null
)engine = InnoDB;

create table produto(
    id_produto int not null primary key auto_increment,
    id_categoria_produto int not null,
    id_unidade int not null,
    
    descricao varchar(240),
    codigo varchar(15) unique,
    preco decimal(10,2),
    
    foreign key(id_categoria_produto) references categoria_produto(id_categoria_produto),
    foreign key(id_unidade) references unidade(id_unidade)
)engine = InnoDB;

create table almoxarifado(
    id_almoxarifado int not null primary key auto_increment,
    descricao_almoxarifado varchar(240) not null
)engine = InnoDB;

create table estoque(
    id_produto int not null,
    id_almoxarifado int not null,
    qtd int,
    
    primary key(id_produto,id_almoxarifado),
    foreign key(id_produto) references produto(id_produto),
    foreign key(id_almoxarifado) references almoxarifado(id_almoxarifado)
)engine = InnoDB;

create table origem(
    id_origem int not null primary key auto_increment,
    nome_origem varchar(100) not null,
    cnpj varchar(20),
	cpf varchar(20),
    telefone varchar(33)
)engine = InnoDB;

create table tipo_entrada(
    id_tipo int not null primary key auto_increment,
    descricao varchar(120) not null
)engine = InnoDB;

create table entrada(
    id_entrada int not null primary key auto_increment,
    id_origem int not null,
    id_almoxarifado int not null,
    id_tipo int not null,
    id_responsavel int not null,
    data date,
    hora time,
    valor_total decimal(10,2),
    
    foreign key(id_origem) references origem(id_origem),
    foreign key(id_almoxarifado) references almoxarifado(id_almoxarifado),
    foreign key(id_tipo) references tipo_entrada(id_tipo),
    foreign key(id_responsavel) references pessoa(id_pessoa)
)engine = InnoDB;

create table ientrada(
    id_ientrada int not null primary key auto_increment,
    id_entrada int not null,
    id_produto int not null,
    qtd int,
    valor_unitario decimal(10,2),
    
    foreign key(id_entrada) references entrada(id_entrada),
    foreign key(id_produto) references produto(id_produto)
)engine = InnoDB;



create table destino(
    id_destino int not null primary key auto_increment,
    nome_destino varchar(100) not null,
    cnpj varchar(20),
    cpf varchar(20),
    telefone varchar(33)
)engine = InnoDB;

create table tipo_saida(
    id_tipo int not null primary key auto_increment,
    descricao varchar(120) not null
)engine = InnoDB;

create table saida(
    id_saida int not null primary key auto_increment,
    id_destino int not null,
    id_almoxarifado int not null,
    id_tipo int not null,
    id_responsavel int not null,
    
    data date,
    hora time,
    valor_total decimal(10,2),
    
    foreign key(id_destino) references destino(id_destino),
    foreign key(id_almoxarifado) references almoxarifado(id_almoxarifado),
    foreign key(id_tipo) references tipo_saida(id_tipo),
    foreign key(id_responsavel) references pessoa(id_pessoa)
)engine = InnoDB;

create table isaida(
    id_isaida int not null primary key auto_increment,
    id_saida int not null,
    id_produto int not null,
    qtd int,
    valor_unitario decimal(10,2),
    
    foreign key(id_saida) references saida(id_saida),
    foreign key(id_produto) references produto(id_produto)
)engine = InnoDB;


DELIMITER $


/* criação do gatilho que insere na tabela estoque depois de um insert na tabela ientrada */
CREATE TRIGGER tgr_ientrada_insert
AFTER INSERT ON ientrada
FOR EACH ROW
BEGIN

	INSERT IGNORE INTO estoque(id_produto, id_almoxarifado, qtd) values(NEW.id_produto, (SELECT id_almoxarifado FROM entrada WHERE id_entrada = NEW.id_entrada), 0);
	
    UPDATE estoque SET qtd = qtd+NEW.qtd WHERE id_produto = NEW.id_produto AND id_almoxarifado = (SELECT id_almoxarifado FROM entrada WHERE id_entrada = NEW.id_entrada);
	
END $

CREATE TRIGGER tgr_ientrada_delete
AFTER DELETE ON ientrada
FOR EACH ROW
BEGIN
	
    UPDATE estoque SET qtd = qtd - OLD.qtd WHERE id_produto = OLD.id_produto AND id_almoxarifado = (SELECT id_almoxarifado FROM entrada WHERE id_entrada = OLD.id_entrada);
	
END $

CREATE TRIGGER tgr_isaida_delete
AFTER DELETE ON isaida
FOR EACH ROW
BEGIN
	
    UPDATE estoque SET qtd = qtd+OLD.qtd WHERE id_produto = OLD.id_produto AND id_almoxarifado = (SELECT id_almoxarifado FROM saida WHERE id_saida = OLD.id_saida);
	
END $

CREATE TRIGGER tgr_isaida_insert
AFTER INSERT ON isaida
FOR EACH ROW
BEGIN
	
    UPDATE estoque SET qtd = qtd-NEW.qtd WHERE id_produto = NEW.id_produto AND id_almoxarifado = (SELECT id_almoxarifado FROM saida WHERE id_saida = NEW.id_saida);
	
END $

DELIMITER ;


 int not null,
    id_responsavel int not null,
    
    data date,
    hora time,
    valor_total decimal(10,2),
    
    foreign key(id_destino) references destino(id_destino),
    foreign key(id_almoxarifado) references almoxarifado(id_almoxarifado),
    foreign key(id_tipo) references tipo_saida(id_tipo),
    foreign key(id_responsavel) references funcionario(id_funcionario)
)engine = InnoDB;

create table isaida(
    id_isaida int not null primary key auto_increment,
    id_saida int not null,
    id_produto int not null,
    qtd int,
    valor_unitario varchar(100),
    
    foreign key(id_saida) references saida(id_saida),
    foreign key(id_produto) references produto(id_produto)
)engine = InnoDB;


DELIMITER $
/* Criação da procedure que cadastra na tabela entrada e ientrada */
CREATE PROCEDURE cadentrada (in id_origem int, in id_almoxarifado int, in id_tipo int, in id_responsavel int, in data date, in hora time, in valor_total DECIMAL(10,2),
in id_entrada int, in id_produto int, in qtd int, in valor_unitario DECIMAL(10,2))
begin

declare idE int;

insert into entrada (id_origem, id_almoxarifado, id_tipo, id_responsavel, data, hora, valor_total)
	values(id_origem, id_almoxarifado, id_tipo, id_responsavel, data, hora, valor_total);

SELECT 
	MAX(id_entrada)
INTO idE FROM entrada;

insert into ientrada(id_entrada, id_produto, qtd, valor_unitario)
	values(idE, id_produto, qtd, valor_unitario);
end $

/* Criação da procedure que cadastra na tabela saida e isaida */
CREATE PROCEDURE cadsaida (in id_destino int, in id_almoxarifado int, in id_tipo int, in id_responsavel int, in data date, in hora time, in valor_total DECIMAL(10,2),
in id_saida int, in id_produto int, in qtd int, in valor_unitario DECIMAL(10,2))
begin

declare idS int;

insert into saida (id_destino, id_almoxarifado, id_tipo, id_responsavel, data, hora, valor_total)
	values(id_destino, id_almoxarifado, id_tipo, id_responsavel, data, hora, valor_total);

SELECT 
	MAX(id_saida)
INTO idS FROM saida;

insert into isaida(id_saida, id_produto, qtd, valor_unitario)
	values(idS, id_produto, qtd, valor_unitario);
end $

/* criação do gatilho que insere na tabela estoque depois de um insert na tabela ientrada */
CREATE TRIGGER tgr_ientrada_insert
AFTER INSERT ON ientrada
FOR EACH ROW
BEGIN

	INSERT IGNORE INTO estoque(id_produto, id_almoxarifado, qtd) values(NEW.id_produto, (SELECT id_almoxarifado FROM entrada WHERE id_entrada = NEW.id_entrada), 0);
	
    UPDATE estoque SET qtd = qtd+NEW.qtd WHERE id_produto = NEW.id_produto AND id_almoxarifado = (SELECT id_almoxarifado FROM entrada WHERE id_entrada = NEW.id_entrada);
	
END $

CREATE TRIGGER tgr_ientrada_delete
AFTER DELETE ON ientrada
FOR EACH ROW
BEGIN
	
    UPDATE estoque SET qtd = qtd - OLD.qtd WHERE id_produto = OLD.id_produto AND id_almoxarifado = (SELECT id_almoxarifado FROM entrada WHERE id_entrada = OLD.id_entrada);
	
END $

CREATE TRIGGER tgr_isaida_delete
AFTER DELETE ON isaida
FOR EACH ROW
BEGIN
	
    UPDATE estoque SET qtd = qtd+OLD.qtd WHERE id_produto = OLD.id_produto AND id_almoxarifado = (SELECT id_almoxarifado FROM saida WHERE id_saida = OLD.id_saida);
	
END $

CREATE TRIGGER tgr_isaida_insert
AFTER INSERT ON isaida
FOR EACH ROW
BEGIN
	
    UPDATE estoque SET qtd = qtd-NEW.qtd WHERE id_produto = NEW.id_produto AND id_almoxarifado = (SELECT id_almoxarifado FROM saida WHERE id_saida = NEW.id_saida);
	
END $

DELIMITER ;
    
SELECT * FROM estoque;