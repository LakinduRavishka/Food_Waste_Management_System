<?php
declare(strict_types=1);

final class DashboardController extends Controller {
  public function index(): void {
    Auth::requireLogin();

    $to = date('Y-m-d');
    $from = date('Y-m-d', strtotime('-6 days'));

    $stock = Inventory::stockByIngredient();
    $wasteTotals = Waste::totals($from, $to);
    $salesByDate = Sale::totalsByDate($from, $to);
    $salesTotal = 0.0;
    foreach ($salesByDate as $r) $salesTotal += (float)$r['revenue'];

    $this->render('dashboard/index', [
      'from' => $from,
      'to' => $to,
      'stock' => $stock,
      'wasteTotals' => $wasteTotals,
      'salesByDate' => $salesByDate,
      'salesTotal' => $salesTotal,
    ]);
  }
}
