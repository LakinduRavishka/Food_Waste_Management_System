<?php
$title = config('app_name', 'App');
$user = Auth::user();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?= htmlspecialchars($title) ?></title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<header class="topbar">
  <div class="container topbar__inner">
    <a class="brand" href="index.php?r=dashboard/index"><?= htmlspecialchars($title) ?></a>

    <nav class="nav">
      <?php if ($user): ?>
        <a href="index.php?r=dashboard/index">Dashboard</a>
        <a href="index.php?r=ingredients/index">Ingredients</a>
        <a href="index.php?r=inventory/index">Inventory</a>
        <a href="index.php?r=menu/index">Menu</a>
        <a href="index.php?r=recipes/index">Recipes</a>
        <a href="index.php?r=sales/index">Sales</a>
        <a href="index.php?r=waste/index">Waste</a>
        <a href="index.php?r=reports/index">Reports</a>
        <a href="index.php?r=reports/forecast">Forecast</a>
        <a href="index.php?r=reports/recommendations">Recommendations</a>
        <span class="nav__sep"></span>
        <span class="nav__user">Hi, <?= htmlspecialchars($user['name']) ?></span>
        <a class="btn btn--ghost" href="index.php?r=auth/logout">Logout</a>
      <?php else: ?>
        <a href="index.php?r=auth/login">Login</a>
        <a href="index.php?r=auth/register">Register</a>
      <?php endif; ?>
    </nav>
  </div>
</header>

<main class="container content">
  <?php include $viewFile; ?>
</main>

<footer class="footer">
  <div class="container">
    <small>Built with PHP + MySQL • Starter project</small>
  </div>
</footer>

<script type="module" src="assets/js/app.js"></script>
</body>
</html>
