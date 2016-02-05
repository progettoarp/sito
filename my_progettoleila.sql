-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2016 alle 12:18
-- Versione del server: 5.1.71-community-log
-- PHP Version: 5.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_progettoleila`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `db_impostazioni`
--

CREATE TABLE IF NOT EXISTS `db_impostazioni` (
  `idImpo` int(11) NOT NULL AUTO_INCREMENT,
  `str_name` varchar(20) NOT NULL,
  `str_value` varchar(50) NOT NULL,
  PRIMARY KEY (`idImpo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `db_impostazioni`
--

INSERT INTO `db_impostazioni` (`idImpo`, `str_name`, `str_value`) VALUES
(1, 'username', 'admin'),
(2, 'password', 'admin'),
(3, 'modalita_notte', 'true'),
(4, 'lettura_notizie', 'true');

-- --------------------------------------------------------

--
-- Struttura della tabella `db_meteo_previsioni`
--

CREATE TABLE IF NOT EXISTS `db_meteo_previsioni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCitta` int(11) NOT NULL,
  `day1_icon` varchar(50) NOT NULL,
  `day1_max` int(11) NOT NULL,
  `day1_rain` int(11) NOT NULL,
  `day1_wind` int(11) NOT NULL,
  `day2` varchar(5) NOT NULL,
  `day2_icon` varchar(50) NOT NULL,
  `day3` varchar(5) NOT NULL,
  `day3_icon` varchar(50) NOT NULL,
  `day4` varchar(5) NOT NULL,
  `day4_icon` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dump dei dati per la tabella `db_meteo_previsioni`
--

INSERT INTO `db_meteo_previsioni` (`id`, `idCitta`, `day1_icon`, `day1_max`, `day1_rain`, `day1_wind`, `day2`, `day2_icon`, `day3`, `day3_icon`, `day4`, `day4_icon`) VALUES
(1, 1, 'chancerain', 9, 70, 18, '4/2', 'clear', '5/2', 'clear', '6/2', 'mostlycloudy'),
(2, 2, 'rain', 9, 100, 14, '4/2', 'clear', '5/2', 'clear', '6/2', 'partlycloudy'),
(3, 3, 'partlycloudy', 11, 20, 13, '4/2', 'clear', '5/2', 'clear', '6/2', 'chancerain'),
(4, 4, 'rain', 11, 90, 18, '4/2', 'clear', '5/2', 'clear', '6/2', 'mostlycloudy'),
(5, 5, 'chancerain', 10, 100, 14, '4/2', 'clear', '5/2', 'clear', '6/2', 'mostlycloudy');

-- --------------------------------------------------------

--
-- Struttura della tabella `db_meteo_scelte`
--

