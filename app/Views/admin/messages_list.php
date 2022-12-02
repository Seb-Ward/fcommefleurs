<div class="row title-listing">
    <div class="col-md-6">
        <h3>Listing</h3>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped" id="message_table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($message_list as $message){ ?>
                <tr id="message_<?= $message->getId() ?>">
                    <td><?=$message->getName_sender()?></td>
                    <td><?=$message->getEmail_sender()?></td>
                    <td><?=$message->getPhone_sender()?></td>
                    <td><?=substr($message->getText_sender(), 0, 100)?></td>
                    <td>
                        <a class="btn btn-primary" href="mailto:<?=$message->getEmail_sender()?>?subject=Contact F comme Fleurs&body=Bonjour <?=$message->getName_sender()?>"><i class="fa-regular fa-envelope"></i></a>
                        <button class="btn btn-danger message-remove" data-id="<?= $message->getId() ?>"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
