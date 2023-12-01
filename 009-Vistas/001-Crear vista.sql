CREATE VIEW lista_pedidos
AS 
SELECT 
clientes.nombre,
clientes.apellidos,
pedidos.fecha,
SUM(productos.precio) AS 'Base imponible',
SUM(productos.precio)*0.21 AS 'IVA',
SUM(productos.precio)+SUM(productos.precio)*0.21 AS 'Total'
FROM lineaspedido
LEFT JOIN pedidos
ON lineaspedido.pedido_id = pedidos.Identificador
LEFT JOIN clientes
ON pedidos.cliente_id = clientes.Identificador
LEFT JOIN productos
ON lineaspedido.producto_id = productos.Identificador