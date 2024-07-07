


CREATE TABLE `access_log` (
  `count` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `activity` varchar(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`count`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


INSERT INTO access_log VALUES
("1","ghet","logout","2019-12-21 19:37:40"),
("2","admin","login","2019-12-21 19:38:30");




CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(5) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(200) NOT NULL,
  `company_tin` varchar(50) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_tel` varchar(20) NOT NULL,
  `company_mobile` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


INSERT INTO company VALUES
("1","PPCC","PALAWAN PEOPLES CREDIT COOPERATIVE","ERPV Building Rizal Avenue Puerto Princesa City","492733496","peoplescreditcoop@yahoo.com","0484331949","09484011836");




CREATE TABLE `departments` (
  `dept_code` int(11) NOT NULL AUTO_INCREMENT,
  `dept_company` varchar(10) NOT NULL,
  `dept_name` varchar(30) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`dept_code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO departments VALUES
("1","PPCC","Accounting","admin","2019-09-13"),
("2","PPCC","Cash","admin","2019-09-13"),
("3","PPCC","Loans","admin","2019-09-13");




CREATE TABLE `logbook` (
  `count` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `username` varchar(50) NOT NULL,
  `transaction` varchar(500) NOT NULL,
  PRIMARY KEY (`count`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=latin1;


INSERT INTO logbook VALUES
("1","2019-09-13","17:57:58","admin","add new company PALAWAN PEOPLES CREDIT COOPERATIVE"),
("2","2019-09-13","17:59:13","admin","create department Accounting"),
("3","2019-09-13","17:59:19","admin","create department Cash"),
("4","2019-09-13","17:59:25","admin","create department Loans"),
("5","2019-09-13","17:59:45","admin","create position Cashier"),
("6","2019-09-13","17:59:53","admin","create position Treasurer"),
("7","2019-09-13","18:00:05","admin","create position General Manager"),
("8","2019-09-13","18:00:11","admin","create position Accountant"),
("9","2019-09-13","18:00:18","admin","create position Credit Officer"),
("10","2019-09-13","18:01:14","admin","create system user ghet 5"),
("11","2019-09-13","18:02:00","admin","access_level update for ghet a1=1"),
("12","2019-09-13","18:02:00","admin","access_level update for ghet a2=1"),
("13","2019-09-13","18:02:00","admin","access_level update for ghet a3=1"),
("14","2019-09-13","18:02:00","admin","access_level update for ghet b1=1"),
("15","2019-09-13","18:02:00","admin","access_level update for ghet b2=1"),
("16","2019-09-13","18:02:00","admin","access_level update for ghet b3=1"),
("17","2019-09-13","18:02:00","admin","access_level update for ghet b4=1"),
("18","2019-09-13","18:02:00","admin","access_level update for ghet b5=1"),
("19","2019-09-13","18:02:00","admin","access_level update for ghet c1=1"),
("20","2019-09-13","18:02:00","admin","access_level update for ghet c2=1"),
("21","2019-09-13","18:02:00","admin","access_level update for ghet c3=1"),
("22","2019-09-13","18:02:00","admin","access_level update for ghet d1=1"),
("23","2019-09-13","18:02:00","admin","access_level update for ghet d2=1"),
("24","2019-09-13","18:02:00","admin","access_level update for ghet d3=1"),
("25","2019-09-13","18:02:00","admin","access_level update for ghet e1=0"),
("26","2019-09-13","18:02:00","admin","access_level update for ghet z1=1"),
("27","2019-09-13","18:02:00","admin","access_level update for ghet z2=1"),
("28","2019-09-13","18:02:01","admin","access_level update for ghet z3=1"),
("29","2019-09-13","18:02:01","admin","access_level update for ghet z4=1"),
("30","2019-09-13","18:02:01","admin","access_level update for ghet z5=0"),
("31","2019-09-13","18:02:01","admin","access_level update for ghet z6=0"),
("32","2019-09-13","18:02:01","admin","access_level update for ghet z7=0"),
("33","2019-09-13","18:02:01","admin","access_level update for ghet z8=1"),
("34","2019-09-13","18:02:01","admin","access_level update for ghet z9=1"),
("35","2019-09-13","18:02:01","admin","access_level update for ghet z10=0"),
("36","2019-09-13","18:02:01","admin","access_level update for ghet z11=1"),
("37","2019-09-13","18:28:06","ghet","add interest_rate:0.01 interest_desc:1%"),
("38","2019-09-13","18:28:23","ghet","add interest_rate:0.015 interest_desc:1.5 %"),
("39","2019-09-13","18:28:37","ghet","add interest_rate:0.02 interest_desc:2 %"),
("40","2019-09-13","18:28:55","ghet","add interest_rate:0.025 interest_desc:2.5 %"),
("41","2019-09-13","18:30:01","ghet","add loan_term:1 term_desc:1 Month"),
("42","2019-09-13","18:30:57","ghet","add loan_term:2 term_desc:Months"),
("43","2019-09-13","18:31:10","ghet","add loan_term:6 term_desc:6 Months"),
("44","2019-09-13","18:31:51","ghet","add loan_term:8 term_desc:8 Months"),
("45","2019-09-13","18:32:02","ghet","add loan_term:12 term_desc:12 Months"),
("46","2019-09-13","18:32:12","ghet","add loan_term:24 term_desc:24 Months"),
("47","2019-09-13","18:32:22","ghet","add loan_term:36 term_desc:36 Months"),
("48","2019-09-13","18:37:23","ghet","create new loan:20190910-001SL amount:60000 release:2019-09-14 loan sched:semi loantype:str for member code 86"),
("49","2019-09-13","18:41:43","ghet","backup databaase"),
("50","2019-09-14","09:17:15","ghet","Add New Associate : Mr Monserate Drillon Marvin"),
("51","2019-09-14","09:19:25","ghet","add loan_term:18 term_desc:18 Months"),
("52","2019-09-14","09:21:07","ghet","create new loan:20190802-001SL amount:56000 release:2019-08-02 loan sched:semi loantype:str for member code 139"),
("53","2019-09-14","09:33:48","ghet","Add New Associate : Ms Dicar Puro Ingrid"),
("54","2019-09-14","09:36:14","ghet","add loan_term:4 term_desc:4 Months"),
("55","2019-09-14","09:39:20","ghet","create new loan:20190803-001CA amount:10000 release:2019-08-03 loan sched:mon loantype:str for member code 140"),
("56","2019-09-16","18:13:03","admin","create system user queen 1"),
("57","2019-09-16","18:13:28","admin","access_level update for queen a1=1"),
("58","2019-09-16","18:13:28","admin","access_level update for queen a2=1"),
("59","2019-09-16","18:13:28","admin","access_level update for queen a3=1"),
("60","2019-09-16","18:13:28","admin","access_level update for queen b1=1"),
("61","2019-09-16","18:13:28","admin","access_level update for queen b2=1"),
("62","2019-09-16","18:13:28","admin","access_level update for queen b3=1"),
("63","2019-09-16","18:13:28","admin","access_level update for queen b4=1"),
("64","2019-09-16","18:13:28","admin","access_level update for queen b5=1"),
("65","2019-09-16","18:13:28","admin","access_level update for queen c1=1"),
("66","2019-09-16","18:13:28","admin","access_level update for queen c2=1"),
("67","2019-09-16","18:13:28","admin","access_level update for queen c3=1"),
("68","2019-09-16","18:13:28","admin","access_level update for queen d1=1"),
("69","2019-09-16","18:13:28","admin","access_level update for queen d2=1"),
("70","2019-09-16","18:13:28","admin","access_level update for queen d3=1"),
("71","2019-09-16","18:13:28","admin","access_level update for queen e1=1"),
("72","2019-09-16","18:13:28","admin","access_level update for queen z1=1"),
("73","2019-09-16","18:13:28","admin","access_level update for queen z2=1"),
("74","2019-09-16","18:13:28","admin","access_level update for queen z3=1"),
("75","2019-09-16","18:13:29","admin","access_level update for queen z4=1"),
("76","2019-09-16","18:13:29","admin","access_level update for queen z5=1"),
("77","2019-09-16","18:13:29","admin","access_level update for queen z6=0"),
("78","2019-09-16","18:13:29","admin","access_level update for queen z7=1"),
("79","2019-09-16","18:13:29","admin","access_level update for queen z8=1"),
("80","2019-09-16","18:13:29","admin","access_level update for queen z9=1"),
("81","2019-09-16","18:13:29","admin","access_level update for queen z10=1"),
("82","2019-09-16","18:13:29","admin","access_level update for queen z11=1"),
("83","2019-09-17","13:31:32","ghet","create new loan:PN No. 20190803-003CA amount:5000 release:2019-08-03 loan sched:mon loantype:str for member code 116"),
("84","2019-09-17","13:55:24","ghet","add interest_rate:0 interest_desc:0 %"),
("85","2019-09-17","13:59:47","ghet","Add New Associate : Ms Ba-alan Penachos Suaraj"),
("86","2019-09-17","14:05:42","ghet","create new loan:PN No. 20190803-002CA amount:10000 release:2019-08-03 loan sched:mon loantype:str for member code 141"),
("87","2019-09-17","14:12:31","ghet","create new loan:PN No. 20190805-003EML amount:37000 release:2019-08-05 loan sched:mon loantype:dim for member code 1"),
("88","2019-09-17","14:28:25","ghet","Add New Associate : Ms Rodriguez Paduga Leazil"),
("89","2019-09-17","14:33:41","ghet","create new loan:PN No. 20190805-002CA amount:10000 release:2019-08-05 loan sched:mon loantype:str for member code 142"),
("90","2019-09-20","09:58:59","ghet","Add New Regular : Ms Rabang Eguia Charlene"),
("91","2019-09-20","11:21:45","ghet","Add New Regular : Mr Baylosis Cruz Roland Gian"),
("92","2019-09-20","11:33:49","ghet","cis_no: 4, change last name to Baaco"),
("93","2019-09-20","11:33:57","ghet","cis_no: 4, change middle name to Kobokawa"),
("94","2019-09-20","11:48:27","ghet","Add New Regular : Mr Baaco Kobokawa Freedie Glicerio Jr."),
("95","2019-09-20","11:55:24","ghet","Add New Regular : Ms Alvarez Impang Ma. Daisy"),
("96","2019-09-20","13:26:49","ghet","Add New Associate : Mr Pagliawan Venturillo Reymond"),
("97","2019-09-20","13:38:50","ghet","Add New Regular : Mr Sotabinto Tia Jerry"),
("98","2019-09-20","14:06:40","ghet","Add New Associate : Mr Andriano Solijon Romeo"),
("99","2019-09-20","14:17:44","ghet","Add New Associate : Ms Anque Abog Sally"),
("100","2019-09-20","14:32:58","ghet","Add New Associate : Mr Bernas Nale Rex ");
INSERT INTO logbook VALUES
("101","2019-09-20","14:59:28","ghet","Add New Associate : Ms Camacho Mercader Amarina"),
("102","2019-09-20","15:08:40","ghet","Add New Associate : Ms Cantor Abrina Marigen"),
("103","2019-09-20","15:11:44","ghet","Add New Associate : Mr Concha Bundal Federico"),
("104","2019-09-20","15:19:22","ghet","Add New Associate : Mr Dejarme Reyes Johndy Mark"),
("105","2019-09-20","15:23:56","ghet","Add New Associate : Ms Dela Chica Borromeo Daisy"),
("106","2019-09-20","15:26:34","ghet","Add New Associate : Mr Dela Torre Orendain Allan"),
("107","2019-09-20","15:30:40","ghet","Add New Associate : Mr Escubin Distacamento Randy"),
("108","2019-09-20","15:33:10","ghet","cis_no: 121, change last name to Galicia"),
("109","2019-09-20","15:37:02","ghet","Add New Associate : Mr Herrera Cajega Reuben"),
("110","2019-09-20","16:10:45","ghet","Add New Associate : Mr Lagrada Tabi Gil"),
("111","2019-09-20","16:14:04","ghet","Add New Associate : Mr Regondon Lagrosa Joel"),
("112","2019-09-20","16:15:55","ghet","Add New Associate : Mr Lagura Hipolito Jerry"),
("113","2019-09-20","16:36:12","ghet","Add New Associate : Ms Lagura Abeso Gertrudes"),
("114","2019-09-20","16:42:20","ghet","Add New Associate : Mr Lagura Hipolito Ramie"),
("115","2019-09-21","10:35:03","ghet","Add New Associate : Mr Legarde Salinas Eugene"),
("116","2019-09-21","10:38:54","ghet","Add New Associate : Ms Lizardo Rivero Nenita"),
("117","2019-09-21","10:41:26","ghet","Add New Associate : Mr Lizardo Rivero Kenneth Godfrey"),
("118","2019-09-21","10:44:20","ghet","Add New Associate : Ms Loreno Destacamento Claudilyn Cherryl"),
("119","2019-09-21","10:59:33","ghet","Add New Associate : Mr Lucero Tabla Ryan"),
("120","2019-09-21","11:30:39","ghet","Add New Associate : Ms Lumugdang Belando Ruth"),
("121","2019-09-21","11:39:38","ghet","Add New Associate : Ms Lustado Legson Ailyn"),
("122","2019-09-21","11:42:49","ghet","Add New Associate : Ms Macula Lagan Cheryl"),
("123","2019-09-21","11:46:25","ghet","Add New Associate : Mr Magarce Blasco Claudio II"),
("124","2019-09-21","12:41:51","ghet","Add New Associate : Ms Magarce Serna Cynthia"),
("125","2019-09-21","12:46:35","ghet","Add New Associate : Mr Magarce Moises Gedion"),
("126","2019-09-21","12:53:43","ghet","Add New Associate : Mr Malabat Bauya Liebern"),
("127","2019-09-21","12:57:17","ghet","Add New Associate : Mr Malabuet Dondonayos Jerry"),
("128","2019-09-21","13:01:25","ghet","Add New Associate : Ms Manalo Mosteiro Nemie"),
("129","2019-09-21","16:13:19","ghet","Add New Associate : Ms Merales Rojas Antonette Pearl"),
("130","2019-10-05","12:59:40","ghet","Add New Associate : Ms Miraflores Coching Mary Joyce"),
("131","2019-10-05","14:11:31","ghet","Add New Associate : Mr Mirasol Lacierda Joel"),
("132","2019-10-05","14:16:22","ghet","Add New Associate : Ms Montero Nale Terese Angelica "),
("133","2019-10-05","14:24:56","ghet","Add New Associate : Mr Namoc Damarillo Aquillo Jr"),
("134","2019-10-05","14:31:14","ghet","Add New Associate : Ms Napone Pagaran Rotchelen Love"),
("135","2019-10-05","16:32:24","ghet","Add New Associate : Ms Olinares Zamora Rina"),
("136","2019-10-05","17:18:41","ghet","Add New Associate : Ms Pacaldo Bacaltos Chona"),
("137","2019-11-09","09:59:28","ghet","Add New Regular : Mr Briones Mucho Melchor"),
("138","2019-11-09","10:04:45","ghet","Add New Regular : Mr Dumaliw Macabio Oliver"),
("139","2019-11-09","10:10:45","ghet","Add New Regular : Ms Socrates Serafica Ruby"),
("140","2019-11-09","10:26:25","ghet","Add New Regular : Ms Socrates Serafica Gina"),
("141","2019-11-09","10:35:20","ghet","Add New Regular : Mr Federico Salapare Chito Ramon"),
("142","2019-11-09","11:39:42","ghet","Add New Associate : Ms Vinluan Fontanilla Almalyn"),
("143","2019-12-21","14:53:32","ghet","Add New Regular : Mr Briones Mucho Benrose"),
("144","2019-12-21","14:57:28","ghet","Add New Regular : Mr Espina CastaÃ±os Robert Johann"),
("145","2019-12-21","15:11:08","ghet","cis_no: 152, change member type to Regular"),
("146","2019-12-21","15:11:52","ghet","cis_no: 71, change member type to Regular"),
("147","2019-12-21","15:15:59","ghet","Add New Regular : Ms Telio Lagura Norele"),
("148","2019-12-21","15:18:50","ghet","cash_receipts capital_shares 100000 member_code:2 "),
("149","2019-12-21","15:21:23","ghet","cash_receipts capital_shares 50000 member_code:53 "),
("150","2019-12-21","15:22:31","ghet","cash_receipts capital_shares 100000 member_code:146 "),
("151","2019-12-21","15:23:18","ghet","cash_receipts capital_shares 150000 member_code:3 "),
("152","2019-12-21","15:24:50","ghet","cash_receipts capital_shares 100000 member_code:4 "),
("153","2019-12-21","15:25:14","ghet","cash_receipts capital_shares 50000 member_code:145 "),
("154","2019-12-21","15:25:38","ghet","cash_receipts capital_shares 100000 member_code:5 "),
("155","2019-12-21","15:26:35","ghet","cash_receipts capital_shares 50000 member_code:144 "),
("156","2019-12-21","15:27:09","ghet","cash_receipts capital_shares 100000 member_code:187 "),
("157","2019-12-21","15:27:27","ghet","cash_receipts capital_shares 25000 member_code:193 "),
("158","2019-12-21","15:28:58","ghet","cash_receipts capital_shares 25000 member_code:152 "),
("159","2019-12-21","15:29:34","ghet","cash_receipts capital_shares 100000 member_code:6 "),
("160","2019-12-21","15:49:18","ghet","cash_receipts capital_shares 25000 member_code:188 "),
("161","2019-12-21","15:49:43","ghet","cash_receipts capital_shares 100000 member_code:37 "),
("162","2019-12-21","16:03:15","ghet","cash_receipts capital_shares 75000 member_code:7 11/15/19"),
("163","2019-12-21","16:04:06","ghet","cash_receipts capital_shares 100000 member_code:8 "),
("164","2019-12-21","16:04:30","ghet","cash_receipts capital_shares 100000 member_code:9 "),
("165","2019-12-21","16:16:03","ghet","cash_receipts capital_shares 28000 member_code:191 "),
("166","2019-12-21","16:16:26","ghet","cash_receipts capital_shares 100000 member_code:12 "),
("167","2019-12-21","16:18:01","ghet","cash_receipts capital_shares 270000 member_code:11 "),
("168","2019-12-21","16:18:23","ghet","cash_receipts capital_shares 28000 member_code:10 "),
("169","2019-12-21","16:24:22","ghet","cash_receipts capital_shares 100000 member_code:15 "),
("170","2019-12-21","16:24:45","ghet","cash_receipts capital_shares 100000 member_code:13 "),
("171","2019-12-21","16:25:06","ghet","cash_receipts capital_shares 258000 member_code:14 "),
("172","2019-12-21","16:25:29","ghet","cash_receipts capital_shares 25000 member_code:39 "),
("173","2019-12-21","16:25:54","ghet","cash_receipts capital_shares 100000 member_code:16 "),
("174","2019-12-21","16:40:16","ghet","cash_receipts capital_shares 102750 member_code:17 "),
("175","2019-12-21","17:50:59","ghet","cash_receipts capital_shares 100000 member_code:18 "),
("176","2019-12-21","17:51:44","ghet","cash_receipts capital_shares 25000 member_code:38 "),
("177","2019-12-21","17:52:06","ghet","cash_receipts capital_shares 108000 member_code:19 "),
("178","2019-12-21","17:52:26","ghet","cash_receipts capital_shares 123000 member_code:20 "),
("179","2019-12-21","17:52:45","ghet","cash_receipts capital_shares 108000 member_code:21 "),
("180","2019-12-21","17:53:07","ghet","cash_receipts capital_shares 123000 member_code:22 "),
("181","2019-12-21","17:53:24","ghet","cash_receipts capital_shares 25000 member_code:147 "),
("182","2019-12-21","17:54:08","ghet","cash_receipts capital_shares 25000 member_code:35 "),
("183","2019-12-21","17:54:29","ghet","cash_receipts capital_shares 100000 member_code:1 "),
("184","2019-12-21","17:55:02","ghet","cash_receipts capital_shares 25000 member_code:23 "),
("185","2019-12-21","17:56:23","ghet","cash_receipts capital_shares 75000 member_code:23 "),
("186","2019-12-21","17:56:40","ghet","cash_receipts capital_shares 25000 member_code:143 "),
("187","2019-12-21","19:20:37","ghet","cash_receipts deposit 13 member_code:1 test only"),
("188","2019-12-21","19:32:10","ghet","cash_receipts deposit 1 member_code:1 test only"),
("189","2019-12-21","19:38:41","admin","backup databaase");




CREATE TABLE `m_cashflow_balance` (
  `cf_balanceID` int(11) NOT NULL AUTO_INCREMENT,
  `cf_beginning_balance_oh` double NOT NULL,
  `cf_beginning_balance_ob` double NOT NULL,
  `cf_balance_date` date NOT NULL,
  `date_encoded` datetime NOT NULL,
  `user_encoded` varchar(15) NOT NULL,
  PRIMARY KEY (`cf_balanceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `m_cashflow_daily` (
  `cf_dailyID` int(11) NOT NULL AUTO_INCREMENT,
  `cf_type` int(10) NOT NULL,
  `cf_refnum` varchar(100) NOT NULL,
  `cf_amount` double NOT NULL,
  `cf_transaction` varchar(150) NOT NULL,
  `cf_transaction_datetime` datetime NOT NULL,
  `cf_user_transacted` varchar(10) NOT NULL,
  PRIMARY KEY (`cf_dailyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `m_loans` (
  `tx_no` int(11) NOT NULL AUTO_INCREMENT,
  `member_code` int(10) NOT NULL,
  `loan_no` varchar(30) NOT NULL,
  `loan_amount` double NOT NULL,
  `loan_schedule` varchar(5) NOT NULL,
  `service_charge` double NOT NULL,
  `other_charge` double NOT NULL,
  `other_charge_remarks` varchar(50) NOT NULL,
  `insurance` double NOT NULL,
  `notarial_fee` double NOT NULL,
  `effective_interest_rate` double NOT NULL,
  `loan_term` int(3) NOT NULL,
  `loan_type` varchar(5) NOT NULL,
  `date_approve` date NOT NULL,
  `date_mature` date NOT NULL,
  `posted_by` varchar(20) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `loan_status` int(1) NOT NULL,
  PRIMARY KEY (`tx_no`),
  UNIQUE KEY `loan_no` (`loan_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `m_loans_data_details` (
  `tx_no` int(11) NOT NULL AUTO_INCREMENT,
  `member_code` int(10) NOT NULL,
  `loan_no` varchar(30) NOT NULL,
  `loan_amount` double NOT NULL,
  `effective_interest_rate` double NOT NULL,
  `loan_term` int(3) NOT NULL,
  `amort_number` int(3) NOT NULL,
  `amort_date_sched` date NOT NULL,
  `amort_principal` double NOT NULL,
  `amort_interest` double NOT NULL,
  `amort_due` double NOT NULL,
  `principal_balance` double NOT NULL,
  `payment` double NOT NULL,
  `posted_by` varchar(20) NOT NULL,
  `posting_date` date NOT NULL,
  `posting_time` time NOT NULL,
  `post_remarks` varchar(100) NOT NULL,
  `remarks_posted_by` varchar(20) NOT NULL,
  `loan_status` int(1) NOT NULL,
  PRIMARY KEY (`tx_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `m_loans_data_temp` (
  `tx_no` int(11) NOT NULL,
  `member_code` int(10) NOT NULL,
  `loan_no` varchar(30) NOT NULL,
  `loan_amount` double NOT NULL,
  `service_charge` double NOT NULL,
  `other_charge` double NOT NULL,
  `other_charge_remarks` varchar(50) NOT NULL,
  `insurance` double NOT NULL,
  `notarial_fee` double NOT NULL,
  `effective_interest_rate` double NOT NULL,
  `loan_term` int(3) NOT NULL,
  `loan_type` varchar(5) NOT NULL,
  `date_approve` date NOT NULL,
  `date_mature` date NOT NULL,
  `posted_by` varchar(20) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `loan_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `m_loans_rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interest_rate` double NOT NULL,
  `rate_desc` varchar(10) NOT NULL,
  `add_by` varchar(20) NOT NULL,
  `add_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


INSERT INTO m_loans_rates VALUES
("1","0.01","1%","ghet","2019-09-13 18:28:06"),
("2","0.015","1.5 %","ghet","2019-09-13 18:28:23"),
("3","0.02","2 %","ghet","2019-09-13 18:28:37"),
("4","0.025","2.5 %","ghet","2019-09-13 18:28:55"),
("5","0","0 %","ghet","2019-09-17 13:55:24");




CREATE TABLE `m_loans_terms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_terms` int(11) NOT NULL,
  `terms_desc` varchar(15) NOT NULL,
  `add_by` varchar(20) NOT NULL,
  `add_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;


INSERT INTO m_loans_terms VALUES
("1","1","1 Month","ghet","2019-09-13 18:30:01"),
("2","2","2 Months","ghet","2019-09-13 18:30:57"),
("3","6","6 Months","ghet","2019-09-13 18:31:10"),
("4","8","8 Months","ghet","2019-09-13 18:31:51"),
("5","12","12 Months","ghet","2019-09-13 18:32:02"),
("6","24","24 Months","ghet","2019-09-13 18:32:11"),
("7","36","36 Months","ghet","2019-09-13 18:32:22"),
("8","18","18 Months","ghet","2019-09-14 09:19:25"),
("9","4","4 Months","ghet","2019-09-14 09:36:14");




CREATE TABLE `m_members` (
  `member_code` int(11) NOT NULL AUTO_INCREMENT,
  `member_type` varchar(20) NOT NULL,
  `title` varchar(10) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `m_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `civil_status` varchar(10) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(50) NOT NULL,
  `present_address_street` varchar(50) NOT NULL,
  `present_address_bgy` varchar(50) NOT NULL,
  `present_address_city` varchar(50) NOT NULL,
  `present_address_province` varchar(50) NOT NULL,
  `present_zipcode` int(6) NOT NULL,
  `permanent_address_street` varchar(50) NOT NULL,
  `permanent_address_bgy` varchar(50) NOT NULL,
  `permanent_address_city` varchar(50) NOT NULL,
  `permanent_address_province` varchar(50) NOT NULL,
  `permanent_zipcode` int(11) NOT NULL,
  `home_number` varchar(15) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `id_presented` varchar(20) NOT NULL,
  `tin` int(15) NOT NULL,
  `f_name_spouse` varchar(50) NOT NULL,
  `m_name_spouse` varchar(50) NOT NULL,
  `l_name_spouse` varchar(50) NOT NULL,
  `no_of_children` int(2) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`member_code`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=latin1;


INSERT INTO m_members VALUES
("1","Regular","Mr","Omar","Fabrigas","Rabang","Male","Married","1983-08-13","Dumaran Palawan","399","Bgy Bancao-Bancao","Puerto Princesa CIty","Palawan","5300","399","Bgy Bancao-Bancao","Puerto Princesa City","Palawan","5300","0","9209739439","oommaayy@yahoo.com","TIN ID","929212319","Charlene","Eguia","Rabang","1","admin","2018-09-12"),
("2","Regular","Ms","Bernadette","Guinay","Abella","Female","Married","1978-08-22","Bunting, Pasig City","Socrates Rd.","San Pedro","Puerto Princesa City","Palawan","5300","Socrates Rd.","San Pedro","Puerto Princesa City","Palawan","5300","0","9178554982","icahenterprises@gmail.com","Pagibig Fund ID","912829134","Christopher Laurence","P","Abella","2","admin","2019-04-25"),
("3","Regular","Mr","Ariston","Dela Torre","Arzaga","Male","Married","1955-06-10","Brookes Point, Palawan","none","OringOring","Brookes Point","Palawan","5305","none","OringOring","Brookes Point","Palawan","5305","0","9175327069","arzaga_aris@yahoo.com","OSCA ID","133744064","Marlyn","C","Arzaga","0","admin","2019-04-27"),
("4","Regular","Mr","Fernando Sr.","Kobokawa","Baaco","Male","Married","1952-04-28","Roxas, Palawan","E.Arias St., Libis Road","San Pedro","Puerto Princesa City","Palawan","5300","E.Arias St., Libis Road","San Pedro","Puerto Princesa City","Palawan","5300","0","9175450599","fkb_bpipgs@yahoo.com","PRC 0000664","130224960","Josephine","L","Baaco","0","admin","2019-04-27"),
("5","Regular","Ms","Nelsa","Dionaldo","Baaco","Female","Married","1969-10-17","Calategas, Narra, Palawan","E. Gabuco Road","San Jose","Puerto Princesa City","Palawan","5300","E. Gabuco Road","San Jose","Puerto Princesa","Palawan","5300","0","9084309772","nelsadbaaco@gmail.com","PRC","160838939","Freddie Glicerio","K","Baaco Jr.","1","admin","2019-04-27"),
("6","Regular","Ms","Rachelle","Concepcion","Cayapas","Female","Married","1981-06-27","Narra, Palawan","Roxas St.","Kalipay","Puerto Princesa Cioty","Palawan","5300","Cayapas Bldg., New Market Road","San Jose","Puerto Princesa City","Palawan","5300","0","9175842325","rcluv_25@yahoo.com","Passport","938969820","Richard","Fulgencio","Cayapas","3","admin","2019-04-27"),
("7","Regular","Mr","John Sebastian","San Juan","Fabello","Male","Widower","1944-02-16","Aborlan, Palawan","14 Carandang Street","Manggahan","Puerto Princesa City","Palawan","5300","14 Carandang Street","Manggahan","Puerto Princesa City","Palawan","5300","0","9177237065","None","OSCA ID","132409369","None","None","None","2","admin","2019-04-27"),
("8","Regular","Mr","Chito","Rodriguez","Federico","Male","Married","1980-11-05","Naga City","BM Road","San Pedro","Puerto Princesa City","Palawan","5300","BM Road","San Pedro","Puerto Princesa City","Palawan","5300","0","9272937535","federicorodriguez@gmail.com","UMID","0","Rachel","R","Fedirico","2","admin","2019-04-27"),
("9","Regular","Ms","Rebecca","Rodriguez","Federico","Female","Married","1955-02-14","Cuyo, Palawan","Venturillo Rd. 4","San Pedro","Puerto Princesa City","Palawan","5300","Venturillo Rd 4","San Pedro","Puerto Princesa City","Palawan","5300","0","9497296423","None","Postal ID","129242575","Chito Ramon","S","Federico","0","admin","2019-04-27"),
("10","Regular","Mr","Romeo Jr.","Abedejos","Go","Male","Married","1985-04-07","Narra, Palawan","Avocado Street","Poblacion","Narra","Palawan","5303","Avocado Street","Poblacion","Narra","Palawan","5303","0","9215737088","romeogojr@yahoo.com","DL DII 03 000375","253485077","Jurhaiya ","M","Go","1","admin","2019-04-27"),
("11","Regular","Mr","John Emmer","Sulit","Gamo","Female","Single","1996-10-23","Brookes Point, Palawan","08 Mahogany Lane, Villa Ramos Subd.","Villamonte","Bacolod City","Negros Occidental","6100","Macadam","Rio Tuba","Bataraza","Palawan","5305","0","9167807694","aphinegamo23@gmail.com","School ID","0","None","None","None","0","admin","2019-04-27"),
("12","Regular","Ms","Rachel","Rabang","Federico","Female","Married","1981-09-25","Calategas, Narra, Palawan","Venturillo Rd. 4, BM Road","San Pedro","Puerto Princesa City","Palawan","5300","Venturillo Rd. 4, BM Road","San Pedro","Puerto Princesa City","Palawan","5300","0","9178320525","rachelfaderico25@gmail.com","PRC","934430725","Chito","Rodriguez","Federico","0","admin","2019-04-27"),
("13","Regular","Ms","Victoria","Landicho","Ladica","Female","Widower","1956-11-15","Calamba City, Laguna","Delos Reyes Rd. I","San Pedro","Puerto Princesa City","Palawan","5300","Delos Reyes Rd. I","San Pedro","Puerto Princesa City","Palawan","5300","0","9173110061","vickielladica@yahoo.com","Office ID","130225816","None","None","None","0","admin","2019-04-27"),
("14","Regular","Ms","Christina","Manzano","Laus","Female","Single","1979-05-23","Manila","Blk 2 Lot 5 Kamalay Subd.","San Jose","Puerto Princesa City","Palawan","5300","Blk 2 Lot 5 kamalay Subd.","San Jose","Puerto Princesa City","Palawan","5300","0","9954532716","tina_laus@2go.com ph","SSS ID","206935089","None","None","None","0","admin","2019-04-27"),
("15","Regular","Mr","Richander","Golifardo","Jagmis","Male","Married","1976-08-20","Narra, Palawan","Rizal Ave., Ext.","Bancao-Bancao","Puerto Princesa City","Palawan","5300","Rizal Ave., Ext.","Bancao-Bancao","Puerto Princesa City","Palawan","5300","0","9178897979","richanderj@yahoo.com","PRC ID","912857120","Ma. Elizabeth","M","Jagmis","1","admin","2019-04-27"),
("16","Regular","Mr","Roy Michael","Navarro","Madulid","Male","Single","1977-07-04","Brookes Point Palawan","32 Lagan St.","Milagrosa","Puerto Princesa City","Palawan","5300","32 Lagan St.","Milagrosa","Puerto Princesa City","Palawan","5300","0","9083031437","roymike6477@yahoo.com","LBP Employee ID","912849903","None","None","None","0","admin","2019-04-27"),
("17","Regular","Ms","Amelita","Ayunan","Magsino","Female","Married","1976-04-24","Cebu City","168 Purok Bagong Silang","San Miguel","Puerto Princesa City","Palawan","5300","Blk 2, Lot 26, NHA Villa Subd.","Santa Monica","Puerto Princesa City","Palawan","5300","0","9158771548","amelitamagsino@yahoo.com","SSS ID","912825679","None","None","None","1","admin","2019-04-27"),
("18","Regular","Mr","Augusto Jesus","Naval","Marciano","Male","Married","1980-07-24","Bgy. Bacungan, Puerto Princesa City","Tumbaga Rd.","Tagburos","Puerto Princesa City","Palawan","5300","Tumbaga Rd.","Tagburos","Puerto Princesa City","Palawan","5300","0","9088143608","aj.marciano1980@gmail.com","None","924029920","Stacey","Samonte","Marciano","1","admin","2019-04-27"),
("19","Regular","Ms","Aires","Rodriguez","Pagliawan","Female","Married","1977-12-17","Narra, Palawan","PEO Road, ","Bancao-Bancao","Puerto Princesa City","Palawan","5300","None","None","None","None","0","0","9999918395","airespagliawan@yahoo.com","Driver License","930828325","Jesus","V","Pagliawan","3","admin","2019-04-27"),
("20","Regular","Ms","Florie Gene","Butay","Pagliawan","Female","Married","1981-09-18","Mangagoy, Bislig, Surigao D","Block 2, Lot 6, Lafiphai Homes, ","Sicsican","Puerto Princesa City","Palawan","5300","Block 2, Lot 6, Lafiphai Homes","Sicsican","Puerto Princesa City","Palawan","5300","0","9274367898","gyn_1028@yahoo.com","None","930415738","Rafael Jr","V","Pagliawan","2","admin","2019-04-27"),
("21","Regular","Mr","Jesus","Venturillo","Pagliawan","Male","Married","1972-07-07","Cuyo, Palawan","PEO Rd.","Bancao-Bancao","Puerto Princesa City","Palawan","5300","PEO Rd.","Bancao-Bancao","Puerto Princesa City","Palawan","5300","0","9209059878","jesspagliawan@gmail.com","None","912837760","Aires","Rodriguez","Pagliawan","3","admin","2019-04-27"),
("22","Regular","Mr","Rafael Jr","Venturillo","Pagliawan","Male","Married","1976-02-07","Brookes Point, Palawan","Block 2, Lot 6, Lafiphai Homes,","Sicsican","Puerto Princesa City","Palawan","5300","Block 2, Lot 6, Lafiphai Homes,","Sicsican","Puerto Princesa City","Palawan","5300","0","9177519308","rafaeljr_1028@yahoo.com.ph","None","919618578","Florie Gene","B","Pagliawan","3","admin","2019-04-27"),
("23","Regular","Ms","April Joy","Matudio","Rabang","Female","Single","1990-04-12","Puerto Princesa City","Lagan Street","Milagrosa","Puerto Princesa City","Palawan","5300","None","Calategas","Narra","Palawan","5303","0","9985510675","apriljoyrabang@gmail.com","PRC ID","315210231","None","None","None","0","admin","2019-04-27"),
("24","Regular","Ms","Elena","Bundal","Remolazo","Female","Married","1977-05-31","Balabac, Palawan","Navalta St., Peneyra Road","San Pedro","Puerto Princesa City","Palawan","5300","Navalta St., Penyra Road","San pedro","Puerto Princesa City","Palawan","5303","0","9196297549","elenabramolazo@yahoo.com","DL DII","921220413","Reynaldo","C","Remolazo","3","admin","2019-04-27"),
("25","Regular","Mr","Mark","Gacayan","Rodriguez","Male","Single","1982-01-19","Manila, Philippines","Block 2, Lot 56, Camella Homes","Bancao-Bancao","Puerto Princesa City","Palawan","5303","Block 2, Lot 56, Camella Homes","Bancao-Bancao","Puerto Princesa City","Palawan","5303","0","9164759756","mark_rodz2002@yahoo.com","PRC","230719418","None","None","None","0","admin","2019-04-27"),
("26","Regular","Ms","Grace","Rodriguez","Sotabinto","Female","Married","1972-02-04","Narra, Palawan","None","Antipuluan","Narra","Palawan","5303","None","Antipuluan","Narra","Palawan","5303","0","9285206908","gsotabinto@yahoo.com","None","912829070","Jerry","Tia","Sotabinto","3","admin","2019-04-27"),
("27","Regular","Mr","Jerry","Tia","Satabinto","Male","Married","1971-04-11","Narra, Palawan","None","Antipuluan","Narra","Palawan","5303","None","Antipuluan","Narra","Palawan","5303","0","9175175005","None","None","170779613","Grace","Rodriguez","Sotabinto","3","admin","2019-04-27"),
("28","Regular","Ms","Estela","Cabahug","Taliman","Female","Married","1954-11-21","None","Zone 3","Princess Urduja","Narra","Palawan","5303","Zone 3","Princess Urduja","Narra","Palawan","5303","0","152357369","emctaliman@hotmail.com","SSS ID","152357369","Charlito","C","Taliman","0","admin","2019-04-27"),
("29","Regular","Ms","Socorro","Socrates","Tan","Female","Widower","1938-03-04","La Carlota, Negros City","46 F Villarosa Road","Bancao-Bancao","Puerto Princesa City","Palawan","5303","46 F Villarosa","Bancao-Bancao","Puerto Princesa City","Palawan","5303","0","9173110075","tan-ching13@yahoo.com","OSCA ID","130224485","None","None","None","0","admin","2019-04-27"),
("30","Regular","Mr","Jayson","Castillo","Vinluan","Male","Married","1978-06-14","Burirao, Narra, Palawan","Osmeña Street","Poblacion","Narra","Palawan","5303","None","Burirao","Narra","Palawan","5303","0","9989525458","jv_nnmdc@yahoo.com","None","922200561","Angela","C","Vinluan","1","admin","2019-04-27"),
("31","Regular","Ms","Mary Ann","Briones","Ymalay","Female","Married","1976-05-22","Narra, Palawan","Old Buncag","Mandaragat","Puerto Princesa City","Palawan","5303","Old Buncag","Mandaragat","Puerto Princesa City","Palawan","5303","0","9176800113","maeymalay@yahoo.com","DL DII","912829070","Winfred","Quirante","Ymalay","1","admin","2019-04-27"),
("32","Regular","Ms","Winfred Jr","Quirante","Ymalay","Male","Married","1972-08-25","Tagum City Davao del Norte","None","Poblacion","Bataraza","Palawan","5306","None","Poblacion","Bataraza","Palawan","5306","0","9085166155","jrymalay@yahoo.com","DL DII","196637491","Mary Ann","Briones","Ymalay","1","admin","2019-04-27"),
("33","Regular","Ms","Mary Queen","Evina","Rodriguez","Female","Single","1993-01-31","Ipilan , Brookes Point, Palawan","Palumco Road","Tiniguiban","Puerto Princesa City","Palawan","5300","Proper 2","Ipilan","Brookes Point","Palawan","5306","0","950795745","rodriguezmaryqueen78@gmail.com","TIN","346285233","None","None","None","0","admin","2019-04-27"),
("34","Regular","Ms","Janine","gargoles","Rodriguez","Female","Married","1973-06-15","Quezon, Palawan","Lot 11-13, Blk 12 Princesa Homes","Wescom Road","Puerto Princesa City","Palawan","5300","Lot 11-13, Blk 12 Princesa Homes","Wescom Road","Purto Princesa City","Palawan","5300","0","9175530279","janine615@yahoo.com","None","201072832","Joey","Alvarez","Rodriguez","0","admin","2019-04-27"),
("35","Regular","Ms","Dorothy Joy","Buñag","Presto","Female","Married","1973-10-03","Puerto Princesa City","Ligaya Street","San Pedro","Puerto Princesa City","Palawan","5300","Ligaya Street","San Pedro","Puerto Princesa City","Palawan","5300","0","9173040416","djbpresto021@yahoo.com","LBP Employee ID","166380668","Peter Jeff","A","Presto","0","admin","2019-04-27"),
("36","Regular","Mr","Reynaldo","Canceran","Remolazo","Male","Married","1972-12-20","Nueva Vizcaya","Navalta Street, Peneyra Road","San Pedro","Puerto Princesa City","Palawan","5300","Navalta Street, Peneyra Road","San Pedro","Puerto Princesa City","Palawan","5300","0","9475370902","rollycremolazo@yahoo.com.ph","Driver License","0","Elena ","Bundal","Remolazo","3","admin","2019-04-27"),
("37","Regular","Ms","Caroline","Laus","Estrella","Female","Married","1965-12-21","Manila, PhilippinesBlk","Blk 2, Lot 5 Kamalay Hoa","San Jose","Puerto Princesa City","Palawan","5300","Blk 2, Lot 5 Kamalay Hoa","San Jose","Puerto Princesa City","Palawan","5300","0","9360635495","None","SSS ID","0","Neri","Z","Estrella","2","admin","2019-04-27"),
("38","Regular","Ms","Stacey","Samonte","Marciano","Female","Married","1979-03-28","Himanaylan, Negros","Tumbaga Rd","Tagburos","Puerto Princesa City","Palawan","5300","Tumbaga Rd","Tagburos","Puerto Princesa City","Palawan","5300","0","9088143606","tajaia_yssa@yahoo.com","None","0","Augusto Jesus","N","Marciano","2","admin","2019-05-21"),
("39","Regular","Ms","Mitzi Gaile","Gapilango","Lopez","Female","Single","1989-11-09","Narra, Palawan","Diamond H.O","Sicsican","Puerto Princesa City","Palawan","5300","Diamond H.O","Sicsican","Puerto Princesa City","Palawan","5300","0","9078341225","mitzigailelopez@yahoo.com","None","310929418","None","None","None","0","admin","2019-05-21"),
("40","Associate","Mr","Ivan","Pe","Aban","Male","Single","1985-09-14","Balabac, Palawan","135-D Burgos St.","Tagumpay","Puerto Princesa City","Palawan","5300","135-D Burgos St.","Tagumpay","Puerto Princesa City","Palawan","5300","0","9182488949","ivan42282@gmail.com","PRC","318240058","None","None","None","0","admin","2019-05-21"),
("41","Associate","Ms","Glecil","Soledad","Aban","Female","Single","1985-09-14","Balabac, Palawan","None","Poblacion","Balabac","Palawan","5307","None","Poblacion","Balabac","Palawan","5307","0","9125164372","None","PRC","315043754","None","None","None","0","admin","2019-05-21"),
("42","Associate","Ms","Glenda","Soledad","Aban","Female","Single","1978-11-03","Balabac, Palawan","None","Poblacion","Balabac","Palawan","5307","None","Poblacion","Balabac","Palawan","5307","0","9494680374","None","PRC","944097747","None","None","None","2","admin","2019-05-21"),
("43","Associate","Ms","Marilou","Jagmany","Abapo","Female","Married","1961-02-06","Puerto Princesa City","Green Valley Home Subdivison","Sicsican","Puerto Princesa City","Palawan","5300","Green Valley Home Subdivison","Sicsican","Puerto Princesa City","Palawan","5300","0","9499327582","None","PRC ID","18644130","Moises Jr","J","Abapo","2","admin","2019-05-21"),
("44","Associate","Ms","Menoca","Canja","Abian","Female","Married","1976-11-06","Negros Occidental","116 E. Valencia St.","Masipag","Puerto Princesa City","Palawan","5300","116 E. Valencia St.","Masipag","Puerto Princesa City","Palawan","5300","0","9368779876","menoca.abian@yahoo.com","Voters ID","0","Wilson","R","Abian","2","admin","2019-05-21"),
("45","Associate","Ms","Hera Jane","Monserate","Abid","Female","Single","1990-04-14","Sampaloc, Manila","None","Sta. Monica","Puerto Princesa City","Palawan","5300","None","Sta. Monica","Puerto Princesa City","Palawan","5300","0","9754913402","herajaneabid@yahoo.com","PRC ID","321413717","None","None","None","0","admin","2019-05-21"),
("46","Associate","Mr","Arnel","Cacacha","Abrea","Male","Married","0984-07-11","Ipilan, Brookes Point, Palawan","None","Manalo","Puerto Princesa City","Palawan","5300","None","Manalo","Puerto Princesa City","Palawan","5300","0","9955262389","aaabrea108@yahoo.com","Company ID","940691764","Jinky","D","Abrea","1","admin","2019-05-21"),
("47","Associate","Ms","Nena","Dianaldo","Abueg","Female","Widower","1961-11-18","Narra, Palawan","Abueg Fishpond Socrates Road","San Pedro","Puerto Princesa City","Palawan","5300","Abueg Fishpond Socrates Road","San Pedro","Puerto Princesa City","Palawan","5300","0","9999418029","None","GSIS ID","905653231","None","None","None","0","admin","2019-05-21"),
("48","Associate","Mr","Eligio","Casilan","Adelantar","Male","Married","1958-07-31","Puerto Princesa City","DENR Village","Sta. Monica","Puerto Princesa City","Palawan","5300","DENR Village","Sta. Monica","Puerto Princesa City","Palawan","5300","0","9951517040","None","Company ID","135056510","Elena","C","Adelantar","0","admin","2019-05-21"),
("49","Associate","Ms","Elena","Casilan","Adelantar","Female","Married","1960-03-04","Puerto Princesa City","DENR Village","Sta. Monica","Puerto Princesa City","Palawan","5300","DENR Village","Sta. Monica","Puerto Princesa City","Palawan","5300","0","9108492211","None","Womens ID","0","Eligio","C","Adelantar","0","admin","2019-05-21"),
("50","Associate","Ms","Evanie","Casilan","Adelantar","Female","Single","1990-05-22","Puerto Princesa City","DENR Village","Sta. Monica","Puerto Princesa City","Palawan","5300","DENR Village","Sta. Monica","Puerto Princesa City","Palawan","5300","0","9103765723","None","SSS ID","707177804","None","None","None","1","admin","2019-05-21"),
("51","Associate","Ms","Mary Joy","Magtang","Alcantara","Female","Married","1978-06-03","Negros Occidental","Typoco Village","San Manuel","Puerto Princesa City","Palawan","5300","Typoco Village","San Miguel","Puerto Prtincesa City","Palawan","5300","0","907392411","None","Company ID","2147483647","Jesus Avelino","B","Alcantara","2","admin","2019-05-22"),
("52","Associate","Mr","Shymond","Embrado","Alcantara","Male","Single","1990-10-13","Taytay Palawan","Gacot Rd","Barangay Bancao Bancao","Puerto Princesa City","Palawan","5300","Gacot Rd","Barangay Bancao Bancao","Puerto Princesa City","Palawan","5300","0","9503509680","none","Company ID","309339945","none","none","none","1","admin","2019-05-22"),
("53","Associate","Ms","Kristine","Rabang","Algara","Female","Married","1983-03-17","Puerto Princesa City","none","Tagburos","Puerto Princesa City","Palawan","5300","none","Tagburos","Puerto Princesa City","Palawan","5300","0","9187960773","none","PRC","942259206","Alex","none","Algara","2","admin","2019-05-22"),
("54","Associate","Ms","Anna Maria","Pagayona","Alabastro","Female","Married","1990-12-08","Sta. Lourdes, Puerto Princesa City","PSU Rd","Tiniguiban","Puerto Princesa City","Palawan","5300","PSU Rd","Tiniguiban","Puerto Princesa Ci","Palawan","5300","0","9194114024","anna120890.ama@gmail.com","DL","311035477","Gerry","N","Alabastro","2","admin","2019-05-22"),
("55","Associate","Ms","Jaina","Brequillo","Almoroto","Female","Single","1993-08-13","Puerto Princesa City","Libis road","San Pedro","Puerto Princesa City","Palawan","5300","Libis road","San Pedro","Puerto Princesa City","Palawan","5300","0","9202820011","none","Company ID","312098884","none","none","none","2","admin","2019-05-22"),
("56","Associate","Ms","Cocepcion","Chantengco","Alvarez","Female","Widower","1966-12-08","Porac, Pampanga","BM ROAD, Bagalay st.","San Pedro","Puerto Princesa City","Palawan","5300","BM ROAD, Bagalay st.","San Pedro","Puerto Princesa City","Palawan","5300","0","927975515","none","TIN ID","456158713","Joel","none","Alvarez","2","admin","2019-05-22"),
("57","Associate","Ms","Esther","Abaniel","Alvarez","Female","Single","1974-08-19","Cuyo, Palawan","none","Debangan","Taytay","Palawan","5312","none","Debangan","Taytay","Palawan","5312","0","9485679769","none","PRC ID","319284669","none","none","none","0","admin","2019-05-22"),
("58","Associate","Mr","Joven","Francisco","Amar","Male","Widower","1981-07-09","Brgy. Dumaguena, Narra","Virginia Project 3","Sicsican","Puerto Princesa City","Palawan","5300","Virginia Project 3","Sicsican","Puerto Princesa City","Palawan","5300","0","9092968682","none","SSS","0","none","none","none","1","admin","2019-05-22"),
("59","Associate","Mr","Arjo","Abrea","Amurao","Male","Married","1990-07-21","Caramay Roxas","Pajara","Sta. Monica","Puerto Princesa City","Palawan","5300","Pajara","Sta. Monica","Puerto Princesa City","Palawan","5300","0","9060910687","none","Company ID","317419776","Titziana","none","Amurao","0","admin","2019-05-22"),
("60","Associate","Ms","Mensie","Rodriguez","Andriano","Female","Married","1976-10-21","Brookes Point, Palawan","DENR Village","Sta. Monica","Puerto Princesa City","Palawan","5300","DENR Village","Sta. Monica","Puerto Princesa City","Palawan","5300","0","9175530481","none","TIN","919616720","Romeoi","S","Andriano","1","admin","2019-05-22"),
("61","Associate","Mr","Rustom","Bundal","Andoy","Male","Single","1995-06-10","Bgy. Manalo, Puerto Princesa City","none","Manalo","Puerto Princesa City","Palawan","5300","none","Manalo","Puerto Princesa City","Palawan","5300","0","9070945342","none","passport","0","none","none","none","0","admin","2019-05-22"),
("62","Associate","Ms","Anna Liza","Rey","Antonio","Female","Married","1984-08-15","Sta. Cruz, Marinduque","Gumamela Centro","Sta. Monica","Puerto Princesa City","Palawan","5300","Gumamela Centro","Sta. Monica","Puerto Princesa City","Palawan","5300","0","9486040534","none","PRC","314358723","Ronnie","O","Antonio","2","admin","2019-05-22"),
("63","Associate","Ms","Sharmaine","Hasan","Arsad","Female","Single","1994-07-02","Brookes Point, Palawan","none","Tiniguiban","Puerto Princesa City","Palawan","5300","none","Tiniguiban","Puerto Princesa City","Palawan","5300","0","9389330529","none","Passport","0","none","none","none","0","admin","2019-05-22"),
("64","Associate","Mr","Fatima","Daloma","Arazas","Female","Married","1984-10-15","Puerto Princesa City","Villa Elena Subd.","Sta. Monica","Puerto Princesa City","Palawan","5300","Villa Elena Subd.","Sta. Monica","Puerto Princesa City","Palawan","5300","0","9353575356","fatdaloma2009gmail.com","PRC","318173955","Garry","none","Arazas","1","admin","2019-05-22"),
("65","Associate","Ms","Rachel","Saclet","Arellano","Female","Married","1983-05-30","Roxas, Palawan","MP Road","San Miguel","Puerto Princesa City","Palawan","5300","MP Road","San Miguel","Puerto Princesa City","Palawan","5300","0","9993410948","none","PRC","267123848","Joshue","C","Arellano","0","admin","2019-05-22"),
("66","Associate","Mr","Asem","Balasabas","Asoy","Male","Single","1993-07-31","Zamboanga Del Sur","none","Macarascas","Puerto Princesa City","Palawan","5300","none","Macarascas","Puerto Princesa City","Palawan","5300","0","9150195053","none","Company ID","315592212","none","none","none","0","admin","2019-05-22"),
("67","Associate","Ms","Charol","Puyat","Autencio","Female","Married","1977-05-01","Puerto Princesa City","94 Sampaguita St.","San Pedro","Puerto Princesa City","Palawan","5300","94 Sampaguita St.","San pedro","Puerto Princesa City","Palawan","5300","0","9469655484","none","Company ID","912862117","Arnel","none","Autencio","1","admin","2019-05-22"),
("68","Associate","Mr","Emmanuel","Posadas","Azucena","Male","Married","1974-12-05","Puerto Princesa City","Purok Dalisay","Sicsican","Puerto Princesa City","Palawan","5300","Purok Dalisay","Sicsican","Puerto Princesa City","Palawan","5300","0","9192420029","none","Company ID","938969845","Estrelilita","A","Azucena","1","admin","2019-05-22"),
("69","Associate","Ms","Vimalyn","Lapag","Bandojo","Female","Married","1992-08-29","Puerto Princesa City","none","San Pedro","Puerto Princesa City","Palawan","5300","none","San Pedro","Puerto Princesa City","Palawan","5300","0","9050981868","none","Company ID","341933057","Nahrevs","none","Bandojo","2","admin","2019-05-22"),
("70","Associate","Mr","Mario","Villanueva","Barlas","Male","Married","1972-01-16","Roxas, Palawan","Liberty Quimzon","Bagong Sikat","Puerto Princesa City","Palawan","5300","Liberty Quimzon","Bagong Sikat","Puerto Princesa City","Palawan","5300","0","9484926409","none","Company ID","0","Hilda","D","Barlas","2","admin","2019-05-22"),
("71","Regular","Ms","April Joy","Gabo","Barte","Female","Devorced","1970-04-27","Palawan","160660 Everstone Rd Sw","none","Calgary, AB, T2Y4J7","Canada","0","none","Sta. Lourdes","Puerto Princesa City","Palawan","5300","0","14033979574","apriljoybarte0427yahoo.com","PRC ID","0","none","none","none","2","admin","2019-05-22"),
("72","Associate","Ms","Genevieve","Baigos","Batiancila","Female","Married","1988-12-25","Araceli, Palawan","Purok Bagong Silang, Zone 1","San Miguel","Puerto Princesa City","Palawan","5300","Purok Bagong Silang, Zone 1","San Miguel","Puerto Princesa City","Palawan","5300","0","9266951427","batiancilaevel@gmail.com","PAG IBIG","281782295","Evel","G.","Batiancila","1","admin","2019-05-22"),
("73","Associate","Ms","Ellen","Compuesto","Baylon","Female","Married","1971-08-23","Manila","P. Dalojo St.","San Pedro","Puerto Princesa City","Palawan","5300","P. Dalojo St.","San Pedro","Puerto Princesa City","Palawan","5300","0","9282194225","none","Company ID","162259190","Rene","D","Baylon","1","admin","2019-05-22"),
("74","Associate","Ms","Rosanna","Cruz","Baylosis","Female","Married","1964-08-09","Caloocan, Quezon City","none","Poblacion","Taytay","Palawan","5312","none","Poblacion","Taytay","Palawan","5312","0","9171441400","none","BIR","261122300","Rolando","L","Baylosis","1","admin","2019-05-22"),
("75","Associate","Mr","Eddie","Dreo","Borsilango","Male","Married","1981-07-14","Mulandy, Quezon","Blk 4, Lot 7 Green Harvest Subd. Santol St.","San Jose","Puerto Princesa City","Palawan","5300","Blk 4, Lot 7 Green Harvest Subd. Santol St.","San Jose","Puerto Princesa City","Palawan","5300","0","9064675462","none","Company ID","930420742","Tita","G","Borsilango","2","admin","2019-05-22"),
("76","Associate","Mr","Jerome","Evangelista","Boholst","Male","Single","1992-06-30","Leyte","Purok Unang Lahi","Sta. Lourdes","Puerto Princesa City","Palawan","5300","Purok Unang Lahi","Sta. Lourdes","Puerto Princesa City","Palawan","5300","0","9122511921","none","Company ID","410778279","Grenielyn","V","Boholst","1","admin","2019-05-22"),
("77","Associate","Ms","Jinky","Magbanua","Bolasoc","Female","Single","1992-01-20","Puerto Princesa City","Purok Narra","Sicsican","Puerto Princesa City","Palawan","5300","Purok Narra","Sicsican","Puerto Princesa City","Palawan","5300","0","9171674006","none","TIN ID","318173955","none","none","none","0","admin","2019-05-22"),
("78","Associate","Mr","Glen","Natividad","Bundal","Male","Married","1978-10-04","Puerto Princesa City","none","San Pedro","Puerto Princesa City","Palawan","5300","none","San Pedro","Puerto Princesa City","Palawan","5300","0","9213440213","none","Company ID","920623162","Melanie","G","Bundal","1","admin","2019-05-22"),
("79","Associate","Ms","Gracezel","Lucero","Cambel","Female","Married","1984-12-23","Tondo, Manila","none","Sta. Monica","Puerto Princesa City","Palawan","5300","none","Sta. Monica","Puerto Princesa City","Palawan","5300","0","9073949358","none","PRC","947019818","Gary","none","Cambel","1","admin","2019-05-22"),
("80","Associate","Ms","Rizza Florence","Ortega","Capara","Female","Married","1989-10-24","Puerto Princesa City","none","Sta. Monica","Puerto Princesa City","Palawan","5300","none","Sta. Monica","Puerto Princesa City","Palawan","5300","0","9059476358","rizzacapara89@gmail.com","PRC","314617666","Alvin","M","Capara","0","admin","2019-05-22"),
("81","Associate","Mr","Robert Glenn","Lawas ","Capuno","Male","Married","1978-07-17","Makati City","27B New Buncag Malasugue St.","Mandaragat","Puerto Princesa City","Palawan","5300","27B New Buncag Malasugue St.","Mandaragat","Puerto Princesa City","Palawan","5300","0","9398838036","none","DL","202582065","Rowena","R","Capuno","1","admin","2019-05-22"),
("82","Associate","Mr","Benje","Padul","Ceralbo","Male","Single","1990-08-23","Pana, Cuyo, Palawan","Libis Rd","San Pedro","Puerto Princesa City","Palawan","5300","Libis Rd","San Pedro","Puerto Princesa City","Palawan","5300","0","9295188698","none","Company ID","313441004","none","none","none","1","admin","2019-05-22"),
("83","Associate","Ms","Maricor","Veranda","Cesar","Female","Single","1984-04-18","Puerto Princesa City","none","Inagawan","Puerto Princesa City","Palawan","5300","none","Inagawan","Puerto Princesa City","Palawan","5300","0","9505011205","mariecorie18@gmail.com","Company ID","942264978","none","none","none","0","admin","2019-05-22"),
("84","Associate","Mr","Bruno","Pagliawan","Conde","Male","Single","1973-02-16","Bohol, Dumaran","none","Tiniguiban","Puerto Princesa City","Palawan","5300","none","Tiniguiban","Puerto Princesa City","Palawan","5300","0","9122555878","none","UMID","186140706","none","none","none","0","admin","2019-05-22"),
("85","Associate","Ms","Aranella","Basera","Conta","Female","Married","1982-06-12","Zamboanga Del Sur","Manalo Extension","none","Puerto Princesa City","Palawan","5300","Manalo Extension","none","Puerto Princesa City","Palawan","5300","0","9480096707","aranellaconta@gmail.com","PRC","938958416","Mike Angelo","B","Conta","1","admin","2019-05-22"),
("86","Associate","Mr","Eiel","Pons","Cordova","Male","Married","1975-04-08","Cagayan De Oro","Roxas St","Bagong Silang","Puerto Princesa City","Palawan","5300","Roxas St","Bagong Silang","Puerto Princesa City","Palawan","5300","0","9997394705","none","SSS","912862140","Julie","none","Victor","2","admin","2019-05-22"),
("87","Associate","Ms","Lurlyn ","Orehuela","Cuya","Female","Single","1983-10-16","Tagburos Puerto Princesa City","Aplaya","Tagburos","Puerto Princesa City","Palawan","5300","Aplaya","Tagburos","Puerto Princesa City","Palawan","5300","0","9206276756","none","HDMF","300732896","none","none","None","1","admin","2019-05-22"),
("88","Associate","Ms","Jocelyn","Tumbagahan","Dael","Female","Single","1982-03-25","Puerto Princesa City","Bucana","Iwahig","Puerto Princesa City","Palawan","5300","Bucana","Iwahig","Puerto Princesa City","Palawan","5300","0","9953078145","none","PRC ","934441060","none","none","none","1","admin","2019-05-22"),
("89","Associate","Mr","Mark Adrian","Rosauro","Dagame","Male","Single","1994-05-04","Gawid, San Vicente","none","Tiniguiban","Puerto Princesa City","Palawan","5300","none","Tiniguibam","Puerto Princesa City","Palawan","5300","0","9501195579","none","TIN ID","340184731","none","none","none","0","admin","2019-05-22"),
("90","Associate","Mr","Ian Anthony","Boricano","Davatos","Male","Single","1989-01-26","Sicsican, Puerto Princesa City","National Highway","Sicsican","Puerto Princesa City","Palawan","5300","Natioanal Highway","Sicsican","Puerto Princesa City","Palawan","5300","0","9100069383","iandavatos26@gmail.com","Voters ID","0","none","none","none","0","admin","2019-05-22"),
("91","Associate","Mr","Rufino","Cabusao","Dayupay","Male","Married","1967-09-18","Surigao Del Sur","Honda Bay","Sta. Lourdes","Puerto Princesa City","Palawan","5300","Honda Bay","Sta. Lourdes","Puerto Princesa City","Palawan","5300","0","9153442849","jundayupay@yahoo.com","Company ID","912869486","Lani","none","Dayupay","1","admin","2019-05-22"),
("92","Associate","Mr","Josephine","Flores","Del Mundo","Female","Married","1966-03-19","Puerto Princesa City","Socrates Rd","San Pedro","Puerto Princesa City","Palawan","5300","Socrates Rd","San Pedro","Puerto Princesa City","Palawan","5300","0","9266927376","none","SSS","183081191","Marvin","R","Del Mundo","0","admin","2019-05-22"),
("93","Associate","Ms","Jocelyn","Agustin","Dalojo","Female","Married","1981-08-12","Puerto Princesa City","none","Tagburos","Puerto Princesa City","Palawan","5300","none","Tagburos","Puerto Princesa City","Palawan","5300","0","9773864597","none","Company ID","0","none","none","none","1","admin","2019-05-22"),
("94","Associate","Ms","Rebecca","Miranda","Dagunan","Female","Married","1958-03-17","Bago City, Negros Occidental","Purok II","Inogbong","Bataraza","Palawan","5306","Purok II","Inugbong","Bataraza","Palawan","5306","0","9123128073","none","Company ID","138121103","Genaro","C","Dagunan","1","admin","2019-05-22"),
("95","Associate","Ms","Clouie","Pascua","Dela Cruz","Female","Single","1993-01-02","Puerto Princesa City","Prk Freedom","Irawan","Puerto Princesa City","Palawan","5300","Prk Freedom","Irawan","Puerto Princesa City","Palawan","5300","0","9173067614","none","PRC","318174801","none","none","none","0","admin","2019-05-22"),
("96","Associate","Ms","Eunece","Gabinete","Dela Cruz","Female","Married","1986-11-30","Bgy. Jose Rizal, Aborlan","none","San Miguel","Puerto Princesa City","Palawan","5300","none","San Miguel","Puerto Princesa City","Palawan","5300","0","9469325162","none","PRC","312235434","Michael","none","Dela Cruz","1","admin","2019-05-22"),
("97","Associate","Ms","Rachelle","Gardon","Detablan","Female","Married","1993-11-07","Valenzuela Manila","Baltan St","San Miguel","Puerto Princesa City","Palawan","5300","none","Antipuluan","Narra","Palawan","5303","0","9501158613","rachelle.deleon.bayonedge@gmail.com","Employees ID","456801615","Roberto","none","De Leon","1","admin","2019-05-22"),
("98","Associate","Ms","Nida","Saluta","Dimapundug","Female","Married","1962-08-03","Aloran, Misamis Occidental","Chico St","none","Narra","Palawan","5303","Chico St","none","Narra","Palawan","5303","0","9399022281","none","TIN ID","919618625","Kimal","S","Dimapundug","2","admin","2019-05-22"),
("99","Associate","Ms","Lalaine","Mamplata","Dimayuga","Female","Single","1985-11-25","Oriental Mindoro","309 Malvar St","none","Puerto Princesa City","Palawan","5300","309 Malvar St","none","Puerto Princesa City","Palawan","5300","0","9063979065","dimayuga_lalaine@gmail.com","GSIS","264460602","none","none","none","0","admin","2019-05-22"),
("100","Associate","Ms","Lalaine","Mamplata","Dimayuga","Female","Single","1985-11-25","Oriental Mindoro","309 Malvar St","none","Puerto Princesa City","Palawan","5300","309 Malvar St","none","Puerto Princesa City","Palawan","5300","0","9063979065","dimayuga_lalaine@gmail.com","GSIS","264460602","none","none","none","0","admin","2019-05-22");
INSERT INTO m_members VALUES
("101","Associate","Ms","Florian","Mamplata","Dimayuga","Female","Single","1990-11-13","Oriental Mindoro","309 Malvar St","none","Puerto Princesa City","Palawan","5300","309 Malvar St","none","Puerto Princesa City","Palawan","5300","0","9063979049","dimayuga.florian@gmailcom","GSIS","309148647","none","none","none","0","admin","2019-05-22"),
("102","Associate","Ms","Florian","Mamplata","Dimayuga","Female","Single","1990-11-13","Oriental Mindoro","309 Malvar St","none","Puerto Princesa City","Palawan","5300","309 Malvar St","none","Puerto Princesa City","Palawan","5300","0","9063979049","dimayuga.florian@gmailcom","GSIS","309148647","none","none","none","0","admin","2019-05-22"),
("103","Associate","Mr","Albert","Agojo","Dianolo","Male","Married","1978-08-08","Puerto Princesa City","Zone 1 Abanco Rd","San Pedro","Puerto Princesa City","Palawan","5300","Zone 1 Abanco Rd","San Pedro","Puerto Princesa City","Palawan","5300","0","9293304336","none","Company ID","188383501","Flordeliza","none","Dianolo","0","admin","2019-05-22"),
("104","Associate","Mr","Albert","Agojo","Dianolo","Male","Married","1978-08-08","Puerto Princesa City","Zone 1 Abanco Rd","San Pedro","Puerto Princesa City","Palawan","5300","Zone 1 Abanco Rd","San Pedro","Puerto Princesa City","Palawan","5300","0","9293304336","none","Company ID","188383501","Flordeliza","none","Dianolo","0","admin","2019-05-22"),
("105","Associate","Mr","Albert","Agojo","Dianolo","Male","Married","1978-08-08","Puerto Princesa City","Zone 1 Abanco Rd","San Pedro","Puerto Princesa City","Palawan","5300","Zone 1 Abanco Rd","San Pedro","Puerto Princesa City","Palawan","5300","0","9293304336","none","Company ID","188383501","Flordeliza","none","Dianolo","0","admin","2019-05-22"),
("106","Associate","Ms","Ivy Ann","Saleva","Domingo","Female","Single","1993-02-10","Aborlan, Palawan","130 Abad Santos St","Maunlad","Puerto Princesa City","Palawan","5300","130 Abad Santos St","Maunlad","Puerto Princesa City","Palawan","5300","0","9260785669","ivy.ann.domingo@gmail.com","Company ID","314084464","none","none","none","1","admin","2019-05-22"),
("107","Associate","Mr","Jhun Ferzon","Meanagua","Doria","Male","Married","1990-06-21","Antique","Pineda Rd","San Pedro","Puerto Princesa City","Palawan","5300","none","Batang Batang","Narra","Palawan","5303","0","9569934355","none","SSS","534609261","Jennifer","none","Puyomg","1","admin","2019-05-22"),
("108","Associate","Ms","Irene","Cajilo","Dormile","Female","Married","1983-08-11","Puerto Princesa City","34 Lagan St","Milagrosa","Puero Princesa City","Palawan","5300","34 Lagan St","Milagrosa","Puerto Princesa City","Palawan","5300","0","9217793475","anna120890.ama@gmail.com","DL","337026437","Romeo","G","Dormile","0","admin","2019-05-22"),
("109","Associate","Ms","Ronelyn","Buncag","Duguran","Female","Married","1984-12-10","Narra, Palawan","none","Princess Urduja","Narra","Palawan","5303","none","Princess Urduja","Narra","Palawan","5303","0","9464072474","none","PRC","259350405","Sonny","B","Duguran","2","admin","2019-05-22"),
("110","Associate","Mr","Reynaldo","Cervantes","Eleazar","Male","Married","1976-03-18","Macarascas","Honda Bay","Sta Lourdes","Puerto Princesa City","Palawan","5300","Honda Bay","Sta Lourdes","Puerto Princesa City","Palawan","5300","0","9295380443","none","SSS","188379898","Rachel","none","Eleazar","1","admin","2019-05-22"),
("111","Associate","Mr","Arnulfo","B","Evangelista","Male","Married","1977-08-15","Pangasinan","150 Abad Santos","none","Puerto Princesa City","Palawan","5300","150 Abad Santos","none","Puerto Princesa City","Palawan","5300","0","9282029777","none","UMID","412420434","Margarita","S","Evangelista","0","admin","2019-05-22"),
("112","Associate","Mr","Catalino","Cayao","Favila","Male","Single","1969-04-11","Teresa, Narra, Palawan","none","Teresa","Narra","Palawan","5303","none","Teresa","Narra","Palawan","5303","0","9094011129","none","Company ID","312133027","none","none","none","0","admin","2019-05-22"),
("113","Associate","Mr","Gaspar","Trinidad","Favila","Male","Married","1968-12-12","Narra, Palawan","Finigan St","Poblacion","Aborlan","Palawan","5302","Finigan St","Poblacion","Narra","Palawan","5302","0","905477004","favilaruthy@gmail.com","GSIS","926446353","Ruthy","H","Favila","2","admin","2019-05-22"),
("114","Associate","Ms","Ruthy","Hermonio","Favila","Female","Married","1970-06-20","Narra, Palawan","Finigan St","Poblacion","Narra","Palawan","3503","Finigan St","Poblacion","Narra","Palawan","3503","0","9054470044","favilaruthy620@gmail.com","SC","143933913","Gaspar","T","Favila Jr","1","admin","2019-05-22"),
("115","Associate","Mr","Richard","Gadayan","Fuentes","Male","Single","1970-08-05","Brookes Point, Palawan","none","San Jose","P{uerto Princesa City","Palawan","5300","none","San Jose","Puerto Princesa City","Palawan","5300","0","9099970967","none","Company ID","938967108","none","none","none","2","admin","2019-05-22"),
("116","Associate","Ms","Ma Crisalve","Javarez","Fuertes","Female","Married","1990-12-16","Puerto Princesa City","Employees Village","Sta Monica","Puerto Princesa City","Palawan","5300","Employees Village","Sta Monica","Puerto Princesa City","Palawan","5300","0","9066907189","none","Company ID","415704857","Warren","A","Fuertes","2","admin","2019-05-22"),
("117","Associate","Ms","Lovely Jinky","Andrade","Gabayan","Female","Married","1993-07-02","Quezon City","Purok Damayan","Panacan 2","Narra","Palawan","5303","Purok Damayan","Panacan 2","Narra","Palawan","3503","0","9073108726","none","PRC","320595984","Christian","none","Gabayan","1","admin","2019-05-22"),
("118","Associate","Mr","Gilory","Uapal","Gabo","Male","Married","1986-08-11","Cuyo, Palawan","None","Marufinas","Puerto Princesa City","Palawan","5300","None","Marufinas","Puerto Princesa City","Palawan","5300","0","9461632535","None","PRC ID","268112118","Ann Mary","U","Gabo","1","admin","2019-05-24"),
("119","Associate","Ms","Madelle","Gadiano","Cruz","Female","Married","1990-08-11","Dumaran","Manalo Ext.","Milagrosa","Puerto Princesa City","Palawan","5300","Manalo Ext.","Milagrosa","Puerto Princesa City","Palawan","5300","0","9484897421","madellegadiano@gmail.com","UMID","411137817","Marvin","None","Cruz","1","admin","2019-05-24"),
("120","Associate","Ms","Analyn","Batul","Gabuco","Female","Married","1986-03-18","Rizal Magsaysay Palawan","Dacany Sea Road","San Manuel","Puerto Princesa City","Palawan","5300","Dacany Sea Road","San Manuel","Puerto Princesa City","Palawan","5300","0","9301338359","analynbatul@yahoo.com","TIN","306546387","Uzziel ","L","Gabuco","1","admin","2019-05-24"),
("121","Associate","Mr","Ruel","Delantar","Galicia","Male","Married","1978-04-03","Masisi, Tabango, Leyte","None","Marangas","Bataraza","Palawan","5306","None","Marangas","Bataraza","Palawan","5306","0","9128154530","None","LGU ID","911344128","Ruthcel","S.","Galacia","2","admin","2019-05-24"),
("122","Associate","Mr","Jeriel Dhen","Melendres","Glori","Male","Single","1991-10-23","San Miguel, PPC","Masaya St., Kaakbayan","Tiniguiban","Puerto Princesa City","Palawan","5300","Masaya St., Kaakbayan","Tiniguiban","Puerto Princesa City","Palawan","5300","0","9306043650","None","PHIC","0","None","None","None","0","admin","2019-05-24"),
("123","Associate","Ms","Eden Grace","Badenas","Gomez","Female","Single","1989-06-12","Narra, Palawan","none","Panacan","Narra","Palawan","5303","none","Panacan","Narra","Palawan","5303","0","9099933421","none","PRC","311013851","none","none","none","1","admin","2019-05-24"),
("124","Associate","Ms","Hiddicel","Acosta","Gravamin","Female","Single","1996-01-15","Abongan Taytay Palawan","none","Abongan","Taytay Palawan","Palawan","5312","none","Abongan","Taytay","Palawan","5312","0","9452569500","none","PRC","377088655","none","none","none","0","admin","2019-05-24"),
("125","Associate","Ms","Angelica","Dequina","Gubalani","Female","Single","1989-12-12","Puerto Princesa City","Wescom Rd","San Maiguel","Puerto Princesa City","Palawan","5300","Wescom Rd","San Miguel","Puerto Princesa City","Palawan","5300","0","9353683261","aaabrea108@yahoo.com","Company ID","0","none","none","none","1","admin","2019-05-24"),
("126","Associate","Ms","Donna Grace","Genieva","Herman","Female","Single","1996-01-28","Puerto Princesa City","none","Princess Urduja","Narra","Palawan","5303","none","Princess Urduja","Narra","Palawan","5303","0","9069130059","34thdonna@gmail.com","PRC ID","329386038","none","none","none","0","admin","2019-05-24"),
("127","Associate","Ms","Lorena","Rodriguez","Herman","Female","Married","1991-07-31","Maroyogon, Puerto Princesa City","none","Cabayugan","Puerto Princesa City","Palawan","5300","none","Cabayugan","Puerto Princesa City","Palawan","5300","0","9051689543","lorena.herman @deped.gov.ph","PRC ID","321402746","Robert","A","Herman","1","admin","2019-05-24"),
("128","Associate","Ms","Sheryl Grace","Ciudad","Herrera","Female","Married","1992-08-29","Sara, Iloilo","#4 Nadayao Rd","San Pedro","Puerto Princesa City","Palawan","5300","Nadayao Rd","San Pedro","Puerto Princesa Coty","Palawan ","5300","0","9178177584","none","Passport","330855792","Reuben","none","Herrera","1","admin","2019-05-24"),
("129","Associate","Ms","Sheryl Grace","Ciudad","Herrera","Female","Married","1992-08-29","Sara, Iloilo","#4 Nadayao Rd","San Pedro","Puerto Princesa City","Palawan","5300","Nadayao Rd","San Pedro","Puerto Princesa Coty","Palawan ","5300","0","9178177584","none","Passport","330855792","Reuben","none","Herrera","1","admin","2019-05-24"),
("130","Associate","Mr","Jimmy","Paniza","Hila-os","Male","Married","1981-05-23","Pototan, Iloilo","Malvar St","none","Puerto Princesa City","Palawan","5300","Malvar St","none","Puerto Princesa City","Palawan","5300","0","9178246324","jimmyhilaos@naturespring.com.ph","TIN ID","948506036","Rhiza Mae","none","Hila-os","0","admin","2019-05-24"),
("131","Associate","Mr","Rupaico","Larawan","Jabagat","Male","Married","1984-10-09","Narra, Palawan","27B New Buncag Malasugue St","Mandaragat","Puerto Princesa City","Palawan","5300","27B New Buncag Malasugue St","Mandaragat","Puerto Princesa City","Palawan","5300","0","9126569251","none","Company ID","249217813","Prusuela","B","Jabagat","1","admin","2019-05-24"),
("132","Associate","Ms","Merenil","Rodriguez","Jardin","Female","Single","1986-12-19","Ipilan, Brookes Point Palawan","DENR village","Sta Monica","Puerto Princesa City","Palawan","5300","DENR Village","Sta Monica","Puerto Princesa City","Palawan","5300","0","9154655078","mimi.jardin1219@gmail.com","TIN ID","323471659","none","none","none","0","admin","2019-05-24"),
("133","Associate","Mr","Ilyn","none","Jimenez","Female","Single","1992-11-06","Luzviminda, Puerto Princesa City","Valencia St Near Dutches Pension","Masipag","Puerto Princesa City","Palawan","5300","Valencia St Near Dutches Pension","Masipag","Puerto Princesa City","Palawan","5300","0","9093068358","none","SSS ID","321291806","Jun Rey","none","Cadiz","0","admin","2019-05-24"),
("134","Associate","Ms","Lorie Jean","Rivas","Jimenez","Female","Single","1994-02-24","Malita Davao Del Sur","Bm Road","San Pedro","Puerto Princesa City","Palawan","5300","BM Road","San Pero","Puerto Princesa City","Palawan","5300","0","9107418794","none","Company ID","328622195","none","none","none","0","admin","2019-05-24"),
("135","Associate","Ms","Katherine","Janairo","Jompella","Female","Married","1983-07-04","Puerto Princesa City","280 NHA, Purok Mahogany","Sicsican","Puerto Princesa City","Palawan","5300","280 NHA, Purok Mahogany","Sicsican","Puerto Princesa City","Palawan","5300","0","9277750772","none","PRC","309453860","William","D","Jompella","2","admin","2019-05-24"),
("136","Associate","Mr","Reyan ","Villar","Lacay","Male","Married","1984-05-30","Poblacion, Quezon Palawan","Lomboy St","San Jose","Puerto Princesa City","Palawan","5300","Lomboy St","San Jose","Puerto Princesa City","Palawan","5300","0","9071743282","reyanlacay@yahoo.com","PHIC","287302789","Nelsa","S","Lacay","0","admin","2019-05-24"),
("137","Associate","Mr","Arnel","Japole","Lacpao","Male","Married","1978-06-28","Roxas, Palawan","Jaranilla Subd.","San Jose","Puerto Princesa City","Palawan","5300","Jaranilla Subd.","San Jose","Puerto Princesa City","Palawan","5300","0","9504672422","nonw","Company ID","274151230","Ernalyn","C","Lacpao","1","admin","2019-05-24"),
("138","Associate","Ms","Sahara","Acob","Lagera","Female","Married","1991-03-16","Rio Tuba Bataraza Palawan","Chico St","Poblacion","Narra","Palawan","5303","Chico St","Poblacion","Narra ","Palawan","5303","0","9484286479","none","PRC","928693295","Alvin","none","Lagera","2","admin","2019-05-24"),
("139","Associate","Mr","Marvin","Drillon","Monserate","Male","Married","1987-05-31","Bunog, Rizal Palawan","Oisca Rd","Sta. Monica","Puerto Princesa City","Palawan","5300","Oisca Rd","Sta. Monica","Puerto Princesa City","Palawan","5300","0","9475251899","none","Company ID 5343","253174704","Tarcy Joy","S","Monserate","0","ghet","2019-09-14"),
("140","Associate","Ms","Ingrid","Puro","Dicar","Female","Widower","1958-02-16","Banga So., Cotabato","None","Panacan","Narra","Palawan","5303","None","Panacan","Narra","Palawan","5303","0","9198127338","none","UMID GSIS","906789773","None","None","None","0","ghet","2019-09-14"),
("141","Associate","Ms","Suaraj","Penachos","Ba-alan","Female","Widower","1965-01-05","Negros Occidental","Estrella Street","Poblacion","Narra","Palawan","5303","Estrella Street","Poblacion","Narra","Palawan","5303","0","910683557","none","UMID GSIS","930421980","none","None","None","1","ghet","2019-09-17"),
("142","Associate","Ms","Leazil","Paduga","Rodriguez","Female","Married","1975-05-20","Puerto Princesa City","Pagkakaisa 1","Panacan","Narra","Palawan","5303","Pagkakaisa 1","Panacan","Narra","Palawan","5303","0","9204599422","None","DEP ED ID 14039-0927","252293422","Roel","Alvarez","Rodriguez","2","ghet","2019-09-17"),
("143","Regular","Ms","Charlene","Eguia","Rabang","Female","Married","1986-10-22","Zamboangga, Del Sur","# 399 Rizal Ave, Dagomboy Village","Bancao-Bancao","Puerto Princesa City","Palawan","5300","# 399 Rizal Ave, Dagomboy Village","Bancao-Bancao","Puerto Princesa City","Palawan","5300","0","9757263258","charlene.eguia1322@gfmail.com","PRC 0440888","335475570","Omar ","Fabrigas","Rabang","1","ghet","2019-09-20"),
("144","Regular","Mr","Roland Gian","Cruz","Baylosis","Male","Single","1989-09-18","Occidental Mindoro","None","San Pedro","Puerto Princesa City","Palawan","5300","None","San Pedro","Puerto Princesa City","Palawan","5300","0","9178760113","None","Company ID 154099446","317840453","None","None","None","0","ghet","2019-09-20"),
("145","Regular","Mr","Freedie Glicerio Jr.","Kobokawa","Baaco","Male","Married","1965-06-07","Roxas, Palawan","E. Gabuco Road","San Jose","Puerto Princesa City","Palawan","5300","E. Gabuco Road","San Jose","Puerto Princesa City","Palawan","5300","0","9196341149","nelsadbaaco@gmail.com","Office ID","130224979","Nelsa","Dionaldo","Baaco","1","ghet","2019-09-20"),
("146","Regular","Ms","Ma. Daisy","Impang","Alvarez","Female","Single","1990-12-22","Bgy. Casian, Taytay, Palawan","None","Casian","Taytay","Palawan","5312","None","Casian","Taytay","Palawan","5312","0","9497296423","None","UMID ID","0","None","None","None","0","ghet","2019-09-20"),
("147","Associate","Mr","Reymond","Venturillo","Pagliawan","Male","Single","1984-04-07","Ipilan, Brookes Point, Palawan","None","Ipilan","Brookes Point","Palawan","5305","None","Ipilan","Brookes Point","Palawan","5305","0","9338619402","monz_0407@yahoo.com","PRC ID","253899285","None","None","None","0","ghet","2019-09-20"),
("148","Regular","Mr","Jerry","Tia","Sotabinto","Male","Married","1967-04-11","Sipalay, Negros Occidental","None","Antipuluan","Narra","Palawan","5303","None","Antipuluan","Narra","Palawan","5303","0","9175175005","None","PGP 1294-00691","170779613","Grace","Rodriguez","Sotabinto","2","ghet","2019-09-20"),
("149","Associate","Mr","Romeo","Solijon","Andriano","Male","Married","1968-09-28","Diliman, Quezon City","DENR Village","Sta. Monica","Puerto Princesa City","Palawan","5300","DENR Village","Sta. Monica","Puerto Princesa City","Palawan","5300","0","9175530481","None","PRC ID 0031699","170773006","Mensie","Rodriguez","Andriano","3","ghet","2019-09-20"),
("150","Associate","Ms","Sally","Abog","Anque","Female","Married","1981-01-06","Panacan, Narra, Palawan","None","Panacan","Narra","Palawan","5303","None","Panacan","Narra","Palawan","5303","0","9125443183","sally.anque@deped.gov.ph","PRC ID","226581773","Warel","B","Anque","1","ghet","2019-09-20"),
("151","Associate","Mr","Rex ","Nale","Bernas","Male","Married","1984-02-13","RTN Rio Tuba, Palawan","None","Irawan","Puerto Princesa City","Palawan","5300","None","Irawan","Puerto Princesa City","Palawan","5300","0","9303735685","None","PHIC ID 09-05603348","457394369","Evan Mae","N","Bernas","0","ghet","2019-09-20"),
("152","Regular","Ms","Amarina","Mercader","Camacho","Female","Married","1968-05-06","Laoang, Northern Samar","Forest Gate Subd.","San Manuel","Puerto Princesa City","Palawan","5300","Forest Gate Subd.","San Manuel","Puerto Princesa City","Palawan","5300","0","9959804140","None","TIN ID","103651258","Archibald","K","Camacho","1","ghet","2019-09-20"),
("153","Associate","Ms","Marigen","Abrina","Cantor","Female","Married","1974-04-13","Tumarbong, Roxas, Palawan","Valledor Road, Wescom","San Miguel","Puerto Princesa City","Palawan","5300","Valledor Road, Wescom","San Miguel","Puerto Princesa City","Palawan","5300","0","9189643341","None","SSS ID 04-3056854-9","905653369","Federico","A","Cantor","1","ghet","2019-09-20"),
("154","Associate","Mr","Federico","Bundal","Concha","Male","Married","1964-04-15","Narra, Palawan","Hagedorn Rd., Blk. 10","San Pedro","Puerto Princesa City","Palawan","5300","Hagedorn Rd., Blk. 10","San Pedro","Puerto Princesa City","Palawan","5300","0","9096477289","None","PAGIBIG ID 1470-0063","256527111","Merlyn","B","Concha","1","ghet","2019-09-20"),
("155","Associate","Mr","Johndy Mark","Reyes","Dejarme","Male","Single","1995-10-26","Roxas, Palawan","Purok Talisay","Sisican","Puerto Princesa City","Palawan","5300","Purok Talisay","Sicsan","Puerto Princesa City","Palawan","5300","0","9951749425","None","SSS ID 0111-9439517-","344598592","None","None","None","0","ghet","2019-09-20"),
("156","Associate","Ms","Daisy","Borromeo","Dela Chica","Female","Single","1993-03-10","Rio Tuba, Bataraza","Factor Rd., Libis Street","San Pedro","Puerto Princesa City","Palawan","5300","Factor Rd., Libis Street","San Pedro","Puerto Princesa City","Palawan","5300","0","9266462084","daisydelachica@gmail.com","PRC ID 0064575","315487949","None","None","None","0","ghet","2019-09-20"),
("157","Associate","Mr","Allan","Orendain","Dela Torre","Male","Married","1977-02-06","Bicol","None","San Jose","Puerto Princesa City","Palawan","5300","None","San Jose","Puerto Princesa City","Palawan","5300","0","9750250266","None","PHIC 090500384297","0","Sharon ","G ","Dela Torre","2","ghet","2019-09-20"),
("158","Associate","Mr","Randy","Distacamento","Escubin","Male","Married","1979-08-25","Tinitian, Roxas","Typoco Village","San Miguel","Puerto Princesa City","Palawan","5300","Typoco Village","San Miguel","Puerto Princesa City","Palawan","5300","0","9121209198","None","Company ID 53203","707898454","Pinky","C","Escubin","0","ghet","2019-09-20"),
("159","Associate","Mr","Reuben","Cajega","Herrera","Male","Married","1983-09-24","Brookes Point, Palawan","#4 Nadayao Rd","San Pedro","Puerto Princesa City","Palawan","5300","#4 Nadayao Rd","San Pedro","Puerto Princesa City","Palawan","5300","0","9178492483","reuben.herrera@deped.gov.ph","PRC ID 0916623","259820110","Sheryl Grace","Ciudad","Herrera","1","ghet","2019-09-20"),
("160","Associate","Mr","Gil","Tabi","Lagrada","Male","Married","1964-02-24","Bgy. Lucban PPC","Purok Maunlad","Sta. Monica","Puerto Princesa City","Palawan","5300","Purok Maunlad","Sta. Monica","Puerto Princesa City","Palawan","5300","0","9675479439","None","GSIS ID 006-0094-723","147052071","Nenita","H","Lagrada","1","ghet","2019-09-20"),
("161","Associate","Mr","Joel","Lagrosa","Regondon","Male","Married","1982-09-20","Puerto Princesa City","Purok Bayanihan","San Miguel","Puerto Princesa City","Palawan","5300","Purok Bayanihan","San Miguel","Puerto Princesa City","Palawan","5300","0","9985641029","None","TIN ID","930817757","Girlie","R","Regondon","1","ghet","2019-09-20"),
("162","Associate","Mr","Jerry","Hipolito","Lagura","Male","Single","1978-02-20","sara, Ilo-ilo","Block 1 Lot 22, Fillvest Subdivision","San Manuel","Puerto Princesa City","Palawan","5300","Block 1 Lot 22, Fillvest Subdivision","San Manuel","Puerto Princesa City","Palawan","5300","0","9985300456","None","PHIC ID","408612416","None","None","None","0","ghet","2019-09-20"),
("163","Associate","Ms","Gertrudes","Abeso","Lagura","Female","Married","1987-07-26","Lumad, Pagadian City","Wescom Rd","San Pedro","Puerto Princesa City","Palawan","5300","Wescom Rd","San Pedro","Puerto Princesa City","Palawan","5300","0","9095677029","None","PRC ID 1528319","0","Ramie","Hipolito","Lagura","2","ghet","2019-09-20"),
("164","Associate","Mr","Ramie","Hipolito","Lagura","Male","Married","1986-03-13","Sara, Ilo-ilo","Wescom Rd.","San Pedro","Puerto Princesa City","Palawan","5300","Wescom Rd.","San Pedro","Puerto Princesa City","Palawan","5300","0","9172401205","None","Driver License D11-0","0","Gertrudes","Abeso","Lagura","2","ghet","2019-09-20"),
("165","Associate","Mr","Eugene","Salinas","Legarde","Male","Married","1980-07-24","Bacungan, Puerto Princesa","24C Old Buncag","Mandaragat","Puerto Princesa City","Palawan","5300","24C Old Buncag","Mandaragat","Puerto Princesa City","Palawan","5300","0","9150920967","None","TIN ID","266834816","None","None","None","1","ghet","2019-09-21"),
("166","Associate","Ms","Nenita","Rivero","Lizardo","Female","Married","1980-07-24","Bacungan, Puerto Princesa","23 C Baltan St","San Miguel","Puerto Princesa City","Palawan","5300","23 C Baltan St","San Miguel","Puerto Princesa City","Palawan","5300","0","9508113938","None","UMID ID 0111-7154149","0","Rogelio","T","Lizardo","2","ghet","2019-09-21"),
("167","Associate","Mr","Kenneth Godfrey","Rivero","Lizardo","Female","Single","1991-02-24","Roxas, Palawan","23 C 10 Baltan St","San Miguel","Puerto Princesa City","Palawan","5300","23 C 10 Baltan St","San Miguel","Puerto Princesa City","Palawan","5300","0","9209593855","kennethgodfreylizardo@yahoo.com","PNP ID","422826834","None","None","None","0","ghet","2019-09-21"),
("168","Associate","Ms","Claudilyn Cherryl","Destacamento","Loreno","Female","Single","1978-06-03","Puerto Princesa City","Purok Kattarungan Zone 2 Nabayan Comp.","San Miguel","Puerto Princesa City","Palawan","5300","Purok Kattarungan Zone 2 Nabayan Comp.","San Miguel","Puerto Princesa Cit","Palawan","5300","0","9165476671","None","Company ID 003","934442535","None","None","None","1","ghet","2019-09-21"),
("169","Associate","Mr","Ryan","Tabla","Lucero","Male","Single","1986-12-13","Puerto Princesa City","#07 Lucero St. Purok Masagana","San Pedro","Puerto Princesa City","Palawan","5300","#07 Lucero St. Purok Masagana","San Pedro","Puerto Princesa City","Palawan","5300","0","9073889811","None","Company ID 5441","28319245","None","None","None","0","ghet","2019-09-21"),
("170","Associate","Ms","Ruth","Belando","Lumugdang","Female","Married","1985-03-25","Roxas, Palawan","None","Igang-Igang","Bataraza","Palawan","5306","Pagbabago","San Manuel","Puerto Princesa City","Palawan","5300","0","9104353376","crizzalumugdang@gamilcom","PRC ID 1357616","307997500","Crizon","B","Lumugdang","1","ghet","2019-09-21"),
("171","Associate","Ms","Ailyn","Legson","Lustado","Female","Single","1984-02-04","San Jose Mindoro","7-2 Roxas St","Tagumpay","Puerto Princesa City","Palawan","5300","7-2 Roxas St","Tagumpay","Puerto Princesa City","Palawan","5300","0","9173158990","None","UMID ID 0111-5484673","0","None","None","None","0","ghet","2019-09-21"),
("172","Associate","Ms","Cheryl","Lagan","Macula","Female","Married","1982-08-06","Cuyo, Palawan","Purok Bagong Silang","Mangingisda","Puerto Princesa City","Palawan","5300","Purok Bagong Silang","Mangingisda","Puerto Princesa City","Palawan","5300","0","9759137074","None","None","0","Jhon Ryan","B","Macula","2","ghet","2019-09-21"),
("173","Associate","Mr","Claudio II","Blasco","Magarce","Male","Married","1983-01-24","Tabon, Quezon, Palawan","none","Bagong Sikat","Puerto Princesa City","Palawan","5300","none","Bagong Sikat","Puerto Princesa City","Palawan","5300","0","9359980941","None","TIN ID","938973470","Jerly","V","Magarce","2","ghet","2019-09-21"),
("174","Associate","Ms","Cynthia","Serna","Magarce","Female","Married","1969-09-04","Pangobilian Brookes Point","none","Pangobilian Brookes Point","Brookes Point","Palawan","5305","none","Pangobilian Brookes Point","Brookes Point","Palawan","5305","0","9156266414","None","PRC 0048276","188375297","Gedion","M","Magarce","1","ghet","2019-09-21"),
("175","Associate","Mr","Gedion","Moises","Magarce","Male","Married","1970-08-30","Sapalay, Negros Occidental","none","Pangobilian","Brookes Point","Palawan","5305","none","Pangobilian","Pangobilian","Palawan","5305","0","9156270782","None","DEP ED ID 039-03023","154222872","Cynthia","Serna","Magarce","1","ghet","2019-09-21"),
("176","Associate","Mr","Liebern","Bauya","Malabat","Male","Married","1987-10-26","General Santos City","Sitio San Carlos","Bacungan","Puerto Princesa City","Palawan","5300","Sitio San Carlos","Bacungan","Puerto Princesa City","Palawan","5300","0","9507471278","None","Company Id 0007408","314718533","Jenny","B","Malabat","0","ghet","2019-09-21"),
("177","Associate","Mr","Jerry","Dondonayos","Malabuet","Male","Single","1989-01-12","Narra, Palawan","Guyabano St.","Poblacion","Narra","Palawan","5303","Guyabano St.","Poblacion","Narra","Palawan","5303","0","9484346301","None","Company ID 5417","308824173","None","None","None","0","ghet","2019-09-21"),
("178","Associate","Ms","Nemie","Mosteiro","Manalo","Female","Widower","1964-06-06","Cagayancillo","None","Matahimik","Puerto Princesa City","Palawan","5300","Bucana","Matahimik","Puerto Princesa City","Palawan","5300","0","9192980670","None","PRC ID","0","None","None","None","2","ghet","2019-09-21"),
("179","Associate","Ms","Antonette Pearl","Rojas","Merales","Female","Single","1989-10-15","Puerto Princesa City","Purok Bagong Silang","Mangingisda","Puerto Princesa City","Palawan","5300","Purok Bagong Silang","Mangingisda","Puerto Princesa City","Palawan","5300","0","9283377229","None","HDMF ID 1211-0647-93","0","None","None","None","2","ghet","2019-09-21"),
("180","Associate","Ms","Mary Joyce","Coching","Miraflores","Female","Single","1992-09-10","Dumaran, Palawan","kasoy Rd.","San Jose","Puerto Princesa City","Palawan","5300","Kasoy Rd.","San Jose","Puerto Princesa City","Palawan","5300","0","9460851916","None","TIN ID ","325182744","None","None","None","1","ghet","2019-10-05"),
("181","Associate","Mr","Joel","Lacierda","Mirasol","Male","Married","1976-11-07","Dipolog, City","None","Bagong Sikat","Puerto Princesa City","Palawan","5300","None","Bagong Sikat","Puerto Princesa City","Palawan","5300","0","9461585960","None","Company ID 5311","188380068","Jovelyn","T","Mirasol","0","ghet","2019-10-05"),
("182","Associate","Ms","Terese Angelica ","Nale","Montero","Female","Married","1989-11-29","Cuyo, Palawan","None","Irawan","Puerto Princesa City","Palawan","5300","None","Irawan","Puerto Princesa City","Palawan","5300","0","9957902624","teresaangelicamontero@yahoo.com","Company ID 154099484","308046995","Alven","L","Montero","2","ghet","2019-10-05"),
("183","Associate","Mr","Aquillo Jr","Damarillo","Namoc","Male","Married","1972-08-20","Malaybalay, Bukidnon","Timbancaya Rd","Bancao-Bancao","Puerto Princesa City","Palawan","5300","Timbancaya Rd","Bancao-Bancao","Puerto Princesa City","Palawan","5300","0","9178811115","junamoc@yahoo.com","TIN & SSS","920632411","Ma. Rosalinda","T","Namoc","2","ghet","2019-10-05"),
("184","Associate","Ms","Rotchelen Love","Pagaran","Napone","Female","Single","1987-09-19","Roxas, Palawan","None","San Pedro","Puerto Princesa City","Palawan","5300","None","San Pedro","Puerto Princesa City","Palawan","5300","0","9066375242","rotchelenlove.napone.bayanedge@gmail.com","Company ID 2014-04","280836297","None","None","None","0","ghet","2019-10-05"),
("185","Associate","Ms","Rina","Zamora","Olinares","Female","Single","1992-08-29","Dumaran, Palawan","Libis Rd, Bountiful St","San Pedro","Puerto Princesa City","Palawan","5300","Libis Rd, Bountiful St ","San Pedro","Puerto Princesa City","Palawan","5300","0","9103143027","None","UMID ID 0111-4142027","324529744","None","None","None","2","ghet","2019-10-05"),
("186","Associate","Ms","Chona","Bacaltos","Pacaldo","Female","Single","1983-05-07","New Cuyo, Roxas Palawan","Wescom Rd","San Pedro","Puerto Princesa City","Palawan","5300","None","New Cuyo","Roxas","Palawan","5318","0","9467129201","None","Company ID 012","318910598","None","None","None","0","ghet","2019-10-05"),
("187","Regular","Mr","Melchor","Mucho","Briones","Male","Married","1971-01-06","Puerto Princesa City","N/A","Isumbo","Sofronio EspaÃ±ola","Palawan","5304","N/A","Isumbo","Sofronio EspaÃ±ola","Palawan","5304","0","9355314681","kingmelchor@rocketmail.com","PRC 0003685","183092805","Lerma","A","Briones","3","ghet","2019-11-09"),
("188","Regular","Mr","Oliver","Macabio","Dumaliw","Male","Single","1994-10-30","Narra, Palawan","N/A","San Jose","Puerto Princesa City","Palawan","5300","N/A","Poblacion","Bataraza","Palawan","5306","0","9179653510","dumaliwoliver@gmail.com","PHIC ID 09-050521887","460459761","N/A","N/A","N/A","0","ghet","2019-11-09"),
("189","Regular","Ms","Ruby","Serafica","Socrates","Female","Single","1968-09-09","Puerto Princesa City","Malaipit","Poblacion","Taytay","Palawan","5312","Malaipit","Poblacion","Taytay","Palawan","5312","0","9178140968","None","N/A","0","None","None","None","0","ghet","2019-11-09"),
("190","Regular","Ms","Gina","Serafica","Socrates","Female","Single","1964-02-22","Puerto Princesa City","PCDO,Capitol BLDG.","Tanglaw","Puerto Princesa City","Palawan","5300","# 3 Bliss","Sta. Lucia","Puerto Princesa City","Palawan","5300","0","9178162264","gina_socrates@yahoo.com","N/A","0","None","None","None","0","ghet","2019-11-09"),
("191","Regular","Mr","Chito Ramon","Salapare","Federico","Male","Married","1956-02-12","Tigaom, Cam. Sur","Venturillo Road 4, BM Road","San Pedro","Puerto Princesa City","Palawan","5300","Venturillo Road 4, BM Road","San Pedro","Puerto Princesa City","Palawan","5300","0","9105309304","chitosfederico@gmail.com","None","110615341","Rebecca","Rodriguez","Federico","1","ghet","2019-11-09"),
("192","Associate","Ms","Almalyn","Fontanilla","Vinluan","Female","Married","1982-02-21","Burirao Narra Palawan","None","Sta. Monica","Puerto Princesa City","Palawan","5300","None","Sta. Monica","Puerto Princesa City","Palawan","5300","0","9198342860","None","PRC 0919619","318192368","Edgar","None","Gasardo","0","ghet","2019-11-09"),
("193","Regular","Mr","Benrose","Mucho","Briones","Male","Married","1974-10-19","Narra, Palawan","None","Burirao","Narra","Palawan","5303","None","Burirao","Narra","Palawan","5303","0","0","None","UMID","919596046","None","None","none","1","ghet","2019-12-21"),
("194","Regular","Mr","Robert Johann","CastaÃ±os","Espina","Male","Single","1958-11-23","Cagayan de Oro","Alta Homes","San Jose","Puerto Princesa City","Palawan","5300","Alta Homes","San Jose","Puerto Princesa City","Palawan","5300","0","0","sonny_espina@yahoo.com","Passport 590907614","0","None","None","None","0","ghet","2019-12-21"),
("195","Regular","Ms","Norele","Lagura","Telio","Female","Widower","1967-01-19","Sara, Ilo-Ilo","Philinvest Wescom Rd.","San Miguel","Puerto Princesa City","Palawan","5300","Philinvest Wescom Rd.","San Miguel","Puerto Princesa City","Palawan","5300","0","9122536320","None","SSS 0435242404","316143468","None","None","None","2","ghet","2019-12-21");




CREATE TABLE `m_savings` (
  `tx_no` int(11) NOT NULL AUTO_INCREMENT,
  `member_code` int(10) NOT NULL,
  `amount` double NOT NULL,
  `account_tag` varchar(20) NOT NULL,
  `transaction` varchar(30) NOT NULL,
  `trans_date` date NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `remarks` varchar(300) NOT NULL,
  `update_by` varchar(20) NOT NULL,
  PRIMARY KEY (`tx_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `m_shares` (
  `tx_no` int(11) NOT NULL AUTO_INCREMENT,
  `member_code` int(10) NOT NULL,
  `amount` double NOT NULL,
  `account_tag` varchar(20) NOT NULL,
  `transaction` varchar(30) NOT NULL,
  `trans_date` date NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `remarks` varchar(300) NOT NULL,
  `update_by` varchar(20) NOT NULL,
  PRIMARY KEY (`tx_no`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;


INSERT INTO m_shares VALUES
("1","2","100000","cash_receipts","capital_shares","0000-00-00","2019-12-21","15:18:50","","ghet"),
("2","53","50000","cash_receipts","capital_shares","0000-00-00","2019-12-21","15:21:23","","ghet"),
("3","146","100000","cash_receipts","capital_shares","0000-00-00","2019-12-21","15:22:31","","ghet"),
("4","3","150000","cash_receipts","capital_shares","0000-00-00","2019-12-21","15:23:18","","ghet"),
("5","4","100000","cash_receipts","capital_shares","0000-00-00","2019-12-21","15:24:50","","ghet"),
("6","145","50000","cash_receipts","capital_shares","0000-00-00","2019-12-21","15:25:14","","ghet"),
("7","5","100000","cash_receipts","capital_shares","0000-00-00","2019-12-21","15:25:38","","ghet"),
("8","144","50000","cash_receipts","capital_shares","0000-00-00","2019-12-21","15:26:34","","ghet"),
("9","187","100000","cash_receipts","capital_shares","0000-00-00","2019-12-21","15:27:09","","ghet"),
("10","193","25000","cash_receipts","capital_shares","0000-00-00","2019-12-21","15:27:27","","ghet"),
("11","152","25000","cash_receipts","capital_shares","0000-00-00","2019-12-21","15:28:58","","ghet"),
("12","6","100000","cash_receipts","capital_shares","0000-00-00","2019-12-21","15:29:34","","ghet"),
("13","188","25000","cash_receipts","capital_shares","0000-00-00","2019-12-21","15:49:18","","ghet"),
("14","37","100000","cash_receipts","capital_shares","0000-00-00","2019-12-21","15:49:43","","ghet"),
("15","7","75000","cash_receipts","capital_shares","0000-00-00","2019-12-21","16:03:14","11/15/19","ghet"),
("16","8","100000","cash_receipts","capital_shares","0000-00-00","2019-12-21","16:04:06","","ghet"),
("17","9","100000","cash_receipts","capital_shares","0000-00-00","2019-12-21","16:04:30","","ghet"),
("18","191","28000","cash_receipts","capital_shares","0000-00-00","2019-12-21","16:16:03","","ghet"),
("19","12","100000","cash_receipts","capital_shares","0000-00-00","2019-12-21","16:16:26","","ghet"),
("20","11","270000","cash_receipts","capital_shares","0000-00-00","2019-12-21","16:18:01","","ghet"),
("21","10","28000","cash_receipts","capital_shares","0000-00-00","2019-12-21","16:18:23","","ghet"),
("22","15","100000","cash_receipts","capital_shares","0000-00-00","2019-12-21","16:24:22","","ghet"),
("23","13","100000","cash_receipts","capital_shares","0000-00-00","2019-12-21","16:24:45","","ghet"),
("24","14","258000","cash_receipts","capital_shares","0000-00-00","2019-12-21","16:25:05","","ghet"),
("25","39","25000","cash_receipts","capital_shares","0000-00-00","2019-12-21","16:25:29","","ghet"),
("26","16","100000","cash_receipts","capital_shares","0000-00-00","2019-12-21","16:25:54","","ghet"),
("27","17","102750","cash_receipts","capital_shares","0000-00-00","2019-12-21","16:40:16","","ghet"),
("28","18","100000","cash_receipts","capital_shares","0000-00-00","2019-12-21","17:50:59","","ghet"),
("29","38","25000","cash_receipts","capital_shares","0000-00-00","2019-12-21","17:51:44","","ghet"),
("30","19","108000","cash_receipts","capital_shares","0000-00-00","2019-12-21","17:52:06","","ghet"),
("31","20","123000","cash_receipts","capital_shares","0000-00-00","2019-12-21","17:52:26","","ghet"),
("32","21","108000","cash_receipts","capital_shares","0000-00-00","2019-12-21","17:52:45","","ghet"),
("33","22","123000","cash_receipts","capital_shares","0000-00-00","2019-12-21","17:53:07","","ghet"),
("34","147","25000","cash_receipts","capital_shares","0000-00-00","2019-12-21","17:53:24","","ghet"),
("35","35","25000","cash_receipts","capital_shares","0000-00-00","2019-12-21","17:54:08","","ghet"),
("36","1","51000","cash_receipts","capital_shares","0000-00-00","2019-12-21","17:54:29","","ghet"),
("37","23","25000","cash_receipts","capital_shares","0000-00-00","2019-12-21","17:55:02","","ghet"),
("38","23","75000","cash_receipts","capital_shares","0000-00-00","2019-12-21","17:56:23","","ghet"),
("39","143","25000","cash_receipts","capital_shares","0000-00-00","2019-12-21","17:56:40","","ghet");




CREATE TABLE `user_access` (
  `count` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `a1` tinyint(1) NOT NULL,
  `a2` tinyint(1) NOT NULL,
  `a3` tinyint(1) NOT NULL,
  `b1` int(1) NOT NULL,
  `b2` tinyint(1) NOT NULL,
  `b3` tinyint(1) NOT NULL,
  `b4` tinyint(1) NOT NULL,
  `b5` tinyint(1) NOT NULL,
  `c1` tinyint(1) NOT NULL,
  `c2` tinyint(1) NOT NULL,
  `c3` tinyint(1) NOT NULL,
  `d1` tinyint(1) NOT NULL,
  `d2` tinyint(1) NOT NULL,
  `d3` tinyint(1) NOT NULL,
  `e1` tinyint(1) NOT NULL,
  `z1` tinyint(1) NOT NULL,
  `z2` tinyint(1) NOT NULL,
  `z3` tinyint(1) NOT NULL,
  `z4` tinyint(1) NOT NULL,
  `z5` tinyint(1) NOT NULL,
  `z6` tinyint(1) NOT NULL,
  `z7` tinyint(1) NOT NULL,
  `z8` tinyint(1) NOT NULL,
  `z9` tinyint(1) NOT NULL,
  `z10` tinyint(1) NOT NULL,
  `z11` tinyint(1) NOT NULL,
  PRIMARY KEY (`count`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO user_access VALUES
("1","admin","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1"),
("2","ghet","1","1","1","1","1","1","1","1","1","1","1","1","1","1","0","1","1","1","1","0","0","0","1","1","0","1"),
("3","queen","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","0","1","1","1","1","1");




CREATE TABLE `user_positions` (
  `position` int(11) NOT NULL AUTO_INCREMENT,
  `pos_description` varchar(50) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`position`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


INSERT INTO user_positions VALUES
("1","Cashier","admin","2019-09-13"),
("2","Treasurer","admin","2019-09-13"),
("3","General Manager","admin","2019-09-13"),
("4","Accountant","admin","2019-09-13"),
("5","Credit Officer","admin","2019-09-13");




CREATE TABLE `users` (
  `user_count` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `position` int(2) NOT NULL,
  `department` varchar(30) NOT NULL,
  `company` varchar(5) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_disable` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_count`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO users VALUES
("1","admin","e10adc3949ba59abbe56e057f20f883e","Admin","Admin","Admin","1","","","0000-00-00","00:00:00","","1","0"),
("2","ghet","e10adc3949ba59abbe56e057f20f883e","Rodelyn","Castro","DaÃ±as","5","Loans","PPCC","2019-09-13","18:01:14","admin","0","0"),
("3","queen","e10adc3949ba59abbe56e057f20f883e","Mary Queen","Evina","Rodriguez","1","Cash","PPCC","2019-09-16","18:13:03","admin","0","0");


