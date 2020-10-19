    
$(document).ready( function(){
    
    $(".difficulty").click( function(){
        console.log("clicked");
        // console.log($(this).children(".block-heading").children("form").children(".submit-btn"));
        $(this).find("form").submit();
    })

    function checkfilter()
    {
        console.log('Fun Called');
        $(".difficulty").fadeOut('fast');
        let visibleBlocks=0;

        $(".filter-container :checkbox:checked").each(function() {
            $("." + $(this).val()).fadeIn();
            visibleBlocks++;
            });

        if(visibleBlocks===0)
        {
            $("#all-check").prop("checked",true);
            $(".difficulty").fadeIn();
        }
    }

    $(".filter-container :checkbox").click(checkfilter);


    $(".filter-btn-div").click(function() {
        //Display List if tapped once
        if($(".filter-container").css("display") == "none")
        {
        $(".filter-container").fadeIn();
        }

        //Hide list when tapped again while its open 
        else
        {
            $(".filter-container").fadeOut();
        }
    });


    $(window).resize(function(){  

        if($(window).width() > 860)
        $(".filter-container").show();

        else
        $(".filter-container").hide();
    });

    //'Apply' button in filter-list
    $(".filter-close-btn").click(function() {
    $(".filter-container").fadeOut();
    });

    //Hide Filter List if clicked outside
    const $filter = $('.filter-container');
    $(document).mouseup(e => {
        if($(window).width() < 860)
        {
            if (!$filter.is(e.target) && $filter.has(e.target).length === 0) 
                $('.filter-container').fadeOut();
        }
    });

    $(".label").click( function(){
        if($(this).prev().prop("checked")===false)
            $(this).prev().prop("checked",true);
        else    
            $(this).prev().prop("checked",false);
        checkfilter();
    });

});