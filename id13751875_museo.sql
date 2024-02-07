-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2020 at 03:32 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13751875_museo`
--

-- --------------------------------------------------------

--
-- Table structure for table `autore`
--

CREATE TABLE `autore` (
  `idAutore` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cognome` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nazionalita` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataNascita` date DEFAULT NULL,
  `dataMorte` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `autore`
--

INSERT INTO `autore` (`idAutore`, `nome`, `cognome`, `nazionalita`, `dataNascita`, `dataMorte`) VALUES
(0, 'null', 'null', 'null', '0001-01-01', '0001-01-01'),
(1, 'Leonardo', 'da Vinci', 'Italiana', '1452-04-15', '1519-05-02'),
(2, 'Banksy', NULL, 'Bitannica', '1976-01-01', '0000-00-00'),
(3, 'Salvador', 'Dali', 'Spagnola', '1904-05-11', '1989-01-23'),
(4, 'Michelangelo', ' Buonarroti', 'Italiana', '1475-03-06', '1564-02-18'),
(5, 'Thutmose', 'I', 'Egiziana', '1506-01-01', '1493-01-01'),
(6, 'Johannes', 'Vermeer', 'Olandese', '1632-10-01', '1675-12-01'),
(7, 'Pablo', 'Picasso', 'Spagnola', '1881-10-25', '1973-04-08'),
(8, 'Jeffrey', 'Koons', 'Americana', '1955-01-21', '0000-00-00'),
(9, 'Christopher', 'Marley', 'Americana', '1969-01-01', '0000-00-00'),
(10, 'Vincent Willem', 'van Gogh', 'Olandese', '1853-03-30', '1890-07-29'),
(11, 'Myron', 'di Eleutherae ', 'Greca', '0480-01-01', '0440-01-01'),
(12, 'Rene', 'Margitte', 'Francese', '1898-11-21', '1967-08-15'),
(13, 'Edvard ', 'Munch ', 'Norvegese', '1863-12-12', '1944-01-24'),
(14, 'Grant', 'Wood', 'Americana', '1891-02-13', '1942-02-12'),
(15, 'Francesco', 'Hayez', 'Italiana', '1791-02-10', '1882-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `codicerandom`
--

CREATE TABLE `codicerandom` (
  `codicerandom` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `codicerandom`
--

INSERT INTO `codicerandom` (`codicerandom`, `data`) VALUES
('Bq1xkoSrN5', '2020-06-11 19:39:28'),
('FiuRYxTr3t', '2020-06-11 19:39:26'),
('iPvpzod2o4', '2020-06-11 19:39:27'),
('KNxW4Oxah7', '2020-06-11 19:39:30'),
('vbV7L5730c', '2020-06-11 20:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `correnteartistica`
--

CREATE TABLE `correnteartistica` (
  `nomeCorrente` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `correnteartistica`
--

INSERT INTO `correnteartistica` (`nomeCorrente`) VALUES
('Astrattismo'),
('Cubismo'),
('Decadentismo'),
('Digital Art'),
('Espressionismo'),
('Età d\'oro Olandese'),
('Futurismo'),
('Gotico'),
('Moderno'),
('null'),
('Rinascimento'),
('Romanticismo'),
('Street Art'),
('Surrealismo');

-- --------------------------------------------------------

--
-- Table structure for table `opera`
--

CREATE TABLE `opera` (
  `idOpera` int(11) NOT NULL,
  `titolo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `piano` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stanza` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anno` int(11) DEFAULT NULL,
  `descrizione` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correnteartistica` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idAutore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opera`
--

INSERT INTO `opera` (`idOpera`, `titolo`, `piano`, `stanza`, `anno`, `descrizione`, `correnteartistica`, `idAutore`) VALUES
(1, 'Il figlio dell uomo', '1', '1', 1964, 'l\'opera affigura, in primo piano, un uomo il cui volto è nascosto quasi completamente da una mela verde sospesa in aria. Sullo sfondo è visibile un oceano sovrastato da un cielo nuvoloso.\r\n\r\nRiferendosi al dipinto, Magritte dichiarò:\r\n«Ebbene, qui abbiamo qualcosa di apparentemente visibile poiché la mela nasconde ciò che è nascosto e visibile allo stesso tempo, ovvero il volto della persona. Questo processo avviene infinitamente. Ogni cosa che noi vediamo ne nasconde un\'altra; noi vogliamo sempre vedere quello che è nascosto da ciò che vediamo. Proviamo interesse in quello che è nascosto e in ciò che il visibile non ci mostra. Questo interesse può assumere la forma di un sentimento letteralmente intenso, un tipo di disputa, potrei dire, fra ciò che è nascosto e visibile e l\'apparentemente visibile.» \r\nInoltre, l\'opera esprime una forte critica rivolta alla classe borghese (simboleggiata dall\'abito formale del soggetto), che il pittore reputava meschina(infelice) e ipocrita (fingendo virtù, buone qualità, buoni sentimenti che non ha).', 'Surrealismo', 12),
(2, 'Il Bacio', '1', '1', 1859, 'La scena è ambientata in un vago interno medievale. Si tratta dell\'androne di un castello, di cui sono messi in rilievo tre gradini, a destra della tela, e l\'estesa parete lapidea; la superficie di quest\'ultima occupa omogeneamente quasi tutto lo sfondo del dipinto, e di fatto viene interrotta solo da un varco archiacuto gotico, introdotto da una sottile colonnina, e da una bifora che si staglia in alto a destra, appena accennata in quanto tagliata dal margine superiore del quadro. Ebbene, in quest\'ambientazione medievaleggiante si sta consumando un appassionato quanto sensuale bacio tra due giovani amanti, in un clima di romantica sospensione.\r\n\r\nL\'uomo ha un ruolo attivo nell\'amplesso, trattenendo saldamente tra le mani il capo e il viso dell\'amata; al contrario, quest\'ultima si abbandona languidamente alle effusioni, limitandosi a stringere le spalle dell\'amato con il braccio sinistro. Rapiti in un\'estasi d\'amore, i due corpi si compenetrano appassionatamente, con il busto dell\'uomo che asseconda il flessuoso corpo della compagna, arcuato dinanzi a una passione così travolgente.\r\n\r\nIl bacio è molto sensuale, ma non è molto tranquillo. L\'uomo, infatti, poggia la gamba sinistra sul primo gradino della scalinata, lasciando emergere l\'elsa di un pugnale dal mantello: quest\'instabilità fisica manifesta un certo nervosismo, come se il bacio fosse mosso non da un semplice anelito sentimentale, bensì da un\'imminente dipartita, trasformando questo romantico gesto in uno straziante commiato. I toni melodrammatici sono esasperati dalla presenza di una figura in penombra in posizione tergale, dietro il varco archiacuto: le interpretazioni sono molteplici, tanto che si è pensato che si possa trattare di un uomo intento a spiare furtivamente la scena, di un congiurato che attende il congedo del suo sodale dall\'amata per cominciare la loro azione, anche se più probabilmente non è nient\'altro che una semplice domestica.', 'Romanticismo', 15),
(3, 'Persistenza della memoria', '1', '2', 1931, 'La persistenza della memoria raffigura un paesaggio costiero della costa Brava, nei pressi di Port Lligat, dominato da un cielo con delle sfumature gialle e celesti. La scena, disabitata e scevra di ogni vegetazione, è popolata da diversi oggetti: un parallelepipedo color terra, un ulivo senza foglie (forse senza vita) che sorge su quest\'ultimo, un occhio dalle lunghe ciglia addormentato e un plinto blu sullo sfondo, che fa pendant con il mare retrostante.\r\n\r\nL\'attenzione dell\'osservatore, tuttavia, è catturata dai tre orologi molli, quasi liquefatti, che di fatto sono i protagonisti della scena. Squagliandosi, questi assumono la foggia dei loro sostegni: il primo ha una mosca su di esso e scivola oltre il bordo del volume squadrato collocato in primo piano, il secondo è sospeso sull\'unico ramo dell\'albero secco appoggiato sul parallelepipedo, e il terzo è avvolto a spirale sulla timida figura embrionale colante sul suolo. Un quarto orologio, l\'unico ad essere rimasto allo stato solido, è collocato sempre sul parallelepipedo ed è ricoperto di formiche nere brulicanti; l\'artista catalano ha da sempre nutrito una fobia verso questi insetti, sin da quando ancora bambino li vide divorare un coleottero.\r\n\r\nÈ lo stesso Dalì a narrarci la gestazione dell\'opera in Vita segreta:\r\n\r\n«E il giorno in cui decisi di dipingere orologi, li dipinsi molli. Accadde una sera che mi sentivo stanco e avevo un leggero mal di testa, il che mi succede alquanto raramente. Volevamo andare al cinema con alcuni amici e invece, all\'ultimo momento, io decisi di rimanere a casa. Gala, però, uscì ugualmente mentre io pensavo di andare subito a letto. A completamento della cena avevamo mangiato un camembert molto forte e, dopo che tutti se ne furono andati, io rimasi a lungo seduto a tavola, a meditare sul problema filosofico dell\'ipermollezza posto da quel formaggio. Mi alzai, andai nel mio atelier, com\'è mia abitudine, accesi la luce per gettare un ultimo sguardo sul dipinto cui stavo lavorando. Il quadro rappresentava una veduta di Port Lligat; gli scogli giacevano in una luce alborea, trasparente, malinconica e, in primo piano, si vedeva un ulivo dai rami tagliati e privi di foglie. Sapevo che l’atmosfera che mi era riuscito di creare in quel dipinto doveva servire come sfondo a un’idea, ma non sapevo ancora minimamente quale sarebbe stata. Stavo già per spegnere la luce, quando d’un tratto, vidi la soluzione. Vidi due orologi molli uno dei quali pendeva miserevolmente dal ramo dell’ulivo. Nonostante il mal di testa fosse ora tanto intenso da tormentarmi, preparai febbrilmente la tavolozza e mi misi al lavoro. Quando, due ore dopo, Gala tornò dal cinema, il quadro, che sarebbe diventato uno dei più famosi, era terminato»', 'Surrealismo', 3),
(4, 'David', '1', '2', 1504, 'Largamente considerato un capolavoro della scultura mondiale, è uno degli emblemi del Rinascimento nonché simbolo di Firenze e dell\'Italia all\'estero. L\'opera, che ritrae l\'eroe biblico nel momento in cui si appresta ad affrontare Golia, originariamente fu collocata in Piazza della Signoria come simbolo della Repubblica fiorentina vigile e vittoriosa contro i nemici.\r\nIl 16 agosto del 1501 i consoli dell\'Arte della Lana e l’Opera del Duomo di Firenze commissionarono a Michelangelo una statua di re David, da collocare in uno dei contrafforti esterni posti nella zona absidale della cattedrale di Santa Maria del Fiore. Si trattava di un\'impresa che non aveva precedenti nell\'arte rinascimentale e che era già stata tentata due volte. L\'enorme blocco di marmo bianco destinato all\'opera era infatti già stato abbozzato prima da Agostino di Duccio nel 1463-1464 e poi da Antonio Rossellino nel 1476, ma poi era stato abbandonato da entrambi per le caratteristiche non ottimali del pezzo, anche perché era stato sgrossato rozzamente e questo limitava le possibilità di intervento.', 'Rinascimento', 4),
(5, 'Ragazza con l orecchino di perla', '2', '1', 1665, 'Su uno sfondo scuro, una fanciulla rappresentata con mezzo busto di profilo ruota la testa di tre quarti verso lo spettatore, in favore della luce che spiove da sinistra. Indossa un mantello color rame e una camicia bianca di cui si vede solo il colletto, oltre a un inusuale turbante fatto di una fascia azzurra che avvolge la testa e un drappo giallo annodato che pende dalla nuca fino alle spalle, terminando in frange azzurrine. Sebbene possa assomigliare alle figure di muse o di sibille, l\'assenza di alcun attributo iconografico impedisce una reale identificazione.\r\n\r\nIl volto della ragazza, intriso di luce, mostra una rara bellezza: labbra rosse carnose che si dischiudono in un abbozzo stupefatto di sorriso, naso sottile e dritto, occhi grandi e vivi. La luce delle pupille è poi richiamata dall\'orecchino con una grossa perla, che brilla sulla penombra del collo. La perla è dipinta utilizzando poche pennellate a goccia, separate l\'una dall\'altra: è l\'occhio umano che ha l\'illusione di vederla intera.\r\n\r\nL\'artista catturò con viva immediatezza l\'espressione sfuggente, carica di un\'innocente languidezza. Il fondo scuro mette in risalto le zone di luce, col colore applicato in pennellate dense e uniformi, poco sfumate, tranne nell\'incarnato delicato e in alcune zone dove sono presenti piccoli punti, come nel contorno della bocca.', 'Astrattismo', 1),
(6, 'Baloon Dog', '2', '1', 2000, 'Questa bellissima scultura in metallo smaltata di Jeff Koons rappresenta uno dei soggetti più conosciuti e ricercati dell\'artista: il \"Ballon Dog\", soggetto creato per la prima volta nel 1990 con la serie Celebration. Questa serie richiama la gioia dei festeggiamenti di feste e compleanni attraverso un palloncino, torto nella forma di un cane. Per questa edizione su piccola scala di sculture in porcellana estremamente complesse, Koons lavorò col fabbricante di porcellana Bernardaud che combinò i materiali più eccellenti e la maggior parte di processi innovativi coi livelli più alti dell\'abilità artigianale.', 'Moderno', 8),
(7, 'Notte stellata', '2', '2', 1889, 'La Notte stellata, certamente una delle opere vangoghiane più celebri, risponde perfettamente a quest\'esigenza. In questo dipinto, infatti, il pittore ha certamente cercato il contatto diretto con la realtà, dipingendo quello che si poteva vedere dalla finestra della sua stanza nel manicomio di Saint-Rémy. Van Gogh, tuttavia, non ha ripreso fedelmente questa veduta notturna, bensì l\'ha manipolata con mezzi plastici, interiorizzandola fino allo spasimo e trasformandola in una potente visione onirica in cui poter fare affiorare le sue emozioni, le sue paure, i suoi viaggi dell\'anima. La Notte stellata, pertanto, non offre all\'osservatore un\'immagine fedele della realtà, quanto una forma di «espressione» di quest\'ultima.\r\n\r\nL\'immagine possiede una forza straordinaria. A sinistra la scena è chiusa da un cipresso alto e severo come un «obelisco egiziano» (è lo stesso van Gogh a riconoscerlo) che, stagliandosi contro il cielo notturno, agisce come un intermediario vegetale tra la terra e il cielo, tra la vita e la morte: più che un albero sembrerebbe quasi una fiamma scura che divampa all\'improvviso alla ricerca dell\'infinito. A fianco del solitario cipresso troviamo un piccolo paesino - forse è Saint-Rémy, forse Nuenen, forse una reminiscenza del villaggio natio - che, disperdendosi su una vallata, sembra perduto nell\'immensità del movimento cosmico che fluisce sopra di esso: i caseggiati sono generalmente bassi, fatta eccezione per l\'acuminata cuspide di un campanile, che riprende la statuaria verticalità del cipresso e «sfida le forze della natura: è un\'antenna e un parafulmine insieme, una sorta di Tour Eiffel, la cui fascinazione è sempre presente nelle vedute notturne dell\'artista sembra crepitare, carica di elettricità». A destra vigoreggia la ricca vegetazione degli ulivi, mentre sullo sfondo si estende il profilo diagonale e ondulato delle Alpilles, importante catena montuosa del Meridione francese.', 'Moderno', 10),
(8, 'Gli amanti', '2', '2', 1928, 'Il quadro raffigura due amanti che si baciano, con le teste coperte da un panno bianco che impedisce loro di vedersi e comunicare, suscitando una certa inquietudine e angoscia. La scena è poi completata da uno sfondo fortemente contrastato di tonalità blu e dalla cornice classicheggiante che riveste la rossa parete, riportando agli occhi i tempi antichi.\r\nI due lenzuoli sono resi con un abile uso dei chiaroscuri, che sembrano riecheggiare i virtuosismi del peplo di una scultura ellenistica, e sono fonte di luce dell\'intera opera. Questi drappeggi che paiono leggeri e appena appoggiati sui volti dei due amanti, sono in netto contrasto con il rigore classico dell\'architettura appena accennata in alto a destra. La composizione è equilibrata sia dal punto di vista geometrico che plastico, anche attraverso il rapporto che il pittore crea tra il rosso del muro e il rosso della camicia della donna. Questo rosso che spicca, però sempre in secondo piano rispetto alla luce del bianco dei lenzuoli, richiama il rosso del sangue e quindi della morte, altro riferimento al suicidio della madre.\r\nTra le due figure quella più emblematica è la figura maschile: giacca scura, camicia bianca e cravatta, semplice e ordinata, che alla vista non resta impressa. Questi è il padre di Magritte che dà un ultimo bacio alla moglie, appena morta, con il volto coperto dal dolore. Secondo molte interpretazioni il filo conduttore di queste opere sarebbe da rintracciare nel suicidio della madre del pittore avvenuto nel 1912, quando l\'artista aveva solo 14 anni. La donna si gettò nel fiume Sambre con una camicia da notte avvolta sulla testa. Secondo altre interpretazioni, invece, il volto coperto viene associato all\'ossessione che il pittore aveva di coprire i volti anche nella vita reale.', 'Surrealismo', 12),
(9, 'L urlo', '2', '2', 1905, 'Lo spunto del quadro è prettamente autobiografico. È infatti lo stesso Munch a indicarci, in una pagina di diario, le circostanze che hanno portato alla genesi de L\'urlo:\r\n\r\n«Una sera camminavo lungo un viottolo in collina nei pressi di Kristiania - con due compagni. Era il periodo in cui la vita aveva ridotto a brandelli la mia anima. Il sole calava - si era immerso fiammeggiando sotto l\'orizzonte. Sembrava una spada infuocata di sangue che tagliasse la volta celeste. Il cielo era di sangue - sezionato in strisce di fuoco - le pareti rocciose infondevano un blu profondo al fiordo - scolorandolo in azzurro freddo, giallo e rosso - Esplodeva il rosso sanguinante - lungo il sentiero e il corrimano - mentre i miei amici assumevano un pallore luminescente - ho avvertito un grande urlo ho udito, realmente, un grande urlo - i colori della natura - mandavano in pezzi le sue linee - le linee e i colori risuonavano vibrando - queste oscillazioni della vita non solo costringevano i miei occhi a oscillare ma imprimevano altrettante oscillazioni alle orecchie - perché io realmente ho udito quell\'urlo - e poi ho dipinto il quadro L\'urlo.»', 'Espressionismo', 13),
(10, 'La Gioconda', '2', '3', 1503, 'Opera iconica ed enigmatica della pittura mondiale, si tratta sicuramente del ritratto più celebre della storia nonché di una delle opere d\'arte più note in assoluto. Il sorriso impercettibile del soggetto, col suo alone di mistero, ha ispirato tantissime pagine di critica, letteratura, opere di immaginazione e persino studi psicoanalitici; sfuggente, ironica e sensuale, la Monna Lisa è stata di volta in volta amata e idolatrata, ma anche derisa o aggredita. L\'opera rappresenta tradizionalmente Lisa Gherardini, cioè \"Monna\" Lisa (un diminutivo di \"Madonna\" derivante dalla parola latina \"Mea domina\" che oggi avrebbe lo stesso significato di \"Signora\"), moglie di Francesco del Giocondo (quindi la \"Gioconda\"). Leonardo dopotutto, in quel periodo del suo terzo soggiorno fiorentino, abitava nelle case accanto a Palazzo Gondi (oggi distrutte) a pochi passi da piazza della Signoria, che erano proprio di un ramo della famiglia Gherardini di Montagliari.\r\n\r\nQuesta, apparentemente di facile identificazione, in realtà molto dibattuta dalla storiografia artistica, ha come fonti antiche un documento del 1525 in cui vengono elencati alcuni dipinti che si trovano tra i beni di Gian Giacomo Caprotti detto \"Salaì\", allievo di Leonardo che seguì il maestro in Francia, dove l\'opera è menzionata per la prima volta \"la Joconda\"; lo stesso Vasari scrisse che \"Prese Lionardo a fare per Francesco del Giocondo il ritratto di Monna Lisa sua moglie, e quattro anni penatovi lo lasciò imperfetto, la quale opera oggi è appresso il re Francesco di Francia in Fontainebleau\", dilungandosi poi in una serie di lodi del dipinto, in realtà piuttosto generiche.\r\n\r\n\r\nGli occhi della Gioconda\r\nAlcuni dubbi sono sorti a partire dalla descrizione di Vasari, che parla della peluria delle sopracciglia magnificamente dipinta (ma la Gioconda non ne ha) e che esalta le fossette sulle guance (pure assenti). Ciò è comunque spiegabile con la particolare storia del dipinto, che seguì Leonardo fino alla sua morte in Francia e che venne ritoccato per anni e anni dall\'artista. Vasari infatti potrebbe aver attinto la sua descrizione da una memoria dell\'opera com\'era visibile a Firenze fino al 1508, quando il pittore lasciò la città; analisi ai raggi X hanno mostrato che ci sono tre versioni della Monna Lisa, nascoste sotto quella attuale.', 'Rinascimento', 1),
(11, 'Busto di Nefertiti', '2', '3', 1395, 'Il Busto di Nefertiti, chiamato anche Testa di Nefertiti, o anche solo Nefertiti, è uno dei tesori d\'arte più conosciuti dell\'Antico Egitto ed è considerato il capolavoro della ritrattistica del periodo di Amarna. Risale al regno del faraone Akhenaton al tempo della XVIII dinastia (Nuovo Regno) tra il 1353 e il 1336. a.C.[A 1]\r\nIl busto della regina Nefertiti fu scoperto il 6 dicembre 1912, durante gli scavi della Società Orientale Tedesca diretti da Ludwig Borchardt a Tell el-Amarna, nell\'edificio P 47,2, laboratorio del capo scultore Thutmose. Venne trasportato in Germania nel gennaio 1913, nel quadro della spartizione dei reperti con l\'autorizzazione del Consiglio supremo per le antichità del Ministero egiziano della Cultura.\r\nNel 1920, grazie a una donazione di James Simon, insieme ad altri oggetti, che fino allora erano in prestito a lunga durata alla Ägyptische Abteilung der königlich preußischen Kunstsammlungen (Sezione egizia delle collezioni d\'arte del regno di Prussia), andò allo Stato Libero di Prussia.\r\n\r\nSolo nel 1924 si ebbe una presentazione pubblica nel Museo costruito per la collezione egizia dei Musei statali nell\'Isola dei Musei a Berlino. Oggi il busto è proprietà della Fondazione del patrimonio culturale prussiano (Stiftung Preußischer Kulturbesitz) e, col numero d\'inventario 21300, costituisce l\'attrazione principale del Museo Egizio di Berlino, che dal 16 ottobre 2009 è nuovamente sistemato nel Museo della Maturita.\r\n\r\nSul valore del busto di Nefertiti vi sono valutazioni diverse. È coperto da un\'assicurazione per 390 milioni di dollari[1], mentre d\'altra parte il suo valore viene calcolato anche in 520 milioni di dollari.', 'null', 5),
(13, 'Il Discobolo', '2', '4', 455, 'L\'opera venne forse fusa per la città di Sparta e rappresentava un atleta nell\'atto di scagliare il disco. La presenza dell\'arte preclassica è tradita dalla costruzione della figura, più vicina al rilievo che alla statuaria, e dall\'immobilità del torso. Si considera la scultura come un\'\"istantanea\": l\'atleta venne raffigurato nel momento in cui il suo corpo, dopo essersi rannicchiato per prendere slancio e radunare le forze, sta per aprirsi e liberare la tensione imprimendo al lancio maggiore energia. Subito dopo girerà su se stesso e scaglierà il disco, accompagnando il gesto con tutto il corpo.\r\n\r\nSe ci si pone di fronte alla statua ci si accorge delle affinità con l\'arte egizia: il tronco è rappresentato frontalmente, le gambe e le braccia di lato. La rappresentazione non risulta comunque antica e obsoleta poiché Mirone ha fatto assumere all\'atleta un atteggiamento simile a quello reale modificandolo fino a fargli esprimere nel modo più efficace l\'idea del movimento.\r\n\r\nCicerone scrisse: «Le opere di Mirone non sono ancora vicinissime alla verità, nondimeno non si esiterà a dichiararle belle; quelle di Policleto sono ancora più belle e già veramente perfette secondo la mia opinione».\r\n\r\nGli storici d\'arte dell\'antichità lodarono Mirone per la sua maestria nel ritmo e nella simmetria. L\'espressione di serenità, priva di sentimenti e accennante solo una tenue concentrazione, fu criticata da Plinio.', 'null', 11),
(14, 'American Gothic', '2', '4', 1930, 'Nel 1930, mentre percorreva la città di Eldon nello Stato dell\'Iowa, Grant Wood osservò una piccola casa in legno, dipinta di bianco[1]. Wood decise di dipingere la casa assieme a \"quel tipo di persone che mi sarei potuto immaginare come abitanti di quella casa.\" Chiese a sua sorella Nan di fargli da modella, facendole indossare un pesante abito coloniale rassomigliante quelli della tradizione \"Americana\" del XIX secolo. Come modello per il contadino, Wood scelse il proprio dentista, Byron McKeeby da Cedar Rapids (Iowa).\r\n\r\nLa sagoma del forcone a tre punte viene rievocata nelle pieghe dell\'abito dell\'uomo, nelle finestre della casa e nella stessa struttura del volto dell\'uomo. Ogni elemento venne dipinto separatamente; i modelli posarono separatamente e non sostarono mai di fronte alla casa.', 'Gotico', 14);

-- --------------------------------------------------------

--
-- Table structure for table `pittura`
--

CREATE TABLE `pittura` (
  `tecnica` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `larghezza` int(11) DEFAULT NULL,
  `altezza` int(11) DEFAULT NULL,
  `idOpera` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pittura`
--

INSERT INTO `pittura` (`tecnica`, `larghezza`, `altezza`, `idOpera`, `tipo`) VALUES
('olio su tela', 116, 89, 1, 'pittura'),
('olio su tela', 88, 112, 2, 'pittura'),
('olio su tela', 33, 24, 3, 'pittura'),
(' olio su tela', 39, 44, 5, 'pittura'),
('olio su tela', 92, 72, 7, 'pittura'),
('olio su tela', 54, 73, 8, 'pittura'),
('pastello su cartone', 73, 91, 9, 'pittura'),
('olio su tela', 77, 53, 10, 'pittura'),
('olio su tela', 62, 74, 14, 'pittura');

-- --------------------------------------------------------

--
-- Table structure for table `scultura`
--

CREATE TABLE `scultura` (
  `peso` int(11) DEFAULT NULL,
  `materiale` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idOpera` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scultura`
--

INSERT INTO `scultura` (`peso`, `materiale`, `idOpera`, `tipo`) VALUES
(5000, 'marmo', 4, 'scultura'),
(3000, 'acciaio inossidabile', 6, 'scultura'),
(20, 'Calcare', 11, 'scultura'),
(2000, 'marmo', 13, 'scultura');

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

CREATE TABLE `utente` (
  `utente` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`utente`, `password`, `admin`) VALUES
('aaaa', 'f6dd5e69e7b909f6b2447810b475a35a66630bc720cefe2ca39bf329ce27f872', 0),
('adminnn', '6426676144ad8dc5d7a79b4acfa0a292a36f41c9ee4f5420df947b30d7b46a2e', 1),
('ciao', '18901c8dd7498df86446b8616802c5d46f8c1e84c36d7bc7595082e2f0cca7e1', 0),
('ionut', '70007abae251bae5150eb8d9cc25e98091a2830f1dc8b57ad18ab2b26b13178e', 0),
('marco', '7a0c6fc328e202da0501d6451b5127ec4b1d7235a02651a13c6bbea72c1d74bc', 0),
('mazz23', '5ecb18bb8049de0f223cd6bc673b233ab817fb1ad90940dc429047ae46c3385b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autore`
--
ALTER TABLE `autore`
  ADD PRIMARY KEY (`idAutore`);

--
-- Indexes for table `codicerandom`
--
ALTER TABLE `codicerandom`
  ADD PRIMARY KEY (`codicerandom`);

--
-- Indexes for table `correnteartistica`
--
ALTER TABLE `correnteartistica`
  ADD PRIMARY KEY (`nomeCorrente`);

--
-- Indexes for table `opera`
--
ALTER TABLE `opera`
  ADD PRIMARY KEY (`idOpera`),
  ADD KEY `correnteartistica` (`correnteartistica`),
  ADD KEY `idAutore` (`idAutore`);

--
-- Indexes for table `pittura`
--
ALTER TABLE `pittura`
  ADD PRIMARY KEY (`idOpera`);

--
-- Indexes for table `scultura`
--
ALTER TABLE `scultura`
  ADD PRIMARY KEY (`idOpera`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`utente`),
  ADD UNIQUE KEY `utente` (`utente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `opera`
--
ALTER TABLE `opera`
  MODIFY `idOpera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `opera`
--
ALTER TABLE `opera`
  ADD CONSTRAINT `correnteartistica` FOREIGN KEY (`correnteartistica`) REFERENCES `correnteartistica` (`nomeCorrente`),
  ADD CONSTRAINT `idAutore` FOREIGN KEY (`idAutore`) REFERENCES `autore` (`idAutore`);

--
-- Constraints for table `pittura`
--
ALTER TABLE `pittura`
  ADD CONSTRAINT `pittura_ibfk_1` FOREIGN KEY (`idOpera`) REFERENCES `opera` (`idOpera`);

--
-- Constraints for table `scultura`
--
ALTER TABLE `scultura`
  ADD CONSTRAINT `idOpera` FOREIGN KEY (`idOpera`) REFERENCES `opera` (`idOpera`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`id13751875_ionutsuciuaugustin`@`%` EVENT `cancellacodici` ON SCHEDULE EVERY 24 HOUR STARTS '2020-06-04 19:12:35' ON COMPLETION NOT PRESERVE ENABLE DO delete from codicerandom where TIMESTAMPDIFF(hour,codicerandom.data, NOW())>= 24$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
