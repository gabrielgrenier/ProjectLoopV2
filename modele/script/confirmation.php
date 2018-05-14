<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    function confirmation(action){
        var projet = document.getElementById("delProjet");
        var confirmation = confirm("Voulez-vous vraiment supprimer ce projet?")

        if(confirmation==true){
            window.location.replace(action);
        }   
    }
</script>