<div class="row row--between">
  <h1>Ingredients</h1>
  <a class="btn" href="index.php?r=ingredients/create">+ Add Ingredient</a>
</div>

<div class="card">
  <div class="table-wrap">
    <table class="table">
      <thead>
        <tr><th>Name</th><th>Unit</th><th>Cost per unit</th><th>Reorder level</th><th></th></tr>
      </thead>
      <tbody>
        <?php foreach ($items as $it): ?>
          <tr>
            <td><?= htmlspecialchars($it['name']) ?></td>
            <td><?= htmlspecialchars($it['unit']) ?></td>
            <td><?= number_format((float)$it['cost_per_unit'], 2) ?></td>
            <td><?= number_format((float)$it['reorder_level'], 2) ?></td>
            <td class="td-actions">
              <a class="btn btn--ghost" href="index.php?r=ingredients/edit&id=<?= (int)$it['id'] ?>">Edit</a>
              <form method="post" action="index.php?r=ingredients/delete" onsubmit="return confirm('Delete ingredient?')">
                <input type="hidden" name="csrf" value="<?= htmlspecialchars(CSRF::token()) ?>">
                <input type="hidden" name="id" value="<?= (int)$it['id'] ?>">
                <button class="btn btn--danger btn--ghost" type="submit">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        <?php if (empty($items)): ?>
          <tr><td colspan="5" class="muted">No ingredients yet.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
