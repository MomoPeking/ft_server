# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: qdang <qdang@student.42.us.org>            +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/07/09 11:57:29 by qdang             #+#    #+#              #
#    Updated: 2020/07/12 18:24:42 by qdang            ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

# Base OS
FROM debian:buster

# Install utilities
RUN apt-get update && apt-get upgrade -y
RUN apt-get install wget -y
RUN apt-get install nginx -y
RUN apt-get install default-mysql-server -y
RUN apt-get install php php-mysql php-fpm php-cli php-mbstring php-zip php-gd -y

# Install & get SSL certificate
RUN wget -O mkcert https://github.com/FiloSottile/mkcert/releases/download/v1.4.1/mkcert-v1.4.1-linux-amd64
RUN chmod +x mkcert
RUN mv mkcert /usr/local/bin
RUN mkcert -install
RUN mkcert localhost
RUN mv localhost.pem /etc/nginx/
RUN mv localhost-key.pem /etc/nginx/

# Install & configure nginx
RUN service nginx start
COPY srcs/nginx.conf ./root/
RUN cp /root/nginx.conf /etc/nginx/sites-available/localhost
RUN ln -s /etc/nginx/sites-available/localhost /etc/nginx/sites-enabled/
RUN rm /etc/nginx/sites-enabled/default

# Install & configure MySQL
COPY srcs/mysql.sh ./root/
COPY srcs/wordpress.sql ./root/
RUN bash root/mysql.sh

# Install & configure phpMyadmin
RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.0.2/phpMyAdmin-5.0.2-all-languages.tar.gz
RUN tar -xf phpMyAdmin-5.0.2-all-languages.tar.gz && rm phpMyAdmin-5.0.2-all-languages.tar.gz
RUN mv phpMyAdmin-5.0.2-all-languages/ /var/www/html/phpmyadmin
RUN mkdir -p /var/lib/phpmyadmin/tmp
RUN chown -R www-data:www-data /var/lib/phpmyadmin
COPY srcs/config.inc.php ./root/
RUN cp /root/config.inc.php /var/www/html/phpmyadmin/

# Install & configure Wordpress
COPY srcs/wordpress-5.4.2.tar.gz ./
RUN tar -xf wordpress-5.4.2.tar.gz && rm wordpress-5.4.2.tar.gz
RUN mv wordpress /var/www/html/
RUN chown -R www-data:www-data /var/www/html
COPY srcs/wp-config.php ./root/
RUN cp /root/wp-config.php /var/www/html/wordpress/

# Expose HTTP and HTTPS ports
EXPOSE 80 443

# Start service
COPY srcs/start.sh ./root/
CMD bash root/start.sh
