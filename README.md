# My Website Project

## Installation Steps
1. **Install Required Packages**  
   Install Apache, MySQL, and PHP:  
   ```bash
   sudo apt-get update  
   sudo apt-get install apache2 mysql-server php libapache2-mod-php php-mysql  
   ```

2. **Configure Apache**  
   - Ensure the website is served from `/var/www/html/`.  
   - Test by creating `/var/www/html/index.html` with simple content and accessing it via `http://<server-ip>/`.

3. **Create a Simple Website**  
   - Replace `index.html` with `index.php` containing:  
     ```php
     <?php echo "Hello World!"; ?>
     ```  
   - Verify by visiting `http://<server-ip>/`.

4. **Configure MySQL**  
   - Secure MySQL installation:  
     ```bash
     sudo mysql_secure_installation
     ```  
   - Create a database and user:  
     ```sql
     CREATE DATABASE web_db;  
     CREATE USER 'web_user'@'localhost' IDENTIFIED BY 'simple123';  
     GRANT ALL PRIVILEGES ON web_db.* TO 'web_user'@'localhost';  
     FLUSH PRIVILEGES;
     ```

5. **Modify the Website to Use MySQL**  
   Update `index.php` to connect to MySQL and display dynamic content, such as fetching the current time:  
   ```php
   <?php
   $conn = new mysqli('localhost', 'web_user', 'simple123', 'web_db');
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   echo "Connected to MySQL! Current Time: " . date('Y-m-d H:i:s');
   ?>
   

1. **Initialize Git Repository**:
   ```bash
   git init
   ```

2. **Create `.gitignore` File**:
   - Add sensitive files and unnecessary files to `.gitignore`.

3. **Set Up Database**:
   - Configure your `index.php` to connect to your MySQL database.
   - Use the `CREATE TABLE` script provided in `index.php` to set up the necessary database tables.

## Testing
- Open your browser and navigate to `http://localhost/index.php` to verify the website is running locally.
- Ensure the database connection is established successfully.

## Make Publicly Accessible
1. **Deploy the Project**:
   - Upload the project to a hosting server.
   - Configure the server to support PHP and MySQL.
2. **Set Permissions**:
   - Ensure proper file permissions are set on the server.

## Repository Structure
```
/project-directory
├── index.php
├── .gitignore
├── README.md
├── /assets
├── /css
├── /js
└── /config
```

## Networking Concepts

### 1. IP Address
An IP address (Internet Protocol address) is a unique identifier assigned to devices on a network. It allows devices to locate and communicate with each other over the internet or a local network. IP addresses can be categorized into two main types:
- **IPv4**: Uses a 32-bit address format (e.g., `192.168.1.1`).
- **IPv6**: Uses a 128-bit address format to handle the growing number of devices (e.g., `2001:0db8:85a3:0000:0000:8a2e:0370:7334`).

### Purpose:
- Identifies devices on a network.
- Facilitates communication between devices over the internet or within a local network.

### 2. MAC Address
A MAC address (Media Access Control address) is a hardware identifier assigned to a network interface card (NIC) by the manufacturer. It is unique to the hardware and is used for communication within a local area network (LAN).

### Purpose:
- Ensures devices on the same network can communicate.
- Works at the data link layer of the OSI model.

### Differences Between IP and MAC Addresses:
- **Scope**: MAC addresses are for local network identification, while IP addresses are used for global communication.
- **Persistence**: MAC addresses are hardware-based and usually unchanging, whereas IP addresses can change dynamically.

### 3. Switches, Routers, and Routing Protocols
- **Switch**: A network device that connects devices within the same LAN. It uses MAC addresses to forward data to the correct device.
- **Router**: A device that connects different networks and routes data packets between them. It uses IP addresses to determine the best path for data.
- **Routing Protocols**: Algorithms that routers use to determine the optimal path for data transfer. Examples include OSPF (Open Shortest Path First) and BGP (Border Gateway Protocol).

### 4. Remote Connection to Cloud Instance
Steps to connect to a cloud-based Linux instance using SSH:
1. **Obtain SSH Credentials**:
   - Ensure you have the private key file (e.g., `my-key.pem`) and the public IP address of the cloud instance.
2. **Set Permissions**:
   - Secure the private key file:
     ```bash
     chmod 400 my-key.pem
     ```
3. **Connect Using SSH**:
   - Use the following command to connect:
     ```bash
     ssh -i my-key.pem username@public-ip-address
     ```
     Replace `username` with the default user (e.g., `ubuntu` for AWS) and `public-ip-address` with the instance's IP address.
4. **Verify Connection**:
   - Once connected, you will have shell access to the cloud instance.

## How to Contribute
- Fork the repository.
- Submit a pull request with detailed changes.

