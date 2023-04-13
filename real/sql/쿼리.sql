-- CREATE TABLE real_info(
-- 	real_no INT NOT NULL AUTO_INCREMENT PRIMARY KEY 
-- 	, real_title VARCHAR(100) NOT NULL 
-- 	, real_contents VARCHAR(1000) NOT NULL 
-- 	, write_date DATE NOT NULL 
-- 	, del_flg CHAR(1) NOT NULL DEFAULT '0' 
-- 	, del_date DATE
-- 	);

INSERT INTO real_info ( real_no, real_title, real_contents, write_date, del_flg, del_date)
VALUES ("제목1", "내용1", NOW(), '0'),("제목2", "내용2", NOW(), '0');