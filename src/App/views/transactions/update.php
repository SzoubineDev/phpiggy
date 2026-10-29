<?php include $this->resolve("partials/_header.php"); ?>

<section class="layout layout--narrow page-section panel">
    <form method="POST" class="grid grid-cols-1 gap-6">
        <?php include $this->resolve("partials/_csrf.php"); ?>

        <label class="field">
            <span class="form-label">Description</span>
            <input value="<?= e($transaction['description']) ?>" name="description" type="text" class="form-input" />
            <?php if (array_key_exists('description', $errors)) : ?>
                <div class="form-error"><?= e($errors['description'][0]) ?></div>
            <?php endif; ?>
        </label>
        <label class="field">
            <span class="form-label">Amount</span>
            <input value="<?= e($transaction['amount']) ?>" name="amount" type="number" step="0.01" class="form-input" />
            <?php if (array_key_exists('amount', $errors)) : ?>
                <div class="form-error"><?= e($errors['amount'][0]) ?></div>
            <?php endif; ?>
        </label>
        <label class="field">
            <span class="form-label">Date</span>
            <input value="<?= e($transaction['formatted_date']) ?>" name="date" type="date" class="form-input" />
            <?php if (array_key_exists('date', $errors)) : ?>
                <div class="form-error"><?= e($errors['date'][0]) ?></div>
            <?php endif; ?>
        </label>
        <button type="submit" class="form-submit">
            Submit
        </button>
    </form>
</section>

<?php include $this->resolve("partials/_footer.php"); ?>
