<script>
function validationProjet() {
    $form = document.getElementById("formAddPro");
    $nom = document.getElementById("addNomPro");
    $num = document.getElementById("addNumPro");
    if($nom.value==""){
        $nom.style.backgroundColor = "red";}
    if($num.value==""){$num.style.backgroundColor = "red";}
    if($nom.value!=""&&$num.value!=""){$form.submit();}
}
</script>