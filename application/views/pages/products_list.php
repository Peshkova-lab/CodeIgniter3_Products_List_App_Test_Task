<br />

<?php foreach ($products as $product): ?>

<div id="<?php echo "list_item_".$product['id'] ?>">
<?php

$checkStatus = '';

if ($product['status'] === 'bought') {
        $checkStatus = 'checked';
}

?>
       <input <?php echo $checkStatus ?> onClick="check_product(event)" id="<?php echo "p".$product['id'] ?>" type="checkbox">
       <label for="<?php echo "p".$product['id'] ?>"><?php echo "Count: " . $product['count']  . " - Product: " . $product['name'] .  " - Date: " . $product['date'] ?> </label>
       </input>
        <button onClick=(delete_product(event)) id="<?php echo $product['id'] ?>">Delete</button>
</div>

<?php endforeach; ?>
