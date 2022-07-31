<div class="categories">

<input onClick="change_category(event)" class="category" id="0" value="all" type="radio" name='category'>0 - all</input>

<?php foreach ($categories as $category): ?>
        <input onClick="change_category(event)" class="category" id="<?php echo $category['id'] ?>" value="<?php echo $category['name'] ?>" type="radio" name='category'><?php echo $category['id']  . " - " . $category['name'] ?></input>
<?php endforeach; ?>

<br />
<br />
<a href="<?php echo base_url().'index.php/pages/create_category' ?>" >
<button id="add_category" >Add New Category</button> 
</a>
<br /> <br />
<a href="<?php echo base_url().'index.php/pages/create_product' ?>" >
<button id="add_product" >Add New Product</button> 
</a>

</div>

<div id="products_block"></div>
