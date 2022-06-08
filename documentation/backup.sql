CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `tags` varchar(500) NOT NULL,
  `creation` varchar(255) NOT NULL,
  `lastUpdate` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`name`);

CREATE TABLE `appliedtag` (
  `tag` int(11) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `appliedtag`
  ADD KEY `constr_fk_appliedtag_tag` (`tag`),
  ADD KEY `constr_fk_appliedtag_post` (`post`);

ALTER TABLE `appliedtag`
  ADD CONSTRAINT `constr_fk_appliedtag_post` FOREIGN KEY (`post`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `constr_fk_appliedtag_tag` FOREIGN KEY (`tag`) REFERENCES `tag` (`id`);
COMMIT;

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `repoLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

INSERT INTO `post` (`id`, `slug`, `title`, `intro`, `image`, `tags`, `creation`, `lastUpdate`, `content`) VALUES
(1, 'cpp-templates', 'C++ templates', 'You can\'t make dynamic what\'s static, but you can make it more efficient', '1_QGpw8wcjv5MEtcJanjIlY8uravb-yht', 'cpp-software development', '29 Apr 2021', '6 Sep 2021', '1RN7KmjlaBVHsjnGEJyzoV3GfPiwlMpYA'),
(2, 'creating-classes-python', 'Creating classes in python', 'The foundamentals of object-oriented design', '1NN2QNcSvb9vOaLpmLkujB2hqJ2ZU3ql4', 'python-OOP', '02 Apr 2021', '06 Sep 2021', '1eLe-xLBI6U4UNV7XxjmObNBcHEqmhex4'),
(3, 'the-web-developer-dream-learn-the-ajax-technique', 'The web developer dream - learn the AJAX technique', 'You need just one technique for a dynamic website', '19dHCdQqtjwIAPmAs264pJCDSu6Mfx9lQ', 'php-web development-javascript', '31 Jan 2022', '31 Jan 2022', '1mNCTH578g0rsAlx73vddXTfhSUmD3AA_'),
(4, 'introduction-to-the-java-programming-language', 'Introduction to the Java programming language', 'A powerful language for powerful applications', '1PtlTi5lPVTSLWJKZ4tytBzc5FjCG_eNd', 'java-software development-OOP', '20 Feb 2022', '20 Feb 2022', '1YJT3oW2dubfBIZ-4b7wQ0YL_TcdTuHG5');

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'cpp'),
(2, 'software-development'),
(3, 'database'),
(4, 'OOP'),
(5, 'python'),
(6, 'php'),
(7, 'javascript'),
(8, 'web-development');
(9, 'java'),

INSERT INTO `appliedtag` (`tag`, `post`) VALUES
(1, 1),
(2, 2),
(4, 2),
(5, 2),
(6, 3),
(7, 3),
(8, 3),
(9, 4),
(2, 4),
(4, 4);

INSERT INTO `projects` (`id`, `title`, `intro`, `image`, `repoLink`) VALUES
(1, 'startpage', 'basic starting page that saves links by client-side ', '1TAG3oTE34wOA-3SAiDl78BLVRJ2BOabJ', 'https://github.com/gabrieleboccarusso/startpage'),
(2, 'Learning Machine Learning', 'all about my journey into the world of machine learning, plus other resources ', '1P_T-YttPNzmyDgsTdWyM4ZcSTyB8eLoD', 'https://github.com/gabrieleboccarusso/learningMachineLearning'),
(3, 'Data structures in C++', 'implementing data structures from scratch using c++', '1qYhOnGV06E2n-XYykAC_3qwi5ZeqBQoy', 'https://github.com/gabrieleboccarusso/data-structures-cpp'),
(4, 'Base 64 JavaScript encoder', 'base64 encoder & decoder made in vanilla JavaScript ', '1uWOSjcUg_Zfu3ot-DIMCt5UR-25hHc8e', 'https://github.com/gabrieleboccarusso/base64'),
(5, 'Learning Python', 'Everything useful that I learned about python', '1CKoaShfxNRiMEep_PBe3IJbVc4aWzry4', 'https://github.com/gabrieleboccarusso/learningPython'),
(6, 'Java Programming I & II', 'My solutions for the Java MOOC offered by the University of Helsinki', '171yW2Ap7pxKDReKxUCrkqeh6akgc3ZfP', 'https://github.com/gabrieleboccarusso/JavaProgramming');