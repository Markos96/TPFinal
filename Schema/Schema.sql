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