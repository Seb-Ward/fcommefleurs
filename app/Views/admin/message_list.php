<div id="listing">
                        <h3>
                            Listing
                        </h3>
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                                            require_once "../model/message.php";
                                            foreach($message_list()as $message){
                                                //je fais directement la requête sql sans faire le prepare parcequ'elle va pas changer elle est fixe (elle affiche l'ensemble des question créer)
                                        ?>
                                        <tr>
                                            <td><?=($message->getMessage_genre_expediteur()==0?"Mme ":"Mr ").$message->getMessage_nom_expediteur()?></td>
                                            <td><?=$message->getMessage_email_expediteur()?></td>
                                            <td><?=$message->getMessage_telephone_expediteur()?></td>
                                            <td><?=$message->getMessage_text_expediteur()?></td>
                                            <td><a class="btn btn-primary" href="mailto:<?=$message->getMessage_email_expediteur()?>?subject=Contact Rose-écarlate&body=Bonjour <?=($message->getMessage_genre_expediteur()==0?"Mme ":"Mr ").$message->getMessage_nom_expediteur()?>">Répondre</a></td>
                                            <td><a class="btn btn-danger" href="../controleur/suppression_message.php?message_id=<?=$message->getMessage_id()?>">Suprimer</a></td>
                                        </tr>
                                            <?php }
        
                                                ?>
       
                                    </tbody>
                            </table>
                        </div>
                    </div>