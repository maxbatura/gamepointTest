#!/bin/bash
export DB_HOST="localhost"
export DB_USERNAME="root"
export DB_PASSWORD="gamepointtrialzday"
export DB_SCHEMA="gamepoint"
export SQL_FILE="dump.sql"

read -p "Are you sure you want to reset the environment? This will reset all files + database [y/N]" -n 1 -r
echo 

if [[ $REPLY =~ ^[Yy]$ ]]
then
	echo 
	echo "Reset DB"
	mysql -h$DB_HOST -u$DB_USERNAME -p$DB_PASSWORD $DB_SCHEMA < $SQL_FILE
	echo
	echo "Reset all files"
	git fetch --all
	git reset --hard origin/master
	git clean -f ../
	git pull
fi
