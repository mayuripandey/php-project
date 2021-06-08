-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2015 at 07:09 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dha`
--
CREATE DATABASE IF NOT EXISTS `dha` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dha`;

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE IF NOT EXISTS `activity_log` (
  `activity_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  PRIMARY KEY (`activity_log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(1, 'jkev', '2013-11-18 15:25:33', 'Add Subject RIZAL'),
(2, 'jkev', '2013-11-18 15:27:08', 'Edit Subject RIZAL'),
(3, '', '2013-11-18 15:30:46', 'Edit Subject IS 221'),
(4, '', '2013-11-18 15:31:12', 'Edit Subject IS 222'),
(5, '', '2013-11-18 15:31:24', 'Edit Subject IS 223'),
(6, '', '2013-11-18 15:31:34', 'Edit Subject IS 224'),
(7, '', '2013-11-18 15:31:54', 'Edit Subject IS 227'),
(8, '', '2013-11-18 15:32:37', 'Add Subject IS 411B'),
(9, '', '2013-11-18 15:34:54', 'Edit User jkev'),
(10, 'jkev', '2014-01-17 13:26:18', 'Add User admin'),
(11, 'admin', '2014-12-14 01:43:46', 'Edit Batch AB-1C'),
(12, 'admin', '2014-12-14 01:43:56', 'Edit Batch AB-1C'),
(13, 'admin', '2014-12-17 18:37:45', 'Add Subject IUBCS1001');

-- --------------------------------------------------------

--
-- Table structure for table `case`
--

CREATE TABLE IF NOT EXISTS `case` (
  `caseid` int(11) NOT NULL AUTO_INCREMENT,
  `casecode` varchar(10) NOT NULL,
  `plotid` int(11) NOT NULL,
  `opendate` date NOT NULL,
  `closedate` date DEFAULT NULL,
  `status` enum('open','close','underprocess') NOT NULL,
  `clientid` int(11) NOT NULL,
  `employeeid` int(11) NOT NULL,
  PRIMARY KEY (`caseid`),
  KEY `plotid` (`plotid`,`clientid`),
  KEY `clientid` (`clientid`),
  KEY `employeeid` (`employeeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `case`
--

INSERT INTO `case` (`caseid`, `casecode`, `plotid`, `opendate`, `closedate`, `status`, `clientid`, `employeeid`) VALUES
(2, 'Mul2015002', 1, '2015-01-02', NULL, 'open', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `clientid` int(11) NOT NULL AUTO_INCREMENT,
  `clientcode` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `mobile` text,
  `landline` text,
  `address` text,
  `city` text NOT NULL,
  `picture` text NOT NULL,
  `status` enum('active','deactive') NOT NULL,
  PRIMARY KEY (`clientid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientid`, `clientcode`, `userid`, `fname`, `lname`, `mobile`, `landline`, `address`, `city`, `picture`, `status`) VALUES
(1, 'BWP2015003', 2, 'Junaid Ullah', 'Nadeem', '03136272274', '06272274', 'Aashiana Building chowk munir shaheed', 'Ahmedpur East', 'uploads/14215866402297454bbb0d0134d90.21323902.png', 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `title`, `content`) VALUES
(1, 'Mission', '<pre>\r\n<span style="font-size:16px"><strong>Mission</strong></span></pre>\r\n\r\n<p style="text-align:left"><span style="font-family:arial,helvetica,sans-serif; font-size:medium"><span style="font-size:large">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span>&nbsp; &nbsp;<span style="font-size:18px"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; A leading institution in higher and continuing education commited to engage in quality instruction, development-oriented research sustinable lucrative economic enterprise, and responsive extension and training services through relevant academic programs to empower a human resource that responds effectively to challenges in life and acts as catalyst in the holistoic development of a humane society.&nbsp;</span></p>\r\n\r\n<p style="text-align:left">&nbsp;</p>\r\n'),
(2, 'Vision', '<pre><span style="font-size: large;"><strong>Vision</strong></span></pre>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: large;">&nbsp; Driven by its passion for continous improvement, the State College has to vigorously pursue distinction and proficieny in delivering its statutory functions to the Filipino people in the fields of education, business, agro-fishery, industrial, science and technology, through committed and competent human resource, guided by the beacon of innovation and productivity towards the heights of elevated status. </span><br /><br /></p>'),
(3, 'History', '<pre><span style="font-size: large;">HISTORY &nbsp;</span> </pre>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Carlos Hilado Memorial State College, formerly Paglaum State College, is a public educational institution that aims to provide higher technological, professional and vocational instruction and training in science, agriculture and industrial fields as well as short term or vocational courses. It was Batas Pambansa Bilang 477 which integrated these three institutions of learning: the Negros Occidental College of Arts and Trades (NOCAT) in the Municipality of Talisay, Bacolod City National Trade School (BCNTS) in Alijis, Bacolod City, and the Negros Occidental Provincial Community College (NOPCC) in Bacolod City, into a tertiary state educational institution to be called Paglaum State College. Approved in 1983, the College Charter was implemented effective January 1, 1984, with Mr. Sulpicio P. Cartera as its President. The administrative seat of the first state college in Negros Occidental is located at the Talisay Campus which was originally established as Negros Occidental School of Arts and Trades (NOSAT) under R.A. 848, authored and sponsored by Hon. Carlos Hilado. It occupies a five-hectare land donated by the provincial government under Provincial Board Resolution No. 1163. The renaming of the college to Carlos Hilado Memorial State College was effected by virtue of House Bill No. 7707 authored by then Congressman Jose Carlos V. Lacson of the 3rd Congressional District, Province of Negros Occidental, and which finally became a law on May 5, 1994</p>\r\n<p style="text-align: justify;">&nbsp;</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Talisay Campus. July 1, 1954 marked the formal opening of NOSAT with Mr. Francisco Apilado as its first Superintendent and Mr. Gil H. Tenefrancia as Principal. There were five (5) full time teachers, with an initial enrolment of eighty-nine (89) secondary and trade technical students. The shop courses were General Metal Works, Practical Electricity and Woodworking. The first classes were held temporarily at Talisay Elementary School while the shop buildings and classrooms were under construction. NOSAT was a recipient of FOA-PHILCUA aid in terms of technical books, equipment, tools and machinery. Alijis Campus. The Alijis Campus of the Carlos Hilado Memorial State College is situated in a 5-hectare lot located at Barangay Alijis, Bacolod City. The lot was a donation of the late Dr. Antonio Lizares. The school was formerly established as the Bacolod City National Trade School. The establishment of this trade technical institution is pursuant to R.A. 3886 in 1968, authored by the late Congressman Inocencio V. Ferrer of the second congressional district of the Province of Negros Occidental. Fortune Towne. The Fortune Towne Campus of the Carlos Hilado Memorial State College was originally situated in Negros Occidental High School (NOHS), Bacolod City on a lot owned by the Provincial Government under Provincial Board Resolution No. 91 series of 1970. The school was formerly established as the Negros Occidental Provincial Community College and formally opened on July 13, 1970 with the following course offerings: Bachelor of Arts, Technical Education and Bachelor of Commerce. The initial operation of the school started in July 13, 1970, with an initial enrolment of 209 students. Classes were first housed at the Negros Occidental High School while the first building was constructed. Then Governor Alfredo L. Montelibano spearheaded the first operation of the NOPCC along with the members of the Board of Trustees. In June 1995, the campus transferred to its new site in Fortune Towne, Bacolod City. Binalbagan Campus. On Nov. 24, 2000, the Negros Occidental School of Fisheries (NOSOF) in Binalbagan, Negros Occidental was integrated to the Carlos Hilado Memorial State College system as an external campus by virtue of Resolution No. 46 series of 2000.</p>'),
(4, 'Footer', '<p style="text-align:center">CHMSC Online Learning Managenment System</p>\r\n\r\n<p style="text-align:center">All Rights Reserved &reg;2013</p>\r\n'),
(5, 'Upcoming Events', '<pre>\r\nUP COMING EVENTS</pre>\r\n\r\n<p><strong>&gt;</strong> EXAM</p>\r\n\r\n<p><strong>&gt;</strong> INTERCAMPUS MEET</p>\r\n\r\n<p><strong>&gt;</strong> DEFENSE</p>\r\n\r\n<p><strong>&gt;</strong> ENROLLMENT</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(6, 'Title', '<p><span style="font-family:trebuchet ms,geneva">CHMSC Online Learning Management System</span></p>\r\n'),
(7, 'News', '<pre>\r\n<span style="font-size:medium"><em><strong>Recent News\r\n</strong></em></span></pre>\r\n\r\n<h2><span style="font-size:small">Extension and Community Services</span></h2>\r\n\r\n<p style="text-align:justify">This technology package was promoted by the College of Industrial Technology Unit is an index to offer Practical Skills and Livelihood Training Program particularly to the Ina ngTahanan of Tayabas, Barangay Zone 15, Talisay City, Negros Occidental</p>\r\n\r\n<p style="text-align:justify">The respondent of this technology package were mostly &ldquo;ina&rdquo; or mothers in PurokTayabas. There were twenty mothers who responded to the call of training and enhancing their sewing skills. The beginners projects include an apron, elastics waist skirts, pillow-cover and t-shirt style top. Short sleeve blouses with buttonholes or contoured seaming are also some of the many projects introduced to the mothers. Based on the interview conducted after the culmination activity, the projects done contributed as a means of earning to the respondents.</p>\r\n\r\n<p style="text-align:justify">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; In support to the thrust of the government to improve the health status of neighboring barangays, the Faculty and Staff of CHMSC ECS Fortune Towne, Bacolod City, launched its Medical Mission in Patag, Silay City. It was conducted last March 2010, to address the health needs of the people. A medical consultation is given to the residents of SitioPatag to attend to their health related problems that may need medical treatment. Medical tablets for headache, flu, fever, antibiotics and others were availed by the residents.</p>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n\r\n<p style="text-align:justify">&nbsp;The BAYAN-ANIHAN is a Food Production Program with a battle cry of &ldquo;GOODBYE GUTOM&rdquo;, advocating its legacy &ldquo;Food on the Table for every Filipino Family&rdquo; through backyard gardening. NGO&rsquo;s, governmental organizations, private and public sectors, business sectors are the cooperating agencies that support and facilitate this project and Carlos Hilado Memorial State College (CHMSC) is one of the identified partner school. Being a member institution in advocating its thrust, the school through its Extension and Community Services had conducted capability training workshop along this program identifying two deputy coordinators and trainers last November 26,27 and 28, 2009, with the end in view of implementing the project all throughout the neighboring towns, provinces and regions to help address poverty in the country. Program beneficiaries were the selected families of GawadKalinga (GK) in Hope Village, Brgy. Cabatangan, Talisay City, with 120 families beneficiaries; GK FIAT Village in Silay City with 30 beneficiaries; Bonbon Dream Village brgy. E. Lopez, Silay City with 60 beneficiaries; and respectively Had. Teresita and Had. Carmen in Talisay City, Negros Occidental both with 60 member beneficiaries. This program was introduced to 30 household members with the end in view of alleviating the quality standards of their living.</p>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n\r\n<p style="text-align:justify">The extension &amp; Community Services of the College conducted a series of consultations and meetings with the different local government units to assess technology needs to determines potential products to be developed considering the abundance of raw materials in their respective areas and their product marketability. The project was released in November 2009 in six cities in the province of Negros Occidental, namely San Carlos, Sagay, Silay, Bago, Himamaylan and Sipalay and the Municipality of E. B Magalona</p>\r\n\r\n<p style="text-align:justify">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; The City of San Carlos focused on peanut and fish processing. Sagay and bago focused on meat processing, while Silay City on fish processing. The City of Himamaylan is on sardines, and in Sipalay focused on fish processing specially on their famous BARONGAY product. The municipality of E.B Magalona focused on bangus deboning.</p>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n\r\n<p style="text-align:justify">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; The food technology instructors are tasked to provide the needed skills along with the TLDC Livelihood project that each City is embarking on while the local government units provide the training venue for the project and the training equipment and machine were provided by the Department of Science and Technology.</p>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n'),
(8, 'Announcements', '<pre>\r\n<span style="font-size:medium"><em><strong>Announcements</strong></em></span></pre>\r\n\r\n<p>Examination Period: October 9-11, 2013</p>\r\n\r\n<p>Semestrial Break: October 12- November 3, 2013</p>\r\n\r\n<p>FASKFJASKFAFASFMFAS</p>\r\n\r\n<p>GASGA</p>\r\n'),
(10, 'Calendar', '<pre style="text-align:center">\r\n<span style="font-size:medium"><strong>&nbsp;CALENDAR OF EVENT</strong></span></pre>\r\n\r\n<table align="center" cellpadding="0" cellspacing="0" style="line-height:1.6em; margin-left:auto; margin-right:auto">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>First Semester &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>June 10, 2013 to October 11, 2013&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Semestral Break</p>\r\n			</td>\r\n			<td>\r\n			<p>Oct. 12, 2013 to November 3, 2013</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Second Semester</p>\r\n			</td>\r\n			<td>\r\n			<p>Nov. 5, 2013 to March 27, 2014</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Summer Break</p>\r\n			</td>\r\n			<td>\r\n			<p>March 27, 2014 to April 8, 2014</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Summer</p>\r\n			</td>\r\n			<td>\r\n			<p>April 8 , 2014 to May 24, 2014</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<table cellpadding="0" cellspacing="0" style="line-height:1.6em; margin-left:auto; margin-right:auto">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="4">\r\n			<p><strong>June 5, 2013 to October 11, 2013 &ndash; First Semester AY 2013-2014</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 4, 2013 &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Orientation with the Parents of the College&nbsp;Freshmen</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 5</p>\r\n			</td>\r\n			<td>\r\n			<p>First Day of Service</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 5</p>\r\n			</td>\r\n			<td>\r\n			<p>College Personnel General Assembly</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 6,7</p>\r\n			</td>\r\n			<td>\r\n			<p>In-Service Training (Departmental)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 10</p>\r\n			</td>\r\n			<td>\r\n			<p>First Day of Classes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 14</p>\r\n			</td>\r\n			<td>\r\n			<p>Orientation with Students by College/Campus/Department</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 19,20,21</p>\r\n			</td>\r\n			<td>\r\n			<p>Branch/Campus Visit for Administrative / Academic/Accreditation/ Concerns</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="2">\r\n			<p>June</p>\r\n			</td>\r\n			<td>\r\n			<p>Club Organizations (By Discipline/Programs)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Student Affiliation/Induction Programs</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>July</p>\r\n			</td>\r\n			<td>\r\n			<p>Nutrition Month (Sponsor: Laboratory School)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>July 11, 12</p>\r\n			</td>\r\n			<td>\r\n			<p>Long Tests</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>August&nbsp; 8, 9</p>\r\n			</td>\r\n			<td>\r\n			<p>Midterm Examinations</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>August 19</p>\r\n			</td>\r\n			<td>\r\n			<p>ArawngLahi</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>August 23</p>\r\n			</td>\r\n			<td>\r\n			<p>Submission of Grade Sheets for Midterm</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>August</p>\r\n			</td>\r\n			<td>\r\n			<p>Recognition Program (Dean&rsquo;s List)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>August 26</p>\r\n			</td>\r\n			<td>\r\n			<p>National Heroes Day (Regular Holiday)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>August 28, 29, 30</p>\r\n			</td>\r\n			<td>\r\n			<p>Sports and Cultural Meet</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>September 19,20</p>\r\n			</td>\r\n			<td>\r\n			<p>Long Tests</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>October 5</p>\r\n			</td>\r\n			<td>\r\n			<p>Teachers&rsquo; Day / World Teachers&rsquo; Day</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>October 10, 11</p>\r\n			</td>\r\n			<td>\r\n			<p>Final Examination</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>October 12</p>\r\n			</td>\r\n			<td>\r\n			<p>Semestral Break</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<table cellpadding="0" cellspacing="0" style="margin-left:auto; margin-right:auto">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="4">\r\n			<p><strong>Nov. 4, 2013 to March 27, 2014 &ndash; Second Semester AY 2013-2014</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>November 4 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Start of Classes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>November 19, 20, 21, 22</p>\r\n			</td>\r\n			<td>\r\n			<p>Intercampus Sports and Cultural Fest/College Week</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>December 5, 6</p>\r\n			</td>\r\n			<td>\r\n			<p>Long Tests</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>December 19,20</p>\r\n			</td>\r\n			<td>\r\n			<p>Thanksgiving Celebrations</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>December 21</p>\r\n			</td>\r\n			<td>\r\n			<p>Start of Christmas Vacation</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>December 25</p>\r\n			</td>\r\n			<td>\r\n			<p>Christmas Day (Regular Holiday)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>December 30</p>\r\n			</td>\r\n			<td>\r\n			<p>Rizal Day (Regular Holiday)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>January 6, 2014</p>\r\n			</td>\r\n			<td>\r\n			<p>Classes Resume</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>January 9, 10</p>\r\n			</td>\r\n			<td>\r\n			<p>Midterm Examinations</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>January 29</p>\r\n			</td>\r\n			<td>\r\n			<p>Submission of Grades Sheets for Midterm</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>February 13, 14</p>\r\n			</td>\r\n			<td>\r\n			<p>Long Tests</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>March 6, 7</p>\r\n			</td>\r\n			<td>\r\n			<p>Final Examinations (Graduating)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>March 13, 14</p>\r\n			</td>\r\n			<td>\r\n			<p>Final Examinations (Non-Graduating)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>March 17, 18, 19, 20, 21</p>\r\n			</td>\r\n			<td>\r\n			<p>Recognition / Graduation Rites</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>March 27</p>\r\n			</td>\r\n			<td>\r\n			<p>Last Day of Service for Faculty</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 5, 2014</p>\r\n			</td>\r\n			<td>\r\n			<p>First Day of Service for SY 2014-2015</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="0" style="margin-left:auto; margin-right:auto">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="2">\r\n			<p><strong>FLAG RAISING CEREMONY-TALISAY CAMPUS</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>MONTHS &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>UNIT-IN-CHARGE</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June, Sept. and Dec. 2013, March 2014</p>\r\n			</td>\r\n			<td>\r\n			<p>COE</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>July and October 2013, Jan. 2014</p>\r\n			</td>\r\n			<td>\r\n			<p>SAS</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>August and November 2013, Feb. 2014</p>\r\n\r\n			<p>April and May 2014</p>\r\n			</td>\r\n			<td>\r\n			<p>CIT</p>\r\n\r\n			<p>GASS</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(11, 'Directories', '<div class="jsn-article-content" style="text-align: left;">\n<pre>\n<span style="font-size:medium"><em><strong>DIRECTORIES</strong></em></span></pre>\n\n<ul>\n	<li>Office - 495-5560</li>\n	<li>Information Provider - 495-5560</li>\n	</ul>\n</div>\n'),
(12, 'president', '<p>It is my great pleasure and privilege to welcome you to CHMSC&rsquo;s official website. Accept my deep appreciation for continuously taking interest in CHMSC and its programs and activities.<br /> Recently, the challenges of the knowledge era of the 21st Century led me to think very deeply how educational institutions of higher learning must vigorously pursue relevant e<img style="float: left;" src="images/president.jpg" alt="" />ducation to compete with and respond to the challenges of globalization. As an international fellow, I realized that in the face of this globalization and technological advancement, educational institutions are compelled to work extraordinary in educating the youths and enhancing their potentials for gainful employment and realization of their dreams to become effective citizens.<br /><br /> Honored and humbled to be given the opportunity for stewardship of this good College, I am fully aware that the goal is to make CHMSC as the center of excellence or development in various fields. The vision, CHMSC ExCELS: Excellence, Competence and Educational Leadership in Science and Technology is a profound battle cry for each member of CHMSC Community. A CHMSCian must be technologically and academically competent, socially mature, safety conscious with care for the environment, a good citizen and possesses high moral values. The way the College is being managed, the internal and the external culture of all stockholders, and the efforts for quality and excellence will result to the establishment of the good corporate image of the College. The hallmark is reflected as the image of the good institution.<br /><br /> The tasks at hand call for our full cooperation, support and active participation. Therefore, I urge everyone to help me in the crusade to <br /><br /></p>\r\n<p style="text-align: justify;"><span style="line-height: 1.3em;">Provide wider access to CHMSC programs;</span></p>\r\n<p style="text-align: justify;"><span style="line-height: 1.3em;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Harness the potentials of students thru effective teaching and learning methodologies and techniques;</span></p>\r\n<p style="text-align: justify;"><span style="line-height: 1.3em;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Enable CHMSC Environment for All through secure green campus;</span></p>\r\n<p style="text-align: justify;"><span style="line-height: 1.3em;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Advocate green movement, protect intellectual property and stimulate innovation;</span></p>\r\n<p style="text-align: justify;"><span style="line-height: 1.3em;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Promote lifelong learning;</span></p>\r\n<p style="text-align: justify;"><span style="line-height: 1.3em;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Conduct Research and Development for community and poverty alleviation;</span></p>\r\n<p style="text-align: justify;"><span style="line-height: 1.3em;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Share and disseminate knowledge through publication and extension outreach to communities; and</span></p>\r\n<p style="text-align: justify;"><span style="line-height: 1.3em;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;*Strengthen Institute-industry linkages and public-private partnership for mutual interest.</span></p>\r\n<p style="text-align: justify;"><br /><span style="line-height: 1.3em; text-align: justify;">Together, WE can make CHMSC</span></p>\r\n<p style="text-align: justify;"><br /><span style="line-height: 1.3em;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;*A model green institution for Human Resources Development, a builder of human resources in the knowledge era of the 21st Century;</span></p>\r\n<p style="text-align: justify;"><span style="line-height: 1.3em;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; *A center for curricular innovations and research especially in education, technology, engineering, ICT and entrepreneurship; and</span></p>\r\n<p style="text-align: justify;"><span style="line-height: 1.3em;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; *A Provider of quality graduates in professional and technological programs for industry and community.</span></p>\r\n<p style="text-align: justify;"><br /><br /> Dear readers and guests, these are the challenges for every CHMSCian to hurdle and the dreams to realize. This website will be one of the connections with you as we ardently take each step. Feel free to visit often and be kept posted as we continue to work for discoveries and advancement that will bring benefits to the lives of the students, the community, and the world, as a whole.<br /><br /> Warmest welcome and I wish you well!</p>\r\n<p style="text-align: justify;"><br /><br /></p>\r\n<p style="text-align: justify;">RENATO M. SOROLLA, Ph.D.<br />SUC President II</p>'),
(13, 'motto', '<p><strong><span style="color:#FFF0F5"><span style="font-family:arial,helvetica,sans-serif">CHMSC EXCELS:</span></span></strong></p>\r\n\r\n<p><strong><span style="color:#FFF0F5"><span style="font-family:arial,helvetica,sans-serif">Excellence, Competence and Educational</span></span></strong></p>\r\n\r\n<p><strong><span style="color:#FFF0F5"><span style="font-family:arial,helvetica,sans-serif">Leadership in Science and Technology</span></span></strong></p>\r\n'),
(14, 'locations', '<pre>\n<span style="font-size:16px"><strong>Locations</strong></span></pre>\n\n<ul>\n	<li>Lahore</li>\n<li>Karachi</li>\n<li>Islamabad</li>\n<li>Faisalabad</li>\n</ul>\n');

-- --------------------------------------------------------

--
-- Table structure for table `dues`
--

CREATE TABLE IF NOT EXISTS `dues` (
  `duesid` int(11) NOT NULL AUTO_INCREMENT,
  `clientid` int(11) NOT NULL,
  `caseid` int(11) NOT NULL,
  `duestitle` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` enum('recieved','notrecieved') NOT NULL DEFAULT 'notrecieved',
  PRIMARY KEY (`duesid`),
  KEY `clientid` (`clientid`,`caseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dues`
--

INSERT INTO `dues` (`duesid`, `clientid`, `caseid`, `duestitle`, `amount`, `status`) VALUES
(1, 1, 2, '"chai pani"', 1000, 'notrecieved');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `empid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `mobile` text NOT NULL,
  `landline` text NOT NULL,
  `userid` int(11) NOT NULL,
  `picture` text NOT NULL,
  `status` enum('active','deactive') NOT NULL,
  `empcode` varchar(20) NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `fname`, `lname`, `address`, `city`, `mobile`, `landline`, `userid`, `picture`, `status`, `empcode`) VALUES
(1, 'Junaid', 'Ullah', 'AAAAA', 'AAA', '03136272274', '06272274', 0, 'uploads/14215861813084154bbaf05e67975.82463856.png', 'deactive', 'EMP201500000'),
(2, 'Rana', 'aSLAM', 'asdad', '123asdA', 'asdasd', 'asdads', 0, 'uploads/1421586278550254bbaf669966c4.61397390.png', '', 'EMP201500001'),
(3, 'tANVEER', 'Ullah', 'asdadad', 'asdasdasd', 'asdasd', 'ASDSAD', 0, 'uploads/14215866402297454bbb0d0134d90.21323902.png', '', 'EMP201500002'),
(4, 'Junaid', 'Ullah', 'asdasdad', 'asdadad', 'asdad', 'adad', 0, 'uploads/14215870261756754bbb2522dd453.90601807.png', '', 'EMP201500003');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date_start` varchar(100) NOT NULL,
  `date_end` varchar(100) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `teacher_class_id`, `date_start`, `date_end`) VALUES
(12, ' 	  Orientation with the Parents of the College Freshmen', 0, '06/04/2013', '06/04/2013'),
(13, 'Start of Classes', 0, '11/04/2013', '11/04/2013'),
(14, 'Intercampus Sports and Cultural Fest/College Week', 0, '11/19/2013', '11/22/2013'),
(15, 'Long Test', 113, '12/05/2013', '12/06/2013'),
(16, 'Long Test', 0, '12/05/2013', '12/06/2013'),
(17, 'sdasf', 147, '11/16/2013', '11/16/2013');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `fileid` int(11) NOT NULL AUTO_INCREMENT,
  `location` text NOT NULL,
  `type` int(11) NOT NULL,
  `uploaddate` date NOT NULL,
  `caseid` int(11) NOT NULL,
  PRIMARY KEY (`fileid`),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`fileid`, `location`, `type`, `uploaddate`, `caseid`) VALUES
(139, '5456456tyfyty', 2, '2015-01-01', 2),
(140, 'ghjghgj4654', 1, '2015-01-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `filetype`
--

CREATE TABLE IF NOT EXISTS `filetype` (
  `typeid` int(11) NOT NULL AUTO_INCREMENT,
  `typename` text NOT NULL,
  PRIMARY KEY (`typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `filetype`
--

INSERT INTO `filetype` (`typeid`, `typename`) VALUES
(1, 'cover letter of medilinks'),
(2, 'LOF'),
(3, 'undertaking'),
(4, 'affidavit'),
(5, 'verification'),
(6, 'farde malkiyat'),
(7, 'aks'),
(8, 'khasra'),
(9, 'inteqal'),
(10, 'non eccumbrance certificate'),
(11, 'tark e kasht'),
(12, 'registry'),
(13, 'farde malkiyat in favor of dha'),
(14, 'pert sarkar'),
(15, 'cnic landowner'),
(16, 'cnic sponsor');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `membershipid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`membershipid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`membershipid`, `name`, `price`) VALUES
(1, 'basic', 20000),
(3, 'Average', 50000),
(4, 'Advance', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(50) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `message_status` varchar(100) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`, `message_status`) VALUES
(2, 11, 'fasf', '2013-11-13 13:15:47', 42, 'Aladin Cabrera', 'john kevin lorayna', ''),
(4, 71, 'bcjhbcjksdbckldj', '2013-11-25 15:59:13', 71, 'Noli Mendoza', 'Noli Mendoza', 'read'),
(17, 12, 'tst', '2013-12-01 23:38:40', 93, 'Ruby Mae  Morante', 'John Kevin  Lorayna', ''),
(19, 12, 'fasfaf', '2013-12-01 23:56:17', 93, 'Ruby Mae  Morante', 'John Kevin  Lorayna', ''),
(27, 93, 'fa', '2013-12-02 00:01:54', 12, 'John Kevin  Lorayna', 'Ruby Mae  Morante', ''),
(28, 136, 'Submit your classcard', '2014-02-13 13:35:21', 12, 'Jorgielyn Serfino', 'Ruby Mae  Morante', ''),
(29, 24, 'dsffd', '2014-12-27 00:58:51', 32, ' ', ' ', ''),
(30, 27, 'fdghfghfghfhgfhgfhgfhgfhg', '2014-12-27 01:41:41', 32, ' ', ' ', '');

-- --------------------------------------------------------

--
-- Table structure for table `message_sent`
--

CREATE TABLE IF NOT EXISTS `message_sent` (
  `message_sent_id` int(11) NOT NULL AUTO_INCREMENT,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  PRIMARY KEY (`message_sent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `message_sent`
--

INSERT INTO `message_sent` (`message_sent_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`) VALUES
(1, 42, 'sad', '2013-11-12 22:50:05', 42, 'john kevin lorayna', 'john kevin lorayna'),
(2, 11, 'fasf', '2013-11-13 13:15:47', 42, 'Aladin Cabrera', 'john kevin lorayna'),
(3, 12, 'bjhkcbkjsdnckldvls', '2013-11-25 15:58:55', 71, 'Ruby Mae  Morante', 'Noli Mendoza'),
(4, 71, 'bcjhbcjksdbckldj', '2013-11-25 15:59:13', 71, 'Noli Mendoza', 'Noli Mendoza'),
(5, 12, 'test', '2013-11-30 20:54:05', 93, 'Ruby Mae  Morante', 'John Kevin  Lorayna'),
(11, 12, 'tst', '2013-12-01 23:38:40', 93, 'Ruby Mae  Morante', 'John Kevin  Lorayna'),
(12, 12, 'fasfasf', '2013-12-01 23:49:13', 93, 'Ruby Mae  Morante', 'John Kevin  Lorayna'),
(13, 136, 'Submit your classcard', '2014-02-13 13:35:21', 12, 'Jorgielyn Serfino', 'Ruby Mae  Morante'),
(14, 24, 'dsffd', '2014-12-27 00:58:52', 32, ' ', ' '),
(15, 27, 'fdghfghfghfhgfhgfhgfhgfhg', '2014-12-27 01:41:41', 32, ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`) VALUES
(2, 0, 'Add Downloadable Materials file name <b>sss</b>', '2014-01-17 14:35:32', 'downloadable_student.php'),
(3, 167, 'Add Annoucements', '2014-01-17 14:36:32', 'announcements_student.php'),
(4, 0, 'Add Downloadable Materials file name <b>test</b>', '2014-02-13 11:10:56', 'downloadable_student.php'),
(5, 167, 'Add Assignment file name <b>q</b>', '2014-02-13 11:27:59', 'assignment_student.php'),
(6, 0, 'Add Downloadable Materials file name <b>chapter 1</b>', '2014-02-13 12:35:42', 'downloadable_student.php'),
(7, 0, 'Add Downloadable Materials file name <b>q</b>', '2014-02-13 12:53:09', 'downloadable_student.php'),
(8, 0, 'Add Downloadable Materials file name <b>kevi</b>', '2014-02-13 13:31:18', 'downloadable_student.php'),
(9, 185, 'Add Practice Quiz file', '2014-02-13 13:33:27', 'student_quiz_list.php'),
(10, 167, 'Add Annoucements', '2014-02-13 13:45:59', 'announcements_student.php'),
(11, 0, 'Add Downloadable Materials file name <b>q</b>', '2014-02-21 16:43:38', 'downloadable_student.php'),
(12, 0, 'Add Downloadable Materials file name <b>q</b>', '2014-02-21 16:46:18', 'downloadable_student.php'),
(13, 0, 'Add Downloadable Materials file name <b>q</b>', '2014-02-21 16:46:49', 'downloadable_student.php'),
(14, 0, 'Add Downloadable Materials file name <b>q</b>', '2014-02-21 16:52:30', 'downloadable_student.php');

-- --------------------------------------------------------

--
-- Table structure for table `notification_read`
--

CREATE TABLE IF NOT EXISTS `notification_read` (
  `notification_read_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `student_read` varchar(50) NOT NULL,
  `notification_id` int(11) NOT NULL,
  PRIMARY KEY (`notification_read_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `notification_read`
--

INSERT INTO `notification_read` (`notification_read_id`, `student_id`, `student_read`, `notification_id`) VALUES
(1, 113, 'yes', 10),
(2, 113, 'yes', 5),
(3, 113, 'yes', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notification_read_teacher`
--

CREATE TABLE IF NOT EXISTS `notification_read_teacher` (
  `notification_read_teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `student_read` varchar(100) NOT NULL,
  `notification_id` int(11) NOT NULL,
  PRIMARY KEY (`notification_read_teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `notification_read_teacher`
--

INSERT INTO `notification_read_teacher` (`notification_read_teacher_id`, `teacher_id`, `student_read`, `notification_id`) VALUES
(1, 12, 'yes', 14),
(2, 12, 'yes', 13),
(3, 12, 'yes', 12),
(4, 12, 'yes', 11),
(5, 12, 'yes', 10),
(6, 12, 'yes', 9),
(7, 12, 'yes', 8),
(8, 12, 'yes', 7);

-- --------------------------------------------------------

--
-- Table structure for table `plot`
--

CREATE TABLE IF NOT EXISTS `plot` (
  `plotid` int(11) NOT NULL AUTO_INCREMENT,
  `plotcode` varchar(15) NOT NULL,
  `plottype` int(11) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `entrydate` date NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `features` text NOT NULL,
  `picture` mediumtext,
  `status` enum('sold','unsold') NOT NULL,
  `mouza` varchar(30) NOT NULL,
  `Kewat` varchar(20) NOT NULL,
  `khatooni` varchar(20) NOT NULL,
  `khasra` varchar(20) NOT NULL,
  `kanal` float NOT NULL,
  `marla` float NOT NULL,
  PRIMARY KEY (`plotid`),
  UNIQUE KEY `plotcode` (`plotcode`),
  KEY `plottype` (`plottype`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `plot`
--

INSERT INTO `plot` (`plotid`, `plotcode`, `plottype`, `owner`, `location`, `entrydate`, `price`, `views`, `features`, `picture`, `status`, `mouza`, `Kewat`, `khatooni`, `khasra`, `kanal`, `marla`) VALUES
(1, 'MUL2014002', 1, 'Junaid Ullah', 'Aashiana  building chowk munir shaheed railway road', '2015-01-01', 2000000, 0, 'sadad\r\na\r\nd\r\nad\r\n\r\na\r\nd\r\na\r\nd\r\na\r\nd\r\n\r\na', 'uploads/plots/1421736549703154bdfa650e7152.80764824.jpg', 'unsold', '', '111', '11', '22', 5, 2),
(2, 'MUL2014003', 1, 'Jamshed', 'Mohalla shikari plot#778', '2015-01-07', 100204, 0, 'asdsad\r\nsas\r\nd\r\nad\r\n\r\nfdg\r\nd\r\ng\r\ndf\r\ns\r\n\r\nf\r\nsf', 'uploads/plots/1421736549703154bdfa650e7152.80764824.jpg', 'unsold', '', '21', '32', '45', 1, 8),
(3, 'PLOT201500002', 1, 'junaid', 'ijasdasd', '2015-01-20', 225000, 0, 'asdasdyagdasd', 'uploads/plots/1421736549703154bdfa650e7152.80764824.jpg', 'unsold', '125/33', '125/22', '225/78', '1215//55', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `plottype`
--

CREATE TABLE IF NOT EXISTS `plottype` (
  `typeid` int(11) NOT NULL AUTO_INCREMENT,
  `typename` text NOT NULL,
  PRIMARY KEY (`typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `plottype`
--

INSERT INTO `plottype` (`typeid`, `typename`) VALUES
(1, 'residential'),
(2, 'commercial');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Users for Teacher,Student And FM' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `UserName`, `password`) VALUES
(1, 'Junaid Ullah', '123456'),
(2, 'client', 'client'),
(5, 'jaddibaba', 'asdA1123'),
(6, 'jaddibaba', '123456AAAa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(13, 'teph', 'teph', 'Stephanie', 'villanueva'),
(14, 'jkev', 'jkev', 'john kevin', 'lorayna'),
(15, 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE IF NOT EXISTS `user_log` (
  `user_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `user_id`) VALUES
(1, 'admin', '2013-11-01 11:57:33', '2013-11-18 10:33:54', 10),
(2, 'admin', '2013-11-05 09:52:09', '2013-11-18 10:33:54', 10),
(3, 'admin', '2013-11-08 10:41:09', '2013-11-18 10:33:54', 10),
(4, 'admin', '2013-11-12 22:53:05', '2013-11-18 10:33:54', 10),
(5, 'admin', '2013-11-13 07:07:04', '2013-11-18 10:33:54', 10),
(6, 'admin', '2013-11-13 13:07:58', '2013-11-18 10:33:54', 10),
(7, 'admin', '2013-11-13 13:30:45', '2013-11-18 10:33:54', 10),
(8, 'admin', '2013-11-13 15:25:20', '2013-11-18 10:33:54', 10),
(9, 'admin', '2013-11-13 15:46:28', '2013-11-18 10:33:54', 10),
(10, 'admin', '2013-11-13 16:04:10', '2013-11-18 10:33:54', 10),
(11, 'admin', '2013-11-13 17:31:37', '2013-11-18 10:33:54', 10),
(12, 'admin', '2013-11-13 22:47:45', '2013-11-18 10:33:54', 10),
(13, 'admin', '2013-11-14 10:27:06', '2013-11-18 10:33:54', 10),
(14, 'admin', '2013-11-14 10:27:55', '2013-11-18 10:33:54', 10),
(15, 'admin', '2013-11-14 10:38:08', '2013-11-18 10:33:54', 10),
(16, 'admin', '2013-11-14 10:38:09', '2013-11-18 10:33:54', 10),
(17, 'admin', '2013-11-14 10:41:06', '2013-11-18 10:33:54', 10),
(18, 'admin', '2013-11-14 11:44:08', '2013-11-18 10:33:54', 10),
(19, 'admin', '2013-11-14 21:53:56', '2013-11-18 10:33:54', 10),
(20, 'admin', '2013-11-14 22:03:53', '2013-11-18 10:33:54', 10),
(21, 'admin', '2013-11-16 13:40:56', '2013-11-18 10:33:54', 10),
(22, 'admin', '2013-11-18 10:22:07', '2013-11-18 10:33:54', 10),
(23, 'jkev', '2013-11-18 10:33:59', '2014-02-13 11:19:36', 14),
(24, 'jkev', '2013-11-18 15:20:45', '2014-02-13 11:19:36', 14),
(25, 'jkev', '2013-11-18 15:42:04', '2014-02-13 11:19:36', 14),
(26, 'jkev', '2013-11-18 16:30:14', '2014-02-13 11:19:36', 14),
(27, 'jkev', '2013-11-18 16:36:44', '2014-02-13 11:19:36', 14),
(28, 'jkev', '2013-11-18 17:39:55', '2014-02-13 11:19:36', 14),
(29, 'jkev', '2013-11-18 20:06:49', '2014-02-13 11:19:36', 14),
(30, 'jkev', '2013-11-23 08:04:27', '2014-02-13 11:19:36', 14),
(31, 'teph', '2013-11-23 12:02:27', '2013-11-30 21:33:02', 13),
(32, 'teph', '2013-11-24 08:55:55', '2013-11-30 21:33:02', 13),
(33, 'jkev', '2013-11-25 10:32:16', '2014-02-13 11:19:36', 14),
(34, 'jkev', '2013-11-25 14:33:05', '2014-02-13 11:19:36', 14),
(35, 'jkev', '2013-11-25 15:02:47', '2014-02-13 11:19:36', 14),
(36, 'jkev', '2013-11-25 21:08:19', '2014-02-13 11:19:36', 14),
(37, 'jkev', '2013-11-25 23:49:58', '2014-02-13 11:19:36', 14),
(38, 'jkev', '2013-11-26 00:32:22', '2014-02-13 11:19:36', 14),
(39, 'jkev', '2013-11-26 10:39:52', '2014-02-13 11:19:36', 14),
(40, 'jkev', '2013-11-26 21:48:05', '2014-02-13 11:19:36', 14),
(41, 'jkev', '2013-11-28 23:00:00', '2014-02-13 11:19:36', 14),
(42, 'jkev', '2013-11-28 23:00:06', '2014-02-13 11:19:36', 14),
(43, 'jkev', '2013-11-30 21:28:54', '2014-02-13 11:19:36', 14),
(44, 'teph', '2013-11-30 21:32:54', '2013-11-30 21:33:02', 13),
(45, 'jkev', '2013-12-04 12:45:09', '2014-02-13 11:19:36', 14),
(46, 'teph', '2013-12-04 14:02:19', '', 13),
(47, 'jkev', '2013-12-11 11:56:15', '2014-02-13 11:19:36', 14),
(48, 'jkev', '2013-12-11 12:04:44', '2014-02-13 11:19:36', 14),
(49, 'jkev', '2013-12-12 09:44:34', '2014-02-13 11:19:36', 14),
(50, 'jkev', '2013-12-13 01:48:23', '2014-02-13 11:19:36', 14),
(51, 'jkev', '2013-12-27 09:13:20', '2014-02-13 11:19:36', 14),
(52, 'jkev', '2013-12-27 10:18:38', '2014-02-13 11:19:36', 14),
(53, 'jkev', '2013-12-27 10:35:43', '2014-02-13 11:19:36', 14),
(54, 'jkev', '2013-12-27 11:08:54', '2014-02-13 11:19:36', 14),
(55, 'jkev', '2013-12-27 11:20:25', '2014-02-13 11:19:36', 14),
(56, 'jkev', '2013-12-27 11:41:58', '2014-02-13 11:19:36', 14),
(57, 'jkev', '2013-12-27 11:43:10', '2014-02-13 11:19:36', 14),
(58, 'jkev', '2013-12-27 14:54:57', '2014-02-13 11:19:36', 14),
(59, 'jkev', '2014-01-12 20:08:26', '2014-02-13 11:19:36', 14),
(60, 'jkev', '2014-01-13 15:24:07', '2014-02-13 11:19:36', 14),
(61, 'jkev', '2014-01-13 18:46:08', '2014-02-13 11:19:36', 14),
(62, 'jkev', '2014-01-15 20:40:15', '2014-02-13 11:19:36', 14),
(63, 'jkev', '2014-01-16 14:42:02', '2014-02-13 11:19:36', 14),
(64, 'jkev', '2014-01-17 09:16:17', '2014-02-13 11:19:36', 14),
(65, 'jkev', '2014-01-17 13:25:51', '2014-02-13 11:19:36', 14),
(66, 'admin', '2014-01-17 14:41:30', '2014-04-03 15:30:06', 15),
(67, 'admin', '2014-01-17 15:56:32', '2014-04-03 15:30:06', 15),
(68, 'admin', '2014-01-26 17:45:31', '2014-04-03 15:30:06', 15),
(69, 'admin', '2014-02-13 10:45:17', '2014-04-03 15:30:06', 15),
(70, 'admin', '2014-02-13 11:05:27', '2014-04-03 15:30:06', 15),
(71, 'jkev', '2014-02-13 11:16:48', '2014-02-13 11:19:36', 14),
(72, 'admin', '2014-02-13 11:55:36', '2014-04-03 15:30:06', 15),
(73, 'admin', '2014-02-13 12:32:38', '2014-04-03 15:30:06', 15),
(74, 'admin', '2014-02-13 12:52:05', '2014-04-03 15:30:06', 15),
(75, 'admin', '2014-02-13 13:04:35', '2014-04-03 15:30:06', 15),
(76, 'jkev', '2014-02-13 14:35:27', '', 14),
(77, 'admin', '2014-02-20 09:40:39', '2014-04-03 15:30:06', 15),
(78, 'admin', '2014-02-20 09:42:21', '2014-04-03 15:30:06', 15),
(79, 'admin', '2014-02-27 22:40:15', '2014-04-03 15:30:06', 15),
(80, 'admin', '2014-02-28 13:12:52', '2014-04-03 15:30:06', 15),
(81, 'admin', '2014-04-02 17:27:47', '2014-04-03 15:30:06', 15),
(82, 'admin', '2014-04-03 15:29:38', '2014-04-03 15:30:06', 15),
(83, 'admin', '2014-06-15 12:31:51', '', 15),
(84, 'admin', '2014-11-30 09:25:05', '', 15),
(85, 'admin', '2014-11-30 10:17:02', '', 15),
(86, 'admin', '2014-11-30 17:51:59', '', 15),
(87, 'admin', '2014-11-30 18:11:49', '', 15),
(88, 'admin', '2014-11-30 18:19:49', '', 15),
(89, 'admin', '2014-12-02 18:12:39', '', 15),
(90, 'admin', '2014-12-02 18:31:13', '', 15),
(91, 'admin', '2014-12-03 20:25:45', '', 15),
(92, 'admin', '2014-12-03 21:32:03', '', 15),
(93, 'admin', '2014-12-03 21:32:03', '', 15),
(94, 'admin', '2014-12-04 10:18:59', '', 15),
(95, 'admin', '2014-12-04 12:26:20', '', 15),
(96, 'admin', '2014-12-04 12:28:23', '', 15),
(97, 'admin', '2014-12-04 22:15:09', '', 15),
(98, 'admin', '2014-12-05 15:23:20', '', 15),
(99, 'admin', '2014-12-05 15:31:29', '', 15),
(100, 'admin', '2014-12-12 00:32:30', '', 15),
(101, 'admin', '2014-12-12 01:01:22', '', 15),
(102, 'admin', '2014-12-12 13:49:19', '', 15),
(103, 'admin', '2014-12-13 20:51:55', '', 15),
(104, 'admin', '2014-12-18 20:52:51', '', 15),
(105, 'admin', '2014-12-18 22:10:06', '', 15),
(106, 'admin', '2014-12-18 22:49:11', '', 15),
(107, 'admin', '2014-12-18 22:49:11', '', 15),
(108, 'admin', '2014-12-18 22:49:11', '', 15),
(109, 'admin', '2014-12-18 22:49:11', '', 15),
(110, 'admin', '2014-12-18 22:49:11', '', 15),
(111, 'admin', '2014-12-18 22:49:11', '', 15),
(112, 'admin', '2014-12-18 22:49:12', '', 15),
(113, 'admin', '2014-12-18 22:49:12', '', 15),
(114, 'admin', '2014-12-18 22:49:12', '', 15),
(115, 'admin', '2014-12-18 22:49:12', '', 15),
(116, 'admin', '2014-12-18 22:49:12', '', 15),
(117, 'admin', '2014-12-18 22:49:12', '', 15),
(118, 'admin', '2014-12-18 22:49:12', '', 15),
(119, 'admin', '2014-12-18 22:49:12', '', 15),
(120, 'admin', '2014-12-18 22:49:12', '', 15),
(121, 'admin', '2014-12-18 22:49:12', '', 15),
(122, 'admin', '2014-12-18 22:49:13', '', 15),
(123, 'admin', '2014-12-18 22:49:13', '', 15),
(124, 'admin', '2014-12-18 22:49:13', '', 15),
(125, 'admin', '2014-12-18 22:49:13', '', 15),
(126, 'admin', '2014-12-18 22:49:13', '', 15),
(127, 'admin', '2014-12-18 22:49:13', '', 15),
(128, 'admin', '2014-12-18 22:49:13', '', 15),
(129, 'admin', '2014-12-18 22:49:13', '', 15),
(130, 'admin', '2014-12-18 22:51:54', '', 15),
(131, 'admin', '2014-12-18 22:51:54', '', 15),
(132, 'admin', '2014-12-24 19:56:43', '', 15),
(133, 'admin', '2014-12-25 01:36:56', '', 15),
(134, 'admin', '2014-12-25 04:49:31', '', 15),
(135, 'admin', '2014-12-25 04:57:00', '', 15),
(136, 'admin', '2014-12-26 21:01:31', '', 15),
(137, 'admin', '2014-12-27 14:28:59', '', 15),
(138, 'admin', '2015-01-09 19:21:40', '', 15),
(139, 'admin', '2015-01-14 23:03:27', '', 15),
(140, 'admin', '2015-01-15 14:01:00', '', 15),
(141, 'admin', '2015-01-15 15:27:02', '', 15),
(142, 'admin', '2015-01-17 13:43:18', '', 15),
(143, 'admin', '2015-01-17 13:43:20', '', 15),
(144, 'admin', '2015-01-18 15:13:11', '', 15),
(145, 'client', '2015-01-19 14:26:15', '2015-01-20 11:15:35', 2),
(146, 'client', '2015-01-19 16:46:09', '2015-01-20 11:15:35', 2),
(147, 'client', '2015-01-19 16:51:46', '2015-01-20 11:15:35', 2),
(148, 'client', '2015-01-20 11:15:38', '', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `case`
--
ALTER TABLE `case`
  ADD CONSTRAINT `case_ibfk_1` FOREIGN KEY (`plotid`) REFERENCES `plot` (`plotid`),
  ADD CONSTRAINT `case_ibfk_2` FOREIGN KEY (`clientid`) REFERENCES `client` (`clientid`);

--
-- Constraints for table `plot`
--
ALTER TABLE `plot`
  ADD CONSTRAINT `plot_ibfk_1` FOREIGN KEY (`plottype`) REFERENCES `plottype` (`typeid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
