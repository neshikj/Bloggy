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
- The API attempts to return appropriate HTTP status codes for some requests
    - 404 (Not found): The requested URI is invalid or the resource requested such as a post id does not exist
    - 403 (Forbidden): The request is understood but it has been refused. This code is used when we want to get more than 15 posts per page.