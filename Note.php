<?php

class Note {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function add($title, $content) {
        $stmt = $this->conn->prepare("INSERT INTO notes (title, content) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $content);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}