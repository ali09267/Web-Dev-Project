🛒 Dynamic Shopping Cart System with PHP, JavaScript, and MySQL

📌 Description

A complete dynamic shopping cart web application where users can:

Browse a product catalog (dynamically loaded from MySQL database)

Add products to a real-time cart

Manage item quantities

Checkout and place an order

💻 Technologies Used

Frontend: HTML, CSS, JavaScript

Backend: PHP

Database: MySQL

🔧 Features

Frontend

✅ Dynamic product catalog (fetched from DB)

✅ Add to Cart with real-time updates

✅ Update item quantities or remove items

✅ Live total price & item count

✅ Responsive cart section

✅ Styled using CSS

✅ Search filter for product catalog

Backend

✅ checkOut.php receives cart data via POST

✅ Stores orders and items in MySQL

✅ Displays confirmation with item list, total, and date

Database Structure (see ECommDB.sql)

products: Stores product data

orders: Records each order

order_items: Stores items per order

📁 Project Structure

/Task18/
├── /assets/               → (images in root folder, 23 .jpg files)
├── /CSS/                  → index.css, checkOut.css, order_confirm.css
├── /JS/                   → index.js
├── /PHP/
│   ├── checkOut.php
│   ├── databaseConnection.php
│   ├── order_confirm.php
├── /Database/
│   └── ECommDB.sql
├── index.php              → Main product listing

🧠 Learning Outcomes

DOM manipulation with JS

Form handling & POST with PHP

Relational database structure & JOINs

Full-stack data flow between frontend and backend

📌 Future Improvements 

Adding a sign up and login page in order to restrict only logged in users to access checkout

Adding a admin panel where admin could add, edit, delete products

Order history page in admin panel where admin could access all the orders made.

🗂️ Credits

Developed as a Web Development Project under Miss Urooj Islam Khan

