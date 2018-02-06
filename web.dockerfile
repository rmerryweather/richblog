FROM nginx:1.13.8

ADD vhost.conf /etc/nginx/conf.d/default.conf