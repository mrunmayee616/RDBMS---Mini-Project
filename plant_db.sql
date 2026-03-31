--creating tables
create table users(
	username varchar(50) primary key,
	passwrd varchar(50) unique,
	fname varchar(100),
	mname varchar(100),
	lname varchar(100) default null,
	address_ text,
	pfp_link text
)
create table contacts(
	username varchar(50),
	contact varchar(50),
	foreign key (username) references users(username)
);

--display tables
select * from users;

--drop tables
drop table contacts;
drop table users;

--truncate
truncate table users;

--delete
delete from users where username='ram123';
delete from contacts where username='ram123';

--update
update table users
set pfp_link = 'alter/lotus.jpeg'