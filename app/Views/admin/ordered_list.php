<div class="row title-listing">
    <div class="col-md-6">
        <h3>Listing</h3>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped" id="message_table">
        <thead>
        <tr>
            <th>Référence</th>
            <th>Date de paiement</th>
            <th>Montants</th>
            <th>Ville de livraison</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($ordered_list as $order){?>
            <tr>
                <td><?=$order->getRef()?></td>
                <td><?=$order->getPaymentDate()?></td>
                <td><?=$order->getTTCPrice()?></td>
                <td><?= "VILLE" ?></td>
                <td>
                    <a class="btn btn-primary" href="/order/info/<?=$order->getId()?>"><i class="fa-regular fa-eye"></i></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
