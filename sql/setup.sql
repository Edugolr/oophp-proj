--
-- Setup for the article:
-- https://dbwebb.se/kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter-v2
--

--
-- Create the database with a testuser
--
CREATE DATABASE IF NOT EXISTS oophp;
GRANT ALL ON oophp.* TO user@localhost IDENTIFIED BY "pass";
USE oophp;

-- Ensure UTF8 as chacrter encoding within connection.
SET NAMES utf8;
