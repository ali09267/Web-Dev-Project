<<<<<<< HEAD
# Free Fire Fan Website (Admin Panel + User Features)

Welcome to the **Free Fire Fan Website** — a fully responsive and dynamic PHP + MySQL web project designed for fans of the popular mobile game **Garena Free Fire**.

This project includes both **frontend (user)** and **backend (admin)** functionality, all styled using **Bootstrap 5** and powered by **PHP, MySQL, HTML, CSS, and JavaScript**.

## Project Structure

```bash
/Website
├── /PHP              → All PHP backend logic (CRUD for news, leaderboard, contact)
├── /CSS              → Stylesheets
├── /JS               → JavaScript functions (e.g., delete confirmation)
├── /uploads          → Uploaded images for news
├── index.php         → Homepage with banner, news section, and CTAs
├── news.php          → View all latest news
├── contact.php       → Contact form for visitors
├── characters.php    → Free Fire character gallery
├── leaderboard.php   → Leaderboard page showing top players
├── admin.php         → Admin dashboard with buttons to manage sections
└── databaseConnection.php → MySQL connection setup
 How to Run the Project
 Download or clone the project folder into your htdocs directory (for XAMPP).

 Import the provided SQL file into phpMyAdmin to create the necessary tables.

 Open http://localhost/Website/index.php in your browser.

 Make sure XAMPP’s Apache and MySQL services are running.

 Database Tables Used
news
Field	Type	Description
news_id	INT (PK)	Auto-increment ID
title	TEXT	News title
content	TEXT	News body
img	VARCHAR	Path to uploaded image
publish_date	DATE	Date auto-filled (NOW())

leaderboard
Field	Type	Description
player_id	INT (PK)	Auto-increment
username	VARCHAR	Player name
score	INT	Player’s score
rank	INT	Player’s rank

contact
Field	Type	Description
id	INT	Auto-increment
name	VARCHAR	Visitor’s name
email	VARCHAR	Visitor’s email
message	TEXT	Visitor’s message

🧑‍💻 Admin Panel
Visit admin.php to access the admin dashboard.

 Features:
Add News → Upload title, content & image.

Edit News → Update existing news articles.

Delete News → Confirmation prompt, auto-remove from DB and UI.

Manage Leaderboard → Add/edit/delete players, scores, and ranks.

Manage Contacts → View/delete visitor messages.

 Note: No login system implemented yet — admin area is open (can be enhanced later).

 News Management
News are displayed dynamically from DB on homepage (index.php) and news.php.

Admin can upload an image with each news post.

Stored in /uploads directory.

 Leaderboard Section
Users can view Free Fire top players in leaderboard.php.

Admin can:

Add new player scores

Edit existing entries

Delete rows with confirmation

 Contact Form
Visitors can send messages using contact.php.

Submissions stored in DB and viewable on admin side.

Admin can delete messages.

 User Experience
All pages are fully responsive.

Includes Bootstrap components for styling.

Icons and emojis are used for visual clarity (🗑️ Delete, ✏️ Edit, ➕ Add).

 Technologies Used
 PHP (server-side)

 MySQL (database)

 Bootstrap 5 (UI framework)

 HTML/CSS

 JavaScript (for dynamic actions like delete confirmation)

 Author Notes
This project is built for learning and demonstration purposes, showcasing:

PHP-MySQL CRUD operations

File upload handling

Admin panel design

Bootstrap integration

Beginner-friendly UX

=======
# 🌐 Frontend Mini Projects Collection

Welcome to my collection of frontend projects! This repository includes mini projects built with HTML, CSS, and JavaScript, focusing on APIs, event handling, DOM manipulation, and responsive UI design. Perfect for learning and demonstrating core frontend skills.

---

## 🚀 Projects Included

### 1. 🌦️ Weather App

A real-time weather forecast app using the **OpenWeatherMap API**. Based on the temperature, it shows a relevant background image.

**🔧 Features:**
- Get weather details by entering any city
- Custom backgrounds based on temperature ranges
- Friendly error handling for invalid cities

**📽️ Demo Video:**  
[Click here to watch](https://drive.google.com/file/d/1mr8JGn6F0g_5d-Gh2I6CGHzF1UVqXE3D/view?usp=drive_link)

---

### 2. ✊✋✌️ Rock Paper Scissors Game

A fun interactive Rock-Paper-Scissors game where you play against the computer!

**🔧 Features:**
- Click-based input
- Real-time result display
- Score tracking
- Random computer moves

- **📽️ Demo Video:**  
[Click here to watch](https://drive.google.com/file/d/12uYn-iHygigGA59GtQ08Su5nJTjCpuyU/view?usp=drive_link)

---

### 3. 🧮 Calculator

A basic arithmetic calculator that handles:
- Addition, subtraction, multiplication, division
- Clear (`AC`) and backspace (`Del`)
- Handles invalid expressions gracefully

- **📽️ Demo Video:**  
[Click here to watch](https://drive.google.com/file/d/1QAByrXpDFssyhiHAZ1YFFUPm2DCgQbX8/view?usp=drive_link)

---

### 4. 💱 Currency Converter

Converts one currency to another using **ExchangeRate-API**.

**🔧 Features:**
- Select "from" and "to" currencies
- Fetch real-time exchange rate
- Show respective country flags
- Calculate result based on input amount

**📽️ Demo Video:**  
[Click here to watch](https://drive.google.com/file/d/1firX9LJrGWAX4CU1aVQHsINLmN-qCopV/view?usp=drive_link)
---

### 5. 🧠 Quiz App
A simple multiple-choice quiz built with React.js using functional components and hooks.

**🔧 Features:**

-Displays 10 multiple-choice questions
-User can navigate through questions using Next and Prev buttons
-Radio buttons to select one answer per question
-Tracks selected answers in real-time
-Calculates and displays final score upon submission
-Disables Submit button until the last question
-Prevents duplicate score counting when navigating back and forth

### 6. 📝 Student Registration & Display System
A dynamic web app to register students with details and display them in a structured table using PHP + MySQL.

**🔧 Features:**

-User-friendly registration form using Bootstrap
-Supports:
-Text inputs (name, roll number, phone, etc.)
-Radio buttons (batch, gender)
-Dropdown (department)
-File upload (profile image)
-Image uploads to a server folder (Dummy/)
-Validates input before storing
-Stores all data in MySQL database (task02)
-Displays all registered students in a styled HTML table
-Shows uploaded profile images in the list

🗄️ Tech Stack:

HTML + CSS + Bootstrap

PHP for backend logic & file handling

MySQL database

No JavaScript required (fully server-side driven)

🧮 Database Table Structure (MySQL):

CREATE DATABASE task02;
USE task02;

CREATE TABLE STUDENT(
    std_ID INT PRIMARY KEY AUTO_INCREMENT,
    std_Name VARCHAR(50),
    rollNo INT,
    dept VARCHAR(30),
    batch INT,
    phone VARCHAR(11),
    gender ENUM('Male', 'Female', 'Other'),
    imgPath VARCHAR(100)
);
📁 Folder Structure:

lua
Copy
Edit
📁 project/
│
├── registration.php
├── registrationCSS.css
├── display.php
├── Dummy/               <-- Uploaded images stored here
└── task02 (MySQL DB)

📽️ Demo Video:
[Coming soon — upload your demo to Google Drive or YouTube and paste link here]



⚙️ Tech Stack:

React.js (useState for state management)

Pure JavaScript logic for scoring

No external libraries or APIs

📽️ Demo Video:
[Coming soon or upload your demo to Drive/YouTube and paste link here]

## 🛠️ Technologies Used

- HTML5
- CSS3
- JavaScript (ES6+)
- Public APIs (OpenWeatherMap, ExchangeRate API)
- DOM Manipulation
- Event Handling

---

## 📁 Folder Structure

```bash
project-root/
│
├── weather-app/
│   └── index.html, style.css, script.js
│
├── rock-paper-scissors/
│   └── index.html, style.css, script.js
│
├── calculator/
│   └── index.html, style.css, script.js
│
├── currency-converter/
│   └── index.html, style.css, script.js
│
└── README.md
>>>>>>> 74798e5a2c36242d248bb4468736477121b421ae
