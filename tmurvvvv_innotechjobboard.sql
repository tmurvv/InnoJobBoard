-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 09, 2018 at 05:23 PM
-- Server version: 5.6.40
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmurvvvv_innotechjobboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(150) NOT NULL,
  `categoryViewOrder` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `categoryViewOrder`) VALUES
(1, 'SharePoint', 4),
(3, 'Big Data/Architecture', 2),
(4, 'Web Development', 3),
(7, 'Not Listed', 50),
(8, 'Cloud Security/Architecture', 1);

-- --------------------------------------------------------

--
-- Table structure for table `joblistings`
--

CREATE TABLE `joblistings` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(100) NOT NULL,
  `dateposted` date NOT NULL,
  `jobtype` varchar(100) NOT NULL,
  `category` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joblistings`
--

INSERT INTO `joblistings` (`id`, `title`, `description`, `location`, `dateposted`, `jobtype`, `category`) VALUES
(1, 'SharePoint WebPart Developer needed', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce laoreet libero eu leo malesuada, et varius purus blandit. Phasellus ut scelerisque justo. Aliquam tincidunt lobortis metus, nec eleifend leo viverra id. In efficitur a tellus quis congue. Duis tincidunt tellus et arcu pharetra dignissim. Vivamus a erat mollis sapien mollis consectetur pretium non dui. Aenean faucibus, erat eget volutpat commodo, ipsum eros semper nunc, a porta tellus lorem id diam.<br />\r\n<br />\r\nAliquam at iaculis turpis, ac viverra nisi. Nulla pulvinar felis sit amet dapibus bibendum. Praesent rutrum faucibus risus, ut ultrices massa suscipit suscipit. Cras finibus tortor sagittis dignissim aliquet. Ut metus risus, commodo vitae nisi sed, volutpat accumsan purus. Morbi et ultrices erat. Suspendisse sit amet iaculis orci, non ornare nisi. Suspendisse vel vehicula lorem, non elementum ipsum. Vestibulum in nisi arcu. Integer ipsum orci, eleifend vel interdum eget, eleifend nec quam. Phasellus scelerisque, ligula id pharetra luctus, dui nunc sollicitudin arcu, id maximus arcu odio consectetur velit. Maecenas rutrum elementum odio quis dictum. Vivamus hendrerit at augue nec scelerisque.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Praesent ultricies nunc nec rutrum ultrices. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque elementum metus ac augue ultrices sagittis. Ut pharetra lacus purus, vel dictum libero dignissim sit amet. Cras ac nisi gravida eros blandit tristique vel ut nisl. Sed maximus lorem sit amet orci aliquam eleifend. Ut viverra odio ut augue venenatis feugiat. Sed nec dolor non lectus auctor semper. Maecenas rutrum purus sed augue volutpat, nec tristique ipsum viverra. Etiam eu libero lacinia, interdum nisi quis, pharetra nisi.</p>\r\n', 'Calgary, AB', '2018-07-05', 'Full-Time', 'SharePoint'),
(2, 'SharePoint Senior Developer', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce laoreet libero eu leo malesuada, et varius purus blandit. Phasellus ut scelerisque justo. Aliquam tincidunt lobortis metus, nec eleifend leo viverra id. In efficitur a tellus quis congue. Duis tincidunt tellus et arcu pharetra dignissim. Vivamus a erat mollis sapien mollis consectetur pretium non dui. Aenean faucibus, erat eget volutpat commodo, ipsum eros semper nunc, a porta tellus lorem id diam.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>at iaculis turpis, ac viverra nisi. Nulla pulvinar felis sit amet dapibus bibendum. Praesent rutrum faucibus risus, ut ultrices massa suscipit suscipit. Cras finibus tortor sagittis dignissim aliquet. Ut metus risus, commodo vitae nisi sed, volutpat accumsan purus. Morbi et ultrices erat. Suspendisse sit amet iaculis orci, non ornare nisi. Suspendisse vel vehicula lorem, non elementum ipsum. Vestibulum in nisi arcu. Integer ipsum orci, eleifend vel interdum eget, eleifend nec quam.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Phasellus scelerisque, ligula id pharetra luctus, dui nunc sollicitudin arcu, id maximus arcu odio consectetur velit. Maecenas rutrum elementum odio quis dictum. Vivamus hendrerit at augue nec scelerisque. Praesent ultricies nunc nec rutrum ultrices. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque elementum metus ac augue ultrices sagittis. Ut pharetra lacus purus, vel dictum libero dignissim sit amet. Cras ac nisi gravida eros blandit tristique vel ut nisl. Sed maximus lorem sit amet orci aliquam eleifend. Ut viverra odio ut augue venenatis feugiat. Sed nec dolor non lectus auctor semper.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Maecenas rutrum purus sed augue volutpat, nec tristique ipsum viverra. Etiam eu libero lacinia, interdum nisi quis, pharetra nisi.</p>\r\n', 'Edmonton, AB', '2018-06-05', 'Full-Time', 'SharePoint'),
(10, 'Start your Career Here!!', '<p>Lorum ipsumLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce laoreet libero eu leo malesuada, et varius purus blandit. Phasellus ut scelerisque justo. Aliquam tincidunt lobortis metus, nec eleifend leo viverra id. In efficitur a tellus quis congue. Duis tincidunt tellus et arcu pharetra dignissim. Vivamus a erat mollis sapien mollis consectetur pretium non dui. Aenean faucibus, erat eget volutpat commodo, ipsum eros semper nunc, a porta tellus lorem id diam.<br />\r\n<br />\r\nAliquam at iaculis turpis, ac viverra nisi. Nulla pulvinar felis sit amet dapibus bibendum. Praesent rutrum faucibus risus, ut ultrices massa suscipit suscipit. Cras finibus tortor sagittis dignissim aliquet. Ut metus risus, commodo vitae nisi sed, volutpat accumsan purus. Morbi et ultrices erat. Suspendisse sit amet iaculis orci, non ornare nisi. Suspendisse vel vehicula lorem, non elementum ipsum. Vestibulum in nisi arcu. Integer ipsum orci, eleifend vel interdum eget, eleifend nec quam. Phasellus scelerisque, ligula id pharetra luctus, dui nunc sollicitudin arcu, id maximus arcu odio consectetur velit. Maecenas rutrum elementum odio quis dictum. Vivamus hendrerit at augue nec scelerisque.</p>\r\n', 'Vancouver, BC', '2018-07-14', 'Internship', 'SharePoint'),
(3, 'Junior Web Developer needed', '<p>Seattle -- Lorem ipsum dolor sit amet, vitae senserit vel cu, ancillae percipit per ne. Id pro scaevola fabellas euripidis. Ludus vocent epicuri ex vel. Dicam noster honestatis ius et, sanctus consetetur in vix, cum in ferri omnes appareat. Id vis dicat veniam lobortis, te sit stet quidam iudicabit, mea meis soluta te. Solet propriae quo et. Brute quaestio definiebas ex sea. Modus voluptua his an, vel fabulas adipisci accusamus te, nam simul pericula repudiandae an. Ius no omnis eleifend quaerendum. Et malis albucius comprehensam eum, et eos wisi pertinacia delicatissimi, ad nam saepe graecis. Et duo utamur concludaturque, no duo vivendo dissentiet persequeris.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ut usu natum disputando, pro cu eripuit fabellas, sed no adhuc senserit maiestatis. Qui id modus patrioque pertinacia, sit eruditi saperet intellegebat an. Ne est omnes repudiare. Ex soluta putant definiebas sed, dolorem repudiare intellegebat eum ut. Tale errem dicunt ex mel, eos maiorum epicurei luptatum ut, vel ad dicant vivendum molestiae. Ius tollit percipit inciderint eu, postea iudicabit accusamus vel ea, ei vis verterem definitiones. Id exerci mucius eirmod mea, te idque scripserit cum, et pri molestie sadipscing. Te nonumy detracto atomorum vis, ea vim posse iusto essent. Alienum phaedrum eos ex, nec ad dicit postea, qui ea vide facete. Has fierent maluisset no, ne nostro argumentum eam. Has te numquam accumsan, ea appetere sapientem liberavisse sed, adhuc dicunt gloriatur pro ut. Mucius iriure eum ne, eum et omnesque invenire, ad errem patrioque quo.</p>\r\n', 'USA', '2018-03-17', 'Contract', 'Web Development'),
(11, 'Secure the cloud!', '<p><strong>Summary</strong></p>\r\n\r\n<p>The Senior IT Security Analyst will have primary responsibility for the implementation, management and support of security solutions and procedures within Precision. The individual must have excellent working knowledge in the areas of threat management, security event monitoring, risk analysis, incident response and end user awareness. This role will contribute to the development of the overall security strategy at Precision and will be instrumental in developing and implementing actionable goals. The individual selected will be engaged in the evaluation, design/architecture and implementation of security technologies. The successful candidate will also provide support and guidance to other IT teams by recommending best practices and providing a security focus on existing processes and procedures. In addition, this individual will be required to present quarterly security updates to Senior Leadership and/or the Board of Directors</p>\r\n\r\n<p><strong>Responsibilities</strong></p>\r\n\r\n<ul>\r\n	<li>Monitor the computing environment and managing the supporting security technologies to ensure confidentiality, integrity and availability of systems</li>\r\n	<li>Consolidate, detect and investigate security events from multiple vectors (SIEM, IDS/IPS, Firewalls, Email, Antivirus, Cloud Software)</li>\r\n	<li>Lead incident investigation and issue resolutions. Following up to document and report on security events and making ongoing recommendations and enhancements to improve security</li>\r\n	<li>Assess existing, and new security risks and exposures, and implement the corrective actions to enable proactive protection</li>\r\n	<li>Evaluate, improve, and maintain information security policies, procedures and protocols and ongoing auditing of users for compliance</li>\r\n	<li>Review of technology standards against vendor recommendations and updates to ensure hardware and software meet or exceed security specifications</li>\r\n	<li>Ensure that overall IT architecture/design, development standards and interfaces include security at every level.</li>\r\n	<li>Provide security expertise to individual teams managing perimeter security; antivirus/malware; patch management; mobile device management (MDM) and cloud security</li>\r\n	<li>Work on IT and Business Projects as the security subject matter expert (SME)</li>\r\n	<li>Present quarterly end user training seminars, lunch and learns, and security bulletins aimed at improving overall security in the environment</li>\r\n	<li>Oversee and collaborate with vendors to ensure systems and services supplied include core components of security and data protection</li>\r\n	<li>Make recommendations for improvements to overall organizational security</li>\r\n	<li>Collaborate and clear communication with other IT teams/resources in delivering secure solutions</li>\r\n	<li>Frequent updates and reviews with the Director of IT regarding relevant issues, technologies, risks or other information as required</li>\r\n	<li>Create reports and measures (KPI&rsquo;s) for security to provide ongoing visibility to leadership across the business</li>\r\n	<li>Develop effective relationships between the business and IT</li>\r\n	<li>Other operational functions within the Information Security space, as required</li>\r\n	<li>Available evenings or weekends and holidays if required</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Knowledge &amp; Skills</strong></p>\r\n\r\n<p>Attention to detail in all areas of work</p>\r\n\r\n<p>Excellent time management skills, multitasking skills, and the ability to prioritize tasks and make decisions with minimal supervision</p>\r\n\r\n<p>Strong organizational, analytical, and execution skills</p>\r\n\r\n<p>Communicates unambiguously and listens effectively</p>\r\n\r\n<p>Ability to present technical material to various stakeholders clearly and concisely</p>\r\n\r\n<p>Strong desire to learn, improve and to assist others</p>\r\n\r\n<p>Ability to explore and research new ideas and make innovative contributions to existing processes or solutions</p>\r\n\r\n<p>Documenting and updating technical procedures, standards, and policies</p>\r\n\r\n<p><strong>Education</strong></p>\r\n\r\n<p>Degree, diploma or technical program certificate in computers from a recognized post-secondary institution</p>\r\n\r\n<p><strong>Experience</strong></p>\r\n\r\n<p>At least 5-10 years of experience in IT, within a network, security monitoring or information security role</p>\r\n\r\n<p>2 or more-years&rsquo; experience in a leadership/mentorship role</p>\r\n\r\n<p>Must have one or more security related certifications (i.e. Security+; Network+, CISSP, GIAC etc.)</p>\r\n\r\n<p>Solid understanding of networking concepts and competent with protocols of all core technologies (TCP/IP, DNS, DHCP, SMTP, OSPF, IMAP, LDAP, SMB, SSH, VPN, NAT, IPSec, VoIP, etc.)</p>\r\n\r\n<p>Knowledge of wireless networking including: 802.11 a, b, g &amp; n, LWAPP, WLC and Aps</p>\r\n\r\n<p>Experience with voice services VOIP, Cellular, MSAT, IP Telephony)</p>\r\n\r\n<p>Experience with security integration/convergence with OT solutions (sensors, SCADA, remote monitoring/control devices)</p>\r\n\r\n<p>In depth experience with security infrastructure including firewalls, http filters, IDS/IPS, CASB, Cloud Services Management (i.e. Azure, Office 365, AWS)</p>\r\n\r\n<p>Practical experience in Information Security, including vulnerability testing and security assessments</p>\r\n\r\n<p>INDCA1</p>\r\n', 'Calgary, AB', '2017-12-03', 'Full-Time', 'Cloud Security/Architecture'),
(5, 'Technical Lead â€“Big Data', '<p><strong>Role:</strong></p>\r\n\r\n<p><strong>Digital Big Data</strong></p>\r\n\r\n<p>Interact with the customer and analyze requirements</p>\r\n\r\n<ul>\r\n	<li>Work on source to target mapping/business transformation rules</li>\r\n	<li>Hands-on Experience with BI / Big Data Integration and Data Analytics projects</li>\r\n	<li>Extensive SQL experience and ability to write and execute queries to extract datasets</li>\r\n	<li>Source to Target Mapping and Lineage creation</li>\r\n</ul>\r\n\r\n<p><strong>Skills Required</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Detailed experience of ETL in Big Data (Hortonworks) and Azure platform</strong></li>\r\n	<li><strong>Knowledge of BI Architectures, including design patterns for Data Warehouses, Data Marts,</strong></li>\r\n</ul>\r\n\r\n<p><strong>Operational Data Stores, Analytics</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Detailed experience in MS Azure Data Factory, Data Lake Analytics, Azure Functions,</strong></li>\r\n</ul>\r\n\r\n<p>Azure Event Hub</p>\r\n\r\n<ul>\r\n	<li>Scripting experience in Python, C++</li>\r\n	<li>Implementation experience in streaming data solutions using Kafka and Storm</li>\r\n	<li>Excellent Communication Skills * Agile Methodology</li>\r\n</ul>\r\n\r\n<p><strong>Desired Skills</strong></p>\r\n\r\n<ul>\r\n	<li>Knowledge of Oil &amp; Gas Midstream domain and business</li>\r\n	<li>Knowledge of ServiceNow Service Management Tool for L2 and L3 Support Model</li>\r\n	<li>Knowledge and Understanding of Data Science &amp; Machine Learning</li>\r\n</ul>\r\n\r\n<p>Job Type: Contract</p>\r\n\r\n<p>17 days ago</p>\r\n', 'Calgary, AB', '2018-07-02', 'Contract', 'Big Data/Architecture'),
(12, 'Web Developer needed Dallas, TX', '<p><strong>About You</strong></p>\r\n\r\n<p>You want to work for a fast-paced company that thinks big and dreams huge. You are driven, view work as more than just a job, and are never satisfied with a project left half-done. You have a strong sense of personal ownership and responsibility for completion of objectives on time. You want to figure out why things tick which makes you tick but very little ticks you off. You want to think outside of the box and continually challenge your own limits, as well as those around you. You have a mad scientist mentality where you want to be part of the robots building robots revolution.</p>\r\n\r\n<p><strong>About ATTAbotics</strong></p>\r\n\r\n<p>ATTAbotics provides a robotic warehousing and fulfillment system that has is being noticed by industry experts including some of the top global automation companies in the world. ATTAbotics has a very disruptive technology that has the potential to redefine the eCommerce and warehousing fulfillment market. ATTAbotics has taken a different perspective on the technology. Instead of developing technology to speed the human workload, ATTAbotics is creating a robotic centric storage and retrieval system. A goods to person system that can be deployed in an extremely small space, for a lower entry level cost, providing industry leading throughput.</p>\r\n\r\n<p><strong>Who you are and what we need:</strong></p>\r\n\r\n<ul>\r\n	<li>A Front End developer who can create and implement user experiences</li>\r\n	<li>5+ years of experience using C# to create user interfaces within WPF</li>\r\n	<li>Specific experience in WPF, C# with experience building kiosk applications, MVVM</li>\r\n	<li>Passion for detailed, innovative, and empathic design combined with well-rounded design skills</li>\r\n	<li>Strong understanding of the art of UX practices</li>\r\n</ul>\r\n\r\n<p>If this description describes you perfectly and the work environment you know you can thrive in, send us your resume as well as describe to us what you&rsquo;re passionate about and we may just reach out to you.</p>\r\n\r\n<p>ATTAbotics is committed to employing the best people to do the best job possible within our environment. We hire based on merit and are strongly committed to cultivating diversity as a source of excellence. ATTAbotics firmly believes that a vast array of perspectives produces and promotes innovation and business success. Our corporate diversity encompasses differences in ethnicity, gender identity or expression, language, age, sexual orientation, religion, socio-economic status, physical and mental ability and education.</p>\r\n\r\n<p>Job Type: Full-time</p>\r\n\r\n<p>Experience:</p>\r\n\r\n<ul>\r\n	<li>UI/UX: 5 years</li>\r\n	<li>WPF, MVVM: 5 years</li>\r\n</ul>\r\n\r\n<p>Location:</p>\r\n\r\n<ul>\r\n	<li>Calgary, AB</li>\r\n</ul>\r\n', 'USA', '2018-04-02', 'Full-Time', 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `jobtypes`
--

CREATE TABLE `jobtypes` (
  `id` int(11) NOT NULL,
  `jobType` varchar(100) NOT NULL,
  `jobTypeViewOrder` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobtypes`
--

INSERT INTO `jobtypes` (`id`, `jobType`, `jobTypeViewOrder`) VALUES
(1, 'Full-Time', 2),
(7, 'Part-Time', 1),
(4, 'Contract', 3),
(5, 'Not Listed', 50),
(6, 'Internship', 4);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location` varchar(150) NOT NULL,
  `locationViewOrder` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `locationViewOrder`) VALUES
(1, 'Calgary, AB', 1),
(2, 'Edmonton, AB', 2),
(3, 'Toronto, ON', 3),
(4, 'Vancouver, BC', 4),
(6, 'USA', 5),
(7, 'Not Listed', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joblistings`
--
ALTER TABLE `joblistings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobtypes`
--
ALTER TABLE `jobtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `joblistings`
--
ALTER TABLE `joblistings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jobtypes`
--
ALTER TABLE `jobtypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
