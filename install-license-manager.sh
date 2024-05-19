#!/bin/bash
echo "Install voipiran License Manager"
echo "VOIPIRAN.io"

###Fetch DB root PASSWORD
rootpw=$(sed -ne 's/.*mysqlrootpwd=//gp' /etc/issabel.conf)

sleep 1

echo "------------START-----------------"
#!/bin/bash


# Get PHP version
php_version=$(php -r "echo PHP_MAJOR_VERSION;")

# Perform actions based on PHP version
if [ "$php_version" -eq 5 ]; then
    echo "PHP 5 detected. Performing action A."

echo "Install sourceguardian Files"
echo "------------Copy SourceGaurd-----------------"
yes | cp -rf sourceguardian/ixed.5.4.lin /usr/lib64/php/modules
yes | cp -rf sourceguardian/ixed.5.4ts.lin /usr/lib64/php/modules
yes | cp -rf /etc/php.ini /etc/php-old.ini
yes | cp -rf sourceguardian/php5.ini /etc/php.ini
echo "SourceGuardian Files have Moved Sucsessfully"
sleep 1


else
    echo "PHP 7 (or newer) detected. Performing action B."

echo "Install sourceguardian Files"
echo "------------Copy SourceGaurd-----------------"
yes | cp -rf sourceguardian/ixed.7.4.lin /usr/lib64/php/modules
yes | cp -rf /etc/php.ini /etc/php-old.ini
yes | cp -rf sourceguardian/php7.ini /etc/php.ini
echo "SourceGuardian Files have Moved Sucsessfully"
sleep 1


fi






echo "-------------Installing Composer----------------"
#yum -y -q install php-cli php-zip wget unzip  > /dev/null
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer  > /dev/null
yes | composer install

mkdir /var/www/html/voipiran
mkdir /var/www/html/voipiran/unity-licence
mkdir /var/www/voipiran
mkdir /var/www/voipiran/unity-licence


yes | cp -avr public/* public/.htaccess /var/www/html/voipiran/unity-licence > /dev/null
yes | cp -avr * .env /var/www/voipiran/unity-licence > /dev/null
yes | rm -rf /var/www/voipiran/unity-licence/public > /dev/null

#Install Links Guide
yum install git -y
git clone https://github.com/voipiran/links-guide.git
yes | cp -avr links-guide/* /var/www/html/voipiran > /dev/null


#Change DB Password
sed -i "s/123456/${rootpw}/g" /var/www/voipiran/unity-licence/.env


echo '<Directory "/var/www/html/voipiran/unity-licence">' >> /etc/httpd/conf.d/issabel-htaccess.conf
echo 'AllowOverride All' >> /etc/httpd/conf.d/issabel-htaccess.conf
echo '</Directory>' >> /etc/httpd/conf.d/issabel-htaccess.conf

echo '<Directory "/var/www/html/voipiran/phone">' >> /etc/httpd/conf.d/issabel-htaccess.conf
echo 'AllowOverride All' >> /etc/httpd/conf.d/issabel-htaccess.conf
echo '</Directory>' >> /etc/httpd/conf.d/issabel-htaccess.conf

#Create Database
php /var/www/voipiran/unity-licence/artisan voipiran:db
php /var/www/voipiran/unity-licence/artisan migrate

chown -R asterisk:asterisk /var/www/voipiran/unity-licence
chown -R asterisk:asterisk /var/www/voipiran
chown -R asterisk:asterisk /var/www/html/voipiran

echo "-------------Issabel Menu----------------"
issabel-menumerge license-menu.xml
echo "Issabel Menu is Created Sucsessfully"
sleep 1


echo "-------------Apache Restart----------------"
service httpd restart
echo "Apache has Restarted Sucsessfully"
sleep 1

echo "-----------FINISHED (voipiran.io)-----------"


