#!/bin/sh

sudo apt-get update
sudo apt-get -y install wget
sudo apt-get -y install php7.4-cli
sudo apt-get -y install php7.4-mysqli
wget https://dev.mysql.com/get/mysql-apt-config_0.8.14-1_all.deb
sudo dpkg -i mysql-apt-config_0.8.14-1_all.deb
sudo apt-get update
sudo apt-get install mysql-community-server




