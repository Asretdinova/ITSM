$('docuement').ready(function () {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $('#scrollToFeedback').click(function() {
        goToByScroll('feedback');
    });
});

function goToByScroll(id) {
    $('html,body').animate({
        scrollTop: $("#" + id).offset().top
    }, 'slow');
}
(function(d,s,id,u){
    if (d.getElementById(id)) return;
    var js, sjs = d.getElementsByTagName(s)[0],
        t = Math.floor(new Date().getTime() / 1000000);
    js=d.createElement(s); js.id=id; js.async=1; js.src=u+'?'+t;
    sjs.parentNode.insertBefore(js, sjs);
  });
//   document.getElementById('OPP-poll-question-text').innerHTML="HElllo"
// window.addEventListener("load", function(){
//     document.execCommand("defaultParagraphSeparator", false, "h1");
//     $(".w-header__title").html("some value");
//     // document.getElementsByTagName('h1')[0].innerText="sdfs"
//     document.getElementsByClassName('.w-header__title')[0].innerHTML="sdfs"
//     let list = document.getElementsByClassName('w-header__title');
//         // list = document.querySelectorAll('.currMonth'); either or
//         let foo = [].slice.call(list); // convert to array of values from node list

//         foo.forEach(function(objNode) {
//           objNode.innerHTML = "value";
//         })
//   alert(document.getElementsByClassName("w-header__title").innerHTML);
//   console.log(document.getElementsByTagName('h1')[0].innerText);


// var tes = $('.w-header__title');
// var tes_val = tes.val();
// console.log(tes_val);

// });