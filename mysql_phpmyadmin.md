# MySQL & phpMyAdmin Setup

This `docker-compose` file sets up a MySQL database and a phpMyAdmin interface.

## Usage

1. **Ensure Docker & Docker Compose are installed.**
2. **Run the following command:**
   ```sh
   docker-compose -f mysql_phpmyadmin.yml up -d
   ```
3. **Access phpMyAdmin** at `http://localhost:8082/`
4. **Database Credentials:**
   - Host: `mysql`
   - User: `user`
   - Password: `password`
   - Root user: (empty password)
