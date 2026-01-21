<div class="card auth">
  <h1>Login</h1>

  <?php if (!empty($error)): ?>
    <div class="alert alert--danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="post" class="form">
    <input type="hidden" name="csrf" value="<?= htmlspecialchars(CSRF::token()) ?>">
    <label>Email</label>
    <input type="email" name="email" required placeholder="you@restaurant.com" />
    <label>Password</label>
    <input type="password" name="password" required placeholder="••••••••" />
    <button class="btn" type="submit">Login</button>
  </form>

  <p class="muted">No account? <a href="index.php?r=auth/register">Create one</a></p>
</div>
