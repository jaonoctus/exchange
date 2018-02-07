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
            <select class="form-control">
                <option>Limit</option>
                <option>Market</option>
                <option>Stop/Limit</option>
            </select>
        </div>
        <div class="form-group">
            <label>Amount</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="0.00">
                <div class="input-group-append">
                    <span class="input-group-text">BTC</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Price</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="0.00">
                <div class="input-group-append">
                    <span class="input-group-text">USD</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Total</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="0.00">
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
                action: '',
            }
        },

        created () {
            this.setOrderAction(this.ORDER_ACTION.BUY)
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
            }
        }
    }
</script>