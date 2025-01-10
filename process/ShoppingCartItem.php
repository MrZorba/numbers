<?php
class ShoppingCartItem implements Serializable
{
    private ?CustomProduct $product;
    private int $qty;
    private float $productCostInRupees;
    private float $productCostInDollar;
    private string $productColor;
    private string $productSize;

    public function __construct(CustomProduct $product, int $qty, float $productCostInRupees, float $productCostInDollar, string $productColor = '', string $productSize = '')
    {
        $this->product = $product;
        $this->qty = $qty;
        $this->productCostInRupees = $productCostInRupees;
        $this->productCostInDollar = $productCostInDollar;
        $this->productColor = $productColor;
        $this->productSize = $productSize;
    }

    public function getProduct(): ?CustomProduct
    {
        return $this->product;
    }

    public function setProduct(CustomProduct $product): void
    {
        $this->product = $product;
    }

    public function getQty(): int
    {
        return $this->qty;
    }

    public function setQty(int $qty): void
    {
        $this->qty = $qty;
    }

    public function getProductCostInRupees(): float
    {
        return $this->productCostInRupees;
    }

    public function setProductCostInRupees(float $productCostInRupees): void
    {
        $this->productCostInRupees = $productCostInRupees;
    }

    public function getProductCostInDollar(): float
    {
        return $this->productCostInDollar;
    }

    public function setProductCostInDollar(float $productCostInDollar): void
    {
        $this->productCostInDollar = $productCostInDollar;
    }

    public function getProductColor(): string
    {
        return $this->productColor;
    }

    public function setProductColor(string $productColor): void
    {
        $this->productColor = $productColor;
    }

    public function getProductSize(): string
    {
        return $this->productSize;
    }

    public function setProductSize(string $productSize): void
    {
        $this->productSize = $productSize;
    }

    public function getTotalInRupees(): float
    {
        return $this->qty * $this->productCostInRupees;
    }

    public function getTotalInDollar(): float
    {
        return $this->qty * $this->productCostInDollar;
    }

    public function serialize(): string
    {
        return serialize([
            $this->product,
            $this->qty,
            $this->productCostInRupees,
            $this->productCostInDollar,
            $this->productColor,
            $this->productSize,
        ]);
    }

    public function unserialize($data): void
    {
        list(
            $this->product,
            $this->qty,
            $this->productCostInRupees,
            $this->productCostInDollar,
            $this->productColor,
            $this->productSize,
        ) = unserialize($data);
    }
}

?>