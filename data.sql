SET FOREIGN_KEY_CHECKS=0;

delete from Links;
delete from Inventory;
delete from Chapter;
delete from Administrateur;
delete from Hero;
delete from HeroSpell;
delete from ItemsClass;
delete from Level;
delete from Links;
delete from Loot;
delete from MCQAnswer;
delete from MCQTest;
delete from Spell;
delete from User;
delete from Class;
delete from Items;
delete from Chapter;
delete from Monster;
delete from ChapterEvent;

insert into Class values(1,'Guerrier',25,20,0,10,3);
insert into Class values(2,'Mage',30,15,20,0,5);
insert into Class values(3,'Voleur',20,10,5,5,10);
insert into Items values(1,'Baton en Bois','Baton très simple','1',1,1,0,'NULL',0,NULL,NULL,5);
insert into Items values(2,'Canine du Loup Noir','Canine du loup tué','3',1,1,0,'NULL',0,NULL,NULL,7);
insert into Items values(3,'Bouclier en Bois','Bouclier du pauvre','2',1,1,0,'NULL',0,NULL,3,NULL);
insert into Items values(4,'Bouclier du paysan','Bouclier donné par le paysan','5',1,1,0,'NULL',0,NULL,8,NULL);
insert into Items values(5,'Sceptre en Pierre','Sceptre banale','1',1,1,0,'NULL',0,3,NULL,NULL);
insert into Items values(6,'Orbe du Sanglier','Orbe du Sanglier tué','2',1,1,0,'NULL',0,5,NULL,NULL);
insert into Items values(7,'Parchemin','Petite feuille','1',1,0,0,'MANA',10,5,NULL,NULL);
insert into Items values(8,'STRENGHTPotion','Fiole de force','2',2,0,0,'STRENGTH',5,NULL,NULL,NULL);
insert into Items values(9,'INITIATIVEPotion','Fiole d\'initiative','2',2,0,0,'INITIATIVE',5,NULL,NULL,NULL);
insert into Items values(10,'MANAPotion','Fiole de mana','2',2,0,0,'MANA',5,NULL,NULL,NULL);
insert into Items values(11,'LIFEPotion','Fiole de soin','2',2,0,0,'LIFE',5,NULL,NULL,NULL);
insert into Items values(12,'Crayon de Bois','Crayon pour écrire','1',1,1,0,'NULL',0,NULL,NULL,5);
insert into Items values(13,'Dagues','Une sorte de petite épée','5',1,1,0,'NULL',0,NULL,NULL,10);
insert into Items values(14,'Armure du Gros Sanglier','La carcasse du Sanglier','10',1,0,1,'NULL',0,NULL,10,NULL);
insert into ItemsClass values(1,1);
insert into ItemsClass values(2,1);
insert into ItemsClass values(3,1);
insert into ItemsClass values(4,NULL);
insert into ItemsClass values(5,2);
insert into ItemsClass values(6,2);
insert into ItemsClass values(7,3);
insert into ItemsClass values(8,1);
insert into ItemsClass values(9,1);
insert into ItemsClass values(10,1);
insert into ItemsClass values(11,1);
insert into ItemsClass values(12,3);
insert into ItemsClass values(13,3);
insert into ItemsClass values(14,1);
insert into ItemsClass values(3,2);
insert into ItemsClass values(3,3);
insert into ItemsClass values(8,2);
insert into ItemsClass values(8,3);
insert into ItemsClass values(9,2);
insert into ItemsClass values(9,3);
insert into ItemsClass values(10,2);
insert into ItemsClass values(10,3);
insert into ItemsClass values(11,2);
insert into ItemsClass values(11,3);
insert into ItemsClass values(14,2);
insert into ItemsClass values(14,3);
insert into ChapterEvent values(1,'Dark Forest01.jpg',4);
insert into ChapterEvent values(2,'Manticore.jpg',2);
insert into ChapterEvent values(3,'OldMan02.jpg',3);
insert into ChapterEvent values(4,'Wolf02.jpg',1);
insert into ChapterEvent values(5,'StoneWall02.jpg',5);
insert into ChapterEvent values(6,'Dark Forest02.jpg',6);
insert into Monster values(1,'Loup Noir',25,20,5,0,'Morsure fatale',2,250);
insert into Monster values(2,'Gros Sanglier',30,0,2,10,'Patate de forain',4,500);
insert into Spell values(1,'Boule de Feu',5,5);
insert into Spell values(2,'Caca en boîte',10,10);
insert into Spell values(3,'Choc Ténébreux',15,15);
insert into Loot values(1,'2',NULL,null,1);
insert into Loot values(2,6,NULL,null,1);
insert into Loot values(2,14,NULL,null,1);
insert into Loot values(3,'4',NULL,null,1);
insert into Loot values(4,'7',null,null,null);
insert into Loot values(5,'8',null,null,null);
insert into Loot values(5,'9',null,null,null);
insert into Loot values(6,'10',null,null,null);
insert into Loot values(6,'11',null,null,null);
insert into Loot values(7,16,NULL,5,null);
insert into MCQTest values(1,'Quel est le nom du gros cochon?',4);
insert into MCQTest values(5,'Quel est la taille du grand Victor?',2);
insert into MCQAnswer values(1,1,'Dylan');
insert into MCQAnswer values(2,1,'Lomepal');
insert into MCQAnswer values(3,1,'Paul');
insert into MCQAnswer values(4,1,'Le gros Victor');
insert into MCQAnswer values(1,5,'1,75m');
insert into MCQAnswer values(2,5,'1,70m');
insert into MCQAnswer values(3,5,'3,20m');
insert into MCQAnswer values(4,5,'2^1024m');
insert into Level values(2,1,3,400,6,0,5,4);
insert into Level values(1,1,2,200,3,0,2,1);
insert into Level values(3,2,2,200,2,3,0,2);
insert into Level values(4,2,3,400,6,0,5,3);
insert into Level values(5,3,2,200,2,3,3,5);
insert into Level values(6,3,2,400,6,6,6,10);
insert into Chapter values(1,'Le ciel est lourd ce soir sur le village du Val Perdu, dissimulé entre les montagnes. La
petite taverne, dernier refuge avant l\'immense forêt, est étrangement calme quand le
bourgmestre s’approche de vous. Homme d’apparence usée par les années et les soucis,
il vous adresse un regard désespéré.
« Ma fille… elle a disparu dans la forêt. Personne n\’a osé la chercher… sauf vous, peut-
être ? On raconte qu’un sorcier vit dans un château en ruines, caché au cœur des bois.
Depuis des mois, des jeunes filles disparaissent… J\'ai besoin de vous pour la retrouver. »
Vous sentez le poids de la mission qui s\’annonce, et un frisson parcourt votre échine.
Bientôt, la forêt s\'ouvre devant vous, sombre et menaçante. La quête commence','OldMan01.jpg',0,0);
insert into Chapter values(2,'Vous franchissez la lisière des arbres, la pénombre de la forêt avalant le sentier devant
vous. Un vent froid glisse entre les troncs, et le bruissement des feuilles ressemble à un
murmure menaçant. Deux chemins s’offrent à vous : l’un sinueux, bordé de vieux arbres
noueux ; l’autre droit mais envahi par des ronces épaisses.','BrambleTrails02.jpg',0,0);
insert into Chapter values(3,'Votre choix vous mène devant un vieux chêne aux branches tordues, grouillant de
corbeaux noirs qui vous observent en silence. À vos pieds, des traces de pas légers,
probablement récents, mènent plus loin dans les bois. Soudain, un bruit de pas feutrés
se fait entendre. Vous ressentez la présence d’un prédateur.','Dark Forest01.jpg','4','1');
insert into Chapter values(4,'En progressant, le calme de la forêt est soudain brisé par un grognement. Surgissant des
buissons, un énorme sanglier, au pelage épais et aux yeux injectés de sang, se dirige vers
vous. Sa rage est palpable, et il semble prêt à en découdre. Le voici qui décide
brutalement de vous charger !','Manticore.jpg','2','2');
insert into Chapter values(5,'Tandis que vous progressez, une voix humaine s’élève, interrompant le silence de la forêt.
Vous tombez sur un vieux paysan, accroupi près de champignons aux couleurs vives. Il
sursaute en vous voyant, puis se détend, vous souriant tristement.
« Vous devriez faire attention, étranger, murmure-t-il. La nuit, des cris terrifiants
retentissent depuis le cœur de la forêt… Des créatures rôdent. »','OldMan02.jpg','3','3');
insert into Chapter values(6,'À mesure que vous avancez, un bruissement attire votre attention. Une silhouette sombre
s’élance soudainement devant vous : un loup noir aux yeux perçants. Son poil est hérissé
et sa gueule laisse entrevoir des crocs acérés. Vous sentez son regard fixé sur vous, prêt
à bondir.','Wolf02.jpg','1','4');
insert into Chapter values(7,'Après votre rencontre, vous atteignez une clairière étrange, entourée de pierres dressées,
comme un ancien autel oublié par le temps. Une légère brume rampe au sol, et les
ombres des pierres semblent danser sous la lueur de la lune.','StoneWall02.jpg','5','5');
insert into Chapter values(8,'Essoufflé mais déterminé, vous arrivez près d’un petit ruisseau qui serpente au milieu des
arbres. Le chant de l’eau vous apaise quelque peu, mais des murmures étranges
semblent émaner de la rive. Vous apercevez des inscriptions anciennes gravées dans une
pierre moussue.','Dark Forest02.jpg','6','6');
insert into Chapter values(9,'La forêt se disperse enfin, et devant vous se dresse une colline escarpée. Au sommet, le
château en ruines projette une ombre menaçante sous le clair de lune. Les murs effrités
et les tours en partie effondrées ajoutent à la sinistre réputation du lieu.
Vous sentez que la véritable aventure commence ici, et que l’influence du sorcier n’est
peut-être pas qu’une légende…','DarkCastle01.jpg',0,0);
insert into Chapter values(10,'Le monde se dérobe sous vos pieds, et une obscurité profonde vous enveloppe, glaciale
et insondable. Vous ne sentez plus le poids de votre équipement, ni la morsure de la
douleur. Juste un vide infini, vous aspirant lentement dans les ténèbres.
Alors que vous perdez toute notion du temps, une lueur douce apparaît au loin, vacillante
comme une flamme fragile dans l’obscurité. Au fur et à mesure que vous approchez, vous
entendez une voix, faible mais bienveillante, qui murmure des mots oubliés, anciens.
« Brave âme, ton chemin n\'est pas achevé... À ceux qui échouent, une seconde chance
est accordée. Mais les caprices du destin exigent un sacrifice. »
La lumière s\'intensifie, et vous sentez vos forces revenir, mais vos poches sont vides, votre
sac allégé de tout trésor. Votre équipement, vos armes, tout a disparu, laissant place à
une sensation de vulnérabilité. Lorsque la lumière vous enveloppe, vous ouvrez de nouveau les yeux, retrouvant la terre
ferme sous vos pieds. Vous êtes de retour, sans autre possession que votre volonté de
reprendre cette quête. Mais cette fois-ci, peut-être, saurez-vous éviter les pièges fatals
qui vous ont mené à votre perte.','Laboratory01.jpg',0,0);
insert into Chapter values(11,'Qu’avez-vous fait, Malheureux !','CrossBow.jpg', 0, 0);
insert into Links values(1,1,2);
insert into Links values(2,2,3);
insert into Links values(3,2,4);
insert into Links values(4,3,5);
insert into Links values(5,3,6);
insert into Links values(6,4,10);
insert into Links values(7,4,8);
insert into Links values(8,5,7);
insert into Links values(9,6,7);
insert into Links values(10,6,10);
insert into Links values(11,7,8);
insert into Links values(12,7,9);
insert into Links values(13,8,11);
insert into Links values(14,8,9);
insert into Links values(15,10,1);
insert into Links values(16,11,10);
SET FOREIGN_KEY_CHECKS=1;