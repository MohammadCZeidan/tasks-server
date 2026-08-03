<img src="./readme/card-titles/title1.svg"/>
<br>

## License

This project uses the MIT license inherited from the Laravel application setup.

<br><br>
<!-- project overview -->
<img src="./readme/card-titles/title2.svg"/>

> Tasks Server is a Laravel API backend for user authentication and task management.<br>
> It provides JWT-based login/register flows, protected task endpoints, middleware-gated access, and a simple task model with name, color, and description fields.

<br>
<!-- System Design -->
<img src="./readme/card-titles/title3.svg"/>

### Application Architecture

| Layer | Purpose |
|------|---------|
| **Laravel 12 App** | Backend framework, routing, controllers, migrations, and testing foundation |
| **JWT Auth** | Login/register token flow through `php-open-source-saver/jwt-auth` |
| **Task API** | User-facing task list, detail, add, and update endpoints |
| **Middleware** | Auth guard plus payment/test middleware hooks |
| **Database Layer** | Laravel migrations and Eloquent models for users and tasks |
| **Vite/Tailwind Tooling** | Frontend asset pipeline included with the Laravel setup |

<br>

### Repository Map

| Path | Description |
|------|-------------|
| `routes/api.php` | API route definitions for auth, user tasks, and admin task routes |
| `app/Http/Controllers/AuthController.php` | Register, login, logout, refresh, and unauthorized response handling |
| `app/Http/Controllers/User/TaskController.php` | User task listing, detail, add, and update logic |
| `app/Http/Controllers/Admin/TaskController.php` | Admin task controller placeholder |
| `app/Http/Middleware/PaymentMiddleware.php` | Payment-gated route middleware |
| `app/Models/Task.php` | Task Eloquent model |
| `app/Models/User.php` | User Eloquent model |
| `database/migrations/` | Users and tasks schema migrations |
| `composer.json` | PHP dependencies and Laravel scripts |
| `package.json` | Vite/Tailwind asset commands |

<br><br>
<!-- Project Highlights -->
<img src="./readme/card-titles/title4.svg"/>

### Core Features

- **User registration**: Creates users with hashed passwords and returns a JWT token.<br>
- **User login**: Validates credentials and returns the authenticated user with token.<br>
- **Protected task routes**: Task endpoints are grouped under `auth:api` middleware.<br>
- **Payment-gated access**: User task routes also pass through `auth.payment` middleware.<br>
- **Task listing/detail**: Fetch all tasks or a specific task by ID.<br>
- **Task add/update**: Create a task or update an existing one by ID.<br>
- **Laravel foundation**: Includes migrations, factories/seeders structure, tests, Pint/Pail/Sail support, and Vite tooling.<br>

<br>

### Task Model

| Field | Type | Notes |
|------|------|-------|
| `id` | Integer | Auto-increment primary key |
| `name` | String | Task name |
| `color` | String | Task color label/value |
| `description` | Text | Task details |
| `created_at` | Timestamp | Laravel-managed timestamp |
| `updated_at` | Timestamp | Laravel-managed timestamp |

<br>
<!-- Demo -->
<img src="./readme/card-titles/title5.svg"/>

### Quick Start

Install PHP dependencies:

```bash
composer install
```

Create the environment file:

```bash
cp .env.example .env
```

Generate the app key:

```bash
php artisan key:generate
```

Run migrations:

```bash
php artisan migrate
```

Start the API server:

```bash
php artisan serve
```

Run the Vite frontend asset server when needed:

```bash
npm install
npm run dev
```

<br>

### API Routes

| Method | Endpoint | Purpose | Auth |
|--------|----------|---------|------|
| `POST` | `/api/register` | Create a user and return JWT | Public |
| `POST` | `/api/login` | Authenticate user and return JWT | Public |
| `GET` | `/api/error` | Unauthorized fallback route | Public |
| `GET` | `/api/v0.1/user/tasks/{id?}` | List tasks or fetch one task | JWT + payment middleware |
| `POST` | `/api/v0.1/user/add_update_task/{id?}` | Add or update task | JWT + payment middleware |
| `POST` | `/api/v0.1/admin/delete_tasks` | Intended admin task deletion route | JWT |

Note: `routes/api.php` references an admin `deleteAllTasks` action, while the current admin controller contains a placeholder method. Implement that method before relying on the admin delete route.

<br>

### Example Request

```bash
curl -X POST http://localhost:8000/api/register \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Demo User",
    "email": "demo@example.com",
    "password": "secret123"
  }'
```

Create a task with a bearer token:

```bash
curl -X POST http://localhost:8000/api/v0.1/user/add_update_task/add \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Plan sprint",
    "color": "blue",
    "description": "Prepare task list and priorities"
  }'
```

<br><br>
<!-- Development & Testing -->
<img src="./readme/card-titles/title6.svg"/>

### Development Commands

| Command | Purpose |
|---------|---------|
| `composer install` | Install PHP dependencies |
| `php artisan serve` | Run the Laravel development server |
| `php artisan migrate` | Apply database migrations |
| `php artisan test` | Run Laravel tests |
| `composer test` | Clear config and run tests via Composer script |
| `composer dev` | Run server, queue listener, logs, and Vite concurrently |
| `npm run dev` | Run Vite dev server |
| `npm run build` | Build frontend assets |

<br>

### Tech Stack

| Tool | Purpose |
|------|---------|
| **Laravel 12** | PHP backend framework |
| **PHP 8.2+** | Backend runtime |
| **jwt-auth** | JWT authentication |
| **Laravel Sanctum** | Included auth/API package |
| **Eloquent** | ORM and model layer |
| **Laravel Migrations** | Database schema management |
| **Vite** | Frontend asset bundling |
| **Tailwind CSS** | Styling toolkit |
| **PHPUnit** | Test runner |
| **Laravel Pint** | Code style formatting |

<br><br>
<!-- Extras -->
<img src="./readme/card-titles/title7.svg"/>

### Implementation Notes

| Item | Status |
|------|--------|
| Routing | Implemented in `routes/api.php` |
| Migrations | Users and tasks migrations present |
| Auth controller | Register/login/logout/refresh present |
| User task controller | List/add/update present |
| Services folder | Present for task service structure |
| Middleware | Payment and test middleware present |
| Admin delete route | Route declared, controller action still needs implementation |
| Tests | Laravel test structure present |

<br>

---

**Tasks Server** - Laravel JWT API for authenticated task management.

*Small backend, clear routes, ready for the next layer of task features.*
