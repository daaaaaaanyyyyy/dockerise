## Docker with php,mysql,phpmyadmin
## Docker guide available on dockerguid.md
# Laravel Dockerized Project

## Overview

This project is a Laravel application containerized with Docker, using PHP 8.2, MySQL, and phpMyAdmin.

## Prerequisites

Ensure you have the following installed on your system:

- Docker & Docker Compose
- Git

## Setup Instructions

### 1. Clone the Repository

```sh
git clone https://github.com/walidhmri/dockerise.git
cd dockerise
```

### 2. Configure Environment Variables

Copy the example environment file and configure it as needed:

```sh
just update .env if needed
```

Modify `.env` with your database credentials and application settings if you modified any of them.

### 3. Build and Start Containers
note: -d to run in background
```sh
docker-compose up --build -d 
```

This will start:

- Laravel application (PHP 8.2)
- MySQL database
- phpMyAdmin



### 4. Access the Application

- Laravel API/UI: [http://localhost:8000](http://localhost:8000)
- phpMyAdmin: [http://localhost:9000](http://localhost:9000) (Host: `mysql`, User: `root`, Password: `root`), (Host: `mysql`, User: `user`, Password: `password`)

### 5. Stop and Remove Containers

To stop containers:

```sh
docker-compose down
```

To remove all containers, networks, and volumes:

```sh
docker-compose down -v
```

## Troubleshooting

- **Port 8000 already in use?** Run `docker ps` to find running containers and stop conflicting services.
- **Database connection issues?** Ensure MySQL container is healthy: `docker ps` should show `(healthy)`.
- **Laravel permissions issue?** Run:
  ```sh
  docker-compose exec php chmod -R 777 storage bootstrap/cache
  ```

## Connect to the secret santa with this credentials:

email: 
```
user@walidhmri.io
```
password
```
password
```

## Contributing

Feel free to fork the repository and submit pull requests.

## License

free to use.


## If you have any troubles feel free to contact me at : 

contact at :
```
 oualidhamri@icloud.com
```
or :
```
 oualid.hamri@univ-bouira.dz
 ```
 Enjoy