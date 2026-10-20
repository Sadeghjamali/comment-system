# Article Comment System

A Laravel and Livewire practice project focused on an article page and its comment functionality.

## Tech Stack

- PHP 8.2+
- Laravel 10
- Livewire 3
- Livewire Volt
- Laravel Breeze
- MySQL or another supported Laravel database

## Application Structure

- Article pages are resolved by article slug.
- The article page is implemented with a Livewire component.
- Access to the article route requires authentication and email verification.

## Requirements

- PHP 8.2 or later
- Composer
- Node.js and npm
- A supported database

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/Sadeghjamali/comment-system.git
   cd comment-system
   ```

2. Install dependencies:

   ```bash
   composer install
   npm install
   ```

3. Create the environment file and generate an application key:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure your database in `.env`.

5. Run migrations:

   ```bash
   php artisan migrate
   ```

6. Build the frontend assets:

   ```bash
   npm run build
   ```

7. Start the development server:

   ```bash
   php artisan serve
   ```

8. Register or sign in, then open an article route using its slug.

## Development Notes

Review the current implementation to document the exact comment operations supported, such as creating, editing, deleting, or replying to comments. Only list operations that are implemented in the code.

## Repository

https://github.com/Sadeghjamali/comment-system
