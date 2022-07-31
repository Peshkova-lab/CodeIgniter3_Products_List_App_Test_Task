<br />

<?php foreach ($products as $product): ?>

<div id="<?php echo "list_item_".$product['id'] ?>">
       <input type="checkbox"><?php echo $product['count']  . " - " . $product['name'] . " - " . $product['status'] . " - " . $product['date'] ?></input>
        <button onClick=(delete_product(event)) id="<?php echo $product['id'] ?>">Delete</button>
</div>

<?php endforeach; ?>
