<div class="categories">

<input checked="checked" onClick="change_filters_value()" class="category" id="0" value="all" type="radio" name='category'>all</input>

<?php foreach ($categories as $category): ?>
        <input onClick="change_filters_value()" class="category" id="<?php echo $category['id'] ?>" value="<?php echo $category['name'] ?>" type="radio" name='category'><?php echo $category['name'] ?>

</input>
<?php endforeach; ?>

<br />
<br />


</div>

<select onchange="change_filters_value()" id="status">
        <option value=''></option>
        <option value='bought'>bought</option>
        <option value='not bought'>not bought</option>
</select>

<br />
<br />
<a href="<?php echo base_url().'index.php/pages/create_category' ?>" >
Add New Category
</a>
<br /> <br />
<a href="<?php echo base_url().'index.php/pages/create_product' ?>" >
Add New Product
</a>

<br/><br/><br/><br/>

<div id="products_block"></div>
