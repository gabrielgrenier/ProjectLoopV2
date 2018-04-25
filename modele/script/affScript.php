<script>
function affCreateTache() {
    document.getElementById("createTache").style.display = "block";
    document.getElementById("btnAddTache").style.display = "none";
}
function affCreateProjet() {
    document.getElementById("createProjet").style.display = "table-row";
    document.getElementById("btnAddProjet").style.display = "none";
}
function hideCreateTache() {
    document.getElementById("createTache").style.display = "none";
    document.getElementById("titreAdd").value = "";
    document.getElementById("descriptionAdd").value = "";
    document.getElementById("dateAdd").value = null;
    document.getElementById("btnAddTache").style.display = "inline";
}
function hideCreateProjet() {
    document.getElementById("createProjet").style.display = "none";
    document.getElementById("addNomPro").value = "";
    document.getElementById("addNumPro").value = "";
    document.getElementById("btnAddProjet").style.display = "inline";
}
function affStats() {
    var x = document.getElementById("statsProjet");
    var btn = document.getElementById("btnStats");
    if (x.style.display === "none") {
        x.style.display = "block";
        btn.innerHTML = "Cacher les statistiques <span class='caret'></span>";
        
    } else {
        x.style.display = "none";
        btn.innerHTML = "Afficher les statistiques <span class='caret'></span>";
    }
}
</script>