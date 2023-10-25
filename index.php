<!DOCTYPE html>
<html>
<head>
    <title>Список Товарів</title>
</head>
<body>
<h1>Список Товарів</h1>

<?php
function getProducts() {
    $data = json_decode(file_get_contents('products.json'), true);
    $products = $data['products'];
    return $products;
}

$products = getProducts();

if (count($products) > 0) {
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>Назва</th><th>Країна виробника</th><th>Ціна</th></tr>';
    foreach ($products as $product) {
        echo '<tr>';
        echo '<td>' . $product['id'] . '</td>';
        echo '<td>' . $product['name'] . '</td>';
        echo '<td>' . $product['country'] . '</td>';
        echo '<td>' . $product['price'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'Список товарів порожній.';
}
?>

<h2>Додати Новий Товар</h2>
<form action="add_product.php" method="post">
    id: <input type="number" name="id" required><br>
    Назва товару: <input type="text" name="name" required><br>
    Країна виробника: <input type="text" name="country" required><br>
    Ціна: <input type="number" name="price" step="0.01" required><br>
    <input type="submit" value="Додати">
</form>
</body>
</html>
