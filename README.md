# ChefCall

ChefCall is a web-based food delivery platform that connects customers to a wide variety of dishes and flavors, directly at their doorstep. The project was developed with a focus on offering an intuitive, fast and reliable experience for both end users and system administrators.

## Main Features:

### Front-End:

- Easy navigation with well-organized food categories.
- Advanced search and filter system.
- Dynamic shopping cart and simplified checkout process.
- Real-time order status page.

### Administrative Panel:

- Complete management of orders, menu and customers.
- Configuration of promotions and discount coupons.
- Financial reports and sales analysis.

## Technologies Used:

### Back-End:

- PHP ​​8 with MVC architecture.
- Relational database with Doctrine ORM for efficient data management.
- Slim Framework for routes and middleware.

### Front-End:

- HTML5, CSS3 and JavaScript.
- Integration with Alpine.js for interactivity.
- Webpack for asset management.

## How to Set Up the Project:

1. Clone o repositório:

```bash
git clone https://github.com/adrjmiranda/chef-call.git
```

2. Instale as dependências com o Composer:

```bash
composer install
```

3. Configure as variáveis de ambiente no arquivo .env.

4. Execute as migrações para criar o banco de dados:

```bash
php vendor/bin/doctrine-migrations migrate
```

5. Inicie o servidor local:

```bash
php -S localhost:8000 -t public
```

## Contributions:

Contributions are welcome! Feel free to open issues or submit pull requests to improve ChefCall.
