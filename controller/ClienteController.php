<?php

declare(strict_types=1);

require_once __DIR__ . '/../model/Cliente.php';
require_once __DIR__ . '/../dao/ClienteDAO.php';

class ClienteController
{
    private ClienteDAO $dao;
    public function __construct() { $this->dao = new ClienteDAO(); }

    private function preencher(?int $id = null): Cliente
    {
        return (new Cliente())
            ->setId($id)
            ->setNome((string)(filter_input(INPUT_POST, 'nome') ?? ''))
            ->setEmail((string)(filter_input(INPUT_POST, 'email') ?? ''))
            ->setTelefone((string)(filter_input(INPUT_POST, 'telefone') ?? ''));
    }

    public function salvar(): bool { return $this->dao->salvar($this->preencher()); }

    public function alterar(): bool
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        if (!$id) return false;
        return $this->dao->salvar($this->preencher($id));
    }

    public function listar(): array { return $this->dao->listar(); }
    public function buscarPorId(int $id): ?Cliente { return $this->dao->buscarPorId($id); }
    public function excluir(int $id): bool { return $this->dao->excluir($id); }
}
