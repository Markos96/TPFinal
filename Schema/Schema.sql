CREATE DATABASE b74wzacb9gt37kied2us;

USE b74wzacb9gt37kied2us;

create table student(
    
    idStudent int not null auto_increment primary key,
    idCareer int not null,
    firstName varchar(30),
    lastName varchar(30),
    dni varchar(10),
    fileNumber varchar (15),
    gender char(1),
    birthDate date,
    email varchar(30),
    phoneNumber varchar(20),
    active boolean,
    idUser int not null,
    FOREIGN KEY (idCareer) REFERENCES career(idCareer),
    FOREIGN KEY (idUser) REFERENCES User(idUser)
);

create table admin (
    
    idAdmin int not null auto_increment primary key,
    nombre varchar(30),
    apellido varchar(30),
    dni varchar(8),
    gender char(1),
    birthdate date,
    phonenumber varchar(20),
    description varchar(100),
    cargo varchar(30),
    idUser int not null,
    foreign key(idUser) references User(idUser)

);

create table jobOffer(

    idJobOffer int not null auto_increment primary key,
    id_enterprise int not null, 
    id_student int not null,
    idJobPosition int not null,
    estado tinyint(1),
    FOREIGN KEY (id_enterprise) REFERENCES enterprises(id),
    FOREIGN KEY (id_student) REFERENCES student(idStudent),
    FOREIGN KEY (idJobPosition) REFERENCES jobPosition(idJobPosition)
    
    describe jobOffer;
);

create table career(

    idCareer unt not null auto_increment primary key,
    name varchar(30),
    active tinyint(1)

);

create table enterprises(

    id int not null auto_increment primary key,
    name varchar(100),
    description text,
    isActive tinyint(1)

);

create table jobPosition(

    idJobPosition int not null auto_increment primary key,
    idCareer int not null,
    description varchar(50),
    FOREIGN KEY (idCareer) REFERENCES career(idCareer)

);




