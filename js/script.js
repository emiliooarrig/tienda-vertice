function showToast(message, type) {
    // Example for displaying toast messages
    const toastContainer = document.getElementById('toastContainer');
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.innerText = message;
    toastContainer.appendChild(toast);

    setTimeout(() => toast.remove(), 3000); // Auto-remove after 3 seconds
}