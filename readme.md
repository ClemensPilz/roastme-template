# AI RoastMe Application

Roastme is a barebones template for an AI Roast Master application. It uses the OpenAI API endpoint to generate roasts and employs Cloudflare Turnstile, as well as Laravel rate limiting to protect against abuse.

## Features

- **OpenAI API Integration**: Utilizes the OpenAI API to generate roasts.
- **Cloudflare Turnstile**: Protects the application from abuse and enforces rate limiting.
- **Development and Build Scripts**: 
    - `npm run dev`: Starts the development vite-server.
    - `npm run build`: Builds the application for production.
- **Code Formatting**: 
    - `npm run format`: Formats the files using Prettier and Pint.

## Getting Started

Before starting the development server, review the `.env.example` file and fill out the `custom-section` with the necessary values. 

To start the development servers:
1. Run the Vite development server:
    ```sh
    npm run dev
    ```
2. Start the Laravel server:
    ```sh
    php artisan serve
    ```

## License

This project is licensed under the MIT License.