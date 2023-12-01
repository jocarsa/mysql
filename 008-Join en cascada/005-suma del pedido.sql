SELECT 
SUM(productos.precio) 
FROM lineaspedido
LEFT JOIN pedidos
ON lineaspedido.pedido_id = pedidos.Identificador
LEFT JOIN clientes
ON pedidos.cliente_id = clientes.Identificador
LEFT JOIN productos
ON lineaspedido.producto_id = productos.Identificador