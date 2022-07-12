<?php


class OrdersController
{
    public function getOrderForCustomer($id_customer)
    {
        $orders = new OrdersModel();
        return $orders->getOrderForCustomer($id_customer);
    }
}