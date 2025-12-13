# VirtualBox WebServer LAMP Stack Project  
## Overview
This project demonstrates the creation of a Linux-based web server using a full **LAMP Stack** (Linux, Apache, MySQL, PHP) running inside **VirtualBox**. The purpose of the project is to illustrate core Operating System Architecture concepts such as virtualization, process and service management, file systems, networking, and resource allocation in a real-world server environment.  

The hosted web application explains each layer of the LAMP stack and provides tutorials on how to install and configure VirtualBox, Ubuntu Server, Apache, MySQL, and PHP using content that is stored in a MySQL database and dynamically retireved using PHP.
## Project Goals
- Build a functional Linux web server in a virtualized environment
- Deploy and configure a complete LAMP stack
- Demonstrate how OS services support web applications
- Use PHP to dynamically retrieve and display content from a database
- Provide educational explanations of each LAMP component
## Technologies Used
- **Virtualization:** Oracle VirtualBox
- **Operating System:** Linux Ubuntu Server 24.04.3 LTS
- **Web Server:** Apache HTTP Server
- **Database:**  MySQL (InnoDB storage engine)
- **Server-Side Language:** PHP (Hypertext Preprocessor)
- **Database Management:** phpMyAdmin
## Pre-requisites
1. [Install and configure VirtualBox](assets/files/pdf)
2. Install and configure Ubuntu Server
3. Install and configure Apache
4. Install and configure MySQL
5. Install and configure PHP  
  
Tutorials on how to complete these steps can be found in the `assets/files/pdf` folder or by clicking on the links above.
## Setup
1. Make a new directory in the Apache root folder
   ```bash
   sudo mkdir /var/www/jttutorials
   ```
2. Clone the repository:
   ```bash
   git clone https://github.com/J-Harder81/VB-WebServer-Project.git /var/www/jttutorials
   ```
3. Configure permissions
   ```bash
   sudo chown -R www-data:www-data /var/www/jttutorials && sudo chmod -R 755 /var/www/jttutorials
   ```
4. Create the MySQL database
   - Login to MySQL
     ```bash
     mysql -u root -p
     ```
   - Run the MySQL script
     ```bash
     SOURCE /var/www/jttutorials/mysql/jtt_db.sql
     ```
5. Change Apache's Directory Index
   ```bash
   sudo nano /etc/apache2/mods-available/dir.conf
   ```
   Move index.php in front of index.html
   ```
   DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm
   ```
6. Create the site configuration file
   ```bash
   sudo nano /etc/apache2/sites-available/jttutorials.conf
   ```
   Copy the code below and change `your_server_ip_address` to your VM's IP address
   ```
   <VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/jttutorials
    ServerName your_server_ip_address

    <Directory /var/www/jttutorials>
        Options Indexes FollowSymLinks
        AllowOverride None
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/jttutorials_error.log
    CustomLog ${APACHE_LOG_DIR}/jttutorials_access.log combined
   </VirtualHost>
   ```
7. Disable Apache's default site and enable the new site
   ```bash
   sudo a2dissite 000-default.conf && sudo a2ensite jttutorials.conf
   ```
   Restart Apache
   ```bash
   sudo systemctl restart apache2
   ```
8. Using text editor like `vim` or `nano` to change the database login credentials in 4 php files (`authenticate.php`, `functions.php`, `profile.php`, and `register-process.php`)located in the `/var/www/jttutorials/php` directory
   ```
   $DATABASE_HOST = 'localhost';
   $DATABASE_USER = 'username';
   $DATABASE_PASS = 'password';
   $DATABASE_NAME = 'databasename';
   ```
   Change `username`, `password`, `databasename` to your MySQL username, password and databasename keeping the single quotes
9. Open a web browser on your host machine and type the VM's IP address in the address bar and you should see the website's login page, you can test the login using the test account that was created from the MySQL script. Username: `test`, Password: `test`
## File Structure
### Webpage files
- account.php (the account profile page)
- home.php (the website home page)
- index.php (the website login page)
- layer.php (a dynamic page that loads LAMP stack layer information based on user actions)
- register.php (the website registration page)
- tutorial.php (a dynamic page that loads tutorial files and provides download link)  
### `assets` folder
- `files`
  - `pdf` (Folder containing the tutorial files retrieved by the database)
  - `txt` (Folder containing the text files used for dynamic content retrieved by the database)
- `images` (folder containing the image files used for both static and dynamic content retrieved by the database)  
### `css` folder
- home.css (stylesheet for the account, home, layer, and tutorial pages)
- login.css (stylesheet for the login and registration pages)  
### `includes` folder (Contains shared files used by all the webpages)
- footer.php (webpage footer)
- header.php (webpage header)
- nav.php (webpage navigation bar)  
### `javascript` folder
- script.js (script used to highlight which webpage the user is on)  
### `php` folder
- authenticate.php (script used to authenticate a user on login)
- functions.php (functions to retrieve layer and tutorial data from mysql and display them on the screen)
- logout.php (script to terminate a user's session)
- profile.php (script to get a user's account information from mysql and display them on the screen)
- register-process.php (script used to create a new account and insert the information in the accounts table of mysql)
## Author
Created by Justin Harder  
Information Technology Student  
Operating System Architecture Project  
