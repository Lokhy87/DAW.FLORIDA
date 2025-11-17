<?php

namespace AEV2\Entity;

use AEV2\Repository\DetailRepository;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

#[Entity(repositoryClass: DetailRepository::class)]
#[Table(name: 'DETALLE')]
class Detail
{
    #[Id]
    #[GeneratedValue (strategy: "NONE")]
    #[Column(name: 'PEDIDO_NUM', type: 'integer')]
    private int $id;

    #[Id]
    #[Column(name: 'DETALLE_NUM', type: 'integer')]
    private int $detailId;

    #[ManyToOne(targetEntity: Order::class, inversedBy: 'details')]
    #[JoinColumn(name: 'PEDIDO_NUM', referencedColumnName: 'PEDIDO_NUM')]
    private Order $order;

    #[ManyToOne(targetEntity: Product::class, inversedBy: 'details')]
    #[JoinColumn(name: 'PROD_NUM', referencedColumnName: 'PROD_NUM')]
    private Product $product;

    #[Column(name: 'PRECIO_VENTA', type: 'decimal', precision: 8, scale: 2)]
    private float $price;

    #[Column(name: 'CANTIDAD', type: 'integer', length: 8)]
    private int $quantity;

    #[Column(name: 'IMPORTE', type: 'decimal', precision: 8, scale: 2)]
    private float $amount;
}
