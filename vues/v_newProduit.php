<div class="product">
    <section class="newrap">
<h1> Ajout Produit </h1>
      <form id="produitform" onsubmit="return redirect()" class="saisieProduit" action=" " method="post">
    <div>
        <label for="nom">Nom</label>
        <input class="casesinput" type="text" name="nom" id="nom" required/>
    </div>
    <div>
        <label for="decription">Decription</label>
        <textarea class="avis" type="text" name="decription" id="decription" required></textarea>
    </div>
    <div>
        <label for="categorie">Catégorie</label>
        <select name="categorie" id="categorie" required>
            <?php foreach($lesCategories as $laCategorie){ ?>
            	<option value="<?php echo $laCategorie['id'];?>"><?php echo $laCategorie['nom'];?></option>
      		<?php } ?>
        </select>
    </div>
    <div>
        <label for="quantite">Quantité</label>
        <input class="casesinput" type="number" min="0" name="quantite" id="quantite" required/>
    </div>
    <div>
        <label for="illustration">Illustration</label>
        <input class="casesinput" type="file" name="illustration" id="illustration" required/>
    </div>
    
    <div id="cont">
        <table style="width:100%" id="empTable">
            <tr>
                <th></th>
                <th>Prix</th>
                <th>Contenance</th>
                <th>Unité</th>
            </tr>
            <tr id='row1'>
                <td>
                <input class="addcontenance" type="button" id="addRow" value="Ajouter contenance"/>
                </td>
                <td>
                    <input min="1" name="prix1" type="text">
                </td>
                <td>
                    <input type="text" min="0" name="contenance1" id="contenance1" required/>
                </td>
                <td>
                    <select type="text" min="0" name="unite1" id="unite1" required>
                        <option value=""></option>
                        <option value="mL">mL</option>
                        <option value="cL">cL</option>
                        <option value="L">L</option>
                    </select>
                </td>
            </tr>
        </table>
    </div>

    <div class="hline"></div>
    
    <div style="text-align:center">
	    <input id="save" style="margin-top:1%; font-size:14px" class="addechantillon" type="submit" name="bouton" value="Enregistrer">
	</div>
</section>

</form>
</div>

<script>
    
    var id=1;
    var arrHead = new Array(); arrHead = ['', 'Prix', 'Contenance', 'Unité'];
    var arrayTD = ['button1'];
    
    function addRow(id){

        if(id<11){

            var empTab = document.getElementById('empTable');
            var rowCnt = empTab.rows.length;
            var tr = empTab.insertRow(rowCnt);
            
            tr.setAttribute('id','row'+id);

            for (var c = 0; c < arrHead.length; c++) {
                var td = document.createElement('td');
                td = tr.insertCell(c);

                if (c == 0) {
                    var button = document.createElement('input');
                
                    button.setAttribute('type', 'button');
                    button.setAttribute('value', 'Supprimer');
                    button.setAttribute('class', 'delcontenance');
                    button.setAttribute('onclick', 'removeRow(this)');
                    button.setAttribute('id','button'+id);
                    td.appendChild(button);
                }
                if (c == 1) {
                    var prix = document.createElement('input');
                    
                    prix.setAttribute('type', 'number');
                    prix.setAttribute('min','1');
                    prix.setAttribute('name','prix'+id);
                    prix.setAttribute('id','prix'+id);
                
                    td.appendChild(prix);
                }
                if (c == 2) {
                    var contenance = document.createElement('input');
                    
                    contenance.setAttribute('value', '');
                    contenance.setAttribute('name','contenance'+id);
                    contenance.setAttribute('id','contenance'+id);
                    
                    td.appendChild(contenance);
                }
                if (c == 3 ) {
                    var unite = document.createElement('select');
                    unite.setAttribute('value', '');
                    unite.setAttribute('name','unite'+id);
                    unite.setAttribute('id','unite'+id);

                    var option = document.createElement('option');
                    option.setAttribute('value','');
                    option.text = '';
                    unite.appendChild(option);

                    var option = document.createElement('option');
                    option.setAttribute('value','mL');
                    option.text ='mL';
                    unite.appendChild(option);

                    var option = document.createElement('option');
                    option.setAttribute('value','cL');
                    option.text ='cL';
                    unite.appendChild(option);

                    var option = document.createElement('option');
                    option.setAttribute('value','L');
                    option.text ='L';
                    unite.appendChild(option);

                    td.appendChild(unite);
                }
            }
        }
    }

    function idCheck(){
        
        var index = 1;
        var added = false;
        
        while(!added && index < 11){
            
            var indexQte = 'button'+index;
            
            if(!contains(indexQte, arrayTD)){
                arrayTD.push(indexQte)
                addRow(index);
                added = true;
            }
            
            index++;
        
        }
    }

    function contains(indexQte, arrayTD){
        return (arrayTD.includes(indexQte));
    }


    function removeRow(button){

        var empTab = document.getElementById('empTable');
        for( var i = 0; i < arrayTD.length; i++){ 
            if ( arrayTD[i] == button.id ){ 
                arrayTD.splice(i, 1); 
            }
        }
        empTab.deleteRow(button.parentNode.parentNode.rowIndex);
    }
    
    document.getElementById("addRow").addEventListener("click", idCheck);

</script>