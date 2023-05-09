<?php

namespace Framework\Database;

use \Doctrine\DBAL\Connection;

interface ConnectionInterface
{
    public function getConnection():Connection;
}