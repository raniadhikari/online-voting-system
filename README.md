# 🗳️ Online Voting System

An Online Voting System developed using PHP, MySQL, HTML, CSS and JavaScript.

## 📌 About the Project

This project provides a simple online voting platform where registered voters can log in and cast their vote. An administrator can manage candidates and view voting results through an admin dashboard.

## 🚀 Features

### Voter
- Voter login
- View available candidates
- Select a candidate
- Vote confirmation
- Prevents multiple voting
- Logout functionality

### Admin
- Admin login
- Admin dashboard
- Add candidates
- Delete candidates
- View voting results
- Vote count visualization using Chart.js

## 🛠️ Technologies Used

- HTML
- CSS
- JavaScript
- PHP
- MySQL
- Chart.js
- XAMPP
- phpMyAdmin

## 🗄️ Database

The project uses MySQL as the database.

The database SQL file is included in:

`online_voting.sql`

## 💻 How to Run the Project

1. Install XAMPP.
2. Start Apache and MySQL from XAMPP.
3. Copy the project folder into:

`C:\xampp\htdocs\`

4. Open phpMyAdmin.
5. Create a database named:

`online_voting`

6. Import `online_voting.sql` into the database.
7. Open the project in a browser:

`http://localhost/online_voting/index.php`

## 📊 Project Structure

- `index.php` – Homepage
- `voter_login.php` – Voter login page
- `login.php` – Voter authentication
- `vote.php` – Voting page
- `submit_vote.php` – Vote submission
- `admin_login.php` – Admin login
- `admin_dashboard.php` – Admin dashboard
- `add_candidate.php` – Add candidate
- `delete_candidate.php` – Delete candidate
- `results.php` – Voting results
- `logout.php` – Logout
- `db.php` – Database connection
- `online_voting.sql` – Database backup

## 🔐 Security Note

This project is created for academic and demonstration purposes. A production-level voting system would require additional security measures such as password hashing, HTTPS, stronger authentication, input validation and protection against SQL injection.

## 👩‍💻 Project

**Online Voting System**

Developed as an academic project using PHP and MySQL.