<?php include $this->resolve("partials/_header.php"); ?>

<section class="layout layout--narrow page-section panel">
    <form enctype="multipart/form-data" method="POST" class="grid grid-cols-1 gap-6">
        <?php include $this->resolve("partials/_csrf.php"); ?>
        <label class="field">
            <span class="form-label">Receipt File (Image or PDF)</span>
            <input name="receipt" type="file" class="file-input" />
            <?php if (array_key_exists('receipt', $errors)) : ?>
                <div class="form-error"><?= e($errors['receipt'][0]) ?></div>
            <?php endif; ?>
        </label>
        <button type="submit" class="form-submit">
            Submit
        </button>
    </form>
</section>

<?php include $this->resolve("partials/_footer.php"); ?>
