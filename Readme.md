# Project Title: Entomological Archive Database

## Overview

This project is a LAMP (Linux, Apache, MySQL, PHP) stack-based database hosted on Google Cloud Platform (GCP). The Entomological Archive Database serves as an efficient solution for organizing species information and taxonomic classifications, streamlining specimen collection, and enhancing efficiency in research sample distribution.

## Technologies Used

- **Linux:** The project runs on a Linux-based server.
- **Apache:** Apache web server is used for serving the PHP application.
- **MySQL:** MySQL is employed as the relational database management system for data storage.
- **PHP:** PHP is used for server-side scripting to interact with the database.

## Deployment on GCP

The application is hosted on Google Cloud Platform (GCP) to leverage its scalability and reliability. The following steps outline the deployment process:

1. **Compute Engine Instance:** Set up a Compute Engine instance on GCP with a Linux operating system to host the LAMP stack.

2. **Apache Configuration:** Configure the Apache web server to serve the PHP application. Ensure the necessary modules are enabled.

3. **MySQL Setup:** Install and configure MySQL to create the database and set up the required tables. Secure the MySQL installation.

4. **PHP Application Deployment:** Deploy the PHP application to the server. Ensure all dependencies are installed and configure the application to connect to the MySQL database.

5. **Domain Configuration:** If a custom domain is used, configure domain settings and update DNS records to point to the GCP Compute Engine's external IP address.

## Project Structure

The project structure is organized as follows:

- **`/html`:** Contains HTML files for the web application.
- **`/php`:** PHP scripts for server-side processing and database interactions.
- **`/sql`:** SQL scripts for database schema and initial data setup.

## Configuration Files

- **`/etc/apache2/sites-available/000-default.conf`:** Apache virtual host configuration file.
- **`/etc/mysql/my.cnf`:** MySQL configuration file.
- **`/etc/php/7.4/apache2/php.ini`:** PHP configuration file.

## Getting Started

1. Clone the repository to your local machine.
   ```bash
   git clone https://github.com/noahring/GlobalComplex.git
# Setting Up LAMP Stack

## Deployment Steps

1. Follow the deployment steps mentioned above to set up the LAMP stack on your server.

2. Import the SQL scripts in the `/sql` directory to initialize the database schema and populate initial data.

3. Access the web application through the server's IP address or custom domain.

## Contributing

If you would like to contribute to the project, please follow the standard GitHub flow:

1. Fork the repository.
2. Create a new branch for your feature/bug fix.
3. Make your changes and submit a pull request.

## License

This project is licensed under the MIT License. Feel free to use, modify, and distribute the code as per the terms of the license.
