<?php


class BaseModel {
    protected $id;
    protected $pdo;

    public function __construct($id, $pdo) {
        $this->id = $id;
        $this->pdo = $pdo;
    }

    public function save() {
        $stmt = $this->pdo->prepare("INSERT INTO pets (id, name, type) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE name = VALUES(name), type = VALUES(type)");
        $stmt->execute([$this->id, $this->name, $this->type]);
    }

    public static function find($id, $pdo) {
        // Retrieve the object with the given id from the database
        $stmt = $pdo->prepare("SELECT * FROM table WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function delete() {
        // Delete this object from the database
        $stmt = $this->pdo->prepare("DELETE FROM table WHERE id = ?");
        $stmt->execute([$this->id]);
    }
}

?>