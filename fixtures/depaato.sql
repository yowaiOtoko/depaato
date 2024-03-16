delete from product;
ALTER TABLE product AUTO_INCREMENT = 1;
delete from store;
ALTER TABLE store AUTO_INCREMENT = 1;
INSERT INTO `store` (`name`, `store_type`, `address`, `phone`, `opening_hours`, `services`, `website`, `accessibility`) VALUES
('Meubles Bonheur', 'Magasin de meubles', '123 rue de Paris, 75001 Paris', '01 23 45 67 89', '09:00-18:00', '{"livraison": true, "montage": true}', 'http://www.meublesbonheur.com', 1),
('Déco Maison', 'Magasin de meubles', '456 avenue de la République, 75011 Paris', '01 98 76 54 32', '10:00-19:00', '{"livraison": true, "montage": true}', 'http://www.decomaison.com', 1),
('L\'Univers du Salon', 'Magasin de meubles', '789 boulevard Saint-Germain, 75007 Paris', '01 87 65 43 21', '09:30-18:30', '{"livraison": true, "conseil personnalisé": true}', 'http://www.universdusalon.com', 1),
('Boutique Tech', 'Magasin d\'électronique', '321 rue du Faubourg Saint-Antoine, 75012 Paris', '01 23 45 67 89', '10:00-20:00', '{"réparation": true, "garantie": true}', 'http://www.boutiquetech.com', 1),
('Tech Avancée', 'électronique', '987 avenue de l\'Innovation, 31000 Toulouse', '5678901234', '10:00-19:00', JSON_ARRAY('Réparation', 'Support en ligne', 'Personnalisation'), 'https://techavancee.fr', 1);




-- Inserting 5 new "canapé" products for store 1 (Boutique Parisienne)
INSERT INTO `product` (`store_id`, `label`, `description`, `media`, `services`, `price`, `discount_rate`, `discounted_price`, `stock`) VALUES
(1, 'Canapé Horizon', 'Un canapé spacieux aux lignes épurées et au design contemporain.', '{}', '{}', 870.00, NULL, NULL, 8),
(1, 'Canapé Plénitude', 'Un canapé d\'angle offrant un confort absolu et un tissu doux au toucher.', '{}', '{}', 1250.00, 0.15, 1062.50, 4),
(1, 'Canapé Cosmopolite', 'Un canapé convertible idéal pour les petites espaces, facile à transformer en lit.', '{}', '{}', 650.00, NULL, NULL, 6),
(1, 'Canapé Tradition', 'Un canapé classique en bois massif avec des finitions artisanales.', '{}', '{}', 1100.00, 0.1, 990.00, 5),
(1, 'Canapé Rêverie', 'Un canapé moelleux avec des coussins généreux pour des moments de détente.', '{}', '{}', 920.00, NULL, NULL, 7);

-- Inserting 5 other furniture products for store 1 (Boutique Parisienne)
INSERT INTO `product` (`store_id`, `label`, `description`, `media`, `services`, `price`, `discount_rate`, `discounted_price`, `stock`) VALUES
(1, 'Table Basse Lumière', 'Une table basse moderne avec un éclairage LED intégré et un design en verre.', '{}', '{}', 320.00, NULL, NULL, 10),
(1, 'Chaise Empilable Époque', 'Chaises empilables en plastique renforcé, parfaites pour le jardin ou le balcon.', '{}', '{}', 60.00, NULL, NULL, 15),
(1, 'Étagère Bibliothèque Essentiel', 'Une grande bibliothèque murale offrant une solution de rangement élégante et pratique.', '{}', '{}', 250.00, 0.05, 237.50, 12),
(1, 'Buffet Céleste', 'Buffet spacieux en chêne avec beaucoup de place de rangement et des portes coulissantes.', '{}', '{}', 800.00, NULL, NULL, 9),
(1, 'Fauteuil Relaxation', 'Un fauteuil de relaxation pivotant avec repose-pied intégré pour le plus grand confort.', '{}', '{}', 480.00, NULL, NULL, 11);


