function ExchageProject(idForm, idProject, projectName){
    
    $("#" + idForm).slideToggle(1000);
    var input = $("#title-project");
    console.log(input)
    input.val(idProject);
    input.attr("placeholder", projectName);

}