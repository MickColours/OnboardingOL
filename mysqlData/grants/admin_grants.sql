
-- Grants dumped by pt-show-grants
-- Dumped from server Localhost via UNIX socket, MySQL 8.0.18 at 2019-12-21 19:32:15
-- Grants for 'admin'@'localhost'
CREATE USER IF NOT EXISTS 'admin'@'localhost';
ALTER USER 'admin'@'localhost' IDENTIFIED WITH 'mysql_native_password' AS '*516F3988FEC471278B6E8A0B775116BE085CDDE9' REQUIRE NONE PASSWORD EXPIRE DEFAULT ACCOUNT UNLOCK PASSWORD HISTORY DEFAULT PASSWORD REUSE INTERVAL DEFAULT PASSWORD REQUIRE CURRENT DEFAULT;
GRANT DELETE, INSERT, SELECT ON `Asrcoo`.`user` TO `admin`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`add_subject` TO `admin`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`add_user` TO `admin`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`delete_subject` TO `admin`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`delete_user` TO `admin`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`descriptive_stats_quiz` TO `admin`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`descriptive_stats_subject` TO `admin`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`descriptive_stats_user` TO `admin`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`list_subjects` TO `admin`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`toggle_user_privilege` TO `admin`@`localhost`;
GRANT USAGE ON *.* TO `admin`@`localhost`;
