# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Enable Apache modules
RUN a2enmod rewrite

# Restart Apache
RUN service apache2 restart

# Expose port 80 to the Docker host
EXPOSE 80

# Define the command to run your PHP application when the container starts
CMD ["apache2-foreground"]
