<?php include $this->resolve("partials/_header.php"); ?>

<section class="max-w-2xl mx-auto page-section panel">
    <form method="POST" class="grid grid-cols-1 gap-6">

        <?php include $this->resolve('/partials/_csrf.php'); ?>

        <label class="field">
            <span class="form-label">Email address</span>
            <input value="<?= e($oldFormData['email'] ?? '') ?>" name="email" type="email" class="form-input" placeholder="john@example.com" />
            <?php if (array_key_exists('email', $errors)) : ?>
                <div class="form-error">
                    <?= e($errors['email'][0]) ?>
                </div>
            <?php endif; ?>
        </label>
        <label class="field">
            <span class="form-label">Password</span>
            <input name="password" type="password" class="form-input" placeholder="" />
            <?php if (array_key_exists('password', $errors)) : ?>
                <div class="form-error">
                    <?= e($errors['password'][0]) ?>
                </div>
            <?php endif; ?>
        </label>
        <button type="submit" class="form-submit">
            Submit
        </button>
    </form>
</section>

<?php include $this->resolve("partials/_footer.php"); ?>
