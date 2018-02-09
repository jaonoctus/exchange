<?php

namespace Tests\Browser;

use Tests\Browser\Pages\Trading;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class OrderFormTest extends DuskTestCase
{
    /**
     * @test
     * @throws \Exception
     * @throws \Throwable
     */
    public function the_total_is_calculated_by_typing_the_amount_and_the_price()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Trading)
                ->type('@input_amount', 0.21659562)
                ->type('@input_price', 27599.96)
                ->assertInputValue('@input_total', 5978.03);
        });
    }

    /**
     * @test
     * @throws \Exception
     * @throws \Throwable
     */
    public function the_total_is_calculated_by_typing_the_price_and_the_amount()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Trading)
                ->type('@input_price', 0.21659562)
                ->type('@input_amount', 27599.96)
                ->assertInputValue('@input_total', 5978.03);
        });
    }

    /**
     * @test
     * @throws \Exception
     * @throws \Throwable
     */
    public function the_amount_is_calculated_by_typing_the_price_and_the_total()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Trading)
                ->type('@input_price', 27599.96)
                ->type('@input_total', 20)
                ->assertInputValue('@input_amount', 0.00072464);
        });
    }

    /**
     * @test
     * @throws \Exception
     * @throws \Throwable
     */
    public function the_total_value_is_zero_by_typing_only_the_amount_field()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Trading)
                ->type('@input_amount', 1)
                ->assertInputValue('@input_total', 0);
        });
    }

    /**
     * @test
     * @throws \Exception
     * @throws \Throwable
     */
    public function the_total_value_is_zero_by_typing_only_the_price_field()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Trading)
                ->type('@input_price', 1)
                ->assertInputValue('@input_total', 0);
        });
    }

    /**
     * @test
     * @throws \Exception
     * @throws \Throwable
     * @group test
     */
    public function the_amount_quick_button_is_missing_and_the_total_quick_button_is_visible_when_buying()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Trading)
                ->click('@buy_button')
                ->assertMissing('@button_amount')
                ->assertVisible('@button_total');
        });
    }

    /**
     * @test
     * @throws \Exception
     * @throws \Throwable
     * @group test
     */
    public function the_amount_quick_button_is_visible_and_the_total_quick_button_is_missing_when_selling()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Trading)
                ->click('@sell_button')
                ->assertVisible('@button_amount')
                ->assertMissing('@button_total');
        });
    }
}
