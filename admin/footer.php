<footer class="bg-dark text-white text-center py-3 mt-4">
    <p>&copy; 2024 Sistem Informasi Laundry. All rights reserved.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
    function confirmLogout() {
        if (confirm("Apakah Anda yakin ingin logout?")) {
            window.location.href = 'logout.php'; // Pastikan path ini benar
        }
    }
</script>
</body>

</html>