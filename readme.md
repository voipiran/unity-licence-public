# VoipIran Unity License (The Issabel Side)
- put `public` content in `/var/www/html/voipiran/unity-licence`
- put other content except `public` in `/var/www/voipiran/unity-licence`
- chown -R asterisk:asterisk /var/www/voipiran/unity-licence
- in `/etc/httpd/conf.d/issabel-htaccess.conf` add the following lines:
```
<Directory "/var/www/html/voipiran/unity-licence">
    AllowOverride All
</Directory>
```
- in `/var/www/voipiran/unity-licence` run this commands
- `php artisan voipiran:db`
- `php artisan migrate`
