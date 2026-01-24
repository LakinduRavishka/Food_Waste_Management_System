<?php if (!isset($_GET['page']) || $_GET['page'] === 'menu'): ?>
<!-- Hero Section -->
<div style="background: linear-gradient(135deg, rgba(0,0,0,0.8), rgba(139,69,19,0.3)); border-radius: 1rem; padding: 3rem; margin-bottom: 3rem; box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.3); border: 1px solid rgba(255,255,255,0.1); overflow: hidden;">
  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center;">
    <div style="z-index: 2;">
      <h1 style="font-size: 3.5rem; margin-bottom: 1.5rem; background: linear-gradient(135deg, #ff6b6b, #ffd93d); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-weight: 800; line-height: 1.2;">
        Freshly Baked Daily
      </h1>
      <p style="font-size: 1.3rem; color: rgba(255,255,255,0.95); line-height: 1.8; margin-bottom: 2rem; font-weight: 300;">
        Indulge in our artisan breads, pastries, and desserts crafted with premium ingredients and traditional recipes.
      </p>
      
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 2.5rem;">
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <span style="color: #ffd93d; font-size: 1.5rem;">✓</span>
          <span style="color: rgba(255,255,255,0.9);">Fresh Daily</span>
        </div>
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <span style="color: #ffd93d; font-size: 1.5rem;">✓</span>
          <span style="color: rgba(255,255,255,0.9);">Special Offers</span>
        </div>
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <span style="color: #ffd93d; font-size: 1.5rem;">✓</span>
          <span style="color: rgba(255,255,255,0.9);">Quick Service</span>
        </div>
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <span style="color: #ffd93d; font-size: 1.5rem;">✓</span>
          <span style="color: rgba(255,255,255,0.9);">Dine-in & Takeaway</span>
        </div>
      </div>
      
      <a href="index.php?r=customer/index&page=discounts" style="display: inline-block; padding: 1.2rem 2.5rem; background: linear-gradient(135deg, #ff6b6b, #ee5a24); color: white; border-radius: 50px; font-weight: 700; text-decoration: none; box-shadow: 0 8px 15px rgba(255,107,107,0.4); transition: all 0.3s ease; font-size: 1.1rem;">
        🔥 View Special Offers
      </a>
    </div>
    
    <div style="position: relative; height: 400px; border-radius: 1rem; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.5);">
      <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?w=800&q=80" 
           alt="Fresh Bakery Products" 
           style="width: 100%; height: 100%; object-fit: cover; border-radius: 1rem;">
      <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); padding: 2rem; color: white;">
        <p style="font-size: 1.2rem; font-weight: 600; margin: 0;">Artisan Bakery Since 1995</p>
      </div>
    </div>
  </div>
