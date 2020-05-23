<?php 
Breadcrumbs::for('product', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Product', route('product'));
});

Breadcrumbs::for('product.add', function ($trail) {
  $trail->parent('product');
  $trail->push('Add', route('product.add'));
});



Breadcrumbs::for('product.edit', function ($trail,$product) {
  $trail->parent('product');
  $trail->push("Update product", route('product.edit',$product));
});

?>