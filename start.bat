@echo off
echo Starting PicoRoute v3.0 "Hypernova" Development Server...
echo.
echo Visit http://localhost:8080 in your browser
echo.
echo Press Ctrl+C to stop the server
echo.
cd /d "%~dp0"
php\php.exe -S localhost:8080
pause
