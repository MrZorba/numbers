<?php

class ShoppingCart implements Serializable {

    private $cart = array(); // equivalent to HashMap in Java

    public function addToCart($quantity, CustomProduct $product) {
        if (isset($this->cart[$product->getId()])) {
            $cartItem = $this->cart[$product->getId()];
            $cartItem->setQty($cartItem->getQty() + $quantity);
        } else {
            $cartItem = new ShoppingCartItem();
            $cartItem->setProduct($product);
            $cartItem->setQty($quantity);
            $cartItem->setProductCostInRupees($product->getRateInRupee());
            $cartItem->setProductCostInDollar($product->getRateInDollar());
            $this->cart[$product->getId()] = $cartItem;
        }
    }

    public function setQuantity($quantity, CustomProduct $product) {
        if ($quantity <= 0) {
            unset($this->cart[$product->getId()]);
        } else {
            if (isset($this->cart[$product->getId()])) {
                $cartItem = $this->cart[$product->getId()];
                $cartItem->setQty($quantity);
            } else {
                $cartItem = new ShoppingCartItem();
                $cartItem->setProduct($product);
                $cartItem->setQty($quantity);
                $cartItem->setProductCostInRupees($product->getRateInRupee());
                $cartItem->setProductCostInDollar($product->getRateInDollar());
                $this->cart[$product->getId()] = $cartItem;
            }
        }
    }

    public function removeFromCart(CustomProduct $product) {
        unset($this->cart[$product->getId()]);
    }

    public function removeEverythingFromCart() {
        $this->cart = array();
    }

    public function getTotalQtyForProduct(CustomProduct $product) {
        if (isset($this->cart[$product->getId()])) {
            return $this->cart[$product->getId()]->getQty();
        }
        return 0;
    }

    public function getTotalCostForProduct(CustomProduct $product, $currency) {
        if (isset($this->cart[$product->getId()])) {
            $cartItem = $this->cart[$product->getId()];
            if (strcasecmp($currency, 'DOLLAR') === 0) {
                return $cartItem->getTotalInDollar();
            } else {
                return $cartItem->getTotalInRupees();
            }
        }
        return 0.0;
    }

    public function getTotalCost($currency) {
        $total = 0.0;
        foreach ($this->cart as $cartItem) {
            if (strcasecmp($currency, 'DOLLAR') === 0) {
                $total += $cartItem->getProductCostInDollar();
            } else {
                $total += $cartItem->getProductCostInRupees();
            }
        }
        return $total;
    }

    public function getAllCartItems() {
        return array_values($this->cart);
    }

    public function serialize() {
        return serialize($this->cart);
    }

    public function unserialize($data) {
        $this->cart = unserialize($data);
    }
}

?>