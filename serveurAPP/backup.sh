#!/bin/sh

UTILISATEUR="alexis"
VOTRE_SERVEUR="172.17.0.3"

# Enregistrez ce script sous le nom de backup.sh. Prenez note de son emplacement.

echo "------------------------------------------------------";
echo "- Sauvegarde d’un fichier";
echo "------------------------------------------------------";
echo "";

echo "Création de l'archive";

# On crée l'archive .tar en précisant entre guillemets les chemins absolus des dossiers à sauvegarder.
tar -cvzf /home/sauvegarde/backup.tar.gz "/var/www/html/"
echo "------------------------------------------------------";
echo "";

echo "Vérification de l'existence de l'archive";
# On teste si l'archive a bien été créée
if [ -e /home/sauvegarde/backup.tar.gz ]
then
echo ""
echo "Votre archive a bien été créée.";
echo ""
else
echo ""
echo "Il y a eu un problème lors de la création de l'archive.";
echo ""
fi

echo "### Fin de la sauvegarde.  ###";
echo "### Début de la synchronisation.  ###";
scp /home/sauvegarde/backup.tar.gz $UTILISATEUR@$VOTRE_SERVEUR:/home/partage
exit



