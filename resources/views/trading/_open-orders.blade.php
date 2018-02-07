
<div class="card card-default">
    <div class="card-header text-uppercase">Open orders</div>

    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase" colspan="2" width="12.5%">Pair</th>
                    <th class="text-center text-uppercase" width="12.5%">Type</th>
                    <th class="text-right text-uppercase" width="12.5%">Amount</th>
                    <th class="text-left text-uppercase" width="12.5%">CCY</th>
                    <th class="text-right text-uppercase" width="12.5%">Price</th>
                    <th class="text-center text-uppercase" width="12.5%">Status</th>
                    <th class="text-center text-uppercase" width="12.5%">Placed</th>
                    <th class="text-center text-uppercase" width="12.5%">
                        <i class="fa fa-times-circle" title="Cancel all"></i>
                    </th>
                </tr>
            </thead>
            <tbody>
                @include('trading.components.open-order-row')
            </tbody>
        </table>
    </div>
</div>