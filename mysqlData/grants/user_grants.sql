
-- Grants dumped by pt-show-grants
-- Dumped from server Localhost via UNIX socket, MySQL 8.0.18 at 2019-12-21 19:31:50
-- Grants for 'user'@'localhost'
CREATE USER IF NOT EXISTS 'user'@'localhost';
ALTER USER 'user'@'localhost' IDENTIFIED WITH 'mysql_native_password' AS '*7E81429651EB308B3769B13241D4B4CFE82024F7' REQUIRE NONE PASSWORD EXPIRE DEFAULT ACCOUNT UNLOCK PASSWORD HISTORY DEFAULT PASSWORD REUSE INTERVAL DEFAULT PASSWORD REQUIRE CURRENT DEFAULT;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`get_authentication_string` TO `user`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`get_user_id` TO `user`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`get_user_privilege` TO `user`@`localhost`;
GRANT SELECT ON `Asrcoo`.`user` TO `user`@`localhost`;
GRANT USAGE ON *.* TO `user`@`localhost`;
