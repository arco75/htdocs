$(document).ready(function() {

    $(".link").click(function(){

        var nazwaPliku=$(this).attr("attr");
        $("#strona").load(nazwaPliku);
    });
});