<?php 
Breadcrumbs::for('subcategory', function ($trail,$category) {
  $trail->parent('dashboard');
  $trail->push('SubCategory', route('subcategory',$category));
});

Breadcrumbs::for('subcategory.add', function ($trail,$category) {
  $trail->parent('subcategory',$category);
  $trail->push('Add', route('subcategory.add'));
});



Breadcrumbs::for('subcategory.edit', function ($trail,$subcategory) {
  $trail->parent('subcategory',$subcategory->category_id);
  $trail->push("Update subcategory", route('subcategory.edit',$subcategory));
});

?>