<div class="card auth">
  <h1>Create account</h1>

  <?php if (!empty($error)): ?>
    <div class="alert alert--danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <?php if (!empty($success)): ?>
    <div class="alert alert--success"><?= htmlspecialchars($success) ?></div>
  <?php endif; ?>

  <form method="post" class="form">
    <input type="hidden" name="csrf" value="<?= htmlspecialchars(CSRF::token()) ?>">
    <label>Name</label>
    <input type="text" name="name" required placeholder="Manager name" />
    <label>Email</label>
    <input type="email" name="email" required placeholder="you@restaurant.com" />
    <label>Password</label>
    <input type="password" name="password" required placeholder="Create a password" />
    <button class="btn" type="submit">Register</button>
  </form>

  <p class="muted">Already have an account? <a href="index.php?r=auth/login">Login</a></p>
</div>
