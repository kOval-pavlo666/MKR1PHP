<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newProduct = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'country' => $_POST['country'],
        'price' => $_POST['price']
    ];

    $data = json_decode(file_get_contents('products.json'), true);
    $data['products'][] = $newProduct;
    file_put_contents('products.json', json_encode($data, JSON_PRETTY_PRINT));

    header('Location: index.php');
    exit;
}
?>