CREATE TABLE IF NOT EXISTS `db_meteo_scelte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `citta` varchar(100) NOT NULL,
  `cap` varchar(5) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `nazione` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cap` (`cap`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dump dei dati per la tabella `db_meteo_scelte`
--

INSERT INTO `db_meteo_scelte` (`id`, `citta`, `cap`, `provincia`, `nazione`, `link`) VALUES
(1, 'Cantù', '22063', 'Como', 'Italia', 'http://api.wunderground.com/api/25d937211f68c2d5/forecast/lang:IT/q/Italy/Cantu.json'),
(2, 'Caorle', '22060', 'Como', 'Italia', 'http://api.wunderground.com/api/25d937211f68c2d5/forecast/lang:IT/q/Italy/Caorle.json'),
(3, 'Milano', '22030', 'Como', 'Italia', 'http://api.wunderground.com/api/25d937211f68c2d5/forecast/lang:IT/q/Italy/Milano.json'),
(4, 'Cinisello Balsamo', '22031', 'Como', 'Italia', 'http://api.wunderground.com/api/25d937211f68c2d5/forecast/lang:IT/q/Italy/Cinisello_Balsamo.json'),
(5, 'muro lucano', '22032', 'Como', 'Italia', 'http://api.wunderground.com/api/25d937211f68c2d5/forecast/lang:IT/q/Italy/Salsomaggiore_Terme.json');

-- --------------------------------------------------------

--
-- Struttura della tabella `db_notizie_aggiornate`
--

CREATE TABLE IF NOT EXISTS `db_notizie_aggiornate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSource` int(11) NOT NULL,
  `ordine` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `desc` text CHARACTER SET utf8 NOT NULL,
  `link` varchar(400) NOT NULL,
  `img` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dump dei dati per la tabella `db_notizie_aggiornate`
--

INSERT INTO `db_notizie_aggiornate` (`id`, `idSource`, `ordine`, `date`, `title`, `desc`, `link`, `img`) VALUES
(1, 1, 1, '2016-02-03 11:05:18', 'Australia: deputate allatteranno in aula', 'In vigore nuova norma a favore delle parlamentari neo-mamme', 'http://www.ansa.it/sito/notizie/mondo/oceania/2016/02/03/australia-deputate-allatteranno-in-aula_30df4bab-a8fe-4afa-b579-bf641d5bae8f.html', 'a'),
(2, 1, 1, '2016-02-03 11:07:32', 'Cinema: 40 anni fa nasceva il cult-movie ''Taxi Driver''', 'Disagio e violenza nel film di Scorsese Palma d''oro a Cannes', 'http://www.ansa.it/sito/notizie/cultura/cinema/2016/02/03/cinema-40-anni-fa-nasceva-il-cult-movie-taxi-driver_89e578d1-db49-4587-bac0-aaf212fe4e0c.html', 'a'),
(3, 1, 1, '2016-02-03 11:05:38', 'Fisco: Confcommercio, in 5 anni Tari su del 55%', 'Aumento sfiora i 3 mld e incide su tutte categorie terziario', 'http://www.ansa.it/sito/notizie/economia/2016/02/03/fisco-confcommercio-in-5-anni-tari-su-del-55_64b0ada7-b060-485c-b4d1-97950c05dd50.html', 'a'),
(4, 1, 1, '2016-02-03 11:00:01', 'Lady Gaga canterÃ  l''inno al Super Bowl', 'Domenica la sfida tra Denver Broncos e Carolina Panthers', 'http://www.ansa.it/sito/notizie/cultura/musica/2016/02/03/lady-gaga-cantera-linno-al-super-bowl_f0e42d45-85d3-4d01-8098-d22b8cf1fa3f.html', 'a'),
(5, 2, 2, '2016-02-03 11:02:12', 'Fuggi con figlio per Isis, indagata', 'Donna abitava in provincia Lecco, ha lasciato marito e 2 figli', 'http://www.ansa.it/sito/notizie/cronaca/2016/02/03/fuggi-con-figlio-per-isis-indagata_bedf3c51-b7f8-4d9a-955a-9ca047aec01a.html', 'a'),
(6, 2, 2, '2016-02-03 10:55:42', 'Inchiesta assenteismo in Arsenale Spezia', 'Sanremo, licenziato 19/mo dipendente finito in inchiesta Gdf', 'http://www.ansa.it/sito/notizie/cronaca/2016/02/03/inchiesta-assenteismo-in-arsenale-spezia_889b25ab-57d9-4b9f-9242-0d0360c2e55b.html', 'a'),
(7, 2, 2, '2016-02-03 10:45:13', 'Ladro morso da dobermann chiede i danni', 'Veterinario scrive su Fb, Ã¨ un magrebino morso da dobermann', 'http://www.ansa.it/sito/notizie/cronaca/2016/02/03/ladro-morso-da-dobermann-chiede-i-danni_7150cbc8-a195-4d1a-87d0-d1cfe9111565.html', 'a'),
(8, 2, 2, '2016-02-03 10:30:50', 'Contrabbando: sequestro nel Napoletano', 'Arresto in flagranza per due persone a Marano', 'http://www.ansa.it/sito/notizie/cronaca/2016/02/03/contrabbando-sequestro-nel-napoletano_644701cf-9a6f-4e58-83a1-1edc54eee30e.html', 'a'),
(9, 2, 2, '2016-02-03 10:29:55', 'Affitti: Tronca, perdite? 100 mln l''anno', 'Commissario, andremo fino in fondo', 'http://www.ansa.it/sito/notizie/cronaca/2016/02/03/affitti-tronca-perdite-100-mln-lanno_d0d0ebc9-38af-4ad0-8a03-1711d397cded.html', 'a'),
(10, 9, 3, '2016-02-03 11:04:58', 'Piazza Affari ai minimi dal 2014Â Soffrono ancora  i titoli bancari', 'Indice Ftse Mib giÃ¹ del 25% in 6 mesi. Sospesi e poi riammessi Fca e Mps. Per il Nikkei il maggior calo delle ultime due settimane. Si comprano bond e oro', 'http://www.corriere.it/economia/16_febbraio_03/borse-asiatiche-deciso-calo-tokyo-perde-315percento-giu-shanghai-0072c208-ca3e-11e5-a089-b5567fb53351.shtml', 'http://images2.corriereobjects.it/methode_image/2016/02/03/Economia/Foto%20Economia%20-%20Trattate/FON7F1_2229533F1_5993_20120402162154_HE10_20120418-kyyC-U43150482574226xqE-656x492@Corriere-Web-Sezioni.jpg'),
(11, 9, 3, '2016-02-03 10:53:37', 'Istat: tatuaggi, leggings da bambina e bevande vegetali nel nuovo paniere', 'Lâ€™istituto di statistica fotografa le nuove abitudini delle famiglie italiane, nel paniere 2016 entrano leggings, lampadine a Led e panni cattura-polvere. Escono invece cuccette e vagoni letto. 80 i comuni capoluogo di provincia presi a campione', 'http://www.corriere.it/cronache/cards/istat-tatuaggi-leggings-bambina-bevande-vegetali-nuovo-paniere/come-cambiano-abitudini-famiglie_principale.shtml', 'http://images2.corriereobjects.it/methode_image/2016/02/03/Interni/Foto%20Interni%20-%20Trattate/milks-015-U4312010427730442RG-U4313082577601pQH-760x567@Corriere-Web-Sezioni-kVxB-U431504872448828MF-656x492@Corriere-Web-Sezioni.jpg'),
(12, 9, 3, '2016-02-03 11:04:46', 'Zika, negli Stati Uniti primo caso Â di contagio con rapporto sessuale ', 'In Texas un paziente ha contratto il virus dopo aver avuto un rapporto con una persona  rientrata dal Venezuela: Ã¨ il primo caso di trasmissione di Zika per via sessuale negli Usa. Dallâ€™India forse in arrivo un vaccino', 'http://www.corriere.it/salute/16_febbraio_02/zika-stati-uniti-primo-caso-contagio-rapporto-sessuale-25dc1aa2-c9f4-11e5-83af-3e75cf16ed0a.shtml', 'http://images2.corriereobjects.it/methode_image/2016/02/02/Salute/Foto%20Salute%20-%20Trattate/cffb2efcfdf854058f0f6a70670076a3-0020-k3bC-U43150478062090QQE-656x492@Corriere-Web-Sezioni.jpg'),
(13, 9, 3, '2016-02-03 10:44:22', 'Il ritorno di  Grillo a teatro tra bagarini e un imbarazzato Di Maio', 'Duemila persone al teatro Ciak di Milano per lo spettacolo del   comico e leader del M5s di Nino Luca', 'http://video.corriere.it/ritorno-grillo-teatro-bagarini-imbarazzato-maio/3652c802-ca55-11e5-a089-b5567fb53351', 'http://images2.corriereobjects.it/methode_image/Video/2016/02/03/Politica/Foto%20Politica%20-%20Trattate/grillocommenti_656_ori_crop_MASTER__0x0.jpg'),
(14, 9, 3, '2016-02-03 08:15:48', 'Esplosione su un volo di linea in Somalia, squarcio sulla fiancata: le immagini a bordo', 'Il velivolo costretto a un atterraggio dâ€™emergenza  a Mogadiscio. Due passeggeri feriti', 'http://video.corriere.it/esplosione-un-volo-linea-somalia-squarcio-fiancata-immagini-bordo/bfe94cc8-ca3f-11e5-a089-b5567fb53351', 'http://images2.corriereobjects.it/methode_image/Video/2016/02/03/Esteri/Foto%20Esteri%20-%20Trattate/somaliacombo-kZyD--656x492@Corriere-Web-Nazionale.jpg'),
(15, 18, 4, '2016-02-02 22:55:33', 'Infront: corretto l''operato su assegnazione diritti serie B', ' Nota dell''advisor della Lega per la commercializzazione dei diritti della serie cadetta', 'http://www.repubblica.it/sport/calcio/2016/02/02/news/infront_corretto_l_operato_su_assegnazione_diritti_serie_b-132592532/?rss', 'http://www.repstatic.it/content/nazionale/img/2016/02/02/225135825-46d1decc-5547-4ffb-ab1f-0f43acd7448e.jpg'),
(16, 18, 4, '2016-02-02 18:17:46', 'Serie A, Sassuolo-Roma in diretta. Domani tocca a Napoli e Juve', '', 'http://www.repubblica.it/sport/calcio/2016/02/02/news/sassuolo_roma_in_diretta-132575646/?rss', 'a'),
(17, 18, 4, '2016-02-02 10:06:27', 'Davide Ballardini: ''''Cacciato dal portiere ma certi presidenti sgretolano il cervello''''', ' Parla la vittima preferita dei mangia allenatori Zamparini e Cellino: ''''Mi chiamava alle 3 di notte'''' \nÂ ', 'http://www.repubblica.it/sport/calcio/2016/02/02/news/davide_ballardini_cacciato_dal_portiere_ma_certi_presidenti_sgretolano_il_cervello_-132520900/?rss', 'http://www.repstatic.it/content/nazionale/img/2016/02/02/001821593-672016b0-7a30-46bb-a776-a0563ddbb7ba.jpg'),
(18, 18, 4, '2016-02-01 14:25:38', 'Riccardo Silva: "Infront? Non câ€™entro. Io fatturo, poi non so cosa fanno con i soldi"', ' Il titolare dell''agenzia che ha acquisito dalla Lega i diritti della A per lâ€™estero a 185 milioni: â€œFaccio affari con Bogarelli, non rispondo delle sue azioniâ€...', 'http://www.repubblica.it/sport/calcio/2016/02/01/news/infront-132480565/?rss', 'http://www.repstatic.it/content/nazionale/img/2016/02/01/142242136-64cbd4e4-58fc-4ac9-90e6-13e7066e8e89.jpg'),
(19, 18, 4, '2016-02-01 17:54:11', 'Europa, i padroni del gol: Higuain, Suarez, Lewandowski e Aubameyang', ' Le difese studiano stratagemmi in continuazione per fermarli, ma con loro c''Ã¨ poco da fare. Higuain, Aubameyang, fino ad arrivare agli attaccanti di Barcellona...', 'http://www.repubblica.it/sport/calcio/2016/02/01/news/attaccanti_higuain_suarez_lewandosky-132468318/?rss', 'http://www.repstatic.it/content/nazionale/img/2016/02/01/112033150-7eff1ffb-50eb-4b51-91ae-e2e0eeca9277.jpg'),
(20, 18, 4, '2016-01-31 20:36:32', 'Diritti tv, Infront: "Gravi e fantasiose illazioni"', ' L''advisor della Lega calcio interviene dopo la pubblicazione delle intercettazioni della Guardia di Finanza, oggetto dell''inchiesta della Procura di Milano....', 'http://www.repubblica.it/sport/calcio/2016/01/31/news/diritti_tv_difesa_infront-132441847/?rss', 'http://www.repstatic.it/content/nazionale/img/2016/01/31/203504061-2b4ac340-cc65-4aed-bece-de32d559845f.jpg'),
(21, 18, 4, '2016-01-31 22:50:12', 'Serie A: il Napoli travolge l''Empoli, vince ancora la Juve. Milan schianta Inter', ' ', 'http://www.repubblica.it/sport/calcio/2016/01/31/news/serie_a_chievo-juventus_in_diretta_alle_15_il_napoli_stasera_il_derby_milan-inter-132400939/?rss', 'http://www.repstatic.it/content/nazionale/img/2016/01/31/170249229-4f51130b-1ebf-491c-8a6f-c3a98515435d.jpg'),
(22, 12, 5, '2016-02-03 10:32:00', 'Piazza Affari ai minimi dal 2014 \n	Soffrono ancora  i titoli bancari', 'Indice Ftse Mib giÃ¹ del 25% in 6 mesi. Sospesi e poi riammessi Fca e Mps. Per il Nikkei il maggior calo delle ultime due settimane. Si comprano bond e oro', 'http://www.corriere.it/economia/16_febbraio_03/borse-asiatiche-deciso-calo-tokyo-perde-315percento-giu-shanghai-0072c208-ca3e-11e5-a089-b5567fb53351.shtml', 'a'),
(23, 12, 5, '2016-02-03 10:41:03', 'Tassa sui rifiuti, in cinque anni \n	Ã¨ cresciuta del 55%', 'La denuncia di Confcommercio, ma nello stesso periodo la quantitÃ  di immondizia prodotta Ã¨ diminuita dellâ€™11%. La gestione inefficiente da parte dei comuni genera unâ€™efficienza da 1,3 miliardi di euro ', 'http://www.corriere.it/economia/16_febbraio_03/tassa-rifiuti-cinque-anni-cresciuta-55percento-tari-confcommecio-f6a27970-ca57-11e5-a089-b5567fb53351.shtml', 'a'),
(24, 12, 5, '2016-02-03 09:44:29', 'Lâ€™Argentina paga il 150% del capitale   \n	agli italiani con i  tango-bond', 'Buenos Aires  sigla lâ€™accordo preliminare con gli oltre 15 mila i risparmiatori italiani che avevano rifiutato le ristrutturazioni dopo il default del 2001. Ora il nuovo governo di Macri vuole chiudere il contenzioso con gli hedge fund guidati da Nml Capital', 'http://www.corriere.it/economia/16_febbraio_01/argentina-archivia-default-che-cosa-accade-tango-bond-e5103bd8-c8b9-11e5-8532-9fbac1d67c73.shtml', 'a'),
(25, 12, 5, '2016-02-03 09:12:01', 'ChemChina offre \n	40 miliardi  per Syngenta', 'Lâ€™azionista di Pirelli interessato al colosso chimico svizzeroSarebbe la piÃ¹ grande acquisizione cinese fuori confine. Lâ€™ingresso della Cina nel mercato dellâ€™agribusiness dominato da Monsanto', 'http://www.corriere.it/economia/16_febbraio_03/chemchina-offre-40-miliardi-syngenta-9828ea06-ca42-11e5-a089-b5567fb53351.shtml', 'a');

-- --------------------------------------------------------

--
-- Struttura della tabella `db_notizie_scelte`
--

CREATE TABLE IF NOT EXISTS `db_notizie_scelte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idNews` int(11) NOT NULL,
  `numero` int(11) NOT NULL DEFAULT '3' COMMENT 'numero di news da leggere',
  `ordine` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dump dei dati per la tabella `db_notizie_scelte`
--

INSERT INTO `db_notizie_scelte` (`id`, `idNews`, `numero`, `ordine`) VALUES
(1, 1, 4, 1),
(4, 2, 5, 2),
(3, 9, 5, 3),
(5, 18, 7, 4),
(6, 12, 4, 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `db_notizie_source`
--

CREATE TABLE IF NOT EXISTS `db_notizie_source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `fonte` varchar(20) NOT NULL,
  `link` varchar(200) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `src_icon` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dump dei dati per la tabella `db_notizie_source`
--

INSERT INTO `db_notizie_source` (`id`, `nome`, `fonte`, `link`, `categoria`, `lang`, `src_icon`) VALUES
(1, 'Homepage', 'Ansa.it', 'http://www.ansa.it/sito/ansait_rss.xml', 'generale', 'it', ''),
(2, 'Cronaca', 'Ansa.it', 'http://www.ansa.it/sito/notizie/cronaca/cronaca_rss.xml', 'cronaca', 'it', ''),
(3, 'Politica', 'Ansa.it', 'http://www.ansa.it/sito/notizie/politica/politica_rss.xml', 'politica', 'it', ''),
(4, 'Mondo', 'Ansa.it', 'http://www.ansa.it/sito/notizie/mondo/mondo_rss.xml', 'mondo', 'it', ''),
(5, 'Economia', 'Ansa.it', 'http://www.ansa.it/sito/notizie/economia/economia_rss.xml', 'economia', 'it', ''),
(6, 'Calcio', 'Ansa.it', 'http://www.ansa.it/sito/notizie/sport/calcio/calcio_rss.xml', 'sport', 'it', ''),
(7, 'Sport', 'Ansa.it', 'http://www.ansa.it/sito/notizie/sport/sport_rss.xml', 'sport', 'it', ''),
(8, 'Tecnologia', 'Ansa.it', 'http://www.ansa.it/sito/notizie/tecnologia/tecnologia_rss.xml', 'tecnologia', 'it', ''),
(9, 'Homepage', 'Corriere della Sera', 'http://xml.corriereobjects.it/rss/homepage.xml', 'generale', 'it', ''),
(10, 'Cronanca', 'Corriere della Sera', 'http://xml.corriereobjects.it/rss/cronache.xml', 'cronaca', 'it', ''),
(11, 'Politica', 'Corriere della Sera', 'http://xml.corriereobjects.it/rss/politica.xml', 'politica', 'it', ''),
(12, 'Economia', 'Corriere della Sera', 'http://xml.corriereobjects.it/rss/economia.xml', 'economia', 'it', ''),
(13, 'Homepage', 'Repubblica', 'http://www.repubblica.it/rss/homepage/rss2.0.xml', 'generale', 'it', ''),
(14, 'Cronanca', 'Repubblica', 'http://www.repubblica.it/rss/cronaca/rss2.0.xml', 'cronaca', 'it', ''),
(15, 'Economia', 'Repubblica', 'http://www.repubblica.it/rss/economia/rss2.0.xml', 'economia', 'it', ''),
(16, 'Tecnologia', 'Repubblica', 'http://www.repubblica.it/rss/tecnologia/rss2.0.xml', 'tecnologia', 'it', ''),
(17, 'Sport', 'Repubblica', 'http://www.repubblica.it/rss/sport/rss2.0.xml', 'sport', 'it', ''),
(18, 'Calcio', 'Repubblica', 'http://www.repubblica.it/rss/sport/calcio/rss2.0.xml', 'sport', 'it', ''),
(19, 'Motori', 'Repubblica', 'http://www.repubblica.it/rss/motori/rss2.0.xml', 'motori', 'it', ''),
(20, 'Homepage', 'La Stampa', 'http://www.lastampa.it/rss.xml', 'generale', 'it', ''),
(21, 'Politica', 'La Stampa', 'http://www.lastampa.it/italia/politica/rss.xml', 'politica', 'it', ''),
(22, 'Cronanca', 'La Stampa', 'http://www.lastampa.it/italia/cronache/rss.xml', 'cronaca', 'it', ''),
(23, 'Tecnologia', 'La Stampa', 'http://www.lastampa.it/tecnologia/rss.xml', 'tecnologia', 'it', ''),
(24, 'Economia', 'La Stampa', 'http://www.lastampa.it/economia/rss.xml', 'economia', 'it', ''),
(25, 'Sport', 'La Stampa', 'http://www.lastampa.it/sport/rss.xml', 'sport', 'it', ''),
(26, 'Calcio', 'La Stampa', 'http://www.lastampa.it/sport/calcio/rss.xml', 'sport', 'it', ''),
(27, 'Motori', 'La Stampa', 'http://www.lastampa.it/motori/rss.xml', 'motori', 'it', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `db_radio_source`
--

CREATE TABLE IF NOT EXISTS `db_radio_source` (
  `idRadio` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) CHARACTER SET utf8 NOT NULL,
  `link` varchar(200) CHARACTER SET utf8 NOT NULL,
  `lang` varchar(2) NOT NULL,
  `source_icon` varchar(40) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`idRadio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dump dei dati per la tabella `db_radio_source`
--

INSERT INTO `db_radio_source` (`idRadio`, `nome`, `link`, `lang`, `source_icon`) VALUES
(1, 'Rai Radio 1', 'http://icestreaming.rai.it/1.mp3', 'it', '/res/img/img-radio/rr1.png'),
(2, 'Rai Radio 2', 'http://icestreaming.rai.it/2.mp3', 'it', '/res/img/img-radio/rr2.png'),
(3, 'Rai Radio 3', 'http://icestreaming.rai.it/3.mp3', 'it', '/res/img/img-radio/rr3.png'),
(4, 'Rai RadioFD 4', 'http://icestreaming.rai.it/4.mp3', 'it', '/res/img/img-radio/rrFD4.png'),
(5, 'Rai RadioFD 5', 'http://icestreaming.rai.it/5.mp3', 'it', '/res/img/img-radio/rrFD5.png'),
(6, 'Rai WebRadio 6', 'http://icestreaming.rai.it/9.mp3', 'it', '/res/img/img-radio/rwr6.png'),
(7, 'Rai WebRadio 7', 'http://icestreaming.rai.it/10.mp3', 'it', '/res/img/img-radio/rwr7.png'),
(8, 'Rai WebRadio 8', 'http://icestreaming.rai.it/11.mp3', 'it', '/res/img/img-radio/rwr8.png'),
(9, 'Rai IsoRadio', 'http://icestreaming.rai.it/6.mp3', 'it', '/res/img/img-radio/rir.png'),
(10, 'Radio Monte Carlo', 'http://icecast.unitedradio.it/rmc.mp3', 'it', '/res/img/img-radio/montecarlo.png'),
(11, 'Radio 105', 'http://icecast.105.net/105.mp3', 'it', '/res/img/img-radio/radio105.png'),
(12, 'Radio Deejay', 'http://radiodeejay-lh.akamaihd.net/i/RadioDeejay_Live_1@189857/master.m3u8', 'it', '/res/img/img-radio/deejay.png'),
(13, 'Radio KissKiss', 'http://wma07.fluidstream.net:3616/;stream.nsv', 'it', '/res/img/img-radio/kisskiss.png'),
(14, 'Virgin Radio', 'http://shoutcast.unitedradio.it:1301/;', 'it', '/res/img/img-radio/VirginRadio.png'),
(15, 'Radio Maria', 'http://50.7.181.186:8092/;', 'it', '/res/img/img-radio/radiomaria.png'),
(16, 'RDS', 'http://46.37.20.205:8000/rdsmp3', 'it', '/res/img/img-radio/rds.png'),
(17, 'M2O', 'http://radiom2o-lh.akamaihd.net/i/RadioM2o_Live_1@42518/master.m3u8', 'it', '/res/img/img-radio/M2O.png'),
(18, 'RTL 102.5', 'http://shoutcast.rtl.it:3010/;', 'it', '/res/img/img-radio/rtl102.5.png'),
(19, 'Radio Capital', 'http://radiocapital-lh.akamaihd.net/i/RadioCapital_Live_1@196312/master.m3u8', 'it', '/res/img/img-radio/radiocapital.png'),
(20, 'R101', 'http://r101.creacast.com/r101a', 'it', '/res/img/img-radio/radio101.png'),
(21, 'Radio Italia', 'http://178.32.139.167:8110/', 'it', '/res/img/img-radio/radioitalia.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
