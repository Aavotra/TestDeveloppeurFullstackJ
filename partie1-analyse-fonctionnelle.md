#  Application de calcul automatisé pour la broderie

## Description

La première étape consiste à préparer l’image : vérifier le format, la redimensionner si nécessaire, la convertir si besoin et supprimer les parties qui n’ont rien à voir avec la broderie, afin de ne conserver que le motif à broder pour des calculs précis.

Ensuite, analyser l'image pour identifier les couleurs présentes. Les zones de même couleur sont repérées, leur surface calculée, puis additionnée pour obtenir la surface totale par couleur.

À partir de ces surfaces, on estime la quantité de fil nécessaire pour chaque couleur en se basant sur une echelle ou un coefficient de conversion. Le temps de broderie est ensuite calculé à partir du nombre de points estimés et de la vitesse moyenne de la machine.

Enfin, le coût de la broderie est estimé en se basant sur un coût de référence par minute et/ou par longueur de fil utilisée selon la préférence du client, et les résultats sont présentés à l’utilisateur sous forme de tableau récapitulatif indiquant la surface, le fil nécessaire, le temps et le coût. Ces informations peuvent être affichées dans l’interface et/ou exportées sous forme de rapport.