<?php include $this->resolve("partials/_header.php") ?>

<body>
    <div class="container max-w-2xl mx-auto my-12">
        <div class="bg-white shadow-md rounded p-4">
            <h2 class="text-2xl font-bold text-center mb-4">Create Account</h2>

            <form action="/register" method="POST" class="grid gap-6">

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        Full Name
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="John Doe"
                        class="w-full mt-1">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email Address
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="john@example.com"
                        class="w-full mt-1">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="w-full mt-1">
                </div>

                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700">
                        Confirm Password
                    </label>
                    <input
                        type="password"
                        id="confirm_password"
                        name="confirm_password"
                        class="w-full mt-1">
                </div>

                <div class="flex items-center">
                    <input
                        type="checkbox"
                        id="terms"
                        name="terms">
                    <label for="terms" class="ml-2 text-sm text-gray-600">
                        I agree to the Terms and Conditions
                    </label>
                </div>

                <button
                    type="submit"
                    class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded transition">
                    Register
                </button>

            </form>
        </div>
    </div>
    <?php include $this->resolve("partials/_footer.php") ?>
</body>

</html>