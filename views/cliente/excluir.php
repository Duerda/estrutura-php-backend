<?php
require_once __DIR__ . '/../../controller/ClienteController.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$ok = $id ? (new ClienteController())->excluir($id) : false;
echo '<div class="alert alert-' . ($ok ? 'success' : 'danger') . '">' . ($ok ? 'Cliente excluído com sucesso.' : 'Não foi possível excluir o cliente.') . '</div>';
?><meta http-equiv="refresh" content="1;URL=?p=clientes">
