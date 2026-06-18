<?php include $this->resolve("partials/_header.php") ?>

<div class="container" style="max-width: 500px; margin-top: 3rem; margin-bottom: 3rem;">
    <div class="bg-white rounded-xl shadow-sm" style="padding: 2rem; border: 1px solid #f3f4f6;">
        <h2 style="font-family: 'Outfit', sans-serif; font-size: 1.5rem; font-weight: 700; text-align: center; margin-bottom: 1.5rem; color: #111827;">
            Create Account
        </h2>

        <form action="/register" method="POST" style="display: flex; flex-direction: column; gap: 1.25rem;">

            <div class="form-group">
                <label for="name" class="form-label">Full Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="John Doe"
                    class="form-input">
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="john@example.com"
                    class="form-input">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-input">
            </div>

            <div class="form-group">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input
                    type="password"
                    id="confirm_password"
                    name="confirm_password"
                    class="form-input">
            </div>

            <div style="display: flex; align-items: center;">
                <input type="checkbox" id="terms" name="terms">
                <label for="terms" style="margin-left: 0.5rem; font-size: 0.875rem; color: #6b7280;">
                    I agree to the Terms and Conditions
                </label>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; justify-content: center;">
                Register
            </button>

        </form>
    </div>
</div>

<?php include $this->resolve("partials/_footer.php") ?>