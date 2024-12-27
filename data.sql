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

insert into Class values(1,'Guerrier',20,0,10,3,1);
insert into Class values(2,'Mage',15,20,0,5,5);
insert into Class values(3,'Voleur ',10,5,5,10,12);
insert into Items values(1,'Baton en Bois','Baton très simple','1',1,1,0,null,0,NULL,NULL,5,'batonEnBois.png');
insert into Items values(2,'Canine du Loup Noir','Canine du loup tué','3',1,1,0,null,0,NULL,NULL,7,'canineDuLoup.png');
insert into Items values(3,'Bouclier en Bois','Bouclier du pauvre','2',1,1,0,null,0,NULL,3,NULL,'woodShield.png');
insert into Items values(4,'Bouclier du paysan','Bouclier donné par le paysan','5',1,1,0,null,0,NULL,8,NULL,'paysanShield.png');
insert into Items values(5,'Sceptre en Pierre','Sceptre banale','1',1,1,0,null,0,3,NULL,NULL,'sceptreEnPierre.png');
insert into Items values(6,'Orbe du Sanglier','Orbe du Sanglier tué','2',1,1,0,null,0,5,NULL,NULL,'orbeSanglier.png');
insert into Items values(7,'Parchemin','Petite feuille','1',1,0,0,'MANA',10,5,NULL,NULL,'parchemin.png');
insert into Items values(8,'Potion de Force','Fiole de force','2',2,0,0,'STRENGTH',5,NULL,NULL,NULL,'potionDeForce.png');
insert into Items values(9,'Potion d\'Initiative','Fiole d\'initiative','2',2,0,0,'INITIATIVE',5,NULL,NULL,NULL,'initiativePotion.png');
insert into Items values(10,'Potion de Mana','Fiole de mana','2',2,0,0,'MANA',5,NULL,NULL,NULL,'ManaPotion.png');
insert into Items values(11,'Potion de vie','Fiole de soin','2',2,0,0,'LIFE',5,NULL,NULL,NULL,'lifePotion.png');
insert into Items values(12,'Crayon de Bois','Crayon pour écrire','1',1,1,0,null,0,NULL,NULL,5,'pencil.png');
insert into Items values(13,'Dagues','Une sorte de petite épée','5',1,1,0,null,0,NULL,NULL,10,'knife.png');
insert into Items values(14,'Armure du Gros Sanglier','La carcasse du Sanglier','10',1,0,1,null,0,NULL,10,NULL,'armor.png');
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
select * from ChapterEvent;
insert into Monster values(1,'Loup Noir',25,20,5,0,'Morsure fatale',4,250);
insert into Monster values(2,'Gros Sanglier',30,0,2,10,'Patate de forain',2,500);
insert into Spell values(1,'Boule de Feu',5,5);
insert into Spell values(2,'Caca en boîte',10,10);
insert into Spell values(3,'Choc Ténébreux',15,15);
insert into Loot values(1,'2',NULL,null,1,null);
insert into Loot values(2,'6',NULL,null,1,null);
insert into Loot values(2,'14',NULL,null,1,null);
insert into Loot values(3,'4',NULL,null,1,null);
insert into Loot values(4,'7',null,null,1,null);
insert into Loot values(5,'8',null,null,1,null);
insert into Loot values(5,'9',null,null,1,null);
insert into Loot values(6,'10',null,null,1,null);
insert into Loot values(6,'11',null,null,1,null);
insert into Loot values(4,null,null,5,null,null);
insert into Loot values(4,NULL,'MANA',NULL,2,null);
insert into Loot values(5,NULL,'STRENGTH',NULL,2,null);
insert into Loot values(5,NULL,null,NULL,null,2);
insert into Loot values(2,NULL,null,NULL,null,1);
insert into Loot values(4,NULL,null,NULL,null,3);
select * from Loot;
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
Bientôt, la forêt s\'ouvre devant vous, sombre et menaçante. La quête commence !
','OldMan01.jpg',0,0);

