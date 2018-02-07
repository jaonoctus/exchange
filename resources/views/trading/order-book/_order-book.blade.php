<div class="card card-default">
    <div class="card-header text-uppercase">Order book</div>

    <div class="card-body p-0">
        <div class="row">
            <div class="col-md-6 pr-0">
                @include('trading.order-book.components._bids')
            </div>
            <div class="col-md-6 pl-0">
                @include('trading.order-book.components._asks')
            </div>
        </div>
    </div>
</div>