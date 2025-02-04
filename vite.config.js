export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/script.js'
            ],
            refresh: true,
        }),
    ],
    // Ensure proper server configuration
    server: {
        https: true,
        host: 'gabsab.local.stay'
    }
});
