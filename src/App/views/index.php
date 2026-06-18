<?php include $this->resolve("partials/_header.php"); ?>
<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Track your transactions<br>without the headache</h1>
            <p>Simple transaction management for people who just want to get stuff done.</p>
            <div class="hero-actions">
                <a href="/login" class="btn-primary">Start tracking</a>
                <a href="/about" class="btn-ghost">Learn more →</a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="section">
    <div class="container">
        <div class="section-head">
            <h2>Everything you need</h2>
            <p>No bloat, no complexity. Just the essentials.</p>
        </div>

        <div class="features-grid">
            <div class="feature-item">
                <h3>Add transactions</h3>
                <p>Description, amount, date. That's it. Keep it moving.</p>
            </div>
            <div class="feature-item">
                <h3>Attach receipts</h3>
                <p>Upload and organize receipts for each transaction. Everything in one place.</p>
            </div>
            <div class="feature-item">
                <h3>Search instantly</h3>
                <p>Find anything in seconds. No digging through spreadsheets.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section cta-wrapper">
    <div class="container">
        <div class="cta-box">
            <h2>Start organizing today</h2>
            <p>Free to use. No credit card needed.</p>
            <a href="/transaction" class="btn-primary">Create your first transaction →</a>
        </div>
    </div>
</section>
<?php include $this->resolve("partials/_footer.php"); ?>