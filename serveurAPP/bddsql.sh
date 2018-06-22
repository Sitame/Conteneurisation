#!/bin/sh

#----------------------------------------------------------
# a simple mysql database backup script.
# version 2, updated March 26, 2011.
# copyright 2011 alvin alexander, http://alvinalexander.com
#----------------------------------------------------------
# This work is licensed under a Creative Commons
# Attribution-ShareAlike 3.0 Unported License;
# see http://creativecommons.org/licenses/by-sa/3.0/
# for more information.
#----------------------------------------------------------

# (1) set up all the mysqldump variables
FILE=voyage_backup.sql
#DBSERVER=127.0.0.1
DATABASE=voyage
USER=voyageur
PASS=voyageur

SERVEUR='172.17.0.3'
USERSSH='alexis'
# (2) in case you run this more than once a day, remove the previous version of the file
#unalias rm     2> /dev/null
#rm ${FILE}     2> /dev/null
#rm ${FILE}.gz  2> /dev/null

# (3) do the mysql database backup (dump)

# use this command for a database server on a separate host:
#mysqldump --opt --protocol=TCP --user=${USER} --password=${PASS} --host=${DBSERVER} ${DATABASE} > ${FILE}

# use this command for a database server on localhost. add other options if need be.
cd /var/www/html
mysqldump --opt --user=${USER} --password=${PASS} ${DATABASE} > ${FILE}

# (4) gzip the mysql database dump file
#gzip $FILE

# (5) show the user the result
echo "${FILE} was created:"
#ls -l ${FILE}.gz

#Envoie du fichier via scp
scp /var/www/html/voyage_backup.sql $USERSSH@$SERVEUR:/home/partage

