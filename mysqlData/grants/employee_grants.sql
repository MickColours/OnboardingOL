
-- Grants dumped by pt-show-grants
-- Dumped from server Localhost via UNIX socket, MySQL 8.0.18 at 2019-12-21 19:31:13
-- Grants for 'employee'@'localhost'
CREATE USER IF NOT EXISTS 'employee'@'localhost';
ALTER USER 'employee'@'localhost' IDENTIFIED WITH 'mysql_native_password' AS '*64A853CBEEF2F55F502DC7CAF2D34072AAD07E90' REQUIRE NONE PASSWORD EXPIRE DEFAULT ACCOUNT UNLOCK PASSWORD HISTORY DEFAULT PASSWORD REUSE INTERVAL DEFAULT PASSWORD REQUIRE CURRENT DEFAULT;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`add_performance` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`add_quiz_subject` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`add_quiz` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`add_quizquestion` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`add_textanswer` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`delete_quiz` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`delete_textanswers` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`delete_textquestion_answers` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`delete_textquestion` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`descriptive_stats_quiz` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`edit_authentication_string` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`edit_question_detail` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`edit_quiz_detail` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`get_correct_textanswers` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`get_possible_textanswers` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`get_quiz_detail` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`get_quiz_questions` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`get_top_quizzes` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`get_top_subjects` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`get_top_user_performances` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`get_total_attempts` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`get_total_time_spent` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`grade_fixed_textquestion` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`grade_unfixed_textquestion` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`list_all_quizzes` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`list_quiz_subjects` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`list_subjects` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`list_user_quizzes` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`list_visible_quizzes` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`remove_quiz_subject` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`toggle_quiz_visibility` TO `employee`@`localhost`;
GRANT EXECUTE ON PROCEDURE `Asrcoo`.`toggle_user_privilege` TO `employee`@`localhost`;
GRANT SELECT ON `Asrcoo`.`quiz` TO `employee`@`localhost`;
GRANT SELECT ON `Asrcoo`.`user` TO `employee`@`localhost`;
GRANT USAGE ON *.* TO `employee`@`localhost`;
