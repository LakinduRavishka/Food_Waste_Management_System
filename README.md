
# Food Waste & Profit Optimization System (PHP + MySQL)

A lightweight web app for restaurants to:
- record **ingredients**, **inventory**, **menu items**, **recipes/portion sizes**
- log **daily sales** and **food waste**
- view **waste analytics**, **profit summaries**, **demand forecasts**, and **purchase/production recommendations**

## Tech
- HTML, CSS, JavaScript (vanilla)
- PHP 8+ (PDO)
- MySQL / MariaDB
- Works well with XAMPP / WAMP / MAMP

---

## 1) Setup (XAMPP)

1. Copy this project into your web root:
   - XAMPP: `C:\xampp\htdocs\food-waste-profit-optimizer`

2. Create a database in phpMyAdmin:
   - name: `food_waste_opt`

3. Import schema:
   - open `database/schema.sql` and run it in phpMyAdmin (SQL tab)

4. Configure DB:
   - copy `app/config/config.example.php` to `app/config/config.php`
   - update DB host/user/pass/name

5. Run the app:
   - open: `http://localhost/food-waste-profit-optimizer/public/`

---

## 2) First login
- Go to **Register** and create your first account.
- The **first registered user** becomes **Admin** automatically.

---

## 3) Typical workflow
1. Add Ingredients (with cost/unit + reorder level)
2. Add Menu Items (selling price)
3. Create Recipes (portion sizes per menu item)
4. Record Inventory movements (Stock In / Out)
5. Add Daily Sales
6. Log Waste
7. Check Reports → Forecast / Recommendations

---

## Notes
- Forecasting is a simple moving average (default 7 days).
- Recommendations compare forecast ingredient needs vs current stock and reorder levels.
- This is a solid foundation you can extend for your final-year project (roles, multi-branch, CSV imports, ML forecasting, etc.).
