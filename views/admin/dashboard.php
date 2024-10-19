<?php
$pageTitle = 'Dashboard Admin';
require_once '../../includes/header.php';
require_once '../../classes/Ticket.php';

checkUserRole('admin');

$ticket = new Ticket($pdo);
$pendingTickets = $ticket->getTicketsByStatus('pending');
?>

<h2>Tiket Pending</h2>
<ul id="pending-tickets">
<?php foreach ($pendingTickets as $ticket): ?>
    <li id="ticket-<?php echo $ticket['id']; ?>">
        <?php echo htmlspecialchars($ticket['title']); ?> - 
        <span id="ticket-<?php echo $ticket['id']; ?>-status"><?php echo $ticket['status']; ?></span>
        <button onclick="updateTicketStatus(<?php echo $ticket['id']; ?>, 'in_progress')">Assign ke Teknisi</button>
    </li>
<?php endforeach; ?>
</ul>
<a href="create_ticket.php" class="btn">Buat Tiket Baru</a>
<a href="manage_users.php" class="btn">Kelola Pengguna</a>

<script src="/js/ajax.js"></script>
<?php require_once '../../includes/footer.php'; ?>
