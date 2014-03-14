/**
 * Created by sulb1210 on 3/14/14.
 */
(function(){
    var x = $('#push').height()+20; // +20 gives space between div and footer
    var y = $(window).height();
    if (x+100<=y){ // 100 is the height of your footer
        $('footer').css('top', y-150+'px');// again 100 is the height of your footer
        $('footer').css('display', 'block');
        }else{
        $('footer').css('top', x+'px');
        $('footer').css('display', 'block');
        }

})