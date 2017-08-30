FROM php:7.1-apache
RUN ["apt-get", "update"]
RUN ["apt-get", "install", "-y", "vim"]

RUN a2enmod rewrite

RUN docker-php-ext-install pdo_mysql mbstring
RUN echo 'error_reporting = E_ALL' >> /usr/local/etc/php/conf.d/99_myconf.ini
RUN echo 'date.timezone = Asia/Tokyo' >> /usr/local/etc/php/conf.d/99_myconf.ini

RUN echo '<Directory /var/www/html/>' >> /etc/apache2/apache2.conf
RUN echo '        Options Indexes FollowSymLinks' >> /etc/apache2/apache2.conf
RUN echo '        AllowOverride All' >> /etc/apache2/apache2.conf
RUN echo '        Require all granted' >> /etc/apache2/apache2.conf
RUN echo '</Directory>' >> /etc/apache2/apache2.conf
RUN service apache2 restart


#Install Cron
RUN apt-get update && apt-get -y install cron

# Add crontab file in the cron directory
ADD crontab /etc/cron.d/hello-cron

# Give execution rights on the cron job
RUN chmod 0644 /etc/cron.d/hello-cron

# Create the log file to be able to run tail
RUN touch /var/log/cron.log

# Run the command on container startup
CMD touch /etc/crontab /etc/cron.*/* /var/log/cron.log && cron && tail -f /var/log/cron.log
