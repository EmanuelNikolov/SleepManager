<?php

namespace Adapter;


class PDODatabaseStatement implements DatabaseStatementInterface
{

    /**
     * @var \PDOStatement
     */
    private $statement;

    public function __construct(\PDOStatement $statement)
    {
        $this->statement = $statement;
    }

    public function execute(array $params = []): bool
    {
        return $this->statement->execute($params);
    }

    public function fetch()
    {
        return $this->statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function fetchColumn(int $columnNum = null)
    {
        return $this->statement->fetchColumn($columnNum);
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function fetchObject($className, array $args = [])
    {
        return $this->statement->fetchObject($className, $args);
    }

    public function bindValue(string $parameter, $var)
    {
        return $this->statement->bindValue($parameter, $var);
    }
}