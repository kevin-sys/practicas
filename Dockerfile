# Construir la imagen Docker
docker build -t mi_app_php .

# Ejecutar el contenedor
docker run -p 8084:8084 --name mi_contenedor_php mi_app_php
