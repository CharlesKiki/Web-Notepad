CREATE TABLE `mark` (
`id`  int NOT NULL ,
`userid`  int NULL ,
`markName`  text NOT NULL ,
`isStart`  tinyint(255) NOT NULL ,
`createTime`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`updateTime`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`isdeleta`  tinyint(255) NULL DEFAULT 0 
)
;
CREATE TABLE `user` (
`id`  int NOT NULL AUTO_INCREMENT  ,
`username`  text DEFAULT NULL ,
`password`  text NOT NULL ,
`email`  text NOT NULL ,
`createTime`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY (`id`)
)
;
CREATE TABLE `comment` (
`id`  int NOT NULL AUTO_INCREMENT ,
`userid`  int NOT NULL ,
`noteid`  int NOT NULL ,
`content`  text NOT NULL ,
`filename`  text DEFAULT NULL ,
`ext`  text DEFAULT NULL ,
`type`  text DEFAULT NULL ,
`filepath`  text ,
`createTIme`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY (`id`)
)
;
CREATE TABLE `notebook` (
`id`  int NOT NULL AUTO_INCREMENT ,
`userid`  int NOT NULL ,
`bookName`  text NOT NULL ,
`isShare`  tinyint(255) DEFAULT 0 ,
`isDelete`  tinyint(255) DEFAULT 0 ,
`createTime`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`updateTime`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`isStart`  tinyint(255) NOT NULL DEFAULT 0,
`noteNumber`  int NOT NULL DEFAULT 0 ,
`sharepeople`  text NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
;
CREATE TABLE `note` (
`id`  int NOT NULL AUTO_INCREMENT ,
`userid`  int NOT NULL ,
`content`  text NOT NULL ,
`createTIme`  timestamp  ,
`updateTime`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`markID`  text DEFAULT NULL ,
`notebookID`  int DEFAULT NULL ,
`remindTIme`  timestamp ,
`isStart`  tinyint(255) ZEROFILL  NOT NULL ,
`isShare`  tinyint(255) DEFAULT 0 ,
`isdelete`  tinyint(255) DEFAULT 0 ,
`sharedpeople`  text DEFAULT NULL ,
`notename`  text CHARACTER SET utf8 NOT NULL ,
PRIMARY KEY (`id`)
)
;

alter table mark add constraint FK_1 foreign key(userid) REFERENCES user(id);
alter table comment add constraint FK_2 foreign key(userid) REFERENCES user(id);
alter table notebook add constraint FK_3 foreign key(userid) REFERENCES user(id);
alter table note add constraint FK_4 foreign key(userid) REFERENCES user(id);
alter table note add constraint FK_5 foreign key(notebookID) REFERENCES notebook(id);
alter table comment add constraint FK_6 foreign key(noteID) REFERENCES note(id);
