# Employee

ระบบนี้เป็นระบบลาและอนุมัติการลาง่ายๆครับ ทำเพื่อดู logic และสไตล์การเขียนโปรแกรมครับ

Run Program
- docker-compose up -d
- ระบบจะ default ที่ port 80

Run schedule เพื่อให้ระบบ job queue ทำงาน
- docker exec -it employee_web php artisan schedule:work

Migrate Database
- docker exec -it employee_web php artisan migrate
- หรือ ใช้ไฟล์ employee_db.sql import

Seed Data
- docker exec -it employee_web php artisan db:seed --class=InitSeeder
- docker exec -it employee_web php artisan db:seed --class=EmpSeeder 

Composer dependency
- https://drive.google.com/file/d/1EoWbbjMzw4leheB386uis4NJmL8Dutcy/view?usp=sharing
- docker exec -it employee_web composer dump-autoload (ถ้า install ใหม่ อาจจะติดปัญหา เลยให้ใช้ตัวเดิมครับ)

ข้อมูลเพิ่มเติม
- ระบบ Authentication Basic ของ laravel
- แยก Business Logic ออกจาก Controller
- เมื่อมีการขออนุมัติการลาหรืออนุมัติการลาจะมีการใช้งาน event และ listener ร่วมกับระบบ queue message ของ laravel ทำให้การทำงานของระบบมีประสิทธิภาพมากขึ้น
