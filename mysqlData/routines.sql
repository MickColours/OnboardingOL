-- MySQL dump 10.13  Distrib 8.0.18, for Linux (x86_64)
--
-- Host: localhost    Database: Asrcoo
-- ------------------------------------------------------
-- Server version	8.0.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `performance`
--

DROP TABLE IF EXISTS `performance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `performance` (
  `performance_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` decimal(3,2) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_taken` date DEFAULT NULL,
  `duration_in_minutes` int(11) DEFAULT NULL,
  PRIMARY KEY (`performance_id`),
  UNIQUE KEY `performance_id_UNIQUE` (`performance_id`),
  KEY `fk_performance_user_idx` (`user_id`),
  KEY `fk_performance_quiz_idx` (`quiz_id`),
  CONSTRAINT `fk_performance_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_performance_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `performance`
--

LOCK TABLES `performance` WRITE;
/*!40000 ALTER TABLE `performance` DISABLE KEYS */;
INSERT INTO `performance` VALUES (1,1.00,1,1,NULL,7),(2,0.75,1,1,NULL,3),(6,1.00,1,1,NULL,9),(7,0.20,1,1,'2019-11-12',9),(9,0.22,1,1,'2019-11-12',30),(10,0.32,1,1,'2019-11-12',15),(12,0.33,1,23,'2019-11-12',22),(23,0.00,1,1,'2019-11-12',12),(24,0.00,1,23,'2019-11-13',12),(28,0.00,1,23,'2019-11-13',12),(29,0.20,1,23,'2019-11-13',12),(30,0.00,1,23,'2019-11-13',12),(31,0.20,1,23,'2019-11-13',12),(32,0.00,1,23,'2019-11-13',12),(33,0.00,1,23,'2019-11-13',12),(34,0.00,1,23,'2019-11-13',12),(35,0.00,1,23,'2019-11-13',12),(36,0.00,1,23,'2019-11-13',12),(38,0.00,1,23,'2019-11-13',12),(39,0.00,1,23,'2019-11-13',12),(41,0.00,1,23,'2019-11-13',12),(46,0.20,1,1,'2019-11-13',12),(49,0.40,1,23,'2019-11-13',12),(50,0.00,1,1,'2019-11-14',12),(51,0.00,1,1,'2019-11-15',12),(52,0.80,1,1,'2019-11-15',12),(54,0.80,1,54,'2019-11-15',12),(58,1.00,1,54,'2019-11-15',12),(59,0.20,1,54,'2019-11-18',12),(60,0.80,1,54,'2019-11-18',12),(61,0.80,1,54,'2019-11-18',12),(62,1.00,1,54,'2019-11-18',12),(76,0.40,1,23,'2019-11-20',12),(77,0.60,1,23,'2019-11-20',12),(78,0.60,1,23,'2019-11-20',12),(84,0.40,1,1,'2019-11-21',12),(85,0.60,1,23,'2019-11-21',12),(86,0.60,1,1,'2019-11-21',12),(87,0.00,1,54,'2019-11-21',12),(93,1.00,1,1,'2019-11-25',12),(95,0.00,44,1,'2019-11-26',12),(96,1.00,44,1,'2019-11-26',12),(97,0.00,44,1,'2019-11-26',12),(98,0.50,44,1,'2019-11-26',12),(99,1.00,44,1,'2019-11-26',12),(100,0.60,44,1,'2019-11-26',12),(102,1.00,1,1,'2019-11-26',12),(103,0.17,44,1,'2019-11-26',12),(104,0.00,44,1,'2019-11-26',12),(106,0.00,1,1,'2019-11-26',12),(107,1.00,1,1,'2019-11-26',12),(108,1.00,1,1,'2019-11-26',12),(109,0.00,1,1,'2019-11-26',12),(110,0.00,44,1,'2019-11-26',12),(111,0.00,1,1,'2019-11-26',12),(112,1.00,1,1,'2019-11-26',12),(113,1.00,1,1,'2019-11-26',12),(114,0.29,44,23,'2019-11-27',12),(123,1.00,1,23,'2019-11-27',12),(128,0.33,44,23,'2019-11-27',12),(130,0.50,1,1,'2019-12-03',12),(132,0.50,1,1,'2019-12-04',12),(133,0.00,1,1,'2019-12-05',12),(134,0.50,1,1,'2019-12-05',12),(135,1.00,1,1,'2019-12-05',12),(136,0.40,44,23,'2019-12-06',12),(137,0.50,1,1,'2019-12-08',12),(138,0.50,1,1,'2019-12-08',12),(139,0.50,1,1,'2019-12-08',12),(140,0.50,1,1,'2019-12-08',12),(141,1.00,1,23,'2019-12-08',5),(142,0.50,1,23,'2019-12-08',4),(143,0.00,1,23,'2019-12-08',0),(144,0.80,44,23,'2019-12-08',5),(145,0.00,1,23,'2019-12-08',1),(146,0.50,1,23,'2019-12-08',8),(147,0.50,1,23,'2019-12-08',5),(148,0.00,1,23,'2019-12-08',0),(149,0.50,1,23,'2019-12-08',0),(150,0.50,1,1,'2019-12-09',1),(151,0.40,44,1,'2019-12-09',1),(152,0.50,1,23,'2019-12-09',0),(153,0.20,44,1,'2019-12-09',1),(154,0.50,1,1,'2019-12-09',1),(156,0.00,44,1,'2019-12-09',1),(162,0.00,1,1,'2019-12-09',0),(163,0.00,44,23,'2019-12-10',0),(164,0.00,1,23,'2019-12-10',0),(166,0.00,44,23,'2019-12-10',1),(167,0.67,134,23,'2019-12-10',1),(168,0.50,1,1,'2019-12-11',0),(169,0.50,1,23,'2019-12-11',1),(170,0.50,1,1,'2019-12-11',1),(171,0.50,1,1,'2019-12-11',1),(172,0.50,1,23,'2019-12-19',0);
/*!40000 ALTER TABLE `performance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `DTYPE` enum('question','textMC','textSATA','textFR') NOT NULL,
  `point_value` int(11) NOT NULL,
  `question_text` varchar(540) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`question_id`),
  UNIQUE KEY `question_id_UNIQUE` (`question_id`),
  KEY `fk_question_quiz_idx` (`quiz_id`),
  CONSTRAINT `fk_question_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (73,'textMC',10,'What is the antiderivative of f(x) = (2x)^2 ?',1,0),(74,'textMC',5,'why didnt the chicken cross the road?',44,0),(79,'textMC',10,' If A = [1 ,3] B = [5,6] C=[3,4] . Does the matrix [A B C] form a basis for \r\nR^3 ?',1,1),(85,'textSATA',15,'why am I not having fun?',44,2),(87,'textFR',5,'what is a cool animal that starts with an f and ends with a g?',44,3),(113,'textMC',10,'Question 1',65,0),(114,'textSATA',10,'question 2',65,1),(115,'textFR',10,'fjklasdfjkl',65,2),(117,'textMC',4,'cvxb cvzcbvx',67,0),(120,'textSATA',5,'fdsfsdf',67,1),(151,'textMC',0,'yh',44,3),(220,'textSATA',5,'Which of the following are mammals?',134,0),(221,'textMC',5,'The answer is 3',134,1),(222,'textFR',5,'The answer is pineapple',134,2),(223,'textMC',5,'What is 2 + 2?',134,3),(224,'textFR',5,'The answer is banana',134,4),(225,'textSATA',5,'Which of the following are the color blue?',134,5),(231,'textMC',5,'This is a multiple choice question.',145,0),(232,'textSATA',5,'Select all that apply:',145,1),(233,'textFR',5,'Where is this presentation?',145,2),(234,'textMC',10,'Are dogs cute?',146,0),(235,'textSATA',20,'Whichof these are dog breeds?',146,1);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questionTextAnswer`
