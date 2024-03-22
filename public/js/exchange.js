function ExchageProject(idForm, idProject, projectName){
    
    $("#" + idForm).toggle(1000);
    var input = $("#title-project");
    input.val(idProject);
    input.attr("placeholder", projectName);

}