select * from Chapter;

insert into Chapter values(2,'Vous franchissez la lisière des arbres, la pénombre de la forêt avalant le sentier devant
vous. Un vent froid glisse entre les troncs, et le bruissement des feuilles ressemble à un
murmure menaçant. Deux chemins s’offrent à vous : l’un sinueux, bordé de vieux arbres
noueux ; l’autre droit mais envahi par des ronces épaisses.

</br>
</br>

 • Si vous empruntez le chemin sinueux , rendez-vous au <b>chapitre 3</b>.

</br>

 • Si vous choisissez le sentier couvert de ronces, rendez-vous au <b>chapitre 4</b>.


','BrambleTrails02.jpg',0,0);


insert into Chapter values(3,'Votre choix vous mène devant un vieux chêne aux branches tordues, grouillant de
corbeaux noirs qui vous observent en silence. À vos pieds, des traces de pas légers,
probablement récents, mènent plus loin dans les bois. Soudain, un bruit de pas feutrés
se fait entendre. Vous ressentez la présence d’un prédateur.

</br>
</br>
 
 • Si vous choisissez de rester prudent, rendez-vous au <b>chapitre 5</b> . 

</br>

 • Si vous décidez d’ignorer les bruits et de poursuivre votre route, rendez-vous au <b>chapitre 6</b> .

','Dark Forest01.jpg','4','1');




insert into Chapter values(4,'En progressant, le calme de la forêt est soudain brisé par un grognement. Surgissant des
buissons, un énorme sanglier, au pelage épais et aux yeux injectés de sang, se dirige vers
vous. Sa rage est palpable, et il semble prêt à en découdre. Le voici qui décide
brutalement de vous charger !


</br>
</br>

	• Après avoir vaincu le sanglier, vous pourrez vous rendre au <b>chapitre 8</b> sinon rendez-vous au <b>chapitre 10</b>.


','Manticore.jpg','2','2');






insert into Chapter values(5,'Tandis que vous progressez, une voix humaine s’élève, interrompant le silence de la forêt.
Vous tombez sur un vieux paysan, accroupi près de champignons aux couleurs vives. Il
sursaute en vous voyant, puis se détend, vous souriant tristement.
« Vous devriez faire attention, étranger, murmure-t-il. La nuit, des cris terrifiants
retentissent depuis le cœur de la forêt… Des créatures rôdent. »

</br>
</br>

	• Après l avoir écouté, vous pouvez continuer vers <b>chapitre 7</b>.

','OldMan02.jpg','3','3');




insert into Chapter values(6,'À mesure que vous avancez, un bruissement attire votre attention. Une silhouette sombre
s’élance soudainement devant vous : un loup noir aux yeux perçants. Son poil est hérissé
et sa gueule laisse entrevoir des crocs acérés. Vous sentez son regard fixé sur vous, prêt
à bondir.

</br>
</br>
	
	• Si vous survivez au loup, rendez-vous au <b>chapitre 7</b>.
</br>
</br>
	• Si le loup vous terrasse, allez au <b>chapitre 10</b>.
	

','Wolf02.jpg','1','4');




insert into Chapter values(7,'Après votre rencontre, vous atteignez une clairière étrange, entourée de pierres dressées,
comme un ancien autel oublié par le temps. Une légère brume rampe au sol, et les
ombres des pierres semblent danser sous la lueur de la lune.

</br>
</br>

	• Si vous décidez de prendre le sentier couvert de mousse, rendez-vous au <b>chapitre 8</b>.
</br>
</br>
	• Si vous choisissez de suivre le chemin tortueux à travers les racines, allez au <b>chapitre 9</b>.


','StoneWall02.jpg','5','5');




insert into Chapter values(8,'Essoufflé mais déterminé, vous arrivez près d’un petit ruisseau qui serpente au milieu des
arbres. Le chant de l’eau vous apaise quelque peu, mais des murmures étranges
semblent émaner de la rive. Vous apercevez des inscriptions anciennes gravées dans une
pierre moussue.

</br>
</br>

	• Si vous touchez la pierre gravée, allez au <b>chapitre 11</b>.
</br>
</br>
	• Si vous ignorez cette curiosité et poursuivez votre route, allez au <b>chapitre 9</b>.


','Dark Forest02.jpg','6','6');



insert into Chapter values(9,'La forêt se disperse enfin, et devant vous se dresse une colline escarpée. Au sommet, le
château en ruines projette une ombre menaçante sous le clair de lune. Les murs effrités
et les tours en partie effondrées ajoutent à la sinistre réputation du lieu.
Vous sentez que la véritable aventure commence ici, et que l’influence du sorcier n’est
peut-être pas qu’une légende…','DarkCastle01.jpg',null,null);



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
qui vous ont mené à votre perte.','Laboratory01.jpg',null,null);


insert into Chapter values(11,'Qu’avez-vous fait, Malheureux !

</br>
</br>

• Rendez-vous sans perdre de temps au <b>chapitre 10</b>.


','CrossBow.jpg', null, null);



insert into Chapter values(12,'Le vent glacial souffle plus fort à mesure que vous gravissez la colline. Le chemin est
étroit et semé d\'embûches, chaque pas faisant craquer les pierres sous vos pieds. Une
étrange mélodie, presque inaudible, semble émaner du château.

En atteignant enfin les grandes portes en bois noircies par le temps, vous remarquez
d\'étranges symboles gravés dans le bois. Ils luisent faiblement sous la lumière de la
lune. Un choix s\'offre à vous :
</br>
</br>
<b>Si vous décidez d\'examiner les symboles de plus près, rendez-vous au Chapitre 14.</b>
</br>
</br> <b>Si vous préférez pousser les portes pour entrer immédiatement, rendez-vous au Chapitre 16.</b>','DarkCastle02.jpg',null,null);


insert into Links values(17,9,12);





insert into Chapter values(14,'Les symboles gravés sur les portes en bois semblent danser sous vos yeux, leur lumière pâle devenant de plus en plus intense. Vous sentez une étrange énergie émaner d\'eux, comme si quelque chose vous observait à travers ces gravures anciennes.

Soudain, un bruit sourd résonne derrière vous. En vous retournant, vous apercevez une statue de gargouille qui était, quelques instants plus tôt, figée sur un pilier à proximité. Maintenant, elle bouge. Ses yeux rouges étincellent dans l\'obscurité, et ses ailes de pierre s\'étirent avec un grincement sinistre.

Sans prévenir, la créature bondit dans votre direction. 
</br>
</br>

• Rentrez dans le chateau <b>chapitre 15</b>.

','gargouille.png',5,7);


insert into Links values(18,12,14);

insert into ChapterEvent values(7,'gargouille.png',5);

insert into Monster values(3,'Le Ventre qui gargouille',10,5,30,10,'Griffure',7,50);





insert into Chapter values(15,'
Essoufflé mais indemne, vous contournez les lourdes portes en bois et repérez une fenêtre fissurée à mi-hauteur du mur de pierre. La gargouille brisée à vos pieds ne bouge plus, mais son cri résonne encore dans votre esprit. Vous savez qu\'il est urgent de continuer avant que d\'autres créatures ne viennent.

Grimpant avec précaution sur des pierres désalignées, vous atteignez la fenêtre. À travers les carreaux poussiéreux, une faible lumière vacille, projetée par un chandelier solitaire. Vous forcez la fenêtre à s’ouvrir, le bois craquant sous votre poids, et vous vous glissez à l’intérieur.

Le silence est total, mais une sensation oppressante vous envahit. Ce château n’est pas abandonné… Quelqu’un, ou quelque chose, vous observe peut-être déjà.

</br>
</br>

• Si vous décidez de prendre la fuite : <b>chapitre 20</b>.

</br>
</br>

• Si vous décidez de chercher des éléments intéressants : <b>chapitre 16</b>.

','room.png',null,null);

insert into Links values(19,14,15);





insert into Chapter values(16,'
Vous décidez de fouiller la pièce, malgré l’atmosphère oppressante qui semble peser sur chaque meuble et chaque objet.

En examinant les livres ouverts sur la table, vous remarquez que certains symboles correspondent à ceux gravés sur les portes extérieures. Peut-être un indice sur leur usage ? Vous trouvez également une page déchirée, griffonnée à la hâte, qui semble être un avertissement :

“Ne réveillez pas ce qui dort. Le rituel est la clé, mais les conséquences sont terribles.”

Sur une étagère poussiéreuse, une fiole scellée attire votre attention. À l’intérieur, un liquide épais et sombre bouge lentement, presque comme s’il avait une vie propre.

Un bruit soudain retentit derrière vous : un craquement de bois, comme si quelqu’un ou quelque chose venait d’entrer dans la pièce…

</br>
</br>

•	Si vous décidez de confronter la personne: <b>chapitre 18</b>.

</br>
</br>

• 	Si vous décidez de fuir: <b>chapitre 20</b>.

','fiole.png',4,8);


insert into Links values(20,12,16);
insert into Links values(21,15,16);

insert into ChapterEvent values(8,'room.png',4);

insert into MCQTest values(8,'Quel est le meilleur spell de cette aventure?',3);
insert into MCQAnswer values(1,8,'Ame de Léopold');
insert into MCQAnswer values(2,8,'Boule de feu');
insert into MCQAnswer values(3,8,'Caca en boîte');
insert into MCQAnswer values(4,8,'Flamme infinie');





insert into Chapter values(20,'
Vous vous êtes enfui, vous n\'êtes qu\'un lâche ...	
','room.png',null,null);

insert into Links values(22,16,20);
insert into Links values(23,15,20);




insert into Chapter values(18,'

Dans le silence oppressant du château, la porte s\'ouvre dans un grincement aigu, et des bruits discrets de pas se font entendre sur le sol froid. Soudain, une voix s’élève, douce mais glaciale, semblant résonner dans toute la pièce, comme un écho lointain. « Vous n’auriez pas dû venir ici », chuchote-t-elle, mais rien n\'apparaît devant vous. La pièce est plongée dans l’obscurité, et pourtant, la voix semble tout près, aussi claire que si elle venait d’une présence invisible.

Un frisson glacé vous parcourt alors que la voix prend une teinte étrange, dénuée de chaleur humaine, presque surnaturelle. L\'air semble plus lourd, et une sensation étrange vous envahit : cette voix ne vient pas d’un être humain. Elle flotte autour de vous, déformée, inquiétante, comme si elle se mouvait avec l\'ombre elle-même.

</br>
</br>

•	Si vous décidez de voir son visage: <b>chapitre 19</b>.

','woman.png',null,null);

insert into Links values(24,16,18);




insert into Chapter values(19,'

— Je suis la fille du maître de ce château, murmure-t-elle. Ma malédiction est le prix de son ambition. Maintenant, vous savez… mais il est trop tard pour fuir.

Un rictus déforme son visage alors qu’elle pointe du doigt un étrange texte gravé sur le mur derrière elle. Vous lisez, le souffle coupé :

"Pour avoir percé le secret, vous devez rendre hommage à ceux qui ont créé cette expérience. <b> Ils méritent un 20/20 pour avoir osé vous emmener aussi loin <b>. Rejouez, explorez, mais n\'oubliez pas… votre aventure n\’est jamais vraiment terminée."

Elle vous fixe et avant que vous puissiez réagir, tout devient noir. La fin s’écrit d’elle-même, mais le souvenir de cette rencontre vous hante pour toujours.
</br>
</br>

FIN

','womanEnsorceller.png',null,null);

insert into Links values(26,18,19);



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