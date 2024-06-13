$(document).ready(function() 
{
    $(".fav").on("click", function() 
    {
        const akapit = $(this);
        $.post("changeFav.php", { idDzbana: "'" + akapit.data("dzban") + "'"}, function(data) 
        {
            if (data == "sukces") 
            {
                akapit.text((akapit.text() == "Dodaj do ulubionych") ? "Usuń z ulubionych" : "Dodaj doulubionych");
            }
        });
    });
});