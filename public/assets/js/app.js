
import { renderBarChart } from './simpleChart.js';

function parseData(el, key) {
  try { return JSON.parse(el.dataset[key] || '[]'); } catch { return []; }
}

document.addEventListener('DOMContentLoaded', () => {
  const sales = document.getElementById('salesChart');
  if (sales) {
    renderBarChart(sales, parseData(sales, 'labels'), parseData(sales, 'values'), { title: 'Sales revenue (daily)' });
  }

  const wasteIng = document.getElementById('wasteIngChart');
  if (wasteIng) {
    renderBarChart(wasteIng, parseData(wasteIng, 'labels'), parseData(wasteIng, 'values'), { title: 'Waste cost by ingredient (top 10)' });
  }

  const forecast = document.getElementById('forecastChart');
  if (forecast) {
    renderBarChart(forecast, parseData(forecast, 'labels'), parseData(forecast, 'values'), { title: 'Forecasted menu demand (top 10)' });
  }
});
