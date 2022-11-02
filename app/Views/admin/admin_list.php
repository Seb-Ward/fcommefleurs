<h3>Listing</h3>
<div class="col-md-6 text-end">
    <a class='btn btn-outline-primary' href="/admin/create">Ajouter un administrateur</a>
</div>
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
                            <a class="btn btn-warning" href="/admin_reset_password/<?=$admin->getId()?>">Reinitialiser mot de passe</a>
                            <a class="btn btn-primary" href="/admin/profil/<?=$admin->getId()?>"><i class="fa-regular fa-eye"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
    </table>
</div>
