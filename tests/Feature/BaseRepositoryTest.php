<?php

use app\src\core\orm\BaseRepository;
use app\src\core\orm\DatabaseConnector;

beforeEach(function(){
    $this->base = new BaseRepository();
    $this->conn = new DatabaseConnector();
    $this->base->truncate($this->conn, 'todos');
});

it('should create an entry in todos table', function () {

    $this->base->create($this->conn, 'todos', [
        'title' => "wow",
        'description' => "so good",
        'created' => "2025-01-01"
    ]);

    $this->assertCount(1, $this->base->get($this->conn, 'todos'));
});

afterEach(function(){
        $this->base->truncate($this->conn, 'todos');
});