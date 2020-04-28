-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 28 avr. 2020 à 12:42
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `dijontravel`
--

-- --------------------------------------------------------

--
-- Structure de la table `Logement`
--

CREATE TABLE `Logement` (
  `titre` varchar(25) NOT NULL,
  `lieu` varchar(30) DEFAULT NULL,
  `prix` decimal(10,0) DEFAULT NULL,
  `nbrpers` int(11) DEFAULT NULL,
  `lien` varchar(30) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Logement`
--
ALTER TABLE `Logement`
  ADD PRIMARY KEY (`titre`);
