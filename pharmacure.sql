INSERT INTO `User` (`id`, `login`, `password`, `nom`, `prenom`, `mail`, `tel`, `type`) VALUES
(1, 'admin', 'admin', 'HAIDARA', 'Badi', 'badihaidara@gmail.com', '0629467871', 3),
(2, 'user', 'user', 'SACKO', 'MADOU', 'madou@sakco.fr', '06 29 46 89 71', 1);

INSERT INTO `Classe` (`id`, `libelle`) VALUES
(1, 'Netherlands'),
(2, 'Equatorial Guinea'),
(3, 'Benin'),
(4, 'Syria'),
(5, 'Egypt'),
(6, 'Bhutan'),
(7, 'Poland'),
(8, 'Martinique'),
(9, 'Isle of Man'),
(10, 'United States'),
(11, 'Venezuela'),
(12, 'Poland'),
(13, 'Belize'),
(14, 'Nigeria'),
(15, 'Nepal'),
(16, 'Saint BarthÃ©lemy'),
(17, 'Australia'),
(18, 'Saudi Arabia'),
(19, 'Taiwan'),
(20, 'Mozambique'),
(21, 'Belgium'),
(22, 'Equatorial Guinea'),
(23, 'Burundi'),
(24, 'France'),
(25, 'Burkina Faso'),
(26, 'Bangladesh'),
(27, 'Syria'),
(28, 'Lithuania'),
(29, 'United Kingdom (Great Britain)'),
(30, 'Bangladesh'),
(31, 'Panama'),
(32, 'United States Minor Outlying Islands'),
(33, 'Venezuela'),
(34, 'Kuwait'),
(35, 'Portugal'),
(36, 'Greece'),
(37, 'Slovenia'),
(38, 'Bolivia'),
(39, 'Saint Vincent and The Grenadines'),
(40, 'Bonaire, Sint Eustatius and Saba'),
(41, 'Belarus'),
(42, 'Burkina Faso'),
(43, 'South Africa'),
(44, 'Egypt'),
(45, 'Denmark'),
(46, 'Bouvet Island'),
(47, 'Saint Vincent and The Grenadines'),
(48, 'Korea, South'),
(49, 'Libya'),
(50, 'Equatorial Guinea'),
(51, 'Liberia'),
(52, 'Italy'),
(53, 'Wallis and Futuna'),
(54, 'Kuwait'),
(55, 'Jersey'),
(56, 'Cocos (Keeling) Islands'),
(57, 'Gambia'),
(58, 'Norfolk Island'),
(59, 'Ethiopia'),
(60, 'Kenya'),
(61, 'Gibraltar'),
(62, 'Rwanda'),
(63, 'Bulgaria'),
(64, 'Hungary'),
(65, 'Nauru'),
(66, 'Saint Pierre and Miquelon'),
(67, 'Belize'),
(68, 'Kiribati'),
(69, 'Northern Mariana Islands'),
(70, 'Albania'),
(71, 'Saint Vincent and The Grenadines'),
(72, 'Yemen'),
(73, 'Sudan'),
(74, 'Sri Lanka'),
(75, 'Saint Pierre and Miquelon'),
(76, 'Belize'),
(77, 'Luxembourg'),
(78, 'Mayotte'),
(79, 'United Kingdom (Great Britain)'),
(80, 'Malaysia'),
(81, 'Liberia'),
(82, 'Mexico'),
(83, 'Wallis and Futuna'),
(84, 'Spain'),
(85, 'Turkmenistan'),
(86, 'Sao Tome and Principe'),
(87, 'Ireland'),
(88, 'Tuvalu'),
(89, 'Latvia'),
(90, 'Saint Helena, Ascension and Tristan da Cunha'),
(91, 'Lebanon'),
(92, 'Lesotho'),
(93, 'French Polynesia'),
(94, 'Switzerland'),
(95, 'Peru'),
(96, 'Mayotte'),
(97, 'Antigua and Barbuda'),
(98, 'Fiji'),
(99, 'Georgia'),
(100, 'Heard Island and Mcdonald Islands');

-- --------------------------------------------------------

--
-- Contenu de la table `Client`
--

