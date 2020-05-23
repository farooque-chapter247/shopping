<?php 
Breadcrumbs::for('category', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Category', route('category'));
});

Breadcrumbs::for('category.add', function ($trail) {
  $trail->parent('category');
  $trail->push('Add', route('category.add'));
});

Breadcrumbs::for('holiday.show', function ($trail,$holiday) {
  $trail->parent('holiday');
  $trail->push($holiday->name, route('holiday.show',$holiday));
});

Breadcrumbs::for('category.edit', function ($trail,$category) {
  $trail->parent('category');
  $trail->push("Update Category", route('category.edit',$category));
});

?>