<h3>
                            Listing
                        </h3>
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
                                        <?php 
                                            foreach($admin_list as $admin){
                                                //je fais directement la requête sql sans faire le prepare parcequ'elle va pas changer elle est fixe (elle affiche l'ensemble des question créer)
                                        ?>
                                        <tr>
                                            <td><?=$admin->nom?></td>
                                            <td><?=$admin->prenom?></td>
                                            <td><?=$admin->prenom[0].$admin->nom?></td>
                                            <td>on</td>
                                            <td>
                                                <a class="btn btn-warning" href="/user/admin_reset_password/<?=$admin->user_id?>">Reinitialiser mot de passe</a>
                                                <a class="btn btn-primary" href="/user/admin/<?=$admin->user_id?>">Editer</a>
                                            </td>
                                        </tr>
                                            <?php }
        
                                                ?>
       
                                    </tbody>
                            </table>
                        </div>
