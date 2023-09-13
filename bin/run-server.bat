set APP_DIR=%cd%
php -d display_errors -d output_buffering=0 -d auto_prepend_file=%cd%\vendor\autoload.php -S localhost:8000 -t public/
