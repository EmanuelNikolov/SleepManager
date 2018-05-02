<?php

namespace Adapter;


interface DatabaseStatementInterface
{

    public function execute(array $params = []);

    public function fetch();

    public function fetchColumn(int $columnNum = null);

    public function fetchAll();

    public function fetchObject($className, array $args = []);
}