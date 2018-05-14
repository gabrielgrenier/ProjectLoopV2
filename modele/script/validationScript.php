<script>
function validationProjet(nomForm) {
    var form = document.getElementById(nomForm);

    var valide = true;
    for(i =0; i < form.length; i++){
        if(form.elements[i].value==""){
            form.elements[i].style.borderColor="red";
            form.elements[i].focus();
            valide = false;}
        if(form.elements[i].value!=""){form.elements[i].style.borderColor="initial";}
    }
    if(valide){form.submit();}
}
</script>