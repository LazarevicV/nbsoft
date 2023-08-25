<?php

class Order
{
    public $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function all()
    {
        $sql = "SELECT orders.id AS porudzbina_id, users.ime AS korisnik_ime, users.prezime AS korisnik_prezime,OrderItems.id AS stavka_id, Product.name AS proizvod_naziv, OrderItems.value AS vrednost FROM orders JOIN users ON orders.userId = users.id JOIN OrderItems ON orders.id = OrderItems.orderId JOIN Product ON OrderItems.productId = Product.id ORDER BY orders.id, OrderItems.id;";
        $query = $this->conn->query($sql);
        $orders = $query->fetchAll();
        return $orders;
    }
}
