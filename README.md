## Contact Microservice

**From Template To Microservice**

- Replace string `devsafe` to `MICROSERVICE_NAME` 

**How to install and Run this Project**

- Docker (Docker version 20.10.7, build 20.10.7-0ubuntu1~18.04.2)
- Docker-compose (docker-compose version 1.29.2, build 5becea4c)

**After installing above tools, you need to run below command to start this project.**

`docker build -t devsafe:latest .`
`docker-compose up`

**Add .ENV file for DB Settings**

```
DB_CONNECTION=mysql
DB_HOST=devsafe_db
DB_PORT=3306
DB_DATABASE=devsafe_micro
DB_USERNAME=root
DB_PASSWORD=root
```

**Below are the URLs to access this project and database.**

API URL: http://0.0.0.0:PORT

API Doc: http://0.0.0.0:PORT/api/documentation

Database URL: http://0.0.0.0:PORT

Database username: root

Password: root
