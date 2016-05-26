-- phpMyAdmin SQL Dump
-- version 2.6.1-pl3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generato il: 22 Dic, 2006 at 12:47 PM
-- Versione MySQL: 3.23.49
-- Versione PHP: 4.2.0
-- 
-- Database: `cart`
-- 

-- --------------------------------------------------------

-- 
-- Struttura della tabella `allegati`
-- 

CREATE TABLE `allegati` (
  `id` int(11) NOT NULL auto_increment,
  `idp` int(11) NOT NULL default '0',
  `percorso` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=5 ;

-- 
-- Dump dei dati per la tabella `allegati`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `altrepagine`
-- 

CREATE TABLE `altrepagine` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL default '',
  `contenuto` longtext NOT NULL,
  `posto` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=7 ;

-- 
-- Dump dei dati per la tabella `altrepagine`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `categorie`
-- 

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=17 ;

-- 
-- Dump dei dati per la tabella `categorie`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `colori`
-- 

CREATE TABLE `colori` (
  `id` int(11) NOT NULL auto_increment,
  `idp` int(11) NOT NULL default '0',
  `nome` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=20 ;

-- 
-- Dump dei dati per la tabella `colori`
-- 
-- --------------------------------------------------------

-- 
-- Struttura della tabella `configurazione`
-- 

CREATE TABLE `configurazione` (
  `id` int(11) NOT NULL auto_increment,
  `logo` varchar(255) NOT NULL default '',
  `email_ordini` varchar(100) NOT NULL default '',
  `piva` varchar(57) NOT NULL default '',
  `email_paypal` varchar(100) NOT NULL default '',
  `chisiamo` longtext NOT NULL,
  `dovesiamo` longtext NOT NULL,
  `contatti` longtext NOT NULL,
  `nome` varchar(200) NOT NULL default '',
  `telefono` varchar(20) NOT NULL default '',
  `template` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

-- 
-- Dump dei dati per la tabella `configurazione`
-- 

INSERT INTO `configurazione` VALUES (1, 'fungo.png', 'pippo@pippo.itkhjk', '12345ert567', 'pippo@pippo.itf', 'yiyiyiyuiyuti', 'Siamo a mare', 'khjkhkkelefonando al xxxhgjhgjf', 'ecommerce', 'e', '../html/a');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `immagini`
-- 

CREATE TABLE `immagini` (
  `id` int(11) NOT NULL auto_increment,
  `idp` int(11) NOT NULL default '0',
  `percorso` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=19 ;

-- 
-- Dump dei dati per la tabella `immagini`
-- 

-- --------------------------------------------------------

-- 
-- Struttura della tabella `newsletter`
-- 

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `newsletter`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `opzioni`
-- 

CREATE TABLE `opzioni` (
  `id` int(11) NOT NULL auto_increment,
  `modalita` int(11) NOT NULL default '0',
  `statocarrello` int(11) NOT NULL default '0',
  `statoiva` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

-- 
-- Dump dei dati per la tabella `opzioni`
-- 

INSERT INTO `opzioni` VALUES (1, 1, 1, 0);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `ordini`
-- 

CREATE TABLE `ordini` (
  `id` int(11) NOT NULL auto_increment,
  `note` longtext NOT NULL,
  `user` varchar(69) NOT NULL default '0',
  `dataora` varchar(50) NOT NULL default '',
  `stato` int(11) NOT NULL default '0',
  `pagamento` varchar(50) NOT NULL default '',
  `spedizione` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=9 ;

-- 
-- Dump dei dati per la tabella `ordini`
-- 

-- --------------------------------------------------------

-- 
-- Struttura della tabella `pagamenti`
-- 

CREATE TABLE `pagamenti` (
  `id` int(11) NOT NULL auto_increment,
  `bonifico` int(100) NOT NULL default '0',
  `infobonifico` longtext NOT NULL,
  `vaglia` int(11) NOT NULL default '0',
  `infovaglia` longtext NOT NULL,
  `contrassegno` int(10) NOT NULL default '0',
  `infocontrassegno` longtext NOT NULL,
  `paypal` int(11) NOT NULL default '0',
  `emailpaypal` varchar(150) NOT NULL default '',
  `gestpay` int(11) NOT NULL default '0',
  `codice` varchar(30) NOT NULL default '',
  `emailgestpay` varchar(150) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=13 ;

-- 
-- Dump dei dati per la tabella `pagamenti`
-- 

INSERT INTO `pagamenti` VALUES (1, 1, 'hhd', 1, 'jhgfj', 1, 'hdhgfhghdgfh', 1, 'yeytytry', 1, 'GETSPAYXXXX', 'jhjfjhgj');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `prodotti`
-- 

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL auto_increment,
  `idcat` int(11) NOT NULL default '0',
  `idsottocat` int(11) NOT NULL default '0',
  `codice` varchar(20) NOT NULL default '',
  `descrizione` longtext NOT NULL,
  `thumb` varchar(255) NOT NULL default '',
  `prezzo` varchar(20) NOT NULL default '',
  `nome` varchar(60) NOT NULL default '',
  `taglie` varchar(40) NOT NULL default '',
  `colori` varchar(30) NOT NULL default '',
  `giacenza` int(11) NOT NULL default '0',
  `isofferta` int(11) NOT NULL default '0',
  `peso` varchar(10) NOT NULL default '',
  `spedizionesep` varchar(40) NOT NULL default '',
  `iva` int(11) NOT NULL default '0',
  `riordino` int(11) NOT NULL default '0',
  `sconto` int(11) NOT NULL default '0',
  `ishome` int(11) NOT NULL default '0',
  `marca` varchar(100) NOT NULL default '',
  `isnovita` int(11) NOT NULL default '0',
  `breve` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=37 ;

-- 
-- Dump dei dati per la tabella `prodotti`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `prodotticorrelati`
-- 

CREATE TABLE `prodotticorrelati` (
  `id` int(11) NOT NULL auto_increment,
  `idp1` int(11) NOT NULL default '0',
  `idp2` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=20 ;

-- 
-- Dump dei dati per la tabella `prodotticorrelati`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `prodottiordini`
-- 

CREATE TABLE `prodottiordini` (
  `id` int(11) NOT NULL auto_increment,
  `transazione` varchar(255) NOT NULL default '',
  `idp` int(11) NOT NULL default '0',
  `taglia` varchar(10) NOT NULL default '',
  `colore` varchar(10) NOT NULL default '',
  `quantita` mediumint(9) NOT NULL default '0',
  `prezzo` varchar(8) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=10 ;

-- 
-- Dump dei dati per la tabella `prodottiordini`
-- 
-- --------------------------------------------------------

-- 
-- Struttura della tabella `sottocategorie`
-- 

CREATE TABLE `sottocategorie` (
  `id` int(11) NOT NULL auto_increment,
  `idcat` int(11) NOT NULL default '0',
  `nome` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=41 ;

-- 
-- Dump dei dati per la tabella `sottocategorie`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `spedizioni`
-- 

CREATE TABLE `spedizioni` (
  `id` int(11) NOT NULL auto_increment,
  `compagnia` varchar(100) NOT NULL default '',
  `prezzo` varchar(30) NOT NULL default '',
  `tipo` varchar(255) NOT NULL default '',
  `peso` int(11) NOT NULL default '0',
  `percentuale` int(11) NOT NULL default '0',
  `iscontrass` int(11) NOT NULL default '0',
  `limspese` varchar(10) NOT NULL default '',
  `tiposped` int(11) NOT NULL default '0',
  `kilopiu` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=19 ;

-- 
-- Dump dei dati per la tabella `spedizioni`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `taglie`
-- 

CREATE TABLE `taglie` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(15) NOT NULL default '',
  `idp` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=13 ;

-- 
-- Dump dei dati per la tabella `taglie`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `utenti`
-- 

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL auto_increment,
  `ragione` varchar(200) NOT NULL default '',
  `nome` varchar(200) NOT NULL default '',
  `cognome` varchar(200) NOT NULL default '',
  `sesso` char(2) NOT NULL default '',
  `eta` int(11) NOT NULL default '0',
  `fiscale` varchar(40) NOT NULL default '',
  `indirizzo` varchar(234) NOT NULL default '',
  `cap` varchar(20) NOT NULL default '',
  `provincia` varchar(100) NOT NULL default '',
  `citta` varchar(100) NOT NULL default '',
  `telefono` varchar(80) NOT NULL default '',
  `email` varchar(200) NOT NULL default '',
  `user` varchar(20) NOT NULL default '',
  `password` varchar(20) NOT NULL default '',
  `stato` int(11) NOT NULL default '0',
  `data` varchar(17) NOT NULL default '',
  `sconto` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=8 ;

-- 
-- Dump dei dati per la tabella `utenti`
-- 

-- --------------------------------------------------------

-- 
-- Struttura della tabella `visite`
-- 

CREATE TABLE `visite` (
  `id` int(11) NOT NULL auto_increment,
  `data` varchar(12) NOT NULL default '',
  `visite` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=5 ;

-- 
-- Dump dei dati per la tabella `visite`
-- 

        