<?php include $this->resolve("partials/_header.php"); ?>

<section class="layout page-section panel">
    <!-- Page Title -->
    <h3 class="text-xl font-semibold text-gray-900 mb-4"><?= e($title) ?></h3>

    <hr class="border-gray-200 mb-4" />

    <!-- Escaping Data -->
    <p class="text-gray-700">Escaping Data:
        <?= e($dangerousData) ?>
    </p>
</section>

<?php include $this->resolve("partials/_footer.php"); ?>
<!-- End Main Content Area -->
