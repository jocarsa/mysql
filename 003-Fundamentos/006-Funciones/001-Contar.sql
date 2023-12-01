SELECT 
categoria AS "Nombre de la categoría del producto",
COUNT(categoria) AS "Número de productos en esa catogoría"
FROM productos
GROUP BY
categoria;