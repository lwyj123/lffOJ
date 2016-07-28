DROP TABLE Users;
DROP TABLE Trainings;
DROP TABLE Submission;
create table Users (
    Id int(10) primary key not null AUTO_INCREMENT,
    Email varchar(20),
    IsAdmin int(1),
    Password varchar(20),
    Nickname varchar(20),
    RegisterDate datetime
);
create table Trainings (
	Id int(10) primary key not null AUTO_INCREMENT,
	Title varchar(20),
	Description varchar(200)
);
create table Submission (
	Id int(10) primary key not null AUTO_INCREMENT,
	UserId varchar(20),
	TrainingId int(10),
	Status varchar(10),
	ExcuteTime int(6),
	MemoryUsed int(10), 
	FOREIGN KEY(UserId)REFERENCES Users(Id),
	FOREIGN KEY(TrainingId)REFERENCES Trainings(Id)
)