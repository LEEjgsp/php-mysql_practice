create table _youtube (
    num int not null auto_increment,
    id char(20) not null,
    name char(20) not null,
    subject char(200) not null,
    content text not null,
    url char(225),
    regist_day char(20),
    file_name char(225),
    file_type char(225),
    file_copied char(225),
    primary key(num)
);