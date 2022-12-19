<div class="col-md-7">
    <div class="w-100 p-md-5 p-4">
        <h3 class="mb-4">Ajouter votre message (c'est gratuit)</h3>
        <form id="joinmessageForm" class="joinmessageForm" method="POST" name="joinmessageForm" novalidate="novalidate">
            <div class="row">
                 <div class="col-md-12">
                     <div class="form-group">
                        <label for="message" class="form-label"></label>
                        <textarea id="message" class="form-control" name="message" cols="30" rows="4" placeholder="Message" required maxlength="500"><?= $message ?? "" ?></textarea>
                    </div>
                </div>
             </div>
             <div class="col-md-12 justify-content-center">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <a class="btn btn-warning" event="click" href="/basket/delivery">Ignorer cette étape</a>
                        </div>
                    </div>
                    <div class="col-md-7 text-end">
                        <div class="form-group">
                            <button class="btn btn-primary" id="submitMessageCard" type="submit">Continuer</button>        
                        </div> 
                    </div>
                </div>
             </div>
        </form>
    </div>
</div>