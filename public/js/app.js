const button = document.getElementById("form-submit");
button.addEventListener("click", function () {
    form = document.getElementById("form");
    form.submit();
});

const svgDel = document.getElementById("delete");
svgDel.addEventListener("click", function(){
    delForm = document.getElementById("deleteForm");
    delForm.submit();
})
