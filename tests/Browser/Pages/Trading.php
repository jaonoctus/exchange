<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Trading extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/trading';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@buy_button' => '#action_buy',
            '@sell_button' => '#action_sell',
            '@input_amount' => '#input_amount',
            '@button_amount' => '#button_amount',
            '@input_price' => '#input_price',
            '@button_price' => '#button_price',
            '@input_total' => '#input_total',
            '@button_total' => '#button_total',
        ];
    }
}
