<?php

class Store_View_Helper_RenderProduct extends Zend_View_Helper_Abstract {

    public function renderProduct(Store_Product $product) {
        ?>
        <div class="product">
            <a href="<?= $this->view->baseUrl()?>/product/show/id/<?=$product->getProductId()?>">
                <?php if ($product->hasImage()) { ?>
                    <img src="<?= $this->view->baseUrl().'/images/products/'.$product->getImageURL() ?>" alt="<?= $product->getName() ?>" title="<?= $product->getName() ?>"/>
                <?php } ?>
                <span class="details">
                    <span class="name"><?= $product->getName() ?></span>
                    <span class="price"><?= $this->view->formatPrice($product->getPrice()); ?></span>
                </span>
            </a>
        </div>
        <?php
    }

}
