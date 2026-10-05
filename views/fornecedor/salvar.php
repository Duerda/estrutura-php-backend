<?php
require_once __DIR__ . '/../../controller/FornecedorController.php';
if (isset($_POST['btnsalvar'])) {
    $ok = (new FornecedorController())->salvar();
    echo '<div class="alert alert-' . ($ok ? 'success' : 'danger') . '">' . ($ok ? 'Fornecedor cadastrado com sucesso!' : 'Erro ao cadastrar fornecedor.') . '</div>';
    if ($ok) echo '<meta http-equiv="refresh" content="1;URL=?p=fornecedores">';
}
?>
<div class="card"><div class="card-header">Novo Fornecedor</div><div class="card-body"><form method="post">
<div class="form-group"><label>Razão social</label><input class="form-control" name="razao_social" required maxlength="180"></div>
<div class="form-group"><label>E-mail</label><input type="email" class="form-control" name="email" required maxlength="150"></div>
<div class="form-group"><label>Telefone</label><input class="form-control" name="telefone" required maxlength="30"></div>
<button class="btn btn-success" name="btnsalvar">Salvar</button> <a class="btn btn-secondary" href="?p=fornecedores">Cancelar</a>
</form></div></div>
