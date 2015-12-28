# Bloggy - blog assignment

# Get it working (after cloning)
- composer install
- create database by your choice (don't forget to update the .env file DB parameters):
    DB_HOST=localhost
    DB_DATABASE=bloggy
    DB_USERNAME=root
    DB_PASSWORD=root
- php artisan migrate (to create the tables)
- php artisan db:seed (to insert dummy data in DB)
- cd public
- php -S localhost:3000
- hit the browser (localhost:3000)

# API
- The API can retrieve data in JSON and XML format if we include the Accept http-header that will look like:
  Accept: application/xml
- To retrieve collection of posts: localhost:3000/api/v1/posts
- To retrieve single post: localhost:3000/api/v1/posts/[postId]