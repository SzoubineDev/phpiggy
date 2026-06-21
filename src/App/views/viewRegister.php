<?php include $this->resolve("partials/_header.php") ?>

<section class="max-w-2xl mx-auto mt-12">
    <div class="bg-white shadow-lg border border-gray-200 rounded-lg overflow-hidden">
        <div class="bg-indigo-600 px-6 py-4">
            <h1 class="text-2xl font-bold text-white">
                Registration Details
            </h1>
        </div>

        <div class="p-6 space-y-4">
            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold text-gray-700">Email</span>
                <span><?php echo $email ?></span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold text-gray-700">Age</span>
                <span><?= htmlspecialchars($age) ?></span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold text-gray-700">Country</span>
                <span><?= htmlspecialchars($country) ?></span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold text-gray-700">Social Media</span>
                <a
                    href="<?= htmlspecialchars($socialMediaURL) ?>"
                    target="_blank"
                    class="text-indigo-600 hover:underline">
                    Visit Profile
                </a>
            </div>

            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold text-gray-700">Accepted Terms</span>
                <span>
                    <?= $tos ? 'Yes' : 'No' ?>
                </span>
            </div>
        </div>
    </div>
</section>

<?php include $this->resolve("partials/_footer.php") ?>