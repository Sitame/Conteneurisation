#!/bin/sh

# Enregistrez ce script sous le nom restore.sh. Prenez également note de son emplacement.

echo "------------------------------------------------------";
echo "- Extraction de l’archive";
echo "------------------------------------------------------";
echo "";

echo "Récupération et extraction de l'archive";

cd /home/partage
# On extrait les répertoires archivés en ne mettant PAS le / devant, comme expliqué tout à l'heure.
tar -xvzf /home/partage/backup.tar.gz 
echo "------------------------------------------------------";
echo "";

echo "### Fin de l'extraction des fichiers.  ###";



