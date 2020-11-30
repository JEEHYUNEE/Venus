-- --------------------------------------------------------
-- 호스트:                          localhost
-- 서버 버전:                        10.4.14-MariaDB - mariadb.org binary distribution
-- 서버 OS:                        Win64
-- HeidiSQL 버전:                  11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 테이블 sstyler7.administrator 구조 내보내기
CREATE TABLE IF NOT EXISTS `administrator` (
  `adminId` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `nameEng` varchar(50) DEFAULT NULL,
  `rrn` varchar(50) DEFAULT '-',
  `enteredDate` date DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `buseo` varchar(50) DEFAULT NULL,
  `zikwi` varchar(50) DEFAULT NULL,
  `zikcheck` varchar(50) DEFAULT NULL,
  `zikgeop` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `emergencyContact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT '//',
  `profileImg` varchar(50) DEFAULT NULL,
  `authority` varchar(50) DEFAULT NULL,
  `workingStatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.administrator:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` (`adminId`, `password`, `name`, `nameEng`, `rrn`, `enteredDate`, `birthDate`, `buseo`, `zikwi`, `zikcheck`, `zikgeop`, `phone`, `emergencyContact`, `email`, `address`, `profileImg`, `authority`, `workingStatus`) VALUES
	('1234', '1234', '테스트', '', '-', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '//', NULL, '회계권한', '병가');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;

-- 테이블 sstyler7.buseo 구조 내보내기
CREATE TABLE IF NOT EXISTS `buseo` (
  `buseoId` int(11) NOT NULL AUTO_INCREMENT,
  `buseoName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`buseoId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.buseo:~2 rows (대략적) 내보내기
/*!40000 ALTER TABLE `buseo` DISABLE KEYS */;
INSERT INTO `buseo` (`buseoId`, `buseoName`) VALUES
	(1, '부서1'),
	(2, '부서2');
/*!40000 ALTER TABLE `buseo` ENABLE KEYS */;

-- 테이블 sstyler7.certificate 구조 내보내기
CREATE TABLE IF NOT EXISTS `certificate` (
  `certificateNum` int(10) NOT NULL AUTO_INCREMENT,
  `userId` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `etc` varchar(255) NOT NULL,
  `situation` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`certificateNum`),
  KEY `FK_certificate_member` (`userId`),
  CONSTRAINT `FK_certificate_member` FOREIGN KEY (`userId`) REFERENCES `member` (`memberId`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.certificate:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `certificate` DISABLE KEYS */;
/*!40000 ALTER TABLE `certificate` ENABLE KEYS */;

-- 테이블 sstyler7.company 구조 내보내기
CREATE TABLE IF NOT EXISTS `company` (
  `companyId` varchar(50) NOT NULL,
  `companyCode` int(11) NOT NULL AUTO_INCREMENT,
  `crn` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `companyName` varchar(50) DEFAULT NULL,
  `ceoName` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT '//',
  `managerName` varchar(50) DEFAULT NULL,
  `managerEmail` varchar(50) DEFAULT NULL,
  `managerPhone` varchar(50) DEFAULT NULL,
  `uptaeId` int(11) DEFAULT NULL,
  `guinId` int(11) DEFAULT NULL,
  `homepageUrl` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`companyId`),
  UNIQUE KEY `companyCode` (`companyCode`),
  KEY `FK_company_uptae` (`uptaeId`),
  KEY `FK_company_guin` (`guinId`),
  CONSTRAINT `FK_company_guin` FOREIGN KEY (`guinId`) REFERENCES `guin` (`guinId`),
  CONSTRAINT `FK_company_uptae` FOREIGN KEY (`uptaeId`) REFERENCES `uptae` (`uptaeId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.company:~2 rows (대략적) 내보내기
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` (`companyId`, `companyCode`, `crn`, `password`, `companyName`, `ceoName`, `phone`, `fax`, `address`, `managerName`, `managerEmail`, `managerPhone`, `uptaeId`, `guinId`, `homepageUrl`) VALUES
	('test', 1, '', '', '테스트기업', '이민영', '', '', '//', '', '', '', NULL, NULL, ''),
	('test2', 2, '', '', '테스트2기업', '', '', '', '05003/서울 광진구 광나루로 341/1234', '', '', '', NULL, NULL, ''),
	('test3', 3, NULL, NULL, '테스트3기업', NULL, NULL, NULL, '//', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;

-- 테이블 sstyler7.consult 구조 내보내기
CREATE TABLE IF NOT EXISTS `consult` (
  `consultNum` int(10) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `situation` varchar(255) NOT NULL,
  `answer` text DEFAULT NULL,
  PRIMARY KEY (`consultNum`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.consult:~7 rows (대략적) 내보내기
/*!40000 ALTER TABLE `consult` DISABLE KEYS */;
INSERT INTO `consult` (`consultNum`, `userName`, `email`, `type`, `content`, `date`, `situation`, `answer`) VALUES
	(1, '김지현', 'jeehyunee1@naver.com', '상담', '너무어려워,,,', '2020-10-07', '처리', 'ㄴㅇㄻㄴㅇㄻㄴㅇㄹ'),
	(2, '킴지현', 'jeehyunhalu@gmail.com', '불편신고', '어려운단어가 너무 많아요ㅋㅋ', '2020-10-07', '처리', 'fgdgdsgdfsg3e'),
	(3, '이민영', 'pre106879@naver.com', '상담', 'ㅋㅋㅋ', '2020-10-15', '처리', 'ddd'),
	(4, 'test', 'pre106879@naver.com', '불편신고', '', '0000-00-00', '처리', '1231412321asdas'),
	(5, 'ㅋㅋㅋㅋ', 'pre106879@naver.com', '', '', '0000-00-00', '처리', '1231412321asdas'),
	(6, 'dd', 'pre106879@naver.com', '', '', '0000-00-00', '처리', '1231412321asdas'),
	(7, 'dd', 'pre106879@naver.com', '', '', '0000-00-00', '처리', '1231412321asdas');
/*!40000 ALTER TABLE `consult` ENABLE KEYS */;

-- 테이블 sstyler7.deductible 구조 내보내기
CREATE TABLE IF NOT EXISTS `deductible` (
  `deductibleId` int(11) NOT NULL AUTO_INCREMENT,
  `deductibleName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`deductibleId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.deductible:~5 rows (대략적) 내보내기
/*!40000 ALTER TABLE `deductible` DISABLE KEYS */;
INSERT INTO `deductible` (`deductibleId`, `deductibleName`) VALUES
	(1, '건강보험'),
	(2, '국민연금'),
	(4, '고용보험'),
	(5, '주민세'),
	(6, '기타공제');
/*!40000 ALTER TABLE `deductible` ENABLE KEYS */;

-- 테이블 sstyler7.faq 구조 내보내기
CREATE TABLE IF NOT EXISTS `faq` (
  `faqNum` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `hit` int(11) NOT NULL,
  `date` date NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`faqNum`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.faq:~3 rows (대략적) 내보내기
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` (`faqNum`, `title`, `content`, `hit`, `date`, `file`) VALUES
	(1, 'faq1+dd', 'faq1++dddd', 37, '2020-10-15', NULL),
	(27, 'faq3', 'faq3gggg', 9, '2020-10-15', '명단.xlsx'),
	(32, '1234', '1234', 19, '2020-10-15', '');
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;

-- 테이블 sstyler7.faq_reply 구조 내보내기
CREATE TABLE IF NOT EXISTS `faq_reply` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `faq_num` int(11) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.faq_reply:~8 rows (대략적) 내보내기
/*!40000 ALTER TABLE `faq_reply` DISABLE KEYS */;
INSERT INTO `faq_reply` (`idx`, `faq_num`, `userId`, `content`, `date`) VALUES
	(7, 1, '123', '1234', '2020-10-23'),
	(9, 1, 'test', '1111', '2020-10-23'),
	(10, 1, 'test', '454aaa', '2020-10-23'),
	(11, 1, '1234', 'sssssddd', '2020-10-23'),
	(12, 1, '1234', 'heee', '2020-10-23'),
	(13, 1, 'test', '1234', '2020-11-04'),
	(14, 1, 'test', '55', '2020-11-04'),
	(15, 1, 'test', '66', '2020-11-04');
/*!40000 ALTER TABLE `faq_reply` ENABLE KEYS */;

-- 테이블 sstyler7.guin 구조 내보내기
CREATE TABLE IF NOT EXISTS `guin` (
  `guinId` int(11) NOT NULL AUTO_INCREMENT,
  `guinName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`guinId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.guin:~2 rows (대략적) 내보내기
/*!40000 ALTER TABLE `guin` DISABLE KEYS */;
INSERT INTO `guin` (`guinId`, `guinName`) VALUES
	(1, '기획/전략'),
	(2, '총무/인사/법무');
/*!40000 ALTER TABLE `guin` ENABLE KEYS */;

-- 테이블 sstyler7.jikjong 구조 내보내기
CREATE TABLE IF NOT EXISTS `jikjong` (
  `jikjongId` int(11) NOT NULL AUTO_INCREMENT,
  `jikjongName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`jikjongId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.jikjong:~13 rows (대략적) 내보내기
/*!40000 ALTER TABLE `jikjong` DISABLE KEYS */;
INSERT INTO `jikjong` (`jikjongId`, `jikjongName`) VALUES
	(1, '경영/사무'),
	(2, '영업/고객상담'),
	(3, '생산/제조'),
	(4, 'IT/인터넷'),
	(5, '전문직'),
	(6, '교육'),
	(7, '미디어'),
	(8, '특수계층/공공'),
	(9, '건설'),
	(10, '유통/무역'),
	(11, '서비스'),
	(12, '디자인'),
	(13, '의료');
/*!40000 ALTER TABLE `jikjong` ENABLE KEYS */;

-- 테이블 sstyler7.jobinfo 구조 내보내기
CREATE TABLE IF NOT EXISTS `jobinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyCode` int(11) DEFAULT NULL,
  `companyName` varchar(255) NOT NULL,
  `workPosition` varchar(255) NOT NULL,
  `workPlace` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `subRegion` varchar(255) NOT NULL,
  `jikjong` varchar(255) NOT NULL,
  `applyNumber` varchar(255) NOT NULL,
  `dueDate` date NOT NULL,
  `date` date NOT NULL,
  `contents` text NOT NULL DEFAULT '',
  `managerName` varchar(255) NOT NULL,
  `managerPhone` varchar(255) NOT NULL,
  `managerEmail` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_jobinfor_company` (`companyCode`),
  CONSTRAINT `FK_jobinfor_company` FOREIGN KEY (`companyCode`) REFERENCES `company` (`companyCode`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.jobinfo:~2 rows (대략적) 내보내기
/*!40000 ALTER TABLE `jobinfo` DISABLE KEYS */;
INSERT INTO `jobinfo` (`id`, `companyCode`, `companyName`, `workPosition`, `workPlace`, `region`, `subRegion`, `jikjong`, `applyNumber`, `dueDate`, `date`, `contents`, `managerName`, `managerPhone`, `managerEmail`, `status`) VALUES
	(31, 1, '테스트기업', '테스트기업-근무처', '화양동', '서울특별시', '광진구', '경영/사무', '50', '2020-10-15', '2020-11-04', '<p style="text-align: center; "><span style="background-color: rgb(255, 255, 0);">구인구직</span></p><p style="text-align: center;">안녕하세요 사람 구합니다</p><p style="text-align: center;">많이 지원해주세요</p><p style="text-align: center;">- 테스트기업-</p>', '이민영', '01090382048', 'pre106879@naver.com', NULL),
	(32, 3, '테스트3기업', '근무처', '근무지', '서울특별시', '화양동', '교육', '11', '2020-11-30', '2020-11-04', '<p style="text-align: right;"><span style="background-color: rgb(255, 255, 0);">채용공고</span></p>', '김지현', '', 'pre106879@naver.com', NULL);
/*!40000 ALTER TABLE `jobinfo` ENABLE KEYS */;

-- 테이블 sstyler7.member 구조 내보내기
CREATE TABLE IF NOT EXISTS `member` (
  `memberId` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT '//',
  `profileImg` varchar(50) DEFAULT NULL,
  `hopeArea` varchar(50) DEFAULT NULL,
  `hopeField` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`memberId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.member:~5 rows (대략적) 내보내기
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`memberId`, `password`, `name`, `email`, `birthDate`, `phone`, `address`, `profileImg`, `hopeArea`, `hopeField`) VALUES
	('1111', '', '', '', '0000-00-00', '', '//', '/venus/uploads/member-1111.jpg', NULL, NULL),
	('12', '12', '12', '', NULL, '', '//', NULL, NULL, NULL),
	('1234', '1234', '', '', NULL, '', '//', NULL, NULL, NULL),
	('1234aa', '1234aa', '1234aa', '', NULL, '', '//', NULL, NULL, NULL),
	('test', 'test', '아이린', '', '0000-00-00', '', '//', '/venus/uploads/member-test.jpg', NULL, NULL),
	('XXX', NULL, NULL, NULL, NULL, NULL, '//', NULL, NULL, NULL);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

-- 테이블 sstyler7.membertype 구조 내보내기
CREATE TABLE IF NOT EXISTS `membertype` (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`typeId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.membertype:~2 rows (대략적) 내보내기
/*!40000 ALTER TABLE `membertype` DISABLE KEYS */;
INSERT INTO `membertype` (`typeId`, `typeName`) VALUES
	(1, '일반정규'),
	(2, '아르바이트'),
	(3, '퇴사회원');
/*!40000 ALTER TABLE `membertype` ENABLE KEYS */;

-- 테이블 sstyler7.news 구조 내보내기
CREATE TABLE IF NOT EXISTS `news` (
  `newsNum` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `hit` int(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`newsNum`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.news:~2 rows (대략적) 내보내기
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`newsNum`, `title`, `content`, `hit`, `date`) VALUES
	(1, '취업뉴스1', '취업뉴스1ㄴㄴㄴ', 1, '2020-10-15'),
	(2, '취업뉴스2', '취업뉴스2', 5, '2020-10-12');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- 테이블 sstyler7.notice 구조 내보내기
CREATE TABLE IF NOT EXISTS `notice` (
  `noticeNum` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `hit` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`noticeNum`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.notice:~1 rows (대략적) 내보내기
/*!40000 ALTER TABLE `notice` DISABLE KEYS */;
INSERT INTO `notice` (`noticeNum`, `title`, `content`, `hit`, `date`) VALUES
	(7, '1234', '1234', 2, '2020-10-15');
/*!40000 ALTER TABLE `notice` ENABLE KEYS */;

-- 테이블 sstyler7.payment 구조 내보내기
CREATE TABLE IF NOT EXISTS `payment` (
  `paymentId` int(11) NOT NULL AUTO_INCREMENT,
  `paymentName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`paymentId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.payment:~8 rows (대략적) 내보내기
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` (`paymentId`, `paymentName`) VALUES
	(1, '기본급'),
	(3, '상여금'),
	(4, '직무수당'),
	(5, '의료비'),
	(6, '연차수당'),
	(7, '교통비'),
	(8, '야간수당'),
	(9, '성과급'),
	(10, '식대');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;

-- 테이블 sstyler7.qna 구조 내보내기
CREATE TABLE IF NOT EXISTS `qna` (
  `qnaNum` int(10) NOT NULL AUTO_INCREMENT,
  `userId` varchar(502) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `hit` int(10) NOT NULL,
  `date` date NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `answerCheck` varchar(10) NOT NULL,
  PRIMARY KEY (`qnaNum`),
  KEY `FK_qna_member` (`userId`),
  CONSTRAINT `FK_qna_member` FOREIGN KEY (`userId`) REFERENCES `member` (`memberId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.qna:~3 rows (대략적) 내보내기
/*!40000 ALTER TABLE `qna` DISABLE KEYS */;
INSERT INTO `qna` (`qnaNum`, `userId`, `title`, `content`, `hit`, `date`, `file`, `answerCheck`) VALUES
	(9, 'test', '샤싣ㅁㅁㅁ', 'ㄱㄱㅁㅁㅁ', 0, '2020-10-15', NULL, 'Y'),
	(20, NULL, '1234', '1234ㅈ', 0, '2020-10-15', NULL, ''),
	(21, NULL, '123111', '11111ㄴㄴㄴㄴ', 0, '2020-10-15', '업로드양식1601953021.xls', 'N');
/*!40000 ALTER TABLE `qna` ENABLE KEYS */;

-- 테이블 sstyler7.qna_answer 구조 내보내기
CREATE TABLE IF NOT EXISTS `qna_answer` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `qna_num` int(11) NOT NULL,
  `manager` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `hit` int(11) NOT NULL,
  `date` date NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idx`),
  KEY `FK_qna_answer_qna` (`qna_num`),
  CONSTRAINT `FK_qna_answer_qna` FOREIGN KEY (`qna_num`) REFERENCES `qna` (`qnaNum`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.qna_answer:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `qna_answer` DISABLE KEYS */;
INSERT INTO `qna_answer` (`idx`, `qna_num`, `manager`, `title`, `content`, `hit`, `date`, `file`) VALUES
	(12, 9, '관리자', '111', '1111', 0, '2020-10-15', 'PstallSetup.exe');
/*!40000 ALTER TABLE `qna_answer` ENABLE KEYS */;

-- 테이블 sstyler7.qna_reply 구조 내보내기
CREATE TABLE IF NOT EXISTS `qna_reply` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `qna_num` int(11) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idx`),
  KEY `FK_qna_reply_qna` (`qna_num`),
  CONSTRAINT `FK_qna_reply_qna` FOREIGN KEY (`qna_num`) REFERENCES `qna` (`qnaNum`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.qna_reply:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `qna_reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `qna_reply` ENABLE KEYS */;

-- 테이블 sstyler7.region 구조 내보내기
CREATE TABLE IF NOT EXISTS `region` (
  `regionId` int(11) NOT NULL AUTO_INCREMENT,
  `regionName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`regionId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.region:~16 rows (대략적) 내보내기
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` (`regionId`, `regionName`) VALUES
	(1, '서울특별시'),
	(2, '부산광역시'),
	(3, '대구광역시'),
	(4, '인천광역시'),
	(5, '광주광역시'),
	(6, '대전광역시'),
	(7, '울산광역시'),
	(8, '경기도'),
	(9, '강원도'),
	(10, '충청북도'),
	(11, '충청남도'),
	(12, '전라북도'),
	(13, '전라남도'),
	(14, '경상북도'),
	(15, '경상남도'),
	(16, '제주도');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;

-- 테이블 sstyler7.regularmember 구조 내보내기
CREATE TABLE IF NOT EXISTS `regularmember` (
  `rmId` int(11) NOT NULL AUTO_INCREMENT,
  `memberId` varchar(50) DEFAULT NULL,
  `jobinforCode` int(11) DEFAULT NULL,
  `companyCode` int(11) DEFAULT NULL,
  `buseoId` int(11) DEFAULT NULL,
  `bankName` varchar(50) DEFAULT NULL,
  `account` varchar(50) DEFAULT NULL,
  `accountHolder` varchar(50) DEFAULT NULL,
  `workPosition` varchar(50) DEFAULT NULL,
  `workPlace` varchar(50) DEFAULT NULL,
  `enteredDate` date DEFAULT NULL,
  `memberType` int(11) DEFAULT NULL,
  PRIMARY KEY (`rmId`),
  KEY `FK_regularmember_membertype` (`memberType`),
  KEY `FK_regularmember_buseo` (`buseoId`),
  KEY `FK_regularmember_member` (`memberId`),
  KEY `FK_regularmember_jobinfor` (`jobinforCode`),
  KEY `FK_regularmember_jobinfor_2` (`companyCode`),
  CONSTRAINT `FK_regularmember_buseo` FOREIGN KEY (`buseoId`) REFERENCES `buseo` (`buseoId`),
  CONSTRAINT `FK_regularmember_jobinfor` FOREIGN KEY (`jobinforCode`) REFERENCES `jobinfo` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_regularmember_jobinfor_2` FOREIGN KEY (`companyCode`) REFERENCES `jobinfo` (`companyCode`) ON DELETE CASCADE,
  CONSTRAINT `FK_regularmember_member` FOREIGN KEY (`memberId`) REFERENCES `member` (`memberId`) ON DELETE CASCADE,
  CONSTRAINT `FK_regularmember_membertype` FOREIGN KEY (`memberType`) REFERENCES `membertype` (`typeId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.regularmember:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `regularmember` DISABLE KEYS */;
INSERT INTO `regularmember` (`rmId`, `memberId`, `jobinforCode`, `companyCode`, `buseoId`, `bankName`, `account`, `accountHolder`, `workPosition`, `workPlace`, `enteredDate`, `memberType`) VALUES
	(23, '12', 31, 1, 1, NULL, NULL, NULL, '테스트기업-근무처', NULL, '0000-00-00', 1);
/*!40000 ALTER TABLE `regularmember` ENABLE KEYS */;

-- 테이블 sstyler7.salary_deductible_history 구조 내보내기
CREATE TABLE IF NOT EXISTS `salary_deductible_history` (
  `dhId` int(11) NOT NULL AUTO_INCREMENT,
  `shId` int(11) DEFAULT NULL,
  `deductibleId` int(11) DEFAULT NULL,
  `cost` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dhId`),
  KEY `FK_salary_deductible_history_salary_history` (`shId`),
  KEY `FK_salary_deductible_history_deductible` (`deductibleId`),
  CONSTRAINT `FK_salary_deductible_history_deductible` FOREIGN KEY (`deductibleId`) REFERENCES `deductible` (`deductibleId`) ON DELETE SET NULL,
  CONSTRAINT `FK_salary_deductible_history_salary_history` FOREIGN KEY (`shId`) REFERENCES `salary_history` (`historyId`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.salary_deductible_history:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `salary_deductible_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary_deductible_history` ENABLE KEYS */;

-- 테이블 sstyler7.salary_history 구조 내보내기
CREATE TABLE IF NOT EXISTS `salary_history` (
  `historyId` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(50) NOT NULL DEFAULT '0',
  `month` varchar(50) NOT NULL DEFAULT '0',
  `memberId` varchar(50) DEFAULT NULL,
  `totalSalary` varchar(50) DEFAULT NULL,
  `totalPayment` varchar(50) DEFAULT NULL,
  `totalDeductible` varchar(50) DEFAULT NULL,
  `paymentId` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`paymentId`)),
  `deductibleId` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`deductibleId`)),
  `account` varchar(50) DEFAULT NULL,
  `accountHolder` varchar(50) DEFAULT NULL,
  `bankName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`historyId`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.salary_history:~1 rows (대략적) 내보내기
/*!40000 ALTER TABLE `salary_history` DISABLE KEYS */;
INSERT INTO `salary_history` (`historyId`, `year`, `month`, `memberId`, `totalSalary`, `totalPayment`, `totalDeductible`, `paymentId`, `deductibleId`, `account`, `accountHolder`, `bankName`) VALUES
	(23, '2020', '9', '1', '2441000', '2487000', '46000', '"[{\\"name\\":\\"1\\",\\"value\\":\\"2000000\\"},{\\"name\\":\\"3\\",\\"value\\":\\"50000\\"},{\\"name\\":\\"4\\",\\"value\\":\\"50000\\"},{\\"name\\":\\"5\\",\\"value\\":\\"10000\\"},{\\"name\\":\\"6\\",\\"value\\":\\"8000\\"},{\\"name\\":\\"7\\",\\"value\\":\\"50000\\"},{\\"name\\":\\"8\\",\\"value\\":\\"10000\\"},{\\"name\\":\\"9\\",\\"value\\":\\"9000\\"},{\\"name\\":\\"10\\",\\"value\\":\\"300000\\"}]"', '"[{\\"name\\":\\"1\\",\\"value\\":\\"10000\\"},{\\"name\\":\\"2\\",\\"value\\":\\"10000\\"},{\\"name\\":\\"4\\",\\"value\\":\\"10000\\"},{\\"name\\":\\"5\\",\\"value\\":\\"10000\\"},{\\"name\\":\\"6\\",\\"value\\":\\"6000\\"}]"', NULL, NULL, NULL),
	(24, '2019', '12', '15', '3491500', '3494000', '2500', '"[{\\"name\\":\\"1\\",\\"value\\":\\"1000000\\"},{\\"name\\":\\"3\\",\\"value\\":\\"15000\\"},{\\"name\\":\\"4\\",\\"value\\":\\"23000\\"},{\\"name\\":\\"5\\",\\"value\\":\\"50000\\"},{\\"name\\":\\"6\\",\\"value\\":\\"900000\\"},{\\"name\\":\\"7\\",\\"value\\":\\"1500000\\"},{\\"name\\":\\"8\\",\\"value\\":\\"2000\\"},{\\"name\\":\\"9\\",\\"value\\":\\"3000\\"},{\\"name\\":\\"10\\",\\"value\\":\\"1000\\"}]"', '"[{\\"name\\":\\"1\\",\\"value\\":\\"500\\"},{\\"name\\":\\"2\\",\\"value\\":\\"500\\"},{\\"name\\":\\"4\\",\\"value\\":\\"500\\"},{\\"name\\":\\"5\\",\\"value\\":\\"500\\"},{\\"name\\":\\"6\\",\\"value\\":\\"500\\"}]"', '01090382048', '이민영', '은행명'),
	(25, '2020', '11', '23', '52000', '102000', '50000', '"[{\\"name\\":\\"1\\",\\"value\\":\\"100000\\"},{\\"name\\":\\"3\\",\\"value\\":\\"1000\\"},{\\"name\\":\\"4\\",\\"value\\":\\"1000\\"},{\\"name\\":\\"5\\",\\"value\\":\\"\\"},{\\"name\\":\\"6\\",\\"value\\":\\"\\"},{\\"name\\":\\"7\\",\\"value\\":\\"\\"},{\\"name\\":\\"8\\",\\"value\\":\\"\\"},{\\"name\\":\\"9\\",\\"value\\":\\"\\"},{\\"name\\":\\"10\\",\\"value\\":\\"\\"}]"', '"[{\\"name\\":\\"1\\",\\"value\\":\\"50000\\"},{\\"name\\":\\"2\\",\\"value\\":\\"\\"},{\\"name\\":\\"4\\",\\"value\\":\\"\\"},{\\"name\\":\\"5\\",\\"value\\":\\"\\"},{\\"name\\":\\"6\\",\\"value\\":\\"\\"}]"', NULL, NULL, NULL);
/*!40000 ALTER TABLE `salary_history` ENABLE KEYS */;

-- 테이블 sstyler7.salary_payment_history 구조 내보내기
CREATE TABLE IF NOT EXISTS `salary_payment_history` (
  `phId` int(11) NOT NULL AUTO_INCREMENT,
  `shId` int(11) DEFAULT NULL,
  `paymentId` int(11) DEFAULT NULL,
  `cost` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`phId`),
  KEY `FK_salary_payment_history_salary_history` (`shId`),
  KEY `FK_salary_payment_history_payment` (`paymentId`),
  CONSTRAINT `FK_salary_payment_history_payment` FOREIGN KEY (`paymentId`) REFERENCES `payment` (`paymentId`) ON DELETE SET NULL,
  CONSTRAINT `FK_salary_payment_history_salary_history` FOREIGN KEY (`shId`) REFERENCES `salary_history` (`historyId`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.salary_payment_history:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `salary_payment_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary_payment_history` ENABLE KEYS */;

-- 테이블 sstyler7.uptae 구조 내보내기
CREATE TABLE IF NOT EXISTS `uptae` (
  `uptaeId` int(11) NOT NULL AUTO_INCREMENT,
  `uptaeName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uptaeId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.uptae:~9 rows (대략적) 내보내기
/*!40000 ALTER TABLE `uptae` DISABLE KEYS */;
INSERT INTO `uptae` (`uptaeId`, `uptaeName`) VALUES
	(1, '업태1'),
	(2, '업태2'),
	(3, '업태3'),
	(4, '업태4'),
	(5, '업태5'),
	(6, '업태6'),
	(7, '업태7'),
	(8, '업태8'),
	(9, '업태9'),
	(10, '업태10');
/*!40000 ALTER TABLE `uptae` ENABLE KEYS */;

-- 테이블 sstyler7.visit 구조 내보내기
CREATE TABLE IF NOT EXISTS `visit` (
  `date` date NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 sstyler7.visit:~27 rows (대략적) 내보내기
/*!40000 ALTER TABLE `visit` DISABLE KEYS */;
INSERT INTO `visit` (`date`, `count`) VALUES
	('2019-11-01', 13),
	('2019-12-01', 15),
	('2020-01-01', 17),
	('2020-02-01', 17),
	('2020-03-01', 15),
	('2020-04-01', 13),
	('2020-05-01', 15),
	('2020-06-01', 17),
	('2020-07-01', 15),
	('2020-08-01', 15),
	('2020-09-01', 15),
	('2020-10-01', 26),
	('2020-10-02', 5),
	('2020-10-03', 7),
	('2020-10-04', 25),
	('2020-10-05', 13),
	('2020-10-06', 17),
	('2020-10-07', 7),
	('2020-10-08', 5),
	('2020-10-09', 4),
	('2020-10-10', 8),
	('2020-10-11', 23),
	('2020-10-12', 24),
	('2020-10-13', 9),
	('2020-10-14', 20),
	('2020-10-15', 13),
	('2020-10-16', 10);
/*!40000 ALTER TABLE `visit` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
