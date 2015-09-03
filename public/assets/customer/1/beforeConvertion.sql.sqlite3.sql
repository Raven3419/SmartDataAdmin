begin;
DROP TABLE IF EXISTS `grades`;
CREATE TABLE `grades` (
  `grade_id` integer primary key autoincrement,
  `created_at` datetime   NULL,
  `created_by` varchar(255)   NULL,
  `modified_at` datetime   NULL,
  `modified_by` varchar(255)   NULL,
  `disabled` integer   NULL,
  `grade_name` varchar(255)   NULL
);


INSERT INTO `grades` VALUES (1,'2015-07-01 10:39:12','rsampson',NULL,NULL,0,'4th Grade');
INSERT INTO `grades` VALUES (2,'2015-07-01 10:39:27','rsampson',NULL,NULL,0,'5th Grade');
INSERT INTO `grades` VALUES (3,'2015-07-01 10:39:39','rsampson',NULL,NULL,0,'6th Grade');
INSERT INTO `grades` VALUES (4,'2015-07-01 10:39:46','rsampson',NULL,NULL,0,'7th Grade');
INSERT INTO `grades` VALUES (5,'2015-07-01 10:39:57','rsampson',NULL,NULL,0,'8th Grade');
INSERT INTO `grades` VALUES (6,'2015-08-21 09:22:01','rsampson',NULL,NULL,0,'9th Grade');
INSERT INTO `grades` VALUES (7,'2015-08-21 09:22:10','rsampson',NULL,NULL,0,'10th Grade');
INSERT INTO `grades` VALUES (8,'2015-08-21 09:22:19','rsampson',NULL,NULL,0,'11th Grade');
INSERT INTO `grades` VALUES (9,'2015-08-21 09:22:26','rsampson',NULL,NULL,0,'12th Grade');


DROP TABLE IF EXISTS `grades_subject`;
CREATE TABLE `grades_subject` (
  `grade_subject_id` integer primary key autoincrement,
  `grade_id` integer   NULL,
  `subject_id` integer   NULL,
  `created_at` datetime   NULL,
  `created_by` varchar(255)   NULL,
  `modified_at` datetime   NULL,
  `modified_by` varchar(255)   NULL,
  `disabled` integer   NULL
);


INSERT INTO `grades_subject` VALUES (1,1,1,'2015-07-10 10:13:14','rsampson',NULL,NULL,0);
INSERT INTO `grades_subject` VALUES (2,2,1,'2015-07-10 10:13:14','rsampson',NULL,NULL,0);


DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `question_id` integer primary key autoincrement,
  `grade_id` integer   NULL,
  `subject_id` integer   NULL,
  `created_at` datetime   NULL,
  `created_by` varchar(255)   NULL,
  `modified_at` datetime   NULL,
  `modified_by` varchar(255)   NULL,
  `disabled` integer   NULL,
  `text_question` longtext,
  `text_correct_answer` varchar(255)   NULL,
  `text_option_one` varchar(255)   NULL,
  `text_option_two` varchar(255)   NULL,
  `text_option_three` varchar(255)   NULL,
  `images` varchar(255)   NULL,
  `paragraph` varchar(255)   NULL,
  `is_image` integer   NULL,
  `school_id` integer   NULL
);


INSERT INTO `questions` VALUES (1,1,1,'2015-07-01 10:40:25','rsampson',NULL,NULL,0,'How would you write 1 as a Roman numeral?','I','X','V','IV','123','123',1,NULL);
INSERT INTO `questions` VALUES (9,1,1,'2015-07-01 10:40:25','rsampson',NULL,NULL,0,'wsefsef','sefsefse','sefsef','esfsef','testing4','testing5','sfesefsef',1,NULL);


DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `subject_id` integer primary key autoincrement,
  `created_at` datetime   NULL,
  `created_by` varchar(255)   NULL,
  `modified_at` datetime   NULL,
  `modified_by` varchar(255)   NULL,
  `disabled` integer   NULL,
  `subject_name` varchar(255) NULL
);


INSERT INTO `subjects` VALUES (1,'2015-07-01 10:40:25','rsampson',NULL,NULL,0,'Math');


commit;
