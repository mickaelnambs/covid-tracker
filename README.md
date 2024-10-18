# COVID Tracker

COVID Tracker is a Laravel web application that provides real-time statistics on the COVID-19 pandemic worldwide. It uses data from reliable APIs to offer an overview and country-specific details on cases, deaths, recoveries, and other important metrics.

## Features

- Global dashboard with COVID-19 statistics for all countries
- Country detail pages with in-depth statistics
- Automatic data updates via an external API
- Responsive user interface using Bootstrap
- Pagination for easy navigation through data
- Visual representation of data on an interactive world map using MapLibre GL
- Data graph visualization with Sigma.js

## Prerequisites

- PHP >= 8.2
- Composer
- MySQL or any other database management system supported by Laravel
- Node.js and npm

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/mickaelnambs/covid-tracker.git
   ```

2. Navigate to the project directory:
   ```
   cd covid-tracker
   ```

3. Install PHP dependencies:
   ```
   composer install
   ```

4. Install JavaScript dependencies:
   ```
   npm install
   ```

5. Copy the environment file and configure it:
   ```
   cp .env.example .env
   ```
   Edit the `.env` file with your database configurations and other necessary parameters.

6. Generate the application key:
   ```
   php artisan key:generate
   ```

7. Run the migrations:
   ```
   php artisan migrate
   ```

## Usage

1. Start the development server:
   ```
   php artisan serve
   ```

2. Compile assets and watch for changes:
   ```
   npm run dev --watch
   ```

3. Fetch initial COVID data:
   ```
   php artisan covid:fetch
   ```

4. Access the application in your browser at `http://localhost:8000`

To keep the data up to date, you can configure a cron job to run `php artisan covid:fetch` regularly.

## Data Visualizations

- The world map uses MapLibre GL to display COVID-19 data by country. You can interact with the map to see details for each country.
- Charts and data visualizations use Sigma.js to represent trends and comparisons between countries.

## Contribution

Contributions are welcome! To contribute:

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License. See the `LICENSE` file for more details.

## Credits

- COVID-19 data provided by [Disease.sh](https://disease.sh/)
- Built with [Laravel](https://laravel.com/)
- User interface powered by [Bootstrap](https://getbootstrap.com/)
- Interactive mapping with [MapLibre GL](https://maplibre.org/)
- Graph visualizations with [Sigma.js](http://sigmajs.org/)
