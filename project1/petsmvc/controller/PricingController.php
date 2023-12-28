<?php
require_once 'Pricing.php';

class PricingController {
    public function getPricing($id) {
        $pricing = Pricing::find($id);
        // Handle the case where no pricing was found
        if ($pricing === null) {
            // Return an error or redirect the user
        } else {
            // Return the pricing or display it in a view
        }
    }

    public function createPricing($itemId, $itemType, $cost, $onSale) {
        $pricing = new Pricing();
        $pricing->itemId = $itemId;
        $pricing->itemType = $itemType;
        $pricing->cost = $cost;
        $pricing->onSale = $onSale;
        $pricing->save();
    }

    public function updatePricing($id, $itemId, $itemType, $cost, $onSale) {
        $pricing = Pricing::find($id);
        // Handle the case where no pricing was found
        if ($pricing === null) {
            // Return an error or redirect the user
        } else {
            $pricing->itemId = $itemId;
            $pricing->itemType = $itemType;
            $pricing->cost = $cost;
            $pricing->onSale = $onSale;
            $pricing->save();
        }
    }

    public function deletePricing($id) {
        $pricing = Pricing::find($id);
        // Handle the case where no pricing was found
        if ($pricing === null) {
            // Return an error or redirect the user
        } else {
            $pricing->delete();
        }
    }
}
?>