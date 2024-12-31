create database careerlink ;

create table `role` (
id int primary key auto_increment,
namerole  varchar(50) CHECK (namerole IN ('admin', 'recruiter', 'candidate'))
);

create table `user` (
   id int primary key auto_increment,
   username varchar(50) unique,
   email varchar(50),
   `password` varchar(50),
   id_role int ,
   FOREIGN KEY (id_role) REFERENCES role(id) on delete cascade on update cascade
);

create table `category` (
id int primary key auto_increment,
namecategory varchar(50)
);

create table `tag` (
id int primary key auto_increment,
nametag varchar(50)
);

create table `joboffer` (
id int primary key auto_increment,
`name` varchar(50),
 company_name varchar(50) unique,
`description` text ,
salary DECIMAL(10, 2),
location varchar(50),
website varchar(50),
id_category int ,
id_tag int ,
FOREIGN KEY (id_category) REFERENCES `category`(id) on delete cascade on update cascade,
FOREIGN KEY (id_tag) REFERENCES `tag`(id) on delete cascade on update cascade
);

ALTER TABLE `joboffer`
ADD archiveJob date;

ALTER TABLE `joboffer`
ADD id_user int;

ALTER TABLE `joboffer`
ADD foreign key (id_user) references `user`(id) on delete cascade on update cascade;

ALTER TABLE `joboffer`
ADD photo text;








