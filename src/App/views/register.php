<?php include $this->resolve("partials/_header.php") ?>
<section class="layout layout--narrow page-section panel">
    <form action="/register" method="POST" class="grid grid-cols-1 gap-6">

        <?php include $this->resolve('partials/_csrf.php'); ?>

        <!-- Email -->
        <label class="field">
            <span class="form-label">Email address</span>
            <input value="<?= e($oldFormData['email'] ?? '') ?>" name="email" type="email" class="form-input" placeholder="john@example.com" />
            <?php if (array_key_exists('email', $errors)) : ?>
                <div class="form-error"><?= e($errors['email'][0]) ?></div>
            <?php endif; ?>
        </label>
        <!-- Age -->
        <label class="field">
            <span class="form-label">Age</span>
            <input value="<?= e($oldFormData['age'] ?? '') ?>" name="age" type="number" class="form-input" placeholder="" />
            <?php if (array_key_exists('age', $errors)) : ?>
                <div class="form-error"><?= e($errors['age'][0]) ?></div>
            <?php endif; ?>
        </label>
        <!-- Country -->
        <label class="field">
            <span class="form-label">Country</span>
            <select name="country" class="form-select">
                <option value="USA" <?= ($oldFormData['country'] ?? '') === 'USA' ? 'selected' : '' ?>> USA</option>
                <option value="Canada" <?= ($oldFormData['country'] ?? '') === 'Canada' ? 'selected' : '' ?>>Canada</option>
                <option value="Mexico" <?= ($oldFormData['country'] ?? '') === 'Mexico' ? 'selected' : '' ?>>Mexico</option>
                <option value="Invalid">Invalid Country</option>
            </select>
            <?php if (array_key_exists('country', $errors)) : ?>
                <div class="form-error"><?= e($errors['country'][0]) ?></div>
            <?php endif; ?>
        </label>
        <!-- Social Media URL -->
        <label class="field">
            <span class="form-label">Social Media URL</span>
            <input name="socialMediaURL" value="<?= e($oldFormData['socialMediaURL'] ?? '') ?>" type="text" class="form-input" placeholder="" />
            <?php if (array_key_exists('socialMediaURL', $errors)) : ?>
                <div class="form-error"><?= e($errors['socialMediaURL'][0]) ?></div>
            <?php endif; ?>
        </label>
        <!-- Password -->
        <label class="field">
            <span class="form-label">Password</span>
            <input name="password" type="password" class="form-input" placeholder="" />
            <?php if (array_key_exists('password', $errors)) : ?>
                <div class="form-error"><?= e($errors['password'][0]) ?></div>
            <?php endif; ?>
        </label>
        <!-- Confirm Password -->
        <label class="field">
            <span class="form-label">Confirm Password</span>
            <input name="confirmedPassword" type="password" class="form-input" placeholder="" />
            <?php if (array_key_exists('confirmedPassword', $errors)) : ?>
                <div class="form-error"><?= e($errors['confirmedPassword'][0]) ?></div>
            <?php endif; ?>
        </label>
        <!-- Terms of Service -->
        <div class="field">
            <label class="checkbox-row">
                <input <?= !empty($oldFormData['tos']) ? 'checked' : '' ?> name="tos" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" />
                <span class="ml-2 text-gray-700">I accept the terms of service.</span>
            </label>
            <?php if (array_key_exists('tos', $errors)) : ?>
                <div class="form-error"><?= e($errors['tos'][0]) ?></div>
            <?php endif; ?>
        </div>
        <button type="submit" class="form-submit">
            Submit
        </button>
    </form>
</section>

<?php include $this->resolve("partials/_footer.php") ?>
