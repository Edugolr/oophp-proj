DROP TABLE IF EXISTS `content`;
CREATE TABLE `content`
(
  `id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `path` CHAR(120) UNIQUE,
  `slug` CHAR(120) UNIQUE,

  `title` VARCHAR(120),
  `data` TEXT,
  `type` CHAR(20) DEFAULT "markdown",
  `filter` VARCHAR(80) DEFAULT NULL,
  `featured` BOOLEAN,

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

INSERT INTO `content` (`path`, `slug`, `type`, `title`, `data`, `filter`) VALUES
    ("content/om", null, "page", "Om", "# Om oss

Brädspels Palatset fokuserar på att leverare bra spel för alla målgrupper.
Här säljer vi ingen skit och svarar snabbt på era frågor.
Ni når oss lättast via:

  - Mail: bradspelspalatset@gmail.com
  - Tel: 07071337
  - Adress: Jordbovägen 517 74 Tellus

# Om mig

Jag heter Christofer Wikman och är den som med brinnande hjärta driver den här verksamheten.
", "markdown"),
    ("blogpost-1", "crusader-kings-2-blir-brädspel", "post", "CRUSADER KINGS 2 BLIR BRÄDSPEL GENOM KICKSTARTER", "[FIGURE src=image/crusaderkings.jpg] För även om Paradox Interactive i videon ovan lanserar brädspelspremiären med glimten i ögat gör Fria Ligan, precis blekast möjliga intryck. Kickstarter används som en ren marknadsföringsplattform där du som kickar knappt får ut något för att du riskar dina dyrt förvärvade pengar. Avsaknaden av Early Birds samt otydlighet kring stretchgoals och frakt inom Sverige är blekt. Men det kommer väl knappast hindra dig från att kasta dina pengar i deras generella riktning? För vem frestas inte att föra sin dynasti vidare och tillskansa sig sina bordskamraters domäner genom sluta förbund och gifta in sig i varandras familjer? https://youtu.be/JvSTzHMeVwI Om Crusader Kings blir lika unikt på bräde som det är på dator så blir det svårt att få ett dåligt resultat", "markdown"),
    ("blogpost-2", "recension-king-of-new-york", "post", "RECENSION: KING OF NEW YORK: POWER UP", "[FIGURE src=https://github.com/Edugolr/oophp-proj/blob/master/htdocs/img/kingofnewyork.jpg?raw=true] King of New York: Power Up! från iello är inget revolutionärt tillägg, men ändå en logisk och underhållande utbyggnad på det klassiska ”monster-yatzy” spelet King of New York. King of New York var i sin tur något av en mer invecklad variant på King of Tokyo, som även det hade sin egna ”Power Up!” expansion. Expnsionen tillför unika förmågor för varje monster vilket ger de annars generiska monstren egna karaktärsdrag på riktigt, och ökar spelkänslan och kaoset i ett redan högst slumpbaserat spel. Varje spelare börjar med ett utav åtta kort, och kan sedan tillförskaffa sig ytterligare utvecklingar under spelets gång.", "markdown"),
    ("blogpost-3", "jorvik-handel-vikingatiden", "post", "JÓRVÍK – HANDEL UNDER VIKINGATIDEN", "[FIGURE src=`image/jorvik.jpg`] I Jorvik tävlar du och dina motspelare om att köpa resurser, hantverkare med mera vid en handelsplats. Spelmekanikerna är enkla men kräver långsiktigt planerande. Spelet passar inte de yngsta men är ett bra introspel då det är lätt att förklara reglerna under spelets gång. För mer luttrade strateger finns ett mer avancerat spelläge", "markdown"),
    ("blogpost-4", "vi-spelar-kingdomino", "post", "VI SPELAR KINGDOMINO", "[FIGURE src=https://github.com/Edugolr/oophp-proj/blob/master/htdocs/img/kingofnewyork.jpg?raw=true] Kingdomino är alltså ett fillerspel som passar enkla spelsammanhang, där barn och ovana brädspelare har möjlighet att hänga med ganska lätt. Dess snabba 10-15 minuters omgångar och lättfattade regler har visat sig ge ett behov av revanschrundor i takt med att nybörjare tror sig komma på nya taktiker. Underhållande även för mycket blandade sällskap, som familjefester eller spel i publik miljö. Även om det går spela på två är det inte direkt något vi rekommenderar då det blir lite för förutsägbart och ger rutinerade spelare allt för mycket övertag då det är för lätt att förutse vad som kommer hända framåt.", "markdown");
    

INSERT INTO `content` (`path`, `slug`, `type`, `title`, `data`, `filter`, `featured`) VALUES
("blogpost-5", "recension-avenuet", "post", "RECENSION: AVENUE", "[FIGURE src=image/avenue.jpg] Det här är ett spel där alla har precis samma förutsättningar. Korten som dras påverkar alla spelare samtidigt. Det innebär också att du inte behöver sitta och vänta in dina medspelare. Men Avenue är också ett förklätt solospel; du har ingen aning om vad de andra spelarna har för sig förrän ni räknar poäng i slutet. Spelet består av ett ganska tjockt block med kartor, ett rutnät med två slott, sex vingårdar och 25 vinodlingar.  Alla bladen i blocket är exakt likadana. På sin karta ska varje spelare rita ut vägar mellan vingårdar, vinodlingar och slott på ett sätt som ger så många poäng som möjligt. Det finns också två kortlekar - den ena sortens kort talar om vilken av vingårdarna som du ska dra väg till, och den andra vilken sorts väg du får rita.", "markdown", 1);