<?php include $this->resolve("partials/_header.php"); ?>

<body>
    <section
        class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
        <!-- Page Title -->
        <h3><?php echo e($title); ?></h3>

        <hr />

        <!-- Escaping Data -->
        <p>Escaping Data:
            <?php echo e($dangerousData); ?>
        </p>
    </section>
</body>
<?php include $this->resolve("partials/_footer.php"); ?>
<!-- End Main Content Area -->