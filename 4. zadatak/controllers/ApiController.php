<?php

require_once __DIR__ . '/../app/Response.php';

class ApiController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function users()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']->role === 'admin') {
                require_once __DIR__ . '/../classes/User.php';
                $user = new User($this->conn);
                $data = $user->all();
                Response::sendResponse($data);
            } else {
                Response::sendResponse(['error' => 'You are not authorized to access this page.']);
            }
        } else {
            Response::sendResponse(['error' => 'You are not authorized to access this page.']);
        }
    }

    public function orders()
    {
        require_once __DIR__ . '/../classes/Order.php';
        $order = new Order($this->conn);
        $data = $order->all();

        session_start();
        if (isset($_SESSION['user'])) {
            if (!$_SESSION['user']->role == 'admin') {
                Response::sendResponse(['error' => 'You are not authorized to access this page.']);
                exit();
            }
        } else {
            Response::sendResponse(['error' => 'You are not authorized to access this page.']);
            exit();
        }

        $groupedData = [];

        foreach ($data as $row) {
            $orderID = $row->porudzbina_id;
            $item = [
                "stavka_id" => $row->stavka_id,
                "proizvod_naziv" => $row->proizvod_naziv,
                "vrednost" => $row->vrednost,
            ];

            if (!isset($groupedData[$orderID])) {
                $groupedData[$orderID] = ["order" => [], "orderItems" => []];
            }

            if (empty($groupedData[$orderID]["order"])) {
                $groupedData[$orderID]["order"] = [
                    "porudzbina_id" => $row->porudzbina_id,
                    "korisnik_ime" => $row->korisnik_ime,
                    "korisnik_prezime" => $row->korisnik_prezime
                ];
            }

            $groupedData[$orderID]["orderItems"][] = $item;
        }

        $finalResult = [];

        foreach ($groupedData as $orderID => $data) {
            $order = $data["order"];
            $order["orderItems"] = $data["orderItems"];
            $finalResult["order" . $orderID] = $order;
        }
        Response::sendResponse($finalResult);
    }
}
