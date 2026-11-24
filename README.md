# starter-kit

Laravel 12 + Livewire Starter Kit (Fortify, 2FA dentro de la cuenta).

- Contraseñas de 15 o más caracteres.
- Badge "Atendido por" con el hostname del servidor.
- Conexión extra `migraciones` (usuario DB_MIGRATE_*), solo para migrar desde page1.
- trustProxies para el balanceador 10.120.0.3.
- `public/build` ya compilado (los servidores no tienen Node).

Despliegue (en cada web, como el usuario dueño de la app):

    cp .env.example .env && nano .env
    composer install --no-dev --optimize-autoloader
    php artisan key:generate            # solo en page1; page2 copia el mismo .env
    php artisan migrate --database=migraciones --force   # solo en page1
    php artisan optimize
