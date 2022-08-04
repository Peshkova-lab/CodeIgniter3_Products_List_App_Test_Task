<div class="create_form">

<?php 
//Функция сообщает об ошибках полученных из валидации форм
echo validation_errors(); ?>

<?php 
//Функция предусмотрена в хелпере форм и предоставляет элеименты формы с добавленными дополнительными функциональностями.
echo form_open('pages/create_category'); ?>

<label for="name">Category name: </label>
<textarea name="name"></textarea><br />

<br /><br />
<input class="create_btn" type="submit" name="submit" value="Create category" />

</form>

</div>