Ecommerce Web Store

A full-stack PHP-based Ecommerce Web Application implementing core online store functionality including product browsing, shopping cart, authentication, checkout, and payment flow. The system follows a modular structure with database-backed persistence and session-based state management.

Overview

Ecommerce Web Store is a web-based ecommerce platform designed to simulate a real-world online shopping system. It provides full user interaction from browsing products to completing payments, while maintaining persistent order and account data through a relational database.

The project demonstrates:

Dynamic PHP web development

Session-based cart architecture

Database-driven ecommerce logic

Authentication & user management

End-to-end checkout workflow

Structured relational schema

Technology Stack

Backend

PHP (Core PHP)

MySQL (Relational Database)

Frontend

HTML5

CSS3

JavaScript

Architecture Style

Monolithic PHP Web App

Session-based state

Relational persistence model

Core Features
User System

User registration

Login authentication

Account dashboard

Session management

Product System

Product catalog

Product detail page

Dynamic product loading from database

Shopping Cart

Add to cart

Remove/update cart items

Session-based cart persistence

Checkout System

Order creation

Checkout processing

Payment simulation

Order storage in database

Additional Pages

Blog page

Contact page

Account management

Project Structure
Ecommerce-Web-Store/
│
├── assets/                # CSS, JS, images, frontend assets
├── server/                # Backend logic, DB connection, helpers
│
├── index.php              # Homepage
├── shop.php               # Product catalog
├── single_product.php     # Product details
├── cart.php               # Shopping cart
├── chekout.php            # Checkout flow
├── payment.php            # Payment processing
├── login.php              # Login system
├── register.php           # User registration
├── account.php            # User dashboard
│
├── blog.html              # Static blog page
├── contact.html           # Contact page
│
├── php_project.sql        # Database schema

Database Design

The application uses a relational database defined in php_project.sql.

Typical schema components:

users – authentication & account data

products – product catalog

cart / order_items – cart and order mapping

orders – checkout transactions

payments – payment records

Relationships

One-to-Many → User → Orders

One-to-Many → Order → Order Items

Many-to-One → Order Item → Product

Installation & Setup
Requirements

PHP 8+

MySQL / MariaDB

Apache / Nginx (or XAMPP / Laragon)

1. Clone Repository
git clone https://github.com/Thurnos/Ecommerce-Web-Store.git
cd Ecommerce-Web-Store

2. Setup Database

Create database:

CREATE DATABASE ecommerce_store;


Import schema:

mysql -u root -p ecommerce_store < php_project.sql

3. Configure Database Connection

Edit database config inside:

/server/


Set:

DB_HOST=localhost
DB_USER=root
DB_PASS=your_password
DB_NAME=ecommerce_store

4. Run Application

Place project inside:

htdocs/ (XAMPP)
or
www/ (Laragon)


Then open:

http://localhost/Ecommerce-Web-Store

Application Flow

User registers / logs in

Browses product catalog

Adds products to cart (session storage)

Proceeds to checkout

Order stored in database

Payment simulated and recorded

Security Considerations

Session-based authentication

Input validation required (can be extended)

Password hashing recommended (bcrypt)

CSRF protection can be added

Prepared statements recommended for SQL queries

Extensibility

This project can be upgraded into a production-grade ecommerce platform by adding:

MVC framework (Laravel / Symfony)

Payment gateway (Stripe / PayPal)

Admin dashboard

Product categories & filters

Inventory system

JWT authentication

REST API layer

Docker deployment

Cloud hosting

Order tracking

Email notifications

Search & pagination

Build / Deployment

Deploy on:

Apache / Nginx

Shared hosting

VPS

Docker container

LAMP / LEMP stack

Development Practices

Modular PHP structure

Separation of logic & UI

Database normalization

Session state handling

Relational modeling

Contributing

Fork repository

Create feature branch

Commit changes

Push branch

Open Pull Request

License

Open-source project. Add MIT License if distribution is intended.

Author

Developed as a complete PHP-based ecommerce system demonstrating full-stack web development, database architecture, and transactional workflow implementation.
