DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`
(
  `id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `title` VARCHAR(120),
  `genre` CHAR(20) DEFAULT NULL,

  `price` DECIMAL(6,2) NOT NULL,
  `players_min` TINYINT DEFAULT NULL,
  `players_max`  TINYINT DEFAULT NULL,
  `age` TINYINT DEFAULT NULL,
  `image` VARCHAR(100) DEFAULT NULL,
  `description` TEXT,
  `filter` VARCHAR(80) DEFAULT "markdown",
  `recomended` BOOLEAN,
  `sale` BOOLEAN,
  
  -- MySQL version 5.6 and higher
  `published` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `created` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,

  -- MySQL version 5.5 and lower
  -- `published` DATETIME DEFAULT NULL,
  -- `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  -- `updated` DATETIME DEFAULT NULL, --  ON UPDATE CURRENT_TIMESTAMP,

  `deleted` DATETIME DEFAULT NULL
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;

INSERT INTO `products` (`title`, `genre`, `price`, `players_min`, `players_max`, `age`, `image`, `description`) VALUES
	("Monopol", "Sällskapsspel", 249, 2, 5, 8, "monopoly.jpg", "Ett spel för hela familjen som alltid är roligt! Med spelets olika små figurer, ska du gå runt spelplanen och successivt bygga hus och hotell eller köpa och sälja tomter. Instruktioner medföljer så att du och resten av din familj kan vara med och delta. Detta spel innehåller leksakspengar och är väldigt nyttig att lära sig använda på rätt vis. Om du gör det, så vinner du! Regelspråk: Svenska"),
	("Risk", "Krigsspel", 379, 2, 5, 10, "risk.jpg", "Kliv in i en värld fylld av spännande äventyr - en värld där varje beslut, varje drag, varje slag är en nervkittlande risk som antingen ger belöning, eller förödelse. Placera dina trupper. Lägg upp din strategi. Låt sen jakten på världsherravälde börja. Utmaningen: att besegra dina fiender, flytta fram dina trupper och utöka ditt territorium. Frågan är om du ska anfalla avvakta, eller bilda en tillfällig alians... besluten är dina. Den här världen tillhör de modiga och djärva. Kan du ta dig an utmaningen och vinna?"),
    ("Ticket to Ride", "Strategispel", 299, 2, 4, 8, "ticket-to-ride.jpg", "Ticket to Ride: Europe handlar om att resa mellan städer och åka så långa sträckor som möjligt för att generera ett större antal poäng än vad kortare sträckor ger, men samtidigt är det också just de längre sträckorna som är svåra att lyckas genomföra. Slumpen har nämligen en del makt över vilka tåglinjer på spelplanen som du faktiskt får använda dig utav då det gäller att kunna matcha en viss färg för varje tåglinje genom att spela ut kort med lika färgglada tågvagnar tryckta på sig, och det är inte säkert att den eller de färger som du är ute efter faktiskt dyker upp i tid – innan någon annan får för sig att plocka åt sig samma kort eller ockupera samma tåglinje och dina möjligheter att utnyttja andra spelares linjer är mycket begränsade. Det nya spelmomentet med tunnlar kan dessutom sabotera din resa då det plötsligt kan visa sig att sträckan är längre än förväntat.");
	
    
INSERT INTO `products` (`title`, `genre`, `price`, `players_min`, `players_max`, `age`, `image`, `description`, `recomended`) VALUES
	("Fiskespel", "Barnspel", 159, 5, 2, 4, "fiskespel.jpg", "Det klassiska fiskespelet", 1);
    
INSERT INTO `products` (`title`, `genre`, `price`, `players_min`, `players_max`, `age`, `image`, `description`, `sale`) VALUES
    ("Uno", "Kortspel", 99, 7, 2, 10, "uno.jpg", "Kortspelens kortspel, ett måste att spela om man inte redan har gjort detta! Försök bli den som först spelar ut alla kort från sin hand genom att matcha såväl siffror med färger, samtidigt som du tvingar dina motspelare att ta upp fler kort till sin hand!", 1);