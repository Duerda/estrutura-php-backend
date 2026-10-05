<?php
require_once __DIR__ . '/../../controller/ClienteController.php';
if (isset($_POST['btnsalvar'])) {
    $ok = (new ClienteController())->salvar();
    echo '<div class="alert alert-' . ($ok ? 'success' : 'danger') . '">' . ($ok ? 'Cliente cadastrado com sucesso!' : 'Erro ao cadastrar cliente.') . '</div>';
    if ($ok) echo '<meta http-equiv="refresh" content="1;URL=?p=clientes">';
}
?>
<div class="card"><div class="card-header">Novo Cliente</div><div class="card-body"><form method="post">
<div class="form-group"><label>Nome</label><input class="form-control" name="nome" required maxlength="150"></div>
<div class="form-group"><label>E-mail</label><input type="email" class="form-control" name="email" required maxlength="150"></div>
<div class="form-group"><label>Telefone</label><input class="form-control" name="telefone" required maxlength="30"></div>
<button class="btn btn-success" name="btnsalvar">Salvar</button> <a class="btn btn-secondary" href="?p=clientes">Cancelar</a>
</form></div></div>
