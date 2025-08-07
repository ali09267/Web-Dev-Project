create database shoppingCartDB;
use shoppingCartDB;

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(100),
  price DECIMAL(10,2),
  image VARCHAR(255)
);

INSERT INTO products (product_name, price, image) VALUES
('Wireless Mouse', 15.99, 'assets/wireless-mouse.jpg'),
('Mechanical Keyboard', 45.50, 'assets/mechanical-keyboard.jpg'),
('Gaming Headset', 60.00, 'assets/gaming-headset.jpg'),
('USB-C Cable', 7.25, 'assets/usb-c-console.jpg'),
('Laptop Stand', 25.00, 'assets/laptop-stand.jpg'),
('Bluetooth Speaker', 35.99, 'assets/bluetooth-speaker.jpg'),
('Webcam 1080p', 29.49, 'assets/webcam.jpg'),
('External Hard Drive 1TB', 75.00, 'assets/external-hard-drive.jpg'),
('Smartwatch', 99.99, 'assets/smartwatch.jpg'),
('Portable Charger', 20.00, 'assets/portable-charger.jpg');



-- Table: orders
CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  total_price DECIMAL(10,2)
);

-- Table: order_items
CREATE TABLE order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  product_name VARCHAR(100),
  quantity INT,
  price DECIMAL(10,2),
  FOREIGN KEY (order_id) REFERENCES orders(id)
);

select*from products;
SET SQL_SAFE_UPDATES = 0;
delete from products;

select*from orders;