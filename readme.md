# Project Setup

## Prerequisites
Ensure you have the following installed on your system:
- Docker & Docker Compose

## Getting Started

### 1. Clone the Repository
```sh
git clone <repository-url>
cd <project-directory>
```

### 2. Build and Start the Containers
```sh
docker compose build
```
```sh
docker compose up
```
This will start all the necessary services, including Laravel API, MongoDB, and Vue.js frontend.

### 3. Access the Application
- Frontend: [http://localhost:5173/](http://localhost:5173/)
- API: [http://localhost:8000/api](http://localhost:8000/api)

## Features
- **Backend**: Laravel 10+ REST API with CRUD operations for tickets stored in MongoDB.
- **Frontend**: Vue.js (Vue 3) with TailwindCSS for UI.
- **Database**: MongoDB integrated with Laravel using Eloquent-like queries.
- **Deployment**: Docker Compose setup to run all services seamlessly.

## API Endpoints
| Method | Endpoint          | Description                |
|--------|------------------|----------------------------|
| GET    | /api/tickets     | Get all tickets           |
| POST   | /api/tickets     | Create a new ticket       |
| GET    | /api/tickets/{id} | Get ticket details        |
| PUT    | /api/tickets/{id} | Update a ticket          |
| DELETE | /api/tickets/{id} | Delete a ticket          |

## Environment Variables
Ensure you configure the `.env` file in the Laravel backend with the necessary MongoDB connection settings:
```env
DB_CONNECTION=mongodb
DB_HOST=mongo
DB_PORT=27017
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## Stopping the Application
To stop the running containers, use:
```sh
docker compose down
```

## Troubleshooting
- If you encounter permission issues, try running Docker with `sudo`.
- Ensure port 5173 (Vue.js) and 8000 (Laravel) are available and not blocked.
- If something blocked, you have to stop apache or mongodb or related services from local.

## License
This project is licensed under the MIT License.

---
Feel free to update this README based on project-specific details.

