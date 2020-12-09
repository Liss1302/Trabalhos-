drop database if exists vendasArnaldo;
create database vendasArnaldo;
use vendasArnaldo;

create table produtos(
    id_Produto integer not null auto_increment,
    nome varchar(50) not null,
    fabricante varchar(40) not null,
    primary key (id_Produto)
);

create table compras(
    number_compra integer not null auto_increment,
    localComprado varchar(40) not null,
    dataCompra varchar(10) not null,
    primary key (number_compra)
);

create table vendas(
    number_venda integer not null auto_increment,
    nomeComprador varchar(50) not null,
    dataVenda varchar(10) not null,
    primary key (number_venda)
);

create table comprado(
    id_Produto integer not null,
    number_compra integer not null,
    quantidadeComprada int not null,
    valorComprado decimal(10,2) not null,
    constraint fk_prodComp foreign key (id_Produto)
    references produtos(id_Produto)
    on delete cascade,
    constraint fk_compProd foreign key (number_compra)
    references compras(number_compra)
    on delete cascade,
    primary key (id_Produto,number_compra)
);


create table vendido(
    id_Produto integer not null,
    number_venda integer not null,
    quantidadeVendida int not null,
    valorVendido decimal(10,2) not null,
    constraint fk_prodVenda foreign key (id_Produto)
    references produtos(id_Produto)
    on delete cascade,
    constraint fk_VendaProd foreign key (number_venda)
    references vendas(number_venda)
    on delete cascade,
    primary key (id_Produto,number_venda)
);


create view vw_compra as

select c.number_compra, c.localComprado,c.dataCompra,p.id_Produto, p.quantidadeComprada, p.valorComprado
from compras c left join comprado p
on c.number_compra = p.id_Produto;

create view vw_venda as

select v.number_venda, v.nomeComprador, v.dataVenda, d.id_Produto, d.quantidadeVendida, d.valorVendido
from vendas v left join vendido d
on v.number_venda = d.id_Produto;

show tables;

insert into produtos values
(1,"tenis","nike"),
(2,"oculos","oaklay");
select * from produtos;

insert into compras values
(1,"vinte e cinco de março","20/11/2020"),
(2,"shoping","20/11/2020");
select * from compras;


insert into vendas values
(1,"Fernando Pessoa","30/12/2020"),
(2,"Aparecida Garcia","30/12/2020");
select * from vendas;


insert into comprado values
(1,2,20,10.10),
(2,1,25,15.5);
select * from comprado;

insert into vendido values
(1,1,10,100),
(2,2,50,200);

select * from produtos;
select * from compras;
select * from vendas;
select * from comprado;
select * from vendido;
select * from vw_compra;
select * from vw_venda;

show tables;