--

DROP TABLE IF EXISTS `questionTextAnswer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questionTextAnswer` (
  `questionTextAnswer_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `textAnswer_id` int(11) NOT NULL,
  PRIMARY KEY (`questionTextAnswer_id`),
  UNIQUE KEY `textQuestionAnswer_id_UNIQUE` (`questionTextAnswer_id`),
  KEY `fk_questionTextAnswer_question_idx` (`question_id`),
  KEY `fk_questionTextAnswer_textAnswer_idx` (`textAnswer_id`),
  CONSTRAINT `fk_questionTextAnswer_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_questionTextAnswer_textAnswer` FOREIGN KEY (`textAnswer_id`) REFERENCES `textAnswer` (`textAnswer_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1022 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionTextAnswer`
--

LOCK TABLES `questionTextAnswer` WRITE;
/*!40000 ALTER TABLE `questionTextAnswer` DISABLE KEYS */;
INSERT INTO `questionTextAnswer` VALUES (133,79,187),(134,79,188),(641,87,726),(642,85,727),(643,85,728),(644,85,729),(653,113,738),(654,113,739),(655,113,740),(656,113,741),(657,113,742),(658,114,743),(659,114,744),(660,114,745),(661,114,746),(662,115,747),(678,117,773),(679,117,774),(680,117,775),(686,74,781),(687,74,782),(688,74,783),(689,74,784),(690,120,785),(691,120,786),(793,151,892),(794,151,893),(795,151,894),(796,73,895),(797,73,896),(798,73,897),(799,73,898),(976,220,1075),(977,220,1076),(978,220,1077),(979,220,1078),(980,221,1079),(981,221,1080),(982,221,1081),(983,221,1082),(984,222,1083),(985,223,1084),(986,223,1085),(987,223,1086),(988,223,1087),(989,224,1088),(990,225,1089),(991,225,1090),(992,225,1091),(993,225,1092),(994,225,1093),(1010,231,1110),(1011,231,1111),(1013,232,1113),(1014,232,1114),(1015,232,1115),(1016,233,1116),(1017,234,1117),(1018,234,1118),(1019,235,1119),(1020,235,1120),(1021,235,1121);
/*!40000 ALTER TABLE `questionTextAnswer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `time_limit` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `description` varchar(360) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` date DEFAULT NULL,
  PRIMARY KEY (`quiz_id`),
  UNIQUE KEY `quiz_id_UNIQUE` (`quiz_id`),
  KEY `fk_quiz_user_idx` (`author_id`),
  CONSTRAINT `fk_quiz_user` FOREIGN KEY (`author_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (1,1,10,'Math Quiz','Quadratic equations, Integrals, and Set Theory',1,'2019-11-08'),(44,1,30,'frogs','frogs are cool',1,'2019-11-24'),(65,23,10,'November 27th','I\'m giving a sprint review',0,'2019-11-27'),(67,23,10,'quiz','dkjnfkjns',0,'2019-11-28'),(75,23,10,'Manual','',1,'2019-12-09'),(134,23,30,'Upload Quiz Example 3','This quiz was uploaded.',0,'2019-12-10'),(145,23,30,'PresentationQuiz','For the presentation',1,'2019-12-11'),(146,1,30,'Dogs','This is gonna be about dogs and other animals',0,'2019-12-11');
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quizSubject`
--

DROP TABLE IF EXISTS `quizSubject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quizSubject` (
  `quizSubject_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`quizSubject_id`),
  UNIQUE KEY `quizSubject_id_UNIQUE` (`quizSubject_id`),
  KEY `fk_quizSubject_subject_idx` (`subject_id`),
  KEY `fk_quizSubject_quiz_idx` (`quiz_id`),
  CONSTRAINT `fk_quizSubject_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_quizSubject_subject` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizSubject`
--

LOCK TABLES `quizSubject` WRITE;
/*!40000 ALTER TABLE `quizSubject` DISABLE KEYS */;
INSERT INTO `quizSubject` VALUES (6,1,6),(7,1,7),(17,1,8),(19,44,4),(22,1,5),(27,146,22);
/*!40000 ALTER TABLE `quizSubject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`subject_id`),
  UNIQUE KEY `subject_id_UNIQUE` (`subject_id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (22,'animals'),(8,'derivatives'),(5,'mathematics'),(1,'planes'),(7,'quadratic equations'),(4,'security'),(6,'set theory');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `textAnswer`
--

DROP TABLE IF EXISTS `textAnswer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `textAnswer` (
  `textAnswer_id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_text` varchar(270) NOT NULL,
  `validity` tinyint(1) NOT NULL,
  PRIMARY KEY (`textAnswer_id`),
  UNIQUE KEY `textAnswer_id_UNIQUE` (`textAnswer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `textAnswer`
--

LOCK TABLES `textAnswer` WRITE;
/*!40000 ALTER TABLE `textAnswer` DISABLE KEYS */;
INSERT INTO `textAnswer` VALUES (168,'no',1),(187,'yes',0),(188,'no',1),(364,'Object Oriented Programming',0),(365,'Data Structures and Algorithms',0),(366,'Software Engineering',1),(367,'English Composition',0),(376,'Agile Methodology',1),(377,'Scrum',1),(378,'Thermodynamics',0),(379,'Integration Techniques',0),(381,'favorite',1),(412,'12',1),(413,'Steven Mark Douglass',1),(414,'123',1),(415,'a',0),(416,'b',1),(417,'c',0),(418,'a',0),(419,'b',0),(420,'c',0),(421,'d',0),(422,'1',0),(423,'2',1),(424,'3',1),(425,'4',0),(710,'1',0),(711,'11/27',1),(712,'2',0),(713,'3',0),(714,'true',1),(715,'true',1),(716,'true',1),(717,'false',0),(726,'frog',1),(727,'php is stupid',1),(728,'web dev is frustrating',1),(729,'I still have my socks on',0),(738,'1',0),(739,'2',0),(740,'3',0),(741,'True',1),(742,'5',0),(743,'true',1),(744,'true',1),(745,'false',0),(746,'false',0),(747,'answer',1),(748,'1',0),(749,'2',0),(750,'3',0),(751,'True',1),(752,'5',0),(759,'true',1),(760,'true',1),(761,'false',0),(762,'false',0),(763,'answer',1),(773,'g',1),(774,'g',0),(775,'g',0),(781,'he has a phobia of crossing roads',0),(782,'a road murdered his dad',1),(783,'tuesday',0),(784,'idk',0),(785,'fff',1),(786,'fff',1),(788,'3',1),(789,'A',1),(790,'B',0),(791,'C',0),(792,'D',0),(807,'jared',0),(808,'human',0),(809,'frog',1),(810,'poop',0),(811,'slender man',0),(812,'gumby',1),(813,'a nazi',0),(814,'Chary',0),(815,'yes',1),(816,'blue',0),(817,'yellow',0),(818,'im satan',1),(819,'fuck off i need to poop',0),(820,'chris',1),(821,'melissa and meagan',1),(822,'melissa and megan',0),(823,'melissa and meghan',0),(824,'i don\'t have a family',0),(825,'I DON\'T HAVE ONE LOL',1),(826,'2',0),(827,'1',0),(828,'3',1),(829,'4',0),(830,'yellow or red',1),(831,'I have the power of god and anime on my side',0),(832,'gimme your fucking MONEY',1),(833,'uhh roadwork ahead..yeah i sure hope it does',0),(834,'FUCK YA CHICKEN STRIPS',0),(835,'ottis',1),(836,'lobo',1),(837,'cabo',0),(841,'yes',0),(842,'no',0),(843,'sexuality is a spectrum that I do not define myself on',1),(844,'cop',0),(845,'foster mom',1),(846,'foster dog mom',1),(847,'forensic scientist',0),(848,'pharma chemist',0),(849,'murderer',0),(850,'a millón',1),(851,'1',0),(852,'about 4??',0),(853,'79',0),(854,'13',0),(855,'12',1),(856,'21',0),(857,'age is a construct',0),(858,'6',1),(859,'43',0),(860,'3',0),(861,'4',0),(862,'Red. Always red.',1),(868,'ashley',0),(869,'erin',0),(870,'life',1),(871,'michelle',1),(872,'matt',0),(873,'spiders',0),(874,'heights',0),(875,'minorities',1),(876,'being burned alive',1),(877,'gumby',1),(878,'military',1),(879,'not you',1),(880,'ciabatta',0),(881,'potato',1),(882,'whole wheat',0),(883,'pumpernickel ',0),(888,'<10',0),(889,'10<x<20',1),(890,'20+',0),(891,'21',1),(892,'this is right',1),(893,'no',0),(894,'no',0),(895,'1/6 * (2x)^(3) + c',1),(896,'(2x)^3 + c',0),(897,'4x + c',0),(898,'1/3 * (2x)^3',0),(901,'1',1),(902,'',1),(1075,'Pigs',1),(1076,'Ants',0),(1077,'Bears',1),(1078,'Birds',0),(1079,'1',0),(1080,'2',0),(1081,'3',1),(1082,'4',0),(1083,'pineapple',1),(1084,'2',0),(1085,'3',0),(1086,'4',1),(1087,'22',0),(1088,'banana',1),(1089,'The sky',1),(1090,'Grass',0),(1091,'The Ocean',1),(1092,'A blue crayon',1),(1093,' A white car',0),(1097,'Question Answer',0),(1110,'True',1),(1111,'False',0),(1113,'Yes',1),(1114,'No',0),(1115,'Yes',1),(1116,'asrc',1),(1117,'True',1),(1118,'False',0),(1119,'Beagle',1),(1120,'Golden Retriever',1),(1121,'Emperor Penguin',0);
/*!40000 ALTER TABLE `textAnswer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `top_quiz_performances_view`
--

DROP TABLE IF EXISTS `top_quiz_performances_view`;
/*!50001 DROP VIEW IF EXISTS `top_quiz_performances_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `top_quiz_performances_view` AS SELECT 
 1 AS `user_id`,
 1 AS `quiz_id`,
 1 AS `max_grade`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `authentication_string` varchar(256) NOT NULL,
  `privilege` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  UNIQUE KEY `user_name_UNIQUE` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'dev','$2y$10$z/Qaaq4knt8I4FVkaYA1z.ZxfWXVWXmZbAc1d2FWzHLA2hSl6HwUW',2),(23,'admin','$2y$10$GVnbkBi9B1VL8fBLh0EHLeNCQgYshD2ehyjGLpnbMrg5BxTiJruvG',2),(54,'rocks','$2y$10$gg.jjxB4AW.9VIAFqaXQQ.y0D95rxZPgUZJkV2VS.x7eRCMDvPzce',1),(67,'frog','$2y$10$wqaz0l.ZCVsMzZo4Zsob0ed8cpxucRYO6KotlZ6TU5plUnJaAt2Mm',1),(69,'emoji🤣','$2y$10$uZk1/UNx16nkFciLauFlyeFGyK0v8AnKbzDxBqHyOGGtRWHwJBHc.',1),(73,'banana','$2y$10$8jVDt0gAj6K.Xg4OVujLHu0r/KHbZct27AhBw4hxRTiCT1tYAamvO',2),(82,'dev2','fromemployee',2),(84,'test','$2y$10$ZhOgoLkwlrV7TCLJ37xjtuZIRYIowmzzrTqcbFo0s792Wqyart9TK',2),(85,'Manual','$2y$10$GkAkOi985.8gsURYPEypJuet/M2KtRyDRzN0tN8e0ho55edCRQ5hS',1),(88,'dev3','$2y$10$nSBdqDUksoq16aXsHECx6eMpyNlhRQ4y3Lc64PQ0swcp00zjlm.k6',1),(91,'josh','$2y$10$QXOT69oeHPUHrdhfQBMRbOQ7QUGSfVLcYtPsWctm7vCLsdZV0GKx6',2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'Asrcoo'
--
/*!50003 DROP PROCEDURE IF EXISTS `add_performance` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_performance`(thisGrade Decimal(3,2), thisQuiz int, thisUser int, thisDuration int)
BEGIN
#add a user performance into the performance table with today's date
INSERT INTO `Asrcoo`.`performance` (`grade`, `quiz_id`,`user_id`,`date_taken`,`duration_in_minutes`)
VALUES (thisGrade, thisQuiz, thisUser,curdate(),thisDuration);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `add_quiz` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_quiz`(thisAuthor_id int, thisTime_limit int, thisName varchar(90), thisDescription varchar(360))
BEGIN
	#variable to hold the primary key returned from inserting quiz
	DECLARE thisQuiz_id int DEFAULT null;
	#insert quiz into quiz table with invisibility and stamp with current date
	INSERT INTO Asrcoo.quiz (`author_id`,`name`,`time_limit`,`description`,`visibility`,`date_created`) 
    VALUES (thisAuthor_id,thisName,thisTime_limit,thisDescription,0,curdate());
    
	#store the primary key generated for above quiz
	set thisQuiz_id =(SELECT LAST_INSERT_ID());
    #return the generated quiz id . 
    select thisQuiz_id as 'quiz_id';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `add_quizQuestion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_quizQuestion`(thisQuiz int,thisQuestionText varchar(540),
									thisPointValue int,
                                    thisType enum('question','textMC','textSATA','textFR'))
BEGIN
	#add the text question to the question table with its respective type
	#retrieve the number of questions existant in the db,
    #the order of the number of questions already in the quiz
    
	#variable to hold the primary key returned from inserting question
	DECLARE thisQuestion_id int DEFAULT null;
    
    #variable to hold the order of the new question
    DECLARE thisOrder int DEFAULT null;
    
    #retrieve the order of the new question
    set thisOrder = (select count(*) from Asrcoo.question as q
					where q.quiz_id = thisQuiz);

	#insert question into question table
	INSERT INTO Asrcoo.question (`DTYPE`,`point_value`,`question_text`,`quiz_id`,`order`) 
    VALUES (thisType,thisPointValue,thisQuestionText,thisQuiz,thisOrder);   
        
	#set the questionid
    set thisQuestion_id = (SELECT LAST_INSERT_ID());
    
	#return the generated question_id
    select thisQuestion_id;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `add_quiz_subject` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_quiz_subject`(thisQuizId int,thisSubjectId int)
BEGIN
	INSERT INTO `Asrcoo`.`quizSubject` (`quiz_id`, `subject_id`) VALUES (thisQuizId,thisSubjectId);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `add_subject` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_subject`(thisSubject varchar(45))
BEGIN
	INSERT INTO `Asrcoo`.`subject` (`name`) VALUES (thisSubject);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `add_textAnswer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_textAnswer`(thisQuestion int, thisAnswer varchar(270),thisValidity tinyint(2))
BEGIN
	#variable to hold the primary key returned from inserting textAnswer
	DECLARE thisAnswer_id int DEFAULT null;
	#insert textAnswer into textAnswer table
	INSERT INTO Asrcoo.textAnswer (`answer_text`,`validity`) VALUES (thisAnswer,thisValidity);
	#store the primary key generated for above textAnswre
	set thisAnswer_id =(SELECT LAST_INSERT_ID());
    #add previous textAnswer_id to questionTextAnswer with question_id
    INSERT INTO Asrcoo.questionTextAnswer (`question_id`,`textAnswer_id`) VALUES (thisQuestion,thisAnswer_id);
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `add_user` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_user`(thisEmail varchar(45), thisPassword varchar(256), thisPrivilege int)
BEGIN
	-- this procedure assumes the thisEmail and thisPassword have
    -- been verified by prior php script
	INSERT INTO `Asrcoo`.`user` (`user_name`, `authentication_string`,`privilege`)
    VALUES (thisEmail, thisPassword, thisPrivilege);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `delete_quiz` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_quiz`(thisQuiz int)
BEGIN
	-- deletes the quiz entry from the quiz tables
    -- and completetly removes all questions and answer associated with it
    -- dependant on delete_quizTextQuestion
    -- currently only supports the deletion of 
    -- quizzes containing questions with textual answers

    -- string to store list of question ids
	DECLARE _questionList text Default null;

	-- variables used to parse string of question id's
	DECLARE _next TEXT DEFAULT NULL;
	DECLARE _nextlen INT DEFAULT NULL;
	DECLARE _value TEXT DEFAULT NULL;
    
    -- retrieve all associated questions , store in string
    set _questionList =
		(select group_concat(q.question_id) as question_string
		from Asrcoo.question as q
		where q.quiz_id = thisQuiz
		order by q.question_id);
        
	-- loop through all questions ids deleting them
    -- from quiz_question and questionTextAnswer aswell
    iterator:
	LOOP
	-- exit the loop if the list seems empty or was null;
	-- this extra caution is necessary to avoid an endless loop in the proc.
	IF LENGTH(TRIM(_questionList)) = 0 OR _questionList IS NULL THEN
		LEAVE iterator;
	END IF;
	-- capture the next value from the list
	SET _next = SUBSTRING_INDEX(_questionList,',',1);
	-- save the length of the captured value; we will need to remove this
	-- many characters + 1 from the beginning of the string 
	-- before the next iteration
	SET _nextlen = LENGTH(_next);
	-- trim the value of leading and trailing spaces, in case of sloppy CSV strings
	SET _value = TRIM(_next);
  
	-- call delete_quiz_textQuestion procedure thus removing
    -- it from questionTextAnswer and quizQuestion
    
    -- in the future add logic to assess which type of question to remove
    -- the current scope the project only supports textQuestions 
    -- so this will do for now
    
    -- deletes the question entry and all associated answer
	call Asrcoo.delete_textQuestion(_value);

	-- rewrite the original string using the `INSERT()` string function,
	-- args are original string, start position, how many characters to remove, 
	-- and what to "insert" in their place (in this case, we "insert"
	-- an empty string, which removes _nextlen + 1 characters)
	SET _questionList = INSERT(_questionList,1,_nextlen + 1,'');
	END LOOP;
    
    -- delete the quiz from the quiz table
    DELETE FROM `Asrcoo`.`quiz` WHERE (`quiz_id` = thisQuiz);
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `delete_subject` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_subject`(thisSubjectId int)
BEGIN
DELETE FROM `Asrcoo`.`subject` WHERE (`subject_id` = thisSubjectId);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `delete_textAnswers` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_textAnswers`(_answerList varchar(1000))
BEGIN

#given a list of textAnswers ,iterate through and delete
#all of them

DECLARE _next TEXT DEFAULT NULL;
DECLARE _nextlen INT DEFAULT NULL;
DECLARE _value TEXT DEFAULT NULL;
iterator:
LOOP
  -- exit the loop if the list seems empty or was null;
  -- this extra caution is necessary to avoid an endless loop in the proc.
  IF LENGTH(TRIM(_answerList)) = 0 OR _answerList IS NULL THEN
    LEAVE iterator;
  END IF;
  -- capture the next value from the list
  SET _next = SUBSTRING_INDEX(_answerList,',',1);
  -- save the length of the captured value; we will need to remove this
  -- many characters + 1 from the beginning of the string 
  -- before the next iteration
  SET _nextlen = LENGTH(_next);
  -- trim the value of leading and trailing spaces, in case of sloppy CSV strings
  SET _value = TRIM(_next);
  
#INSERT INTO Asrcoo.fruits (`name`,`tasty`) VALUES (_va
DELETE FROM `Asrcoo`.`textAnswer` WHERE (`textAnswer_id` = _value);
    
  -- rewrite the original string using the `INSERT()` string function,
  -- args are original string, start position, how many characters to remove, 
  -- and what to "insert" in their place (in this case, we "insert"
  -- an empty string, which removes _nextlen + 1 characters)
  SET _answerList = INSERT(_answerList,1,_nextlen + 1,'');
END LOOP;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `delete_textQuestion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_textQuestion`(thisTextQuestion int)
BEGIN

-- delete a textQuestion's textAnswers
call Asrcoo.delete_textQuestion_answers(thisTextQuestion);
-- then delete the textQuestion itself
DELETE FROM `Asrcoo`.`question` WHERE (`question_id` = thisTextQuestion);
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `delete_textQuestion_answers` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_textQuestion_answers`(thisTextQuestion int)
BEGIN
DECLARE _answerList text Default null;

	-- retrieve all associated answers
	set _answerList = (select group_concat(ta.textAnswer_id)
		from Asrcoo.questionTextAnswer as qta
		join Asrcoo.textAnswer as ta
		on qta.textAnswer_id = ta.textAnswer_id
		where qta.question_id = thisTextQuestion
		order by ta.textAnswer_id);
    
    -- call procedure to delete all textAnswers in that list
    call Asrcoo.delete_textAnswers(_answerList);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `delete_user` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_user`(IN thisUserId Int)
BEGIN
	delete FROM Asrcoo.user 
	where user_id = thisUserId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `descriptive_stats_quiz` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `descriptive_stats_quiz`(thisQuizId int)
BEGIN
##descriptive statistics for a particular quiz
select min(p.grade) as min_grade, max(p.grade) as max_grade, 
avg(p.grade) as avg_grade, STD(p.grade) as std_grade,
min(p.duration_in_minutes) as min_duration, max(p.duration_in_minutes) as max_duration,
avg(p.duration_in_minutes) as avg_duration, STD(p.duration_in_minutes) as std_duration 
from Asrcoo.performance as p
where p.quiz_id =thisQuizId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `descriptive_stats_subject` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `descriptive_stats_subject`(thisSubjectId int)
BEGIN
#descriptive statistics for a particular subject
select min(p.grade) as min_grade, max(p.grade) as max_grade, 
avg(p.grade) as avg_grade, STD(p.grade) as std_grade,
min(p.duration_in_minutes) as min_duration, max(p.duration_in_minutes) as max_duration,
avg(p.duration_in_minutes) as avg_duration, STD(p.duration_in_minutes) as std_duration 
from Asrcoo.quizSubject as qs
join Asrcoo.performance as p
on p.quiz_id = qs.quiz_id
where qs.subject_id =thisSubjectId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `descriptive_stats_user` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `descriptive_stats_user`(thisUserId int)
BEGIN
#descriptive stats for a particular user across all performances
select min(p.grade) as min_grade, max(p.grade) as max_grade, 
avg(p.grade) as avg_grade, STD(p.grade) as std_grade,
min(p.duration_in_minutes) as min_duration, max(p.duration_in_minutes) as max_duration,
avg(p.duration_in_minutes) as avg_duration, STD(p.duration_in_minutes) as std_duration 
from Asrcoo.performance as p
where p.user_id =thisUserId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `edit_authentication_string` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_authentication_string`(userId int, newString varchar(256))
BEGIN
	UPDATE `Asrcoo`.`user` SET `authentication_string` = newString WHERE (`user_id` = userId);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `edit_question_detail` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_question_detail`(thisQuestion int , thisQuestionText varchar(540) , thisPointValue int)
BEGIN
UPDATE `Asrcoo`.`question` SET `point_value` = thisPointValue, `question_text` = thisQuestionText WHERE (`question_id` = thisQuestion);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `edit_quiz_detail` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_quiz_detail`(thisQuiz int,thisName varchar(90),thisDescription varchar(360),thisTimeLimit int)
BEGIN
#given a quiz id, change the information about it.
UPDATE `Asrcoo`.`quiz` SET `time_limit` = thisTimeLimit, `name` = thisName, `description` = thisDescription WHERE (`quiz_id` = thisQuiz);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_authentication_string` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_authentication_string`(thisUsername varchar(45))
BEGIN
	select u.authentication_string as hash from
	Asrcoo.user as u
	where u.user_name = thisUsername;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_correct_textAnswers` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_correct_textAnswers`(thisQuestion int)
BEGIN
#retrive all valid (correct) textAnswer_ids and textAnswer texts
#for a particular question
#this is is used on all questions in the text family
#i.e. textMC , textSATA , textFR
#in all cases the result is a list
#for textMC and textFR the list has 1 element
#for textSATA it may have many
select ta.textAnswer_id , ta.answer_text
from Asrcoo.questionTextAnswer as qta
join Asrcoo.textAnswer as ta
on qta.textAnswer_id = ta.textAnswer_id
where ta.validity =1 and qta.question_id = thisQuestion;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_possible_textAnswers` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_possible_textAnswers`(thisQuestion int)
BEGIN
	#For multiple choice and SATA questions
    #this procedure is called to return the possible
    #answers for users to select
    #it returns the answer texts, and textAnswer_ids
    
    #returns possible answers sorted by id
	select ta.textAnswer_id , ta.answer_text, ta.validity
	from Asrcoo.questionTextAnswer as qta
	join Asrcoo.textAnswer as ta
	on qta.textAnswer_id = ta.textAnswer_id
	where qta.question_id = thisQuestion
    order by ta.textAnswer_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_quiz_detail` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_quiz_detail`(thisQuiz int)
BEGIN
    #list all quiz details for a particular quiz
	select q.name, u.user_name as 'author', q.date_created , q.time_limit ,q.description,
    
		#subquery to count up all quiz questions
		(select count(*) 
		from Asrcoo.question as q
		where q.quiz_id=thisQuiz) as 'number_of_questions',
        
        ##subquery to get total points
        (select sum(q.point_value) 
		from Asrcoo.question as q
        where q.quiz_id =thisQuiz) as 'total_points',
        
        #subquery to get subject string
        #retrive all quiz subjects, but concatenate them by commas
        (select GROUP_CONCAT(s.name ORDER BY s.name ASC SEPARATOR ',')
		from Asrcoo.quiz as q
		join Asrcoo.quizSubject as qs
		on q.quiz_id = qs.quiz_id
		join Asrcoo.subject as s
		on qs.subject_id = s.subject_id
		where q.quiz_id = thisQuiz
		order by q.name) as 'subjects'
        
	from Asrcoo.quiz as q
	join Asrcoo.user as u
	on q.author_id = u.user_id
	where q.quiz_id =thisQuiz;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_quiz_questions` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_quiz_questions`(thisQuiz int)
BEGIN
#get all of the question_id's and question texts and question types of a given quiz
select q.question_id , q.question_text, q.DTYPE as question_type, q.point_value, q.order
from Asrcoo.question as q
where q.quiz_id =thisQuiz;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_top_quizzes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_top_quizzes`(numberOfQuizzes int)
BEGIN
SELECT q.name, count(*) as attempts 
FROM Asrcoo.performance as p
join Asrcoo.quiz as q
on q.quiz_id = p.quiz_id
GROUP BY p.quiz_id
ORDER BY COUNT(*) DESC
limit numberOfQuizzes;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_top_subjects` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_top_subjects`(numberOfSubjects int)
BEGIN

SELECT s.name, COUNT(*) as total_attempts
FROM Asrcoo.performance p
JOIN Asrcoo.quiz q USING (quiz_id)
JOIN Asrcoo.quizSubject qs USING (quiz_id) 
JOIN Asrcoo.subject s USING (subject_id)
GROUP BY s.name
ORDER BY COUNT(*) DESC
LIMIT numberOfSubjects;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_top_user_performances` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_top_user_performances`(thisUser int)
BEGIN
#select a users top performances

select  q.name , t.max_grade 
from Asrcoo.top_quiz_performances_view as t
join Asrcoo.quiz q on q.quiz_id = t.quiz_id
where t.user_id = thisUser;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_total_attempts` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_total_attempts`()
BEGIN
select count(*) as attempts from Asrcoo.performance; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_total_time_spent` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_total_time_spent`()
BEGIN
##total time spent taking quizzes
Select sum(p.duration_in_minutes) as time from Asrcoo.performance as p;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_user_id` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_user_id`(thisUser varchar(45))
BEGIN
	select u.user_id from 
    Asrcoo.user u
    where u.user_name = thisUser;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_user_privilege` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_user_privilege`(thisUsername varchar(45))
BEGIN
	#get the priviliege level of the user with thisUsername
	select privilege
    from Asrcoo.user u
    where thisUsername = u.user_name;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `grade_fixed_textQuestion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `grade_fixed_textQuestion`(thisQuestionID int, thisAnswerString varchar(90) )
BEGIN
#grade a multiple text  (MC or SATA) = (fixed) question

#given a question id and a user's answer string: which consists of answer ids , comma separatred, and ascending
#subquery to retrive the valid answer answer set (i.e. all id's with validity 1 that map to the question)
#subquery to retrieve the questions point value
#return the point value of the answer string provided matches the answer string generated
#the generated answer string is forced to be sorted asc by textAnswer_id for consistency
SELECT IF(thisAnswerString=
				#SUBQUERY: get correct answer for question_id
				(select GROUP_CONCAT(ta.textAnswer_id ORDER BY ta.textAnswer_id ASC SEPARATOR ',')
				from Asrcoo.questionTextAnswer as qta
				join Asrcoo.textAnswer as ta
				on qta.textAnswer_id = ta.textAnswer_id
				where ta.validity =1 and qta.question_id = thisQuestionID),
                #SUBQUERY: get the point value for question_id
				(SELECT q.point_value
				FROM Asrcoo.question AS q
				WHERE q.question_id = thisQuestionID)
				,0) as 'points_earned';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `grade_unfixed_textQuestion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `grade_unfixed_textQuestion`(thisQuestionID int, thisAnswerString varchar(90))
BEGIN
	#grade_unfixed_textQuestion
	SELECT IF(thisAnswerString=
				#SUBQUERY: get correct answer(s) for question_id
				(select ta.answer_text
				from Asrcoo.questionTextAnswer as qta
				join Asrcoo.textAnswer as ta
				on qta.textAnswer_id = ta.textAnswer_id
				where ta.validity =1 and qta.question_id =thisQuestionID),
                #SUBQUERY: get the point value for question_id
				(SELECT q.point_value
				FROM Asrcoo.question AS q
				WHERE q.question_id = thisQuestionID)
				,0) as 'points_earned';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `list_all_quizzes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `list_all_quizzes`()
BEGIN
	#display all of the quizzes's names , authors , and data of creation
	select q.quiz_id, q.name, u.user_name as 'author', q.date_created, q.visibility
	from Asrcoo.quiz as q
	join Asrcoo.user as u
	on q.author_id = u.user_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `list_quiz_subjects` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `list_quiz_subjects`(thisQuizId int)
BEGIN
select s.subject_id, s.name from 
Asrcoo.quizSubject as qs 
join Asrcoo.subject as s 
on (qs.subject_id = s.subject_id)
where qs.quiz_id = thisQuizId
order by s.name;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `list_subjects` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `list_subjects`()
BEGIN
	select * from Asrcoo.subject as sub
	order by sub.name;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `list_user_quizzes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `list_user_quizzes`(thisUser int)
BEGIN
	select q.quiz_id, q.name, u.user_name as 'author', q.date_created, q.visibility
	from Asrcoo.quiz as q
	join Asrcoo.user as u
	on q.author_id = u.user_id
	where q.author_id = thisUser;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `list_visible_quizzes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `list_visible_quizzes`()
BEGIN
	#display all of the quizzes's names , authors , and data of creation
	select q.quiz_id, q.name, u.user_name as 'author', q.date_created
	from Asrcoo.quiz as q
	join Asrcoo.user as u
	on q.author_id = u.user_id
	where q.visibility =1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `remove_quiz_subject` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `remove_quiz_subject`(thisQuizId int, thisSubjectId int)
BEGIN
DELETE FROM `Asrcoo`.`quizSubject` WHERE (`quiz_id` = thisQuizId) and (`subject_id` = thisSubjectId);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `toggle_quiz_visibility` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `toggle_quiz_visibility`(thisQuiz int)
BEGIN
#invert the visibility on the current quiz
DECLARE old_visibility int default null;
DECLARE new_visibility int default 0;
	set old_visibility = (select q.visibility from Asrcoo.quiz as q
						where q.quiz_id = thisQuiz);
	
    if(old_visibility = 0) then
		set new_visibility =1;
	end if;
    
	UPDATE `Asrcoo`.`quiz` SET `visibility` = new_visibility WHERE (`quiz_id` = thisQuiz);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `toggle_user_privilege` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `toggle_user_privilege`(userId int)
BEGIN
DECLARE _oldPrivilege int Default null;
DECLARE _newPrivilege int Default null;
set _oldPrivilege = (select u.privilege from Asrcoo.user
					 as u 
					 where u.user_id = userId);
if(_oldPrivilege = 1) then #was employee , promote
	set _newPrivilege = 2;
else
	set _newPrivilege =1;	#wan mentor , demote
end if;
	UPDATE `Asrcoo`.`user` SET `privilege` = _newPrivilege WHERE (`user_id` = userId);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `top_quiz_performances_view`
--

/*!50001 DROP VIEW IF EXISTS `top_quiz_performances_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `top_quiz_performances_view` AS select `performance`.`user_id` AS `user_id`,`performance`.`quiz_id` AS `quiz_id`,max(`performance`.`grade`) AS `max_grade` from `performance` group by `performance`.`quiz_id`,`performance`.`user_id` order by `performance`.`user_id`,`performance`.`quiz_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-20  2:06:20
