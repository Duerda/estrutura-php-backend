<?php

declare(strict_types=1);

require_once __DIR__ . '/../model/Conn.php';
require_once __DIR__ . '/../model/Cliente.php';

class ClienteDAO
{
    private PDO $conn;

    public function __construct() { $this->conn = new Conn(); }
    private function texto(string $texto): string { return trim($texto); }

    public function salvar(Cliente $cliente): bool
    {
        if ($cliente->getId() === null) {
            $stmt = $this->conn->prepare('INSERT INTO cliente (nome, email, telefone) VALUES (?, ?, ?)');
            $stmt->bindValue(1, $this->texto($cliente->getNome()));
            $stmt->bindValue(2, $this->texto($cliente->getEmail()));
            $stmt->bindValue(3, $this->texto($cliente->getTelefone()));
        } else {
            $stmt = $this->conn->prepare('UPDATE cliente SET nome = ?, email = ?, telefone = ? WHERE id = ?');
            $stmt->bindValue(1, $this->texto($cliente->getNome()));
            $stmt->bindValue(2, $this->texto($cliente->getEmail()));
            $stmt->bindValue(3, $this->texto($cliente->getTelefone()));
            $stmt->bindValue(4, $cliente->getId(), PDO::PARAM_INT);
        }
        return $stmt->execute();
    }

    public function listar(): array
    {
        return $this->conn->query('SELECT * FROM cliente ORDER BY nome')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId(int $id): ?Cliente
    {
        $stmt = $this->conn->prepare('SELECT * FROM cliente WHERE id = ?');
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$dados) return null;
        return (new Cliente())->setId((int)$dados['id'])->setNome($dados['nome'])->setEmail($dados['email'])->setTelefone($dados['telefone']);
    }

    public function excluir(int $id): bool
    {
        $stmt = $this->conn->prepare('DELETE FROM cliente WHERE id = ?');
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
