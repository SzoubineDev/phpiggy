<?php include $this->resolve("partials/_header.php") ?>

<body>
    <div class="container max-w-2xl mx-auto my-12">
        <div class="bg-white shadow-md rounded p-4">
            <h2 class="text-2xl font-bold text-center mb-4">Welcome Back</h2>

            <form action="/login" method="POST" class="grid gap-6">

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

                <div class="flex items-center">
                    <input
                        type="checkbox"
                        id="remember"
                        name="remember">
                    <label for="remember" class="ml-2 text-sm text-gray-600">
                        Remember me
                    </label>
                </div>

                <button
                    type="submit"
                    class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded transition">
                    Log In
                </button>

            </form>

            <p class="text-sm text-center mt-4 text-gray-600">
                Don't have an account?
                <a href="/register" class="text-indigo-600 hover:underline">Sign up</a>
            </p>
        </div>
    </div>
    <?php include $this->resolve("partials/_footer.php") ?>
</body>

</html>