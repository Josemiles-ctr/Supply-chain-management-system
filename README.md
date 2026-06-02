# Supply Chain Management System

This project is a multi-role supply chain platform for managing product flow from raw materials to customer orders, with analytics dashboards for operational and sales insights.

## Solution Overview

The system organizes workflows across key business roles:

- **Admin**: monitors platform activity, sales trends, stock levels, and user/product insights.
- **Manufacturer**: manages raw materials, production orders, manufacturing stages (printing, packaging, delivery), and vendor-related orders.
- **Vendor**: manages product listings, order handling, and analytics.
- **Customer**: places orders, tracks purchases, manages wishlist, and accesses chat/order pages.

The application also includes analytics-focused pages such as demand and segmentation insights, plus chart export support for reporting.

## Tech Stack

### Backend
- **PHP 8.2+**
- **Laravel 12**
- **Filament 3.3** (admin/panel UI framework)
- **Livewire / Volt / Flux** (interactive server-driven UI features)
- **MySQL** (default database in `.env.example`)
- **Laravel Reverb** (real-time features)

### Frontend
- **Vite 6** (build tool)
- **Tailwind CSS** (styling)
- **Chart.js** + chart plugins (data visualizations)
- **Axios** (HTTP client)
- **SweetAlert2** (UI alerts/modals)

### Development & Testing
- **Composer** for PHP dependencies
- **npm** for frontend dependencies
- **Pest / PHPUnit** for testing
- **Laravel Pint** for code style (available in dev dependencies)

## Getting Started

1. Install dependencies:
   - `composer install`
   - `npm install`
2. Configure environment:
   - `cp .env.example .env`
   - Set database credentials in `.env`
3. Prepare application:
   - `php artisan key:generate`
   - `php artisan migrate`
4. Run locally:
   - Backend + queue + vite: `composer dev`
   - Or frontend only: `npm run dev`

## Available Scripts

- `composer dev` – run local Laravel server, queue worker, and Vite concurrently.
- `composer test` – clear config and run test suite.
- `npm run dev` – run Vite dev server.
- `npm run build` – build frontend assets for production.
