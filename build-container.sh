docker build -t geo-php .
docker run -d -p 8080:80 --name=geo-test-1 geo-php