</div>

  <!-- Our Menu Page -->
  <div style="margin-bottom: 3rem;">
    <h2 style="color: white; text-align: center; margin-bottom: 2rem; font-size: 2rem;">🍽️ Our Menu</h2>
    <div class="grid grid--3" style="gap: 1.5rem;">
      <?php foreach ($all_foods as $food): 
        $has_discount = !empty($food['discount_percentage']) && $food['discount_status'] === 'active';
        $display_price = $has_discount 
          ? $food['selling_price'] * (1 - $food['discount_percentage']/100) 
          : $food['selling_price'];
      ?>
        <div class="card" style="background: rgba(0,0,0,0.7); padding: 1.5rem; position: relative; border: 1px solid rgba(255,255,255,0.1);">
          <?php if ($has_discount): ?>
            <div style="position: absolute; top: 10px; right: 10px; background: #ff6b6b; color: white; padding: 0.5rem 1rem; border-radius: 2rem; font-weight: 700; font-size: 0.875rem;">
              <?= $food['discount_percentage'] ?>% OFF
            </div>
          <?php endif; ?>
          
          <div style="text-align: center;">
            <div style="font-size: 3rem; margin-bottom: 1rem;">🍽️</div>
            <h3 style="margin-bottom: 0.5rem; color: white;"><?= htmlspecialchars($food['name']) ?></h3>
            <span class="pill" style="margin-bottom: 1rem; display: inline-block; background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.2);"><?= htmlspecialchars($food['category']) ?></span>
            
            <div style="margin-top: 1rem;">
              <?php if ($has_discount): ?>
                <div style="font-size: 1.5rem; font-weight: 700; color: #ff6b6b;">
                  Rs.<?= number_format($display_price, 2) ?>
                </div>
                <div style="font-size: 1rem; color: rgba(255,255,255,0.6);">
                  <strike>Rs.<?= number_format($food['selling_price'], 2) ?></strike>
                </div>
              <?php else: ?>
                <div style="font-size: 1.5rem; font-weight: 700; color: #ffeb3b;">
                  Rs.<?= number_format($display_price, 2) ?>
                </div>
              <?php endif; ?>
            </div>
            
            <?php if ($food['available_qty'] > 0): ?>
              <div style="margin-top: 1rem; padding: 0.5rem; background: rgba(16,185,129,0.2); color: #10b981; border-radius: 0.5rem; font-size: 0.875rem; border: 1px solid rgba(16,185,129,0.3);">
                ✅ Available: <?= $food['available_qty'] ?> items
              </div>
            <?php else: ?>
              <div style="margin-top: 1rem; padding: 0.5rem; background: rgba(239,68,68,0.2); color: #ef4444; border-radius: 0.5rem; font-size: 0.875rem; border: 1px solid rgba(239,68,68,0.3);">
                ⏳ Check back later
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php else: ?>
  <!-- Special Discounts Page -->
  <?php if (!empty($discounts)): ?>
    <div style="margin-bottom: 3rem;">
      <h2 style="color: white; text-align: center; margin-bottom: 2rem; font-size: 2rem;">🔥 Special Discounts Today!</h2>
      
      <div class="grid grid--2" style="gap: 2rem;">
        <?php foreach ($discounts as $discount): 
          $original_price = $discount['selling_price'];
          $discounted_price = $original_price * (1 - $discount['discount_percentage']/100);
          $savings = $original_price - $discounted_price;
        ?>
          <div class="card" style="background: linear-gradient(135deg, #ff6b6b, #ee5a24); color: white; padding: 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
              <div>
                <h3 style="color: white; margin-bottom: 0.5rem;"><?= htmlspecialchars($discount['name']) ?></h3>
                <span style="background: rgba(255,255,255,0.2); color: white; padding: 0.25rem 0.75rem; border-radius: 999px; font-size: 0.875rem;">
                  <?= htmlspecialchars($discount['category']) ?>
                </span>
              </div>
              <div style="text-align: right;">
                <div style="font-size: 2.5rem; font-weight: 700; color: #ffeb3b;">
                  <?= $discount['discount_percentage'] ?>%
                </div>
                <div style="font-size: 0.875rem; opacity: 0.9;">OFF</div>
              </div>
            </div>
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
              <div>
                <div style="font-size: 1.5rem; font-weight: 600; color: white;">
                  Rs.<?= number_format($discounted_price, 2) ?>
                </div>
                <div style="font-size: 1rem; opacity: 0.8;">
                  <strike>Rs.<?= number_format($original_price, 2) ?></strike>
                  <span style="color: #ffeb3b; font-weight: 600; margin-left: 0.5rem;">
                    Save Rs.<?= number_format($savings, 2) ?>
                  </span>
                </div>
              </div>
              <div style="text-align: right;">
                <div style="font-size: 0.875rem; opacity: 0.9;">Until</div>
                <div style="font-size: 1.25rem; font-weight: 600; color: #ffeb3b;">
                  <?= date('g:i A', strtotime($discount['end_time'])) ?>
                </div>
              </div>
            </div>
            
            <div style="background: rgba(255,255,255,0.1); padding: 1rem; border-radius: 0.5rem;">
              <div style="display: flex; justify-content: space-between; align-items: center;">
                <span style="font-size: 0.875rem; opacity: 0.9;">⏰ Limited Time</span>
                <span style="font-size: 0.875rem; font-weight: 600; color: #ffeb3b;">
                  <?= $discount['leftover_quantity'] ?> left
                </span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php else: ?>
    <div style="background: rgba(255,255,255,0.95); padding: 4rem; border-radius: 1rem; text-align: center;">
      <div style="font-size: 4rem; margin-bottom: 2rem;">🍽️</div>
      <h2 style="color: var(--text-primary); margin-bottom: 1rem;">No Special Offers Right Now</h2>
      <p style="color: var(--text-secondary); font-size: 1.125rem;">Check back later for amazing discounts!</p>
    </div>
  <?php endif; ?>
<?php endif; ?>

<!-- Email Subscription -->
<div style="background: rgba(255,255,255,0.95); padding: 2rem; border-radius: 1rem; margin-top: 3rem; box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1);">
  <div style="text-align: center;">
    <h3 style="margin-bottom: 1rem; color: var(--primary);">🔔 Get Discount Alerts via Email</h3>
    <p style="color: var(--text-secondary); margin-bottom: 1.5rem;">Subscribe to receive notifications when we have special offers!</p>
    
    <?php if (isset($_SESSION['subscribe_success'])): ?>
      <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
        <?= htmlspecialchars($_SESSION['subscribe_success']) ?>
      </div>
      <?php unset($_SESSION['subscribe_success']); ?>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['subscribe_error'])): ?>
      <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
        <?= htmlspecialchars($_SESSION['subscribe_error']) ?>
      </div>
      <?php unset($_SESSION['subscribe_error']); ?>
    <?php endif; ?>
    
    <form method="post" action="index.php?r=customer/index" style="display: flex; gap: 1rem; max-width: 500px; margin: 0 auto;">
      <input type="email" name="email" placeholder="your@email.com" required 
             style="flex: 1; padding: 0.75rem 1rem; border: 2px solid var(--primary); border-radius: 0.5rem; font-size: 1rem;">
      <button type="submit" 
              style="padding: 0.75rem 2rem; background: var(--primary); color: white; border: none; border-radius: 0.5rem; font-weight: 600; cursor: pointer; font-size: 1rem;">
        Subscribe
      </button>
    </form>
  </div>
</div>