-- Inserting 3 "canapé" products for store 2 (Déco Moderne)
INSERT INTO `product` (`store_id`, `label`, `description`, `media`, `services`, `price`, `discount_rate`, `discounted_price`, `stock`) VALUES
(2, 'Canapé Nuage', 'Un canapé en tissu gris avec des coussins confortables, parfait pour se détendre.', '{}', '{}', 1190.00, 0.1, 1071.00, 10),
(2, 'Canapé Panoramique', 'Grand canapé d\'angle propice aux soirées conviviales, en velours bleu nuit.', '{}', '{}', 1450.00, NULL, NULL, 8),
(2, 'Canapé Scandinave', 'Un canapé style scandinave avec des pieds en bois et un revêtement en tissu épuré.', '{}', '{}', 980.00, 0.2, 784.00, 5);
-- Inserting 2 chair products for store 2 (Déco Moderne)
INSERT INTO `product` (`store_id`, `label`, `description`, `media`, `services`, `price`, `discount_rate`, `discounted_price`, `stock`) VALUES
(2, 'Chaise Contemporaine', 'Chaises élégantes au design contemporain avec une structure en métal noir.', '{}', '{}', 130.00, NULL, NULL, 20),
(2, 'Chaise Dossier Haut', 'Chaises confortables avec un dossier haut et un rembourrage de qualité.', '{}', '{}', 155.00, 0.15, 131.75, 18);

-- Inserting 3 table products for store 2 (Déco Moderne)
INSERT INTO `product` (`store_id`, `label`, `description`, `media`, `services`, `price`, `discount_rate`, `discounted_price`, `stock`) VALUES
(2, 'Table Extensible', 'Table de salle à manger extensible avec un plateau en bois massif et finition brillante.', '{}', '{}', 899.00, NULL, NULL, 12),
(2, 'Table Ronde Mini', 'Petite table ronde pratique pour les espaces réduits, avec pied central en métal.', '{}', '{}', 470.00, 0.05, 446.50, 15),
(2, 'Table Basse Carrée', 'Table basse carrée avec plateau en marbre, idéale pour un salon contemporain.', '{}', '{}', 550.00, NULL, NULL, 10);

-- Inserting 2 shelf products for store 2 (Déco Moderne)
INSERT INTO `product` (`store_id`, `label`, `description`, `media`, `services`, `price`, `discount_rate`, `discounted_price`, `stock`) VALUES
(2, 'Étagère Murale Design', 'Étagère murale avec compartiments de rangement asymétriques, finition laquée.', '{}', '{}', 245.00, NULL, NULL, 10),
(2, 'Étagère Cube', 'Structure étagère en forme de cube pour une touche moderne et fonctionnelle.', '{}', '{}', 330.00, 0.1, 297.00, 8);


-- Inserting random products for store 3 (Maison Confort)
INSERT INTO `product` (`store_id`, `label`, `description`, `media`, `services`, `price`, `discount_rate`, `discounted_price`, `stock`) VALUES
-- Canapés
(3, 'Canapé Océan', 'Canapé d\'angle en tissu bleu océan, accueillant et spacieux.', '{}', '{}', 1360.00, NULL, NULL, 6),
(3, 'Canapé Vintage', 'Canapé rétro en cuir marron, rappelant le charme des années 50.', '{}', '{}', 1570.00, 0.05, 1491.50, 4),
-- Chairs
(3, 'Chaise Bistrot', 'Chaises style bistrot avec structure en métal et assise en bois vernis.', '{}', '{}', 95.00, NULL, NULL, 16),
(3, 'Fauteuil Lounge', 'Fauteuil lounge confortable avec repose-pieds assorti, en tissu gris.', '{}', '{}', 620.00, NULL, NULL, 7),
-- Tables
(3, 'Table de Chevet', 'Petite table de chevet avec tiroir, en bois de hêtre massif.', '{}', '{}', 240.00, 0.1, 216.00, 9),
(3, 'Table Haute Bar', 'Table haute de style bar avec plateau en bois foncé et pieds en acier.', '{}', '{}', 770.00, NULL, NULL, 5),
-- Shelves
(3, 'Étagère Flottante', 'Étagère flottante minimaliste, idéale pour exposer objets décoratifs.', '{}', '{}', 140.00, NULL, NULL, 12),
(3, 'Étagère Industrielle', 'Étagère de style industriel combinant bois et métal, solidité assurée.', '{}', '{}', 530.00, 0.2, 424.00, 10),
-- Buffet
(3, 'Buffet Minimaliste', 'Buffet épuré avec portes coulissantes et finition en laque blanche.', '{}', '{}', 1150.00, NULL, NULL, 8),
(3, 'Buffet Classique', 'Buffet classique avec tiroirs, en chêne massif et design intemporel.', '{}', '{}', 1500.00, NULL, NULL, 6);


-- Inserting 10 articles matching the store type (Électronique Créatif) split into 4 categories

