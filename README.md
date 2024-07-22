# Docker PHP Project

This project is a simple PHP application that includes user registration, login, and a dashboard to display registered users. The application is containerized using Docker.


## Project Structure

docker_php_project/
├── dashboard.html
├── db.php
├── display_users.php
├── Dockerfile
├── docker-compose.yml
├── index.html
├── login.html
├── login.php
├── logout.php
├── register.php



## Prerequisites

- [Docker](https://www.docker.com/get-started) installed on your machine.
- [XAMPP](https://www.apachefriends.org/index.html) installed and running MySQL service.

## Setting Up the Project

1. **Clone the Repository**: Clone this project to your local machine.
   ```bash
   git clone https://github.com/your-repo/docker_php_project.git
   cd docker_php_project
Navigate to the Project Directory:
bash
Copy code
cd docker_php_project
Docker Configuration
Dockerfile
The Dockerfile defines the PHP environment setup.

Dockerfile

# Use an official PHP image from the Docker Hub
FROM php:7.4-apache

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli

# Copy the application files into the container
COPY . /var/www/html/

# Expose port 80 to the host
EXPOSE 80
docker-compose.yml
The docker-compose.yml file defines the services required for the project.


version: '3'
services:
  php:
    build:
      context: .
      dockerfile: Dockerfile
    ports:
      - "8080:80"   # Docker container port : Host machine port
    volumes:
      - .:/var/www/html
    restart: always
    environment:
      MYSQL_HOST: host.docker.internal  # or use your host machine IP address
      MYSQL_PORT: 3306  # MySQL port on the host machine
Running the Project with Docker
Build and Start Containers: To build the Docker image and start the containers, use the following command:


docker-compose up -d --build
Access the Application: Open your web browser and navigate to http://localhost:8080. You should see the application running.

Ensure MySQL in XAMPP is Running: Make sure the MySQL service in XAMPP is running to allow the application to connect to the database.

Application Walkthrough
Registration
Go to http://localhost:8080.
Enter a username and password to register a new user.
Click "Register". If successful, a success message will be displayed.
Login
Navigate to the login page by clicking the "Login" button on the registration page or go to http://localhost:8080/login.html.
Enter the registered username and password.
Click "Login". If successful, you will be redirected to the dashboard.
Dashboard
The dashboard displays a list of registered users. You can log out by clicking the "Logout" link.

Logout
Clicking the "Logout" link will end the session and redirect you back to the login page.

Useful Docker Commands
Start Containers: docker-compose up -d
Stop Containers: docker-compose down
View Running Containers: docker ps
Rebuild Containers: docker-compose up -d --build
View Container Logs: docker-compose logs -f
Conclusion
This documentation provides a step-by-step guide to setting up and running a PHP project using Docker, with a MySQL database running on the host machine (XAMPP). By following this guide, you should be able to understand the basics of Docker and how to containerize a PHP application.

Feel free to explore more advanced Docker features and configurations to further enhance your development workflow!
