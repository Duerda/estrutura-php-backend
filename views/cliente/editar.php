<?php
require_once __DIR__ . '/../../controller/ClienteController.php';
$controller = new ClienteController();
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$cliente = $id ? $controller->buscarPorId($id) : null;
$mensagem = '';
if (!$cliente) { echo '<div class="alert alert-danger">Cliente não encontrado.</div>'; return; }
if (isset($_POST['btnalterar'])) {
    if ($controller->alterar()) { echo '<div class="alert alert-success">Cliente alterado com sucesso!</div><meta http-equiv="refresh" content="1;URL=?p=clientes">'; }
    else echo '<div class="alert alert-danger">Erro ao alterar cliente.</div>';
}
$e = static fn($v): string => htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
?>
<div class="card"><div class="card-header">Editar Cliente</div><div class="card-body"><form method="post">
<input type="hidden" name="id" value="<?= $e($cliente->getId()) ?>">
<div class="form-group"><label>Nome</label><input class="form-control" name="nome" value="<?= $e($cliente->getNome()) ?>" required maxlength="150"></div>
<div class="form-group"><label>E-mail</label><input type="email" class="form-control" name="email" value="<?= $e($cliente->getEmail()) ?>" required maxlength="150"></div>
<div class="form-group"><label>Telefone</label><input class="form-control" name="telefone" value="<?= $e($cliente->getTelefone()) ?>" required maxlength="30"></div>
<button class="btn btn-primary" name="btnalterar">Atualizar</button> <a class="btn btn-secondary" href="?p=clientes">Cancelar</a>
</form></div></div>
