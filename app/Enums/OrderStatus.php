<?php
namespace App\Enums;
enum OrderStatus: int{
    case InCrafting = 0;
    case WaitingForPayment = 1;
    case PaymentValidate = 2;
    case InPreparation = 3;
    case Shipped = 4;
    case Cancel = 5;
    case Delivered = 6;
    case OrderReturn = 7;


    public function getOrderStatus(): string
    {
        return match($this)
        {
            self::InCrafting => 'In Crafting',
            self::WaitingForPayment => 'Waiting For Payment',
            self::PaymentValidate => 'Payment Validate',
            self::InPreparation => 'InPreparation',
            self::Shipped => 'Shipped',
            self::Cancel => 'Cancel',
            self::Delivered => 'Delivered',
            self::OrderReturn => 'OrderReturn',
        };
    }
}
