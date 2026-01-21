<h1>Sales</h1>

<div class="grid grid--2">
  <div class="card">
    <h2>Add daily sale</h2>
    <form method="post" action="index.php?r=sales/add" class="form">
      <input type="hidden" name="csrf" value="<?= htmlspecialchars(CSRF::token()) ?>">
      <label>Date</label>
      <input type="date" name="sale_date" value="<?= htmlspecialchars(date('Y-m-d')) ?>" />
      <label>Menu item</label>
      <select name="menu_item_id" required>
        <?php foreach ($menu as $m): ?>
          <option value="<?= (int)$m['id'] ?>"><?= htmlspecialchars($m['name']) ?> (<?= number_format((float)$m['price'],2) ?>)</option>
        <?php endforeach; ?>
      </select>
      <label>Quantity sold</label>
      <input type="number" step="0.01" name="quantity" required />
      <button class="btn" type="submit">Add</button>
    </form>
    <p class="muted">Revenue auto-calculates from menu price.</p>
  </div>

  <div class="card">
    <h2>Recent sales</h2>
    <div class="table-wrap">
      <table class="table">
        <thead><tr><th>Date</th><th>Menu item</th><th>Qty</th><th>Revenue</th></tr></thead>
        <tbody>
          <?php foreach ($recent as $r): ?>
            <tr>
              <td><?= htmlspecialchars($r['sale_date']) ?></td>
              <td><?= htmlspecialchars($r['menu_item_name']) ?></td>
              <td><?= number_format((float)$r['quantity'], 2) ?></td>
              <td><?= number_format((float)$r['revenue'], 2) ?></td>
            </tr>
          <?php endforeach; ?>
          <?php if (empty($recent)): ?>
            <tr><td colspan="4" class="muted">No sales logged yet.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
