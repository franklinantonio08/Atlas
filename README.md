 <!-- Elimina la carpeta del Proyecto Atlas  -->
rm -rf /var/www/html/Atlas

 <!-- Baja del Git el proyecto Completo  -->
git clone https://github.com/franklinantonio08/Atlas.git

<!-- Genera el token en el git y agregado desde el ghp hasta el @  -->
git clone https://franklinantonio08:@github.com/franklinantonio08/Atlas.git

<!-- set el remote para hacerle pull al git -->
git remote set-url origin https://franklinantonio08:@github.com/franklinantonio08/Apolo.git

<!-- Esto de hace  para poner el global del github -->
composer config --global --auth github-oauth.github.com 

 <!-- Entramos al directorio del proyecto*/ -->
cd Atlas

 <!-- Actualizamos el Composer  -->
composer update 

 <!-- copia el example.env a .env  -->
mv .env.example .env
chmod 600 .env
chown apache:apache .env  

 <!-- Crea Carpetas Publicas*/ -->
mkdir -p /var/www/html/Atlas/storage/app/public/export_temp
mkdir -p /var/www/html/Atlas/storage/app/public/infractores
mkdir -p /var/www/html/Atlas/storage/app/public/movimientos
mkdir -p /var/www/html/Atlas/storage/app/public/multas


 <!-- Permisos al storage*/ -->
sudo chown -R apache:apache /var/www/html/Atlas/storage/
sudo chown -R apache:apache /var/www/html/Atlas/bootstrap/cache

sudo chmod -R 775 /var/www/html/Atlas/storage
sudo chmod -R 775 /var/www/html/Atlas/bootstrap/cache

chown -R apache:apache storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

sudo semanage fcontext -a -t httpd_sys_rw_content_t "/var/www/html/Atlas/storage(/.*)?"
sudo semanage fcontext -a -t httpd_sys_rw_content_t "/var/www/html/Atlas/bootstrap/cache(/.*)?"

sudo restorecon -Rv /var/www/html/Atlas/storage
sudo restorecon -Rv /var/www/html/Atlas/bootstrap/cache

 <!-- para entrar a la BD  -->
mysql -u atlas -p

 <!-- entra a la db  -->
use atlas;

 <!-- eliminar si es necesario  -->
DROP DATABASE atlas;

 <!-- ejecuta scrits guardados en carpeta database  -->
source /var/www/html/Atlas/database/atlas_ofi_f.sql;
source /var/www/html/Atlas/database/actualizaciones.sql;

 <!-- entra a la db  -->
use atlas;

 <!-- valida tablas   -->
show tables; 

 <!-- salida de bd   -->
exit;


sudo chmod -R 775 /var/www/html/Atlas/storage/app/public
sudo chown -R apache:apache /var/www/html/Atlas/storage/app/public


php artisan storage:link

 <!-- http - https -->
sudo nano /etc/httpd/conf.d/atlas.conf
sudo nano /etc/httpd/conf.d/ssl.conf

 <!-- copiar y pegar  -->
<VirtualHost *:80>

    ServerAdmin ares.migracion.gob.pa
    DocumentRoot "/var/www/html/Atlas/public"

    <Directory "/var/www/html/Atlas/public">
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog "/var/log/httpd/atlas-error.log"
    CustomLog "/var/log/httpd/atlas-access.log" combined
</VirtualHost>
 <!-- FIN  -->

 <!-- borra cache  -->
php artisan optimize:clear 

 <!-- caché para producción  -->
php artisan config:cache 
php artisan route:cache 
php artisan view:cache 
php artisan event:cache

 <!-- Eliminina el log si esta muy pesado*/ -->
echo "" > storage/logs/laravel.log


 <!-- si se hacer algun cambio en el proyecto  -->
cd Atlas

git pull

 <!-- MYSQL  -->

sudo systemctl status mysqld

sudo systemctl start mysqld

sudo systemctl restart mysqld

sudo systemctl stop mysqld

sudo systemctl enable mysqld


 <!-- APACHE  -->

sudo systemctl status httpd

sudo systemctl start httpd

sudo systemctl restart httpd

sudo systemctl stop httpd

sudo systemctl enable httpd

/etc/httpd/conf.d/ssl.conf

 <!-- instalar ldap -->

sudo dnf install -y php-ldap