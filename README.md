# 📝 AI-Powered Blog Generator

### 🌐 Description
The AI-Powered Blog Generator is a PHP-based web application that lets users generate SEO-friendly blog posts using OpenAI's GPT-3.5. It takes a blog topic as input and outputs a complete blog post (intro, body, conclusion), which is also stored in a MySQL database.

## 🚀 Features
- Generate SEO-optimized blog posts using GPT-3.5
- Bootstrap interface
- MySQL database integration
- Recent blogs listing

## 🛠️ Setup

### 1. Database Setup
```sql
CREATE DATABASE ai_blog_generator;
USE ai_blog_generator;
CREATE TABLE blogs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  topic VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

### 2. Configure
Update `config.php` with your MySQL and OpenAI API credentials.

### 3. Run
Deploy on XAMPP or any local PHP server and open `index.php`.

## 📂 Files
- index.php: Frontend UI and blog list
- config.php: DB and API config
- generate.php: Handles AI blog generation
- README.md: Instructions
