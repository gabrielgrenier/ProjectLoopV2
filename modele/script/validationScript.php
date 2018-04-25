<script>
function validationProjet() {
    var form = document.getElementById("formAddPro");

    var valide = true;
    for(i =0; i < form.length-1; i++){ //-1 a cause du td action
        if(form.elements[i].value==""){
            form.elements[i].style.borderColor="red";
            form.elements[i].focus();
            valide = false;}
        if(form.elements[i].value!=""){form.elements[i].style.borderColor="initial";}
    }
    if(valide){form.submit();}
}
</script>