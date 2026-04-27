[README.md](https://github.com/user-attachments/files/27134451/README.md)
# 📚 Library Management System (REST API)

A professional **RESTful API** built with **PHP** and **PostgreSQL**. This system manages a library database through relational mapping, supporting full CRUD operations and real-time data analytics.

---

## 🛠 Technologies Used
* **Backend:** PHP 8.x
* **Database:** PostgreSQL
* **Tools:** Postman, XAMPP/Apache
* **Editor:** Visual Studio Code

---

## 🏗 Database Architecture
The system utilizes **Foreign Key** constraints to maintain data integrity between authors, categories, and books.



### Tables & Schema
* **`authors`**: `id` (PK), `name`
* **`categories`**: `id` (PK), `name`
* **`books`**: `id` (PK), `title`, `author_id` (FK), `category_id` (FK)

---

## 🚀 API Endpoints

### 1. Create (POST)
**Endpoint:** `add_book.php`
| Key | Type | Description |
| :--- | :--- | :--- |
| `title` | String | Title of the book |
| `author_id` | Integer | Unique ID of the Author |
| `category_id` | Integer | Unique ID of the Category |

### 2. Read (GET)
* **All Books:** `get_all_books.php` (Returns raw IDs)
* **Detailed View:** `books_details.php` (Returns Joined names for Authors/Categories)

### 3. Analytics (GET)
**Endpoint:** `analytics.php`
| Param Key | Param Value | Description |
| :--- | :--- | :--- |
| `type` | `total_books` | Returns count of all books |
| `type` | `books_per_category` | Groups books by category name |
| `type` | `top_author` | Identifies author with most books |



### 4. Delete (GET/DELETE)
**Endpoint:** `delete_book.php`
* **Param:** `id` (The ID of the book to be removed)

---

## 👥 Project Team & Roles

| Member | Primary Responsibility |
| :--- | :--- |
| **LANZANAS, RON KARLO** | **Database Designer** - Schema & Relationship architecture |
| **ANORAS, JOHN KYLE** | **CRUD API Developer** - Create, Update, Delete logic |
| **DUMALAG, LOVELY** | **Relationship API Developer** - JOIN query implementation |
| **UMANDAP, TJ** | **Data Analytics** - Aggregation & Counting logic |
| **ESTABAYA, NATHANIEL** | **Model Developer** - Data structure and DB connection |
| **COMIA, MAUI** | **Documentation & Testing** - Postman verification |
| **PAR, CATRISSIA** | **Documentation & Testing** - Technical manual writing |

---

## 🔧 Installation
1. Clone this folder into your `xampp/htdocs/` directory.
2. Import the PostgreSQL schema into **pgAdmin**.
3. Update `db.php` with your local database credentials.
4. Test endpoints using the provided Postman collection.
