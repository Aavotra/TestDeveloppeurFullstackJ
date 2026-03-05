#  Application de calcul automatisé pour la broderie

## 1. Approche globale 
### Description

La première étape consiste à préparer l’image : vérifier le format, la redimensionner si nécessaire, la convertir si besoin et supprimer les parties qui n’ont rien à voir avec la broderie, afin de ne conserver que le motif à broder pour des calculs précis.

Ensuite, analyser l'image pour identifier les couleurs présentes. Les zones de même couleur sont repérées, leur surface calculée, puis additionnée pour obtenir la surface totale par couleur.

 À partir des surfaces calculées, on estime la quantité de fil nécessaire pour chaque couleur en se basant sur une échelle de référence. Le temps de broderie est ensuite déterminé à partir des surfaces estimées et de la vitesse moyenne de la machine, exprimée par exemple en surface  ou en nombre de points brodés par minute. 

Enfin, le coût de la broderie est estimé en se basant sur un coût de référence par minute et/ou par longueur de fil utilisée selon la préférence du client, et les résultats sont présentés à l’utilisateur sous forme de tableau récapitulatif indiquant la surface, le fil nécessaire par couleur ainsi que la couleur, le temps et le coût. Ces informations peuvent être affichées dans l’interface et/ou exportées sous forme de rapport.

###  Vision d'ensemble 

#### Étape 1 : Calcul de la surface totale par couleur
- Import de l'image fournie par le client dans le logiciel
- Préparation de l'image
- Analyse de l'image afin d'identifier les différentes couleurs présentes
- Contourage sur l'image de tous les traits ou zones ayant la même couleur
- Calcul de la surface de chaque trait ou zone détectée
- Regroupement des surfaces par couleur
- Calcul de la surface totale pour chaque couleur

#### Étape 2 : Estimer la quantité de fil nécessaire par couleur
- Se baser sur une échelle ou un coefficient de conversion entre surface brodée et longueur de fil
- Calcul de la quantité de fil nécessaire en fonction de la surface totale pour chaque couleur
- Génération d'une estimation de la longueur totale de fil requise par couleur

#### Étape 3 : Estimer le temps de la broderie
- Déterminer la vitesse moyenne de broderie de la machine (points par minute ou surface par minute)
- Convertir la surface à broder en nombre estimé de points de broderie
- Calculer le temps nécessaire pour broder chaque couleur
- Additionner les temps pour obtenir la durée totale de la broderie

#### Étape 4 : Estimer le coût de la broderie
- Définir un coût de référence (par minute de broderie ou par longueur de fil utilisée)
- Calculer le coût pour chaque couleur en fonction de la quantité de fil et du temps de broderie
- Additionner les différents coûts pour obtenir le coût total estimé


## 3. Obstacles potentiels et risques

### 1. Qualité ou résolution des images

#### **Problème**

Les images fournies par les clients peuvent être :

- de faible résolution  
- floues  
- compressées  

Cela peut rendre difficile :

- la détection correcte des couleurs  
- l’identification précise des zones à broder

#### **Pistes de résolution**

- Vérifier la résolution minimale de l’image lors de l’import.
- Appliquer un prétraitement de l’image : redimensionnement, etc.
- Limiter les formats acceptés (ex. : PNG, JPG) ainsi que la taille maximale des images acceptées.


### 2. Estimation approximative du fil et du temps

#### **Problème**

La conversion entre :

- la surface brodée  
- la longueur de fil  
- le temps de broderie  

dépend de plusieurs paramètres :

- la densité des points  
- la vitesse de la machine, etc.

Ces paramètres peuvent varier d’une machine à l’autre.

#### **Pistes de résolution**

- Permettre à l’utilisateur de modifier les paramètres :
  - densité des points
  - vitesse de la machine
  - coût par minute

- Afficher les résultats comme des estimations et non comme des valeurs exactes.

Plusieurs autres risques peuvent également être cités, tels que le mélange de couleurs proches, la dégradation des performances sur les images de grande taille ou encore la présence d’éléments non brodables dans l’image pouvant fausser les calculs lors de la détection des couleurs. Cependant, ces problèmes peuvent en grande partie être atténués grâce à l’étape de prétraitement de l’image ainsi qu’à la validation de l’image en entrée, par exemple en vérifiant les formats ou en limitant les formats acceptés.
