<h2><?php echo $title ?></h2>

<?php 
//Функция сообщает об ошибках полученных из валидации форм
echo validation_errors(); ?>

<?php 
//Функция предусмотрена в хелпере форм и предоставляет элеименты формы с добавленными дополнительными функциональностями.
echo form_open('pages/create_product'); ?>

<label for="name">Name</label>
<textarea name="name"></textarea><br />


<label for="count">Count</label>
<input type="number" name="count" /><br/>

<select name="select_category">
    <option></option>
<?php foreach ($categories as $category): ?>
        <option class="category" id="<?php echo $category['id'] ?>" value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
<?php endforeach; ?>
</select>

<input type="submit" name="submit" value="Create new product" />

</form>