-- Computers (Ordinateurs)
INSERT INTO `product` (`store_id`, `label`, `description`, `media`, `services`, `price`, `discount_rate`, `discounted_price`, `stock`) VALUES
(4, 'Ordinateur Portable Performant', 'Ordinateur portable ultraléger avec processeur rapide et écran haute résolution.', '{}', '{}', 1299.00, NULL, NULL, 15),
(4, 'PC de Bureau Gamer', 'Tour de PC pour gaming avec carte graphique puissante et système de refroidissement avancé.', '{}', '{}', 1899.00, NULL, NULL, 10),
-- Smartphones (Téléphones Intelligents)
(4, 'Smartphone Écran Infinity', 'Smartphone avec écran infinity, appareil photo haute définition et une autonomie longue durée.', '{}', '{}', 950.00, NULL, NULL, 25),
(4, 'Téléphone Étanche', 'Téléphone résistant à l\'eau et aux chocs, idéal pour les aventuriers.', '{}', '{}', 699.00, NULL, NULL, 20),
-- Audio Equipment (Équipements Audio)
(4, 'Casque Audio Sans Fil', 'Casque audio sans fil avec réduction de bruit active et son de haute qualité.', '{}', '{}', 280.00, NULL, NULL, 30),
(4, 'Enceinte Bluetooth', 'Enceinte Bluetooth portable offrant un son puissant et clair dans un design compact.', '{}', '{}', 120.00, NULL, NULL, 40),
-- Wearable Devices (Appareils Connectés)
(4, 'Montre Connectée', 'Montre connectée avec suivi d\'activité, notifications de smartphone et résistance à l\'eau.', '{}', '{}', 399.00, NULL, NULL, 22),
(4, 'Bracelet Fitness', 'Bracelet de fitness qui suit votre activité, sommeil et fréquence cardiaque.', '{}', '{}', 140.00, NULL, NULL, 35),
(4, 'Lunettes de Réalité Augmentée', 'Lunettes de réalité augmentée pour une immersion dans vos jeux et applications préférés.', '{}', '{}', 1300.00, NULL, NULL, 10),
(4, 'Casque de Réalité Virtuelle', 'Casque VR pour une expérience de jeu immersive et des voyages virtuels époustouflants.', '{}', '{}', 499.00, NULL, NULL, 15);

-- Inserting 10 articles matching the store type (Store 5) split into 4 categories

-- Computers (Ordinateurs)
INSERT INTO `product` (`store_id`, `label`, `description`, `media`, `services`, `price`, `discount_rate`, `discounted_price`, `stock`) VALUES
(5, 'Mini PC Compact', 'Mini PC compact idéal pour le travail de bureau et le multimédia.', '{}', '{}', 599.00, NULL, NULL, 12),
(5, 'Station de Travail Graphique', 'Station de travail graphique haute performance pour professionnels de la création.', '{}', '{}', 2299.00, NULL, NULL, 7),
-- Smartphones (Téléphones Intelligents)
(5, 'Smartphone Pliable', 'Smartphone à écran pliable offrant de nouvelles possibilités multimédia et productivité.', '{}', '{}', 1100.00, NULL, NULL, 18),
(5, 'Téléphone Durable', 'Téléphone conçu pour durer, avec composants facilement remplaçables et OS open-source.', '{}', '{}', 550.00, NULL, NULL, 20),
-- Audio Equipment (Équipements Audio)
(5, 'Écouteurs Intra-auriculaires', 'Écouteurs intra-auriculaires avec qualité sonore exceptionnelle et confort longue durée.', '{}', '{}', 150.00, NULL, NULL, 35),
(5, 'Barre de Son Surround', 'Barre de son avec technologie surround offrant une expérience cinématographique à domicile.', '{}', '{}', 399.00, NULL, NULL, 25),
-- Wearable Devices (Appareils Connectés)
(5, 'Montre Intelligente Sport', 'Montre intelligente orientée sport avec GPS intégré et surveillance avancée de la santé.', '{}', '{}', 350.00, NULL, NULL, 19),
(5, 'Tracker d\'Activité', 'Tracker d\'activité avec suivi des pas, des calories brûlées et analyse du sommeil.', '{}', '{}', 89.00, NULL, NULL, 40),
(5, 'Anneau Connecté', 'Anneau connecté qui mesure les signes vitaux et permet de contrôler des appareils intelligents.', '{}', '{}', 249.00, NULL, NULL, 21),
(5, 'Casque VR Haute Définition', 'Casque de réalité virtuelle haute définition pour une immersion complète dans vos jeux.', '{}', '{}', 599.00, NULL, NULL, 14);