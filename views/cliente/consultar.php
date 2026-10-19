<?php
require_once __DIR__ . '/../../controller/ClienteController.php';

$busca = trim((string)(filter_input(INPUT_GET, 'busca') ?? ''));
$controller = new ClienteController();
$dados = $busca !== '' ? $controller->pesquisar($busca) : $controller->listar();
$e = static fn($v): string => htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
?>
<div class="card shadow mb-4"><div class="card-body">
    <h3>Clientes <a class="btn btn-success float-right" href="?p=add/cliente"><i class="bi bi-person-plus"></i> Novo</a></h3>

    <form method="get" class="form-inline bg-light border rounded p-3 mt-3 mb-3">
        <input type="hidden" name="p" value="clientes">
        <label class="mr-2 font-weight-bold" for="busca-cliente">Pesquisar cliente:</label>
        <input id="busca-cliente" class="form-control mr-2 flex-grow-1" type="search" name="busca"
               placeholder="Digite o nome do cliente" value="<?= $e($busca) ?>">
        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
        <?php if ($busca !== ''): ?><a class="btn btn-outline-secondary ml-2" href="?p=clientes">Limpar</a><?php endif; ?>
    </form>

    <?php if ($busca !== ''): ?>
        <p class="text-muted">Resultado da pesquisa por <strong><?= $e($busca) ?></strong>: <?= count($dados) ?> registro(s).</p>
    <?php endif; ?>
    <div class="table-responsive"><table class="table table-striped table-sm mt-3"><thead><tr><th>ID</th><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Ações</th></tr></thead><tbody>
    <?php foreach ($dados as $item): ?><tr><td><?= $e($item['id']) ?></td><td><?= $e($item['nome']) ?></td><td><?= $e($item['email']) ?></td><td><?= $e($item['telefone']) ?></td><td>
    <a class="btn btn-warning btn-sm" href="?p=editar/cliente&id=<?= $e($item['id']) ?>" title="Editar"><i class="bi bi-pencil-square"></i></a>
    <a class="btn btn-danger btn-sm" href="?p=excluir/cliente&id=<?= $e($item['id']) ?>" onclick="return confirm('Tem certeza que deseja excluir?')" title="Excluir"><i class="bi bi-trash"></i></a>
    </td></tr><?php endforeach; ?>
    <?php if (!$dados): ?><tr><td colspan="5" class="text-center">Nenhum cliente encontrado.</td></tr><?php endif; ?>
    </tbody></table></div>
</div></div>
