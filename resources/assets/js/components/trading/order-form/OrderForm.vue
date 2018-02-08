<template>
    <form action="" class="mb-0">
        <div class="form-group">
            <div class="btn-group btn-group-lg d-flex">
                <button type="button" class="btn w-100" :class="[buyOrderClass]" @click.prevent="setOrderAction(ORDER_ACTION.BUY)">BUY</button>
                <button type="button" class="btn w-100"  :class="[sellOrderClass]" @click.prevent="setOrderAction(ORDER_ACTION.SELL)">SELL</button>
            </div>
        </div>
        <div class="form-group">
            <label>Type</label>
            <select class="form-control" v-model="type">
                <option v-for="type in types">{{ type }}</option>
            </select>
        </div>
        <div class="form-group">
            <label>Amount</label>
            <div class="input-group mb-3">
                <input type="number" step="any" class="form-control" placeholder="0.00" v-model.number="amount" @input="calculateTotal">
                <div class="input-group-append">
                    <button
                            class="input-group-text"
                            title="Calculate max amount using your available balance (BTC)"
                            @click.prevent="getAvailableAmount"
                            v-if="!buying">
                        <i class="fa fa-fire"></i>
                    </button>
                    <span class="input-group-text">BTC</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Price</label>
            <div class="input-group mb-3">
                <input type="number" step="any" class="form-control" placeholder="0.00" v-model.number="price" @input="calculateTotal">
                <div class="input-group-append">
                    <button
                            class="input-group-text"
                            :title="bestPriceTitle"
                            @click.prevent="getBestPrice">
                        <i class="fa fa-fire"></i>
                    </button>
                    <span class="input-group-text">USD</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Total</label>
            <div class="input-group mb-3">
                <input type="number" step="any" class="form-control" placeholder="0.00" v-model.number="total" @input="calculateAmount">
                <div class="input-group-append">
                    <button
                            class="input-group-text"
                            title="Calculate max amount using your available balance (USD)"
                            @click.prevent="getAvailableBalance"
                            v-if="buying">
                        <i class="fa fa-fire"></i>
                    </button>
                    <span class="input-group-text">USD</span>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-lg btn-block text-uppercase" :class="[placeOrderClass]">Place order</button>
    </form>
</template>

<script>
    export default {
        data () {
            return {
                ORDER_ACTION: {
                    SELL: 'sell',
                    BUY: 'buy'
                },
                types: ['Limit', 'Market'],
                type: 'Limit',
                action: '',
                amount: '',
                price: '',
                total: ''
            }
        },

        created () {
            this.setOrderAction(this.ORDER_ACTION.BUY)
            this.getMarketPrice()
        },

        computed: {
            buying () {
                return this.action === this.ORDER_ACTION.BUY
            },
            buyOrderClass () {
                return this.buying ? 'btn-success' : 'btn-secondary'
            },
            sellOrderClass () {
                return this.action === this.ORDER_ACTION.SELL ? 'btn-danger' : 'btn-secondary'
            },
            placeOrderClass () {
                return this.buying ? 'btn-success' : 'btn-danger'
            },
            bestPriceTitle () {
                return this.buying
                    ? 'Set price field to current highest BTC/USD bid'
                    : 'Set price field to current lowest BTC/USD ask'
            }
        },

        methods: {
            setOrderAction (action) {
                this.action = action
            },
            getMarketPrice () {
                this.price = 5
            },
            calculateTotal () {
                if (this.amount === '' || this.price === '') this.total = 0

                if (this.amount > 0 && this.price > 0) this.total = (this.amount * this.price).toFixed(2)
            },
            calculateAmount () {
                if (this.total === '' || this.price === '') return

                if (this.total > 0 && this.price > 0) this.amount = (this.total / this.price).toFixed(8)
            },
            getAvailableBalance () {
                this.total = 5 // get available balance

                this.calculateAmount()
            },
            getAvailableAmount () {
                this.amount = 1 // get available amount

                this.calculateTotal()
            },
            getBestPrice () {
                // get best price
                this.price = this.buying
                    ? 9.9 // get highest bid
                    : 10.1 // get lowest ask

                this.calculateTotal()
            }
        }
    }
</script>