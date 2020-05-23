<?php 
Breadcrumbs::for('Order', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Order', route('order'));
});






?>