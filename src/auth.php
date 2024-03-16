<?php

class Product
{
    public string $name;
    public int $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

class Order
{
    public int $orderNumber;
    public array $products = [];

    public function addProduct(Product $product, $quantity)
    {
        $this->products[] = ['product' => $product, 'quantity' => $quantity];
    }

    public function removeProduct(Product $product)
    {
        foreach ($this->products as $key => $item) {
            if ($item['product'] === $product) {
                unset($this->products[$key]);
                break;
            }
        }
    }

    public function calculateTotal()
    {
        $total = 0;
        foreach ($this->products as $item){
            $total += $item['product']->price * $item['quantity'];
        }
        return $total;
    }

}

$product1 = new Product('book', 60);
$product2 = new Product('phone', 1950);
$product3 = new Product('headphones', 250);

$order = new Order();
$order->orderNumber = 1 ;

$order->addProduct($product1, 2);
$order->addProduct($product2, 1);
$order->addProduct($product3, 3);

$order->removeProduct($product2);

echo 'Загальна сума замовлення: ' . $order->calculateTotal().'$';