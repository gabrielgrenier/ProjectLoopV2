<script>
function validationProjet() {
    $form = document.getElementById("formAddPro");
    $nom = document.getElementById("addNomPro");
    $num = document.getElementById("addNumPro");
    //si l'un des champs est valide
    if($nom.value!=""){$nom.style.borderColor = "initial";}
    if($num.value!=""){$num.style.borderColor = "initial";}
    //si l'un des champs est vide
    if($nom.value==""){$nom.style.borderColor = "red";}
    if($num.value==""){$num.style.borderColor = "red";}
    //si les deux champs sont valide
    if($nom.value!=""&&$num.value!=""){$form.submit();}
    //refaire le code avec boucle
    /*
    window.onload = function () {
  var form = document.getElementById('theForm');
  form.button.onclick = function (){
    for(var i=0; i < form.elements.length; i++){
      if(form.elements[i].value === '' && form.elements[i].hasAttribute('required')){
        alert('There are some required fields!');
        return false;
      }
    }
    form.submit();
  }; 
};
*/
}
</script>