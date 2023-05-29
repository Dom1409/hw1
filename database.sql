use sitohw1;

create table user(
    id integer primary key auto_increment,
	nome varchar(30) not null,
	cognome varchar(30) not null,
    username varchar(30) not null,
    password varchar(30) not null
)Engine = InnoDB;




create table lista_desideri(
	id_user integer not null,
    content json,
    foreign key (id_user) references user(id) on update cascade
)Engine = InnoDB;


