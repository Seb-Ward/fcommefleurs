<h3>Listing</h3>
<div class="table-responsive">
    <table class="table table-striped" id="message_table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Pseudo</th>
                <th>Access</th>
                <th>Action</th>
            </tr>
        </thead>
            <tbody>
                <?php foreach($admin_list as $admin){?>
                    <tr>
                        <td><?=$admin->getName()?></td>
                        <td><?=$admin->getSurname()?></td>
                        <td><?=$admin->getNickname()?></td>
                        <td><?= $admin->isActif() ? "Activé" : "Désactivé" ?></td>
                        <td>
                            <a class="btn btn-warning" href="/user/admin_reset_password/<?=$admin->getId()?>">Reinitialiser mot de passe</a>
                            <a class="btn btn-primary" href="/user/admin/<?=$admin->getId()?>">Editer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
    </table>
</div>