INSERT INTO `Client` (`id`, `nom`, `prenom`, `mail`, `tel`, `commentaire`) VALUES
(1, 'fofana', 'tidiany', 'tidiany@gmail.com', '0987654321', 'ybuni,'),
(2, 'Kadeem', 'Armand Edwards', 'cursus.et@fringillaornare.net', '01 58 27 38 11', 'a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam'),
(3, 'Reece', 'Curran Cotton', 'penatibus.et.magnis@nectempus.co.uk', '08 02 65 34 07', 'ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque'),
(4, 'Castor', 'Jasper Snyder', 'Suspendisse@tinciduntdui.com', '05 50 12 58 42', 'turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis'),
(5, 'Melvin', 'Yasir Flores', 'magna@a.org', '07 82 62 47 35', 'ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor.'),
(6, 'Craig', 'Tanner Frazier', 'mi.tempor.lorem@magnatellus.ca', '09 75 68 20 97', 'Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede.'),
(7, 'Wayne', 'Scott Stone', 'lacinia.Sed.congue@etarcuimperdiet.net', '03 43 22 34 10', 'Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor'),
(8, 'Graiden', 'Duncan Roberts', 'Duis@quispedePraesent.edu', '06 26 97 70 34', 'Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus'),
(9, 'Tad', 'Flynn Stanley', 'elit.a.feugiat@eleifendnondapibus.com', '01 27 73 02 69', 'penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin'),
(10, 'Nathan', 'Ulric Hartman', 'pellentesque.Sed@Etiamlaoreetlibero.ca', '03 27 98 16 21', 'dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus'),
(11, 'Rashad', 'Wing Franks', 'porttitor.tellus@adipiscingenimmi.co.uk', '05 38 45 94 21', 'Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus,'),
(12, 'Jelani', 'Marvin Wolf', 'sagittis@natoquepenatibus.co.uk', '05 75 32 74 47', 'vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu.'),
(13, 'Clarke', 'Alexander Grant', 'pellentesque@nequeSedeget.com', '05 27 12 19 38', 'Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut'),
(14, 'Tate', 'Bruce Bowman', 'augue.scelerisque@Crasvehiculaaliquet.ca', '07 30 32 68 93', 'adipiscing, enim mi tempor lorem, eget mollis lectus pede et'),
(15, 'Hop', 'Harrison Blake', 'semper.erat@eusemPellentesque.edu', '06 14 75 54 62', 'sit amet ornare lectus justo eu arcu. Morbi sit amet'),
(16, 'Michael', 'Colin Nichols', 'neque@Nuncmauriselit.org', '09 38 78 92 33', 'adipiscing lobortis risus. In mi pede, nonummy ut, molestie in,'),
(17, 'Erich', 'Geoffrey Walters', 'vitae.aliquet@Duisac.org', '02 21 24 23 76', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur'),
(18, 'Hedley', 'Brandon Powell', 'ornare.Fusce.mollis@ipsumcursusvestibulum.com', '05 85 55 63 42', 'dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu'),
(19, 'Lucian', 'Lamar Farrell', 'Donec.nibh@eratvolutpat.ca', '08 69 20 07 01', 'nibh. Donec est mauris, rhoncus id, mollis nec, cursus a,'),
(20, 'Uriah', 'Chandler Bell', 'Morbi.sit@ipsumporta.edu', '03 06 37 40 87', 'a purus. Duis elementum, dui quis accumsan convallis, ante lectus'),
(23, 'Dolan', 'Alan Hayden', 'ultricies.adipiscing.enim@vehicula.edu', '03 45 30 21 10', 'natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'),
(24, 'Nathaniel', 'Richard Mcdowell', 'et.libero@nonsapien.edu', '09 61 24 20 70', 'vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis.'),
(25, 'Amos', 'Marvin Dunn', 'felis.eget.varius@volutpatornarefacilisis.co.uk', '01 71 80 06 02', 'elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu'),
(26, 'Blake', 'Xander Kaufman', 'tempor.lorem.eget@elitpretiumet.co.uk', '04 85 06 45 33', 'pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu'),
(27, 'Lars', 'Slade Giles', 'quis.massa.Mauris@est.co.uk', '04 21 17 44 70', 'tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec'),
(28, 'Thane', 'Melvin Mccoy', 'ornare.Fusce.mollis@euultrices.com', '04 85 53 33 43', 'non, luctus sit amet, faucibus ut, nulla. Cras eu tellus'),
(29, 'Walker', 'Anthony Sloan', 'ac@ultrices.com', '09 87 50 58 98', 'penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec'),
(30, 'Graiden', 'Xander Talley', 'Etiam@condimentumegetvolutpat.ca', '04 82 63 66 43', 'Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis'),
(31, 'Mohammad', 'Denton Carpenter', 'convallis@Nuncullamcorpervelit.org', '08 68 06 96 72', 'mattis ornare, lectus ante dictum mi, ac mattis velit justo'),
(32, 'Cain', 'Marshall Reese', 'magna.Cras.convallis@pulvinararcu.co.uk', '07 40 74 68 66', 'tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum.'),
(33, 'Garth', 'Grant Fuentes', 'interdum.enim@arcu.org', '03 85 46 23 98', 'id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend'),
(34, 'Nathan', 'Kevin Hodge', 'risus@luctus.net', '06 66 16 00 00', 'nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet.'),
(35, 'Jesse', 'Valentine Prince', 'Duis.at@massaInteger.co.uk', '07 00 14 79 05', 'ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus.'),
(36, 'Gray', 'Donovan Giles', 'volutpat.Nulla.facilisis@Phaselluselit.org', '02 11 76 57 70', 'in lobortis tellus justo sit amet nulla. Donec non justo.'),
(37, 'Hilel', 'Lucian Clements', 'consectetuer@tempusmauriserat.net', '09 30 84 86 37', 'Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla'),
(38, 'Lionel', 'Ferris Snow', 'arcu.iaculis@ligula.ca', '08 96 33 85 16', 'vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit'),
(39, 'Jin', 'Dustin Salazar', 'eget.laoreet.posuere@ipsumCurabiturconsequat.ca', '08 04 49 32 94', 'eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam'),
(40, 'Josiah', 'Yuli Sargent', 'nec@Intincidunt.co.uk', '04 79 78 95 70', 'ornare sagittis felis. Donec tempor, est ac mattis semper, dui'),
(41, 'Joel', 'Aristotle Reid', 'Nulla.dignissim.Maecenas@est.com', '06 31 22 21 72', 'elementum sem, vitae aliquam eros turpis non enim. Mauris quis'),
(42, 'Ryder', 'Cody Douglas', 'Suspendisse@estacmattis.ca', '01 58 82 87 01', 'dui. Cum sociis natoque penatibus et magnis dis parturient montes,'),
(43, 'Amery', 'Macon Battle', 'Integer.aliquam.adipiscing@molestietortornibh.com', '04 42 08 64 34', 'aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae'),
(44, 'Quamar', 'Chase Cooley', 'cubilia@duiquis.edu', '05 62 06 92 84', 'nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce'),
(45, 'Zachary', 'Lewis Henry', 'consectetuer@sem.net', '03 96 11 28 89', 'Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius.'),
(46, 'Xenos', 'Lane Aguilar', 'et@Fusce.com', '01 13 81 89 88', 'risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt,'),
(47, 'Alec', 'Victor Vang', 'tellus@leoin.org', '04 48 25 57 42', 'vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat'),
(48, 'Wesley', 'Hedley Combs', 'tempor.est@et.com', '05 15 96 11 64', 'Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus,'),
(49, 'Ivor', 'Murphy Gates', 'dapibus@Sednullaante.net', '01 46 08 04 96', 'Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum'),
(50, 'Matthew', 'Leroy Deleon', 'Integer.in@Duis.org', '08 01 16 79 28', 'felis eget varius ultrices, mauris ipsum porta elit, a feugiat'),
(51, 'Chandler', 'Quentin Donaldson', 'consectetuer@Proin.org', '01 73 65 64 30', 'Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris,'),
(52, 'Raja', 'Avram Barker', 'inceptos.hymenaeos@accumsanconvallisante.org', '04 07 78 49 83', 'sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus'),
(53, 'Allistair', 'James Solomon', 'diam.vel.arcu@Nullamlobortisquam.org', '01 63 76 62 24', 'a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque'),
(54, 'Jerry', 'Duncan Dotson', 'non.sapien@sed.ca', '08 86 00 00 20', 'neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede'),
(55, 'Derek', 'Kenneth Abbott', 'velit.in.aliquet@metusAeneansed.com', '03 67 31 33 74', 'libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet'),
(56, 'Calvin', 'Zachery Whitehead', 'Proin.velit.Sed@pharetrafelis.org', '08 88 98 23 33', 'nunc risus varius orci, in consequat enim diam vel arcu.'),
(57, 'Kamal', 'Dean Buckley', 'tristique.neque.venenatis@quama.ca', '05 08 41 45 12', 'interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac'),
(58, 'Cole', 'Victor Hicks', 'Integer@sem.org', '02 38 20 94 11', 'eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum'),
(59, 'Caesar', 'Grady Fleming', 'varius@eratvolutpat.ca', '01 94 57 10 75', 'lobortis risus. In mi pede, nonummy ut, molestie in, tempus'),
(60, 'Omar', 'Chandler Schultz', 'eget.dictum.placerat@eueros.ca', '06 28 10 44 60', 'dictum eleifend, nunc risus varius orci, in consequat enim diam'),
(61, 'Reece', 'Ronan Bonner', 'In.nec.orci@Aliquamvulputateullamcorper.com', '09 32 55 45 30', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames'),
(62, 'Omar', 'Forrest Wiggins', 'Donec.non.justo@etcommodoat.net', '04 36 14 87 70', 'Sed molestie. Sed id risus quis diam luctus lobortis. Class'),
(63, 'Hiram', 'Bernard Lowe', 'massa.Mauris.vestibulum@ettristiquepellentesque.org', '05 89 25 11 79', 'mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet,'),
(64, 'Honorato', 'Garrison Martinez', 'cursus.Integer.mollis@auguescelerisquemollis.ca', '04 07 20 06 73', 'sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum'),
(65, 'Hu', 'Caldwell Rich', 'posuere@augue.com', '08 52 85 48 17', 'massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices'),
(66, 'Wing', 'Perry Goodwin', 'justo@maurissagittisplacerat.com', '02 89 78 23 39', 'egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta'),
(67, 'Tyrone', 'Curran Frost', 'dictum@egestasblanditNam.co.uk', '01 51 23 99 25', 'tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget'),
(68, 'Barrett', 'Aquila Cooper', 'Cras@ligula.org', '02 26 38 59 25', 'quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar'),
(69, 'Timon', 'Ezekiel Mejia', 'et.magna.Praesent@sedorcilobortis.ca', '01 20 11 28 56', 'et magnis dis parturient montes, nascetur ridiculus mus. Proin vel'),
(70, 'Reuben', 'Hamilton Franco', 'convallis.ligula@euaccumsansed.net', '09 78 13 97 55', 'Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non'),
(71, 'Darius', 'Fletcher Travis', 'Sed.eu@Duis.ca', '05 93 20 55 61', 'sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis'),
(72, 'Knox', 'Brady Hutchinson', 'Proin.vel@atarcu.net', '06 93 28 33 38', 'tellus faucibus leo, in lobortis tellus justo sit amet nulla.'),
(73, 'Gary', 'Buckminster Murray', 'et@semperNamtempor.co.uk', '07 12 69 59 18', 'ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor.'),
(74, 'Blaze', 'Declan Wiley', 'mus.Proin@arcu.org', '05 78 69 16 93', 'dolor. Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing'),
(75, 'Phelan', 'Fulton Shepherd', 'velit.dui@Quisque.org', '09 52 32 35 79', 'sem, vitae aliquam eros turpis non enim. Mauris quis turpis'),
(76, 'Malachi', 'Malachi Fisher', 'Suspendisse.sed.dolor@varius.net', '02 08 12 15 37', 'sem semper erat, in consectetuer ipsum nunc id enim. Curabitur'),
(77, 'Cameron', 'Kirk Acevedo', 'eu@ornareIn.ca', '02 90 82 37 62', 'pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper,'),
(78, 'Blake', 'Fitzgerald Preston', 'vulputate.ullamcorper.magna@urnaUttincidunt.co.uk', '04 80 91 83 09', 'amet nulla. Donec non justo. Proin non massa non ante'),
(79, 'Ashton', 'Troy Dean', 'interdum.feugiat@vitaedolorDonec.com', '07 26 15 41 01', 'Donec non justo. Proin non massa non ante bibendum ullamcorper.'),
(80, 'Scott', 'Rooney Reeves', 'fermentum@netuset.ca', '06 45 48 99 80', 'gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat.'),
(81, 'Joshua', 'Melvin Rojas', 'leo.Morbi@velvulputate.ca', '08 80 02 26 90', 'erat. Sed nunc est, mollis non, cursus non, egestas a,'),
(82, 'Prescott', 'Drew Johnson', 'hendrerit.Donec@fermentumrisusat.org', '03 40 94 40 58', 'Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu,'),
(83, 'Reuben', 'Channing Crosby', 'Nam.ac.nulla@eleifend.edu', '04 93 28 23 82', 'feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam'),
(84, 'Colorado', 'Calvin Pittman', 'ante.ipsum@Suspendissealiquetmolestie.edu', '03 22 71 99 02', 'sem magna nec quam. Curabitur vel lectus. Cum sociis natoque'),
(85, 'Chase', 'Norman Mcclure', 'Suspendisse.aliquet@erat.ca', '04 36 03 47 09', 'malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas,'),
(86, 'Tobias', 'Buckminster Bowman', 'at.augue.id@NullafacilisisSuspendisse.com', '03 04 70 02 92', 'nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis'),
(87, 'Quamar', 'Steel Morse', 'fringilla.mi.lacinia@urnaconvallis.co.uk', '01 87 69 25 85', 'Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit'),
(88, 'Mark', 'Owen Stephens', 'elit.a@acfeugiat.com', '05 00 59 13 98', 'Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam.'),
(89, 'Luke', 'Elmo Griffin', 'sagittis.Nullam@egestas.com', '05 86 31 76 89', 'erat vitae risus. Duis a mi fringilla mi lacinia mattis.'),
(90, 'Alfonso', 'Igor Salas', 'tempor@blandit.com', '06 24 44 40 10', 'pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero'),
(91, 'Alvin', 'Rogan Holland', 'sed.consequat@nec.edu', '08 78 97 77 57', 'scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada'),
(92, 'Keaton', 'Kuame Acevedo', 'et.euismod.et@pellentesquemassalobortis.net', '05 48 79 80 26', 'Proin nisl sem, consequat nec, mollis vitae, posuere at, velit.'),
(93, 'Christian', 'Allistair Miles', 'eu@nasceturridiculus.com', '06 69 39 43 29', 'vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi'),
(94, 'Samson', 'Hyatt Garrett', 'magna@Donectincidunt.ca', '06 61 19 46 80', 'metus. In nec orci. Donec nibh. Quisque nonummy ipsum non'),
(95, 'Mohammad', 'Len Armstrong', 'ante.dictum.cursus@Crassedleo.co.uk', '01 43 66 86 46', 'felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit'),
(96, 'Zachary', 'Silas Hodge', 'lacus.varius.et@ProinvelitSed.net', '03 61 37 44 42', 'sit amet ornare lectus justo eu arcu. Morbi sit amet'),
(97, 'Hamilton', 'Keane Berger', 'libero.nec@tristique.co.uk', '04 37 73 11 45', 'ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque'),
(98, 'Orlando', 'Zeph Duran', 'in.molestie@eratEtiamvestibulum.ca', '09 37 70 74 48', 'turpis egestas. Fusce aliquet magna a neque. Nullam ut nisi'),
(99, 'Alden', 'Rooney Vazquez', 'dictum.placerat.augue@aliquet.co.uk', '06 01 10 42 17', 'accumsan convallis, ante lectus convallis est, vitae sodales nisi magna'),
(100, 'Cruz', 'Tanek Knox', 'ornare@velitegestas.org', '03 13 13 07 46', 'Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel'),
(101, 'Acton', 'Henry Meadows', 'neque.In.ornare@at.co.uk', '05 68 65 87 44', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam auctor,');

-- --------------------------------------------------------

--
-- Contenu de la table `Taxe`
--

INSERT INTO `Taxe` (`id`, `libelle`, `taux`, `date`, `datemodif`) VALUES
(1, 'Lacus Varius Inc.', 15.00, '2013-12-01 12:16:36', '2015-06-03 18:31:16'),
(2, 'Sapien Ltd', 16.00, '2014-11-02 01:04:09', '2015-06-07 00:29:31'),
(3, 'Odio Tristique Pharetra Inc.', 17.00, '2013-07-17 14:15:47', '2015-06-10 21:38:11'),
(4, 'Facilisis Suspendisse Institute', 15.00, '2015-02-24 10:44:29', '2015-06-14 22:17:10'),
(5, 'Eget Metus Consulting', 18.00, '2014-05-06 00:05:37', '2015-06-09 21:20:50'),
(6, 'A Mi Fringilla Foundation', 2.00, '2015-04-01 23:50:29', '2015-06-16 22:06:42'),
(7, 'Ultrices Vivamus Rhoncus PC', 1.00, '2014-12-07 22:04:37', '2015-06-22 11:21:31'),
(8, 'Lorem Vehicula Foundation', 20.00, '2014-09-10 16:02:50', '2015-06-03 15:22:39'),
(9, 'Mauris Industries', 16.00, '2014-08-06 22:31:38', '2015-06-18 15:08:24'),
(10, 'Sed Inc.', 14.00, '2014-10-12 12:55:36', '2015-06-11 06:05:30'),
(11, 'Elit Fermentum Associates', 13.00, '2014-07-18 22:59:18', '2015-06-23 18:43:26'),
(12, 'Eget Ipsum Donec Industries', 5.00, '2014-07-07 02:57:35', '2015-06-20 22:13:35'),
(13, 'Ac Ltd', 7.00, '2013-10-14 05:47:04', '2015-06-09 15:59:42'),
(14, 'Fusce Aliquet Magna Corp.', 7.00, '2014-02-13 08:05:57', '2015-06-09 05:40:04'),
(15, 'Orci Ut Inc.', 8.00, '2015-05-06 05:27:16', '2015-06-12 22:47:19'),
(16, 'Eget PC', 18.00, '2014-06-02 21:30:59', '2015-06-12 04:16:09'),
(17, 'Eros Nam Consequat PC', 12.00, '2013-07-19 02:21:37', '2015-06-09 08:32:14'),
(18, 'Eget Lacus Associates', 5.00, '2014-12-19 08:46:58', '2015-06-06 18:44:43'),
(19, 'Et Lacinia Vitae Company', 20.00, '2014-02-05 02:41:45', '2015-06-14 18:24:00'),
(20, 'Cursus Ltd', 3.00, '2014-11-15 02:30:15', '2015-06-21 23:51:51'),
(21, 'Mollis Corporation', 3.00, '2014-12-11 12:39:55', '2015-06-24 21:25:49'),
(22, 'Aenean Euismod Corporation', 1.00, '2015-03-23 13:48:51', '2015-06-21 20:33:18'),
(23, 'Pharetra Company', 10.00, '2014-08-25 00:29:48', '2015-06-04 14:26:08'),
(24, 'Sapien Corporation', 7.00, '2013-08-12 13:10:06', '2015-06-11 10:34:18'),
(25, 'Suspendisse Dui Fusce Industries', 10.00, '2015-05-09 13:53:01', '2015-06-20 18:25:53'),
(26, 'Hendrerit Id Ante Industries', 16.00, '2013-09-24 11:49:11', '2015-06-17 20:08:43'),
(27, 'Integer Mollis Integer Industries', 11.00, '2015-03-13 06:11:37', '2015-06-14 01:43:50'),
(28, 'Vivamus Nibh Industries', 4.00, '2013-12-06 22:50:09', '2015-06-21 05:33:22'),
(29, 'Mauris Ut Company', 6.00, '2015-04-27 08:54:50', '2015-06-17 11:53:56'),
(30, 'Faucibus Orci Luctus Ltd', 7.00, '2014-10-06 08:43:47', '2015-06-21 02:53:30'),
(31, 'Nullam Enim Sed PC', 9.00, '2015-02-07 09:44:24', '2015-06-17 07:44:46'),
(32, 'Iaculis Nec Ltd', 6.00, '2014-03-16 22:55:48', '2015-06-21 22:49:39'),
(33, 'Elit Incorporated', 19.00, '2013-10-31 22:39:23', '2015-06-10 08:35:36'),
(34, 'Sed Pede PC', 5.00, '2014-04-01 18:53:33', '2015-06-04 01:56:42'),
(35, 'Mauris Sagittis Corporation', 2.00, '2015-05-25 04:30:32', '2015-06-04 20:05:53'),
(36, 'Egestas Aliquam Consulting', 19.00, '2014-10-27 05:16:44', '2015-06-11 12:30:36'),
(37, 'Nunc Mauris Sapien Consulting', 11.00, '2015-01-30 02:45:14', '2015-06-12 19:40:58'),
(38, 'Blandit Mattis Consulting', 16.00, '2013-08-14 11:36:38', '2015-06-26 02:35:12'),
(39, 'Arcu Nunc Mauris PC', 11.00, '2013-09-12 01:48:41', '2015-06-05 18:51:13'),
(40, 'Mauris A Nunc Company', 14.00, '2014-07-02 00:16:13', '2015-06-16 03:29:06'),
(41, 'Pharetra Industries', 13.00, '2015-05-17 01:40:44', '2015-06-02 02:37:37'),
(42, 'Sem Corporation', 7.00, '2014-05-03 07:34:17', '2015-06-09 15:06:07'),
(43, 'Metus Associates', 3.00, '2013-08-16 13:17:25', '2015-06-22 05:05:39'),
(44, 'Sed Hendrerit Incorporated', 20.00, '2014-04-25 22:40:42', '2015-06-19 03:31:13'),
(45, 'Enim Corporation', 13.00, '2014-09-02 08:16:37', '2015-06-02 06:47:32'),
(46, 'Ipsum Industries', 19.00, '2015-06-02 17:11:53', '2015-06-19 11:51:20'),
(47, 'Tempor Arcu Vestibulum Corp.', 1.00, '2015-06-22 14:35:53', '2015-06-08 14:16:02'),
(48, 'Curabitur Sed Company', 11.00, '2014-10-07 20:42:52', '2015-06-18 14:38:35'),
(49, 'Tincidunt Ltd', 12.00, '2013-08-18 07:16:18', '2015-06-05 10:58:22'),
(50, 'Pharetra LLC', 16.00, '2015-05-18 14:22:35', '2015-06-19 13:54:04'),
(51, 'Semper Corporation', 15.00, '2014-08-28 20:55:54', '2015-06-10 17:30:54'),
(52, 'Dolor Institute', 19.00, '2014-07-30 20:18:42', '2015-06-01 05:00:24'),
(53, 'Non Industries', 5.00, '2013-09-06 04:08:54', '2015-06-08 13:25:43'),
(54, 'Vitae Sodales Nisi Incorporated', 7.00, '2013-07-12 17:31:03', '2015-06-12 13:50:28'),
(55, 'Duis A Mi Company', 18.00, '2014-10-15 07:48:10', '2015-06-14 23:32:13'),
(56, 'Praesent Luctus Institute', 15.00, '2014-07-10 14:28:08', '2015-06-09 09:15:25'),
(57, 'Dui LLC', 10.00, '2014-03-05 23:00:25', '2015-06-05 05:19:17'),
(58, 'Consectetuer Mauris Id LLP', 16.00, '2013-10-09 21:35:08', '2015-06-07 14:03:56'),
(59, 'Risus Nulla Industries', 18.00, '2014-03-11 02:50:46', '2015-06-10 19:22:27'),
(60, 'Mauris Aliquam Eu Associates', 9.00, '2014-03-27 18:06:03', '2015-06-08 21:19:16'),
(61, 'Vestibulum Massa Rutrum LLP', 3.00, '2013-07-29 23:11:33', '2015-06-10 12:39:59'),
(62, 'Integer Sem Corp.', 11.00, '2014-05-02 22:51:25', '2015-06-15 10:03:25'),
(63, 'Sem Elit Pharetra Consulting', 7.00, '2014-08-05 14:44:14', '2015-06-24 19:15:24'),
(64, 'Aliquet Molestie Tellus Industries', 2.00, '2014-05-17 10:23:28', '2015-06-19 06:21:21'),
(65, 'Magna Ut Inc.', 13.00, '2015-01-08 13:46:24', '2015-06-13 14:18:42'),
(66, 'Justo Faucibus Industries', 15.00, '2013-10-11 00:07:36', '2015-06-15 15:59:15'),
(67, 'Volutpat Nulla Corp.', 7.00, '2014-11-01 03:50:29', '2015-06-07 00:21:25'),
(68, 'Dui Institute', 5.00, '2014-03-11 01:51:21', '2015-06-13 23:52:56'),
(69, 'Dolor Sit Company', 14.00, '2013-07-31 07:29:18', '2015-06-18 21:11:30'),
(70, 'Nullam Enim Sed Institute', 6.00, '2013-07-15 17:21:40', '2015-06-03 17:42:20'),
(71, 'Cras Dolor Dolor Incorporated', 5.00, '2014-04-14 06:14:45', '2015-06-23 22:49:20'),
(72, 'Eget Metus Eu Incorporated', 20.00, '2015-01-19 07:56:30', '2015-06-12 15:05:46'),
(73, 'Vitae LLC', 7.00, '2014-01-20 14:11:31', '2015-06-06 07:59:02'),
(74, 'Vel Venenatis Vel Inc.', 5.00, '2015-01-08 11:23:49', '2015-06-18 02:19:46'),
(75, 'Placerat Eget Venenatis LLP', 3.00, '2013-12-07 21:07:15', '2015-06-21 19:46:37'),
(76, 'Elit Foundation', 7.00, '2015-02-23 15:12:21', '2015-06-14 20:49:19'),
(77, 'Ac Feugiat Institute', 14.00, '2015-04-01 23:21:43', '2015-06-01 23:32:15'),
(78, 'Vitae Aliquam Eros Associates', 8.00, '2015-03-08 15:27:40', '2015-06-02 21:36:43'),
(79, 'Amet Dapibus Corporation', 16.00, '2015-04-09 20:17:09', '2015-06-24 15:33:35'),
(80, 'Integer Incorporated', 10.00, '2014-04-26 07:40:41', '2015-06-10 03:50:47'),
(81, 'Ligula Incorporated', 9.00, '2014-12-23 00:35:06', '2015-06-16 08:38:10'),
(82, 'Diam Nunc Consulting', 7.00, '2014-06-15 13:14:16', '2015-06-07 17:54:06'),
(83, 'Tempor Lorem Eget Foundation', 19.00, '2014-04-12 04:16:56', '2015-06-03 08:44:45'),
(84, 'Eu Neque Associates', 10.00, '2014-10-16 07:58:40', '2015-06-07 17:19:07'),
(85, 'Scelerisque Scelerisque Dui Corporation', 19.00, '2015-02-13 15:53:42', '2015-06-16 14:43:45'),
(86, 'Erat Eget Ipsum LLP', 15.00, '2013-08-17 02:04:32', '2015-06-26 16:09:01'),
(87, 'Sed Foundation', 20.00, '2014-07-02 06:15:39', '2015-06-25 15:53:37'),
(88, 'Praesent Consulting', 11.00, '2014-04-06 07:35:10', '2015-06-10 04:54:25'),
(89, 'Enim Non Corp.', 5.00, '2013-08-17 08:36:32', '2015-06-16 12:40:23'),
(90, 'Sollicitudin A LLP', 6.00, '2014-04-15 05:48:50', '2015-06-14 03:03:36'),
(91, 'Eu Lacus Associates', 16.00, '2014-04-19 21:04:36', '2015-06-14 22:47:45'),
(92, 'Vitae Aliquet Nec Company', 15.00, '2014-11-24 00:12:48', '2015-06-18 23:20:01'),
(93, 'Nullam Velit Dui Ltd', 17.00, '2014-03-12 12:10:25', '2015-06-15 09:08:39'),
(94, 'Orci Lacus Vestibulum Corporation', 8.00, '2013-09-01 04:08:53', '2015-06-26 08:16:23'),
(95, 'Dignissim Limited', 4.00, '2014-05-24 01:44:55', '2015-06-01 16:35:35'),
(96, 'Orci Consectetuer Consulting', 6.00, '2015-06-21 14:31:27', '2015-06-05 03:00:02'),
(97, 'Odio Vel Est Corporation', 7.00, '2014-08-11 20:44:27', '2015-06-10 04:33:51'),
(98, 'Lectus Convallis LLP', 7.00, '2014-01-27 14:50:39', '2015-06-03 00:51:32'),
(99, 'Ornare Company', 2.00, '2013-10-03 20:25:44', '2015-06-18 00:19:24'),
(100, 'Aptent Taciti Company', 17.00, '2013-12-17 10:33:04', '2015-06-22 23:48:02');


INSERT INTO `Produit` (`id`, `libelle`, `prix`, `ordonnance`, `commentaire`, `alerte`, `conditionnement`, `idclasse`, `idtaxe`) VALUES
(1, 'morbi', 742.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 2, 'aliquam eros turpis non enim. Mauris', 54, 48),
(2, 'inceptos', 740.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 42, 'massa. Suspendisse eleifend. Cras sed leo. Cras vehicula', 63, 84),
(3, 'sodales', 853.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 48, 'elit. Curabitur sed tortor. Integer aliquam adipiscing', 56, 34),
(4, 'nunc', 568.00, 1, 'Lorem ipsum dolor', 87, 'in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan', 75, 7),
(5, 'urna', 58.00, 0, 'Lorem ipsum dolor', 97, 'auctor ullamcorper, nisl arcu iaculis enim,', 53, 16),
(6, 'arcu', 688.00, 0, 'Lorem ipsum dolor sit amet, consectetuer', 96, 'Vestibulum accumsan neque et nunc. Quisque', 72, 89),
(7, 'Aliquam', 808.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 48, 'Nunc ut erat. Sed nunc est, mollis non, cursus non,', 80, 25),
(8, 'non', 183.00, 0, 'Lorem', 24, 'dolor sit amet, consectetuer adipiscing elit. Curabitur sed', 92, 6),
(9, 'Etiam', 89.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 97, 'ut mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet', 41, 35),
(10, 'natoque', 464.00, 0, 'Lorem ipsum dolor sit amet,', 34, 'sed pede nec ante blandit viverra. Donec tempus, lorem fringilla', 47, 86),
(11, 'Donec', 721.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 44, 'Sed', 47, 96),
(12, 'facilisis.', 729.00, 0, 'Lorem ipsum dolor sit amet, consectetuer', 85, 'arcu et pede. Nunc', 13, 16),
(13, 'auctor', 171.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 47, 'tellus', 53, 89),
(14, 'nec,', 531.00, 0, 'Lorem ipsum dolor sit', 18, 'non ante bibendum', 29, 91),
(15, 'dictum', 654.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 62, 'urna. Ut tincidunt vehicula risus.', 48, 49),
(16, 'iaculis', 236.00, 0, 'Lorem', 49, 'Aliquam gravida mauris', 73, 86),
(17, 'egestas.', 701.00, 0, 'Lorem ipsum dolor', 2, 'Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus', 92, 39),
(18, 'parturient', 565.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 67, 'posuere, enim nisl elementum purus, accumsan interdum libero dui', 2, 77),
(19, 'nisl.', 233.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 20, 'nunc nulla vulputate dui, nec tempus', 55, 61),
(20, 'feugiat', 617.00, 1, 'Lorem ipsum', 92, 'sodales', 16, 40),
(21, 'Fusce', 232.00, 1, 'Lorem ipsum dolor sit amet,', 67, 'vitae risus. Duis a mi fringilla mi lacinia', 99, 43),
(22, 'sit', 725.00, 1, 'Lorem', 97, 'ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu', 46, 62),
(23, 'enim,', 42.00, 1, 'Lorem', 3, 'sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo.', 29, 74),
(24, 'Donec', 99.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 4, 'Integer sem elit, pharetra ut, pharetra', 46, 43),
(25, 'magnis', 583.00, 1, 'Lorem ipsum dolor sit amet,', 64, 'malesuada vel, convallis in,', 64, 79),
(26, 'sem,', 476.00, 1, 'Lorem ipsum dolor sit amet, consectetuer', 71, 'justo nec ante.', 1, 72),
(27, 'sem', 602.00, 1, 'Lorem ipsum dolor', 14, 'ante bibendum ullamcorper. Duis cursus, diam at', 98, 62),
(28, 'Quisque', 147.00, 1, 'Lorem ipsum dolor', 90, 'mi eleifend egestas. Sed', 50, 54),
(29, 'dapibus', 106.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', 39, 'augue porttitor', 24, 27),
(30, 'tempus', 195.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 29, 'consequat nec, mollis vitae,', 26, 45),
(31, 'ut', 13.00, 0, 'Lorem ipsum dolor sit amet, consectetuer', 80, 'dolor, nonummy ac, feugiat non,', 3, 80),
(32, 'odio.', 881.00, 1, 'Lorem ipsum dolor', 90, 'sit amet luctus', 68, 39),
(33, 'arcu', 486.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 13, 'aliquam', 34, 59),
(34, 'eu,', 120.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 42, 'sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed', 40, 53),
(35, 'elementum', 718.00, 1, 'Lorem', 33, 'eu', 76, 79),
(36, 'mus.', 607.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 68, 'eu, odio. Phasellus at augue id ante dictum cursus. Nunc', 86, 16),
(37, 'feugiat', 10.00, 0, 'Lorem', 64, 'porta elit, a feugiat', 12, 2),
(38, 'enim.', 874.00, 1, 'Lorem ipsum dolor sit amet,', 5, 'auctor velit.', 52, 82),
(39, 'ac', 575.00, 0, 'Lorem', 5, 'ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor.', 71, 56),
(40, 'vitae', 751.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 66, 'Fusce aliquet magna', 44, 12),
(41, 'consequat', 831.00, 0, 'Lorem ipsum dolor', 45, 'orci quis lectus. Nullam suscipit, est', 62, 2),
(42, 'leo.', 508.00, 1, 'Lorem', 90, 'semper. Nam tempor diam dictum', 64, 35),
(43, 'libero', 270.00, 0, 'Lorem ipsum dolor', 73, 'odio semper cursus.', 82, 97),
(44, 'convallis', 893.00, 0, 'Lorem ipsum dolor sit amet, consectetuer', 22, 'in, cursus et, eros. Proin', 66, 31),
(45, 'ac', 758.00, 0, 'Lorem ipsum dolor sit amet, consectetuer', 48, 'ipsum sodales purus, in', 66, 68),
(46, 'sit', 322.00, 0, 'Lorem ipsum dolor sit', 91, 'egestas a, dui. Cras', 36, 42),
(47, 'sem', 144.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 35, 'sit amet, consectetuer adipiscing', 91, 11),
(48, 'Nunc', 835.00, 1, 'Lorem ipsum dolor sit amet, consectetuer', 30, 'congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum', 48, 50),
(49, 'adipiscing', 635.00, 1, 'Lorem ipsum', 93, 'gravida sagittis. Duis gravida. Praesent eu nulla at', 78, 49),
(50, 'Suspendisse', 331.00, 0, 'Lorem ipsum dolor sit amet, consectetuer', 76, 'Mauris', 68, 46),
(51, 'urna,', 651.00, 1, 'Lorem ipsum dolor sit amet,', 50, 'libero. Integer in magna. Phasellus', 75, 14),
(52, 'sit', 733.00, 0, 'Lorem', 53, 'accumsan convallis, ante', 67, 10),
(53, 'facilisis.', 541.00, 1, 'Lorem ipsum dolor sit', 61, 'dolor. Fusce mi lorem, vehicula et,', 53, 79),
(54, 'ante.', 390.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 80, 'arcu. Vestibulum ante ipsum', 13, 16),
(55, 'odio', 434.00, 1, 'Lorem ipsum dolor sit amet,', 13, 'consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus', 99, 22),
(56, 'In', 769.00, 0, 'Lorem ipsum', 97, 'sagittis. Duis gravida.', 91, 81),
(57, 'risus.', 194.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', 51, 'sem ut', 70, 55),
(58, 'Aliquam', 100.00, 0, 'Lorem ipsum dolor sit', 11, 'dolor. Donec fringilla. Donec', 73, 99),
(59, 'neque.', 439.00, 1, 'Lorem ipsum', 18, 'sit amet,', 82, 32),
(60, 'ac', 348.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 46, 'Cras dolor dolor, tempus', 73, 60),
(61, 'et', 27.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 56, 'nisi nibh lacinia orci, consectetuer euismod est', 3, 40),
(62, 'gravida', 935.00, 0, 'Lorem ipsum', 20, 'facilisis vitae, orci. Phasellus', 22, 72),
(63, 'Morbi', 909.00, 1, 'Lorem ipsum dolor', 50, 'vel, faucibus id, libero. Donec consectetuer mauris id', 29, 88),
(64, 'Cras', 618.00, 0, 'Lorem ipsum', 71, 'mollis nec, cursus a, enim. Suspendisse aliquet, sem', 32, 27),
(65, 'diam', 130.00, 0, 'Lorem ipsum dolor sit', 95, 'felis eget varius ultrices, mauris ipsum porta', 74, 32),
(66, 'In', 618.00, 1, 'Lorem ipsum dolor sit amet,', 53, 'sem', 98, 27),
(67, 'purus.', 898.00, 1, 'Lorem ipsum dolor sit amet,', 68, 'lacinia at,', 83, 93),
(68, 'orci', 870.00, 0, 'Lorem ipsum dolor sit amet, consectetuer', 10, 'urna et', 77, 50),
(69, 'sed,', 473.00, 0, 'Lorem ipsum dolor sit amet,', 93, 'lacus. Ut nec urna et arcu', 86, 2),
(70, 'mi', 342.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 95, 'et netus', 94, 91),
(71, 'tincidunt', 690.00, 0, 'Lorem ipsum', 93, 'vitae mauris sit amet lorem semper auctor. Mauris', 99, 59),
(72, 'lorem', 606.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 58, 'lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor', 79, 27),
(73, 'eu', 441.00, 0, 'Lorem', 65, 'Quisque ornare tortor at risus. Nunc ac sem ut', 39, 65),
(74, 'dictum', 383.00, 0, 'Lorem ipsum dolor sit amet, consectetuer', 57, 'Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere', 68, 48),
(75, 'enim', 341.00, 0, 'Lorem ipsum dolor sit amet, consectetuer', 8, 'mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In', 61, 74),
(76, 'egestas', 175.00, 0, 'Lorem ipsum', 72, 'in, hendrerit consectetuer, cursus', 99, 43),
(77, 'est.', 787.00, 0, 'Lorem ipsum dolor sit', 36, 'scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed', 54, 29),
(78, 'sagittis', 277.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', 75, 'blandit congue. In scelerisque scelerisque', 88, 89),
(79, 'rhoncus', 5.00, 0, 'Lorem', 48, 'gravida non, sollicitudin a, malesuada id,', 25, 87),
(80, 'amet', 783.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 29, 'nibh', 73, 77),
(81, 'quis,', 732.00, 0, 'Lorem', 24, 'tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec,', 100, 25),
(82, 'semper', 300.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', 55, 'neque et nunc. Quisque ornare tortor at risus. Nunc', 25, 92),
(83, 'nulla.', 218.00, 1, 'Lorem ipsum', 53, 'Donec tincidunt. Donec vitae erat', 32, 39),
(84, 'mus.', 933.00, 0, 'Lorem ipsum dolor', 35, 'sodales.', 7, 46),
(85, 'odio.', 421.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', 95, 'Aenean gravida nunc sed pede. Cum sociis natoque penatibus', 50, 75),
(86, 'neque.', 105.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 38, 'porttitor scelerisque neque.', 47, 9),
(87, 'aliquam', 872.00, 0, 'Lorem ipsum dolor sit amet,', 41, 'arcu. Vestibulum ante', 68, 26),
(88, 'id', 96.00, 0, 'Lorem ipsum dolor sit', 55, 'vulputate', 73, 30),
(89, 'tellus', 506.00, 0, 'Lorem ipsum dolor sit', 56, 'nunc nulla vulputate', 32, 40),
(90, 'nunc', 529.00, 0, 'Lorem ipsum dolor sit', 7, 'nisl arcu iaculis enim, sit amet ornare lectus', 83, 49),
(91, 'molestie', 929.00, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 73, 'nisi. Mauris', 34, 48),
(92, 'commodo', 892.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 60, 'magna a tortor. Nunc commodo auctor velit.', 48, 71),
(93, 'amet', 415.00, 0, 'Lorem ipsum dolor', 94, 'amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus.', 16, 98),
(94, 'Etiam', 997.00, 0, 'Lorem ipsum dolor', 13, 'nibh enim, gravida sit amet, dapibus id,', 24, 44),
(95, 'Ut', 933.00, 1, 'Lorem ipsum dolor sit amet,', 29, 'Morbi metus. Vivamus euismod urna. Nullam lobortis', 47, 100),
(96, 'consequat,', 1.00, 0, 'Lorem ipsum dolor sit amet,', 6, 'eget nisi dictum', 6, 37),
(97, 'ligula.', 656.00, 0, 'Lorem ipsum', 69, 'molestie sodales. Mauris blandit enim consequat', 75, 10),
(98, 'tempor', 5.00, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 94, 'tortor', 77, 92),
(99, 'dictum', 228.00, 1, 'Lorem ipsum dolor sit amet, consectetuer', 75, 'Nulla facilisi. Sed neque. Sed eget lacus. Mauris non', 75, 67),
(100, 'neque.', 305.00, 1, 'Lorem ipsum', 8, 'eu neque pellentesque massa lobortis ultrices.', 85, 3);

-- --------------------------------------------------------
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("egestas a, scelerisque","Ap #753-9458 Lectus. Street","08 29 00 85 54","lobortis@aliquetProin.ca","semper tellus id nunc interdum feugiat. Sed nec metus facilisis");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("mi. Duis risus","Ap #785-2008 Ipsum. Avenue","09 76 50 86 91","enim@rutrumFuscedolor.org","Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("enim commodo hendrerit.","Ap #274-5183 Mauris Street","07 59 83 27 99","nec@lectus.net","mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare,");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("lobortis tellus justo","Ap #612-6730 Nec, Av.","05 09 00 06 99","Cum@etpede.co.uk","et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("gravida. Aliquam tincidunt,","5864 Mauris St.","09 27 32 85 27","pede.Suspendisse@diameudolor.com","consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("Quisque purus sapien,","513-570 Nunc Rd.","07 68 90 82 12","egestas.Aliquam.fringilla@sociisnatoquepenatibus.net","arcu. Vestibulum ante ipsum primis in faucibus orci luctus et");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("lectus ante dictum","9899 Ut, Av.","08 12 87 17 13","Ut.semper@sedturpis.org","vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("lacus. Ut nec","P.O. Box 289, 7220 Mollis. Av.","05 22 68 09 17","ornare.tortor@justo.net","mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("ornare, elit elit","Ap #997-1140 Sed, Av.","09 61 65 93 30","nunc.sed@actellusSuspendisse.co.uk","eros nec tellus. Nunc lectus pede, ultrices a, auctor non,");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("amet, consectetuer adipiscing","P.O. Box 662, 8409 Blandit St.","06 49 74 69 45","Nullam.feugiat.placerat@ultrices.net","eget nisi dictum augue malesuada malesuada. Integer id magna et");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("ultricies ornare, elit","P.O. Box 700, 1876 Ut St.","05 69 69 33 77","risus.varius.orci@Aliquamultricesiaculis.com","in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("amet massa. Quisque","953-9059 Ipsum Street","05 15 35 59 83","sit.amet.orci@erosnectellus.org","facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("Praesent eu nulla","P.O. Box 374, 8106 Ante Ave","02 28 48 40 03","ridiculus.mus.Proin@dictumaugue.net","Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("placerat. Cras dictum","536 Felis Street","06 45 93 71 82","et@Sed.ca","Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("at auctor ullamcorper,","Ap #567-1615 Id Ave","04 02 71 76 41","nec.tempus.mauris@magnamalesuada.ca","sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("Proin eget odio.","2084 Eleifend Street","05 32 45 45 74","ornare.tortor@nec.co.uk","sodales nisi magna sed dui. Fusce aliquam, enim nec tempus");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("vitae diam. Proin","P.O. Box 965, 5467 Morbi Rd.","01 81 31 57 94","metus@ullamcorper.ca","feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare,");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("pharetra, felis eget","P.O. Box 332, 8038 Mi Avenue","01 40 65 31 93","et@Crasloremlorem.com","porta elit, a feugiat tellus lorem eu metus. In lorem.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("Donec tempus, lorem","657-1954 Cursus. Ave","08 41 22 17 62","tincidunt.orci@Suspendisse.edu","sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("auctor ullamcorper, nisl","9654 Libero. Ave","07 89 14 37 93","gravida.nunc@amet.co.uk","aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("tempor lorem, eget","P.O. Box 850, 3175 Ut St.","02 84 81 92 38","pharetra.sed.hendrerit@lacusMauris.edu","ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("diam. Duis mi","1463 Nulla St.","09 33 09 22 78","commodo@velpede.co.uk","per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("est ac facilisis","P.O. Box 479, 6314 Neque St.","07 93 24 77 83","Cras@Nullamsuscipit.ca","elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("risus. Quisque libero","Ap #898-6236 Mi. Rd.","02 41 68 78 15","pede.nec.ante@atortor.ca","libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et,");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("elit, dictum eu,","Ap #796-2803 Ut Ave","07 24 16 27 14","vitae.semper@Nullamscelerisque.com","augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed,");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("diam. Duis mi","Ap #532-8990 Augue St.","07 68 97 38 22","a.aliquet@neceuismod.com","aliquet vel, vulputate eu, odio. Phasellus at augue id ante");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("facilisis lorem tristique","P.O. Box 769, 1857 Luctus Street","03 20 63 36 49","Quisque@consectetuercursuset.com","ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae,");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("ornare placerat, orci","3637 Euismod Road","07 29 23 35 19","lectus.pede.ultrices@ipsumdolor.org","Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("tincidunt adipiscing. Mauris","393-1389 Montes, St.","06 26 90 60 51","eu.turpis@liberoMorbiaccumsan.org","velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("Curabitur vel lectus.","P.O. Box 657, 5568 Lectus. Rd.","09 11 37 15 72","in@ipsumprimisin.co.uk","arcu iaculis enim, sit amet ornare lectus justo eu arcu.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("eros. Proin ultrices.","7641 Mauris, Ave","08 45 95 00 42","tortor.nibh.sit@odioEtiam.co.uk","interdum. Sed auctor odio a purus. Duis elementum, dui quis");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("Nunc sollicitudin commodo","153-1336 Cras Street","05 22 58 12 89","vitae.aliquam@Aliquamauctorvelit.net","nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("feugiat metus sit","4531 Nibh. Rd.","04 73 88 48 59","ac.eleifend@mi.edu","eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("risus. Donec egestas.","581-5073 Sagittis Rd.","07 66 22 46 56","malesuada.vel@augueporttitorinterdum.co.uk","dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("lobortis mauris. Suspendisse","Ap #720-550 Odio. St.","07 67 68 28 09","sit.amet.ultricies@egestas.com","eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("facilisis lorem tristique","9100 Torquent Street","04 88 27 42 33","Morbi@ullamcorpervelit.edu","ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("nec enim. Nunc","P.O. Box 695, 9214 Eu Street","05 70 65 44 26","tempor.diam@libero.ca","sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("Donec nibh. Quisque","Ap #674-4155 Euismod Ave","03 98 89 92 33","commodo.tincidunt.nibh@erat.ca","natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("convallis ligula. Donec","P.O. Box 664, 2120 Nulla Rd.","08 99 40 73 41","Integer.in@sollicitudin.org","rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed,");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("Aliquam adipiscing lobortis","6309 In Road","08 50 66 65 87","gravida.molestie@pharetrafelis.co.uk","at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("et libero. Proin","P.O. Box 696, 7308 A, Av.","04 27 59 23 98","accumsan@nasceturridiculusmus.edu","et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("cursus purus. Nullam","P.O. Box 354, 8415 Ipsum Street","02 20 05 79 05","aliquet@enimgravidasit.co.uk","Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("at pretium aliquet,","237-8508 Feugiat St.","08 82 65 32 52","est.mollis@tempordiamdictum.org","nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("risus. Donec egestas.","Ap #101-6245 Facilisis Ave","08 55 68 43 48","Curae.Phasellus@Maecenasmalesuadafringilla.org","ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("feugiat nec, diam.","Ap #962-2689 Nunc Rd.","07 05 66 69 90","metus@musAenean.net","nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("augue, eu tempor","4929 Nam Road","01 42 01 52 18","libero.Integer@laciniaSedcongue.edu","amet, consectetuer adipiscing elit. Aliquam auctor, velit eget laoreet posuere,");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("Ut nec urna","Ap #970-3078 Pellentesque St.","02 37 82 22 92","in@NuncmaurisMorbi.edu","Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("faucibus orci luctus","220-4934 Sagittis St.","05 23 38 30 84","dui.nec.tempus@magnaPhasellus.com","sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("scelerisque neque. Nullam","269-200 Phasellus Road","07 53 44 11 23","convallis@Aeneaneuismod.co.uk","Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("Proin dolor. Nulla","Ap #251-9104 In Ave","07 87 84 83 99","consectetuer.adipiscing@eratnequenon.net","nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("sit amet metus.","Ap #938-4475 Diam Ave","08 65 38 10 51","Mauris.nulla@purussapiengravida.co.uk","Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("imperdiet non, vestibulum","940-1366 Duis Ave","04 83 76 38 22","sit.amet.nulla@diamProindolor.co.uk","aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non,");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("elit sed consequat","Ap #148-7454 Ligula. St.","03 65 55 44 99","Quisque.nonummy.ipsum@scelerisqueloremipsum.net","dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("Donec dignissim magna","Ap #334-3808 Nec Avenue","01 86 12 54 60","Duis@cursusdiamat.org","velit eget laoreet posuere, enim nisl elementum purus, accumsan interdum");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("magna. Praesent interdum","338-8317 Semper, Street","06 49 73 16 69","dignissim.magna@laciniaorciconsectetuer.net","Quisque libero lacus, varius et, euismod et, commodo at, libero.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("odio. Etiam ligula","420-1659 Tellus. Rd.","04 37 88 00 57","ipsum.dolor.sit@idante.co.uk","ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("sollicitudin a, malesuada","9582 Quis Rd.","05 44 18 08 97","Sed.nunc.est@Sedauctor.net","euismod est arcu ac orci. Ut semper pretium neque. Morbi");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("nec tellus. Nunc","1135 Ullamcorper. St.","02 51 12 34 37","mauris.ut.mi@Curabitursed.co.uk","risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("Phasellus in felis.","5879 Augue Rd.","03 83 54 02 98","Nullam.suscipit.est@vulputateullamcorper.net","non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("ac arcu. Nunc","P.O. Box 793, 9644 Ligula Street","08 06 08 37 37","Curabitur.egestas@sempereratin.co.uk","Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("a felis ullamcorper","Ap #371-5746 Accumsan Av.","04 71 79 83 08","velit.eu@lacus.net","sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("ultrices posuere cubilia","9973 Libero Street","09 73 02 86 62","Pellentesque.habitant@pedeCrasvulputate.ca","a neque. Nullam ut nisi a odio semper cursus. Integer");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("sodales purus, in","804-4922 Massa Rd.","04 61 66 55 57","viverra@rutrum.org","Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("diam vel arcu.","Ap #723-2467 Placerat. Ave","05 74 52 06 98","nulla.Cras.eu@Aliquam.net","ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("neque. Nullam ut","P.O. Box 694, 2299 Rutrum. Road","08 73 75 34 99","sit.amet.metus@gravidamauris.co.uk","diam vel arcu. Curabitur ut odio vel est tempor bibendum.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("sit amet risus.","2896 Ornare Rd.","05 41 54 62 44","non.hendrerit@interdumSedauctor.edu","Cras eget nisi dictum augue malesuada malesuada. Integer id magna");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("magna. Praesent interdum","Ap #268-9162 Sed Road","06 72 30 51 33","penatibus.et.magnis@erat.org","purus gravida sagittis. Duis gravida. Praesent eu nulla at sem");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("natoque penatibus et","1162 Scelerisque Rd.","09 06 31 64 43","et@consequatlectus.edu","libero. Proin sed turpis nec mauris blandit mattis. Cras eget");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("non, hendrerit id,","Ap #494-6009 Lorem Avenue","07 24 32 92 55","vulputate.dui.nec@mauris.org","ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("ipsum primis in","9973 Vel, Rd.","05 95 25 87 22","Aliquam.erat@Sedcongue.co.uk","penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("odio sagittis semper.","Ap #980-1178 Sem St.","01 11 06 14 13","consectetuer.euismod@tinciduntorci.edu","eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("Mauris nulla. Integer","2869 Elementum Street","07 93 26 43 95","ante.ipsum.primis@lectus.com","nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("placerat. Cras dictum","P.O. Box 119, 420 Odio. Ave","05 41 46 62 78","sit@diamPellentesquehabitant.edu","Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("cubilia Curae; Phasellus","643-7092 Habitant Ave","09 81 94 82 37","Sed.nunc.est@consequatdolorvitae.net","Nullam velit dui, semper et, lacinia vitae, sodales at, velit.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("nec quam. Curabitur","P.O. Box 982, 9895 Tincidunt. Rd.","04 76 46 55 65","vitae.purus.gravida@euismodenimEtiam.ca","justo. Proin non massa non ante bibendum ullamcorper. Duis cursus,");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("scelerisque neque. Nullam","Ap #102-419 Eu, Ave","08 83 71 10 95","vulputate.mauris@Maurisvelturpis.com","odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("pellentesque eget, dictum","346-4831 Fames Street","01 42 90 66 63","ac@vulputatenisisem.org","imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("nec enim. Nunc","3358 Nunc. Rd.","09 78 26 70 17","Fusce.mi.lorem@imperdiet.ca","in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("tristique neque venenatis","P.O. Box 985, 8829 Dolor. St.","09 95 63 69 47","lectus.sit@arcu.edu","ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("libero at auctor","5488 Tellus Avenue","07 01 21 98 59","dis.parturient@euismodin.co.uk","eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("ac urna. Ut","Ap #651-7908 Vestibulum Ave","09 69 88 83 75","non@nuncsed.ca","id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("ac metus vitae","4151 Lorem, Rd.","02 32 64 34 56","eget.lacus@lacusMauris.net","ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("pede ac urna.","Ap #289-8806 Orci St.","06 79 17 47 87","rutrum@ligulaelitpretium.net","elementum sem, vitae aliquam eros turpis non enim. Mauris quis");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("urna, nec luctus","Ap #274-1629 Nec Avenue","01 48 96 63 49","amet.consectetuer@tincidunt.edu","facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("mi tempor lorem,","P.O. Box 993, 7263 Euismod St.","04 74 20 65 79","ornare.libero.at@laoreet.co.uk","Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("arcu. Vivamus sit","P.O. Box 813, 2369 Nec St.","04 24 73 88 64","Sed@aliquet.ca","elit, a feugiat tellus lorem eu metus. In lorem. Donec");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("vitae dolor. Donec","Ap #674-9588 Vel St.","01 92 73 29 88","hendrerit.consectetuer@sit.co.uk","Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("hymenaeos. Mauris ut","Ap #781-2649 Ultricies Av.","06 75 48 18 46","Integer@arcuVivamus.org","purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("lectus, a sollicitudin","864-3241 Sit Street","07 45 93 69 32","Aenean@liberoat.com","in faucibus orci luctus et ultrices posuere cubilia Curae; Donec");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("ac facilisis facilisis,","Ap #528-5769 Diam Rd.","04 95 20 69 07","non@elitsedconsequat.com","vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("aptent taciti sociosqu","Ap #226-9303 Cras St.","01 73 53 33 73","blandit@odiosemper.com","purus. Maecenas libero est, congue a, aliquet vel, vulputate eu,");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("quis diam. Pellentesque","Ap #450-6537 Dolor, Avenue","01 56 33 14 39","enim@dictumPhasellus.org","In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("felis ullamcorper viverra.","654-8421 Non, Ave","06 78 62 89 99","Curabitur.sed@ultricesVivamus.org","varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("in sodales elit","P.O. Box 989, 6247 Nibh Rd.","03 88 43 53 77","quam@nislNulla.com","felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla.");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("ante dictum mi,","9571 Mollis St.","02 33 38 37 42","pede@orciUt.com","Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus,");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("amet, dapibus id,","879-2901 Nec, Ave","02 81 98 34 24","tempor@etmagnisdis.org","Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("velit. Pellentesque ultricies","1457 Nullam St.","06 60 48 20 07","Quisque@ut.org","diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae,");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("sed, est. Nunc","4517 Enim. Av.","02 63 14 98 26","tempor@mauris.com","faucibus leo, in lobortis tellus justo sit amet nulla. Donec");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("sed leo. Cras","9603 Metus. Road","06 98 10 14 87","ipsum@magnamalesuadavel.org","non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum");
INSERT INTO `Fournisseur` (`Libelle`,`Adresse`,`Tel`,`Mail`,`Commentaire`) VALUES ("eu tellus eu","429-5826 Elit Avenue","09 88 33 58 74","nonummy.ipsum.non@primisinfaucibus.com","dui lectus rutrum urna, nec luctus felis purus ac tellus.");
