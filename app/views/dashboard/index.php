<?php
$labels = array_map(fn($r) => $r['sale_date'], $salesByDate);
$values = array_map(fn($r) => (float)$r['revenue'], $salesByDate);
?>
<div class="grid grid--2">
  <section class="card">
    <h2>Last 7 days summary</h2>
    <div class="kpis">
      <div class="kpi">
        <div class="kpi__label">Sales revenue</div>
        <div class="kpi__value"><?= number_format($salesTotal, 2) ?></div>
      </div>
      <div class="kpi">
        <div class="kpi__label">Waste cost</div>
        <div class="kpi__value"><?= number_format($wasteTotals['waste_cost'], 2) ?></div>
      </div>
      <div class="kpi">
        <div class="kpi__label">Waste qty (total)</div>
        <div class="kpi__value"><?= number_format($wasteTotals['waste_qty'], 2) ?></div>
      </div>
    </div>

    <canvas id="salesChart" class="chart" data-labels='<?= htmlspecialchars(json_encode($labels)) ?>' data-values='<?= htmlspecialchars(json_encode($values)) ?>'></canvas>
    <p class="muted">Sales chart is based on your daily sales logs (<?= htmlspecialchars($from) ?> to <?= htmlspecialchars($to) ?>).</p>
  </section>

  <section class="card">
    <h2>Inventory snapshot</h2>
    <div class="table-wrap">
      <table class="table">
        <thead>
          <tr><th>Ingredient</th><th>Stock</th><th>Unit</th><th>Reorder level</th><th>Status</th></tr>
        </thead>
        <tbody>
          <?php foreach ($stock as $s): 
            $low = ((float)$s['stock'] < (float)$s['reorder_level']);
          ?>
            <tr>
              <td><?= htmlspecialchars($s['name']) ?></td>
              <td><?= number_format((float)$s['stock'], 2) ?></td>
              <td><?= htmlspecialchars($s['unit']) ?></td>
              <td><?= number_format((float)$s['reorder_level'], 2) ?></td>
              <td>
                <?php if ($low): ?>
                  <span class="pill pill--danger">Low</span>
                <?php else: ?>
                  <span class="pill pill--ok">OK</span>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <p class="muted">Use Inventory → Stock In/Out to keep this accurate.</p>
  </section>
</div>
