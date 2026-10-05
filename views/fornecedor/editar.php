<?php
require_once __DIR__ . '/../../controller/FornecedorController.php';
$controller = new FornecedorController();
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$fornecedor = $id ? $controller->buscarPorId($id) : null;
if (!$fornecedor) { echo '<div class="alert alert-danger">Fornecedor não encontrado.</div>'; return; }
if (isset($_POST['btnalterar'])) {
    if ($controller->alterar()) echo '<div class="alert alert-success">Fornecedor alterado com sucesso!</div><meta http-equiv="refresh" content="1;URL=?p=fornecedores">';
    else echo '<div class="alert alert-danger">Erro ao alterar fornecedor.</div>';
}
$e = static fn($v): string => htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
?>
<div class="card"><div class="card-header">Editar Fornecedor</div><div class="card-body"><form method="post">
<input type="hidden" name="id" value="<?= $e($fornecedor->getId()) ?>">
<div class="form-group"><label>Razão social</label><input class="form-control" name="razao_social" value="<?= $e($fornecedor->getRazaoSocial()) ?>" required maxlength="180"></div>
<div class="form-group"><label>E-mail</label><input type="email" class="form-control" name="email" value="<?= $e($fornecedor->getEmail()) ?>" required maxlength="150"></div>
<div class="form-group"><label>Telefone</label><input class="form-control" name="telefone" value="<?= $e($fornecedor->getTelefone()) ?>" required maxlength="30"></div>
<button class="btn btn-primary" name="btnalterar">Atualizar</button> <a class="btn btn-secondary" href="?p=fornecedores">Cancelar</a>
</form></div></div>
