<?php

namespace Adapter;


interface DatabaseInterface
{

    public function prepare(string $query): DatabaseStatementInterface;

    public function errorInfo();
}