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
                <input type="text" class="form-control" placeholder="0.00" v-model="amount" @input="calculateTotal">
                <div class="input-group-append">
                    <span class="input-group-text">BTC</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Price</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="0.00" v-model="price" @input="calculateTotal">
                <div class="input-group-append">
                    <span class="input-group-text">USD</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Total</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="0.00" v-model="total" @input="calculateAmount">
                <div class="input-group-append">
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
            buyOrderClass () {
                return this.action === this.ORDER_ACTION.BUY ? 'btn-success' : 'btn-secondary'
            },
            sellOrderClass () {
                return this.action === this.ORDER_ACTION.SELL ? 'btn-danger' : 'btn-secondary'
            },
            placeOrderClass () {
                return this.action === this.ORDER_ACTION.BUY ? 'btn-success' : 'btn-danger'
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

                if (this.amount > 0 && this.price > 0) this.total = this.amount * this.price
            },
            calculateAmount () {
                if (this.total === '' || this.price === '') return

                if (this.total > 0 && this.price > 0) this.amount = this.total / this.price
            }
        }
    }
</script>