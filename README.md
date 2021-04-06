# วิธีการใช้งาน

Demo 

https://short.phattarachai.dev

## ติดตั้ง Project

```
composer install
npm install
npm run production
```

## Config Database

คัดลอกไฟล์ .env.example เป็น .env

```
# .env
#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = localhost
database.default.database = shortigniter_db
database.default.password = root
database.default.username = root
database.default.DBDriver = MySQLi

```

สร้าง database ตาม config ที่ตั้งแล้ว Run migration

```
php spark migrate
```

## เข้าใช้งานเวป

```
php spark serve
```
