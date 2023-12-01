SELECT 
    clientes.nombre,
    clientes.apellidos,
    pedido.fecha
FROM pedidos
LEFT JOIN
clientes
ON pedidos.cliente_id = clientes.Identificador;