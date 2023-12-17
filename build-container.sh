docker build -t geo-php .
docker run -d -p 8080:80 -name=php-test-1 geo-php
