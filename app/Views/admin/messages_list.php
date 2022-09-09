                        <h3>
                            Listing
                        </h3>
                        <div class="table-responsive">
                            <table class="table table-striped" id="message_table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Message</th>
                                        <th>Réponse</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php 
                                            foreach($message_list as $message){
                                                //je fais directement la requête sql sans faire le prepare parcequ'elle va pas changer elle est fixe (elle affiche l'ensemble des question créer)
                                        ?>
                                        <tr>
                                            <td><?=($message->getMessage_genre_expediteur()==0?"Mme ":"Mr ").$message->getMessage_nom_expediteur()?></td>
                                            <td><?=$message->getMessage_email_expediteur()?></td>
                                            <td><?=$message->getMessage_telephone_expediteur()?></td>
                                            <td><?=$message->getMessage_text_expediteur()?></td>
                                            <td><a class="btn btn-primary" href="mailto:<?=$message->getMessage_email_expediteur()?>?subject=Contact F comme Fleurs&body=Bonjour <?=($message->getMessage_genre_expediteur()==0?"Mme ":"Mr ").$message->getMessage_nom_expediteur()?>"><i class="fa-regular fa-envelope"></i></a></td>
                                            <td><a class="btn btn-danger" href="/messages/delete/<?=$message->getMessage_id()?>"><i class="fa-solid fa-trash"></i></a></td>
                                        </tr>
                                            <?php }
        
                                                ?>
       
                                    </tbody>
                            </table>
                        </div>
