<?php
require_once __DIR__ . '/../../controller/FornecedorController.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$ok = $id ? (new FornecedorController())->excluir($id) : false;
echo '<div class="alert alert-' . ($ok ? 'success' : 'danger') . '">' . ($ok ? 'Fornecedor excluído com sucesso.' : 'Não foi possível excluir o fornecedor.') . '</div>';
?><meta http-equiv="refresh" content="1;URL=?p=fornecedores">
