<div class="card">
  <h1><?= $mode === 'create' ? 'Add Ingredient' : 'Edit Ingredient' ?></h1>

  <?php if (!empty($error)): ?>
    <div class="alert alert--danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="post" class="form">
    <input type="hidden" name="csrf" value="<?= htmlspecialchars(CSRF::token()) ?>">
    <label>Name</label>
    <input type="text" name="name" required value="<?= htmlspecialchars($item['name'] ?? '') ?>" />
    <label>Unit (e.g., kg, g, pcs, L)</label>
    <input type="text" name="unit" required value="<?= htmlspecialchars($item['unit'] ?? '') ?>" />
    <label>Cost per unit</label>
    <input type="number" step="0.01" name="cost_per_unit" value="<?= htmlspecialchars($item['cost_per_unit'] ?? '0') ?>" />
    <label>Reorder level</label>
    <input type="number" step="0.01" name="reorder_level" value="<?= htmlspecialchars($item['reorder_level'] ?? '0') ?>" />
    <div class="row">
      <button class="btn" type="submit">Save</button>
      <a class="btn btn--ghost" href="index.php?r=ingredients/index">Cancel</a>
    </div>
  </form>
</div>
