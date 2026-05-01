# Rapa Cast Stone — Product Catalog v2

A modern, full-featured product catalog and company website for **Rapa Cast Stone**, built with Laravel 12, Livewire 3, and Tailwind CSS 4.

---

## ✨ Features

- **Product Catalog** — Browse cast stone products organized by categories, with support for multiple product images.
- **Articles / Blog** — Company news and articles with topic tagging and publish/draft status.
- **Contact System** — Visitor contact form with admin reply management via email.
- **Admin Panel** — Full CRUD management for products, categories, articles, topics, and contacts, all powered by Livewire reactive components.
- **Authentication** — Secure admin login with Laravel's built-in auth scaffolding.
- **Image Processing** — Product image uploads handled by Intervention Image.
- **Rich Text Editor** — TinyMCE integration for article content editing.

---

## 🛠 Tech Stack

| Layer        | Technology                          |
|--------------|-------------------------------------|
| Backend      | PHP 8.4, Laravel 12                 |
| Frontend     | Livewire 3, Alpine.js, Tailwind CSS 4 |
| Bundler      | Vite                                |
| Database     | SQLite (dev) / MySQL (prod)         |
| Image        | Intervention Image 3                |
| Icons        | Font Awesome 7                      |
| Rich Text    | TinyMCE 7                           |

---

## 📁 Project Structure

```
app/
├── Livewire/          # Reactive admin components (Catalogues, Articles, Contacts, etc.)
├── Models/            # Eloquent models (Product, Category, Article, Contact, ...)
├── Mail/              # Mailable classes for contact replies
resources/
├── views/
│   ├── front/         # Public-facing pages
│   ├── admin/         # Admin panel views
│   └── livewire/      # Livewire component views
database/
├── migrations/        # All database migrations
├── factories/         # Model factories for testing
└── seeders/           # Database seeders
```

---

## 🚀 Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- Node.js & npm
- Laravel Herd (or another local server)

### Installation

```bash
# Clone the repository
git clone <repository-url> rapa-cast-stone-v2
cd rapa-cast-stone-v2

# Install dependencies & set up environment
composer run setup
```

The `setup` script will:
1. Install PHP dependencies via Composer
2. Copy `.env.example` to `.env` and generate an app key
3. Run all database migrations
4. Install Node dependencies and build frontend assets

### Development Server

```bash
composer run dev
```

This starts the Laravel dev server, queue worker, log watcher (Pail), and Vite — all in one command.

---

## 🧪 Testing

```bash
# Run the full test suite
composer run test

# Or via Artisan directly
php artisan test
```

---

## 🔑 Environment Variables

Key variables to configure in your `.env` file:

| Variable         | Description                        |
|------------------|------------------------------------|
| `APP_URL`        | Application base URL               |
| `DB_CONNECTION`  | Database driver (`sqlite` / `mysql`) |
| `MAIL_*`         | Mail driver settings for contact replies |

---

## 📄 License

This project is proprietary software. All rights reserved by Rapa Cast Stone.
