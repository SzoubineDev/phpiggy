<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Brand -->
            <div class="footer-brand">
                <h3>PHPiggy</h3>
                <p>Simple transaction management for people who just want to get stuff done.</p>
            </div>

            <!-- Links -->
            <div class="footer-links">
                <h4>Product</h4>
                <a href="/">Home</a>
                <a href="/transaction">Transactions</a>
                <a href="/about">About</a>
            </div>

            <!-- More Links -->
            <div class="footer-links">
                <h4>Account</h4>
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="/logout">Logout</a>
                <?php else: ?>
                    <a href="/login">Login</a>
                    <a href="/register">Register</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="footer-bottom">
            <span>&copy; <?php echo date('Y'); ?> PHPiggy. All rights reserved.</span>
            <span>Made with PHP</span>
        </div>
    </div>
</footer>
</body>

</html>
<!-- End Footer -->