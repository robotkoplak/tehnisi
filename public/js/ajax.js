function updateTicketStatus(ticketId, newStatus) {
    fetch('/api/update_ticket_status.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `ticket_id=${ticketId}&new_status=${newStatus}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById(`ticket-${ticketId}-status`).textContent = newStatus;
        } else {
            alert('Gagal memperbarui status tiket');
        }
    })
    .catch(error => console.error('Error:', error));
}

function checkNewNotifications() {
    fetch('/api/check_notifications.php')
    .then(response => response.json())
    .then(data => {
        if (data.hasNewNotifications) {
            document.getElementById('notification-badge').style.display = 'inline';
        }
    })
    .catch(error => console.error('Error:', error));
}

// Periksa notifikasi setiap 30 detik
setInterval(checkNewNotifications, 30000);
