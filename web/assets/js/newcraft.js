/**
 * Created by Sergii on 01.03.2016.
 */

function buy(id) {

    var count = $("#cnt"+id).val();
    if (count > 0) {
        $.post("/basket/put/"+id+"/"+count)
            .done(function(){
                window.location = '/basket'
            })
            .fail(function(){
                alert('Something wrong');
            })
    }

}

function removebasket(id)
{

        $.post("/basket/remove/"+id)
            .done(function(){
                window.location = '/basket'
            })
            .fail(function(){
                alert('Something wrong');
            })

}


function clearbasket()
{

    $.post("/basket/clear")
        .done(function(){
            window.location = '/basket'
        })
        .fail(function(){
            alert('Something wrong');
        })

}