-- CREATE DATABASE board
-- CHARACTER SET = 'utf8'
-- COLLATE = 'utf8_general_ci';

-- USE board;

-- CREATE TABLE board_info(
-- board_no INT PRIMARY KEY boardboard_infoAUTO_INCREMENT
-- , board_title VARCHAR(100) NOT NULL
-- , board_contents VARCHAR(1000) NOT NULL
-- , write_date DATETIME NOT NULL
-- , del_flg CHAR(1) DEFAULT '0' NOT null
-- , del_date DATETIME);

-- DESC board_info;

-- INSERT INTO board_info(board_title , board_contents , write_date)
-- VALUES ("제목1","내용1",NOW());

-- COMMIT;