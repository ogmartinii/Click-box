<?php


class database 
{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=wdf;charset=utf8', 'root', '');
    }

    public function insertUser()
    {
        $stmt = $this->db->prepare('INSERT INTO user (id) VALUES (NULL)');
        $stmt->execute([]);
        return $this->db->lastInsertId();
    }

    public function insertWinCombo($win_combo)
    {
        $stmt = $this->db->prepare('INSERT INTO win_combo (win_combo) VALUES (?)');
        $stmt->execute([$win_combo]);
        return $this->db->lastInsertId();
    }

    public function getWinCombo($id)
    {
        $stmt = $this->db->prepare('SELECT win_combo FROM win_combo WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertAttempt($attempt)
    {
        $stmt = $this->db->prepare('INSERT INTO user_attempt (attempt) VALUES (?)');
        $stmt->execute([$attempt]);
        return $this->db->lastInsertId();
    }

    public function getAttempt($id)
    {
        $stmt = $this->db->prepare('SELECT attempt FROM user_attempt WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}