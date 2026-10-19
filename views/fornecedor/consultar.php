<?php
require_once __DIR__ . '/../../controller/FornecedorController.php';
$dados = (new FornecedorController())->listar();
$e = static fn($v): string => htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
?>
<div class="card shadow mb-4"><div class="card-body">
<h3>Fornecedores <a class="btn btn-success float-right" href="?p=add/fornecedor"><i class="bi bi-building-add"></i> Novo</a></h3>
<div class="table-responsive"><table class="table table-striped table-sm mt-3"><thead><tr><th>ID</th><th>Razão social</th><th>E-mail</th><th>Telefone</th><th>Ações</th></tr></thead><tbody>
<?php foreach ($dados as $item): ?><tr><td><?= $e($item['id']) ?></td><td><?= $e($item['razao_social']) ?></td><td><?= $e($item['email']) ?></td><td><?= $e($item['telefone']) ?></td><td>
<a class="btn btn-warning btn-sm" href="?p=editar/fornecedor&id=<?= $e($item['id']) ?>" title="Editar"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger btn-sm" href="?p=excluir/fornecedor&id=<?= $e($item['id']) ?>" onclick="return confirm('Tem certeza que deseja excluir?')" title="Excluir"><i class="bi bi-trash"></i></a>
</td></tr><?php endforeach; ?>
<?php if (!$dados): ?><tr><td colspan="5" class="text-center">Nenhum fornecedor cadastrado.</td></tr><?php endif; ?>
</tbody></table></div></div></div>
