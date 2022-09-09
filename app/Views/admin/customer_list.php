<h3>
                            Listing
                        </h3>
                        <div class="table-responsive">
                            <table class="table table-striped" id="message_table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Adresse</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php 
                                            foreach($customer_list as $customer){
                                                //je fais directement la requête sql sans faire le prepare parcequ'elle va pas changer elle est fixe (elle affiche l'ensemble des question créer)
                                        ?>
                                        <tr>
                                            <td><?=$customer->nom ?></td>
                                            <td><?=$customer->prenom?></td>
                                            <td><?=$customer->email?></td>
                                            <td></td>
                                            <td></td>
                                            <td><a class="btn btn-primary" href="/user/customer/<?=$customer->user_id?>">Plus d'information</a></td>
                                        </tr>
                                            <?php }
        
                                                ?>
       
                                    </tbody>
                            </table>
                        </div>
