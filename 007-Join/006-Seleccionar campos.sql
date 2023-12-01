SELECT 
    clientes.nombre,
    clientes.apellidos,
    pedidos.fecha
FROM pedidos
LEFT JOIN
clientes
ON pedidos.cliente_id = clientes.Identificador;