<?php
class Ticket {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createTicket($title, $description, $created_by) {
        $stmt = $this->pdo->prepare("INSERT INTO tickets (title, description, created_by, status) VALUES (?, ?, ?, 'pending')");
        return $stmt->execute([$title, $description, $created_by]);
    }

    public function getTicketsByStatus($status) {
        $stmt = $this->pdo->prepare("SELECT * FROM tickets WHERE status = ?");
        $stmt->execute([$status]);
        return $stmt->fetchAll();
    }

    public function assignTicket($ticket_id, $technician_id) {
        $stmt = $this->pdo->prepare("UPDATE tickets SET assigned_to = ?, status = 'in_progress' WHERE id = ?");
        return $stmt->execute([$technician_id, $ticket_id]);
    }

    public function completeTicket($ticket_id, $report) {
        $stmt = $this->pdo->prepare("UPDATE tickets SET status = 'completed', report = ? WHERE id = ?");
        return $stmt->execute([$report, $ticket_id]);
    }

    // Tambahkan metode lain yang diperlukan
}
